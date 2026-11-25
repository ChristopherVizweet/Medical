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
    <div class="border border-black text-center items-center p-6 w-full h-full bg-blue-800">
        
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
                                                                                                             
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-fg-dqam3="12.9:12.1533:/src/app/components/QuotationSelector.tsx:24:7:580:934:e:div:x">
                <!-- BOTON PARA SUMINISTRO E INSTALACION DE ETIQUETADO -->
                <div class="rounded-lg border-2 border-gray-200 bg-white p-4 shadow-sm transition-all hover:border-blue-300 hover:bg-gray-50">
                    <button type="button" x-data
                        x-on:click="$dispatch('open-modal', 'crear-proyecto1')" class="w-full text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <h3 class="font-semibold text-gray-800">SUMINISTRO E INSTALACION DE ETIQUETADO</h3>
                        @if ($detalles->isEmpty())
                            <span class="mt-2 inline-flex text-sm font-medium text-red-600">Sin registro</span>
                        @else
                            <span class="mt-2 inline-flex text-sm font-medium text-green-700">Registrado</span>
                        @endif
                    </button>
                    @if (!$detalles->isEmpty())
                        <button type="button" x-data x-on:click="$dispatch('open-modal', 'detalles-proyecto1')"
                            class="mt-3 inline-flex items-center gap-1 text-sm font-semibold text-blue-700 transition hover:text-blue-900 focus:outline-none focus:underline">
                            <span>Ver detalles</span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </button>
                    @endif
                </div>
                <!-- Modal -->
                <x-modal name="crear-proyecto1" maxWidth="2xl">
                    <div class="overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
                        <header class="border-b border-slate-200 bg-slate-50 px-6 py-5 dark:border-slate-700 dark:bg-slate-800">
                            <div class="flex items-start gap-4">
                                <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-100 text-blue-700 dark:bg-blue-900/50 dark:text-blue-300">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                        <path d="M4 7h16M7 4v6m10-6v6M5 12h14v8H5z"/><path d="M8 16h3m2 0h3"/>
                                    </svg>
                                </span>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-blue-700 dark:text-blue-300">Registro de concepto</p>
                                    <h1 class="mt-1 text-lg font-bold text-slate-900 dark:text-white">SUMINISTRO E INSTALACIÓN DE ETIQUETADO</h1>
                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Capture los datos y agregue las partidas necesarias para esta cotización.</p>
                                </div>
                            </div>
                        </header>

                        <form method="POST" action="{{ route('index-cotizacion-store') }}" class="space-y-6 p-6">
                            @csrf
                            <section class="rounded-xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-700 dark:bg-slate-800/60">
                                <h2 class="text-sm font-bold text-slate-800 dark:text-slate-100">Descripción del concepto</h2>
                                <div class="mt-3 space-y-3 text-sm leading-6 text-slate-600 dark:text-slate-300">
                                    <p>
                                        <strong class="text-slate-800 dark:text-slate-100">SUMINISTRO Y APLICACIÓN DE PINTURA DE ESMALTE ALQUIDALICO ANTICORROSIVO, DE ACUERDO A ESPECIFICACIONES Y
                                            CODIGO DE COLORES DE LA INSTITUCIÓN.</strong>
                                    </p>
                                    <p>
                                        Incluye: CARGO DIRECTO POR EL COSTO DE MANO DE OBRA Y MATERIALES REQUERIDOS, FLETER A OBRA, ACCARREO,
                                        APLICACIÓN A DOS MANOS MINIMO, LIMPIEZA Y RETIRO DE SOBRANTES FUERA, EQUIPO DE SEGURIDAD, INSTALACIONES ESPECIFICAS,
                                        DEPRECIACIÓN Y DEMAS CARGOS DERIVADOS DEL USO DE EQUIPO Y HERRAMIENTA EN CUALQUIER NIVEL.
                                    </p>
                                </div>
                            </section>

                            <section>
                                <div class="mb-4 flex items-end justify-between gap-3">
                                    <div>
                                        <h2 class="text-base font-bold text-slate-900 dark:text-white">Partidas de tubería y conexiones</h2>
                                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Complete las medidas, cantidades y precios de cada partida.</p>
                                    </div>
                                    <span class="hidden rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600 dark:bg-slate-700 dark:text-slate-300 sm:inline-flex">MXN</span>
                                </div>

                            <div id="detalle-conexion-rows" class="space-y-3">
                                <div class="detalle-conexion grid grid-cols-1 gap-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-800 md:grid-cols-5">

                                <!-- Campo Diámetro -->
                                <div class="flex flex-col">
                                    <label for="diametro-0" class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-300">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Diámetro (MM)
                                        </span>
                                    </label>
                                        

                                   <select id="diametro-0" name="detalles[0][descripcion_detalle_rm]" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-800 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/10 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                                        <option value="">-Seleccionar-</option>
                                        <option value="DE 13 MM. DE DIÁMETRO.">DE 13 MM. DE DIÁMETRO.</option>
                                        <option value="DE 19 MM. DE DIÁMETRO.">DE 19 MM. DE DIÁMETRO.</option>
                                        <option value="DE 25 MM. DE DIÁMETRO.">DE 25 MM. DE DIÁMETRO.</option>
                                        <option value="DE 32 MM. DE DIÁMETRO.">DE 32 MM. DE DIÁMETRO.</option>
                                        <option value="DE 51 MM. DE DIÁMETRO.">DE 51 MM. DE DIÁMETRO.</option>
                                        <option value="DE 64 MM. DE DIÁMETRO.">DE 64 MM. DE DIÁMETRO.</option>
                                        <option value="DE 75 MM. DE DIÁMETRO.">DE 75 MM. DE DIÁMETRO.</option>
                                    </select>
                                </div>

                                <!-- Campo Cantidad -->
                                <div class="flex flex-col">
                                    <label for="unidad-0" class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-300">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Unidad
                                        </span>
                                    </label>
                                    <input value="PZA." readonly="TRUE" type="text" id="unidad-0" name="detalles[0][unidad_detalle_rm]" class="w-full rounded-lg border border-slate-200 bg-slate-100 px-3 py-2.5 text-sm font-medium text-slate-600 dark:border-slate-700 dark:bg-slate-700 dark:text-slate-300">
                                </div>

                                <!-- Campo cantidad -->
                                <div class="flex flex-col">
                                    <label for="cantidad-0" class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-300">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Cantidad
                                        </span>
                                    </label>
                                    <input type="number" min="0" step="any" id="cantidad-0" name="detalles[0][cantidad_detalle_rm]" placeholder="0" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-800 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/10 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                                </div>

                                <!-- Campo Precio MXN -->
                                <div class="flex flex-col">
                                    <label for="precio-0" class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-300">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Precio(MXN)
                                        </span>
                                    </label>
                                    <input type="number" min="0" id="precio-0" name="detalles[0][precio_detalle_rm]" placeholder="0.00" step="0.01" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-800 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/10 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                                </div>

                                <!-- Campo importe MXN -->
                                <div class="flex flex-col">
                                    <label for="importe-0" class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-300">
                                        <span class="flex items-center">
                                            <span class="text-red-500 mr-1">*</span>
                                            Importe (MXN)
                                        </span>
                                    </label>
                                    <input type="number" min="0" id="importe-0" name="detalles[0][importe_detalle_rm]" placeholder="0.00" step="0.01" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-800 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/10 dark:border-slate-600 dark:bg-slate-900 dark:text-white">
                                </div>
                                <div class="md:col-span-5 flex justify-end">
                                    <button type="button" data-remove-detalle hidden class="inline-flex items-center gap-1 rounded-md px-2 py-1 text-xs font-semibold text-red-600 transition hover:bg-red-50 hover:text-red-700 dark:text-red-400 dark:hover:bg-red-900/40">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                            <path d="M4 7h16M10 11v6m4-6v6M6 7l1 14h10l1-14M9 7V4h6v3"/>
                                        </svg>
                                        Quitar esta partida
                                    </button>
                                    </div>
                            </div>
                            </div>
                            </div>
                            <button id="agregar-detalle-conexion" type="button" class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-dashed border-blue-300 bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-700 transition hover:border-blue-400 hover:bg-blue-100 dark:border-blue-800 dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50">
                                <span class="grid h-5 w-5 place-items-center rounded-full bg-blue-600 text-base leading-none text-white">+</span>
                                Agregar otra tubería o conexión
                            </button>
                            <p class="text-center text-xs text-slate-500 dark:text-slate-400">Puede registrar varias partidas antes de guardar.</p>
                            </section>

                            <footer class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 dark:border-slate-700 sm:flex-row sm:justify-end">
                                <button type="button" x-data x-on:click="$dispatch('close-modal', 'crear-proyecto1')" class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 dark:border-slate-600 dark:text-slate-200 dark:hover:bg-slate-800">
                                    Cancelar
                                </button>
                                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-500/25">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path d="M5 12.5 9.5 17 19 7"/>
                                    </svg>
                                    Guardar partidas
                                </button>
                            </footer>
                        </form>
                    </div>
                </x-modal>

                <x-modal name="detalles-proyecto1" maxWidth="2xl">
                    <div class="overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
                        <header class="border-b border-slate-200 bg-slate-50 px-6 py-5 dark:border-slate-700 dark:bg-slate-800">
                            <p class="text-xs font-bold uppercase tracking-[0.16em] text-blue-700 dark:text-blue-300">Cotización registrada</p>
                            <h2 class="mt-1 text-xl font-bold text-slate-900 dark:text-white">Detalle de partidas</h2>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                {{ $detalles->count() }} {{ $detalles->count() === 1 ? 'partida guardada' : 'partidas guardadas' }}
                            </p>
                        </header>

                        <div class="space-y-5 p-6">
                            @if ($detalles->isEmpty())
                                <p class="rounded-lg bg-slate-50 p-4 text-sm text-slate-600 dark:bg-slate-800 dark:text-slate-300">
                                    Aún no hay partidas registradas.
                                </p>
                            @else
                                <div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-slate-700">
                                    <table class="w-full min-w-[640px] divide-y divide-slate-200 text-left text-sm dark:divide-slate-700">
                                        <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500 dark:bg-slate-800 dark:text-slate-300">
                                            <tr>
                                                <th scope="col" class="px-4 py-3">Diámetro</th>
                                                <th scope="col" class="px-4 py-3">Unidad</th>
                                                <th scope="col" class="px-4 py-3 text-right">Cantidad</th>
                                                <th scope="col" class="px-4 py-3 text-right">Precio</th>
                                                <th scope="col" class="px-4 py-3 text-right">Importe</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100 bg-white dark:divide-slate-800 dark:bg-slate-900">
                                            @foreach ($detalles as $detalle)
                                                <tr class="text-slate-700 dark:text-slate-200">
                                                    <td class="px-4 py-3 font-medium">
                                                        {{ $detalle->descripcion_detalle_rm ?: ($detalle->concepto_detalle_rm_id ? 'Concepto #' . $detalle->concepto_detalle_rm_id : 'Sin especificar') }}
                                                    </td>
                                                    <td class="px-4 py-3">{{ $detalle->unidad_detalle_rm ?: '—' }}</td>
                                                    <td class="px-4 py-3 text-right">{{ $detalle->cantidad_detalle_rm !== null ? number_format((float) $detalle->cantidad_detalle_rm, 2) : '—' }}</td>
                                                    <td class="px-4 py-3 text-right">{{ $detalle->precio_detalle_rm !== null ? '$' . number_format((float) $detalle->precio_detalle_rm, 2) : '—' }}</td>
                                                    <td class="px-4 py-3 text-right font-semibold">{{ $detalle->importe_detalle_rm !== null ? '$' . number_format((float) $detalle->importe_detalle_rm, 2) : '—' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            <footer class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 dark:border-slate-700 sm:flex-row sm:justify-end">
                                <button type="button" x-on:click="$dispatch('close-modal', 'detalles-proyecto1')" class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 dark:border-slate-600 dark:text-slate-200 dark:hover:bg-slate-800">
                                    Cerrar
                                </button>
                                <button type="button" x-on:click="$dispatch('close-modal', 'detalles-proyecto1'); $dispatch('open-modal', 'crear-proyecto1')" class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-500/25">
                                    Agregar más partidas
                                </button>
                            </footer>
                        </div>
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
                <!-- Equipamiento y resumen -->
                <div class="mt-6 grid grid-cols-1 lg:grid-cols-12 gap-5">
                    <div class="lg:col-span-8 space-y-4">
                        <section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h2 class="mb-4 flex items-center gap-2 text-base font-semibold text-slate-800">
                                <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path d="M3 21V3h18v18H3Z"/><path d="m3 21 18-18"/>
                                </svg>
                                Dimensiones del Chasis
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="horizontal-altura" class="mb-2 block text-xs font-semibold text-slate-600">Altura (mm)</label>
                                    <div class="flex items-center rounded-lg border border-slate-200 px-3 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100">
                                        <input type="number" id="horizontal-altura" name="altura" value="800" class="w-full border-0 bg-transparent py-3 text-sm text-slate-800 outline-none" placeholder="Ej: 800">
                                        <span class="text-xs text-slate-400">mm</span>
                                    </div>
                                </div>
                                <div>
                                    <label for="horizontal-anchura" class="mb-2 block text-xs font-semibold text-slate-600">Ancho (mm)</label>
                                    <div class="flex items-center rounded-lg border border-slate-200 px-3 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100">
                                        <input type="number" id="horizontal-anchura" name="anchura" value="1200" class="w-full border-0 bg-transparent py-3 text-sm text-slate-800 outline-none" placeholder="Ej: 1200">
                                        <span class="text-xs text-slate-400">mm</span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h2 class="mb-4 flex items-center gap-2 text-base font-semibold text-slate-800">
                                <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <circle cx="12" cy="12" r="3"/><path d="m19 12 2-1-2-4-2 1-2-1-1-3h-4l-1 3-2 1-2-1-2 4 2 1v2l-2 1 2 4 2-1 2 1 1 3h4l1-3 2-1 2 1 2-4-2-1v-2Z"/>
                                </svg>
                                Componentes y Accesorios
                            </h2>

                            <div id="consola-horizontal-componentes" class="max-h-[470px] space-y-3 overflow-y-auto pr-1">
                                @php
                                    $componentesHorizontal = [
                                        ['TOMA-OXY', 'Toma para Oxígeno', '3500', 'Conexión enchufe rápido ARAMED'],
                                        ['TOMA-AIR', 'Toma de Aire', '2700', 'Conexión enchufe rápido ARAMED'],
                                        ['TOMA-VAC', 'Toma de Vacío', '2700', 'Conexión enchufe rápido ARAMED'],
                                        ['CONTACTO-R', 'Contacto dúplex hospitalario rojo', '1800', '127 V, 20 A'],
                                        ['CONTACTO-W', 'Contacto dúplex hospitalario blanco', '1800', '127 V, 20 A'],
                                        ['APAGADOR', 'Apagador de falso plafón', '950', 'Incluye instalación'],
                                        ['LAMPARA', 'Lámpara de iluminación', '4200', 'Luz de ambiente y lectura'],
                                        ['RIEL-GSX', 'Riel tipo GSX', '2200', 'Soporte para monitor'],
                                        ['PORTA-MON', 'Soporte porta monitor', '2600', 'Montaje incluido'],
                                        ['PORTA-VENO', 'Soporte porta venoclisis', '1800', 'Montaje incluido'],
                                        ['PORTA-INF', 'Soporte para bomba de infusión', '2400', 'Montaje incluido'],
                                        ['CANASTILLA', 'Canastilla porta medicamentos', '2100', 'Montaje incluido'],
                                        ['CABLE', 'Cable XHHW-2 calibre 12', '65', 'Por metro'],
                                        ['RJ45', 'Troquel para contacto RJ-45', '450', 'Unidad'],
                                        ['VOZ-DATOS', 'Troquel para voz y datos', '450', 'Unidad'],
                                    ];
                                @endphp

                                @foreach ($componentesHorizontal as $index => $componente)
                                    <label class="componente-horizontal flex cursor-pointer items-start gap-3 rounded-lg border border-slate-200 p-4 transition hover:border-blue-300 hover:bg-blue-50/40">
                                        <input type="checkbox" name="componentes_horizontal[]" value="{{ $componente[0] }}" data-price="{{ $componente[2] }}"
                                            class="componente-check mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-start justify-between gap-3">
                                                <div>
                                                    <p class="text-sm font-bold text-slate-800">{{ $componente[0] }} - {{ $componente[1] }}</p>
                                                    <p class="mt-1 text-xs italic text-slate-500">{{ $componente[3] }}</p>
                                                </div>
                                                <span class="shrink-0 text-sm font-bold text-blue-600">${{ number_format((float) $componente[2], 0) }}</span>
                                            </div>
                                            @if ($index < 3)
                                                <div class="mt-3 border-t border-slate-100 pt-3">
                                                    <p class="mb-2 text-xs text-slate-500">Materiales de montaje incluidos:</p>
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 text-xs text-slate-500">
                                                        <span>• 1x Válvula de cierre rápido</span>
                                                        <span>• 1x Conector DSS</span>
                                                        <span>• 4x Tornillos M5</span>
                                                        <span>• 2x Empaquetaduras</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            <button type="button" onclick="agregarSuministroHorizontal()" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-blue-700 hover:text-blue-900">
                                <span class="text-lg leading-none">+</span>
                                Agregar suministro para consola horizontal
                            </button>
                        </section>
                    </div>

                    <aside class="lg:col-span-4">
                        <div class="sticky top-6 rounded-xl bg-blue-700 p-4 text-white shadow-lg">
                            <h2 class="mb-4 flex items-center gap-2 text-lg font-bold">
                                <span class="grid h-7 w-7 place-items-center rounded-full bg-white/15">🎨</span>
                                Resumen de Cotización
                            </h2>

                            <div class="rounded-lg bg-white/10 px-4 py-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-blue-100">Precio base (chasis)</span>
                                    <strong id="precio-base-horizontal">$0</strong>
                                </div>
                            </div>

                            <div class="mt-3 text-blue-100 dark:text-blue-300 rounded-xl border border-blue-400/40 bg-white/15 p-4">
                                <div class="flex items-center justify-between text-blue-900 dark:text-blue-900">
                                    <span class="flex items-center gap-2 text-lg font-bold text-blue-100 dark:text-blue-300">
                                        <span class="grid h-5 w-5 place-items-center rounded-sm bg-blue-400 text-xs">✓</span>
                                        Total
                                    </span>
                                    <strong id="total-horizontal" class="text-3xl text-blue-100 dark:text-blue-300">$0</strong>
                                </div>
                                <p class="mt-2 text-right text-xs text-red-100 dark:text-blue-300">MXN (Pesos Mexicanos)</p>
                            </div>

                            <button type="button" class="mt-4 flex w-full items-center justify-center gap-2 rounded-lg bg-white py-3 text-sm font-bold text-blue-700 shadow-sm transition hover:bg-blue-50">
                                <span>▤</span>
                                Generar Cotización PDF
                            </button>

                            <div class="mt-3 rounded-lg bg-blue-900/35 px-3 py-3 text-center text-[11px] leading-5 text-blue-100">
                                ✓ Precios incluyen materiales de montaje<br>
                                ✓ Instalación opcional disponible
                            </div>
                        </div>
                    </aside>
                </div>
            </div>


            <!-- inputs para agregar la altura y anchura DE CONSOLA VERTICAL -->


            <div id="panel-consolasVerticales" class="category-contenido hidden">
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

                <div class="mt-6 grid grid-cols-1 lg:grid-cols-12 gap-5">
                    <div class="lg:col-span-8 space-y-4">
                        <section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h2 class="mb-4 flex items-center gap-2 text-base font-semibold text-slate-800">
                                <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path d="M3 21V3h18v18H3Z"/><path d="m3 21 18-18"/>
                                </svg>
                                Dimensiones del Chasis
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="vertical-altura" class="mb-2 block text-xs font-semibold text-slate-600">Altura (mm)</label>
                                    <div class="flex items-center rounded-lg border border-slate-200 px-3 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100">
                                        <input type="number" id="vertical-altura" name="altura" class="w-full border-0 bg-transparent py-3 text-sm text-slate-800 outline-none" placeholder="Ej: 1200">
                                        <span class="text-xs text-slate-400">mm</span>
                                    </div>
                                </div>
                                <div>
                                    <label for="vertical-anchura" class="mb-2 block text-xs font-semibold text-slate-600">Ancho (mm)</label>
                                    <div class="flex items-center rounded-lg border border-slate-200 px-3 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100">
                                        <input type="number" id="vertical-anchura" name="anchura" class="w-full border-0 bg-transparent py-3 text-sm text-slate-800 outline-none" placeholder="Ej: 800">
                                        <span class="text-xs text-slate-400">mm</span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h2 class="mb-4 flex items-center gap-2 text-base font-semibold text-slate-800">
                                <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <circle cx="12" cy="12" r="3"/><path d="m19 12 2-1-2-4-2 1-2-1-1-3h-4l-1 3-2 1-2-1-2 4 2 1v2l-2 1 2 4 2-1 2 1 1 3h4l1-3 2-1 2 1 2-4-2-1v-2Z"/>
                                </svg>
                                Componentes y Accesorios
                            </h2>

                            <div id="consola-vertical-componentes" class="max-h-[470px] space-y-3 overflow-y-auto pr-1">
                                @php
                                    $componentesVertical = $componentesHorizontal;
                                @endphp

                                @foreach ($componentesVertical as $index => $componente)
                                    <label class="componente-vertical flex cursor-pointer items-start gap-3 rounded-lg border border-slate-200 p-4 transition hover:border-blue-300 hover:bg-blue-50/40">
                                        <input type="checkbox" name="componentes_vertical[]" value="{{ $componente[0] }}" data-price="{{ $componente[2] }}"
                                            class="componente-check mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-start justify-between gap-3">
                                                <div>
                                                    <p class="text-sm font-bold text-slate-800">{{ $componente[0] }} - {{ $componente[1] }}</p>
                                                    <p class="mt-1 text-xs italic text-slate-500">{{ $componente[3] }}</p>
                                                </div>
                                                <span class="shrink-0 text-sm font-bold text-blue-600">${{ number_format((float) $componente[2], 0) }}</span>
                                            </div>
                                            @if ($index < 3)
                                                <div class="mt-3 border-t border-slate-100 pt-3">
                                                    <p class="mb-2 text-xs text-slate-500">Materiales de montaje incluidos:</p>
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 text-xs text-slate-500">
                                                        <span>• 1x Válvula de cierre rápido</span>
                                                        <span>• 1x Conector DSS</span>
                                                        <span>• 4x Tornillos M5</span>
                                                        <span>• 2x Empaquetaduras</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            <button type="button" onclick="agregarProductoVertical()" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-blue-700 hover:text-blue-900">
                                <span class="text-lg leading-none">+</span>
                                Agregar suministro para consola vertical
                            </button>
                        </section>
                    </div>

                    <aside class="lg:col-span-4">
                        <div class="sticky top-6 rounded-xl bg-blue-700 p-4 text-white shadow-lg">
                            <h2 class="mb-4 flex items-center gap-2 text-lg font-bold">
                                <span class="grid h-7 w-7 place-items-center rounded-full bg-white/15">🎨</span>
                                Resumen de Cotización
                            </h2>

                            <div class="rounded-lg bg-white/10 px-4 py-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-blue-100">Precio base (chasis)</span>
                                    <strong id="precio-base-vertical">$0</strong>
                                </div>
                            </div>

                            <div class="mt-3 text-blue-100 dark:text-blue-300 rounded-xl border border-blue-400/40 bg-white/15 p-4">
                                <div class="flex items-center justify-between text-blue-900 dark:text-blue-900">
                                    <span class="flex items-center gap-2 text-lg font-bold text-blue-100 dark:text-blue-300">
                                        <span class="grid h-5 w-5 place-items-center rounded-sm bg-blue-400 text-xs">✓</span>
                                        Total
                                    </span>
                                    <strong id="total-vertical" class="text-3xl text-blue-100 dark:text-blue-300">$0</strong>
                                </div>
                                <p class="mt-2 text-right text-xs text-red-100 dark:text-blue-300">MXN (Pesos Mexicanos)</p>
                            </div>

                            <button type="button" class="mt-4 flex w-full items-center justify-center gap-2 rounded-lg bg-white py-3 text-sm font-bold text-blue-700 shadow-sm transition hover:bg-blue-50">
                                <span>▤</span>
                                Generar Cotización PDF
                            </button>

                            <div class="mt-3 rounded-lg bg-blue-900/35 px-3 py-3 text-center text-[11px] leading-5 text-blue-100">
                                ✓ Precios incluyen materiales de montaje<br>
                                ✓ Instalación opcional disponible
                            </div>
                        </div>
                    </aside>
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
            configurarConsola('consola-horizontal-componentes', 'total-horizontal');
            configurarConsola('consola-vertical-componentes', 'total-vertical');
        });

        function configurarConsola(contenedorId, totalId) {
            const contenedor = document.getElementById(contenedorId);
            if (!contenedor) return;

            function actualizarTotal() {
                let total = 0;
                contenedor.querySelectorAll('.componente-check').forEach(function(check) {
                    const tarjeta = check.closest('label');
                    if (check.checked) {
                        total += Number(check.dataset.price || 0);
                        tarjeta.classList.add('border-blue-500', 'bg-blue-50');
                    } else {
                        tarjeta.classList.remove('border-blue-500', 'bg-blue-50');
                    }
                });

                const totalElement = document.getElementById(totalId);
                if (totalElement) {
                    totalElement.textContent = '$' + total.toLocaleString('es-MX');
                }
            }

            contenedor.addEventListener('change', actualizarTotal);
            contenedor.addEventListener('input', function(event) {
                if (event.target.classList.contains('precio-personalizado')) {
                    const tarjeta = event.target.closest('label');
                    tarjeta.querySelector('.componente-check').dataset.price = event.target.value || 0;
                    actualizarTotal();
                }
            });
            actualizarTotal();
        }

        function agregarProductoEnConsola(contenedorId, componenteClass, name, descripcionName) {
            const contenedor = document.getElementById(contenedorId);
            if (!contenedor) return;
            const tarjeta = document.createElement('label');
            tarjeta.className = componenteClass + ' flex cursor-pointer items-start gap-3 rounded-lg border border-slate-200 p-4 transition hover:border-blue-300 hover:bg-blue-50/40';
            tarjeta.innerHTML = `
                <input type="checkbox" name="${name}" value="personalizado" data-price="0"
                    class="componente-check mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-bold text-slate-800">SUMINISTRO PERSONALIZADO</p>
                    <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <input type="text" name="${descripcionName}" placeholder="Descripción del suministro"
                            class="rounded-md border border-slate-200 px-3 py-2 text-sm outline-none focus:border-blue-500">
                        <input type="number" min="0" step="0.01" placeholder="Precio"
                            class="precio-personalizado rounded-md border border-slate-200 px-3 py-2 text-sm outline-none focus:border-blue-500">
                    </div>
                </div>`;
            contenedor.appendChild(tarjeta);
            tarjeta.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        function agregarSuministroHorizontal() {
            agregarProductoEnConsola('consola-horizontal-componentes', 'componente-horizontal', 'componentes_horizontal[]', 'suministro_personalizado[]');
        }

        function agregarProductoVertical() {
            agregarProductoEnConsola('consola-vertical-componentes', 'componente-vertical', 'componentes_vertical[]', 'suministro_personalizado_vertical[]');
        }
    </script>

<!-- Script para agregar mas campos a tuberia y conexion -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filasDetalle = document.getElementById('detalle-conexion-rows');
        const agregarDetalle = document.getElementById('agregar-detalle-conexion');

        if (filasDetalle && agregarDetalle) {
            let siguienteIndice = filasDetalle.querySelectorAll('.detalle-conexion').length;

            agregarDetalle.addEventListener('click', function() {
                const fila = filasDetalle.querySelector('.detalle-conexion').cloneNode(true);
                const ids = new Map();

                fila.querySelectorAll('[id]').forEach(function(elemento) {
                    const idAnterior = elemento.id;
                    elemento.id = idAnterior.replace(/-\d+$/, '-' + siguienteIndice);
                    ids.set(idAnterior, elemento.id);
                });

                fila.querySelectorAll('label[for]').forEach(function(label) {
                    if (ids.has(label.htmlFor)) {
                        label.htmlFor = ids.get(label.htmlFor);
                    }
                });

                fila.querySelectorAll('[name]').forEach(function(campo) {
                    campo.name = campo.name.replace(/detalles\[\d+\]/, 'detalles[' + siguienteIndice + ']');
                });

                fila.querySelectorAll('input').forEach(function(campo) {
                    if (!campo.readOnly) campo.value = '';
                });
                fila.querySelectorAll('select').forEach(function(campo) {
                    campo.selectedIndex = 0;
                });
                fila.querySelector('[data-remove-detalle]').hidden = false;
                filasDetalle.appendChild(fila);
                siguienteIndice++;
                fila.querySelector('select').focus();
            });

            filasDetalle.addEventListener('click', function(event) {
                const botonQuitar = event.target.closest('[data-remove-detalle]');
                if (botonQuitar) botonQuitar.closest('.detalle-conexion').remove();
            });
        }

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