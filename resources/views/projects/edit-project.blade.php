<x-guest-layout>
    <form method="POST" action="{{ route('edit-project', $projects->id) }}">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                EDITAR PROYECTO
            </div>
           {{-- Información General --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Información del Proyecto</h2>

                  <div class="">
                        <x-input-label for="folioProject" :value="__('Folio del proyecto')" />
                        <x-text-input  id="folioProject" class="mt-1 block w-full" type="text" name="folioProject"  value="{{ $projects->folioProject }}" required />
                        <x-input-error :messages="$errors->get('folioProject')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="nameProject" :value="__('Nombre del proyecto')" />
                        <x-text-input id="nameProject" class="mt-1 block w-full" type="text" name="nameProject"  value="{{ $projects->nameProject }}" required />
                        <x-input-error :messages="$errors->get('nameProject')" class="mt-2" />
                    </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> <!---AQUI COMIENZA EL ESTILO DE LOS CAMPOS-->

                   <div>
    <x-input-label for="id_client" :value="__('Cliente')" />
    <select class="mt-1 block w-full" name="id_client" id="id_client" required>
        <option value="">-Seleccionar-</option>
        @foreach ($clients as $client)
            <option value="{{ $client->id }}" {{ $projects->id_client == $client->id ? 'selected' : '' }}>
                {{ $client->name_Client }}
            </option>
        @endforeach
    </select>
</div>


                    <div>
                        <x-input-label for="company" :value="__('Empresa encargada')" />
                       <select class="mt-1 block w-full" name="company" id="company" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $projects->company == $company->id ? 'selected' : '' }}>
                        {{ $company->nameCompany }}</option><br>
                @endforeach
            </select>
                    </div>

                    
                         <div>
                            <x-input-label for="seller_id_usuario" :value="__('Vendedor')" />
                       <select class="mt-1 block w-full" name="seller_id_usuario" id="seller_id_usuario" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $projects->seller_id_usuario == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}</option><br>
                @endforeach
            </select>
                    </div>
                    

                    <div>
                         <x-input-label for="inCharge_id_usuario" :value="__('Encargado')" />
                       <select class="mt-1 block w-full" name="inCharge_id_usuario" id="inCharge_id_usuario" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"{{ $projects->inCharge_id_usuario == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}</option><br>
                @endforeach
            </select>
                    </div>

                    <div>
                        <x-input-label for="id_priority" :value="__('Prioridad')" />
                       <select class="mt-1 block w-full" name="id_priority" id="id_priority" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}" {{ $projects->id_priority == $priority->id ? 'selected' : '' }}>
                        {{ $priority->namePriority }}</option><br>
                @endforeach
            </select>
                    </div>

                    <div>
                        <x-input-label for="id_status" :value="__('Status')" />
                       <select class="mt-1 block w-full" name="id_status" id="id_status" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($statues as $status)
                    <option value="{{ $status->id }}" {{ $projects->id_status == $status->id ? 'selected' : '' }}>
                        {{ $status->nameStatus }}</option><br>
                @endforeach
            </select>
                    </div>

                    <div>
                    <x-input-label for="budget" :value="__('Presupuesto')" />
                    <x-text-input id="budget" class="mt-1 block w-full" type="number" step="0.01" name="budget" placeholder="Ingrese el monto"  value="{{ $projects->budget }}" required />
                    <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                    </div>
                 <div>
                        <x-input-label for="recursosObtenidos" :value="__('Recursos obtenidos por:')" />
                       <select class="mt-1 block w-full" name="recursosObtenidos" id="recursosObtenidos" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($recursos as $recurso)
                    <option value="{{ $recurso->id }}" {{ $projects->recursosObtenidos == $recurso->id ? 'selected' : '' }}>
                        {{ $recurso->recursosObtenidos }}</option><br>
                @endforeach
            </select>
                    </div>

                    <div>
                        <x-input-label for="accountBank" :value="__('Cuenta bancaria')" />
                       <select class="mt-1 block w-full" name="accountBank" id="accountBank" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($banks as $bank)
                    <option value="{{ $bank->id }}" {{ $projects->accountBank == $bank->id ? 'selected' : '' }}>
                        {{ $bank->accountBank }}</option><br>
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
            <x-text-input id="dateBegin" class="mt-1 block w-full max-w-md" type="date" name="dateBegin" value="{{ $projects->dateBegin }}" required />
            <x-input-error :messages="$errors->get('dateBegin')" class="mt-2" />
        </div>

        {{-- Fecha de finalización --}}
        <div>
            <x-input-label for="dateEnd" :value="__('Fecha de finalización')" />
            <x-text-input id="dateEnd" class="mt-1 block w-full max-w-md" type="date" name="dateEnd" value="{{ $projects->dateEnd }}" required />
            <x-input-error :messages="$errors->get('dateEnd')" class="mt-2" />
        </div>

        {{-- Duración del proyecto --}}
        <div class="text-xl text-center">
            Duración del proyecto: <span id="dias_duracion">0</span> días
        </div>

        {{-- Fecha de solicitud --}}
        <div>
            <x-input-label for="requestDate" :value="__('Fecha de solicitud')" />
            <x-text-input id="requestDate" class="mt-1 block w-full max-w-md" type="date" name="requestDate" value="{{ $projects->requestDate }}" required />
            <x-input-error :messages="$errors->get('requestDate')" class="mt-2" />
        </div>

        {{-- Fecha de cotización --}}
        <div>
            <x-input-label for="estimateDate" :value="__('Fecha de cotización')" />
            <x-text-input id="estimateDate" class="mt-1 block w-full max-w-md" type="date" name="estimateDate" value="{{ $projects->estimateDate }}" required />
            <x-input-error :messages="$errors->get('estimateDate')" class="mt-2" />
        </div>

        {{-- Duración en días --}}
        <div class="text-xl text-center">
            Duración en días entre solicitud y cotización: <span id="dias_duracion1">0</span> días
        </div>

        {{-- Fecha autorizada --}}
        <div>
            <x-input-label for="authorizedDate" :value="__('Fecha autorizada')" />
            <x-text-input id="authorizedDate" class="mt-1 block w-full max-w-md" type="date" name="authorizedDate" value="{{ $projects->authorizedDate }}" required />
            <x-input-error :messages="$errors->get('authorizedDate')" class="mt-2" />
        </div>

          {{-- Duración en días --}}
        <div class="text-xl text-center">
            Duración en días entre cotización y autorizada: <span id="dias_duracion2">0</span> días
        </div>

        {{-- Fecha en ejecución --}}
        <div>
            <x-input-label for="ejecutionDate" :value="__('Fecha en ejecución')" />
            <x-text-input id="ejecutionDate" class="mt-1 block w-full max-w-md" type="date" name="ejecutionDate" value="{{ $projects->ejecutionDate }}" required />
            <x-input-error :messages="$errors->get('ejecutionDate')" class="mt-2" />
        </div>

          {{-- Duración en días --}}
        <div class="text-xl text-center">
            Duración en días entre autorizada y de ejecución: <span id="dias_duracion3">0</span> días
        </div>

        {{-- Fecha de terminación --}}
        <div>
            <x-input-label for="finishDate" :value="__('Fecha de terminación')" />
            <x-text-input id="finishDate" class="mt-1 block w-full max-w-md" type="date" name="finishDate" value="{{ $projects->finishDate }}" required />
            <x-input-error :messages="$errors->get('finishDate')" class="mt-2" />
        </div>

          {{-- Duración en días --}}
        <div class="text-xl text-center">
            Duración en días entre ejecución y terminación: <span id="dias_duracion4">0</span> días
        </div>

    </div>
