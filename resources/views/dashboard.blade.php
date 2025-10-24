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
                <!--Vacaciones proximas-->
            <div class="float-right mt-8 text-center w-42 font-semibold border text-lg text-black dark:text-white ">
                Proximas vacaciones de empleados
                <div class="mx-10 my-4 text-black dark:text-white">
                    <ul class="list-disc list-inside">
                        @foreach($proximos as $empleado)
                            <li>{{ $empleado->Nombre }} {{ $empleado->apellidos }} - Vacaciones: {{ \Carbon\Carbon::parse($empleado->fecha_vacaciones)->format('d/m/Y') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--cumpleaños proximos-->
                <div class="float-right mt-8 text-center w-42 font-semibold border text-lg text-black dark:text-white ">
                Proximos cumpleaños de empleados
                <div class="mx-10 my-4 text-black dark:text-white">
                    <ul class="list-disc list-inside">
                        @foreach($cumpleanosProximos as $empleado)
                            <li>{{ $empleado->Nombre }} {{ $empleado->apellidos }} - Cumpleaños: {{ \Carbon\Carbon::parse($empleado->fecha_nacimiento)->format('d/m/Y') }}</li>
                        @endforeach
                    </ul>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
