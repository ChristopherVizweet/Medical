<x-guest-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Principal -->
                <div class="px-6 py-8 sm:px-8">
                    <form action="{{ route('store-facturas') }}" enctype="multipart/form-data" method="POST" class="space-y-6">
                        @csrf
                       
                        <!-- Información del Cliente -->
                        <div class=" border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">
                            
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex text-center items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>

                                Información del Cliente
                            </h3>

                            <div class="mb-9 grid grid-cols-2 md:grid-cols-2 gap-4">

                                <!-- Nombre emisor -->
                                <div>
                                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nombre emisor<span class="text-red-500">*</span>
                                    </label>
                                    <select name="supplier_id" class="w-full nombre_emisor">
                                        <option value="">-Seleccionar-</option>
                                        @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}"
                                            data-rfc_emisor="{{ $proveedor->rfc_supplier }}">{{ $proveedor->name_supplier }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- RFC emisor -->
                                <div>
                                    <label for="rfc_emisor" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        RFC emisor<span class="text-red-500">*</span>
                                    </label>
                                    <input readonly="true" type="text" id="rfc_emisor" name="rfc_emisor" class="rfc_emisor w-full block x-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('rfc_emisor') border-red-500 @enderror">
                                    @error('rfc_emisor')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Nombre receptor -->
                                <div>
                                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nombre receptor<span class="text-red-500">*</span>
                                    </label>
                                    <select name="company_id" class="w-full nombre_receptor" >
                                        <option value="">Seleccionar</option>
                                        @foreach($empresas as $empresa)
                                        <option value="{{ $empresa->id }}"
                                            data-rfc_receptor="{{ $empresa->rfc_company  }}">{{ $empresa->nameCompany }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- RFC receptor -->
                                <div>
                                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        RFC receptor<span class="text-red-500">*</span>
                                    </label>
                                    <input readonly="true" type="text" id="rfc_receptor" name="rfc_receptor" class="rfc_receptor w-full block x-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('rfc_receptor') border-red-500 @enderror">
                                    @error('rfc_receptor')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <script>
                                    // Script para completar el RFC automáticamente al seleccionar un proveedor
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const nombreEmisorSelect = document.querySelector('.nombre_emisor');
                                        const rfcEmisorInput = document.querySelector('#rfc_emisor');

                                        if (nombreEmisorSelect && rfcEmisorInput) {
                                            // Evento para cuando cambia la selección
                                            nombreEmisorSelect.addEventListener('change', function() {
                                                const selectedOption = this.options[this.selectedIndex];
                                                const rfcValue = selectedOption.dataset.rfc_emisor || '';
                                                rfcEmisorInput.value = rfcValue;
                                            });

                                            // Cargar el RFC si ya hay un proveedor seleccionado (edición)
                                            if (nombreEmisorSelect.value) {
                                                const selectedOption = nombreEmisorSelect.options[nombreEmisorSelect.selectedIndex];
                                                rfcEmisorInput.value = selectedOption.dataset.rfc_emisor || '';
                                            }
                                        }
                                    });
                                </script>

                                <script>
                                    // Script para completar el RFC automáticamente al seleccionar un compañia
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const nombreReceptorSelect = document.querySelector('.nombre_receptor');
                                        const rfcReceptorInput = document.querySelector('#rfc_receptor');

                                        if (nombreReceptorSelect && rfcReceptorInput) {
                                            // Evento para cuando cambia la selección
                                            nombreReceptorSelect.addEventListener('change', function() {
                                                const selectedOption = this.options[this.selectedIndex];
                                                const rfcValue1 = selectedOption.dataset.rfc_receptor || '';
                                                rfcReceptorInput.value = rfcValue1;
                                            });

                                            // Cargar el RFC si ya hay un compañia seleccionado (edición)
                                            if (nombreReceptorSelect.value) {
                                                const selectedOption = nombreReceptorSelect.options[nombreReceptorSelect.selectedIndex];
                                                rfcReceptorInput.value = selectedOption.dataset.rfc_receptor || '';
                                            }
                                        }
                                    });
                                </script>
                                <!-- Folio de factura -->
                                <div>
                                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Folio de factura<span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="folio_factura" placeholder="ej. P512458..." name="folio_factura" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('folio_factura') border-red-500 @enderror">
                                    @error('folio_factura')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>



                                <!-- Folio fiscal de factura -->
                                <div>
                                    <label for="folio_fiscal"" class=" block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Folio fiscal de factura (Opcional)<span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="folio_fiscal" placeholder="ej. 002B6996-7866-..." name="folio_fiscal" class="w-full block px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('folio_fiscal') border-red-500 @enderror">
                                    @error('folio_fiscal')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                                <h3 class="mb-6 text-lg font-semibold text-gray-900 dark:text-white mb-4 mt-4 flex text-center items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Fechas
                                </h3>
                            

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Fecha de Emisión -->
                                <div>
                                    <label for="fecha_emision" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Fecha de Emisión <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" id="fecha_emision" name="fecha_emision" value="{{ old('fecha_emision', now()->format('Y-m-d')) }}" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('fecha_emision') border-red-500 @enderror">
                                    @error('fecha_emision')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Fecha de Vencimiento -->
                                <div>
                                    <label for="fecha_vencimiento" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Fecha de Vencimiento
                                    </label>
                                    <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('fecha_vencimiento') border-red-500 @enderror">
                                    @error('fecha_vencimiento')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Fecha de pago -->
                                <div>
                                    <label for="fecha_pago" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Fecha que se pago
                                    </label>
                                    <input type="date" id="fecha_pago" name="fecha_pago" value="{{ old('fecha_pago') }}" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('fecha_pago') border-red-500 @enderror">
                                    @error('fecha_pago')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <!--Se comenta por que se decidio tener una vista especifica para la entrada de material-->
                        <!-- Detalles de la Factura --------------comentario
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>

                                    Detalles de la Factura--------------comentario
                                </h3>

                                <div class="grid grid-cols-3 md:grid-cols-3 gap-6">
                                    Descripción 
                                <div>
                                    <label for="productos[0][product_id]" class=" block text-sm font-medium text-gray-700 dark:text-white">Producto</label>
                                    <select name="productos[0][product_id]" 
                                            class="mb-6 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                            >
                                        <option value="">-- Seleccionar --</option>
                                        @foreach($productos as $producto)
                                            <option class="text-black dark:text-black" value="{{ $producto->id }}">{{ $producto->name_product }} Diametro {{ $producto->diameterMM_product }} mm</option>
                                        @endforeach
                                    </select>
                                </div>
                                Cantidad ---------------comentario
                                <div>
                                    <label for="productos[0][product_id]" class="w-12 block text-sm font-medium text-gray-700 dark:text-white">Cantidad</label>
                                    <input type="number" step="0.01" class="w-full" placeholder="Cantidad deseada">
                                </div>
                            Costo unitario--------------comentario
                                <div>
                                    <label for="productos[0][product_id]" class="w-full block text-sm font-medium text-gray-700 dark:text-white">Costo unitario</label>
                                    <input type="number" step="0.01" class="w-full" placeholder="Costo unitario">
                                </div>
                                </div>
                                Boton para agregar material--------------comentario
                                <button type="button" onclick="agregarMaterial()" class="w-full text-blue-700 hover:underline mt-4">+
                                    Agregar otro material</button>
                            </div> -->
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex text-center items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                                <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                            </svg>
                            Personal responsable
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                            <!-- responsable factura -->
                            <div>
                                <label for="" class=" block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Recibe: <span class="text-red-500">*</span>
                                </label>
                                <input type="radio" name="recibe_factura" value="almacen"> Almacén
                                <input type="radio" name="recibe_factura" value="chofer"> Chofer
                            </div>
                        </div>
                        <!-- Campo para la persona responsable de almacén -->
                        <div id="responsable-almacen" style="display:none;">
                            <label for="responsable_almacen" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Responsable de almacén<span class="text-red-500">*</span>
                            </label>
                            <select name="user_id" id="">
                                <option value="">-Seleccionar-</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->ap_user}} {{$user->am_user}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Campo para chofer responsable-->
                        <div id="responsable-chofer" style="display:none;">
                            <label for="responsable_chofer_id_factura" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Persona responsable(Chofer)<span class="text-red-500">*</span>
                            </label>
                            <select name="empleado_id" id="">
                                <option value="">-Seleccionar-</option>
                                @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->Nombre }} {{ $empleado->apellidos}}</option>
                                @endforeach
                            </select>
                            @error('empleado_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            
                            <!--CAMPOS PARA EL CHOFER-->
                            <div class="mt-6">
                                <label for="destino_factura" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Destino:<span class="text-red-500">*</span>
                                </label>
                                <select name="destino_factura" id="destino_factura">
                                    <option value="">-Seleccionar-</option>
                                    <option value="obra">Obra</option>
                                    <option value="almacen">Almacén</option>
                                </select>
                            </div>

                            <!--Campo para la seleccion de la obra-->
                            <div id="campo-obra" style="display:none;" class="mt-6">
                                <label for="obra_factura" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Selecciona obra:<span class="text-red-500">*</span>
                                </label>
                                <select name="project_id" id="obra_factura">
                                    <option value="">-Seleccionar-</option>
                                    @foreach($proyectos as $proyecto)
                                    <option value="{{ $proyecto->id }}">
                                        Folio: MED-{{ $proyecto->folioProject }}-2026. 
                                        Estado: {{ $proyecto->estado_project }}. 
                                        Área: {{ $proyecto->area_project }}.
                                        Piso: {{ $proyecto->piso_project }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>

                        </div>

                        <script>
                            // Script para mostrar/ocultar selects según la selección de "Recibe" y "Destino"
                            document.addEventListener('DOMContentLoaded', function() {
                                const radioButtons = document.querySelectorAll('input[name="recibe_factura"]');
                                const responsableAlmacenDiv = document.getElementById('responsable-almacen');
                                const responsableChoferDiv = document.getElementById('responsable-chofer');
                                const destinoSelect = document.getElementById('destino_factura');
                                const campoObraDiv = document.getElementById('campo-obra');

                                function updateVisibilityRecibe() {
                                    const selectedValue = document.querySelector('input[name="recibe_factura"]:checked')?.value;

                                    if (selectedValue === 'almacen') {
                                        responsableAlmacenDiv.style.display = 'block';
                                        responsableChoferDiv.style.display = 'none';
                                    } else if (selectedValue === 'chofer') {
                                        responsableAlmacenDiv.style.display = 'none';
                                        responsableChoferDiv.style.display = 'block';
                                    } else {
                                        responsableAlmacenDiv.style.display = 'none';
                                        responsableChoferDiv.style.display = 'none';
                                    }
                                }

                                function updateVisibilityDestino() {
                                    const selectedDestino = destinoSelect.value;

                                    if (selectedDestino === 'obra') {
                                        campoObraDiv.style.display = 'block';
                                    } else {
                                        campoObraDiv.style.display = 'none';
                                    }
                                }

                                radioButtons.forEach(radio => {
                                    radio.addEventListener('change', updateVisibilityRecibe);
                                });

                                destinoSelect.addEventListener('change', updateVisibilityDestino);

                                // Ejecutar las funciones al cargar la página
                                updateVisibilityRecibe();
                                updateVisibilityDestino();
                            });
                        </script>

                            <h3 class=" text-lg font-semibold text-gray-900 dark:text-white mb-4 flex text-center items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                                    <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                                </svg>

                                Total y status
                            </h3>
                        
                        <!-- Total -->
                        <div>
                            <label for="subtotal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Total <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="total_factura" name="total_factura" step="0.01" value="{{ old('total_factura') }}" placeholder="0.00" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('total_factura') border-red-500 @enderror">
                            @error('total_factura')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select id="status_factura" name="status_factura" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('status_factura') border-red-500 @enderror">
                                <option value="">Seleccionar estado</option>
                                <option value="pendiente" {{ old('status_factura') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="completado" {{ old('status_factura') == 'completado' ? 'selected' : '' }}>Completado</option>
                                <option value="cancelado" {{ old('status_factura') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                            @error('status_factura')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                </div>
           

            <!-- Información Adicional -->
            <div class="mt-8 border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex text-center items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>

                    Información Adicional
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    
                    <!-- Notas -->
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Observaciones o notas:
                        </label>
                        <input type="textarea" id="observaciones_factura" name="observaciones_factura" value="{{ old('observaciones_factura') }}" placeholder="Notas adicionales..." class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    </div>
                </div>

                <!-- Comprobante -->
                <div class="mt-6">
                    <label for="comprobante_pdf" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Comprobante
                    </label>
                    <input type="file" id="comprobante_pdf" name="comprobante_pdf"  class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    @error('comprobante_pdf')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botones de Acción -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                    <!--  <a href="{{ route('index-facturas') }}" class="inline-flex items-center px-6 py-3 bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-700 text-gray-800 dark:text-white font-semibold rounded-lg transition duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            
                                Crear Factura y registrar materiales
                        </button>-->
                
                    <a href="{{ route('index-facturas')}}"
                        class="w-full bg-red-700 sm:w-auto px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                        Cancelar
                    </a>
                    <!--<a href="">
                        <button class="inline-flex items-center px-4 py-2 bg-green-700 dark:bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-400 dark:hover:bg-green-400 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Registrar factura</button> 
                    </a>-->
                    <x-primary-button class="">
                        {{ __('Registrar factura') }}
                    </x-primary-button>
                </div>
                </form>
            </div>
        </div> 
    </div>
    
</x-guest-layout>