</div>
            <!---- Servicios Autorizados 
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Servicio Autorizado</h2>
              <div class="grid grid-cols-2 gap-2 dark:text-white">
    foreach ($services as $service)
        <label class="flex items-center space-x-2">
            <input type="checkbox" for="id_instalationService" id="id_instalationService" name="nameInstalation[]" { $projects->id_instalationService == $service->nameInstalation ? 'checked' : '' }}
 class="rounded">
            <span>{ $service->nameInstalation }}</span>
        </label>
    endforeach
    
</div>
            </div>-->
            {{-- Servicios Autorizados --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Servicio Autorizado</h2>
              <div class="grid grid-cols-2 gap-2 dark:text-white">
                    @php
                        $selectedServices = $projects->services->pluck('id')->toArray();
                    @endphp
                            @foreach ($services as $service)
                        <label>
                            <input 
                                type="checkbox" 
                                name="nameInstalation[]" 
                                value="{{ $service->id }}" 
                                {{ in_array($service->id, old('nameInstalation', $selectedServices)) ? 'checked' : '' }}
                                 class="rounded"
                            >
                            {{ $service->nameInstalation }}
                        </label>
                    @endforeach
                </div>
            </div>

         {{-- Mano de Obra --}}
<div class="border p-4 rounded-lg">
    <h2 class="text-lg font-semibold mb-4 dark:text-white">Mano de Obra</h2>

    <div class="grid grid-cols-1 gap-4">
        <table class="w-full text-center text-black dark:text-white"  id="tabla-trabajadores">
            <thead>
                <tr>
                    <th>Trabajador</th>
                    <th>Jornadas</th>
                    <th>Salario</th>
                    <th>Total Salario</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <!-- <td>
                        <select name="id_empleado[]" for="id_empleado" class="w-full border p-1" required>
                            <option value="">-Seleccionar-</option> 
                            foreach ($empleados as $empleado)
                                <option value="{ $empleado->id }}" { $projects->Nombre == $empleado->id_empleado ? 'selected' : '' }}>
                            { $empleado->Nombre }}</option>
                            endforeach
                        </select>
                    </td> -->
