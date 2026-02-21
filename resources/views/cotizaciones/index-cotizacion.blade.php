<x-app-layout>
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
        <div> </div>
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
    </div>
    <!-- Menu que selecciona las CONEXIONES Y SUS MEDIDAS -->
    <div id="panel-cobre" class="category-panel bg-white rounded-lg border border-gray-200 p-6 mb-6" data-fg-dqam0="12.9:12.1533:/src/app/components/QuotationSelector.tsx:20:5:391:1134:e:div:ete:1">
        <h2 class="text-xl font-semibold mb-4 text-gray-800" data-fg-dqam1="12.9:12.1533:/src/app/components/QuotationSelector.tsx:21:7:467:106:e:h2:t">TUBERIA Y CONEXIONES DE COBRE</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-fg-dqam3="12.9:12.1533:/src/app/components/QuotationSelector.tsx:24:7:580:934:e:div:x">
            <!-- BOTON PARA SUMINISTRO E INSTALACION DE ETIQUETADO -->
            <button x-data
                x-on:click="$dispatch('open-modal', 'crear-proyecto1')" class="p-4 w-full rounded-lg border-2 transition-all text-left focus:border-blue-500 focus:bg-blue-100 shadow-md" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACION DE ETIQUETADO</h3>
                <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
            </button>
            <!-- Modal -->
            <x-modal name="crear-proyecto1" maxWidth="2xl">
                <div class="p-6">
                    <h1 class="text-center">SUMINISTRO E INSTALACIÓN DE ETIQUETADO</h1>
                    <form method="POST" action="{{ route('index-cotizacion') }}">
                        <div class="text-center">
                            <div class="bg-white dark:bg-slate-700 rounded-lg p-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p class="mb-4">
                                    <strong>SUMINISTRO Y APLICACIÓN DE PINTURA DE ESMALTE ALQUIDALICO ANTICORROSIVO, DE ACUERDO A ESPECIFICACIONES Y
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
                                <select id="diametro" name="diametro" class="px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                                    <option value="">-Seleccionar-</option>
                                    <option value="13">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 13mm de DIAMETRO</option>
                                    <option value="19">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 19mm de DIAMETRO</option>
                                    <option value="25">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 25mm de DIAMETRO</option>
                                    <option value="32">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 32mm de DIAMETRO</option>
                                    <option value="38">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 38mm de DIAMETRO</option>
                                    <option value="51">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 51mm de DIAMETRO</option>
                                    <option value="64">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 64mm de DIAMETRO</option>
                                    <option value="75">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 75mm de DIAMETRO</option>
                                    <option value="100">CALCOMANIA AUTOADHERIBLE CON EL NOMBRE DEL GAS Y SENTIDO DEL FLUJO EN TUBERIA DE 100mm de DIAMETRO</option>
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
                                <input value="PZA." readonly="TRUE" type="text" id="unidad" name="unidad" class="w-20 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo cantidad -->
                            <div class="flex flex-col">
                                <label for="cantidad" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Cantidad
                                    </span>
                                </label>
                                <input type="text" id="cantidad" name="cantidad" class="w-20 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo Precio MXN -->
                            <div class="flex flex-col">
                                <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Precio(MXN)
                                    </span>
                                </label>
                                <input type="number" id="precio" name="precio" placeholder="0.00" step="0.01" class="w-30 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo importe MXN -->
                            <div class="flex flex-col">
                                <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Importe (MXN)
                                    </span>
                                </label>
                                <input type="number" id="precio" name="precio" placeholder="0.00" step="0.01" class="px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                        </div>
                        <button type="button" onclick="agregarProducto()" class="text-blue-700 hover:underline mt-4">+
                            Agregar otra tuberia y/o conexión
                        </button>
                        <div class="flex justify-end gap-2">
                            <button
                                type="button"
                                x-data
                                x-on:click="$dispatch('close-modal', 'crear-proyecto')"
                                class="px-4 py-2 bg-gray-300 rounded">
                                Cancelar
                            </button>

                            <button
                                type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </x-modal>
            <button x-data
                x-on:click="$dispatch('open-modal', 'crear-proyecto2')" class="focus:border-blue-500 focus:bg-blue-100 p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACION TARJETA DE SEÑALIZACIÓN PARA VALVULAS</h3>
                <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
            </button>
            <!-- Modal -->
            <x-modal name="crear-proyecto2" maxWidth="2xl">
                <div class="p-6">
                    <h1 class="text-center">SUMINISTRO E INSTALACIÓN DE ETIQUETADO</h1>
                    <form method="POST" action="{{ route('index-cotizacion') }}">


                        <div class="text-center">


                            <div class="bg-white dark:bg-slate-700 rounded-lg p-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p class="mb-4">
                                    <strong>SUMINISTRO E INSTALACIÓN DE TARJETA DE SEÑALIZACIÓN PARA VALVULAS.</strong>
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Incluye: COSTO DE MANO DE OBRA Y METERIALES REQUERIDOS EN LA EJECUCION, FLETE A OBRA, ACCARREOS,
                                    COLOCACION, LIMPIEZA Y EQUIPO DE SEGURIDAD, INSTALACIONES ESPECIFICAS, DEPRECIACIÓN Y DEMAS CARGOS DERIVADOS DEL USO DE
                                    EQUIPO Y HERRAMIENTA, EN CUALQUIER NIVEL.
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
                                        Concepto
                                    </span>
                                </label>
                                <select id="diametro" name="diametro" class="px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                                    <option value="">-Seleccionar-</option>
                                    <option value="13">TARJETA DE PVC PARA LA IDENTIFICACIÓN DE VALVÚLAS</option>
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
                                <input value="PZA." readonly="TRUE" type="text" id="unidad" name="unidad" class="w-20 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo cantidad -->
                            <div class="flex flex-col">
                                <label for="cantidad" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Cantidad
                                    </span>
                                </label>
                                <input type="text" id="cantidad" name="cantidad" class="w-20 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo Precio MXN -->
                            <div class="flex flex-col">
                                <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Precio(MXN)
                                    </span>
                                </label>
                                <input type="number" id="precio" name="precio" placeholder="0.00" step="0.01" class="w-30 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo importe MXN -->
                            <div class="flex flex-col">
                                <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Importe (MXN)
                                    </span>
                                </label>
                                <input type="number" id="precio" name="precio" placeholder="0.00" step="0.01" class="text-align:center px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button
                                type="button"
                                x-data
                                x-on:click="$dispatch('close-modal', 'crear-proyecto')"
                                class="px-4 py-2 bg-gray-300 rounded">
                                Cancelar
                            </button>

                            <button
                                type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </x-modal>

            <button x-data
                x-on:click="$dispatch('open-modal', 'crear-proyecto3')" class="focus:border-blue-500 focus:bg-blue-100  p-4 rounded-lg border-2 transition-all text-left border-gray-200 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">SUMINISTRO E INSTALACIÓN DE TUBO DE COBRE TIPO "L"</h3>
                <p class="text-sm text-gray-600" data-fg-dqam10="12.9:12.1533:/src/app/components/QuotationSelector.tsx:41:13:1376:93:e:p:x">Sin registro</p>
            </button>
            <!-- Modal -->
            <x-modal name="crear-proyecto3" maxWidth="2xl">
                <div class="p-6">
                    <h1 class="text-center">SUMINISTRO E INSTALACIÓN DE ETIQUETADO</h1>
                    <form method="POST" action="{{ route('index-cotizacion') }}">


                        <div class="text-center">


                            <div class="bg-white dark:bg-slate-700 rounded-lg p-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p class="mb-4">
                                    <strong>SUMINISTRO E INSTALACIÓN DE TUBO DE COBRE TIPO "L" EN CONFORMIDAD A ASTM B 819
                                        OXIMED, MARCA NACOBRE, IUSA O SIMILAR.</strong>
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Incluye: LIMPIEZA PARA SERVICIO DE USO OXIGENO EN BASE A LA NORMA CGA G4, LA INSTALACIÓN Y PRUEBAS
                                    DEBERAN SER REALIZADA POR TECNICOS CALIFICADOS; CARGO DIRECTO POR EL COSTO DE MANO DE OBRA Y MATERIALES REQUERIDOS, FLETE A OBRA, ACARREO,
                                    TRAZO, FIJACION, NIVELACION Y PRUEBA, LIMPIEZA Y RETIRO DE SOBRANTES FUERA DE OBRA, EQUIPO DE SEGURIDAD,
                                    INSTALACIONES ESṔECIFICAS, DEPRECIACIÓN Y DEMAS CARGOS DERIVADOS DEL USO DE EQUIPO DE
                                    OXIACETILENO Y HERRAMIENTA EN CUALQUIER NIVEL.

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
                                        Concepto
                                    </span>
                                </label>
                                <select id="diametro" name="diametro" class="px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                                    <option value="">-Seleccionar-</option>
                                    <option value="13">13 MM</option>
                                    <option value="19">19 MM</option>
                                    <option value="25">25 MM</option>
                                    <option value="32">32 MM</option>
                                    <option value="38">38 MM</option>
                                    <option value="51">51 MM</option>
                                    <option value="64">64 MM</option>
                                    <option value="75">75 MM</option>
                                    <option value="100">100 MM</option>
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
                                <input value="ML." readonly="TRUE" type="text" id="unidad" name="unidad" class="w-20 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo cantidad -->
                            <div class="flex flex-col">
                                <label for="cantidad" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Cantidad
                                    </span>
                                </label>
                                <input type="text" id="cantidad" name="cantidad" class="w-20 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo Precio MXN -->
                            <div class="flex flex-col">
                                <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Precio(MXN)
                                    </span>
                                </label>
                                <input type="number" id="precio" name="precio" placeholder="0.00" step="0.01" class="w-30 px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>

                            <!-- Campo importe MXN -->
                            <div class="flex flex-col">
                                <label for="precio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <span class="text-red-500 mr-1">*</span>
                                        Importe (MXN)
                                    </span>
                                </label>
                                <input type="number" id="precio" name="precio" placeholder="0.00" step="0.01" class="text-align:center px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                            </div>
                        </div>
                        <button type="button" onclick="agregarProducto()" class="text-blue-700 hover:underline mt-4">+
                            Agregar tubo de cobre tipo L
                        </button>

                        <div class="flex justify-end gap-2">
                            <button
                                type="button"
                                x-data
                                x-on:click="$dispatch('close-modal', 'crear-proyecto')"
                                class="px-4 py-2 bg-gray-300 rounded">
                                Cancelar
                            </button>

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
        <div class="mt-4 border border-black bg-gray-200 text-center items-center p-6 w-full h-full">
            <h2 class="text-2xl font-bold mb-6 text-black">Seleccione el equipo</h2>

            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" data-fg-b8jr3="15.5:15.1676:/src/app/components/MainCategorySelector.tsx:24:7:609:1048:e:div:x">
                <button id="btn-consolasHorizontales" class="active:bg-gray-200 text-center p-4 rounded-lg border-2 transition-all text-left border-gray-400 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">CONSOLAS HORIZONTALES</h3>
                </button>

                <button id="btn-consolasVerticales" class="active:bg-gray-200 text-center p-4 rounded-lg border-2 transition-all text-left border-gray-400 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">CONSOLAS VERTICALES</h3>
                </button>

                <button class="active:bg-gray-200 text-center p-4 rounded-lg border-2 transition-all text-left border-gray-400 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">PANELES</h3>
                </button>

                <button class="active:bg-gray-200 text-center p-4 rounded-lg border-2 transition-all text-left border-gray-400 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">CAJA DE SECCIONAMIENTO</h3>
                </button>

                <button class="active:bg-gray-200 text-center p-4 rounded-lg border-2 transition-all text-left border-gray-400 hover:border-blue-300 hover:bg-gray-50" data-fg-dqam5="12.9:12.1533:/src/app/components/QuotationSelector.tsx:26:11:705:784:e:button:etete">
                    <h3 class="font-semibold mb-1 text-gray-800" data-fg-dqam8="12.9:12.1533:/src/app/components/QuotationSelector.tsx:36:13:1172:191:e:h3:x">KIT DE VALVULAS</h3>
                </button>

            </div>
            
        </div>
        <!-- inputs para agregar la altura y anchura DE CONSOLA HORIZONTAL -->
            <div id="panel-consolasHorizontales" class="category-contenido hidden">
                <h2 class="text-lg mt-6">INGRESE LAS MEDIDAS DE SU CONSOLA HORIZONTAL</h2>
                <div class="mt-8 flex grid-column-2 md:grid-cols-2 lg:grid-cols-2 gap-2 text-center justify-center items-center">
                    <label for="altura" class="block text-sm font-medium text-gray-700 mb-1">Altura (mm)</label>
                    <input type="number" id="altura" name="altura" class="border border-black rounded-md p-2 w-max-md mb-4" placeholder="Ingrese la altura en milimetros">
                    <label for="anchura" class="block text-sm font-medium text-gray-700 mb-1">Anchura (mm)</label>
                    <input type="number" id="anchura" name="anchura" class="border border-black rounded-md p-2 w-max-md mb-4" placeholder="Ingrese la anchura en milimetros">
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
                        SUMINISTRO E INSTALACIÓN DE SISTEMA DE CONSOLA VERTICAL, MARCA MGSI O SIMILAR,  CONSTRUIDA EN ALUMINIO NATURAL DE PRIMERA FUSIÓN 6063, 
                        TEMPLE 5,  ALUMINIO ANONIZADO  PARA UNA CAMA O SERVICIO INCLUYE: INSTALACION Y PRUEBAS DEBERAN SER REALIZADA POR  TECNICOS CALIFICADOS 
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