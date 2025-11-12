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

           <!--Aqui estan los botones para seleccionar entradas o salidas
        <div class="content-center text-center justify-center flex gap-x-20">
            <button>
                <a href="index-entradas">
                <img class="text-center" class="align-middle" width="150"  src="img/entrada.png" alt="Boton para entradas">
                <h1 class="text-black dark:text-white"> ENTRADA DE PRODUCTOS </h1>
            </button>
                </a>
               
            <button>
                 <a href="index-salidas">
                <img class="text-center" width="150" src="img/salida.png" alt="Boton para salidas">
                <h1 class="text-black dark:text-white"> SALIDA DE PRODUCTOS </h1>
            </button>
                </a>
        </div>-->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 justify-items-center">
  <a href="{{ route('index-entradas') }}" class="w-full max-w-xs text-center p-4 rounded-lg bg-white dark:bg-gray-700 shadow hover:scale-[1.02] transform transition">
    <img src="{{ asset('img/entrada.png') }}" alt="Entrada" class="mx-auto w-28 md:w-40 object-contain">
    <div class="mt-2 font-semibold text-sm md:text-base text-gray-900 dark:text-white">ENTRADA DE PRODUCTOS</div>
  </a>

  <a href="{{ route('index-salidas') }}" class="w-full max-w-xs text-center p-4 rounded-lg bg-white dark:bg-gray-700 shadow hover:scale-[1.02] transform transition">
    <img src="{{ asset('img/salida.png') }}" alt="Salida" class="mx-auto w-28 md:w-40 object-contain">
    <div class="mt-2 font-semibold text-sm md:text-base text-gray-900 dark:text-white">SALIDA DE PRODUCTOS</div>
  </a>
</div>
</x-app-layout>