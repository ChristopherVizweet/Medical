<x-guest-layout>
    <form method="POST" action="{{ route('edit-salidasL', $salidas->id) }}">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                ACTUALIZAR SALIDA
        </div>
<div class="producto-row grid grid-cols-4 gap-4 items-center">
             <!-- Cantidad enviada -->
            <div class="hidden">
                <x-input-label for="tipoMovimiento" :value="__('Tipo de movimiento')" />
                <x-text-input id="tipoMovimiento" class="mt-1 block w-full" type="text" name="tipoMovimiento" value="{{ old('tipoMovimiento', $salidas->tipoMovimiento) }}" required />
                <x-input-error :messages="$errors->get('tipoMovimiento')" class="mt-2" />
            </div>
        <div>
         <x-input-label for="obra_movimiento" :value="__('Obra')" />
         <x-text-input readonly="true"  id="obra_movimiento" class="mt-1 block w-full" type="text" name="obra_movimiento"  value="{{ $salidas->productos->first()->obra_movimiento }}" required />
         <x-input-error :messages="$errors->get('obra_movimiento')" class="mt-2" />
        </div>
        <div>
         <x-input-label for="fecha_movimiento" :value="__('Fecha')" />
         <x-text-input readonly="true" id="fecha_movimiento" class="mt-1 block w-full" type="date" name="fecha_movimiento"  value="{{ $salidas->fecha_movimiento }}" required />
         <x-input-error :messages="$errors->get('fecha_movimiento')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="empleado_id" :value="__('Solicitante')" />
            <select class="mt-1 block w-full" readonly="true" name="empleado_id" id="empleado_id" required>
                <option value="">-Seleccionar-</option> 
                @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}" {{ $empleado->id_empleado == $salidas->Nombre ? 'selected' : '' }}>{{ $empleado->Nombre }}</option>
            @endforeach
            </select>
        </div>
</div>
  <x-input-label for="observaciones_movimiento" :value="__('Observaciones')" />
            <x-text-input  id="observaciones_movimiento" class="block mt-1 w-full" type="text" name="observaciones_movimiento" value="{{ $salidas->observaciones_movimiento }}"/>
        </div>
<div id="productos-wrapper" class="space-y-4 border p-4 rounded-lg mt-3">
    @foreach($salidas->productos as $i => $prod)
        <div class="producto-row grid grid-cols-5 gap-5 items-center">
            <!-- Producto (select) -->
            <div >
                <label readonly="true" for="productos[{{ $i }}][product_id]" class="block text-sm font-medium text-gray-700 dark:text-white">Producto</label>
                <select readonly="true" name="productos[{{ $i }}][product_id]" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option readonly="true" value="">-- Seleccionar --</option>
                    @foreach($productos as $producto)
                        <option readonly="true" value="{{ $producto->id }}" {{ $producto->id == $prod->product_id ? 'selected' : '' }}>
                            {{ $producto->first()->name_product }} Diametro {{ $producto->diameterMM_product }}mm</option>
                    @endforeach
                </select>
            </div>

            <!-- Cantidad requerida -->
            <div>
                <x-input-label for="productos[{{ $i }}][cantidadR]" :value="__('Cantidad requerida')" />
                <x-text-input readonly="true" id="productos[{{ $i }}][cantidadR]" class="mt-1 block w-full" type="number" name="productos[{{ $i }}][cantidadR]" value="{{ old('productos.'.$i.'.cantidadR', $prod->cantidadR) }}" required />
                <x-input-error :messages="$errors->get('productos.'.$i.'.cantidadR')" class="mt-2" />
            </div>

            <!-- Cantidad aprobada -->
            <div>
                <x-input-label for="productos[{{ $i }}][cantidadA]" :value="__('Cantidad aprobada')" />
            
                <x-text-input  id="productos[{{ $i }}][cantidadA]" class="mt-1 block w-full" type="number" name="productos[{{ $i }}][cantidadA]" value="{{ old('productos.'.$i.'.cantidadA', $prod->cantidadA) }}" required />
                <x-input-error :messages="$errors->get('productos.'.$i.'.cantidadA')" class="mt-2" />
            </div>
            
            <!-- Cantidad TPE -->
           
            <div>
                <x-input-label for="productos[{{ $i }}][cantidad]" :value="__('T.P.E')" />
                <x-text-input id="productos[{{ $i }}][cantidad]" class="mt-1 block w-full" type="number" name="productos[{{ $i }}][cantidad]" value="{{ old('productos.'.$i.'.cantidad', $prod->cantidad) }}" required />
                <x-input-error :messages="$errors->get('productos.'.$i.'.cantidad')" class="mt-2" />
            </div>
            
            <!-- Hidden: id del registro pivot (si lo usas para actualizar) -->
            <input type="hidden" name="productos[{{ $i }}][pivot_id]" value="{{ $prod->id }}" />
        </div>
    @endforeach
   <!-- <select name="estadoMovimiento" id="estadoMovimiento" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm sm:text-sm">
        <option value="">-Seleccionar estado-</option>
        <option value="Pendiente" {{ old('estadoMovimiento', $salidas->estadoMovimiento ?? '') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="Revisado" {{ old('estadoMovimiento', $salidas->estadoMovimiento ?? '') == 'Revisado' ? 'selected' : '' }}>Revisado</option>
    </select> -->
</div>
        <div style="text-align: center;" class="mt-4">
            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>

            <a href="{{ route('index-salidas') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Cancelar') }}
            </a>
        </div>
    </form>
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