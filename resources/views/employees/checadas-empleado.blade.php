<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Historial de checadas</h2>
    </x-slot>

    <div class="container mx-auto space-y-6 px-4 py-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <a href="{{ route('index-employees') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 dark:text-indigo-300">← Volver a empleados</a>
                <h1 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">
                    {{ trim($empleado->Nombre.' '.$empleado->apellidos) }}
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-300">
                    Checador: {{ $empleado->numero_checador }}
                    @if ($empleado->cargo) · {{ $empleado->cargo }} @endif
                </p>
            </div>
            <a href="{{ route('checadas.index') }}" class="inline-flex justify-center rounded-lg border border-slate-300 px-4 py-2 font-semibold text-slate-700 hover:bg-slate-50 dark:border-slate-500 dark:text-white dark:hover:bg-slate-700">Ver todos los registros</a>
        </div>

        <form method="GET" action="{{ route('checadas.empleado', $empleado) }}" class="grid gap-4 rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-600 dark:bg-slate-800 sm:grid-cols-[1fr_1fr_auto] sm:items-end">
            <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                Desde
                <input type="date" name="desde" value="{{ request('desde') }}" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
            </label>
            <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                Hasta
                <input type="date" name="hasta" value="{{ request('hasta') }}" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
            </label>
            <div class="flex gap-2">
                <button class="rounded-lg bg-indigo-600 px-5 py-2.5 font-semibold text-white hover:bg-indigo-700">Filtrar</button>
                <a href="{{ route('checadas.empleado', $empleado) }}" class="rounded-lg border border-slate-300 px-4 py-2.5 font-semibold text-slate-600 hover:bg-slate-50 dark:border-slate-500 dark:text-slate-200 dark:hover:bg-slate-700">Limpiar</a>
            </div>
        </form>

        @error('desde') <p class="rounded-lg bg-red-100 px-4 py-3 text-red-800">{{ $message }}</p> @enderror
        @error('hasta') <p class="rounded-lg bg-red-100 px-4 py-3 text-red-800">{{ $message }}</p> @enderror

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-xl bg-indigo-50 p-5 dark:bg-indigo-950"><p class="text-sm text-indigo-700 dark:text-indigo-200">Días registrados</p><p class="mt-1 text-3xl font-bold text-indigo-900 dark:text-white">{{ $resumen->total ?? 0 }}</p></div>
            <div class="rounded-xl bg-emerald-50 p-5 dark:bg-emerald-950"><p class="text-sm text-emerald-700 dark:text-emerald-200">Completos</p><p class="mt-1 text-3xl font-bold text-emerald-900 dark:text-white">{{ $resumen->completos ?? 0 }}</p></div>
            <div class="rounded-xl bg-amber-50 p-5 dark:bg-amber-950"><p class="text-sm text-amber-700 dark:text-amber-200">Incompletos</p><p class="mt-1 text-3xl font-bold text-amber-900 dark:text-white">{{ $resumen->incompletos ?? 0 }}</p></div>
            <div class="rounded-xl bg-red-50 p-5 dark:bg-red-950"><p class="text-sm text-red-700 dark:text-red-200">Faltas</p><p class="mt-1 text-3xl font-bold text-red-900 dark:text-white">{{ $resumen->faltas ?? 0 }}</p></div>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-600 dark:bg-slate-800">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-200">
                    <thead class="bg-slate-100 text-xs uppercase text-slate-600 dark:bg-slate-700 dark:text-slate-200">
                        <tr>
                            <th class="px-5 py-3">Fecha</th>
                            <th class="px-5 py-3">Entrada</th>
                            <th class="px-5 py-3">Salida a comida</th>
                            <th class="px-5 py-3">Regreso de comida</th>
                            <th class="px-5 py-3">Salida</th>
                            <th class="px-5 py-3">Comida</th>
                            <th class="px-5 py-3">Horas totales</th>
                            <th class="px-5 py-3">Horas extra</th>
                            <th class="px-5 py-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse ($checks as $check)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                <td class="whitespace-nowrap px-5 py-4 font-semibold">{{ $check->fecha_verificador?->format('d/m/Y') ?? '—' }}</td>
                                <td class="px-5 py-4">{{ $check->hora_entrada_verificador ?: '—' }}</td>
                                <td class="px-5 py-4">{{ $check->hora_salida_comida_verificador ?: '—' }}</td>
                                <td class="px-5 py-4">{{ $check->hora_entrada_comida_verificador ?: '—' }}</td>
                                <td class="px-5 py-4">{{ $check->hora_salida_verificador ?: '—' }}</td>
                                <td class="px-5 py-4">{{ $check->jornada['comida'] }}</td>
                                <td class="px-5 py-4 font-semibold">{{ $check->jornada['horas'] }}</td>
                                <td class="px-5 py-4 {{ $check->jornada['tiene_horas_extra'] ? 'font-bold text-amber-700 dark:text-amber-300' : '' }}">{{ $check->jornada['tiene_horas_extra'] ? $check->jornada['horas_extra'].' extra' : 'Sin horas extra' }}</td>
                                <td class="px-5 py-4">
                                    @php
                                        $claseEstado = match ($check->estado_verificador) {
                                            'completo' => 'bg-emerald-100 text-emerald-800',
                                            'falta' => 'bg-red-100 text-red-800',
                                            'descanso' => 'bg-slate-100 text-slate-700',
                                            'permiso' => 'bg-blue-100 text-blue-800',
                                            default => 'bg-amber-100 text-amber-800',
                                        };
                                    @endphp
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $claseEstado }}">{{ ucfirst($check->estado_verificador) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="9" class="px-5 py-12 text-center text-slate-500">No hay checadas para este empleado en el periodo seleccionado.</td></tr>
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
