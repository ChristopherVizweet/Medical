<x-app-layout>

        <!-- Name -->
        <div class="mt-4">

            <div class=" text-center text-gray-800 dark:text-white">
                <h1 class="text-2xl font-bold">BITÁCORA DE TENENCIAS DE VEHÍCULOS</h1>
            </div>
            <div class="p-2 mt-4 border border-gray-400 rounded-lg p-4 text-center text-2xl font-bold text-gray-800 dark:text-white">
                <div>
                    <label>Información del vehículo</label>
                </div>
                <div class="p-8 grid grid-cols-2 md:grid-cols-4 gap-4">
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
 <form method="POST" action="{{ route('store-mantenimiento', $vehiculo->id) }}" enctype="multipart/form-data">
        @csrf
            <div class=" mt-4 border border-gray-400 rounded-lg p-4 text-center text-2xl font-bold text-gray-800 dark:text-white">
                <label for="">REGISTRO DE TENENCIAS</label>
                <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="">
                        <x-input-label for="">Fecha de servicio</x-input-label>
                        <input type="date" name="fecha_pago_tenencias"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="">
                        <x-input-label for="">Monto pagado</x-input-label>
                        <input type="number" name="monto_tenencias"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="">
                        <x-input-label for="">Comprobante de pago</x-input-label>
                        <input type="file" name="comprobante_tenencias"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="">
                        <x-input-label for="">Fecha proxima a pagar (Opcional)</x-input-label>
                        <input type="date" placeholder="OPCIONAL" name="fecha_tenencias_proxima"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                     <div class="col-span-4 text-center">
                        <x-input-label for="">Comentarios u Observaciones</x-input-label>
                        <input type="text" placeholder="OPCIONAL" name="observaciones_tenencias"  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                
            </div>
        </form>
</x-app-layout>