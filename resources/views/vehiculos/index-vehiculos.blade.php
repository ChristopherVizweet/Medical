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
            document.addEventListener("DOMContentLoaded", function() {
                const themeToggle = document.getElementById("theme-toggle");
                const body = document.documentElement;
                const currentTheme = localStorage.getItem("theme");

                if (currentTheme === "dark") {
                    body.classList.add("dark");
                } else {
                    body.classList.remove("dark");
                }

                themeToggle.addEventListener("click", function() {
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
        <div class="overflow-x-auto">
            <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">

                    <tr class="">
                        <th class="px-4 py-2">{{('ID') }}</th>
                        <th class="px-4 py-2">{{('Fotografia') }}</th>
                        <th class="px-4 py-2">{{('Nombre del vehículo') }}</th>
                        <th class="px-4 py-2">{{('Número de serie') }}</th>
                        <th class="px-4 py-2">{{('Marca') }}</th>
                        <th class="px-4 py-2">{{('Modelo') }}</th>
                        <th class="px-4 py-2">{{('Placas') }}</th>
                        <th class="px-4 py-2">{{('Área') }}</th>
                        <th class="px-4 py-2">{{('Estado') }}</th>
                        <th class="px-4 py-2">{{('Mantenimiento') }}</th>
                        <th class="px-4 py-2">{{('Documentación') }}</th>
                        <th class="px-4 py-2">{{('Acciones') }}</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehiculos as $vehiculo)
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">{{ $vehiculo->id }}</td>
                        <td class="px-4 py-2">
                            @if ($vehiculo->photo_vehiculo)
                            <img src="{{ Storage::url($vehiculo->photo_vehiculo) }}" alt="Fotografía del vehículo" class="w-24 h-24 object-cover">
                            @else
                            <p>No disponible</p>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $vehiculo->nombre_vehiculo }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->numeroSerie_vehiculo }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->marca_vehiculo }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->modeloAño_vehiculo }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->placas_vehiculo }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->area_vehiculo }}</td>
                        <td class="px-4 py-2">{{ $vehiculo->estado_vehiculo }}</td>
                        <td class="px-4 py-2">
                             <button> <a href="{{ route('mantenimiento-vehiculos', $vehiculo->id) }}" class="text-blue-500 hover:text-blue-700">Registrar</a> </button>|
                            @if($vehiculo->mantenimiento->count() > 0)
                                <a href="{{ route('pdf-vehiculos', $vehiculo->id) }}" target="_blank" class="text-red-500 hover:text-red-700">PDF</a>
                            @else
                                <span class="text-gray-500">Sin registros de mantenimiento</span>
                            @endif
                        </td>
                        <td>
                            <button> <a href="{{ route('index-tenencias', $vehiculo->id) }}" class="text-gray-500 hover:text-green-700">Tenencia</a> </button> |
                            <button> <a href="{{ route('index-seguroV', $vehiculo->id) }}" class="text-gray-500 hover:text-green-700">Seguro</a> </button> |
                            <button> <a href="{{ route('index-verificacion', $vehiculo->id) }}" class="text-gray-500 hover:text-green-700">Verificación</a> </button>


                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('edit-vehiculos', $vehiculo->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <!---AQUI ESTA INICIANDO EL SCRIPT DE ALPINE--->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


        </div>
</x-app-layout>