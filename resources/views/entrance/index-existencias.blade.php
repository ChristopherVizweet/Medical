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
           Existencias
       </h2>            
   </x-slot>
   <div class="container mx-auto mt-8">
           @if (session('success'))
               <div class="alert alert-success">
                   {{ session('success') }}
               </div>
           @endif
          
           <h1 class="text-2xl dark:text-white font-bold mb-4">Existencia de productos</h1>

           <!--Aqui estan los botones para seleccionar entradas o salidas-->
        <div class="content-center text-center justify-center flex gap-x-20">
            <button>
                <a href="index-entradas">
                <img class="text-center" class="align-middle" width="150"  src="img/entrada.png" alt="Boton para entradas">
                <h1 class="text-black dark:text-white"> ENTRADA DE PRODUCTOS </h1>
            </button>
                </a>
                <a href="">
            <button>
                <img class="text-center" width="150" src="img/salida.png" alt="Boton para salidas">
                <h1 class="text-black dark:text-white"> SALIDA DE PRODUCTOS </h1>
            </button>
                </a>
        </div>
        <h1 class="text-2xl dark:text-white font-bold mb-4">Registro de productos</h1>

           {{-- Tabla responsive --}}
        <div class="overflow-x-auto rounded-lg shadow">
             <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
              <tr class="">
                  <th class="px-4 py-2">{{ __('ID') }}</th>
                  <th class="px-4 py-2">{{ __('Tipo') }}</th>
                  <th class="px-4 py-2">{{ __('Proveedor') }}</th>
                  <th class="px-4 py-2">{{ __('Stock') }}</th>
                  <th class="px-4 py-2">{{ __('valor por articulo ($)') }}</th>
                  <th class="px-4 py-2">{{ __('Imagen del producto') }}</th>
                  <th class="px-4 py-2">{{ __('Acciones') }}</th>
              </tr>
          </thead>
          <tbody>
             @forelse ($products as $product)
             
                 <tr class="">
                     <td class="px-4 py-2">{{ $product->id }}</td>
                     <td class="px-4 py-2">{{ $product->name_product }}</td>
                     <td class="px-4 py-2">{{ $product->id_supplier }}</td>
                     <td class="px-4 py-2">{{ $product->stock }}</td>                     
                     <td class="px-4 py-2">{{ $product->valueArt_product }}</td>
                     <td class= "items-center px-4 py-2"> <img src="{{ asset('storage/images/' . $product->image_product) }}" 
     alt="Imagen {{ $product->name_product }}" 
     class="w-20 h-20 object-cover rounded">
                     </td>
                     
                 </tr>
             @empty
                 <tr>
                     <td colspan="5" class="px-4 py-2 text-center">Productos no encontrados</td>
                 </tr>
             @endforelse
         </tbody>
         
    </div>
     </table>
        </div>
</x-app-layout>