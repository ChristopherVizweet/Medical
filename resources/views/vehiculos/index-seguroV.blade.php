<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center flex-wrap gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                SEGURO DEL VEHÍCULO
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
            <form action="{{ route('index-client') }}" method="GET" class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full md:w-auto">

                {{-- Filtro por Nombre --}}
                <div class="flex flex-col">
                    <label for="fecha_proxima" class="text-black dark:text-white text-base">Buscar fechas próximas</label>
                   <select name="fecha_proxima" id="fecha_proxima">
                    <option value="">--Todos--</option>
                    
                   </select>
                </div>
            </form>
        </div>
            {{-- Botón Crear Cliente --}}
            <x-primary-button>
                <a href="{{ route('create-seguroV', $vehiculos->id) }}" class="text-dark">
                    {{ __('Registrar pagos del seguro') }}
                </a>
            </x-primary-button>

        {{-- Tabla responsive --}}
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Vehiculo</th>
                        <th class="px-4 py-2">Nombre del seguro</th>
                        <th class="px-4 py-2">Fecha de pago</th>
                        <th class="px-4 py-2">Monto</th>
                        <th class="px-4 py-2">Fecha proxima a pagar</th>
                        <th class="px-4 py-2">Fecha de expiración</th>
                        <th class="px-4 py-2">Comprobante</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vehiculos->seguros as $seguro)
                        <tr class="">
                            <td class="px-4 py-2">{{ $seguro->id }}</td>
                            <td class="px-4 py-2">{{ $vehiculos->nombre_vehiculo }}</td>
                            <td class="px-4 py-2">{{ $seguro->empresa_seguro }}</td>
                            <td class="px-4 py-2">{{ $seguro->fecha_pago_seguro }}</td>
                            <td class="px-4 py-2">{{ $seguro->monto }}</td>
                            <td class="px-4 py-2">{{ $seguro->fecha_proxima_seguro }}</td>
                            <td class="px-4 py-2">{{ $seguro->fecha_expirar_seguro }}</td>
                            <td class="px-4 py-2">
                                @if($seguro->comprobante_pago_seguro)
                                    <a href="{{ asset('storage/' . $seguro->comprobante_pago_seguro) }}" target="_blank" class="text-blue-600 hover:text-blue-800">Ver comprobante</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-4 py-2 text-center space-x-2 text-sm">
                                <!-- Acciones aquí -->
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-2 text-center text-gray-500">No hay seguros registrados para este vehículo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

        
</x-app-layout>