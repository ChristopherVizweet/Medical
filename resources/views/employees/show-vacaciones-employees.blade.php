<x-app-layout>
    <div class="container mx-auto mt-4">
        <!-- Botón de regreso -->
        <div class="mb-4">
            <a href="{{ route('index-employees') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                ← {{ __('Volver') }}
            </a>
        </div>

        <!-- Encabezado principal -->
        <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white p-6 rounded-t-lg shadow-lg mb-0">
            <h1 class="text-3xl font-bold text-center">{{ __('INFORMACIÓN DE VACACIONES DE LOS EMPLEADOS') }}</h1>
        </div>

        <!-- Contenedor principal -->
        <div class="bg-white dark:bg-gray-700 rounded-b-lg shadow-lg p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Sección izquierda: Información del empleado -->
                <div class="lg:col-span-2">
                    <div class="grid grid-cols-2 gap-6">
                        <!-- ID -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">{{ __('ID') }}</label>
                            <div class="bg-gray-100 dark:bg-gray-600 border-2 border-gray-300 dark:border-gray-500 rounded px-4 py-3">
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $empleados->numero_checador ?? 'EMP-' . str_pad($empleados->id, 4, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="lg:col-span-1">
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">{{ __('NOMBRE COLABORADOR') }}</label>
                            <div class="bg-gray-100 dark:bg-gray-600 border-2 border-gray-300 dark:border-gray-500 rounded px-4 py-3">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $empleados->Nombre }} {{ $empleados->apellidos }}</p>
                            </div>
                        </div>

                        <!-- Puesto -->
                        <div class="lg:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">{{ __('PUESTO') }}</label>
                            <div class="bg-gray-100 dark:bg-gray-600 border-2 border-gray-300 dark:border-gray-500 rounded px-4 py-3">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $empleados->cargo ?? 'No especificado' }}</p>
                            </div>
                        </div>

                        <!-- Antigüedad -->
                        <div class="lg:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">{{ __('ANTIGÜEDAD') }}</label>
                            <div class="bg-gray-100 dark:bg-gray-600 border-2 border-gray-300 dark:border-gray-500 rounded px-4 py-3">
                                @php
                                    if ($empleados->fecha_nacimiento) {
                                        $hoy = \Carbon\Carbon::now();
                                        $antigüedad = \Carbon\Carbon::parse($empleados->fecha_nacimiento);
                                        $años = $hoy->diffInYears($antigüedad);
                                        $meses = $hoy->copy()->subYears($años)->diffInMonths($antigüedad);
                                        $dias = $hoy->copy()->subYears($años)->subMonths($meses)->diffInDays($antigüedad);
                                        $textoAntigüedad = "{$años} Años, {$meses} Mes(es) y {$dias} Día(s)";
                                    } else {
                                        $textoAntigüedad = 'No especificada';
                                    }
                                @endphp
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $textoAntigüedad }}</p>
                            </div>
                        </div>
                        <form action="{{ route('store-derecho-vacaciones', $empleados->id) }}" method="POST" class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4 rounded-lg border border-blue-300 bg-blue-50 p-4 dark:border-blue-700 dark:bg-blue-900/30">
                            @csrf
                            <h2 class="col-span-2 font-bold text-gray-900 dark:text-white">{{ __('Días destinados de vacaciones') }}</h2>
                            <div>
                                <label for="fecha_inicio_vacaciones" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">{{ __('Fecha de Inicio') }}</label>
                                <input type="date" id="fecha_inicio_vacaciones" name="fecha_inicio_vacaciones" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white" value="{{ old('fecha_inicio_vacaciones', optional($empleados->fecha_inicio_vacaciones)->format('Y-m-d')) }}">
                                @error('fecha_inicio_vacaciones')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="fecha_fin_vacaciones" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">{{ __('Fecha de Fin') }}</label>
                                <input type="date" id="fecha_fin_vacaciones" name="fecha_fin_vacaciones" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white" value="{{ old('fecha_fin_vacaciones', optional($empleados->fecha_fin_vacaciones)->format('Y-m-d')) }}">
                                @error('fecha_fin_vacaciones')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <button type="submit" class="inline-flex items-center px-5 py-2 bg-blue-600 rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700">
                                    {{ __('Guardar derecho a vacaciones') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sección derecha: Foto e información de vacaciones -->
                <div class="lg:col-span-1 flex flex-col items-center">
                    <!-- Foto del empleado -->
                    <div class="mb-6 w-full">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 text-center">{{ __('IMAGEN DEL EMPLEADO') }}</label>
                        <div class="bg-gray-200 dark:bg-gray-600 rounded-lg overflow-hidden border-2 border-gray-300 dark:border-gray-500">
                            @if($empleados->foto)
                                <img src="{{ asset('storage/' . $empleados->foto) }}" alt="Foto del empleado" class="w-full h-auto object-cover">
                            @else
                                <div class="w-full h-48 flex items-center justify-center bg-gray-300 dark:bg-gray-600">
                                    <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Información de vacaciones -->
                    <div class="w-full space-y-4">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-lg border-2 border-blue-300 dark:border-blue-600 p-4 text-center">
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 mb-2">{{ __('DERECHO A VACACIONES') }}</label>
                            <p class="text-3xl font-bold text-blue-600 dark:text-blue-300">{{ $derechoVacaciones }}</p>
                        </div>

                        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900 dark:to-yellow-800 rounded-lg border-2 border-yellow-300 dark:border-yellow-600 p-4 text-center">
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 mb-2">{{ __('DÍAS OCUPADOS') }}</label>
                            <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-300">{{ $diasOcupados }}</p>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 rounded-lg border-2 border-green-300 dark:border-green-600 p-4 text-center">
                            <label class="block text-xs font-bold text-gray-700 dark:text-gray-300 mb-2">{{ __('DÍAS DISPONIBLES') }}</label>
                            <p class="text-3xl font-bold text-green-600 dark:text-green-300">{{ $diasDisponibles >= 0 ? $diasDisponibles : 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de vacaciones -->
            @if($vacaciones->count() > 0)
            <div class="mt-8">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4 pb-2 border-b-2 border-purple-600">
                    {{ __('INFORMACIÓN DE LOS DÍAS TOMADOS COMO VACACIONES') }}
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left font-bold">{{ __('ID') }}</th>
                                <th class="px-4 py-3 text-left font-bold">{{ __('NOMBRE COLABORADOR') }}</th>
                                <th class="px-4 py-3 text-left font-bold">{{ __('PUESTO') }}</th>
                                <th class="px-4 py-3 text-center font-bold">{{ __('FECHA INICIO') }}</th>
                                <th class="px-4 py-3 text-center font-bold">{{ __('FECHA FIN') }}</th>
                                <th class="px-4 py-3 text-center font-bold">{{ __('DÍAS TOMADOS') }}</th>
                                <th class="px-4 py-3 text-center font-bold">{{ __('ESTADO') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vacaciones as $index => $vac)
                            <tr class="@if($index % 2 == 0) bg-gray-50 dark:bg-gray-600 @else bg-white dark:bg-gray-700 @endif border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-500">
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $empleados->numero_checador ?? 'EMP-' . str_pad($empleados->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $empleados->Nombre }} {{ $empleados->apellidos }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $empleados->cargo ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-center text-gray-900 dark:text-white">{{ $vac->fecha_inicio->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-center text-gray-900 dark:text-white">{{ $vac->fecha_fin->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-block px-3 py-1 bg-purple-200 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded font-bold">{{ $vac->dias_tomados }}</span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if($vac->estado == 'aprobado')
                                        <span class="inline-block px-3 py-1 bg-green-200 dark:bg-green-900 text-green-800 dark:text-green-200 rounded text-xs font-bold">{{ __('APROBADO') }}</span>
                                    @elseif($vac->estado == 'pendiente')
                                        <span class="inline-block px-3 py-1 bg-yellow-200 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded text-xs font-bold">{{ __('PENDIENTE') }}</span>
                                    @else
                                        <span class="inline-block px-3 py-1 bg-red-200 dark:bg-red-900 text-red-800 dark:text-red-200 rounded text-xs font-bold">{{ __('RECHAZADO') }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="mt-8 bg-gray-100 dark:bg-gray-600 rounded-lg p-6 text-center">
                <p class="text-gray-600 dark:text-gray-300 font-semibold">{{ __('No hay registros de vacaciones para este empleado') }}</p>
            </div>
            @endif

            <!-- Formulario para agregar nuevas vacaciones -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-lg border-2 border-blue-300 dark:border-blue-600 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">{{ __('Agregar Nuevo Período de Vacaciones') }}</h3>
                
                <form action="{{ route('store-vacaciones', $empleados->id) }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Fecha Inicio -->
                        <div>
                            <label for="fecha_inicio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">{{ __('Fecha de Inicio') }}</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('fecha_inicio') }}">
                            @error('fecha_inicio')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha Fin -->
                        <div>
                            <label for="fecha_fin" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">{{ __('Fecha de Fin') }}</label>
                            <input type="date" id="fecha_fin" name="fecha_fin" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('fecha_fin') }}">
                            @error('fecha_fin')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="estado" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">{{ __('Estado') }}</label>
                            <select id="estado" name="estado" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">{{ __('Seleccionar estado') }}</option>
                                <option value="aprobado" @selected(old('estado') === 'aprobado')>{{ __('Aprobado') }}</option>
                                <option value="pendiente" @selected(old('estado') === 'pendiente')>{{ __('Pendiente') }}</option>
                                <option value="rechazado" @selected(old('estado') === 'rechazado')>{{ __('Rechazado') }}</option>
                            </select>
                            @error('estado')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Observaciones -->
                        <div>
                            <label for="observaciones" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">{{ __('Observaciones') }}</label>
                            <textarea id="observaciones" name="observaciones" rows="2" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('observaciones') }}</textarea>
                            @error('observaciones')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="inline-flex items-center px-6 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            {{ __('Guardar Período de Vacaciones') }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Botones de acción -->
            <div class="mt-8 flex gap-4 flex-wrap">
                <a href="{{ route('edit-employees', $empleados->id) }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Editar Empleado') }}
                </a>
                <a href="{{ route('index-employees') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Volver a Lista') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
