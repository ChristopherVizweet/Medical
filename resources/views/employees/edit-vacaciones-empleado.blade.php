<x-guest-layout>
    <form method="POST" action="{{ route('update-vacaciones-empleado', $vacacion->id) }}">
        @csrf
        @method('PUT')

        <div class="max-w-4xl mx-auto mt-10 p-8 bg-white dark:bg-gray-900 shadow-lg rounded-2xl">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-2">Editar Vacaciones del Empleado</h2>
            <h4 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-6">{{ $vacacion->empleado->Nombre }} {{$vacacion->empleado->apellidos}}</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                    <input type="text" name="estado" value="{{ old('estado', $vacacion->estado) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                </div>
            </div>

            <div class="flex justify-center mt-8">
                <button type="submit" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">Actualizar</button>
                <a href="{{ route('vacaciones-employee', $vacacion->empleado_id) }}" 
                   class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200 ml-4">
                    Cancelar
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>