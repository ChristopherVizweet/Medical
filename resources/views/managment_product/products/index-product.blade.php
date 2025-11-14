<x-app-layout>
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
      </div>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
              <tr class="">
                  <th class="px-4 py-2">{{ __('ID') }}</th>
                  <th class="px-4 py-2">{{ __('Categoria') }}</th>
                  <th class="px-4 py-2">{{ __('Imagen del producto') }}</th>
                  <th class="px-4 py-2">{{ __('Artículo') }}</th>
                  <th class="px-4 py-2">{{ __('Código exteríor') }}</th>
                  <th class="px-4 py-2">{{ __('Diametro(mm)') }}</th>
                  <th class="px-4 py-2">{{ __('Proveedor') }}</th>
                  <th class="px-4 py-2">{{ __('Stock') }}</th>
                  <th class="px-4 py-2">{{ __('valor por articulo ($)') }}</th>
                  <th class="px-4 py-2">{{ __('Acciones') }}</th>
              </tr>
          </thead>
          <tbody>
             @forelse ($products as $product)
             
                 <tr class="">
                     <td class="px-4 py-2">{{ $product->id }}</td>
                     <td class="px-4 py-2">{{ $product->categories->name_categories }}</td>
                     <td class= "items-center px-4 py-2 "> <img src="{{ asset('storage/productos/' . $product->image_product)  }} "  
                        alt="{{ $product->image_product }}" 
                        class="w-16 h-16 object-contain rounded-md mx-auto"> 
                     </td>
                     <td class="px-4 py-2">{{ $product->name_product }}</td>
                     <td class="px-4 py-2">{{ $product->codeExt_product }}</td>
                     <td class="px-4 py-2">{{ $product->diameterMM_product }}</td>
                     <td class="px-4 py-2">{{ $product->id_supplier }}</td>
                     <td class="px-4 py-2">{{ $product->stock }}</td>                     
                     <td class="px-4 py-2">${{ $product->valueArt_product }}</td>
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
 