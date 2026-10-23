<x-guest-layout>
    <form method="POST" action="{{ route('update-vacaciones-empleado', $vacacion->id) }}">
        @csrf
        @method('PUT')

        <div class="max-w-4xl mx-auto mt-10 p-8 bg-white dark:bg-gray-900 shadow-lg rounded-2xl">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-2">Editar Vacaciones del Empleado</h2>
            <h4 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-6">{{ $vacacion->empleado->Nombre }} {{$vacacion->empleado->apellidos}}</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Periodo (año-año)</label>
                    <input type="text" name="periodo" required pattern="[0-9]{4}-[0-9]{4}" maxlength="9" value="{{ old('periodo', $vacacion->periodo) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                    @error('periodo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio', optional($vacacion->fecha_inicio)->format('Y-m-d')) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de fin</label>
                    <input type="date" name="fecha_fin" value="{{ old('fecha_fin', optional($vacacion->fecha_fin)->format('Y-m-d')) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Días tomados</label>
                    <input type="number" name="dias_tomados" value="{{ $vacacion->dias_tomados }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Estado</label>
                    <select name="estado" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="pendiente" @selected(old('estado', $vacacion->estado) === 'pendiente')>Pendiente</option>
                        <option value="aprobado" @selected(old('estado', $vacacion->estado) === 'aprobado')>Aprobado</option>
                        <option value="rechazado" @selected(old('estado', $vacacion->estado) === 'rechazado')>Rechazado</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-center mt-8">
                <button type="submit" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">Actualizar</button>
                <a href="{{ route('vacaciones-employee', ['id' => $vacacion->empleado_id, 'periodo' => $vacacion->periodo]) }}"
                   class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200 ml-4">
                    Cancelar
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>