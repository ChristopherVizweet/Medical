<x-app-layout>
    <script src="//unpkg.com/alpinejs" defer></script> <!-- LInea de comando para usar Alpine -->
    <x-slot name="header">
        <!--Boton para cambiar el modo oscuro/claro-->
        <x-mode-button id="theme-toggle" class="float-right">
            Modo escuro/claro
        </x-mode-button>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const themeToggle = document.getElementById("theme-toggle");
                const body = document.documentElement;
                const currentTheme = localStorage.getItem("theme");

                if (currentTheme === "dark") {
                    body.classList.add("dark");
                } else {
                    body.classList.remove("dark");
                }

                themeToggle.addEventListener("click", function() {
                    if (body.classList.contains("dark")) {
                        body.classList.remove("dark");
                        localStorage.setItem("theme", "light");
                    } else {
                        body.classList.add("dark");
                        localStorage.setItem("theme", "dark");
                    }
                });
            });
        </script>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white">
            Cotizaciones rápidas
        </h2>
    </x-slot>
    <!-- Mensaje de éxito -->
    @if (session('success'))
    <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
                                                                                                            <!-- Menu para seleccionar la cotizacion -->
    <div class="border border-black text-center items-center p-6 w-full h-full bg-gradient-to-r from-blue-600 to-blue-800">
        
        <h2 class="text-2xl font-bold mb-6 text-white">Seleccione la cotizacion a realizar</h2>

        <!-- + Agregar otra sección -->
        <!--<div class="justify-right float-right flexbox">
            <button
                x-data
                x-on:click="$dispatch('open-modal', 'crear-seccion')"
                class="border-1 rounded p-2 bg-white text-black hover:text-white hover:font-semibold hover:bg-green-500">
                + Agregar otra sección
            </button>
        </div>-->
                                                                                          <!-- Modal para selecciona nueva seccion-->
       <!-- <x-modal class="fixed inset-0 flex justify-center items-center" name="crear-seccion" maxWidth="2xl">
            <div class="p-6 max-w-auto">
                <h1 class="text-center">NUEVA SECCIÓN PARA COTIZACIÓN</h1>
                <form method="POST" action="{{ route('index-cotizacion') }}">
                    @csrf
                    <div class="text-center">
                        <div class="bg-white dark:bg-slate-700 rounded-lg p-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p class="mb-4">
                                <strong>AGREGAR NUEVA SECCIÓN PARA COTIZACIÓN.</strong>
                            </p>
                        </div>
                    </div>
                    <!- Formulario de Campos (Ergonómico) ->
                    <div>
                        <input for="nameSection" type="text" name="nameSection" placeholder="Nombre de la nueva sección" class="w-full">
                    </div>

                    <div class="flex justify-end gap-2">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </x-modal>-->

                                                                                                            <!-- Modal para agregar nueva partida-->
        <x-modal class="fixed inset-0 flex justify-center items-center" name="crear-partida" maxWidth="2xl">
            <div class="p-6 max-w-auto">
                <h1 class="text-center">NUEVA PARTIDA</h1>
                <form method="POST" action="{{ route('index-cotizacion') }}">
                    @csrf
                    <div class="text-center">
                        <div class="bg-white dark:bg-slate-700 rounded-lg p-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p class="mb-4">
                                <strong>AGREGAR NUEVA PARTIDA PARA COTIZACIÓN.</strong>
                            </p>
                        </div>
                    </div>
                    <!-- Formulario -->
                    <div>
                        <input for="nombre_gas_medicinal" type="text" name="nombre_gas_medicinal" placeholder="Nombre de la nueva partida" class="w-full mb-4">
                        <input hidden value="Sin registro" for="status" type="text" name="status" placeholder="Status actual de la nueva partida" class="w-full">
                    </div>

                    <div class="flex justify-end gap-2">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </x-modal>




        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-fg-b8jr3="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:24:7:609:1048:e:div:x">
           
            <button id="btn-cobre" class="focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white"
                data-fg-b8jr5="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:26:11:731:901:e:button:etete">
                <div class="text-4xl mb-3" data-fg-b8jr6="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:35:13:1163:54:e:div:x">🏥</div>
                <h3 class="font-bold text-lg mb-2 text-white" data-fg-b8jr8="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:36:13:1230:189:e:h3:x">Redes Medicinales</h3>
                <p class="text-sm text-white" data-fg-b8jr10="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:41:13:1432:180:e:p:x">Sistemas de gases medicinales y vacío</p>
            </button>
           
            <button id="btn-equipos" class="focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white" data-fg-b8jr5="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:26:11:731:901:e:button:etete">
                <div class="text-4xl mb-3" data-fg-b8jr6="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:35:13:1163:54:e:div:x">🚧</div>
                <h3 class="font-bold text-lg mb-2 text-white" data-fg-b8jr8="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:36:13:1230:189:e:h3:x">Equipos Arquitectónicos</h3>
                <p class="text-sm text-blue-100" data-fg-b8jr10="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:41:13:1432:180:e:p:x">Mobiliario y equipamiento hospitalario</p>
            </button>
            <button id="btn-cortinas" class="focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white" data-fg-b8jr5="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:26:11:731:901:e:button:etete">
                <div class="text-4xl mb-3" data-fg-b8jr6="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:35:13:1163:54:e:div:x">🛡️</div>
                <h3 class="font-bold text-lg mb-2 text-white" data-fg-b8jr8="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:36:13:1230:189:e:h3:x">Cortinas y Protecciones</h3>
                <p class="text-sm text-blue-100" data-fg-b8jr10="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:41:13:1432:180:e:p:x">Protección contra camilla y seguridad en cortinas antibacterianas</p>
            </button>
            <button class="focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white" data-fg-b8jr5="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:26:11:731:901:e:button:etete">
                <div class="text-4xl mb-3" data-fg-b8jr6="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:35:13:1163:54:e:div:x">⚙️</div>
                <h3 class="font-bold text-lg mb-2 text-white" data-fg-b8jr8="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:36:13:1230:189:e:h3:x">Comp Bombas New</h3>
                <p class="text-sm text-blue-100" data-fg-b8jr10="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:41:13:1432:180:e:p:x">Sistemas de bombeo y presurización</p>
            </button>
        </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-fg-b8jr3="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:24:7:609:1048:e:div:x">
                
            </div>
        </div>

        <!-- Menu que selecciona las CONEXIONES Y SUS MEDIDAS -->
        <div id="panel-cobre" class="category-panel bg-white rounded-lg border border-gray-200 p-6 mb-6" data-fg-dqam0="12.9:12.1533:/src/app/components/QuotationSelector.tsx:20:5:391:1134:e:div:ete:1">
            <h2 class="text-xl font-semibold mb-4 text-gray-800" data-fg-dqam1="12.9:12.1533:/src/app/components/QuotationSelector.tsx:21:7:467:106:e:h2:t">TUBERIA Y CONEXIONES DE COBRE</h2>

            <!-- BOTON PARA AGREGAR NUEVA PARTIDA DE LA TUBERIA Y CONEXIONES -->
            <button
                x-data
                x-on:click="$dispatch('open-modal', 'crear-partida')"
                class="border-1 mb-2 rounded p-2 bg-blue-600 text-white hover:bg-green-600 hover:border-2 hover:border-green-700">+ Agregar otra partida</button>
                                                                                                            <!-- AQUI COMIENZA EL CONTENEDOR DE LAS PARTIDAS (CATALOGO DE REDES MEDICINALES) -->
                                                                                                             
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-fg-dqam3="12.9:12.1533:/src/app/components/QuotationSelector.tsx:24:7:580:934:e:div:x">
                <!-- BOTON PARA SUMINISTRO E INSTALACION DE ETIQUETADO -->
                <button x-data
                    x-on:click="$dispatch('open-modal', 'crear-proyecto1')" class="p-4 w-full rounded-lg border-2 transition-all text-left focus:border-blue-500 focus:bg-blue-100 shadow-md" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACION DE ETIQUETADO</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">
                        @if($detalles->isEmpty())
                            <span class="text-red-500 text-lg">Sin registro</span>
                            @else
                                
                                <span class="text-green-500 text-lg">Registrado</span>
                                <a href="" class="text-blue-500 hover:text-blue-800 justify-left align-left ml-44">Ver detalles</a>
                                
                            @endif

                    </p>
                </button>
                <!-- Modal -->
                <x-modal name="crear-proyecto1" maxWidth="2xl">
                    <div class="p-6">
                        <h1 class="text-center">SUMINISTRO E INSTALACIÓN DE ETIQUETADO</h1>
                        <form method="POST" action="{{ route('index-cotizacion-store') }}">
                            @csrf
                            <div class="text-center">
                                <div class="bg-white dark:bg-slate-700 rounded-lg p-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                                    <p class="mb-4">
                                   <strong> SUMINISTRO Y APLICACIÓN DE PINTURA DE ESMALTE ALQUIDALICO ANTICORROSIVO, DE ACUERDO A ESPECIFICACIONES Y
                                            CODIGO DE COLORES DE LA INSTITUCIÓN.</strong>
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Incluye: CARGO DIRECTO POR EL COSTO DE MANO DE OBRA Y MATERIALES REQUERIDOS, FLETER A OBRA, ACCARREO,
                                        APLICACIÓN A DOS MANOS MINIMO, LIMPIEZA Y RETIRO DE SOBRANTES FUERA, EQUIPO DE SEGURIDAD, INSTALACIONES ESPECIFICAS,
                                        DEPRECIACIÓN Y DEMAS CARGOS DERIVADOS DEL USO DE EQUIPO Y HERRAMIENTA EN CUALQUIER NIVEL.
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Formulario de Campos (Ergonómico) -->
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-3">

                                <!-- Campo Diámetro -->
                                <div class="flex flex-col">
                                    <label for="diametro" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Diámetro (MM)
                                        </span>
                                    </label>
                                        

                                   <select id="diametro" name="concepto_detalle_rm_id" class="px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                                        <option value="">-Seleccionar-</option>
                                       
                                    </select>
                                </div>

                                <!-- Campo Cantidad -->
                                <div class="flex flex-col">
                                    <label for="unidad" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Unidad
                                        </span>
                                    </label>
                                    <input value="PZA." readonly="TRUE" type="text" id="unidad" name="unidad_detalle_rm" class="w-20 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                                </div>

                                <!-- Campo cantidad -->
                                <div class="flex flex-col">
                                    <label for="cantidad" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Cantidad
                                        </span>
                                    </label>
                                    <input type="text" id="cantidad_detalle_rm" name="cantidad_detalle_rm" class="w-20 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                                </div>

                                <!-- Campo Precio MXN -->
                                <div class="flex flex-col">
                                    <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Precio(MXN)
                                        </span>
                                    </label>
                                    <input type="number" id="precio" name="precio_detalle_rm" placeholder="0.00" step="0.01" class="w-30 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                                </div>

                                <!-- Campo importe MXN -->
                                <div class="flex flex-col">
                                    <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Importe (MXN)
                                        </span>
                                    </label>
                                    <input type="number" id="precio" name="importe_detalle_rm" placeholder="0.00" step="0.01" class="px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                                </div>

                            </div>
                            <button type="button" onclick="agregarProducto()" class="text-blue-700 hover:underline mt-4">+
                                Agregar otra tuberia y/o conexión
                            </button>
                            <div class="flex justify-end gap-2">
                                <!-- <button
                                type="button"
                                x-data
                              x-on:click="$dispatch('close-modal', 'crear-proyecto')"
                                class="px-4 py-2 bg-gray-300 rounded">
                                Cancelar
                            </button> -->

                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </x-modal>


                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE COPLE DE COBRE FORJADO</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE REDUCCION BUSHING DE COBRE</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE REDUCCION CAMPANA DE COBRE FORJADO</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE CODO DE COBRE FORJADO</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE TEE DE COBRE FORJADO</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE MANGUERA FLEXIBLE DE ACERO INOXIDABLE</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE SOPORTE METÁLICO</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACION DE CAJA METÁLICA</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE KIT DE VALVULA</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE VALVULA CHECK</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE TOMA PARA FLUIDO DE PARED</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE ALARMA DIGITAL AUDIO-VISUAL</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100 | p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE ALARMA MAESTRA AUDIO-VISUAL</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE SWITCH DE PRESION</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE ALARMA MAESTRA COMBINADA AUDIO- VISUAL</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE PANEL DE REGULACION</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE ENTRADA DE EMERGENCIA EOSC</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
            </div>
        </div>







        <!------------------------------------------------------------------ SECCION PARA EQUIPOS ARQUITECTONICOS ------------------------------------------------------------>


        <div id="panel-equipos" class="category-panel hidden bg-white rounded-lg border border-gray-200 p-6 mb-6 text-center">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">EQUIPOS ARQUITECTÓNICOS</h2>
            <!-- MENU PARA SELECCION DE HORIZONTALES, VERTICALES Y PANEL -->
            <div class="mt-4 border border-black bg-blue-500 text-center tems-center p-6 w-full h-full">
                <h2 class="text-2xl font-bold mb-6 text-white">Seleccione el equipo</h2>

                <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" data-fg-b8jr3="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:24:7:609:1048:e:div:x">
                    <button id="btn-consolasHorizontales" class="text-center focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                        <h3 class="font-semibold mb-1 text-white" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">CONSOLAS HORIZONTALES</h3>
                    </button>

                    <button id="btn-consolasVerticales" class="text-center focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                        <h3 class="font-semibold mb-1 text-white" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">CONSOLAS VERTICALES</h3>
                    </button>

                    <button class="text-center focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                        <h3 class="font-semibold mb-1 text-white" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">PANELES</h3>
                    </button>

                    <button class="text-center focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                        <h3 class="font-semibold mb-1 text-white" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">CAJA DE SECCIONAMIENTO</h3>
                    </button>

                    <button class="text-center focus:bg-blue-900 p-6 rounded-lg border-2 transition-all text-left bg-blue-700/50 border-blue-400/30 hover:bg-blue-600/70 hover:border-blue-300 text-white" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                        <h3 class="font-semibold mb-1 text-white" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">KIT DE VALVULAS</h3>
                    </button>

                </div>

            </div>
            <!-- inputs para agregar la altura y anchura DE CONSOLA HORIZONTAL -->
            <div id="panel-consolasHorizontales" class="category-contenido hidden">
                <h2 class="text-lg mt-6">INGRESE LAS MEDIDAS DE SU CONSOLA HORIZONTAL</h2>
                <div class="mt-8 flex grid-column-2 md:grid-cols-2 lg:grid-cols-2 gap-2 text-center justify-center items-center">
                    <label for="altura" class="block text-sm font-medium text-gray-700 mb-1">Altura (mm)</label>
                    <input type="number" id="altura" name="altura" class="border border-black rounded-md p-2 w-max-md mb-4" placeholder="Ingrese la altura en milimetros">
                    <label for="anchura" class=" block text-sm font-medium text-gray-700 mb-1">Anchura (mm)</label>
                    <input type="number" value="37000" id="anchura" name="anchura" class="border border-black rounded-md p-2 w-max-md mb-4" placeholder="Ingrese la anchura en milimetros">
                </div>

                <div class="w-full max-w-3xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h2 class="text-center text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">CONCEPTO</h2>
                    <p class="text-justify text-gray-700 dark:text-gray-300 leading-relaxed">
                        SUMINISTRO E INSTALACIÓN DE SISTEMA DE CONSOLA HORIZONTAL, MARCA MGSI O SIMILAR, CONSTRUIDA EN ALUMINIO NATURAL DE PRIMERA FUSIÓN 6063,
                        TEMPLE 5, ALUMINIO ANONIZADO PARA UNA CAMA O SERVICIO INCLUYE: INSTALACION Y PRUEBAS DEBERAN SER REALIZADA POR TECNICOS CALIFICADOS ANTE
                        LA ASSE 6010 Y ASME SECCION IX ,CUMPLIENDO LOS REQUERIMIENTOS DE LA NFPA 99 CODIGO 2018; CARGO DIRECTO POR EL COSTO DE MANO DE OBRA Y
                        MATERIALES REQUERIDOS, FLETE A OBRA, ACARREO, TRAZO, FIJACIÓN, NIVELACIÓN Y PRUEBA, LIMPIEZA Y RETIRO DE SOBRANTES FUERA DE OBRA,
                        EQUIPO DE SEGURIDAD, INSTALACIONES ESPECIFICAS, DEPRECIACIÓN Y DEMÁS CARGOS DERIVADOS DEL USO DE EQUIPO DE OXIACETILENO Y HERRAMIENTA
                        EN CUALQUIER NIVEL.
                    </p>
                </div>
                <!-- Aqui estara la parte de los accesorios de la consola -->
                <div class="mt-6 w-full border border-blue-900 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

                    <h1 class="text-xl font-semibold mb-4">EQUIPAMIENTO POR CAMA</h1>
                    <!-- Cuadro de cantidades -->
                    <div class="bg-blue-700 w-3/4 p-4 h-3/5 mt-6 ml-20 p-4 border border-blue-900 border-4 rounded-lg">
                        <h1 class="text-white text-xl text-center font-bold">CANTIDADES DE COTIZACIÓN PARA CONSOLA HORIZONTAL</h1>

                    </div>

                    <div class="border border-2 border-red-800 w-3/3 p-4 overflow-scroll overflow-x-auto h-22 grid grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-4">
                        <div class="text-xl semibold justify-left items-left text-left border-blue-300">
                            <div class="mb-8">
                                SUMINISTRO
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">TOMA PARA OXIGENO,CONEXIÓN ENCHUFE RAPIDO ARAMED
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">TOMA DE AIRE,CONEXIÓN ENCHUFE RAPIDO ARAMED
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">TOMA DE VACIO,CONEXIÓN ENCHUFE RAPIDO ARAMED
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">CONTACTOS DUPLEX GRADO HOSPITAL DE 127V. 20A. COLOR ROJO
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">CONTACTOS DUPLEX GRADO HOSPITAL DE 127V. 20A. COLOR BLANCOS
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">APAGADOR DE FALSO PLAFON.
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">LAMPARA DE ILUMINACION CON LUZ DE AMBIENTE Y LECTURA,
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">RIEL TIPO "GSX" PARA SOPORTE DE MONITOR
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">SOPORTE PORTA MONITOR
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">SOPORTE PORTA VENOCLISIS
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">SOPORTES PARA BOMBA DE INFUSION
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">CANASTILLA PORTA MEDICAMENTOS
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">CABLE XHHW-2 CALIBRE NO.12 COLOR NARANJA Y CAFÉ.
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">TROQUEL PARA CONTACTO RJ-45
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>

                            </div>
                            <div class="border-y border-y-2 border-gray-400">
                                <input class="m-2" type="checkbox">TROQUEL PARA VOZ Y DATOS
                                <p class="text-sm text-center">50 tornillos de 1/2. 30 remaches.</p>
                            </div>
                        </div>
                        <div>
                            UNIDAD
                        </div>
                        <div>
                            CANTIDAD
                        </div>
                        <div>
                            PRECIO
                        </div>
                        <div>
                            IMPORTE
                        </div>
                    </div>
                </div>

                <button type="button" onclick="agregarProducto()" class="text-blue-700 hover:underline mt-4">+
                    Agregar suministro para consola horizontal
                </button>
            </div>


            <!-- inputs para agregar la altura y anchura DE CONSOLA VERTICAL -->


            <div id="panel-consolasVerticales" class="category-contenido hidden">
                <h2 class="text-lg mt-6">INGRESE LAS MEDIDAS DE SU CONSOLA VERTICAL</h2>
                <div class="mt-8 flex grid-column-2 md:grid-cols-2 lg:grid-cols-2 gap-2 text-center justify-center items-center">
                    <label for="altura" class="block text-sm font-medium text-gray-700 mb-1">Altura (mm)</label>
                    <input type="number" id="altura" name="altura" class="border border-black rounded-md p-2 w-max-md mb-4" placeholder="Ingrese la altura en milimetros">
                    <label for="anchura" class="block text-sm font-medium text-gray-700 mb-1">Anchura (mm)</label>
                    <input type="number" id="anchura" name="anchura" class="border border-black rounded-md p-2 w-max-md mb-4" placeholder="Ingrese la anchura en milimetros">
                </div>

                <div class="w-full max-w-3xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h2 class="text-center text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">CONCEPTO</h2>
                    <p class="text-justify text-gray-700 dark:text-gray-300 leading-relaxed">
                        SUMINISTRO E INSTALACIÓN DE SISTEMA DE CONSOLA VERTICAL, MARCA MGSI O SIMILAR, CONSTRUIDA EN ALUMINIO NATURAL DE PRIMERA FUSIÓN 6063,
                        TEMPLE 5, ALUMINIO ANONIZADO PARA UNA CAMA O SERVICIO INCLUYE: INSTALACION Y PRUEBAS DEBERAN SER REALIZADA POR TECNICOS CALIFICADOS
                        ANTE LA ASSE 6010 Y ASME SECCION IX ,CUMPLIENDO LOS REQUERIMIENTOS DE LA NFPA 99 CODIGO 2018; CARGO DIRECTO POR EL COSTO DE MANO DE OBRA Y
                        MATERIALES REQUERIDOS, FLETE A OBRA, ACARREO, TRAZO, FIJACIÓN, NIVELACIÓN Y PRUEBA, LIMPIEZA Y RETIRO DE SOBRANTES FUERA DE OBRA,
                        EQUIPO DE SEGURIDAD, INSTALACIONES ESPECIFICAS, DEPRECIACIÓN Y DEMÁS CARGOS DERIVADOS DEL USO DE EQUIPO DE OXIACETILENO Y HERRAMIENTA
                        EN CUALQUIER NIVEL.
                    </p>
                </div>
            </div>
        </div>






        <!--------------------------------------------------------------- SECCION PARA CORTINAS Y PROTECCIONES ----------------------------------------------------------->

        <div id="panel-cortinas" class="category-panel bg-white rounded-lg border border-gray-200 p-6 mb-6" data-fg-dqam0="12.9:12.1533:/src/app/components/QuotationSelector.tsx:20:5:391:1134:e:div:ete:1">
            <h2 class="text-xl font-semibold mb-4 text-gray-800" data-fg-dqam1="12.9:12.1533:/src/app/components/QuotationSelector.tsx:21:7:467:106:e:h2:t">CORTINAS Y PROTECCIONES</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-fg-dqam3="12.9:12.1533:/src/app/components/QuotationSelector.tsx:24:7:580:934:e:div:x">
                <button x-data
                    x-on:click="$dispatch('open-modal', 'crear-proyecto1')" class="p-4 w-full rounded-lg border-2 transition-all text-left focus:border-blue-500 focus:bg-blue-100 shadow-md" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <div class="text-3xl mb-2" data-fg-dqam6="12.9:12.1533:/src/app/components/QuotationSelector.tsx:35:13:1104:55:e:div:x">🏥</div>
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE PROTECTOR CONTRA CAMILLA</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button x-data
                    x-on:click="$dispatch('open-modal', 'crear-proyecto1')" class="p-4 w-full rounded-lg border-2 transition-all text-left focus:border-blue-500 focus:bg-blue-100 shadow-md" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <div class="text-3xl mb-2" data-fg-dqam6="12.9:12.1533:/src/app/components/QuotationSelector.tsx:35:13:1104:55:e:div:x">🏥</div>
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE TAPA FINAL</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button x-data
                    x-on:click="$dispatch('open-modal', 'crear-proyecto1')" class="p-4 w-full rounded-lg border-2 transition-all text-left focus:border-blue-500 focus:bg-blue-100 shadow-md" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <div class="text-3xl mb-2" data-fg-dqam6="12.9:12.1533:/src/app/components/QuotationSelector.tsx:35:13:1104:55:e:div:x">🏥</div>
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE PROTECTOR ESQUINERO A 90°</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
                <button x-data
                    x-on:click="$dispatch('open-modal', 'crear-proyecto1')" class="p-4 w-full rounded-lg border-2 transition-all text-left focus:border-blue-500 focus:bg-blue-100 shadow-md" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <div class="text-3xl mb-2" data-fg-dqam6="12.9:12.1533:/src/app/components/QuotationSelector.tsx:35:13:1104:55:e:div:x">🏥</div>
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">CORTINAS ANTIBACTERIANAS</h3>
                    <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
                </button>
            </div>
        </div>
        <!-- Modal -->
        <!-- <x-modal name="crear-proyecto" maxWidth="lg">
            <div class="p-6">
                <h2 class="text-lg font-bold mb-4">Nuevo Proyecto</h2>

                 <form method="POST" action="{ route('proyectos.store') }}">
            @csrf
            
            <input type="text" name="nombre" placeholder="Nombre del proyecto"
                class="w-full border rounded mb-3">

            <div class="flex justify-end gap-2">
                <button 
                    type="button"
                    x-data
                    x-on:click="$dispatch('close-modal', 'crear-proyecto')"
                    class="px-4 py-2 bg-gray-300 rounded"
                >
                    Cancelar
                </button>

                <button 
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded"
                >
                    Guardar
                </button>
            </div>
        </form> -->
    </div>
    </x-modal>

</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function showPanel(id) {
            document.querySelectorAll('.category-contenido')
                .forEach(p => p.classList.add('hidden'));
            document.getElementById(id).classList.remove('hidden');
        }
        document.getElementById('btn-consolasHorizontales')
            .addEventListener('click', () => showPanel('panel-consolasHorizontales'));

        document.getElementById('btn-consolasVerticales')
            .addEventListener('click', () => showPanel('panel-consolasVerticales'));
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // helper that shows one panel and hides the rest
        function showPanel(id) {
            document.querySelectorAll('.category-panel')
                .forEach(p => p.classList.add('hidden'));
            document.getElementById(id).classList.remove('hidden');
        }

        document.getElementById('btn-cobre')
            .addEventListener('click', () => showPanel('panel-cobre'));

        document.getElementById('btn-equipos')
            .addEventListener('click', () => showPanel('panel-equipos'));

        document.getElementById('btn-cortinas')
            .addEventListener('click', () => showPanel('panel-cortinas'));
    });
</script>