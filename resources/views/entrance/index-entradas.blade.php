<x-app-layout>
    <x-slot name="header">
        <!--Boton para cambiar el modo oscuro/claro-->
<x-mode-button id="theme-toggle" class="float-right " >
   Modo escuro/claro
</x-mode-button>
<script>
   document.addEventListener("DOMContentLoaded", function () {
       const themeToggle = document.getElementById("theme-toggle");
       const body = document.documentElement; 
       const currentTheme = localStorage.getItem("theme");

       if (currentTheme === "dark") {
           body.classList.add("dark");
       } else {
           body.classList.remove("dark");
       }

       themeToggle.addEventListener("click", function () {
           if (body.classList.contains("dark")) {
               body.classList.remove("dark");
               localStorage.setItem("theme", "light");
           } else {
               body.classList.add("dark");
               localStorage.setItem("theme", "dark");
           }
       });
   });
</script>  
       <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Registro de entradas
       </h2>            
   </x-slot>
   <div class="container mx-auto mt-8">
           @if (session('success'))
               <div class="alert alert-success">
                   {{ session('success') }}
               </div>
           @endif
          
           <h1 class="text-2xl dark:text-white font-bold mb-4">Entrada de productos</h1>

           {{-- Tabla responsive --}}
        <div class="overflow-x-auto rounded-lg shadow">
             <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
              <tr class="">
                  <th class="px-4 py-2">{{ __('ID') }}</th>
                  <th class="px-4 py-2">{{ __('material') }}</th>
                  <th class="px-4 py-2">{{ __('imagen del producto') }}</th>
                  <th class="px-4 py-2">{{ __('cantidad') }}</th>
                  <th class="px-4 py-2">{{ __('codigo') }}</th>
                  <th class="px-4 py-2">{{ __('proveedor') }}</th>
                  <th class="px-4 py-2">{{ __('número de folio') }}</th>
                  <th class="px-4 py-2">{{ __('costos') }}</th>
                  <th class="px-4 py-2">{{ __('Fecha de registro') }}</th>
                  <th class="px-4 py-2">{{ __('recibe') }}</th>
                  <th class="px-4 py-2">{{ __('firma') }}</th>
                  <th class="px-4 py-2">{{ __('observaciones') }}</th>
                  <th class="px-4 py-2">{{ __('Acciones') }}</th>
              </tr>
          </thead>
          <tbody>
            
             @forelse ($movimientos as $movimiento)
                @foreach ($movimiento->productos as $producto)
                <tr class="">
                <td class="px-4 py-2">{{ $movimiento->id }}</td>
                <td class="px-4 py-2">
                    {{ $producto->product->name_product }}
                    Diametro {{ $producto->product->diameterMM_product }} mm
                </td>
                <td class= "items-center px-4 py-2"> <img src="{{ asset('storage/images/productos/' . $producto->product->image_product) }}" 
                        alt="{{ $producto->product->image_product }}" 
                        class="w-20 h-20 object-cover rounded">
                </td>
                <td class="px-4 py-2">{{ $producto->cantidad }}</td>
                <td class="px-4 py-2">{{ $producto->codigo }}</td>
                <td class="px-4 py-2">{{ $movimiento->proveedor->name_supplier }}</td>
                <td class="px-4 py-2">{{ $movimiento->numero_factura_movimiento }}</td>
                <td class="px-4 py-2">{{ $producto->costo_unitario }}</td>
                <td class="px-4 py-2">{{ $movimiento->fecha_movimiento }}</td>
                <td class="px-4 py-2">{{ $movimiento->recibe->Nombre }}</td>
                <td class="px-4 py-2">{{ $movimiento->firma->Nombre }}</td>
                <td class="px-4 py-2">{{ $movimiento->observaciones_movimiento }}</td>
                <td class="px-4 py-2">
                    <form  action="{{ route('delete-entradas', $movimiento->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿En verdad deseas eliminar esta entrada?')">Eliminar</button>
                    </form> 
                </td>
                 </tr>
                    @endforeach
             @empty
                 <tr>
                     <td colspan="5" class="px-4 py-2 text-center">Entradas no encontradas</td>
                 </tr>
             @endforelse
         </tbody>
    </div>
    <x-primary-button class="mt-4">
        <a href="{{ route('create-entradas') }}" class="text-dark"> 
            {{ __('Registrar entrada') }}
        </a> 
    </x-primary-button>
    <x-primary-button class="mt-4 ml-2">
         <a href="{{ route('export-entradas') }}" class="text-dark">
            Exportar a archivo Excel
          </a>
    </x-primary-button>
     </table>
        </div>
</x-app-layout>