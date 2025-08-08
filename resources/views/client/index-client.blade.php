<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center flex-wrap gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Clientes
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

        <h1 class="text-2xl dark:text-white font-bold mb-6">Lista de clientes</h1>

        {{-- Filtros y botón --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <form action="{{ route('index-client') }}" method="GET" class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full md:w-auto">
                {{-- Filtro por RFC --}}
                <div class="flex flex-col">
                    <label for="RFC" class="text-black dark:text-white text-base">Buscar por RFC</label>
                    <select name="RFC" id="RFC" onchange="this.form.submit()"
                            class="text-black dark:text-black border border-gray-300 rounded px-3 py-1 w-full">
                        <option value="">--Todos--</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->RFC }}" {{ request('RFC') == $client->RFC ? 'selected' : '' }}>
                                {{ $client->RFC }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filtro por Nombre --}}
                <div class="flex flex-col">
                    <label for="name_Client" class="text-black dark:text-white text-base">Buscar por Nombre</label>
                    <input type="text" name="name_Client" id="name_Client" placeholder="Escriba el nombre"
                           value="{{ request('name_Client') }}"
                           class="text-black dark:text-black border border-gray-300 rounded px-3 py-1 w-full"
                           onchange="this.form.submit()">
                </div>
            </form>

            {{-- Botón Crear Cliente --}}
            <x-primary-button>
                <a href="{{ route('create-client') }}" class="text-dark">
                    {{ __('Crear cliente') }}
                </a>
            </x-primary-button>
        </div>

        {{-- Tabla responsive --}}
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Dirección</th>
                        <th class="px-4 py-2">Teléfono</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">RFC</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
                         <tr class="">
                            <td class="px-4 py-2">{{ $client->id }}</td>
                            <td class="px-4 py-2">{{ $client->name_Client }}</td>
                            <td class="px-4 py-2">{{ $client->address_Client }}</td>
                            <td class="px-4 py-2">{{ $client->phoneNumber_Client }}</td>
                            <td class="px-4 py-2">{{ $client->email_Client }}</td>
                            <td class="px-4 py-2">{{ $client->RFC }}</td>
                            <td class="px-4 py-2 text-center space-x-2 text-sm">
                                <a href="{{ route('edit_client', $client->id) }}" class="text-blue-600 dark:text-blue-900 hover:underline">Editar</a>
                                <form action="{{ route('delete_client', $client->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('¿Estás seguro de eliminar a este cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-900 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">No hay clientes disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
