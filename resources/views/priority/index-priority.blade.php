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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white">
           Prioridades
        </h2>      
    </x-slot>
    <div class="container mx-auto mt-4">
    
            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
    
            <h1 class="text-2xl font-bold mb-4 text-black dark:text-white">Lista de Prioridades</h1>
    
            <table class="table-auto w-full text-left bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">{{('ID') }}</th>
                        <th class="px-4 py-2">{{('Titulo de prioridad') }}</th>
                        <th class="px-4 py-2">{{('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($priorities as $priority)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $priority->id}}</td>
                            <td class="px-4 py-2">{{ $priority->namePriority}}</td>
                            <td class="px-4 py-2">
                                <a href="{{route('edit-priority', $priority->id) }}" class="text-blue-600 hover:underline">Editar </a>| 
                                <form action="{{ route('delete-priority', $priority->id) }}" method="POST" style="display:inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Estas seguro de eliminar este usuario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center">{{('Prioridades no encontradas') }}</td>
                        </tr>
                    @endforelse
                </tbody>
                <x-primary-button class="mt-4">
                    <a href="{{ route('create-priority') }}" class="text-dark"> 
                         {{ __('Nueva prioridad') }}
                     </a> 
                </x-primary-button>
            </table>
        </div>
    </x-app-layout>