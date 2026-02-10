<x-guest-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Principal -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="px-6 py-8 sm:px-8">
                    <form action="{{ route('edit-facturas',$factura->id) }}" enctype="multipart/form-data" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="text-center text-lg font-semibold  text-gray-800 dark:text-white">
                            ACTUALIZAR FACTURA
                        </div>
                        <!-- Información del Cliente -->
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">

                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                Información general
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">

                                <!-- Nombre emisor -->
                                <div>
                                    <label for="supplier_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nombre Emisor<span class="text-red-500">*</span>
                                    </label>
                                    <select disabled id="supplier_id" class="w-full nombre_emisor">

                                        @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}" {{ $factura->supplier_id == $factura->id ? 'selected' : '' }}>
                                            {{ $factura->nombre_emisor}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- RFC emisor -->
                                <div>
                                    <label for="rfc_emisor" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        RFC emisor<span class="text-red-500">*</span>
                                    </label>
                                    <input readonly="true" type="text" id="rfc_emisor" value="{{ $factura->rfc_emisor }}"
                                        class="rfc_emisor w-full block x-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('rfc_emisor') border-red-500 @enderror">
                                    @error('rfc_emisor')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Nombre receptor -->
                                <div>
                                    <label for="company_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nombre Receptor<span class="text-red-500">*</span>
                                    </label>
                                    <select disabled readonly="true" id="company_id" class="w-full nombre_emisor">
                                        @foreach($empresas as $empresa)
                                        <option readonly="true" value="{{ $empresa->id }}" {{ $factura->company_id == $factura->id ? 'selected' : '' }}>
                                            {{ $factura->nombre_receptor}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- RFC receptor -->
                                <div>
                                    <label for="rfc_receptor" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        RFC Receptor<span class="text-red-500">*</span>
                                    </label>
                                    <input readonly="true" type="text" id="rfc_receptor" value="{{ $factura->rfc_receptor }}"
                                        class="rfc_receptor w-full block x-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('rfc_emisor') border-red-500 @enderror">
                                    @error('rfc_receptor')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-----------------------------------------------FECHA DE PAGO--------------------------------------------------------------->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4  flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10 mr-1">
                                        <path d="M19.5,2h-1.5V.5c0-.28-.22-.5-.5-.5s-.5,.22-.5,.5v1.5H7V.5c0-.28-.22-.5-.5-.5s-.5,.22-.5,.5v1.5h-1.5C2.02,2,0,4.02,0,6.5v13c0,2.48,2.02,4.5,4.5,4.5h15c2.48,0,4.5-2.02,4.5-4.5V6.5c0-2.48-2.02-4.5-4.5-4.5Zm-8,7v4H7v-4h4.5Zm5.5,0v4h-4.5v-4h4.5Zm6,0v4h-5v-4h5ZM6,13H1v-4H6v4Zm-5,1H6v4H1v-4Zm6,0h4.5v4H7v-4Zm4.5,5v4H7v-4h4.5Zm1,0h4.5v4h-4.5v-4Zm0-1v-4h4.5v4h-4.5Zm5.5-4h5v4h-5v-4ZM4.5,3h15c1.93,0,3.5,1.57,3.5,3.5v1.5H1v-1.5c0-1.93,1.57-3.5,3.5-3.5ZM1,19.5v-.5H6v4h-1.5c-1.93,0-3.5-1.57-3.5-3.5Zm18.5,3.5h-1.5v-4h5v.5c0,1.93-1.57,3.5-3.5,3.5Z" />
                                    </svg>
                                    Fecha de pago
                                </h3>
                            </div>
                            <!-- Fecha de pago -->
                            <div class="">
                                <label for="subtotal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Fecha de pago <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="fecha_pago" id="fecha_pago" value="{{ old('fecha_pago', now()->format('Y-m-d')) }}" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('total_factura') border-red-500 @enderror">

                            </div>
                            <!-----------------------------------------------TOTAL--------------------------------------------------------------->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10">
                                        <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                                    </svg>
                                    Total y status
                                </h3>
                            </div>
                            <!-- Total -->
                            <div class="">
                                <label for="subtotal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Total <span class="text-red-500">*</span>
                                </label>
                                <input readonly="TRUE" type="number" id="total_factura" step="0.01" value="{{ $factura->total_factura }}" placeholder="0.00" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('total_factura') border-red-500 @enderror">
                                @error('total_factura')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mt-3">
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select id="status_factura" name="status_factura" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('status_factura') border-red-500 @enderror">
                                    <option value="pendiente">Pendiente</option>
                                    <option value="completado">Completado</option>
                                </select>
                                @error('status_factura')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Botones de Acción -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                                <a href="{{ route('index-facturas')}}"
                                    class="w-full bg-red-700 sm:w-auto px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                                    Cancelar
                                </a>
                                <a href="">
                                    <button class="inline-flex items-center px-4 py-2 bg-green-700 dark:bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-400 dark:hover:bg-green-400 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Registrar factura</button>
                                </a>
                            </div>
                            {{---Aqui es para mostrar los errores del sistema---}}

                            @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                <strong>¡Error!</strong> Revisa los campos marcados. <br>
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                    </form>
                </div>
            </div>
        </div>

</x-guest-layout>