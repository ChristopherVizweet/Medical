<table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
              <tr class="">
                  <th class="px-4 py-2">{{ __('ID') }}</th>
                  <th class="px-4 py-2">{{ __('cantidad') }}</th>
                  <th class="px-4 py-2">{{ __('codigo') }}</th>
                  <th class="px-4 py-2">{{ __('material') }}</th>
                  <th class="px-4 py-2">{{ __('proveedor') }}</th>
                  <th class="px-4 py-2">{{ __('número de factura') }}</th>
                  <th class="px-4 py-2">{{ __('costos') }}</th>
                  <th class="px-4 py-2">{{ __('Fecha de registro') }}</th>
                  <th class="px-4 py-2">{{ __('recibe') }}</th>
                  <th class="px-4 py-2">{{ __('firma') }}</th>
                  <th class="px-4 py-2">{{ __('observaciones') }}</th>
              </tr>
          </thead>
<tbody>
@forelse ($movimientos as $movimiento)
    @foreach ($movimiento->productos as $producto)
        <tr>
            <td class="px-4 py-2">{{ $movimiento->id }}</td>
            <td class="px-4 py-2">{{ $producto->cantidad }}</td>
            <td class="px-4 py-2">{{ $producto->codigo }}</td>
            <td class="px-4 py-2">
                {{ $producto->product->name_product }}
                Diametro {{ $producto->product->diameterMM_product }} mm
            </td>
            <td class="px-4 py-2">{{ $movimiento->proveedor->name_supplier }}</td>
            <td class="px-4 py-2">{{ $movimiento->numero_factura_movimiento }}</td>
            <td class="px-4 py-2">{{ $producto->costo_unitario }}</td>
            <td class="px-4 py-2">{{ $movimiento->fecha_movimiento }}</td>
            <td class="px-4 py-2">{{ $movimiento->recibe->Nombre }}</td>
            <td class="px-4 py-2">{{ $movimiento->firma->Nombre }}</td>
            <td class="px-4 py-2">{{ $movimiento->observaciones_movimiento }}</td>
        </tr>
    @endforeach
@empty
    <tr>
        <td colspan="11" class="text-center py-2">No hay movimientos registrados.</td>
    </tr>
@endforelse
</tbody>
