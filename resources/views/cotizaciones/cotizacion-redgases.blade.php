<x-guest-layout>
    <livewire:cotizaciones.cotizacion-redgases />
    <form method="POST" action="{{ route('store-cotizacion-redgases') }}" enctype="multipart/form-data">
        @csrf
        
        <!-- Encabezado -->
        <div class="text-center text-gray-800 dark:text-white mb-8">
            <h1 class="text-3xl font-bold text-blue-600 dark:text-blue-400">PROPUESTA DE OBRA</h1>
        </div>

        <!-- Contenedor Principal -->
        <div class="max-w-4xl mx-auto px-4">
            
            <!-- Sección de Partida (Centrada) -->
            <div class="bg-blue-50 dark:bg-slate-800 rounded-lg p-8 mb-10 border-l-4 border-blue-600">
                <div class="text-center">
                    <label class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Partida</label>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mt-2 mb-4">Tubería y conexiones de cobre</h2>
                    
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
            </div>

            <!-- Formulario de Campos (Ergonómico) -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-8 border border-gray-200 dark:border-slate-700">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-8">Especificaciones técnicas</h3>
                
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
                        <input type="number" id="precio" name="precio" placeholder="0.00" step="0.01" class="px-4 py-3 border-2 border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 transition-all">
                    </div>

                </div>
                <button type="button" onclick="agregarProducto()" class="text-blue-700 hover:underline mt-4">+
                        Agregar otra tuberia y/o conexión
                    </button>
              <!-- Sección de Partida (Centrada) -->
            <div class="mt-10 bg-blue-50 dark:bg-slate-800 rounded-lg p-8 mb-10 border-l-4 border-blue-600">
                <div class="text-center">
                    <label class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Partida</label>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mt-2 mb-4">Tubería y conexiones de cobre</h2>
                    
                    <div class="bg-white dark:bg-slate-700 rounded-lg p-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                        <p class="mb-4">
                            <strong>SUMINISTRO E INSTLACION DE ETIQUETAS PARA LA SEÑALIZACIÓN DEL FLUIDO EN TUBERÍAS, CON EL NOMBRE 
                                DEL GAS.</strong>
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Incluye: COSTO DE MANO DE OBRA Y MATERIALES REQUERIDOS EN LA EJECUCIÓN, FLETE A OBRA, ACARREOS, COLOCACIÓN 
                            LIMPIEZA Y EQUIPO DE SEGURIDAD, INSTALACIÓN ESPECIFICAS, DEPRECIACIÓN Y DEMAS CARGOS DERIVADOS DEL USO DE EQUIPO 
                            Y HERRAMIENTA, EN CUALQUIER NIVEL.
                        </p>
                    </div>
                </div>
            </div>
                <!-- Inputs para etiquetado -->
            <div class=" grid grid-cols-1 md:grid-cols-5 gap-3">
                    
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
                        Agregar otro etiquetado
                </button>

                <!-- Sección de Partida (Centrada) -->
            <div class="mt-10 bg-blue-50 dark:bg-slate-800 rounded-lg p-8 mb-10 border-l-4 border-blue-600">
                <div class="text-center">
                    <label class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Partida</label>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mt-2 mb-4">Tubería y conexiones de cobre</h2>
                    
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
            </div>
                <!-- Inputs para etiquetado -->
            <div class=" grid grid-cols-1 md:grid-cols-5 gap-3">
                    
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
               
                <!-- Sección de Partida (Centrada) -->
            <div class="mt-10 bg-blue-50 dark:bg-slate-800 rounded-lg p-8 mb-10 border-l-4 border-blue-600">
                <div class="text-center">
                    <label class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Partida</label>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mt-2 mb-4">Tubería y conexiones de cobre</h2>
                    
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
            </div>
                <!-- Inputs para etiquetado -->
            <div class=" grid grid-cols-1 md:grid-cols-5 gap-3">
                    
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

                <!-- Sección de Partida (Centrada) -->
            <div class="mt-10 bg-blue-50 dark:bg-slate-800 rounded-lg p-8 mb-10 border-l-4 border-blue-600">
                <div class="text-center">
                    <label class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">Partida</label>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mt-2 mb-4">Tubería y conexiones de cobre</h2>
                    
                    <div class="bg-white dark:bg-slate-700 rounded-lg p-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                        <p class="mb-4">
                            <strong>SUMINISTRO E INSTALACIÓN DE COPLE DE COBRE FORJADO, MARCA NACOBRE O SIMILAR.</strong>
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Incluye: LIMPIEZA PARA SERVICIO DE USO OXIGENO EN BASE A LA NORMA CGA G4, METALES DE APORTE
                            SERIE BCuP, LA INSTALACIÓN Y PRUEBAS
                            DEBERAN SER REALIZADA POR TECNICOS CALIFICADOS; CARGO DIRECTO POR EL COSTO DE MANO DE OBRA Y MATERIALES REQUERIDOS, FLETE A OBRA, ACARREO,
                            TRAZO, FIJACION, NIVELACION Y PRUEBA, LIMPIEZA Y RETIRO DE SOBRANTES FUERA DE OBRA, EQUIPO DE SEGURIDAD,
                            INSTALACIONES ESṔECIFICAS, DEPRECIACIÓN Y DEMAS CARGOS DERIVADOS DEL USO DE EQUIPO DE 
                            OXIACETILENO Y HERRAMIENTA EN CUALQUIER NIVEL. 

                        </p>
                    </div>
                </div>
            </div>
                <!-- Inputs para etiquetado -->
            <div class=" grid grid-cols-1 md:grid-cols-5 gap-3">
                    
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
                <button type="button" onclick="agregarProducto()" class="text-blue-700 hover:underline mt-4">+
                        Agregar cople de cobre
                </button>
                <!-- Botón Enviar -->
                <div class="flex justify-center mt-10 pt-8 border-t border-gray-200 dark:border-slate-700">
                    <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-500">
                        Guardar Propuesta
                    </button>
                </div>
            
            
            </div>

        </div>

    </form>
</x-guest-layout>