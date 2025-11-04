<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Panel') }}



<!--Boton para cambiar el modo oscuro/claro-->
<x-mode-button id="theme-toggle" class="float-right flex " >
Modo Oscuro/Claro
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
            
        </h2>
       
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    Bienvenido a Medical Gas 
                </div>
                <div class="mx-10 text-black dark:text-white">
                    Aqui algunas recomendaciones
                </div>
     <!--Registros pendientes-->
            <div class="float-left mt-5 text-center w-42 font-semibold border text-lg text-black dark:text-white ">
                Registros pendientes para revisar
                <div class="mx-10 my-4 text-black dark:text-white">
                    @if ($rPendientes->isNotEmpty())
                    <ul class="list-disc list-inside">
                        @foreach($rPendientes as $pendientes)
                            <li>ID: {{ $pendientes->id }} Folio de salida: {{$pendientes->productos->first()->folio_movimiento}}
                            Obra: {{$pendientes->productos->first()->obra_movimiento}}
                            Cantidad enviada: {{$pendientes->productos->first()->cantidadE}}
                            Cantidad recibida: {{$pendientes->productos->first()->cantidad}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                <button class="bg-blue-900 dark:bg-green-500 rounded px-4 py-2 text-white dark:text-white  hover:bg-blue-400 dark:hover:bg-green-300">
                    <a href="{{ route('index-salidas') }}" class="text-dark"> 
                         {{ __('Ver salidas') }}
                    </a> 
                </button>
                
                @else
                <div class="mx-10 my-4 text-black dark:text-white">
                    No hay registros pendientes.
                </div>
                @endif
            </div>
                <!--Vacaciones proximas-->
            <div class="float-left mt-5 text-center w-42 font-semibold border text-lg text-black dark:text-white ">
                Proximas vacaciones
                <div class="mx-10 my-4 text-black dark:text-white">
            @if($cumpleanosProximos->isNotEmpty())
                    <ul class="list-disc list-inside">
                        @foreach($proximos as $empleado)
                            <li>{{ $empleado->Nombre }} {{ $empleado->apellidos }} - Vacaciones: {{ \Carbon\Carbon::parse($empleado->fecha_vacaciones)->format('d/m/Y') }}</li>
                        @endforeach
                    </ul>
            @else
            <div>
                No hay vacaciones próximas
            </div>
            @endif
                </div>
            </div>
            <!--cumpleaños proximos-->
                <div class="float-left mt-5 text-center w-42 font-semibold border text-lg text-black dark:text-white ">
                Proximos cumpleaños
                <div class="mx-10 my-4 text-black dark:text-white">
            @if($cumpleanosProximos->isNotEmpty())
                    <ul class="list-disc list-inside">
                        @foreach($cumpleanosProximos as $empleado)
                            <li>{{ $empleado->Nombre }} {{ $empleado->apellidos }} - Cumpleaños: {{ \Carbon\Carbon::parse($empleado->fecha_nacimiento)->format('d/m/Y') }}</li>
                        @endforeach
                    </ul>
            @else 
            <div>
                No hay cumpleaños próximos
            </div>
            @endif
            </div>
            </div>
           
        </div>
    </div>
    </div>
</x-app-layout>
