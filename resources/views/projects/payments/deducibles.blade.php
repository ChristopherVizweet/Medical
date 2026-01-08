<x-guest-layout>
<form method="POST" action="{{ route('deducibles-store',  ['project_id' => $project_id]) }}" enctype="multipart/form-data">
    @csrf

    
   <div class="border rounded-lg shadow-sm p-6 dark:border-gray-600">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
        GASTOS
    </h3>

    <!-- CONTENEDOR DE GASTOS -->
    <div id="contenedor-gastos" class="space-y-6 max-h-[500px] overflow-y-auto scroll-smooth pr-2 shadow-inner">

        <!-- GASTO TEMPLATE -->
        <div class="gasto-item border rounded-md p-4 bg-gray-50 dark:bg-gray-800">
            

            <div class="text-black dark:text-white grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                <label class="label">Tipo de gasto</label>
                <select name="payments[0][tipo]" class="input text-black dark:text-black">
                    <option value="">-Seleccionar-</option>
                   <option value="deducible">Deducible(factura)</option>
                   <option value="no_deducible">No deducible</option>
                </select>
                </div>

                <div>
                    <label class="label">Concepto</label>
                    <input type="text" name="payments[0][concepto]" class="input">
                </div>

                <div>
                    <label class="label">Fecha de recepción</label>
                    <input type="date" name="payments[0][fecha_recepcion]" class="input">
                </div>

                <div>
                    <label class="label">Folio</label>
                    <input type="text" name="payments[0][folio]" class="input">
                </div>

                <div class="">
                    <label class="label">Método de pago</label>
                    <select name="payments[0][metodo_pago]" class="input text-black dark:text-black">
                        <option value="">Seleccionar</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjeta">Tarjeta</option>
                        <option value="transferencia">Transferencia</option>
                    </select>
                </div>

                <div>
                    <label class="label">Empleado</label>
                    <select name="payments[0][empleados_id]" class="input text-black dark:text-black w-52">
                        <option value="">Seleccionar</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}">
                                {{ $empleado->Nombre }} {{ $empleado->apellidos }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="label">Subtotal</label>
                    <input type="number" step="0.01" name="payments[0][subtotal]" class="input">
                </div>

                <div>
                    <label class="label">IVA</label>
                    <input type="number" step="0.01" name="payments[0][iva]" class="input" value="0">
                </div>

                <div>
                    <label class="label">Total</label>
                    <input type="number" step="0.01" name="payments[0][total]" class="input" >
                </div>

                <div class="lg:col-span-3">
                    <label class="label">Comprobante</label>
                    <input type="file" name="payments[0][comprobante_path]" class="input">
                </div>

            </div>
            <button type="button" onclick="eliminarGasto(this)"
            class="text-red-600 hover:underline align-middle">Eliminar gasto</button>
        </div>
    </div>

    <!-- BOTÓN -->
    <div class="mt-6 text-right">
        <button type="button"
            onclick="agregarGasto()"
            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            + Agregar gasto
        </button>
    </div>
</div>
<script>
let index = 1;
                                                    //Incrementar el índice para los nuevos gastos
function agregarGasto() {
    const contenedor = document.getElementById('contenedor-gastos');
    const original = contenedor.querySelector('.gasto-item');
    const clon = original.cloneNode(true);

    // Limpiar valores
    clon.querySelectorAll('input, select').forEach(el => {
        if (el.type !== 'hidden' && el.type !== 'file') {
            el.value = '';
        }
    });
    // Reindexar payments[index]
    clon.querySelectorAll('[name]').forEach(el => {
        el.name = el.name.replace(/\[\d+\]/, `[${index}]`);
    });

    contenedor.appendChild(clon);
    index++;
}
</script>
<script>
                                                    //Restar el indice para los nuevos gastos

function eliminarGasto() {
    const contenedor = document.getElementById('contenedor-gastos');
    if (contenedor.children.length > 1) {
        contenedor.removeChild(contenedor.lastElementChild);
        index--;
    }
    }
</script>
    <!-- include('projects.no_deducibles') -->

    <x-primary-button class="mt-4">Registrar gastos</x-primary-button>
     <a href="{{ route('index-project') }}"
                    class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                    Cancelar
                </a>
</form>

<script>
function openTab(tab) {
  var ded = document.getElementById('deducible');
  var no = document.getElementById('no-deducible');
  var tabDed = document.getElementById('tab-deducible');
  var tabNo = document.getElementById('tab-no');
  if (tab === 'deducible') {
    ded.classList.remove('hidden');
    no.classList.add('hidden');
    tabDed.classList.add('border-blue-500',' text-blue-600');
    tabNo.classList.remove('border-blue-500','text-blue-600');
  } else {
    ded.classList.add('hidden');
    no.classList.remove('hidden');
    tabNo.classList.add('border-blue-500','text-blue-600');
    tabDed.classList.remove('border-blue-500','text-blue-600');
  }
}
document.addEventListener('DOMContentLoaded', function(){ openTab('deducible'); });
</script>

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
</x-guest-layout>