<x-app-layout>
      <x-slot name="header">
        <x-mode-button id="theme-toggle" class="float-right flex" >
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
              Proveedores
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
              <h1 class="text-2xl dark:text-white font-bold mb-4">Lista de proveedores</h1>
          </div>
          <table class="table-auto w-full text-left bg-white shadow-md rounded-lg">
            <thead>
                <div class="float-right text-dark dark:text-white">
                    <form action="{{ route('index_Supplier') }}" method="GET">
                        <label class=" text-black dark:text-white text-base font-sans">Buscar por Nombre</label>
                        <select class="text-black dark:text-black" name="id" id="id" required onchange="this.form.submit()">
                            <option class="text-center text-black dark:text-black" value="">--Todos--</option> 
                            @foreach ($suppliers as $supplier)
                            <option class="text-black dark:text-black" value="{{ $supplier->id }}" {{ request('id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name_supplier }}
                            </option><br>
                            @endforeach
                        </select>
                    
                </div>
                </form>
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
                       <td class="px-4 py-2">{{ $supplier->name_supplier }}</td>
                       <td class="px-4 py-2">{{ $supplier->email_supplier }}</td>
                       <td class="px-4 py-2">{{ $supplier->phoneNumber_supplier }}</td>
                       <td class="px-4 py-2">
                        
                           <a href="{{ route('edit_supplier', $supplier->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                           <form action="{{ route('delete_supplier', $supplier->id) }}" method="POST" style="display:inline-block;">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿En verdad deseas eliminar este proveedor?')">Eliminar</button>
                           </form>
                       </td>
                   </tr>
               @empty
                   <tr>
                       <td colspan="5" class="px-4 py-2 text-center">Proveedores no encontrados</td>
                   </tr>
               @endforelse
           </tbody>
         @role('superadmin')
           <x-primary-button class="mt-4">
            
            <a href="{{ route('create_supplier') }}" class="text-dark">
                {{ __('Crear proveedores') }}
            </a>
        </x-primary-button>
        @endrole
       </table>
   </div>

      
      
      </x-app-layout>
   