<x-app-layout>
    <x-slot name="header">
        <!--Boton para cambiar el modo oscuro/claro-->
        <x-mode-button id="theme-toggle" class="float-right">
            Modo escuro/claro
        </x-mode-button>
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
        <h1 class="text-2xl dark:text-white font-bold mb-4">Lista de productos</h1>
    </div>
    <!--Comienzan los filtros de busqueda-->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <form action="{{ route('index-product') }}" method="GET">
            <label class="text-black dark:text-white text-base font-sans">Buscar por categoria</label>
            <select class="" name="id_categories" id="id_categories" required onchange="this.form.submit()">
                <option class="text-center" value="">--Todas--</option>
                @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ request('id_categories') == $categorie->id ? 'selected' : '' }}>
                    {{ $categorie->name_categories }}
                </option><br>
                @endforeach
            </select>
        </form>
    </div>

    <!--Boton para crear un nuevo producto-->
    <div class="flex items-center space-x-2">
        <x-primary-button class="mt-4">
            <a href="{{ route('create-product') }}" class="text-dark">
                Agregar un nuevo producto
            </a>
        </x-primary-button>
        <!--Boton para importar datos de Excel-->
        <x-primary-button class="mt-4">
            <a href="{{ route('import-product') }}" class="text-dark">
                Importar datos de Excel
            </a>
        </x-primary-button>
        <x-primary-button class="mt-4">
            <a href="index-categories">
                Agregar nueva categoria
            </a>
        </x-primary-button>
    </div>
    <div class="overflow-x-auto rounded-lg shadow">
        <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
            <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
                <tr class="">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Categoria</th>
                    <th class="px-4 py-2">Imagen del producto</th>
                    <th class="px-4 py-2">Artículo</th>
                    <th class="px-4 py-2">Código exterior</th>
                    <th class="px-4 py-2">Código interior</th>
                    <th class="px-4 py-2">Diametro(mm)</th>
                    <th class="px-4 py-2">Diametro(inch)</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2">valor por articulo ($)</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)

                <tr class="">
                    <td class="px-4 py-2">{{ $product->id }}</td>
                    <td class="px-4 py-2">{{ $product->categories->name_categories }}</td>
                    <td class="items-center px-2 py-2 ">


                        <img src="{{ asset('storage/' . $product->image_product) }} "
                            alt="{{ $product->image_product }}"
                            class="w-20 h-20 object-contain rounded-md mx-auto">
                    </td>
                    <td class="px-4 py-2">{{ $product->name_product ?? 'Sin nombre'}}</td>
                    <td class="px-4 py-2">{{ $product->codeExt_product ?? 'Sin codigo exterior'}}</td>
                    <td class="px-4 py-2">{{ $product->codeint_product  ?? 'Sin codigo interior'}}</td>
                    <td class="px-4 py-2">{{ $product->diameterMM_product ?? 'Sin diametro(mm)'}}</td>
                    <td class="px-4 py-2">{{ $product->diameterinch_product ?? 'Sin diametro(inch)'}}</td>
                    <td class="px-4 py-2">{{ $product->stock ?? 'Sin stock'}}</td>
                    <td class="px-4 py-2">${{ $product->valueArt_product ?? 'Sin valor unitario'}}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('edit-product', $product->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                        <form action="{{ route('delete-product', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿En verdad deseas eliminar esta categoria?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center">Productos no encontrados</td>
                </tr>
                @endforelse
            </tbody>

    </div>
    </table>
    </div>



</x-app-layout>