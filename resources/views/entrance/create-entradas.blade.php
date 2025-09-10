<x-guest-layout>
     <form method="POST" action="{{ route('store-entradas') }}" enctype="multipart/form-data">
        @csrf

        <div class="text-center text-gray-800 dark:text-white">
            <h1 class="text-2xl font-bold">NUEVA ENTRADA</h1>
        </div><br>
        <!--Aqui comienza el formulario para registrar la entrada-->
    <div class="producto-row grid grid-cols-3 gap-4 items-center">
        
        <div>
            <x-input-label for="tipoMovimiento" :value="__('Tipo de registro')" />
            <select class="mt-1 block w-full" name="tipoMovimiento" id="tipoMovimiento" required>
                <option value="">-Seleccionar-</option> 
                <option value="entrada">Entrada</option>
                <option value="salida">Salida</option>
            </select>
        </div>
        <div>
            <x-input-label for="supplier_id" :value="__('Proveedor')" />
            <select class="mt-1 block w-full" name="supplier_id" id="supplier_id" required>
                <option value="">-Seleccionar-</option> 
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name_supplier }}</option>
            @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="numero_factura_movimiento" :value="__('Número de factura')" />
            <x-text-input id="numero_factura_movimiento" class="mt-1 block w-full" type="text" name="numero_factura_movimiento" :value="old('numero_factura_movimiento')" required />
            <x-input-error :messages="$errors->get('numero_factura_movimiento')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="fecha_movimiento" :value="__('Fecha')" />
            <x-text-input id="fecha_movimiento" class="mt-1 block w-full" type="date" name="fecha_movimiento" :value="old('fecha_movimiento')" required />
            <x-input-error :messages="$errors->get('fecha_movimiento')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="recibe_id" :value="__('Recibe')" />
            <select class="mt-1 block w-full" name="recibe_id" id="recibe_id" required>
                <option value="">-Seleccionar-</option> 
                @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}">{{ $empleado->Nombre }}</option>
            @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="firma_id" :value="__('Firma')" />
            <select class="mt-1 block w-full" name="firma_id" id="firma_id" required>
                <option value="">-Seleccionar-</option> 
                @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}">{{ $empleado->Nombre }}</option>
            @endforeach
            </select>
        </div>
    
</div>
        <!--Aqui comienza el registro pero para los productos-->
        
<div id="productos-wrapper" class="space-y-4  border p-4 rounded-lg mt-3">
    <div class="producto-row grid grid-cols-4 gap-4 items-center">

        <!-- codigo -->
        <div>
            <label for="productos[0][codigo]" class="block text-sm font-medium text-gray-700 dark:text-white">Codigo</label>
            <input type="number" name="productos[0][codigo]" placeholder="codigo" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        <!-- Producto -->
        <div>
            <label for="productos[0][product_id]" class="block text-sm font-medium text-gray-700 dark:text-white">Producto</label>
            <select name="productos[0][product_id]" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                    required>
                <option value="">-- Seleccionar --</option>
                @foreach($materiales as $material)
                    <option class="text-black dark:text-black" value="{{ $material->id }}">{{ $material->name_product }}</option>
                @endforeach
            </select>
        </div>

        <!-- Cantidad -->
        <div>
            <label for="productos[0][cantidad]" class="block text-sm font-medium text-gray-700 dark:text-white">Cantidad</label>
            <input type="number" name="productos[0][cantidad]" placeholder="Cantidad" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Costo Unitario -->
        <div>
            <label for="productos[0][costo_unitario]" class="block text-sm font-medium text-gray-700 dark:text-white">Costo unitario</label>
            <input type="number" step="0.01" name="productos[0][costo_unitario]" placeholder="Costo"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
          <!-- Botón eliminar -->
        <button type="button" onclick="eliminarProducto(this)" 
                class="px-2 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
            ✕
        </button>
    </div>
</div>


<!-- Botón -->
<div class="mt-4">
    <button type="button" onclick="agregarProducto()" id="add-producto"
        class="px-4 py-2 bg-indigo-600 text-white  rounded-lg shadow hover:bg-indigo-700 transition">
        + Agregar otro producto
    </button>
</div>

    <div class="text-center">
                <x-primary-button class="ms-4">Registrar</x-primary-button>
                <a href="{{ route('index-entradas') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                    Cancelar
                </a>
            </div>
</div>
</form>
 <script>
    let productoIndex = 1; // empezamos desde 1 porque ya existe el [0]

    function agregarProducto() {
        const wrapper = document.getElementById('productos-wrapper');

        // Crear un nuevo row
        const newRow = document.createElement('div');
        newRow.classList.add('producto-row', 'flex', 'gap-2', 'mb-2');

        newRow.innerHTML = `
            <input type="text" name="productos[${productoIndex}][codigo]" placeholder="Código"
                   class="border rounded p-2 w-32">

            <select name="productos[${productoIndex}][product_id]" class="border rounded p-2 w-48" required>
                <option value="">-- Seleccionar producto --</option>
                @foreach($materiales as $material)
                    <option value="{{ $material->id }}">{{ $material->name_product }}</option>
                @endforeach
            </select>

            <input type="number" name="productos[${productoIndex}][cantidad]" placeholder="Cantidad"
                   class="border rounded p-2 w-24" required>

            <input type="number" step="0.01" name="productos[${productoIndex}][costo_unitario]" 
                   placeholder="Costo unitario" class="border rounded p-2 w-32">
        `;

        wrapper.appendChild(newRow);
        productoIndex++;
    }
</script>
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
</x-guest-layout>