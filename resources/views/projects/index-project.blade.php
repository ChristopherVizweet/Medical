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
            
       <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-black dark:text-white">Lista de proyectos</h1>

        <!-- Botones de acción -->
        <div class="flex items-center space-x-2" x-data="{ open: false }">
            <!-- Botón Nuevo Proyecto -->
            <x-primary-button class="font-semibold">
                <a href="{{ route('create-project') }}" class="text-dark">
                    {{ __('Nuevo proyecto') }}
                </a>
            </x-primary-button>

            <!-- Botón Ver más -->
            <x-primary-button @click="open = !open" class="font-semibold">
                {{ __('Ver más') }}
            </x-primary-button>

            <!-- Menú desplegable -->
            <div
                x-show="open"
                @click.away="open = false"
                class="absolute right-0 mt-2 w-64 bg-white border rounded-lg shadow-lg z-50 p-3 space-y-2"
            >
                <x-primary-button class="w-full text-left">
                    <a href="{{ route('index-service') }}" class="text-dark">Nuevo servicio</a>
                </x-primary-button>
                <x-primary-button class="w-full text-left">
                    <a href="{{ route('index-priority') }}" class="text-dark">Nueva prioridad</a>
                </x-primary-button>
                <x-primary-button class="w-full text-left">
                    <a href="{{ route('index-status') }}" class="text-dark">Nuevo status</a>
                </x-primary-button>
                <x-primary-button class="w-full text-left">
                    <a href="{{ route('index-company') }}" class="text-dark">Nueva empresa</a>
                </x-primary-button>
                <x-primary-button class="w-full text-left">
                    <a href="{{ route('index-recursos') }}" class="text-dark">Nuevo recurso</a>
                </x-primary-button>
                <x-primary-button class="w-full text-left">
                    <a href="{{ route('index-bank') }}" class="text-dark">Nueva cuenta bancaria</a>
                </x-primary-button>
            </div>
        </div>
    </div>
<div class="justify-items-center">
                   <!-- COMIENZAN LOS FILTROS DE BUSQUEDA -->
<form action="{{ route('index-project') }}" method="GET" class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 text-black dark:text-white">

        <!-- Filtro por folio -->
        <div>
            <label class="block text-sm font-semibold">Folio</label>
            <select name="folioProject" onchange="this.form.submit()" class="w-full px-2 py-1 rounded text-black dark:text-black">
                <option value="">--Todos--</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->folioProject }}" {{ request('folioProject') == $project->folioProject ? 'selected' : '' }}>
                        {{ $project->folioProject }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filtro por cliente -->
        <div>
            <label class="block text-sm font-semibold">Cliente</label>
            <select name="id_client" onchange="this.form.submit()" class="w-full px-2 py-1 rounded text-black dark:text-black">
                <option value="">--Todos--</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ request('id_client') == $client->id ? 'selected' : '' }}>
                        {{ $client->name_Client }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filtro por vendedor -->
        <div>
            <label class="block text-sm font-semibold">Vendedor</label>
            <select name="seller_id_usuario" onchange="this.form.submit()" class="w-full px-2 py-1 rounded text-black dark:text-black">
                <option value="">--Todos--</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ request('seller_id_usuario') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filtro por prioridad -->
        <div>
            <label class="block text-sm font-semibold">Prioridad</label>
            <select name="id_priority" onchange="this.form.submit()" class="w-full px-2 py-1 rounded text-black dark:text-black">
                <option value="">--Todos--</option>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}" {{ request('id_priority') == $priority->id ? 'selected' : '' }}>
                        {{ $priority->namePriority }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filtro por estado -->
        <div>
            <label class="block text-sm font-semibold">Estado</label>
            <select name="id_status" onchange="this.form.submit()" class="w-full px-2 py-1 rounded text-black dark:text-black">
                <option value="">--Todos--</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ request('id_status') == $status->id ? 'selected' : '' }}>
                        {{ $status->nameStatus }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</form>

            </div>
<div class="overflow-x-auto">
   <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
            
                    <tr class="">
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
                            <td class="px-4 py-2"> <a href="{{ route('edit-project', $project->id) }}" class="text-blue-600 dark:text-blue-900 hover:underline">Editar</a></td>
                            <td class="px-4 py-2">
                                <a href="{{route('pdf-project', $project->id) }}" class="text-red-600 hover:underline" target=_blank>PDF</a> | 
                                 <a href="{{route('edit-project', $project->id) }}" class="text-green-800 hover:underline">Excel</a>
                                <form action="{{ route('delete-project', $project->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 dark:text-900 hover:underline" onclick="return confirm('Estas seguro de eliminar este proyecto?')">X Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center">{{ __('Proyectos no encontrados') }}</td>
                        </tr>
                    @endforelse
                </tbody>
                <!---AQUI ESTA INICIANDO EL SCRIPT DE ALPINE--->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

               
</div>
            </table>
</div>
    </x-app-layout>