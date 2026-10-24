<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Control diario de salida del vehículo
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="mb-5">
            <a href="{{ route('index-vehiculos') }}" class="text-blue-600 hover:underline dark:text-blue-300">
                ← Volver a vehículos
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif
        @error('odometro_final')
            <div class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-800">
                {{ $message }}
            </div>
        @enderror

        <section class="mb-6 rounded-lg bg-white p-6 shadow dark:bg-gray-700">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $vehiculo->nombre_vehiculo }} — {{ $vehiculo->placas_vehiculo }}
            </h1>
            <p class="mt-1 text-gray-600 dark:text-gray-300">
                {{ $vehiculo->marca_vehiculo }} {{ $vehiculo->modeloAño_vehiculo }}
            </p>
        </section>

        <section class="mb-8 rounded-lg bg-white p-6 shadow dark:bg-gray-700">
            <div class="mb-5 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Resumen del día</h2>
                <form method="GET" action="{{ route('salidas-vehiculo', $vehiculo->id) }}" class="flex items-end gap-2">
                    <div>
                        <label for="fecha_filtro" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">Consultar fecha</label>
                        <input id="fecha_filtro" type="date" name="fecha" value="{{ $fecha }}" required
                            class="rounded-md border-gray-300 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                    </div>
                    <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700">
                        Consultar
                    </button>
                </form>
            </div>

            <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">
                Totales para {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}
            </p>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="rounded-lg bg-blue-50 p-4 text-center dark:bg-blue-900">
                    <p class="text-sm font-semibold text-blue-800 dark:text-blue-100">Kilómetros recorridos</p>
                    <p class="mt-1 text-2xl font-bold text-blue-900 dark:text-white">{{ number_format($resumen['kilometros'], 2) }} km</p>
                </div>
                <div class="rounded-lg bg-green-50 p-4 text-center dark:bg-green-900">
                    <p class="text-sm font-semibold text-green-800 dark:text-green-100">Dinero entregado</p>
                    <p class="mt-1 text-2xl font-bold text-green-900 dark:text-white">${{ number_format($resumen['dinero'], 2) }}</p>
                </div>
                <div class="rounded-lg bg-amber-50 p-4 text-center dark:bg-amber-900">
                    <p class="text-sm font-semibold text-amber-800 dark:text-amber-100">Litros cargados</p>
                    <p class="mt-1 text-2xl font-bold text-amber-900 dark:text-white">{{ number_format($resumen['litros'], 2) }} L</p>
                </div>
            </div>
            @if($resumen['pendientes'] > 0)
                <p class="mt-4 rounded bg-yellow-100 p-3 text-sm font-semibold text-yellow-900 dark:bg-yellow-900 dark:text-yellow-100">
                    {{ $resumen['pendientes'] }} {{ $resumen['pendientes'] === 1 ? 'salida pendiente' : 'salidas pendientes' }} de registrar odómetro final.
                </p>
            @endif
        </section>

        <section class="mb-8 rounded-lg bg-white p-6 shadow dark:bg-gray-700">
            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Registrar salida</h2>
            <p class="mb-5 text-sm text-gray-600 dark:text-gray-300">Captura estos datos antes de que el vehículo salga. El odómetro final se registra al regresar.</p>

            <form method="POST" action="{{ route('store-salida-vehiculo', $vehiculo->id) }}" class="grid grid-cols-1 gap-5 md:grid-cols-2">
                @csrf

                <div>
                    <label for="fecha" class="mb-1 block text-sm font-semibold text-gray-700 dark:text-gray-200">Fecha</label>
                    <input id="fecha" name="fecha" type="date" value="{{ old('fecha', $fecha) }}" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                    @error('fecha') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="conductor_id" class="mb-1 block text-sm font-semibold text-gray-700 dark:text-gray-200">Conductor</label>
                    <select id="conductor_id" name="conductor_id" class="w-full rounded-md border-gray-300 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                        <option value="">Selecciona un conductor</option>
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id }}" @selected(old('conductor_id') == $empleado->id)>
                                {{ $empleado->Nombre }} {{ $empleado->apellidos }}
                            </option>
                        @endforeach
                    </select>
                    @error('conductor_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="obra" class="mb-1 block text-sm font-semibold text-gray-700 dark:text-gray-200">Obra o destino</label>
                    <input id="obra" name="obra" type="text" maxlength="150" value="{{ old('obra') }}" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                    @error('obra') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="odometro_inicial" class="mb-1 block text-sm font-semibold text-gray-700 dark:text-gray-200">Odómetro inicial (km)</label>
                    <input id="odometro_inicial" name="odometro_inicial" type="number" min="0" step="0.01" value="{{ old('odometro_inicial') }}" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                    @error('odometro_inicial') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="dinero_entregado" class="mb-1 block text-sm font-semibold text-gray-700 dark:text-gray-200">Dinero entregado al conductor ($)</label>
                    <input id="dinero_entregado" name="dinero_entregado" type="number" min="0" step="0.01" value="{{ old('dinero_entregado', '0.00') }}" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                    @error('dinero_entregado') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="litros_cargados" class="mb-1 block text-sm font-semibold text-gray-700 dark:text-gray-200">Litros cargados</label>
                    <input id="litros_cargados" name="litros_cargados" type="number" min="0" step="0.01" value="{{ old('litros_cargados', '0.00') }}" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                    @error('litros_cargados') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="rounded-md bg-green-600 px-6 py-3 font-semibold text-white hover:bg-green-700">
                        Guardar registro diario
                    </button>
                </div>
            </form>
        </section>

        <section class="rounded-lg bg-white p-6 shadow dark:bg-gray-700">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                Registros del {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}
            </h2>
            @if($salidas->isEmpty())
                <p class="rounded bg-gray-100 p-4 text-center text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    No hay salidas registradas para esta fecha.
                </p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-200 text-gray-800 dark:bg-gray-600 dark:text-white">
                            <tr>
                                <th class="px-3 py-3">Conductor</th>
                                <th class="px-3 py-3">Obra</th>
                                <th class="px-3 py-3">Odómetro inicial</th>
                                <th class="px-3 py-3">Odómetro final</th>
                                <th class="px-3 py-3">Km recorridos</th>
                                <th class="px-3 py-3">Dinero entregado</th>
                                <th class="px-3 py-3">Litros cargados</th>
                                <th class="px-3 py-3">Regreso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salidas as $salida)
                                <tr class="border-t border-gray-200 dark:border-gray-600 dark:text-gray-100">
                                    <td class="px-3 py-3">{{ $salida->conductor ? $salida->conductor->Nombre . ' ' . $salida->conductor->apellidos : 'No especificado' }}</td>
                                    <td class="px-3 py-3">{{ $salida->obra }}</td>
                                    <td class="px-3 py-3">{{ number_format($salida->odometro_inicial, 2) }} km</td>
                                    <td class="px-3 py-3">{{ $salida->odometro_final !== null ? number_format($salida->odometro_final, 2) . ' km' : 'Pendiente' }}</td>
                                    <td class="px-3 py-3">{{ $salida->kilometros_recorridos !== null ? number_format($salida->kilometros_recorridos, 2) . ' km' : 'Pendiente' }}</td>
                                    <td class="px-3 py-3">${{ number_format($salida->dinero_entregado, 2) }}</td>
                                    <td class="px-3 py-3">{{ number_format($salida->litros_cargados, 2) }} L</td>
                                    <td class="px-3 py-3">
                                        @if($salida->odometro_final === null)
                                            <form method="POST" action="{{ route('finalizar-salida-vehiculo', ['id' => $vehiculo->id, 'salida' => $salida->id]) }}" class="flex min-w-52 items-center gap-2">
                                                @csrf
                                                @method('PATCH')
                                                <input type="number" name="odometro_final" min="{{ $salida->odometro_inicial }}" step="0.01" required
                                                    placeholder="Km al regresar" aria-label="Odómetro final al regresar"
                                                    class="w-32 rounded-md border-gray-300 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                                                <button type="submit" class="rounded bg-blue-600 px-3 py-2 text-xs font-semibold text-white hover:bg-blue-700">
                                                    Cerrar
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-green-700 dark:text-green-300">Registrado</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </div>
</x-app-layout>
