<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div><p class="text-sm font-medium text-indigo-600 dark:text-indigo-300">Control de asistencia</p><h2 class="text-xl font-semibold text-gray-800 dark:text-white">Importar registros de checadas</h2></div>
            <a href="{{ route('checadas.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-500 dark:text-gray-100 dark:hover:bg-gray-600">Volver al tablero</a>
        </div>
    </x-slot>

    <div class="min-h-[calc(100vh-10rem)] bg-slate-50 px-4 py-8 dark:bg-gray-900 sm:px-6">
        <div class="mx-auto max-w-5xl">
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800"><p class="font-semibold">No pudimos importar el archivo</p><ul class="mt-2 list-disc pl-5 text-sm">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-800">
                <div class="bg-gradient-to-r from-indigo-700 via-indigo-600 to-blue-600 px-6 py-8 text-white sm:px-10">
                    <span class="inline-flex rounded-full bg-white/15 px-3 py-1 text-xs font-semibold uppercase tracking-wider">Importación segura</span>
                    <h1 class="mt-4 text-3xl font-bold">Carga el archivo del reloj checador</h1>
                    <p class="mt-2 max-w-2xl text-indigo-100">Conservaremos cada registro original y calcularemos entrada, comida, salida y horas trabajadas por semana.</p>
                </div>

                <form id="form-importacion" method="POST" action="{{ route('checadas.importar') }}" enctype="multipart/form-data" class="p-6 sm:p-10">
                    @csrf
                    <label id="zona-archivo" for="archivo_checadas" class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center transition hover:border-indigo-500 hover:bg-indigo-50 dark:border-gray-600 dark:bg-gray-700">
                        <span class="flex h-16 w-16 items-center justify-center rounded-full bg-indigo-100 text-3xl font-light text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300">↑</span>
                        <span id="titulo-archivo" class="mt-5 text-lg font-semibold text-slate-800 dark:text-white">Arrastra tu archivo aquí</span>
                        <span class="mt-1 text-sm text-slate-500 dark:text-gray-300">o haz clic para seleccionarlo</span>
                        <span class="mt-4 rounded-full bg-white px-3 py-1 text-xs font-medium text-slate-500 shadow-sm dark:bg-gray-800 dark:text-gray-300">TXT o CSV · máximo 10 MB</span>
                        <input id="archivo_checadas" name="archivo_checadas" type="file" accept=".txt,.csv,text/plain,text/csv" required class="sr-only">
                    </label>

                    <div id="archivo-seleccionado" class="mt-4 hidden items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900">
                        <div><p id="nombre-archivo" class="font-semibold"></p><p id="tamano-archivo" class="text-emerald-700"></p></div>
                        <button id="quitar-archivo" type="button" class="rounded-lg px-3 py-2 font-semibold hover:bg-emerald-100">Quitar</button>
                    </div>

                    <div class="mt-8 grid gap-6 lg:grid-cols-2">
                        <section class="rounded-xl border border-slate-200 p-5 dark:border-gray-600"><h2 class="font-semibold text-slate-800 dark:text-white">Formato esperado</h2><p class="mt-1 text-sm text-slate-500 dark:text-gray-300">La primera fila debe contener estos encabezados:</p><div class="mt-4 overflow-x-auto rounded-lg bg-slate-900 p-4 font-mono text-xs text-slate-100">No&nbsp; Mchn&nbsp; EnNo&nbsp; Name&nbsp; Mode&nbsp; IOMd&nbsp; DateTime</div></section>
                        <section class="rounded-xl border border-slate-200 p-5 dark:border-gray-600"><h2 class="font-semibold text-slate-800 dark:text-white">¿Qué sucederá?</h2><ol class="mt-3 space-y-2 text-sm text-slate-600 dark:text-gray-300"><li><b class="mr-2 text-indigo-600">1.</b>Se guardará cada fila original.</li><li><b class="mr-2 text-indigo-600">2.</b>Se relacionará al empleado por EnNo o nombre.</li><li><b class="mr-2 text-indigo-600">3.</b>Se abrirá el resumen de la semana.</li></ol></section>
                    </div>

                    <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end dark:border-gray-600">
                        <a href="{{ route('checadas.index') }}" class="rounded-lg px-5 py-3 text-center font-semibold text-slate-600 hover:bg-slate-100 dark:text-gray-200 dark:hover:bg-gray-700">Cancelar</a>
                        <button id="boton-importar" type="submit" class="rounded-lg bg-indigo-600 px-7 py-3 font-semibold text-white shadow-md hover:bg-indigo-700 disabled:cursor-not-allowed disabled:opacity-50" disabled>Importar y procesar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('archivo_checadas');
            const zone = document.getElementById('zona-archivo');
            const selected = document.getElementById('archivo-seleccionado');
            const button = document.getElementById('boton-importar');
            const showFile = () => {
                const file = input.files[0];
                selected.classList.toggle('hidden', !file); selected.classList.toggle('flex', Boolean(file)); button.disabled = !file;
                if (file) { document.getElementById('nombre-archivo').textContent = file.name; document.getElementById('tamano-archivo').textContent = (file.size / 1024).toFixed(1) + ' KB'; document.getElementById('titulo-archivo').textContent = 'Archivo listo para importar'; }
            };
            input.addEventListener('change', showFile);
            ['dragenter', 'dragover'].forEach(type => zone.addEventListener(type, event => { event.preventDefault(); zone.classList.add('border-indigo-500', 'bg-indigo-50'); }));
            ['dragleave', 'drop'].forEach(type => zone.addEventListener(type, event => { event.preventDefault(); zone.classList.remove('border-indigo-500', 'bg-indigo-50'); }));
            zone.addEventListener('drop', event => { input.files = event.dataTransfer.files; showFile(); });
            document.getElementById('quitar-archivo').addEventListener('click', () => { input.value = ''; document.getElementById('titulo-archivo').textContent = 'Arrastra tu archivo aquí'; showFile(); });
            document.getElementById('form-importacion').addEventListener('submit', () => { button.disabled = true; button.textContent = 'Procesando archivo…'; });
        });
    </script>
</x-app-layout>
