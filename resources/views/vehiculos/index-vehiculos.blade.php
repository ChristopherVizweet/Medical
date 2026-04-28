<x-app-layout>
 <x-slot name="header">
        <div class="flex justify-between items-center flex-wrap gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                VEHÍCULOS
            </h2>

            <x-mode-button id="theme-toggle" class="text-sm">
                Modo oscuro/claro
            </x-mode-button>
        </div>

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
    </x-slot>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        {{-- Mensajes --}}
        @if (session('success'))
            <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl dark:text-white font-bold mb-6">Filtro de búsqueda</h1>

        {{-- Filtros y botón --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
           <input placeholder="Buscar mediante modelo" type="text">
        </div>

            {{-- Botón Registrar vehiculo --}}
            <x-primary-button>
                <a href="{{ route('create-vehiculos') }}" class="text-dark">
                    {{ __('Registrar vehículo') }}
                </a>
            </x-primary-button>


                <!-- AQUI COMIENZA EL RECUADRO PARA REGISTRO DE VEHICULOS-->
            <div class="border-1 rounded-lg shadow-md p-6 mt-6 bg-white dark:bg-gray-800">
           
        <div class="p-6 border-b border-slate-200 bg-slate-50" data-fg-d3bl90="0.8:1.26440:/src/app/App.tsx:329:13:12679:212:e:div:e" data-fgid-d3bl90=":re:">
            <h2 class="text-2xl text-slate-800" data-fg-d3bl91="0.8:1.26440:/src/app/App.tsx:330:15:12753:119:e:h2:txt" data-fgid-d3bl91=":rf:">Vehículos Registrados</h2>
        </div>
        <div class="text-center py-16" data-fg-d3bl96="0.8:1.26440:/src/app/App.tsx:336:15:12947:679:e:div:etetete" data-fgid-d3bl96=":rg:">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car w-20 h-20 text-slate-300 mx-auto mb-4" data-fg-d3bl97="0.8:1.26440:/src/app/App.tsx:337:17:12999:57:e:Car::::::EJEg" data-fgid-d3bl97=":rh:">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2">
                    
                </path>
                <circle cx="7" cy="17" r="2">
                </circle><path d="M9 17h6">
                </path>
                <circle cx="17" cy="17" r="2">
                </circle>
            </svg> <h1>NO HAY VEHÍCULOS REGISTRADOS</h1>           
    </div>
    </div>
</x-app-layout>