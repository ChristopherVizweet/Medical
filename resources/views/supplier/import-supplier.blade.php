<x-app-layout>
    <form method="POST" action="{{ route('import-supplier') }}" enctype="multipart/form-data">
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
            Proveedores
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
<div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-400 rounded-xl shadow-md">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Importe de datos</h1>

    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Para importar de manera exitosa, siga estos pasos:</h2>

    <ul class="list-disc list-inside text-gray-700 dark:text-white space-y-2 mb-6">
        <li>Dar clic en el botón <strong>"Seleccionar archivo"</strong>.</li>
        <li>Seleccionar el archivo Excel a importar.</li>
        <li>Dar clic al botón <strong>"Importar"</strong>.</li>
    </ul>

    <div class="mb-4">
        <input 
            type="file" 
            name="import_file" 
            class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                   file:rounded-md file:border-0 file:text-sm file:font-semibold
                   file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 
                   dark:file:bg-gray-700 dark:file:text-white dark:hover:file:bg-gray-600"
        />
    </div>

    <x-primary-button>
        Importar
    </x-primary-button>
</div>
    </form>
</x-app-layout>
 