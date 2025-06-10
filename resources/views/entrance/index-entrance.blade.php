<x-app-layout>
    <x-slot name="header">
        <!--Boton para cambiar el modo oscuro/claro-->
<x-mode-button id="theme-toggle" class="float-right " >
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
           Existencias
       </h2>            
   </x-slot>
   <div class="container mx-auto mt-8">
           @if (session('success'))
               <div class="alert alert-success">
                   {{ session('success') }}
               </div>
           @endif
          
           <h1 class="text-2xl dark:text-white font-bold mb-4">Existencia de productos</h1>

           <table class="table-auto w-full border-collapse bg-white shadow-md">
            <thead class="bg-gray-100">
                <div class="float-right text-dark dark:text-white">
                    <form action="{{ route('index-entrance') }}" method="GET">
                     <!--   <label class=" text-black dark:text-white text-base font-sans">Buscar por Nombre</label>
                        <select class="text-black dark:text-black" name="id" id="id" required onchange="this.form.submit()">
                            <option class="text-center text-black dark:text-black" value="">--Todos--</option> 
                            #foreach ($clients as $client)
                            <option class="text black dark:text-black" value="{ $client->id }}" { request('id') == $client->id ? 'selected' : '' }}>
                                { $client->name_Client }}
                            </option><br>
                            endforeach
                        </select>
                       </form>
                </div>-->
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Categoria</th>
                    <th class="px-4 py-2 border">Nombre del producto</th>
                    <th class="px-4 py-2 border">Existencia actual</th>
                    <th class="px-4 py-2 border">Fecha</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($entrances as $entrance)
                    <tr>
                        <td class="border px-4 py-2">{{ $entrance->id }}</td>
                        <td class="border px-4 py-2">{{ $entrance->id_categories}}</td>
                        <td class="border px-4 py-2">{{ $entrance->product_id_entrance}}</td>
                        <td class="border px-4 py-2">{{ $entrance->existence_entrance }}</td>
                        <td class="border px-4 py-2">{{ $entrance->date_entrance }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-black dark:text-dark-100 text-center">
                           <a href="{{ route('edit-entrance', $entrance->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                           <form action="{{ route('delete-entrance', $entrance->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('{{ __('¿Estas seguro de eliminar a este cliente?') }}')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center">Sin existencias</td>
                    </tr>
                @endif
            </tbody>
            <x-primary-button class="mt-4">
            <a href="{{ route('create-entrance') }}" class="text-dark"> 
                 {{ __('Agregar existencia') }}
             </a> 
        </x-primary-button>
        <x-primary-button class="ml-2 mt-4">
            <a href="{{ route('create-client') }}" class="text-dark"> 
                 {{ __('Hacer cotización') }}
             </a> 
        </x-primary-button>
    </table>
</x-app-layout>