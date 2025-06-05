<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categorias
        </h2> 
    </x-slot>
    <div class="container mx-auto mt-4">
        @if (session('success'))
            <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
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
            <h1 class="text-2xl dark:text-white font-bold mb-4">Lista de categorias</h1>
        </div>
        <table class="table-auto w-full text-left bg-white shadow-md rounded-lg">
          <thead>
              <tr class="bg-gray-200">
                  <th class="px-4 py-2">{{ __('ID') }}</th>
                  <th class="px-4 py-2">{{ __('Nombre de la Categoria') }}</th>
                  <th class="px-4 py-2">{{ __('Acciones') }}</th>
              </tr>
          </thead>
          <tbody>
             @forelse ($categories as $categorie)
                 <tr class="border-t">
                     <td class="px-4 py-2">{{ $categorie->id }}</td>
                     <td class="px-4 py-2">{{ $categorie->name_categories }}</td>
                     <td class="px-4 py-2">
                      
                        <a href="{{ route('edit-categories', $categorie->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                        <form action="{{ route('delete-categories', $categorie->id) }}" method="POST" style="display:inline-block;">     
                        @csrf

                             @method('DELETE')
                             <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿En verdad deseas eliminar esta categoria?')">Eliminar</button>
                         </form>
                     </td>
                 </tr>
             @empty
                 <tr>
                     <td colspan="5" class="px-4 py-2 text-center">Categorias no encontradas</td>
                 </tr>
             @endforelse
         </tbody>
         <x-primary-button class="mt-4">
          <a href="{{ route('create-categories') }}" class="text-dark">
              {{ __('Crear categoria') }}
          </a>
      </x-primary-button>
     </table>
 </div>

    
    
    </x-app-layout>
 