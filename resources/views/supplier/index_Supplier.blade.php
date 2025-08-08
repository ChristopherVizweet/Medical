<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center flex-wrap gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Proveedores
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

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        {{-- Mensajes de sesión --}}
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

        <h1 class="text-2xl dark:text-white font-bold mb-6">Lista de proveedores</h1>

        {{-- Filtro y botón en una fila responsive --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 gap-4">
            {{-- Filtro --}}
            <form action="{{ route('index_Supplier') }}" method="GET" class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                <label class="text-black dark:text-white text-base font-sans" for="id">Buscar por Nombre</label>
                <select name="id" id="id" required onchange="this.form.submit()"
                        class="text-black dark:text-black border border-gray-300 rounded px-3 py-1">
                    <option value="">--Todos--</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ request('id') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name_supplier }}
                        </option>
                    @endforeach
                </select>
            </form>

            {{-- Botón Crear Proveedores --}}
            @role('superadmin')
                <x-primary-button>
                    <a href="{{ route('create_supplier') }}" class="text-dark">
                        {{ __('Crear proveedores') }}
                    </a>
                </x-primary-button>
            @endrole
        </div>

        {{-- Tabla responsive --}}
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Número telefónico</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                        <tr class="border-t dark:border-gray-700">
                            <td class="px-4 py-2">{{ $supplier->id }}</td>
                            <td class="px-4 py-2">{{ $supplier->name_supplier }}</td>
                            <td class="px-4 py-2">{{ $supplier->email_supplier }}</td>
                            <td class="px-4 py-2">{{ $supplier->phoneNumber_supplier }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('edit_supplier', $supplier->id) }}" class="text-blue-600 dark:text-blue-900 hover:underline">Editar</a>
                                <form action="{{ route('delete_supplier', $supplier->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('¿En verdad deseas eliminar este proveedor?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-900 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">Proveedores no encontrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
