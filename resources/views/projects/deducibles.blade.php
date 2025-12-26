<div id="deducible">

    <h3 class="font-semibold mb-2">Gastos deducibles</h3>
{{--Aqui estan las opciones de gastos deducibles--}}
<button type="button" onclick="agregarGastoD()" class="text-blue-700 hover:underline m-2 mt-4 mb-4">
    +Gasolina
</button>
<button type="button" onclick="agregarGastoD()" class="text-blue-700 hover:underline m-2 mt-4 mb-4">
    +Comida
</button>
<button type="button" onclick="agregarGastoD()" class="text-blue-700 hover:underline m-2 mt-4 mb-4">
    +Hospedaje
</button>
<button type="button" onclick="agregarGastoD()" class="text-blue-700 hover:underline m-2 mt-4 mb-4">
    +Herramientas
</button>
<button type="button" onclick="agregarGastoD()" class="text-blue-700 hover:underline m-2 mt-4 mb-4">
    +Mantenimiento vehiculo
</button>
<button type="button" onclick="agregarGastoD()" class="text-blue-700 hover:underline m-2 mt-4 mb-4">
    +Medicamento
</button>
<button type="button" onclick="agregarGastoD()" class="text-blue-700 hover:underline m-2 mt-4 mb-4">
    +Otro
</button>
{{--Aqui estan lo campos a rellenar--}}
<div class="campos-gastosD grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

         <input type="hidden" name="gastos_deducibles[][tipo_gasto]"
               value="deducible"
               class="w-full border p-2 mb-2">

        <input type="text" name="gastos_deducibles[][concepto_gastosD]"
               placeholder="Concepto"
               class="w-full border p-2 mb-2">

        <input type="date" name="gastos_deducibles[][Fecha_recepcion_gastosD]"
               placeholder="Fecha de recepción"
               class="w-full border p-2 mb-2">

        <input type="date" name="gastos_deducibles[][Fecha_registro_gastosD]"
               placeholder="Fecha de registro"
               class="w-full border p-2 mb-2">


        <input type="text" name="gastos_deducibles[][folio_gastosD]"
               placeholder="Folio"
               class="w-full border p-2 mb-2"> 
            
         <input type="text" name="gastos_deducibles[][metodoPago_gastosD]"
               placeholder="Método de pago"
               class="w-full border p-2 mb-2">

        <input type="text" name="gastos_deducibles[][empleado_gastosD]"
               placeholder="Empleado"
               class="w-full border p-2 mb-2">


        <input type="number" name="gastos_deducibles[][subtotal_gastosD]"
               placeholder="Subtotal"
               class="w-full border p-2 mb-2">

        <input type="number" name="gastos_deducibles[][iva_gastosD]"
               placeholder="IVA"
               class="w-full border p-2 mb-2">

        <input type="number" name="gastos_deducibles[][total_gastosD]"
              placeholder="Total"
               class="w-full border p-2 mb-2">

         <input type="file" name="gastos_deducibles[][comprobante_gastosD]"
               placeholder="Comprobante"
               class="w-full border p-2 mb-2"> 
</div>
</div>
