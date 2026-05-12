<x-guest-layout>
     <form method="POST" action="{{ route('create-salidas') }}" enctype="multipart/form-data">
        @csrf

        <div class="text-center text-gray-800 dark:text-white">
            <h1 class="text-2xl font-bold">NUEVA SALIDA</h1>
        </div><br>
        <!--Aqui comienza el formulario para registrar la salida-->
        <div class="producto-row grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-center">
            <div class="hidden">
            <x-input-label for="tipoMovimiento" :value="__('Tipo de registro')" />
            <select class="mt-1 block w-full " name="tipoMovimiento" id="tipoMovimiento" readonly=true required>
                
                <option value="salida" selected>Salida</option>
                
            </select>
        </div>
            <div>
                <x-input-label for="obra_movimiento" :value="__('Obra')" />
                <x-text-input autocomplete="off" id="obra_movimiento" class="mt-1 block w-full" type="text" name="obra_movimiento" :value="old('obra_movimiento')" required />
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
         
    <!--Aqui comienza el formulario para los productos-->
    <div id="productos-wrapper"  class="space-y-4 producto-row  border border-gray-200 p-4 rounded-lg mt-3">
        <div id="material-wrapper" class="producto-row">
           
        <label for="producto[0]" class="block text-center text-lg font-medium text-black dark:text-white">Material</label>
        </div>
        <div class="border border-gray-400 rounded-lg p-4">
    <div class="producto-row grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-center">

       
<!-- Producto -->
        <div class="col-span-5">
            <label for="productos[0][product_id]" id="producto-row" class="block text-sm producto-row productos-wrapper font-medium text-gray-700 dark:text-white">Material</label>
            <select name="productos[0][product_id]" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                    required>
                <option value="">-- Seleccionar --</option>
                @foreach($productos as $producto)
                    <option class="text-black dark:text-black" value="{{ $producto->id }}" data-stock="{{ $producto->stock }}">{{ $producto->name_product }} Diametro {{$producto->diameterMM_product}}mm</option>

                @endforeach
            </select>
        </div>
        <!-- Stock editable -->
        <div>
            <label for="productos[0][stock]" class="block text-sm font-medium text-gray-700 dark:text-white">Existencias</label>
            <input readonly="true" type="number" step="any" name="productos[0][stock]" placeholder="Stock disponible"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <!-- Cantidad requerida -->
        <div>
            <label for="productos[0][cantidadR]" class="block text-sm font-medium text-gray-700 dark:text-white">Cantidad requerida</label>
            <input type="number" name="productos[0][cantidadR]" placeholder="Cantidad requerida" 
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        <!-- Cantidad aprobada -->
        @role('superadmin')
       <div>
            <label for="productos[0][cantidadA]" class="block text-sm font-medium text-gray-700 dark:text-white">Cantidad aprobada</label>
                <input type="number" name="productos[0][cantidadA]" placeholder="Cantidad aprobada"  value=0
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        @endrole
        
        <!-- TPE -->
        @role('superadmin')
        <div>
            <label for="productos[0][cantidad]" class="block text-sm font-medium text-gray-700 dark:text-white">Total entregados</label>
            <input type="number" name="productos[0][cantidad]" placeholder="Total productos aprobados" value=0
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
</div>
        @else
            <input type="hidden" name="productos[0][cantidad]" placeholder="Total productos aprobados" value=0
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        @endrole
         <!--Aqui esta la cantidad enviada para agregarle por defecto 0-->
         <div class="hidden">
            <label for="productos[0][cantidadE]" class="block text-sm font-medium text-gray-700 dark:text-white">Productos enviados</label>
            <input type="number" name="productos[0][cantidadE]" placeholder="Total productos enviados" value=0
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        <div class="mt-4">
            <x-input-label for="productos[0][observaciones_movimiento]" :value="__('Comentarios')" />
            <x-text-input name="productos[0][observaciones_movimiento]" placeholder="Comentarios del material" autocomplete="off" class="mt-1 block w-full" type="text"/>
            <x-input-error :messages="$errors->get('observaciones_movimiento')" class="mt-2" />
        </div>
    
    </div>
    </div>
</div>
 

<!-- Botones de acción -->

<div class="mt-4 flex flex-col sm:flex-row gap-4 justify-center items-center">
    <button type="button" onclick="agregarProducto()" id="add-producto"
        class="w-full sm:w-auto px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + Agregar otro producto
    </button>

    <div class="flex flex-col sm:flex-row gap-4 items-center">
        <x-primary-button class="w-full sm:w-auto">Registrar</x-primary-button>
        <a href="{{ route('index-salidas') }}" 
           class="w-full sm:w-auto px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
            Cancelar
        </a>
    </div>
