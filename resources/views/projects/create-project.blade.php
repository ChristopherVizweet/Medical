<x-guest-layout>
    <form method="POST" action="{{ route('store-project') }}" enctype="multipart/form-data">
        @csrf

        <div class="text-center text-gray-800 dark:text-white">
            <h1 class="text-2xl font-bold">NUEVO PROYECTO</h1>
        </div><br>

        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg max-w-6xl mx-auto space-y-6">

            {{-- Información General --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Información del Proyecto</h2>

                <div class="hidden">
                    <x-input-label for="folioProject" :value="__('Folio del proyecto')" />
                    <x-text-input id="folioProject" class="mt-1 block w-full " type="text" name="folioProject"
                        :value="old('folioProject')" />
                    <x-input-error :messages="$errors->get('folioProject')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="nameProject" :value="__('Nombre del proyecto')" />
                    <x-text-input id="nameProject" class="mt-1 block w-full" type="text" name="nameProject"
                        :value="old('nameProject')" />
                    <x-input-error :messages="$errors->get('nameProject')" class="mt-2" />
                </div> <br>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!---AQUI COMIENZA EL ESTILO DE LOS CAMPOS-->
                    <div>
                        <x-input-label for="estado_project" :value="__('Estado')" />
                        <x-text-input id="estado_project" class="mt-1 block w-full" type="text" name="estado_project"
                            placeholder="Ingrese el estado del proyecto" :value="old('estado_project')" required />
                        <x-input-error :messages="$errors->get('estado_project')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="lugar_project" :value="__('Lugar')" />
                        <x-text-input id="lugar_project" class="mt-1 block w-full" type="text" name="lugar_project"
                            placeholder="Ingrese el lugar del proyecto" :value="old('lugar_project')" required />
                        <x-input-error :messages="$errors->get('lugar_project')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="area_project" :value="__('Área')" />
                        <x-text-input id="area_project" class="mt-1 block w-full" type="text" name="area_project"
                            placeholder="Ingrese el área del proyecto" :value="old('area_project')" required />
                        <x-input-error :messages="$errors->get('area_project')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="piso_project" :value="__('Piso')" />
                        <x-text-input id="piso_project" class="mt-1 block w-full" type="text" name="piso_project"
                            placeholder="Ingrese el piso del proyecto" :value="old('piso_project')" required />
                        <x-input-error :messages="$errors->get('piso_project')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="id_client" :value="__('Cliente')" />
                        <select class="mt-1 block w-full" name="id_client" id="id_client" required>
                            <option value="">-Seleccionar-</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name_Client }}</option><br>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="company" :value="__('Empresa encargada')" />
                        <select class="mt-1 block w-full" name="company" id="company" required>
                            <option value="">-Seleccionar-</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->nameCompany }}</option><br>
                            @endforeach
                        </select>
                    </div>


                    <div>
                        <x-input-label for="seller_id_usuario" :value="__('Vendedor')" />
                        <select class="mt-1 block w-full" name="seller_id_usuario" id="seller_id_usuario" required>
                            <option value="">-Seleccionar-</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option><br>
                            @endforeach
                        </select>
                    </div>


                    <div>
                        <x-input-label for="inCharge_id_usuario" :value="__('Encargado')" />
                        <select class="mt-1 block w-full" name="inCharge_id_usuario" id="inCharge_id_usuario" required>
                            <option value="">-Seleccionar-</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option><br>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="id_priority" :value="__('Prioridad')" />
                        <select class="mt-1 block w-full" name="id_priority" id="id_priority" required>
                            <option value="">-Seleccionar-</option>
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority->id }}">{{ $priority->namePriority }}</option><br>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="id_status" :value="__('Status')" />
                        <select class="mt-1 block w-full" name="id_status" id="id_status" required>
                            <option value="">-Seleccionar-</option>
                            @foreach ($statues as $status)
                                <option value="{{ $status->id }}">{{ $status->nameStatus }}</option><br>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="budget" :value="__('Presupuesto')" />
                        <x-text-input id="budget" class="mt-1 block w-full" type="number" step="0.01"
                            name="budget" placeholder="Ingrese el monto" :value="old('budget')" required />
                        <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="recursosObtenidos" :value="__('Recursos obtenidos por:')" />
                        <select class="mt-1 block w-full" name="recursosObtenidos" id="recursosObtenidos" required>
                            <option value="">-Seleccionar-</option>
                            @foreach ($recursos as $recurso)
                                <option value="{{ $recurso->id }}">{{ $recurso->recursosObtenidos }}</option><br>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="accountBank" :value="__('Cuenta bancaria')" />
                        <select class="mt-1 block w-full" name="accountBank" id="accountBank" required>
                            <option value="">-Seleccionar-</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->accountBank }}</option><br>
                            @endforeach
                        </select>
                    </div>


                </div>
            </div>



            {{-- Fechas --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Fechas</h2>

                <div class="flex flex-col space-y-4 text-left text-gray-800 dark:text-white">

                    {{-- Fecha de inicio --}}
                    <div>
                        <x-input-label for="dateBegin" :value="__('Fecha de inicio')" />
                        <x-text-input id="dateBegin" class="mt-1 block w-full max-w-md" type="date"
                            name="dateBegin" :value="old('dateBegin')" required />
                        <x-input-error :messages="$errors->get('dateBegin')" class="mt-2" />
                    </div>

                    {{-- Fecha de finalización --}}
                    <div>
                        <x-input-label for="dateEnd" :value="__('Fecha de finalización')" />
                        <x-text-input id="dateEnd" class="mt-1 block w-full max-w-md" type="date"
                            name="dateEnd" :value="old('dateEnd')" required />
                        <x-input-error :messages="$errors->get('dateEnd')" class="mt-2" />
                    </div>

                    {{-- Duración del proyecto --}}
                    <div class="text-xl text-center">
                        Duración del proyecto: <span id="dias_duracion">0</span> días
                    </div>

                    {{-- Fecha de solicitud --}}
                    <div>
                        <x-input-label for="requestDate" :value="__('Fecha de solicitud')" />
                        <x-text-input id="requestDate" class="mt-1 block w-full max-w-md" type="date"
                            name="requestDate" :value="old('requestDate')" required />
                        <x-input-error :messages="$errors->get('requestDate')" class="mt-2" />
                    </div>

                    {{-- Fecha de cotización --}}
                    <div>
                        <x-input-label for="estimateDate" :value="__('Fecha de cotización')" />
                        <x-text-input id="estimateDate" class="mt-1 block w-full max-w-md" type="date"
                            name="estimateDate" :value="old('estimateDate')" required />
                        <x-input-error :messages="$errors->get('estimateDate')" class="mt-2" />
                    </div>

                    {{-- Duración en días --}}
                    <div class="text-xl text-center">
                        Duración en días entre solicitud y cotización: <span id="dias_duracion1">0</span> días
                    </div>

                    {{-- Fecha autorizada --}}
                    <div>
                        <x-input-label for="authorizedDate" :value="__('Fecha autorizada')" />
                        <x-text-input id="authorizedDate" class="mt-1 block w-full max-w-md" type="date"
                            name="authorizedDate" :value="old('authorizedDate')" required />
                        <x-input-error :messages="$errors->get('authorizedDate')" class="mt-2" />
                    </div>

                    {{-- Duración en días --}}
                    <div class="text-xl text-center">
                        Duración en días entre cotización y autorizada: <span id="dias_duracion2">0</span> días
                    </div>

                    {{-- Fecha en ejecución --}}
                    <div>
                        <x-input-label for="ejecutionDate" :value="__('Fecha en ejecución')" />
                        <x-text-input id="ejecutionDate" class="mt-1 block w-full max-w-md" type="date"
                            name="ejecutionDate" :value="old('ejecutionDate')" required />
                        <x-input-error :messages="$errors->get('ejecutionDate')" class="mt-2" />
                    </div>

                    {{-- Duración en días --}}
                    <div class="text-xl text-center">
                        Duración en días entre autorizada y de ejecución: <span id="dias_duracion3">0</span> días
                    </div>

                    {{-- Fecha de terminación --}}
                    <div>
                        <x-input-label for="finishDate" :value="__('Fecha de terminación')" />
                        <x-text-input id="finishDate" class="mt-1 block w-full max-w-md" type="date"
                            name="finishDate" :value="old('finishDate')" required />
                        <x-input-error :messages="$errors->get('finishDate')" class="mt-2" />
                    </div>

                    {{-- Duración en días --}}
                    <div class="text-xl text-center">
                        Duración en días entre ejecución y terminación: <span id="dias_duracion4">0</span> días
                    </div>

                </div>
            </div>
            {{-- Servicios Autorizados --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Servicio Autorizado</h2>
                <div class="grid grid-cols-2 gap-2 dark:text-white">
                    @foreach ($services as $service)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="nameInstalation[]" value="{{ $service->id }}"
                                {{ in_array($service->id, old('nameInstalation', [])) ? 'checked' : '' }}
                                class="rounded">
                            <span>{{ $service->nameInstalation }}</span>
                        </label>
                    @endforeach

                </div>
            </div>

            {{-- Mano de Obra --}}
            <div class="border p-4 rounded-lg text-black dark:text-white">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Mano de Obra</h2>

                <div class="grid grid-cols-1 gap-4">
                    <table class="w-full text-center text-black dark:text-white" id="tabla-trabajadores">
                        <thead>
                            <tr>
                                <th>Trabajador</th>
                                <th>Salario</th>
                                <th>Jornadas</th>
                                <th>Horas extra</th>
                                <th>Salario extra</th>
                                <th>Total Salario</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="id_empleado[]" for="id_empleado"
                                        class="text-black dark:text-black w-full border p-1 empleado" required>
                                        <option class="text-black dark:text-black">-Seleccionar-</option>
                                        @foreach ($empleados as $empleado)
                                            <option value="{{ $empleado->id }}"
                                                data-sueldo="{{ $empleado->sueldo }}">{{ $empleado->Nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" for="salario" id="salario" name="salario[]"
                                        class="text-black dark:text-black w-full border p-1 salario bg-gray-50"
                                        step="0.01" oninput="calcularTotal(this)" readonly
                                        title="Asignado por empleado">
                                </td>
                                <td>
                                    <input type="number" for="jornadas" id="jornadas" name="jornadas[]"
                                        class="text-black dark:text-black w-full border p-1 jornadas" step="1"
                                        oninput="calcularTotal(this)">
                                </td>
                                <td>
                                    <input type="number"
                                        class="text-black dark:text-black  w-full border p-1 bg-gray-100 "
                                        placeholder="Horas extra">
                                </td>
                                <td>
                                    <input type="number"
                                        class="text-black dark:text-black  w-full border p-1 bg-gray-100"
                                        placeholder="Salario(Horas exra)">
                                </td>
                                <td>
                                    <input type="number" for="totalSalario" id="totalSalario" name="TotalSalario[]"
                                        class="text-black dark:text-black total-salario w-full border p-1 bg-gray-100 total"
                                        step="0.01" readonly>
                                </td>
                                <td class="text-center">
                                    <button type="button" onclick="eliminarFila(this)"
                                        class="text-red-600 hover:underline">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <tr class="text-black dark:text-white">
                        <td colspan="3" class="text-black dark:text-white text-center font-semibold">Total mano de
                            obra:</td>
                        <td><input type="number" name="totalManoObra" step="0.01" id="totalManoObra"
                                class="text-black dark:text-black w-full border p-1 bg-gray-200" readonly></td>
                    </tr>


                    <button type="button" onclick="agregarTrabajador()" class="text-blue-700 hover:underline mt-4">+
                        Agregar otro trabajador</button>
                </div>
            </div>

            {{-- Este script es para la multiplicacion entre jornadas y salario, 
agregar y eliminar campos --}}
            <script>
                function actualizarSumaTotalSalario() {
                    const salarios = document.querySelectorAll('.total-salario');
                    let total = 0;

                    salarios.forEach(input => {
                        const valor = parseFloat(input.value) || 0;
                        total += valor;
                    });

                    document.getElementById('totalManoObra').value = total.toFixed(2);
                    actualizarTextoPresupuesto();
                }

                // Llama a esta función después de calcular un total individual
                function calcularTotalSalario() {
                    const jornadas = parseFloat(document.getElementById('jornadas').value) || 0;
                    const salario = parseFloat(document.getElementById('salario').value) || 0;
                    const total = jornadas * salario;

                    document.getElementById('TotalSalario').value = total.toFixed(2);
                    actualizarSumaTotalSalario();
                }

                function calcularTotal(element) {
                    const row = element.closest('tr');
                    const jornadas = parseFloat(row.querySelector('.jornadas').value) || 0;
                    const salario = parseFloat(row.querySelector('.salario').value) || 0;
                    const total = jornadas * salario;
                    row.querySelector('.total').value = total.toFixed(2);

                    //Llama la suma total
                    actualizarSumaTotalSalario();
                }


                function agregarTrabajador() {
                    const tabla = document.getElementById('tabla-trabajadores').querySelector('tbody');
                    const nuevaFila = tabla.rows[0].cloneNode(true);

                    nuevaFila.querySelectorAll('input').forEach(input => input.value = '');
                    nuevaFila.querySelector('select').selectedIndex = 0;

                    tabla.appendChild(nuevaFila);
                    actualizarSumaTotalSalario();

                }

                function eliminarFila(boton) {
                    const fila = boton.closest('tr');
                    const tabla = document.getElementById('tabla-trabajadores').querySelector('tbody');

                    if (tabla.rows.length > 1) {
                        fila.remove();
                    } else {
                        alert('Debe haber al menos una fila.');
                    }
                    actualizarSumaTotalSalario();

                }
            </script>
            <script>
                // Populate salary when an employee is selected
                function setSalaryFromSelect(selectEl) {
                    const row = selectEl.closest('tr');
                    const opt = selectEl.selectedOptions[0];
                    const sueldo = opt?.dataset?.sueldo ?? '';
                    const salaryInput = row.querySelector('.salario');
                    if (salaryInput) salaryInput.value = sueldo;
                }

                // Delegated listener for dynamically added rows
                document.addEventListener('change', function(e) {
                    if (e.target && e.target.matches && e.target.matches('.empleado')) {
                        setSalaryFromSelect(e.target);
                    }
                });

                // On load, set salary for existing selected options
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('.empleado').forEach(function(sel) {
                        setSalaryFromSelect(sel);
                    });
                });

                // Keep existing console logs (if needed)
                try {
                    console.log('Total:', total);
                    console.log('Suma mano de obra:', total.toFixed(2));
                } catch (e) {
                    // ignore if total not defined
                }
            </script>


            {{-- Costo de productos --}}
            <div class="border p-4 rounded-lg text-black dark:text-white">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Costo de productos</h2>

                <div class="grid grid-cols-1 gap-4">
                    <table class="w-full text-left text-black dark:text-white" id="tabla-productos">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Proveedor</th>
                                <th>Costo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="id_product[]" class="w-full border p-1 text-black dark:text-black"
                                        required>
                                        <option value="">-Seleccionar-</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name_product }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="id_supplier[]" id="id_supplier"
                                        class="w-full border p-1 text-black dark:text-black" required>
                                        <option value="">-Seleccionar-</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name_supplier }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" for="costo" id="costo" name="costo[]"
                                        class="text-black dark:text-black costo-producto w-full border p-1"
                                        step="0.01" required oninput="actualizarSumaCostos()">
                                </td>
                                <td class="text-center">
                                    <button type="button" onclick="eliminarFilaProducto(this)"
                                        class="text-red-600 hover:underline">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <tr class="text-black dark:text-white">
                        <td colspan="2" class="dark:text-white">Total Costo Productos:</td>
                        <td><input type="number" for="totalProductos" name="totalProductos" id="totalProductos"
                                class="text-black dark:text-black w-full border p-1 bg-gray-200" readonly></td>
                        <td></td>
                    </tr>


                    <button type="button" onclick="agregarProducto()" class="text-blue-700 hover:underline mt-4">+
                        Agregar otro producto
                    </button>
                </div>
            </div>
            {{-- Este script es para agregar y eliminar campos en productos --}}
            <script>
                function actualizarSumaCostos() {
                    const costos = document.querySelectorAll('.costo-producto');
                    let total = 0;

                    costos.forEach(input => {
                        total += parseFloat(input.value) || 0;
                    });

                    document.getElementById('totalProductos').value = total.toFixed(2);
                    actualizarTextoPresupuesto();
                }

                function actualizarTextoPresupuesto() {
                    const totalCosto = parseFloat(document.getElementById('totalProductos').value) || 0;
                    const totalSalario = parseFloat(document.getElementById('totalManoObra').value) || 0;
                    const totalGeneral = totalCosto + totalSalario;

                    document.getElementById('textoCosto').textContent = totalCosto.toFixed(2);
                    document.getElementById('textoSalario').textContent = totalSalario.toFixed(2);
                    document.getElementById('textoTotal').textContent = totalGeneral.toFixed(2);
                }

                function agregarProducto() {
                    const tabla = document.getElementById('tabla-productos').querySelector('tbody');
                    const nuevaFila = tabla.rows[0].cloneNode(true);

                    // Limpiar los valores de los inputs y selects
                    nuevaFila.querySelectorAll('input').forEach(input => input.value = '');
                    nuevaFila.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

                    tabla.appendChild(nuevaFila);
                    actualizarSumaCostos();

                }

                function eliminarFilaProducto(boton) {
                    const fila = boton.closest('tr');
                    const tabla = document.getElementById('tabla-productos').querySelector('tbody');

                    if (tabla.rows.length > 1) {
                        fila.remove();
                    } else {
                        alert('Debe haber al menos una fila de producto.');
                    }
                    actualizarSumaCostos();

                }
            </script>
            {{-- Gastos deducibles y no deducibles --}}

            {{-- Resumen de cuentas --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Cuentas</h2>
                <div class="flex flex-col space-y-4 text-left text-gray-800 dark:text-white">
                    <p><strong>Presupuesto:</strong> <span id="mostrarPresupuesto">$0.00</span></p>
                    <p>Presupuesto de productos: $<span id="textoCosto">0.00</span></p>
                    <p>Presupuesto de mano de obra: $<span id="textoSalario">0.00</span></p>
                    <p><strong>Total del proyecto: $<span id="textoTotal">0.00</span></strong></p>
                </div>
            </div>

            <script>
                function actualizarResumen() {
                    const presupuesto = parseFloat(document.getElementById('budget')?.value) || 0;
                    const totalSalarios = parseFloat(document.getElementById('totalManoObra')?.value) || 0;
                    const totalCostos = parseFloat(document.getElementById('totalProductos')?.value) || 0;
                    const total = totalSalarios + totalCostos;

                    document.getElementById('mostrarPresupuesto').textContent = `$${presupuesto.toFixed(2)}`;
                    document.getElementById('textoSalario').textContent = `${totalSalarios.toFixed(2)}`;
                    document.getElementById('textoCosto').textContent = `${totalCostos.toFixed(2)}`;
                    document.getElementById('textoTotal').textContent = `${total.toFixed(2)}`;
                }

                // Detectar cambios
                document.getElementById('budget')?.addEventListener('input', actualizarResumen);
                document.getElementById('totalManoObra')?.addEventListener('input', actualizarResumen);
                document.getElementById('totalProductos')?.addEventListener('input', actualizarResumen);

                // Ejecutar al cargar la página
                window.addEventListener('DOMContentLoaded', actualizarResumen);
            </script>


            {{-- Botones --}}
            <div class="text-center">
                <button type="button" onclick="openPagosModal()"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    + Agregar pagos
                </button>
                <x-primary-button class="ms-4">Registrar</x-primary-button>
                <a href="{{ route('index-project') }}"
                    class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                    Cancelar
                </a>
            </div>
        </div>
    </form>
    {{-- Modal --}}
    {{-- Comienza el modal de pagos --}}
    <div id="pagosModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">

        <div class="bg-white w-3/4 rounded-lg shadow-lg p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Pagos del proyecto</h2>
                <button onclick="closePagosModal()" class="text-gray-500">✖</button>
            </div>

            <!-- Tabs -->
            <div class="border-b mb-4 flex gap-4">
                <button onclick="showTab('deducible')" class="tab-btn font-semibold">
                    Deducibles
                </button>
                <button onclick="showTab('no-deducible')" class="tab-btn text-gray-500">
                    No deducibles
                </button>
            </div>

            <!-- Contenido -->
            @include('projects.deducibles')
            @include('projects.no_deducibles')

            <!-- Footer -->
            <div class="mt-4 text-right">
                <button onclick="closePagosModal()" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Guardar pagos
                </button>
            </div>
        </div>
    </div>
    {{-- -Aqui es para mostrar los errores del sistema- --}}

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

    {{-- Script para abrir y cerrar el modal de pagos --}}
    <script>
        function openPagosModal() {
            document.getElementById('pagosModal').classList.remove('hidden');
        }

        function closePagosModal() {
            document.getElementById('pagosModal').classList.add('hidden');
        }
    </script>
    {{-- Script para abrir y cerrar las pestañas de diferentes pagos --}}
    <script>
        function showTab(tab) {
            document.getElementById('deducible').classList.add('hidden');
            document.getElementById('no-deducible').classList.add('hidden');

            document.getElementById(tab).classList.remove('hidden');
        }
    </script>
    {{-- CALCULO DE DIAS PARA LAS PRIMERAS FECHAS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inicio = document.getElementById('dateBegin');
            const fin = document.getElementById('dateEnd');
            const diasSpan = document.getElementById('dias_duracion');

            function calcularDias() {
                if (inicio.value && fin.value) {
                    const fi = new Date(inicio.value);
                    const ff = new Date(fin.value);
                    const diffTime = ff - fi;
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                    diasSpan.textContent = diffDays > 0 ? diffDays : 0;
                } else {
                    diasSpan.textContent = 0;
                }
            }

            inicio.addEventListener('change', calcularDias);
            fin.addEventListener('change', calcularDias);
        });
    </script>

    {{-- CALCULO DE DIAS PARA LAS SEGUNDAS FECHAS --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inicio = document.getElementById('requestDate');
            const fin = document.getElementById('estimateDate');
            const diasSpan = document.getElementById('dias_duracion1');

            function calcularDias() {
                if (inicio.value && fin.value) {
                    const fi = new Date(inicio.value);
                    const ff = new Date(fin.value);
                    const diffTime = ff - fi;
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                    diasSpan.textContent = diffDays > 0 ? diffDays : 0;
                } else {
                    diasSpan.textContent = 0;
                }
            }

            inicio.addEventListener('change', calcularDias);
            fin.addEventListener('change', calcularDias);
        });
    </script>

    {{-- CALCULO DE DIAS PARA LA TERCERA FECHA --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inicio = document.getElementById('estimateDate');
            const fin = document.getElementById('authorizedDate');
            const diasSpan = document.getElementById('dias_duracion2');

            function calcularDias() {
                if (inicio.value && fin.value) {
                    const fi = new Date(inicio.value);
                    const ff = new Date(fin.value);
                    const diffTime = ff - fi;
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                    diasSpan.textContent = diffDays > 0 ? diffDays : 0;
                } else {
                    diasSpan.textContent = 0;
                }
            }

            inicio.addEventListener('change', calcularDias);
            fin.addEventListener('change', calcularDias);
        });
    </script>

    {{-- CALCULO DE DIAS PARA LA CUARTA FECHA --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inicio = document.getElementById('authorizedDate');
            const fin = document.getElementById('ejecutionDate');
            const diasSpan = document.getElementById('dias_duracion3');

            function calcularDias() {
                if (inicio.value && fin.value) {
                    const fi = new Date(inicio.value);
                    const ff = new Date(fin.value);
                    const diffTime = ff - fi;
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                    diasSpan.textContent = diffDays > 0 ? diffDays : 0;
                } else {
                    diasSpan.textContent = 0;
                }
            }

            inicio.addEventListener('change', calcularDias);
            fin.addEventListener('change', calcularDias);
        });
    </script>

    {{-- CALCULO DE DIAS PARA LA QUINTA FECHA --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inicio = document.getElementById('ejecutionDate');
            const fin = document.getElementById('finishDate');
            const diasSpan = document.getElementById('dias_duracion4');

            function calcularDias() {
                if (inicio.value && fin.value) {
                    const fi = new Date(inicio.value);
                    const ff = new Date(fin.value);
                    const diffTime = ff - fi;
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                    diasSpan.textContent = diffDays > 0 ? diffDays : 0;
                } else {
                    diasSpan.textContent = 0;
                }
            }

            inicio.addEventListener('change', calcularDias);
            fin.addEventListener('change', calcularDias);
        });
    </script>

</x-guest-layout>
