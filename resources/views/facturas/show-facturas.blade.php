<x-app-layout>
    <!-- <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">-->
    <!-- Card Principal -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
        <div class="px-6 py-8 sm:px-8">
            <form action="{{ route('show-facturas', $factura->id) }}" enctype="multipart/form-data" method="GET" class="space-y-6">
                @csrf

                <div class="text-center text-lg font-semibold  text-gray-800 dark:text-white">
                    REVISIÓN DE FACTURA
                </div>
                <!-- Información del Cliente -->

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    Información general
                </h3>
                <div class="grid grid-cols-4 md:grid-cols-4 gap-4">

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
                    <!--Folio de factura-->
                    <div>
                        <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Folio de factura<span class="text-red-500">*</span>
                        </label>
                        <input readonly type="text" id="folio_factura" name="folio_factura" value="{{ $factura->folio_factura }}" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('folio_factura') border-red-500 @enderror">
                        @error('folio_factura')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Folio fiscal de factura -->
                    <div>
                        <label for="folio_fiscal"" class=" block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Folio fiscal de factura (Opcional)<span class="text-red-500">*</span>
                        </label>
                        <input readonly type="text" id="folio_fiscal" name="folio_fiscal" value="{{ $factura->folio_fiscal }}" class="w-full block px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('folio_fiscal') border-red-500 @enderror">
                        @error('folio_fiscal')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!----------------------------------------------- FECHA DE PAGO --------------------------------------------------------------->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4  flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-1">
                            <path d="M19.5,2h-1.5V.5c0-.28-.22-.5-.5-.5s-.5,.22-.5,.5v1.5H7V.5c0-.28-.22-.5-.5-.5s-.5,.22-.5,.5v1.5h-1.5C2.02,2,0,4.02,0,6.5v13c0,2.48,2.02,4.5,4.5,4.5h15c2.48,0,4.5-2.02,4.5-4.5V6.5c0-2.48-2.02-4.5-4.5-4.5Zm-8,7v4H7v-4h4.5Zm5.5,0v4h-4.5v-4h4.5Zm6,0v4h-5v-4h5ZM6,13H1v-4H6v4Zm-5,1H6v4H1v-4Zm6,0h4.5v4H7v-4Zm4.5,5v4H7v-4h4.5Zm1,0h4.5v4h-4.5v-4Zm0-1v-4h4.5v4h-4.5Zm5.5-4h5v4h-5v-4ZM4.5,3h15c1.93,0,3.5,1.57,3.5,3.5v1.5H1v-1.5c0-1.93,1.57-3.5,3.5-3.5ZM1,19.5v-.5H6v4h-1.5c-1.93,0-3.5-1.57-3.5-3.5Zm18.5,3.5h-1.5v-4h5v.5c0,1.93-1.57,3.5-3.5,3.5Z" />
                        </svg>
                        Fecha de pago
                    </h3>
                </div>
                <!-- Fecha de emisión -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div class="">
                        <label for="fecha_emision" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Fecha de emisión<span class="text-red-500">*</span>
                        </label>
                        <input disabled type="date" name="fecha_emision" id="fecha_emision" value="{{ $factura->fecha_emision }}" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('fecha_emision') border-red-500 @enderror">
                    </div>
                    <!-- Fecha de vencimiento -->
                    <div class="">
                        <label for="fecha_vencimiento" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Fecha de vencimiento <span class="text-red-500">*</span>
                        </label>
                        <input disabled type="date" name="fecha_vencimiento" id="fecha_vencimiento" value="{{ $factura->fecha_vencimiento }}" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('fecha_vencimiento') border-red-500 @enderror">
                    </div>
                    <!-- Fecha de pago -->
                    <div class="">
                        <label for="subtotal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Fecha de pago <span class="text-red-500">*</span>
                        </label>
                        <input disabled type="date" name="fecha_pago" id="fecha_pago" value="{{ $factura->fecha_pago }}" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('fecha_pago') border-red-500 @enderror">
                    </div>
                </div>
                <!---------------------------------------PERSONAL RESPONSABLE---------------------------------------------------------------------------->
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                    </svg>
                    Personal responsable
                </h3>

                <div class="grid grid-cols-3 md:grid-cols-3 gap-3">
                    <!-- responsable factura -->
                    <div>
                        <label for="" class=" block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Recibe: <span class="text-red-500">*</span>
                        </label> <!--Si recibe_factura es igual a almacen, va a marcar como checked, si no, es null-->
                        <input class="w-full" disabled type="text" name="recibe_factura" value="{{ $factura->recibe_factura ?? 'Sin recibir' }}">
                    </div>

                    <!-- Campo para la persona responsable de almacén -->
                    <div id="responsable-almacen">
                        <label for="responsable_almacen" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Responsable de almacén<span class="text-red-500">*</span>
                        </label>
                        <input disabled class="w-full" type="text" value="{{ $factura->responsable_almacen_id ?? 'Sin responsable' }}">
                        @error('responsable_almacen')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Campo para chofer responsable-->
                    <div id="responsable-chofer">
                        <label for="responsable_chofer_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Persona responsable(Chofer)<span class="text-red-500">*</span>
                        </label>
                        <input disabled class="w-full" type="text" value="{{ $factura->responsable_chofer_id ?? 'Sin responsable' }}">
                        @error('responsable_chofer_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!--CAMPOS PARA EL CHOFER Y OBRA-->
                <div class="grid grid-cols-2 md:grid-cols-2 gap-2">
                    <div class="mt-6">
                        <label for="destino_factura" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Destino:<span class="text-red-500">*</span>
                        </label>
                        <input disabled class="w-full" type="text" value="{{ $factura->destino_factura }}">
                    </div>

                    <!--Campo para la seleccion de la obra-->
                    <div id="campo-obra" class="mt-6">
                        <label for="obra_factura" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nombre de la obra:<span class="text-red-500">*</span>
                        </label>
                        <input disabled class="w-full" type="text" value="{{ $factura->obra_factura_id ?? 'Sin obra asignada' }}">
                    </div>
                    <!-- Información de Ayuda 
                <div class="mt-6 bg-blue-50 dark:bg-blue-900 border border-blue-200 dark:border-blue-700 rounded-lg p-4">
                    <div class="flex">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-semibold text-blue-900 dark:text-blue-200">Consejo útil</h4>
                            <p class="text-sm text-blue-800 dark:text-blue-300 mt-1">Completa todos los campos marcados con <span class="text-red-500 font-semibold">*</span> para crear una factura válida.</p>
                        </div>
                    </div>
                </div>-->
                </div>
                <!----------------------------------Totales y facturas----------------------------------->
                <div class="grid grid-cols-3 md:grid-cols-3 gap-2 mt-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                        </svg>

                        Total y status
                    </h3>
                </div>
                <!-- Total -->
                <div class="grid grid-cols-2 md:grid-cols-2 gap-2">
                    <div>
                        <label for="subtotal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Total <span class="text-red-500">*</span>
                        </label>
                        <input readonly class="w-full" type="number" id="total_factura" name="total_factura" value="{{ $factura->total_factura }}" placeholder="0.00" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('total_factura') border-red-500 @enderror">
                        @error('total_factura')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <input readonly class="w-full" type="text" value="{{ $factura->status_factura }}">
                        @error('status_factura')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!----------------------------------Info adicional---------->
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>

                    Información Adicional
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-2">
                    <!-- Notas -->
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Observaciones o notas:
                        </label>
                        <input readonly type="textarea" id="observaciones_factura" name="observaciones_factura" value="{{ $factura->observaciones_factura ?? 'Sin observaciones' }}" placeholder="Notas adicionales..." class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    </div>
                

                <!-- Comprobante -->
                <div class="mt-6">
                    <label for="comprobante_pdf" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Comprobante
                    </label>
                    @if($factura->comprobante_pdf)
                    <div class="flex justify-center"> <!--Revisar por que no muestra las imagenes-->
                        <a href="{{ asset('storage/app/public'. $factura->comprobante_pdf)}}"
                            target="_blank" class="mr-6 inline-flex items-center justify-center p-5 w-20 h-20 bg-green-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white rounded transition-colors" title="Ver comprobante">
                            <svg id="Layer_1" height="80" viewBox="0 0 24 24" width="80" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                                <path d="m16.652 15.548a1.5 1.5 0 0 1 -.189 2.1 5.981 5.981 0 0 1 -3.47 1.352 3.33 3.33 0 0 1 -2.179-.841 2.4 2.4 0 0 0 -.236-.174 3.535 3.535 0 0 0 -1.1.649 1.5 1.5 0 0 1 -1.969-2.263 5.409 5.409 0 0 1 3.126-1.371 3.133 3.133 0 0 1 2.032.8c.256.2.27.2.326.2a3.028 3.028 0 0 0 1.551-.656 1.5 1.5 0 0 1 2.108.204zm-1.152-5.548h-7a1.5 1.5 0 0 0 0 3h7a1.5 1.5 0 0 0 0-3zm6.5-2.843v11.343a5.506 5.506 0 0 1 -5.5 5.5h-9a5.506 5.506 0 0 1 -5.5-5.5v-13a5.506 5.506 0 0 1 5.5-5.5h7.343a5.464 5.464 0 0 1 3.889 1.611l1.657 1.657a5.464 5.464 0 0 1 1.611 3.889zm-3 11.343v-11.5h-2a2 2 0 0 1 -2-2v-2h-7.5a2.5 2.5 0 0 0 -2.5 2.5v13a2.5 2.5 0 0 0 2.5 2.5h9a2.5 2.5 0 0 0 2.5-2.5z" />
                            </svg>
                        </a>
                         <p class="justify-center ml-2 mt-6 text-large text-gray-500"><-Haga clic para ver el comprobante</p>
                    </div>
                    @else
                    <span class="text-gray-400">Sin comprobante</span>
                    @endif
                </div>
                </div>
        </div>
    </div>
</x-app-layout>