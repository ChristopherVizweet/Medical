
<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categorias/Productos
             <!--Boton para cambiar el modo oscuro/claro-->
<x-mode-button id="theme-toggle" class="float-right" >
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
        </h2> 
      
    </x-slot>

    <div class="container mx-auto mt-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex bg-gray-200 dark:bg-gray-800 justify-center">
           <a href="index-categories"> <x-primary-button  class="flex-1 text-white text-center bg-gray-100 px-4 py-2 m-2">CATEGORIAS</x-primary-button> </a>
           <a href="index-product"> <x-primary-button class="flex-1 text-white text-center bg-gray-100 px-4 py-2 m-2">PRODUCTOS</x-primary-button></a>
          </div>
          
      
    
    </x-app-layout>
 