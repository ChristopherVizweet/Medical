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
        <div class="float-right mr-4">
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
        <table class="table-auto w-full text-center bg-white shadow-md rounded-lg">
          <thead>
              <tr class="bg-gray-200">
                  <th class="px-4 py-2">{{ __('ID') }}</th>
                  <th class="px-4 py-2">{{ __('Categoria') }}</th>
                  <th class="px-4 py-2">{{ __('Tipo') }}</th>
                  <th class="px-4 py-2">{{ __('Proveedor') }}</th>
                  <th class="px-4 py-2">{{ __('Código exteríor') }}</th>
                  <th class="px-4 py-2">{{ __('Código interior') }}</th>
                  <th class="px-4 py-2">{{ __('Diametro(mm)') }}</th>
                  <th class="px-4 py-2">{{ __('Diametro(in)') }}</th>
                  <th class="px-4 py-2">{{ __('Diametro(nominal)') }}</th>
                  <th class="px-4 py-2">{{ __('Diametro(exterior)') }}</th>
                  <th class="px-4 py-2">{{ __('Fabricante') }}</th>
                  <th class="px-4 py-2">{{ __('valor por articulo ($)') }}</th>
                  <th class="px-4 py-2">{{ __('Imagen del producto') }}</th>
                  <th class="px-4 py-2">{{ __('Acciones') }}</th>
              </tr>
          </thead>
          <tbody>
             @forelse ($products as $product)
             
                 <tr class="border-t">
                     <td class="px-4 py-2">{{ $product->id }}</td>
                     <td class="px-4 py-2">{{ $product->categories->name_categories }}</td>
                     <td class="px-4 py-2">{{ $product->name_product }}</td>
                     <td class="px-4 py-2">{{ $product->id_supplier }}</td>
                     <td class="px-4 py-2">{{ $product->codeExt_product }}</td>
                     <td class="px-4 py-2">{{ $product->codeInt_product }}</td>
                     <td class="px-4 py-2">{{ $product->diameterMM_product }}</td>
                     <td class="px-4 py-2">{{ $product->diameterIN_product }}</td>
                     <td class="px-4 py-2">{{ $product->diameter_nominal }}</td>
                     <td class="px-4 py-2">{{ $product->diameter_exterior }}</td>
                     <td class="px-4 py-2">{{ $product->manufact_product }}</td>
                     <td class="px-4 py-2">{{ $product->valueArt_product }}</td>
                     <td class= "items-center px-4 py-2"> <img class="items-center" src="{{ asset('storage/' . $product->image_product) }}" alt="Imagen del producto" width="300">
                     </td>
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
         <x-primary-button class="mt-4">
          <a href="{{ route('import-product') }}" class="text-dark">
              {{ __('Agregar un nuevo producto') }}
          </a>
      </x-primary-button>
      <!--Boton para importar datos de Excel-->
      <x-primary-button class="mt-4 ml-3">
          <a href="{{ route('import-product') }}" class="text-dark">
              {{ __('Importar datos de Excel') }}
          </a>
      </x-primary-button>
     </table>
 </div>

    
    
</x-app-layout>
 