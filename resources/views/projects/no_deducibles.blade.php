<div id="no-deducible" class="hidden">

   
<h5 class="text-black dark:text-white text-center">GASTO NO DEDUCIBLE</h5>
    {{-- Aqui estan las opciones de gastos no deducibles --}}
    <button type="button"  class="text-blue-700 dark:text-white hover:underline m-2 mt-4 mb-4">
        +Gasolina
    </button>
    <button type="button"  class="text-blue-700 dark:text-white hover:underline m-2 mt-4 mb-4">
        +Comida
    </button>
    <button type="button"  class="text-blue-700 dark:text-white hover:underline m-2 mt-4 mb-4">
        +Hospedaje
    </button>
    <button type="button"  class="text-blue-700 dark:text-white hover:underline m-2 mt-4 mb-4">
        +Herramientas 
    </button>
    <button type="button"  class="text-blue-700 dark:text-white hover:underline m-2 mt-4 mb-4">
        +Mantenimiento vehiculo
    </button>
    <button type="button"  class="text-blue-700 dark:text-white hover:underline m-2 mt-4 mb-4">
        +Medicamento
    </button>
    <button type="button"  class="text-blue-700 dark:text-white hover:underline m-2 mt-4 mb-4">
        +Otro
    </button>

    <input type="hidden" name="payments[0][tipo]" value="no_deducible" class="w-full border p-2 mb-2">

    {{-- Aqui estan lo campos a rellenar --}}
    <div class="campos-gastosD grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        <input type="text" name="payments[0][concepto]" placeholder="Concepto" class="w-full border p-2 mb-2">
        <select name="payments[0][metodo_pago]">
            <option value="">Seleccione un método de pago
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta</option>
            <option value="transferencia">Transferencia</option>
        </select>

        <select name="payments[0][empleados_id]">
            <option value="">Seleccione un empleado</option>
            @foreach ($empleados as $empleado)
                <option value="{{ $empleado->id }}">{{ $empleado->Nombre }} {{ $empleado->apellidos }}</option>
            @endforeach
        </select>

        <input type="number" name="payments[0][subtotal]" placeholder="Subtotal" class="w-full border p-2 mb-2">

        <input type="number" name="payments[0][iva]" placeholder="IVA" class="w-full border p-2 mb-2">

        <input type="number" name="payments[0][total]" placeholder="Total" class="w-full border p-2 mb-2">

        <input type="file" name="payments[0][comprobante_path]" placeholder="Comprobante" class="w-full border p-2 mb-2">
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
</div>
