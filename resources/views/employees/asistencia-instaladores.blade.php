<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Asistencia de instaladores</h2>
    </x-slot>

    <div class="container mx-auto space-y-6 px-4 py-6">
        <div class="flex flex-wrap gap-2 border-b border-slate-200 pb-3 dark:border-slate-600">
            <a href="{{ route('checadas.index') }}" class="rounded-lg px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-700">
                RELOJ CHECADOR
            </a>
            <a href="{{ route('asistencia.instaladores') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white">
                INSTALADORES
            </a>
        </div>
        <div>
            <button type="button" onclick="document.getElementById('modal-proyecto').classList.remove('hidden')" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                Agregar Proyecto/Obra
            </button>
        </div>

        @if (session('success'))
            <div class="rounded-lg border border-green-300 bg-green-100 px-4 py-3 text-green-800">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="rounded-lg border border-red-300 bg-red-100 px-4 py-3 text-red-800">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="modal-proyecto" class="fixed inset-0 z-50 {{ $errors->any() ? '' : 'hidden' }} overflow-y-auto bg-slate-900/60 px-4 py-10" role="dialog" aria-modal="true" aria-labelledby="modal-proyecto-titulo">
            <div class="mx-auto max-w-lg rounded-xl bg-white p-6 shadow-xl dark:bg-slate-800">
                <div class="flex items-center justify-between">
                    <h3 id="modal-proyecto-titulo" class="text-lg font-semibold text-slate-900 dark:text-white">Agregar proyecto u obra</h3>
                    <button type="button" onclick="document.getElementById('modal-proyecto').classList.add('hidden')" class="text-2xl leading-none text-slate-500 hover:text-slate-800 dark:hover:text-white" aria-label="Cerrar">&times;</button>
                </div>
                <form method="POST" action="{{ route('asistencia.instaladores.proyectos.store') }}" class="mt-5 space-y-4">
                    @csrf
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200">
                        Nombre del proyecto
                        <input type="text" name="nombre_proyecto_asistencia" value="{{ old('nombre_proyecto_asistencia') }}" required maxlength="255" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                    </label>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200">
                        Concepto
                        <textarea name="concepto_proyecto_asistencia" maxlength="255" rows="3" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">{{ old('concepto_proyecto_asistencia', 'Sin concepto') }}</textarea>
                    </label>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="document.getElementById('modal-proyecto').classList.add('hidden')" class="rounded-lg border border-slate-300 px-4 py-2 font-semibold text-slate-600 hover:bg-slate-50 dark:border-slate-500 dark:text-slate-200 dark:hover:bg-slate-700">Cancelar</button>
                        <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">Guardar proyecto</button>
                    </div>
                </form>
            </div>
        </div>

            <!-- Formulario para agregar las asistencias de los instaladores -->
        <section>
            <div class="border-b border-slate-200 pb-3 dark:border-slate-600">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">1. Capturar asistencia de instaladores</h3>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-300">Registra la asistencia de los instaladores en los proyectos correspondientes.</p>
                <div class="mt-4">
                    <form method="POST" action="{{ route('asistencia.instaladores.store') }}" class="grid gap-4 rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-600 dark:bg-slate-800 sm:grid-cols-2 lg:grid-cols-[1.2fr_1fr_1fr_1fr_1fr_auto] sm:items-end">
                        @csrf
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Proyecto/Obra
                            <select name="proyecto_id" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                                <option value="">Selecciona un proyecto</option>
                                @foreach ($proyectos as $proyecto)
                                    <option value="{{ $proyecto->id }}">{{ $proyecto->nombre_proyecto_asistencia }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Fecha
                            <input type="date" name="fecha_lote_asistencia" value="{{ old('fecha_lote_asistencia') }}" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                        </label>
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Hora entrada
                            <input type="time" name="hora_entrada" value="{{ old('hora_entrada') }}" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                        </label>
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Hora salida
                            <input type="time" name="hora_salida" value="{{ old('hora_salida') }}" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                        </label>
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Estatus
                            <select name="status_asistencia" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                                <option value="pendiente" {{ old('status_asistencia') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="asistio" {{ old('status_asistencia') == 'asistio' ? 'selected' : '' }}>Asistió</option>
                                <option value="retardo" {{ old('status_asistencia') == 'retardo' ? 'selected' : '' }}>Retardo</option>
                                <option value="ausente" {{ old('status_asistencia') == 'ausente' ? 'selected' : '' }}>Ausente</option>
                            </select>
                        </label>
                         <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-indigo-600 px-5 py-2.5 font-semibold text-white hover:bg-indigo-700">Registrar</button>
                </div>
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-200 sm:col-span-2 lg:col-span-5">
                            Observaciones
                            <textarea name="observaciones" rows="2" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700">{{ old('observaciones') }}</textarea>
                        </label>
                    </form>
                </div>
            </div>
        </section>

        <!--Asistencia de empleados en proyectos de instaladores-->
        <section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-600 dark:bg-slate-800">
            <div class="mb-4 border-b border-slate-200 pb-3 dark:border-slate-700">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Seleccionar empleados</h3>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-300">Marca los empleados que asistieron a este proyecto.</p>
            </div>

            <form method="POST" action="{{ route('asistencia.instaladores.store') }}" class="space-y-5">
                @csrf

                <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
                    @forelse ($proyectos->empleados as $empleado)
                        <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-sm text-slate-700 shadow-sm transition hover:border-indigo-300 hover:bg-indigo-50 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-indigo-500 dark:hover:bg-slate-800">
                            <input type="checkbox" name="empleado_id[]" value="{{ $empleado->id }}" class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="font-medium">{{ $empleado->Nombre }} {{ $empleado->apellidos }}</span>
                        </label>
                    @empty
                        <div class="sm:col-span-2 xl:col-span-3 rounded-lg border border-dashed border-slate-300 p-4 text-sm text-slate-500 dark:border-slate-600 dark:text-slate-300">
                            No hay empleados disponibles.
                        </div>
                    @endforelse
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-indigo-600 px-5 py-2.5 font-semibold text-white hover:bg-indigo-700">Registrar</button>
                </div>
            </form>
        </section>
        
        <section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-600 dark:bg-slate-800">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Proyectos de instaladores</h3>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-300">Consulta los proyectos registrados para controlar la asistencia.</p>

            <div class="mt-5 space-y-6">
                @forelse ($proyectos as $proyecto)
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900/40">
                        <div class="flex flex-col gap-2 border-b border-slate-200 pb-3 dark:border-slate-700 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h4 class="text-base font-semibold text-slate-900 dark:text-white">{{ $proyecto->nombre_proyecto_asistencia ?: 'Sin nombre' }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-300">{{ $proyecto->concepto_proyecto_asistencia ?: 'Sin concepto' }}</p>
                            </div>
                        </div>

                        @if ($proyecto->lotesAsistenciaInstaladores->isNotEmpty())
                            <div class="mt-4 overflow-x-auto">
                                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-200">
                                    <thead class="bg-slate-100 text-xs uppercase text-slate-600 dark:bg-slate-700 dark:text-slate-200">
                                        <tr>
                                            <th class="px-4 py-3">Fecha</th>
                                            <th class="px-4 py-3">Entrada</th>
                                            <th class="px-4 py-3">Salida</th>
                                            <th class="px-4 py-3">Estatus</th>
                                            <th class="px-4 py-3">Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                        @foreach ($proyecto->lotesAsistenciaInstaladores as $lote)
                                            <tr>
                                                <td class="px-4 py-3">{{ $lote->fecha_lote_asistencia ? \Carbon\Carbon::parse($lote->fecha_lote_asistencia)->format('d/m/Y') : '—' }}</td>
                                                <td class="px-4 py-3">{{ $lote->hora_entrada ?: '—' }}</td>
                                                <td class="px-4 py-3">{{ $lote->hora_salida ?: '—' }}</td>
                                                <td class="px-4 py-3">{{ ucfirst($lote->status_asistencia ?? 'pendiente') }}</td>
                                                <td class="px-4 py-3">{{ $lote->observaciones ?: '—' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="mt-4 text-sm text-slate-500 dark:text-slate-300">Aún no hay lotes de asistencia registrados para este proyecto.</p>
                        @endif
                    </div>
                @empty
                    <div class="rounded-xl border border-dashed border-slate-300 px-5 py-12 text-center text-slate-500 dark:border-slate-600 dark:text-slate-300">
                        No hay proyectos de instaladores registrados.
                    </div>
                @endforelse
            </div>
        </section>
    </div>
</x-app-layout>