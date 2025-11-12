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
    <!-- Dashboard cards: responsive grid -->
<div class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-4">
   <!--Seccion para el bajo o nulo inventario-->
  <section class="bg-white dark:bg-gray-700 border rounded-lg shadow p-4 flex flex-col">
    <header class="mb-2">
      <h3 id="inventario-title" class="text-lg font-semibold text-gray-900 dark:text-white">Bajo o Nulo inventario</h3>
    </header>
    <div class="text-sm text-gray-700 dark:text-gray-200 mb-4 flex-1">
      @if($bnproducto->isNotEmpty())
        <ul class="list-disc list-inside space-y-2 max-h-40 overflow-auto pr-2">
          @foreach($bnproducto as $bnproductos)
            <li class="truncate">
              {{ $bnproductos->name_product }} {{$bnproductos->diameterMM_product }} <br>
             Cantidad en Stock: {{$bnproductos->stock}}
            </li>
          @endforeach
          <div class="mt-3">
                <a href="{{ route('index-product') ?? '#' }}"
                    class="inline-block w-full text-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-400">
                    Ver productos
                </a>
             </div>
        </ul>
      @else
        <p class="text-sm text-gray-600 dark:text-gray-300">No hay bajo inventario.</p>
      @endif
    </div>
  </section>

  <!-- Registros pendientes -->
  <section class="bg-white dark:bg-gray-700 border rounded-lg shadow p-4 flex flex-col" aria-labelledby="pending-title">
    <header class="mb-2">
      <h3 id="pending-title" class="text-lg font-semibold text-gray-900 dark:text-white">Registros pendientes para revisar</h3>
    </header>

    <div class="text-sm text-gray-700 dark:text-gray-200 mb-4 flex-1">
      @if ($rPendientes->isNotEmpty())
        <ul class="list-disc list-inside space-y-2 max-h-40 overflow-auto pr-2">
          @foreach($rPendientes as $pendientes)
            <li class="break-words">
              <strong>ID:</strong> {{ $pendientes->id }}<br>
              <strong>Folio:</strong> {{ optional($pendientes->productos->first())->folio_movimiento ?? '-' }}<br>
              <strong>Obra:</strong> {{ optional($pendientes->productos->first())->obra_movimiento ?? '-' }}<br>
              <strong>Enviada:</strong> {{ optional($pendientes->productos->first())->cantidadE ?? '-' }}
              &nbsp; <strong>Recibida:</strong> {{ optional($pendientes->productos->first())->cantidadA ?? '-' }}
            </li>
          @endforeach
        </ul>
        <div class="mt-3">
      <a href="{{ route('index-salidas') }}"
         class="inline-block w-full text-center px-4 py-2 bg-blue-800 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500">
        Ver salidas
      </a>
    </div>
      @else
        <p class="text-sm text-gray-600 dark:text-gray-300">No hay registros pendientes.</p>
      @endif
    </div>
  </section>

  <!-- Próximas vacaciones -->
  <section class="bg-white dark:bg-gray-700 border rounded-lg shadow p-4 flex flex-col" aria-labelledby="vacaciones-title">
    <header class="mb-2">
      <h3 id="vacaciones-title" class="text-lg font-semibold text-gray-900 dark:text-white">Próximas vacaciones</h3>
    </header>

    <div class="text-sm text-gray-700 dark:text-gray-200 mb-4 flex-1">
      @if($proximos->isNotEmpty())
        <ul class="list-disc list-inside space-y-2 max-h-40 overflow-auto pr-2">
          @foreach($proximos as $empleado)
            <li class="truncate">
              {{ $empleado->Nombre }} {{ $empleado->apellidos }}
              — Vacaciones: {{ \Carbon\Carbon::parse($empleado->fecha_vacaciones)->format('d/m/Y') }}
            </li>
             <div class="mt-3">
                <a href="{{ route('index-employees') ?? '#' }}"
                    class="inline-block w-full text-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-400">
                    Ver empleados
                </a>
             </div>
          @endforeach
        </ul>
      @else
        <p class="text-sm text-gray-600 dark:text-gray-300">No hay vacaciones próximas.</p>
      @endif
    </div>

  </section>

  <!-- Próximos cumpleaños -->
  <section class="bg-white dark:bg-gray-700 border rounded-lg shadow p-4 flex flex-col" aria-labelledby="cumple-title">
    <header class="mb-2">
      <h3 id="cumple-title" class="text-lg font-semibold text-gray-900 dark:text-white">Próximos cumpleaños</h3>
    </header>

    <div class="text-sm text-gray-700 dark:text-gray-200 mb-4 flex-1">
      @if($cumpleanosProximos->isNotEmpty())
        <ul class="list-disc list-inside space-y-2 max-h-40 overflow-auto pr-2">
          @foreach($cumpleanosProximos as $empleado)
            <li class="truncate">
              {{ $empleado->Nombre }} {{ $empleado->apellidos }} —
              {{ \Carbon\Carbon::parse($empleado->fecha_nacimiento)->format('d/m/Y') }}
            </li>
          @endforeach
        </ul>
        <div class="mt-3">
                <a href="{{ route('index-employees') ?? '#' }}"
                    class="inline-block w-full text-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-green-400">
                    Ver empleados
                </a>
             </div>
      @else
        <p class="text-sm text-gray-600 dark:text-gray-300">No hay cumpleaños próximos.</p>
      @endif
    </div>
  </section>
</div>
           
        </div>
    </div>
    </div>
</x-app-layout>
