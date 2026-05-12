<x-guest-layout>

    <form method="POST" action="{{ route('store-mantenimiento', $vehiculo->id) }}" enctype="multipart/form-data">
        @csrf
        
        <!-- Name -->
        <div class="mt-4">

            <div class=" text-center text-gray-800 dark:text-white">
                <h1 class="text-2xl font-bold">BITÁCORA DE MANTENIMIENTO DE VEHÍCULOS</h1>
            </div>
            <div class=" mt-4 border border-gray-400 rounded-lg p-4 text-center text-2xl font-bold text-gray-800 dark:text-white">
                <div>
                    <label>Información del vehículo</label>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div>
                        <x-input-label for="">Nombre</x-input-label>
                        <input type="text"  value="{{ $vehiculo->nombre_vehiculo }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <x-input-label for="">No. Serie</x-input-label>
                        <input type="text"  value="{{ $vehiculo->numeroSerie_vehiculo }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <x-input-label for="">Marca</x-input-label>
                        <input type="text"  value="{{ $vehiculo->marca_vehiculo }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <x-input-label for="">Modelo(año)</x-input-label>
                        <input type="text"  value="{{ $vehiculo->modeloAño_vehiculo }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <x-input-label for="">Placas</x-input-label>
                        <input type="text"  value="{{ $vehiculo->placas_vehiculo }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <x-input-label for="">Área de trabajo</x-input-label>
                        <input type="text"  value="{{ $vehiculo->area_vehiculo }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <x-input-label for="">Encargado</x-input-label>
                        <input type="text"  value="{{ $vehiculo->id_encargado_vehiculo }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <x-input-label for="">Estado</x-input-label>
                        <input type="text"  value="{{ $vehiculo->estado_vehiculo }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="col-span-4">
                        <x-input-label for="">Comentarios u Observaciones</x-input-label>
                        <input type="text" value="{{ $vehiculo->observaciones_vehiculo ?? 'Sin comentarios' }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
            </div>
            <div class=" mt-4 border border-gray-400 rounded-lg p-4 text-center text-2xl font-bold text-gray-800 dark:text-white">
                <label for="">DESCRIPCIÓN DE MANTENIMIENTO REALIZADO</label>
                <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="">
                        <x-input-label for="">Fecha de servicio</x-input-label>
                        <input type="date" name="fecha_servicio"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="col-span-2">
                        <x-input-label for="">Concepto</x-input-label>
                        <input type="text" name="concepto"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="">
                        <x-input-label for="">Cantidad de servicios</x-input-label>
                        <input type="text" name="cantidad_vehiculo"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="col-span-2">
                        <x-input-label for="">KM</x-input-label>
                        <input type="text" name="km_vehiculo"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                     <div class="col-span-2 text-center">
                        <x-input-label for="">Costo unitario</x-input-label>
                        <input type="number" name="costoUnitario_vehiculo"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                     <div class="hidden col-span-2">
                        <x-input-label for="">Total</x-input-label>
                        <input type="number" name="total_vehiculo"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="col-span-4">
                        <x-input-label for="">Usuario encargado</x-input-label>
                        <select class="w-full" name="responsable_mantenimiento_vehiculo" id="">
                            <option value="">--Seleccionar--</option>
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-4 justify-end flex">
                <x-primary-button class="mr-4">Registrar</x-primary-button>
                <a href="{{ route('index-vehiculos') }}"
                    class="px-4 py-2 bg-red-800 dark:bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-red-400 dark:hover:bg-green-400 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Cancelar
                </a>

            </div>
    </form>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
</x-guest-layout>