</div>
</form>

 <script>
    let productoIndex = 1; // empieza desde 1 porque ya existe el [0], el cual es el principal
    let materialIndex=2; // para el id del material, empieza en 2 porque el primer producto tiene id 1 y el segundo id 2, así sucesivamente

    function agregarProducto() {
        const wrapper = document.getElementById('productos-wrapper');
        const materialwrapper = document.getElementById('material-wrapper');
        
        // Crear un nuevo row
        const newRow = document.createElement('div');
        newRow.classList.add('producto-row',
        'grid',
        'grid-cols-1',      // 1 columna en móvil
        'md:grid-cols-3',   // 3 columnas en tablet
        'lg:grid-cols-4',   // 6 columnas en desktop
        'gap-4',
        'items-center',
        'mb-2',
    'border',
    'border-gray-400',
    'rounded-lg',
    'p-4'
);


     newRow.innerHTML = `
        <div class="block col-span-5 text-center text-lg font-medium text-black dark:text-white">
         <label for="productos[${materialIndex}]" class="block text-center text-lg font-medium text-black dark:text-white">Material ${materialIndex}</label>
        </div>
         <select name="productos[${productoIndex}][product_id]" 
         class="mt-1 col-span-5 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
          <option value="">-- Seleccionar material --</option>
          @foreach($productos as $producto)
              <option value="{{ $producto->id }}" data-stock="{{ $producto->stock }}">{{ $producto->name_product }} Diametro {{$producto->diameterMM_product}}mm</option>
          @endforeach
         </select>
        
       <div>
       <label for="productos[${productoIndex}][stock]" class="block text-sm font-medium text-gray-700 dark:text-white">Existencias</label>
         <input type="number" readonly="true" step="any" name="productos[${productoIndex}][stock]" placeholder="Existencias"
             class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
             </div>

        <div>
         <label for="productos[${productoIndex}][cantidadR]" class="block text-sm font-medium text-gray-700 dark:text-white">Cantidad requerida</label>
         <input type="number" name="productos[${productoIndex}][cantidadR]" placeholder="Cant. requerida" value=0
             class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" >
        </div>
         @role('superadmin')<div class="">
          <label for="productos[${productoIndex}][cantidadA]" class="block text-sm font-medium text-gray-700 dark:text-white">Cantidad Aprobada</label>
         <input type="number" name="productos[${productoIndex}][cantidadA]" placeholder="Cantidad aprobada" value=0
             class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
         </div>
         @endrole
         @role('superadmin')<div>
         <label for="productos[${productoIndex}][cantidad]" class="block text-sm font-medium text-gray-700 dark:text-white">Total entregados</label>
         <input type="number" step="0.01" name="productos[${productoIndex}][cantidad]" 
             placeholder="Total productos entregados" value=0
             class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        
         @else
            <input type="hidden" name="productos[${productoIndex}][cantidad]" placeholder="Total productos aprobados" value=0
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
         @endrole
        
            <input type="text" name="productos[${productoIndex}][observaciones_movimiento]" placeholder="Comentarios del material" 
             class="mt-1 col-span-5 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" >
        </div>
        
             <!-- Botón eliminar -->
        <button type="button" onclick="eliminarProducto(this)" 
                class="px-2 py-1 bg-red-600 text-white col-span-5 rounded shadow hover:bg-red-700 transition">
            ✕
        </button>
        `;

        wrapper.appendChild(newRow);
        productoIndex++;
        materialIndex++;
    }

    function eliminarProducto(boton) {
        // Elimina el div padre (la fila del producto)
        boton.closest('.producto-row').remove();
    }

    // Listener para actualizar el campo stock cuando se selecciona un producto
    document.addEventListener('change', function(e) {
        const el = e.target;
        // comprobar que es un select de producto
        if (!el.matches || !el.matches('select[name^="productos"][name$="[product_id]"]')) return;
        const row = el.closest('.producto-row');
        const opt = el.selectedOptions ? el.selectedOptions[0] : el.options[el.selectedIndex];
        const stock = opt ? (opt.dataset.stock ?? '') : '';
        const stockInput = row ? row.querySelector('input[name$="[stock]"]') : null;
        if (stockInput) stockInput.value = stock;
    });
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