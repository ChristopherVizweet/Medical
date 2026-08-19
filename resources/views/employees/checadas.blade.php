<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Control de asistencia</h2>
    </x-slot>

    <div class="container mx-auto space-y-6 px-4 py-6">
        @if (session('success'))
            <div class="rounded-lg border border-green-300 bg-green-100 px-4 py-3 text-green-800">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="rounded-lg border border-red-300 bg-red-100 px-4 py-3 text-red-800">
                <ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        @if (session('import_errors'))
            <div class="rounded-lg border border-amber-300 bg-amber-50 px-4 py-3 text-amber-900">
                <p class="font-semibold">Registros que requieren revisión:</p>
                <ul class="mt-1 list-disc pl-5 text-sm">@foreach (session('import_errors') as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <section class="flex flex-col gap-4 rounded-xl border border-indigo-100 bg-indigo-50 p-5 shadow-sm dark:border-gray-600 dark:bg-gray-700 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Registros del reloj checador</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Consulta todos los registros o abre el historial individual desde la lista de empleados.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('index-employees') }}" class="inline-flex items-center justify-center rounded-lg border border-indigo-300 px-5 py-3 font-semibold text-indigo-700 hover:bg-indigo-100 dark:text-indigo-200">Ver empleados</a>
                <a href="{{ route('checadas.importar.form') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-5 py-3 font-semibold text-white hover:bg-indigo-700">Importar archivo</a>
            </div>
        </section>

        <section class="space-y-5 rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-600 dark:bg-slate-800">
            <div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Filtrar y calcular horas</h3>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-300">Las horas trabajadas descuentan el tiempo transcurrido entre la salida y el regreso de comida.</p>
            </div>

            <form method="GET" action="{{ route('checadas.index') }}" class="grid gap-4 lg:grid-cols-[2fr_1fr_1fr_auto] lg:items-end">
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                    Empleado
                    <select name="empleado" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                        <option value="">Todos los empleados</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->identificador_verificador }}" @selected(request('empleado') === (string) $empleado->identificador_verificador)>
                                {{ $empleado->nombre_verificador }} — {{ $empleado->identificador_verificador }}
                            </option>
                        @endforeach
                    </select>
                </label>
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                    Desde
                    <input type="date" name="desde" value="{{ request('desde') }}" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                </label>
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                    Hasta
                    <input type="date" name="hasta" value="{{ request('hasta') }}" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                </label>
                <div class="flex gap-2">
                    <button class="rounded-lg bg-indigo-600 px-5 py-2.5 font-semibold text-white hover:bg-indigo-700">Aplicar</button>
                    <a href="{{ route('checadas.index') }}" class="rounded-lg border border-slate-300 px-4 py-2.5 font-semibold text-slate-600 hover:bg-slate-50 dark:border-slate-500 dark:text-slate-200 dark:hover:bg-slate-700">Limpiar</a>
                </div>
            </form>

            @if (request()->filled('empleado'))
                <div class="grid gap-5 lg:grid-cols-2">
                    <div class="overflow-hidden rounded-lg border border-slate-200 dark:border-slate-600">
                        <div class="bg-slate-100 px-4 py-3 font-semibold text-slate-800 dark:bg-slate-700 dark:text-white">Horas por día</div>
                        <div class="max-h-80 overflow-y-auto">
                            <table class="w-full text-sm text-slate-700 dark:text-slate-200">
                                <thead class="sticky top-0 bg-white dark:bg-slate-800"><tr><th class="px-4 py-2 text-left">Fecha</th><th class="px-4 py-2 text-right">Tiempo trabajado</th></tr></thead>
                                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                    @forelse ($calculosDiarios as $dia)
                                        <tr><td class="px-4 py-3">{{ $dia['fecha']?->format('d/m/Y') }}</td><td class="px-4 py-3 text-right font-semibold">{{ $dia['horas'] }}</td></tr>
                                    @empty
                                        <tr><td colspan="2" class="px-4 py-8 text-center text-slate-500">No hay registros en el periodo seleccionado.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-lg border border-slate-200 dark:border-slate-600">
                        <div class="bg-indigo-50 px-4 py-3 font-semibold text-indigo-900 dark:bg-indigo-950 dark:text-indigo-100">Horas por semana</div>
                        <div class="max-h-80 overflow-y-auto">
                            <table class="w-full text-sm text-slate-700 dark:text-slate-200">
                                <thead class="sticky top-0 bg-white dark:bg-slate-800"><tr><th class="px-4 py-2 text-left">Semana</th><th class="px-4 py-2 text-right">Total</th></tr></thead>
                                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                    @forelse ($calculosSemanales as $semana)
                                        <tr>
                                            <td class="px-4 py-3">{{ $semana['inicio']->format('d/m/Y') }} – {{ $semana['fin']->format('d/m/Y') }}</td>
                                            <td class="px-4 py-3 text-right font-bold text-indigo-700 dark:text-indigo-300">{{ $semana['horas'] }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="2" class="px-4 py-8 text-center text-slate-500">No hay jornadas completas para calcular.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <p class="rounded-lg bg-slate-50 px-4 py-3 text-sm text-slate-600 dark:bg-slate-700 dark:text-slate-200">Selecciona un empleado para mostrar el cálculo diario y semanal. Las fechas son opcionales.</p>
            @endif
        </section>

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-600 dark:bg-slate-800">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-200">
                    <thead class="bg-slate-100 text-xs uppercase text-slate-600 dark:bg-slate-700 dark:text-slate-200">
                        <tr>
                            <th class="px-5 py-3">No. checador</th><th class="px-5 py-3">Empleado</th><th class="px-5 py-3">Fecha</th>
                            <th class="px-5 py-3">Entrada</th><th class="px-5 py-3">Salida a comida</th><th class="px-5 py-3">Regreso</th>
                            <th class="px-5 py-3">Salida</th><th class="px-5 py-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse ($checks as $check)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                <td class="px-5 py-4">{{ $check->identificador_verificador }}</td>
                                <td class="px-5 py-4 font-semibold">{{ $check->nombre_verificador }}</td>
                                <td class="whitespace-nowrap px-5 py-4">{{ $check->fecha_verificador?->format('d/m/Y') ?? '—' }}</td>
                                <td class="px-5 py-4">{{ $check->hora_entrada_verificador ?: '—' }}</td>
                                <td class="px-5 py-4">{{ $check->hora_salida_comida_verificador ?: '—' }}</td>
                                <td class="px-5 py-4">{{ $check->hora_entrada_comida_verificador ?: '—' }}</td>
                                <td class="px-5 py-4">{{ $check->hora_salida_verificador ?: '—' }}</td>
                                <td class="px-5 py-4 capitalize">{{ $check->estado_verificador }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="px-5 py-12 text-center text-slate-500">No hay registros de checadas.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($checks->hasPages())
                <div class="border-t border-slate-200 px-5 py-4 dark:border-slate-700">{{ $checks->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