@foreach ($projects->empleados as $index => $empleado)
<tr>
    <td>
        <select name="id_empleado[]" class="w-full border p-1" required>
            <option value="">-Seleccionar-</option> 
            @foreach ($empleados as $e)
                <option value="{{ $e->id }}" 
                    {{ old('id_empleado.' . $index, $empleado->id_empleado) == $e->id ? 'selected' : '' }}>
                    {{ $e->Nombre }}
                </option>
            @endforeach
        </select>
    </td>
    <td>
        <input 
            type="number" 
            name="jornadas[]" 
            class="w-full border p-1 jornadas" 
            step="1" 
            value="{{ old('jornadas.' . $index, $empleado->jornadas) }}" 
            oninput="calcularTotal(this)">
    </td>
    <td>
        <input 
            type="number" 
            name="salario[]" 
            class="w-full border p-1 salario" 
            step="0.01" 
            value="{{ old('salario.' . $index, $empleado->salario) }}" 
            oninput="calcularTotal(this)">
    </td>
    <td>
        <input 
            type="number" 
            name="TotalSalario[]" 
            class="total-salario w-full border p-1 bg-gray-100 total" 
            step="0.01" 
            value="{{ old('TotalSalario.' . $index, $empleado->total_salario) }}" 
            readonly>
    </td>
    <td>
        <button type="button" onclick="eliminarFila(this)" class="text-red-600">Eliminar</button>
    </td>
</tr>
@endforeach

                    <td class="text-center">
                        <button type="button" onclick="eliminarFila(this)" class="text-red-600 hover:underline">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <tr>
    <td colspan="3" class="text-black dark:text-white text-center font-semibold">Total Mano de Obra:</td>
    <td><input type="number" name="totalManoObra" step="0.01" id="totalManoObra" class="w-full border p-1 bg-gray-200" value="{{ $projects->totalManoObra }}" readonly></td>
</tr>


        <button type="button" onclick="agregarTrabajador()" class="text-blue-700 hover:underline mt-4">+ Agregar otro trabajador</button>
    </div>
</div>

{{--Este script es para la multiplicacion entre jornadas y salario, 
agregar y eliminar campos--}}
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
console.log('Total:', total);
console.log('Suma mano de obra:', total.toFixed(2));
</script>


           {{-- Costo de productos --}}
