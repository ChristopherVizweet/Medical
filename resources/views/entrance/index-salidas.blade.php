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
           Registro de salidas
       </h2>            
   </x-slot>
   <div class="container mx-auto mt-8">
           @if (session('success'))
               <div class="alert alert-success">
                   {{ session('success') }}
               </div>
           @endif
           <h1 class="text-2xl dark:text-white font-bold mb-4">Filtros de búsqueda</h1>
           {{--Aqui comienza el filtro por nombre de obra--}}
            <form action="{{ route('index-salidas') }}" method="GET" class="flex flex-col sm:flex-row items-start sm:items-center gap-4 w-full md:w-auto">
                 {{-- Filtro por folio --}}
                <div class="flex flex-col">
                    <label for="folio_movimiento" class="text-black dark:text-white text-base">Buscar por folio</label>
                    <select name="folio_movimiento" id="folio_movimiento" onchange="this.form.submit()"
                            class="text-black dark:text-black border border-gray-300 rounded px-3 py-1 w-full">
                        <option value="">--Todos--</option>
                        @foreach ($movimientos as $movimiento)
                            <option value="{{ $movimiento->productos->first()->folio_movimiento }}" {{ request('folio_movimiento') == $movimiento->productos->first()->folio_movimiento ? 'selected' : '' }}>
                                {{ $movimiento->productos->first()->folio_movimiento }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="obra_movimiento" class="text-black dark:text-white text-base">Buscar por obra</label>
                    <input type="text" name="obra_movimiento" id="obra_movimiento" placeholder="Escriba el nombre de la obra"
                           value="{{ request('obra_movimiento') }}"
                           class="text-black dark:text-black border border-gray-300 rounded px-3 py-1 w-full"
                           onchange="this.form.submit()">
                </div>
                
            </form>
           {{-- Tabla responsive --}}
        <div class="overflow-x-auto rounded-lg shadow">
             <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
              <tr class="">
                  <th class="px-4 py-2">{{ __('ID') }}</th>
                  <th class="px-4 py-2">{{ __('Folio de salida')}}</th>
                  <th class="px-4 py-2">{{ __('Nombre de la obra')}}</th>
                  <th class="px-4 py-2">{{ __('Solicitante')}}</th>
                  <th class="px-4 py-2">{{ __('Cantidad Requerida')}}</th>
                  <th class="px-4 py-2">{{ __('Cantidad Aprobada') }}</th>
                  <th class="px-4 py-2">{{ __('Cantidad Enviada') }}</th>
                  <th class="px-4 py-2">{{ __('T.P.E')}}</th>
                  <th class="px-4 py-2">{{ __('Fecha de salida')}}</th>
                  <th class="px-4 py-2">{{ __('Estado de registro')}}</th>
                  <th class="px-4 py-2">{{ __('Observaciones')}}</th>
                  <th class="px-4 py-2">{{ __('Acciones') }}</th>
              </tr>
          </thead>
          <tbody>
             @forelse ($movimientos as $movi)
             
                 <tr class="">
                     <td class="px-4 py-2">{{ $movi->id }}</td>
                     <td class="px-4 py-2">{{ $movi->productos->first()->folio_movimiento ?? 'Sin folio' }}</td>
                     <td class="px-4 py-2">{{ $movi->productos->first()->obra_movimiento ?? 'Sin nombre de obra'}}</td>
                     <td class="px-4 py-2">{{ $movi->productos->first()->empleado->Nombre ?? 'Sin solicitante'}}</td>
                     <td class="px-4 py-2">{{ $movi->productos->first()->cantidadR ?? 'Sin cantidad requerida'}}</td>
                     <td class="px-4 py-2">{{ $movi->productos->first()->cantidad ?? 'Sin cantidad aprobada'}}</td>
                     <td class="px-4 py-2">{{ $movi->productos->first()->cantidadE ?? 'Sin cantidad enviada'}}</td>
                     <td class="px-4 py-2">{{ $movi->productos->first()->cantidadA ?? 'Sin T.P.E'}}</td>
                     <td class="px-4 py-2">{{ $movi->fecha_movimiento ?? 'Sin fecha'}}</td>
                     <!--<td class="px-4 py-2">{ $movi->estadoMovimiento ?? 'Sin estado'}}</td>-->
                    <td class="px-4 py-2">
        @if ($movi->productos->first()->cantidadE == true)
            @if ($movi->productos->first()->cantidadE == $movi->productos->first()->cantidadA)
                        <div class="text-green-500" for="estadoMovimiento">
                            Completado
                        </div>

                @elseif ($movi->estadoMovimiento != 'revisado' || $movi->estadoMovimiento != 'En proceso') 
                        <div class="text-yellow-500" for="estadoMovimiento">
                            Pendiente
                        </div>
                    @if ($movi->estadoMovimiento == 'Revisado')
                        <div class="text-green-500" for="estadoMovimiento">
                            Revisado
                        </div>
                        @elseif ($movi->productos->first()->cantidadA==null || $movi->productos->first()->encargado_recibe==null)
                         <div class="text-blue-500" for="estadoMovimiento">
                             En proceso
                         </div>
                    @endif  
            @endif
        @endif
                    </td>
                     <td class="px-4 py-2">{{ $movi->observaciones_movimiento ?? 'Sin observaciones'}}</td>
                    <td class="px-4 py-2">
                                <!--Aqui esta la condicion si tienen cantidad fuera de almacen-->
                                @if ($movi->productos->first()->cantidadE)
                                    <a href=" {{ route('pdf-salidasObras', $movi->id) }}" target="_blank" class="text-red-600 hover:underline">PDF</a>| 
                                <a href="{{ route('edit-salidas', $movi->id) }}" class="text-blue-600 dark:text-blue-900 hover:underline">Actualizar</a>|
                                <form  action="{{ route('delete-salidas', $movi->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿En verdad deseas eliminar este registro?')">Eliminar</button>
                                </form>
                                    @else
                                        <a href=" {{ route('pdf-salidas', $movi->id) }}" target="_blank" class="text-red-600 hover:underline">PDF</a>|
                                        <form  action="{{ route('delete-salidas', $movi->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿En verdad deseas eliminar este registro?')">Eliminar</button>
                                        </form>
                                    @endif
                    </td>




                     <!--<td class="px-4 py-2"> <a href=" { route('pdf-salidasObras', $movi->id) }}" target="_blank" class="text-red-600 hover:underline">PDF</a>| 
                    <form  action="{ route('delete-salidas', $movi->id) }}" method="POST" style="display:inline-block;">
                        csrf
                             method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿En verdad deseas eliminar este registro?')">Eliminar</button>
                         </form>
                    </td> -->
                         
                 </tr>
             @empty
                 <tr>
                     <td colspan="5" class="px-4 py-2 text-center">Salidas no encontradas</td>
                 </tr>
             @endforelse
         </tbody>
         
    </div>
    <x-primary-button class="mt-4">
                    <a href="{{ route('create-salidas') }}" class="text-dark"> 
                         {{ __('Registrar salida') }}
                     </a> 
    </x-primary-button>
    <x-primary-button class="mt-4 ml-4">
                    <a href="{{ route('create-salidasObras') }}" class="text-dark"> 
                         {{ __('Registrar salida a obra') }}
                     </a> 
    </x-primary-button>
     </table>
        </div>
</x-app-layout>