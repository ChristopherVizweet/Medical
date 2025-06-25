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
            Proyectos
        </h2>      
    </x-slot>
    <div class="container mx-auto mt-4">
    
            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
    
            <h1 class="text-2xl font-bold mb-4 text-black dark:text-white">Lista de proyectos</h1>
    
            <table class="table-auto w-full text-left bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">{{('ID') }}</th>
                        <th class="px-4 py-2">{{('Folio del proyecto') }}</th>
                        <th class="px-4 py-2">{{('Nombre del proyecto')}}</th>
                        <th class="px-4 py-2">{{('Nombre del cliente')}}</th>
                        <th class="px-4 py-2">{{('Vendedor') }}</th>
                        <th class="px-4 py-2">{{('Empresa encargada') }}</th>
                        <th class="px-4 py-2">{{('A cargo') }}</th>
                        <th class="px-4 py-2">{{('Fecha de inicio') }}</th>
                        <th class="pc-4 py-2">{{('Fecha de termino')}}</th>
                        <th class="pc-4 py-2">{{('Presupuesto')}}</th>
                        <th class="pc-4 py-2">{{('Prioridad')}}</th>
                        <th class="pc-4 py-2">{{('Estado')}}</th>
                        <th class=" px-4 py-2">{{('Ver') }}</th>
                        <th class="px-4 py-2">{{('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $project->id}}</td>
                            <td class="px-4 py-2">{{ $project->folioProject}}</td>
                            <td class="px-4 py-2">{{ $project->nameProject}}</td>
                            <td class="px-4 py-2">{{ $project->client->name_Client ?? 'Sin cliente' }}</td>
                            <td class="px-4 py-2">{{ $project->vendedor->name ?? 'Sin vendedor' }}</td>
                            <td class="px-4 py-2">{{ $project->compani->nameCompany ?? 'Sin empresa' }}</td>
                            <td class="px-4 py-2">{{ $project->encargado->name ?? 'Sin encargado' }}</td>                            <td class="px-4 py-2">{{ $project->dateBegin}}</td>
                            <td class="px-4 py-2">{{ $project->dateEnd }}</td>
                            <td class="px-4 py-2">${{ $project->budget }}</td>
                            <td class="px-4 py-2">{{ $project->priority->namePriority ?? 'Sin prioridad' }}</td>
                            <td class="px-4 py-2">{{ $project->status->nameStatus ?? 'Sin estado' }}</td>
                            <td class="px-4 py-2"> <a href="{{ route('edit-project', $project->id) }}" class="text-blue-600 hover:underline">Editar</a></td>
                            <td class="px-4 py-2">
                                <a href="{{route('pdf-project', $project->id) }}" class="text-red-600 hover:underline" target=_blank>PDF</a> | 
                                 <a href="{{route('edit-project', $project->id) }}" class="text-green-800 hover:underline">Excel</a>
                                <form action="{{ route('delete-project', $project->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline" onclick="return confirm('Estas seguro de eliminar este proyecto?')">X Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center">{{ __('Proyectos no encontrados') }}</td>
                        </tr>
                    @endforelse
                </tbody>
                <x-primary-button class="mt-4">
                    <a href="{{ route('create-project') }}" class="text-dark"> 
                         {{ __('Nuevo proyecto') }}
                     </a> 
                </x-primary-button>
                <!--Boton para agregar nuevo servicio-->
                <x-primary-button class="mt-4 ml-2">
                    <a href="{{ route('index-service') }}" class="text-dark"> 
                         {{ __('Nuevo servicio de instalación') }}
                     </a> 
                </x-primary-button>
                <!--Boton para agregar nueva prioridad-->
                <x-primary-button class="mt-4 ml-2">
                    <a href="{{ route('index-priority') }}" class="text-dark"> 
                         {{ __('Nueva prioridad') }}
                     </a> 
                </x-primary-button>
                <!--Boton para agregar nuevo status-->
                <x-primary-button class="mt-4 ml-2">
                    <a href="{{ route('index-status') }}" class="text-dark"> 
                         {{ __('Nuevo status') }}
                     </a> 
                </x-primary-button>
                 <!--Boton para agregar nueva empresa-->
                 <x-primary-button class="mt-4 ml-2">
                    <a href="{{ route('index-company') }}" class="text-dark"> 
                         {{ __('Nueva empresa encargada') }}
                     </a> 
                </x-primary-button>
                <!--Boton para agregar nuevo recurso-->
                <x-primary-button class="mt-4 ml-2">
                    <a href="{{ route('index-recursos') }}" class="text-dark"> 
                         {{ __('Nuevo recurso') }}
                     </a> 
                </x-primary-button>
                <!--Boton para agregar nueva cuenta bancaria-->
                <x-primary-button class="mt-4 ml-2">
                    <a href="{{ route('index-bank') }}" class="text-dark"> 
                         {{ __('Nueva cuenta bancaria') }}
                     </a> 
                </x-primary-button>
            </table>
        </div>
    </x-app-layout>