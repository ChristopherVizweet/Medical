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
            Empleados
        </h2>      
    </x-slot>
    <div class="container mx-auto mt-4">
    
            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
    
            <h1 class="text-2xl font-bold mb-4 text-black dark:text-white">Lista de empleados</h1>
    <x-primary-button class="mt-4">
                    <a href="{{ route('create-employees') }}" class="text-dark"> 
                         {{ __('Crear empleado') }}
                     </a> 
                </x-primary-button>
           <div class="overflow-x-auto">
     <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
                    <tr>
                        <th class="px-4 py-2 text-center">{{ __('ID') }}</th>
                        <th class="px-4 py-2 text-center">{{('Foto de empleado')}}</th>
                        <th class="px-4 py-2 text-center">{{ __('Nombre') }}</th>
                        <th class="px-4 py-2 text-center">{{ __('Apellidos') }}</th>
                        <th class="px-4 py-2 text-center">{{ __('Organizacion') }}</th>
                        <th class="px-4 py-2 text-center">{{ __('Cargo') }}</th>
                        <th class="px-4 py-2 text-center">{{ __('Telefono de trabajo') }}</th>
                        <th class="px-4 py-2 text-center">{{ __('Tipo de sangre') }}</th>
                        <th class="px-4 py-2 text-center">{{ __('Curriculum Vitae') }}</th>
                        <th class=" px-4 py-2 text-center">{{ __('Ver') }}</th>
                        <th class="px-4 py-2 text-center">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $empleado)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $empleado->id}}</td>
                             <td class="px-4 py-2"><img class="items-center w-27 h-27" src="{{ asset('storage/' . $empleado->foto) }}" alt="Imagen de empleado" width="150">
                            </td>
                            <td class="text-center px-4 py-2">{{ $empleado->Nombre}}</td>
                            <td class="text-center px-4 py-2">{{ $empleado->apellidos}}</td>
                            <td class="text-center px-4 py-2">{{ $empleado->organizacion }}</td>
                            <td class="text-center px-4 py-2">{{ $empleado->cargo }}</td>
                            <td class="text-center px-4 py-2">{{ $empleado->numeroTelefonoTrabajo}}</td>
                            <td class="text-center px-4 py-2">{{ $empleado->tipoSangre}}</td>
                        
                            <td class="px-4 py-2 text-center items-center">
                                 <!--Condicion para el CV-->
                            @if($empleado->cv_empleado)    
                            <a href="storage/{{ $empleado->cv_empleado }}" target="blank_" class="text-center items-center text-blue-600 dark:text-blue-900 hover:underline">
                                Ver CV
                                <form action="{{ route('delete-cv', $empleado->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-900 hover:underline mt-4" onclick="return confirm('Estas seguro de eliminar este archivo?')">Eliminar CV</button>
                                </form>
                                @else
                                <span class="text-red-500">Sin curriculum</span>
                                @endif
                            </a></td>

                            <td class="px-4 py-2">
                                <!--Aqui esta la condicion si no existen certificados en los empleados-->
                                @if ($empleado->certificados_empleados)
                                    <a href="storage/{{ $empleado->certificados_empleados }}" target="blank_" class="text-blue-600 dark:text-blue-900 hover:underline">Ver certificados</a>|
                               

                                 <form action="{{ route('delete-certificados', $empleado->id) }}" method="POST" style="display:inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-900 hover:underline" onclick="return confirm('Estas seguro de eliminar este archivo?')">Eliminar certificados</button>
                                </form>
                                 @else
                                    <span class="text-gray-500">Sin certificados</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('edit-employees', $empleado->id) }}" class="text-blue-600 hover:underline">Editar</a> |
                                <form action="{{ route('delete-employees', $empleado->id) }}" method="POST" style="display:inline-block;"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-900 hover:underline" onclick="return confirm('Estas seguro de eliminar este usuario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center">{{ __('Empleado no encontrados') }}</td>
                        </tr>
                    @endforelse
                </tbody>
                
            </table>
           </div>
        </div>
    </x-app-layout>