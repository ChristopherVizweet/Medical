<x-guest-layout>
    <form method="POST" action="{{ route('store-photos-vehiculos', $id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_checklist" value="{{ $id }}">

        <div class="max-w-5xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60 dark:border-slate-700 dark:bg-slate-800 dark:shadow-none">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-600">Evidencia fotográfica</p>
                    <h1 class="mt-4 text-3xl font-semibold text-slate-900 dark:text-slate-100">Registrar fotos del vehículo</h1>
                    <p class="mx-auto mt-3 max-w-2xl text-sm text-slate-500 dark:text-slate-400">Sube imágenes claras de cada ángulo del vehículo antes de salir. Esto mantiene un registro más profesional y ayuda a resolver incidencias con rapidez.</p>
                </div>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                    <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">Frente</h2>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Captura la vista frontal completa.</p>
                    <div class="mt-5">
                        <x-input-label for="foto_frente" :value="__('Foto del frente del vehículo')" />
                        <x-text-input id="foto_frente" class="mt-2 block w-full" type="file" name="foto_frente" />
                        <x-input-error :messages="$errors->get('foto_frente')" class="mt-2" />
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                    <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">Lado izquierdo</h2>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Asegúrate de mostrar el costado izquierdo.</p>
                    <div class="mt-5">
                        <x-input-label for="foto_lado_izquierdo" :value="__('Foto del lado izquierdo del vehículo')" />
                        <x-text-input id="foto_lado_izquierdo" class="mt-2 block w-full" type="file" name="foto_lado_izquierdo" />
                        <x-input-error :messages="$errors->get('foto_lado_izquierdo')" class="mt-2" />
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                    <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">Lado derecho</h2>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Incluye el costado derecho completo.</p>
                    <div class="mt-5">
                        <x-input-label for="foto_lado_derecho" :value="__('Foto del lado derecho del vehículo')" />
                        <x-text-input id="foto_lado_derecho" class="mt-2 block w-full" type="file" name="foto_lado_derecho" />
                        <x-input-error :messages="$errors->get('foto_lado_derecho')" class="mt-2" />
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                    <h2 class="text-base font-semibold text-slate-900 dark:text-slate-100">Parte trasera</h2>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Toma la parte posterior del vehículo.</p>
                    <div class="mt-5">
                        <x-input-label for="foto_trasera" :value="__('Foto de la parte trasera del vehículo')" />
                        <x-text-input id="foto_trasera" class="mt-2 block w-full" type="file" name="foto_trasera" />
                        <x-input-error :messages="$errors->get('foto_trasera')" class="mt-2" />
                    </div>
                </div>
            </div>
             <!-- Para fotografias de raspones -->
            <div class="mt-8">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Fotos adicionales (opcional)</h2>
                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Si encuentras algún daño o raspones, sube fotos detalladas para documentar el estado del vehículo.</p>
                <div class="mt-5">
                    <x-input-label for="foto_adicional" :value="__('Foto adicional del vehículo')" />
                    <x-text-input id="foto_adicional" class="mt-2 block w-full" type="file" name="foto_adicional" />
                    <x-input-error :messages="$errors->get('foto_adicional')" class="mt-2" />
                </div>
                <h1 class="mt-6 text-lg font-semibold text-blue-900 dark:text-slate-100">Agregar más imágenes +</h1>
            </div>

            <div class="mt-6 flex justify-end">
                <x-primary-button class="px-8 py-3 text-base font-semibold">
                    {{ __('Registrar fotos') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
