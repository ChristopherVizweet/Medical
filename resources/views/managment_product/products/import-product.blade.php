<x-app-layout>
    <form method="POST" action="{{ route('import-product') }}" enctype="multipart/form-data">
        @csrf
    <x-slot name="header">
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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Productos
        </h2> 
        
    </x-slot>
    <div class="container mx-auto mt-4">
        @if (session('success'))
            <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
    <div id="flash-message" class="fade-out bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-2">
        {{ session('error') }}
    </div>
@endif
            <h1 class="text-2xl dark:text-white font-bold mb-4">Importe de datos</h1>
        <input type="file" name="import_file"/>
        <x-primary-button>
            Importar
        </x-primary-button>
    </form>
</x-app-layout>
 