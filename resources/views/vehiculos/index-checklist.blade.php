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
2
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
            <a href="{{ route('create-checklist', $vehiculos->id) }}" class="text-dark">
                {{ __('Registrar Checklist') }}
            </a>
        </x-primary-button>
        <div class="overflow-x-auto">
            <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">

                    <tr class="">
                        <th class="px-4 py-2">{{('ID') }}</th>
                        <th class="px-4 py-2">{{('Nombre del vehículo') }}</th>
                        <th class="px-4 py-2">{{('Destino') }}</th>
                        <th class="px-4 py-2">{{('Placas') }}</th>
                        <th class="px-4 py-2">{{('Conductor') }}</th>
                        <th class="px-4 py-2">{{('Fecha de salida') }}</th>
                        <th class="px-4 py-2">{{('Fecha de entrada') }}</th>
                        <th class="px-4 py-2">{{('Verificador') }}</th>
                        <th class="px-4 py-2">{{('Acciones') }}</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse ($checklists as $checklist)
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">{{ $checklist->id  ?? 'SIN ID'}}</td>
                        <td class="px-4 py-2">{{ $checklist->vehiculo->nombre_vehiculo ?? 'SIN NOMBRE'}}</td>
                        <td class="px-4 py-2">{{ $checklist->destino_check  ?? 'SIN DESTINO'}}</td>
                        <td class="px-4 py-2">{{ $checklist->id_placa_vehiculo  ?? 'SIN PLACAS'}}</td>
                        <td class="px-4 py-2">{{ $checklist->conductor->Nombre ?? 'SIN CONDUCTOR'}}</td>
                        <td class="px-4 py-2">{{ $checklist->fecha_salida_checklist ?? 'SIN FECHA DE SALIDA'}}</td>
                        <td class="px-4 py-2">{{ $checklist->fecha_entrega_checklist ?? 'SIN FECHA DE ENTRADA'}}</td>
                        <td class="px-4 py-2">{{ $checklist->responsableEntrega->name ?? 'SIN VERIFICADOR'}}</td>
                        <td>
                            <a href="{{ route('show-checklist', $checklist->id) }}" class="text-blue-500 hover:underline">Ver</a>
                            
                            <form action="{{ route('index-checklist', $checklist->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('¿Estás seguro de eliminar este checklist?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                     @empty
                        <tr>
                            <td colspan="8" class="px-4 py-4 text-center text-gray-500">No hay checklists registrados.</td>
                        </tr>
                   
                    @endforelse
                     
                </tbody>
                <!---AQUI ESTA INICIANDO EL SCRIPT DE ALPINE--->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

            </table>
        </div>
</x-app-layout>