<x-guest-layout>
     <form method="POST" action="{{ route('create-salidas') }}" enctype="multipart/form-data">
        @csrf

        <div class="text-center text-gray-800 dark:text-white">
            <h1 class="text-2xl font-bold">NUEVA SALIDA</h1>
        </div><br>
        <!--Aqui comienza el formulario para registrar la salida-->
        <div class="producto-row grid grid-cols-4 gap-4 items-center">
            <div class="hidden">
            <x-input-label for="tipoMovimiento" :value="__('Tipo de registro')" />
            <select class="mt-1 block w-full " name="tipoMovimiento" id="tipoMovimiento" readonly=true required>
                
                <option value="salida" selected>Salida</option>
                
            </select>
        </div>
            <div>
                <x-input-label for="obra_movimiento" :value="__('Obra')" />
                <x-text-input id="obra_movimiento" class="mt-1 block w-full" type="text" name="obra_movimiento" :value="old('obra_movimiento')" required />
                <x-input-error :messages="$errors->get('obra_movimiento')" class="mt-2" />
            </div>
            <div>
            <x-input-label for="empleado_id" :value="__('Solicitante')" />
            <select class="mt-1 block w-full" name="empleado_id" id="empleado_id" required>
                <option value="">-Seleccionar-</option> 
                @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}">{{ $empleado->Nombre }}</option>
            @endforeach
            </select>
        </div>
            <div class="hidden">
                <x-input-label for="folio_movimiento" :value="__('Folio')" />
                <x-text-input id="folio_movimiento" class="mt-1 block w-full" type="text" name="folio_movimiento" :value="old('folio_movimiento')"  />
                <x-input-error :messages="$errors->get('folio_movimiento')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="fecha_movimiento" :value="__('Fecha')" />
                <x-text-input id="fecha_movimiento" class="mt-1 block w-full" type="date" name="fecha_movimiento" :value="old('fecha_movimiento')" required />
                <x-input-error :messages="$errors->get('fecha_movimiento')" class="mt-2" />
            </div>
        </div>
         <div>
            <x-input-label for="observaciones_movimiento" :value="__('Observaciones')" />
            <x-text-input id="observaciones_movimiento" class="mt-1 block w-full" type="text" name="observaciones_movimiento" :value="old('observaciones_movimiento')" required />
            <x-input-error :messages="$errors->get('observaciones_movimiento')" class="mt-2" />
        </div>
    <!--Aqui comienza el formulario para los productos-->
    <div id="productos-wrapper" class="space-y-4  border p-4 rounded-lg mt-3">
    <div class="producto-row grid grid-cols-4 gap-4 items-center">

        <!-- Producto -->
        <div>
            <label for="productos[0][product_id]" class="block text-sm font-medium text-gray-700 dark:text-white">Producto</label>
            <select name="productos[0][product_id]" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                    required>
                <option value="">-- Seleccionar --</option>
                @foreach($productos as $producto)
                    <option class="text-black dark:text-black" value="{{ $producto->id }}">{{ $producto->name_product }} Diametro {{$producto->diameterMM_product}}mm</option>

                @endforeach
            </select>
        </div>

        <!-- Cantidad requerida -->
        <div>
            <label for="productos[0][cantidadR]" class="block text-sm font-medium text-gray-700 dark:text-white">Cantidad requerida</label>
            <input type="number" name="productos[0][cantidadR]" placeholder="Cantidad requerida" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
         <!-- Cantidad aprobada -->
        <div>
            <label for="productos[0][cantidadA]" class="block text-sm font-medium text-gray-700 dark:text-white">Cantidad aprobada</label>
            <input type="number" name="productos[0][cantidadA]" placeholder="Cantidad aprobada" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        <!-- TPE -->
        <div>
            <label for="productos[0][cantidad]" class="block text-sm font-medium text-gray-700 dark:text-white">T.P.E</label>
            <input type="number" name="productos[0][cantidad]" placeholder="Total productos aprobados" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
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
                <a href="{{ route('index-salidas') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                    Cancelar
                </a>
            </div>
</div>
</form>

 <script>
    let productoIndex = 1; // empieza desde 1 porque ya existe el [0], el cual es el principal

    function agregarProducto() {
        const wrapper = document.getElementById('productos-wrapper');
        
        // Crear un nuevo row
        const newRow = document.createElement('div');
        newRow.classList.add('producto-row', 'flex', 'mb-2','items-center','grid','grid-cols-5','gap-4');

        newRow.innerHTML = `

            <select name="productos[${productoIndex}][product_id]" 
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                <option value="">-- Seleccionar producto --</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->name_product }} Diametro {{$producto->diameterMM_product}}mm</option>
                @endforeach
            </select>

            <input type="number" name="productos[${productoIndex}][cantidadR]" placeholder="Cantidad requerida"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>

            <input type="text" name="productos[${productoIndex}][cantidadA]" placeholder="Cantidad aprobada"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

            <input type="number" step="0.01" name="productos[${productoIndex}][cantidad]" 
                   placeholder="Total productos entregados" 
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        

        
             <!-- Botón eliminar -->
        <button type="button" onclick="eliminarProducto(this)" 
                class="px-2 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
            ✕
        </button>
        `;

        wrapper.appendChild(newRow);
        productoIndex++;
    }

    function eliminarProducto(boton) {
        // Elimina el div padre (la fila del producto)
        boton.closest('.producto-row').remove();
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