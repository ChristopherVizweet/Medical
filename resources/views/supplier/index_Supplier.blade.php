<x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              Proveedores
          </h2> 
      <!--Boton para cambiar el modo oscuro/claro-->
<x-mode-button id="theme-toggle" class="self-end " >
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
      </x-slot>
      <div class="container mx-auto mt-4">
          @if (session('success'))
              <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                  {{ session('success') }}
              </div>
          @endif
              <h1 class="text-2xl dark:text-white font-bold mb-4">{{ __('Lista de proveedores') }}</h1>
          </div>
          <table class="table-auto w-full text-left bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">{{ __('ID') }}</th>
                    <th class="px-4 py-2">{{ __('Nombre') }}</th>
                    <th class="px-4 py-2">{{ __('Email') }}</th>
                    <th class="px-4 py-2">{{ __('Número telefonico') }}</th>
                    <th class="px-4 py-2">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody>
               @forelse ($suppliers as $supplier)
                   <tr class="border-t">
                       <td class="px-4 py-2">{{ $supplier->id }}</td>
                       <td class="px-4 py-2">{{ $supplier->name }}</td>
                       <td class="px-4 py-2">{{ $supplier->email }}</td>
                       <td class="px-4 py-2">{{ $supplier->phone_number }}</td>
                       <td class="px-4 py-2">
                           <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-blue-600 hover:underline">{{ __('View') }}</a> |
                           <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-blue-600 hover:underline">{{ __('Edit') }}</a> |
                           <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline-block;">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                           </form>
                       </td>
                   </tr>
               @empty
                   <tr>
                       <td colspan="5" class="px-4 py-2 text-center">{{ __('No suppliers found') }}</td>
                   </tr>
               @endforelse
           </tbody>
           <x-primary-button class="mb-6">
            <a href="{{ route('create_supplier') }}" class="text-dark">
                {{ __('Crear proveedores') }}
            </a>
        </x-primary-button>
       </table>
   </div>

      
      
      </x-app-layout>
   