<x-guest-layout>
    <form method="POST" action="{{ route('store-entradasSinFactura') }}" enctype="multipart/form-data">
        @csrf

        <div class="text-center text-gray-800 dark:text-white">
            <h1 class="text-2xl font-bold">NUEVA ENTRADA (sin factura)</h1>
        </div><br>
        <!--Aqui comienza el formulario para registrar la entrada-->
        <div class="producto-row grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-center">

            <div class="hidden">
                <x-input-label for="tipoMovimiento" :value="__('Tipo de registro')" />
                <select class="mt-1 block w-full " name="tipoMovimiento" id="tipoMovimiento" readonly=true required>

                    <option value="entrada" selected>Entrada</option>

                </select>
            </div>
            <div>
                <x-input-label for="supplier_id" :value="__('Proveedor')" />
                <select class="mt-1 block w-full" name="supplier_id" id="supplier_id" >
                    <option value="">-Seleccionar-</option>
                    @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name_supplier }}</option>
                    @endforeach
                </select>
                <!-- <input readonly class="w-full" type="text" value="{{ $supplier->name_supplier }}"> -->
            </div>
            <div class="hidden">
                <x-input-label for="numero_factura_movimiento" :value="__('Número de factura')" />
                <x-text-input id="numero_factura_movimiento" class="mt-1 block w-full" type="text" name="numero_factura_movimiento" :value="old('numero_factura_movimiento')" />
                <x-input-error :messages="$errors->get('numero_factura_movimiento')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="fecha_movimiento" :value="__('Fecha')" />
                <x-text-input id="fecha_movimiento" class="mt-1 block w-full" type="date" name="fecha_movimiento" value="{{ old('fecha_emision', now()->format('Y-m-d')) }}"  />
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
        <div>
            <x-input-label for="observaciones_movimiento" :value="__('Observaciones')" />
            <x-text-input id="observaciones_movimiento" class="mt-1 block w-full" type="text" name="observaciones_movimiento" :value="old('observaciones_movimiento')" />
            <x-input-error :messages="$errors->get('observaciones_movimiento')" class="mt-2" />
        </div>

        <!--Aqui comienza el registro pero para los productos-->
        <div id="productos-wrapper" class="space-y-4  border p-4 rounded-lg mt-3">
            <div class="producto-row grid grid-cols-1 md:grid-cols-5 lg:grid-cols-6 gap-4 items-center">

                <!-- Producto -->
                <div>
                    <label for="productos[0][product_id]" class="block text-sm font-medium text-gray-700 dark:text-white">Producto</label>
                    <select name="productos[0][product_id]"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        required>
                        <option value="">-- Seleccionar --</option>
                        @foreach($materiales as $material)
                        <option class="text-black dark:text-black" value="{{ $material->id }}" data-stock="{{ $material->stock }}" data-codigo="{{ $material->codeint_product }}" data-costo="{{ $material->valueArt_product }}">{{ $material->name_product }} Diametro {{ $material->diameterMM_product }} mm</option>
                        @endforeach
                    </select>
                </div>

                <!-- Código interno -->
                <div>
                    <label for="productos[0][codigo]" class="block text-sm font-medium text-gray-700 dark:text-white">Código interno</label>
                    <input type="text" name="productos[0][codigo]" placeholder="Código interno" readonly
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Stock -->
                <div>
                    <label for="productos[0][stock]" class="block text-sm font-medium text-gray-700 dark:text-white">Stock</label>
                    <input type="number" name="productos[0][stock]" placeholder="stock" readonly
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Costo Unitario -->
                <div>
                    <label for="productos[0][costo_unitario]" class="block text-sm font-medium text-gray-700 dark:text-white">Costo unitario</label>
                    <input type="number" step="0.01" name="productos[0][costo_unitario]" placeholder="Costo"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div> 

                <!-- Cantidad -->
                <div>
                    <label for="productos[0][cantidad]" class="block text-sm font-medium text-gray-700 dark:text-white">Cantidad</label>
                    <input type="number" name="productos[0][cantidad]" placeholder="Cantidad" required
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
                <a href="{{ route('index-entradas') }}"
                    class="w-full sm:w-auto px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
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
            newRow.classList.add('producto-row', 'grid',
                'grid-cols-1', // 1 columna en móvil
                'md:grid-cols-5', // 5 columnas en tablet
                'lg:grid-cols-6', // 6 columnas en desktop
                'gap-4',
                'items-center',
                'mb-2');

            newRow.innerHTML = `
             <select name="productos[${productoIndex}][product_id]" 
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                <option value="">-- Seleccionar producto --</option>
                @foreach($materiales as $material)
                    <option value="{{ $material->id }}" data-stock="{{ $material->stock }}" data-codigo="{{ $material->codeint_product }}" data-costo="{{ $material->valueArt_product }}">{{ $material->name_product }} Diametro {{ $material->diameterMM_product }} mm</option>
                @endforeach
            </select>

            <input type="text" name="productos[${productoIndex}][codigo]" placeholder="Código interno" readonly
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

            <input type="number" name="productos[${productoIndex}][stock]" placeholder="stock" readonly
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

            <input type="number" step="0.01" name="productos[${productoIndex}][costo_unitario]" 
                   placeholder="Costo unitario" 
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        
              <input type="number" name="productos[${productoIndex}][cantidad]" placeholder="Cantidad"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>

        
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

         // Listener para actualizar el campo stock cuando se selecciona un producto
    document.addEventListener('change', function(e) {
        const el = e.target;
        // comprobar que es un select de producto
        if (!el.matches || !el.matches('select[name^="productos"][name$="[product_id]"]')) return;
        const row = el.closest('.producto-row');
        const opt = el.selectedOptions ? el.selectedOptions[0] : el.options[el.selectedIndex];
        const stock = opt ? (opt.dataset.stock ?? '') : '';
        const codigo = opt ? (opt.dataset.codigo ?? '') : '';
        const costo = opt ? (opt.dataset.costo ?? '') : '';

        const stockInput = row ? row.querySelector('input[name$="[stock]"]') : null;
        const codigoInput = row ? row.querySelector('input[name$="[codigo]"]') : null;
        const costoInput = row ? row.querySelector('input[name$="[costo_unitario]"]') : null;

        if (stockInput) stockInput.value = stock;
        if (codigoInput) codigoInput.value = codigo;
        if (costoInput) costoInput.value = costo;
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