<div class="border p-4 rounded-lg">
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
                <!--<tr>
                    <td>
                        <select name="id_product[]" class="w-full border p-1" required>
                            <option value="">-Seleccionar-</option> 
                            foreach ($products as $product)
                                <option value="{ $product->id }}">{ $product->name_product }}</option>
                            endforeach
                        </select>
                    </td>
                    <td>
                        <select name="id_supplier[]" id="id_supplier" class="w-full border p-1" required>
                            <option value="">-Seleccionar-</option> 
                            foreach ($suppliers as $supplier)
                                <option value="{ $supplier->id }}">{ $supplier->name_supplier }}</option>
                            endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" for="costo" id="costo" name="costo[]" class="costo-producto w-full border p-1" step="0.01" required oninput="actualizarSumaCostos()">
                  
                    </td> -->
                    @foreach ($projects->productos as $index => $producto)
<tr>
    <td>
        <select name="id_product[]" class="w-full border p-1" required>
            <option value="">-Seleccionar-</option>
            @foreach ($products as $p)
                <option value="{{ $p->id }}"
                    {{ old('id_product.' . $index, $producto->product_id) == $p->id ? 'selected' : '' }}>
                    {{ $p->name_product }}
                </option>
            @endforeach
        </select>
    </td>

    <td>
        <select name="id_supplier[]" class="w-full border p-1" required>
            <option value="">-Seleccionar-</option>
            @foreach ($suppliers as $s)
                <option value="{{ $s->id }}"
                    {{ old('id_supplier.' . $index, $producto->supplier_id) == $s->id ? 'selected' : '' }}>
                    {{ $s->name_supplier }}
                </option>
            @endforeach
        </select>
    </td>

    <td>
        <input
            type="number"
            name="costo[]"
            class="w-full border p-1 costo-producto"
            step="0.01"
            value="{{ old('costo.' . $index, $producto->costo) }}"
            oninput="actualizarSumaCostos()">
    </td>

    <td class="text-center">
        <button type="button" onclick="eliminarFilaProducto(this)" class="text-red-600 hover:underline">Eliminar</button>
    </td>
</tr>
@endforeach

            </tbody>
        </table>

        <tr>
            <td colspan="2" class=" text-black dark:text-white text-right font-semibold">Total Costo Productos:</td>
            <td><input type="number" for="totalProductos" name="totalProductos" id="totalProductos" class="w-full border p-1 bg-gray-200" value="{{ $projects->totalProductos }}" readonly></td>
            <td></td>
        </tr>


        <button type="button" onclick="agregarProducto()" class="text-blue-700 hover:underline mt-4">+ Agregar otro producto</button>
    </div>
</div>
{{--Este script es para agregar y eliminar campos en productos--}}
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
    const totalCosto = parseFloat(document.getElementById('sumaTotalCosto').value) || 0;
    const totalSalario = parseFloat(document.getElementById('sumaTotalSalario').value) || 0;
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

 {{-- Cuentas --}}
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

    {{--CALCULO DE DIAS PARA LAS PRIMERAS FECHAS--}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
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

  {{--CALCULO DE DIAS PARA LAS SEGUNDAS FECHAS--}}

  <script>
    document.addEventListener('DOMContentLoaded', function () {
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

 {{--CALCULO DE DIAS PARA LA TERCERA FECHA--}}

  <script>
    document.addEventListener('DOMContentLoaded', function () {
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

{{--CALCULO DE DIAS PARA LA CUARTA FECHA--}}

  <script>
    document.addEventListener('DOMContentLoaded', function () {
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

{{--CALCULO DE DIAS PARA LA QUINTA FECHA--}}

  <script>
    document.addEventListener('DOMContentLoaded', function () {
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
        <div style="text-align: center;" class="mt-4">
            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>

            <a href="{{ route('index-project') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ ('Cancelar') }}
            </a>
        </div>
    </form>
</x-guest-layout>