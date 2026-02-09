<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center flex-wrap gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Clientes
            </h2>

            <x-mode-button id="theme-toggle" class="text-sm">
                Modo oscuro/claro
            </x-mode-button>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const themeToggle = document.getElementById("theme-toggle");
                const body = document.documentElement;
                const currentTheme = localStorage.getItem("theme");

                if (currentTheme === "dark") {
                    body.classList.add("dark");
                } else {
                    body.classList.remove("dark");
                }

                themeToggle.addEventListener("click", function() {
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
    </x-slot>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        {{-- Mensajes --}}
        @if (session('success'))
        <div class="fade-out bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <h1 class="text-2xl dark:text-white font-bold mb-6">Filtro de búsqueda</h1>

        {{-- Botón Crear Cliente --}}
        <x-primary-button>
            <a href="{{ route('create-facturas') }}" class="text-dark">
                {{ __('Registrar factura') }}
            </a>
        </x-primary-button>

        {{-- Tabla responsive --}}
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full text-left bg-white dark:text-gray-200 dark:bg-gray-500">
                <thead class="bg-gray-200 dark:text-gray-200 dark:bg-gray-600">
                    <tr>
                        <th class="px-6 py-2">ID</th>
                       
                        <th class="px-6 py-2">Nombre Emisor</th>
                        <th class="px-6 py-2">RFC del emisor</th>
                        <th class="px-6 py-2">Nombre Receptor</th>
                        <th class="px-6 py-2">RFC del Receptor</th>
                        <th class="px-6 py-2">Folio</th>
                        <th class="px-6 py-2">Fecha de Vencimiento</th>
                        <th class="px-6 py-2">Status de pago</th>
                        <th class="px-6 py-2">Total $</th>
                        <th class="px-6 py-2">Comprobante</th>
                        <th class="px-6 py-2">Acciones</th>
                    </tr> 
                </thead>
                <tbody>
                    @forelse ($facturas as $factura)
                    <tr class="">
                        <td class="px-6 py-2">{{$factura->id}}</td>
                        <td class="px-6 py-2">{{$factura->supplier->name_supplier ?? "Sin nombre"}}</td>
                        <td class="px-6 py-2">{{$factura->supplier->rfc_supplier ?? "Sin nombre"}}</td>
                        <td class="px-6 py-2">{{$factura->nombre_receptor ?? "Sin nombre"}}</td>
                        <td class="px-6 py-2">{{$factura->rfc_receptor ?? "Sin nombre de emisor"}}</td>
                        <td class="px-6 py-2">{{$factura->folio_factura ?? "Sin folio"}}</td>
                        <td class="px-6 py-2">{{$factura->fecha_vencimiento ?? "Sin fecha de vencimiento"}}</td>
                        <td class="px-6 py-2">{{$factura->status_factura ?? "Sin status de pago"}}</td>
                        <td class="px-6 py-2">${{$factura->total_factura ?? "Sin total"}}</td>
                        <td class="px-6 py-2">
                            @if($factura->comprobante_pdf)
                            <div class="flex justify-center"> <!--Revisar por que no muestra las imagenes-->
                                <a href="{{ asset('storage/app/public'. $factura->comprobante_pdf)}}"
                                    target="_blank" class="inline-flex items-center justify-center w-10 h-10 bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white rounded transition-colors" title="Ver comprobante">
                                    📄
                                </a>
                            </div>
                            @else
                            <span class="text-gray-400">Sin comprobante</span>
                            @endif
                        </td>
                        <td class="px-6 py-2 text-center space-x-2 text-sm">
                         @if($factura->status_factura == 'pendiente')
                            <a href="{{ route('edit-facturas',$factura->id) }}" class="text-yellow-600 dark:text-blue-700 hover:underline">
                            Actualizar Pago</a> |
                            <a href="{{ route('show-facturas',$factura->id) }}"class="text-green-600 dark:text-green-500 hover:underline">
                                Ver todo</a>
                         @elseif($factura->status_factura == 'completado')
                            <a href="{{ route('show-facturas',$factura->id) }}"class="text-green-600 dark:text-green-500 hover:underline">
                                Ver todo</a>
                         @elseif($factura->status_factura == '') 
                             <a href="{{ route('edit-facturas',$factura->id) }}" class="text-red-600 dark:text-red-700 hover:underline">
                            Verificar Pago</a>
                         @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">No hay facturas registradas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>