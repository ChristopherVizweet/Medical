<x-guest-layout>
    <form method="POST" action="{{ route('store-verificacion',$vehiculos->id) }} " enctype="multipart/form-data">
        @csrf
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-200" data-fg-d3bl21="0.8:1.26440:/src/app/App.tsx:145:11:4157:8332:e:div:ete" data-fgid-d3bl21=":rm:">
            <h2 class="text-2xl text-slate-800 mb-6 pb-4 border-b border-slate-200" data-fg-d3bl22="0.8:1.26440:/src/app/App.tsx:146:13:4246:135:e:h2:t" data-fgid-d3bl22=":rn:">Registro de Nueva Tenencia</h2>
            <form class="space-y-6" data-fg-d3bl24="0.8:1.26440:/src/app/App.tsx:150:13:4395:8077:e:form:ete" data-fgid-d3bl24=":ro:">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" data-fg-d3bl25="0.8:1.26440:/src/app/App.tsx:151:15:4462:7254:e:div:xtetxte" data-fgid-d3bl25=":rp:">
                    <div class="lg:col-span-1" data-fg-d3bl27="0.8:1.26440:/src/app/App.tsx:153:17:4583:1814:e:div:ete" data-fgid-d3bl27=":rq:">
                        <label class="block text-sm text-slate-700 mb-2" data-fg-d3bl28="0.8:1.26440:/src/app/App.tsx:154:19:4633:84:e:label:t" data-fgid-d3bl28=":rr:">Fotografia del comprobante</label>
                        <div class="border-2 border-dashed border-slate-300 rounded-xl p-4 text-center hover:border-slate-400 transition-colors" data-fg-d3bl30="0.8：1.26440:/src/app/App.tsx：155：19：4736：1638：e：div：x" data-fgid-d3bl30="：rs：">
                            <label class="cursor-pointer block" data-fg-d3bl36="0.8：1.26440：/src/app/App.tsx：172：23：5662：664：e：label：ete" data-fgid-d3bl36="：rt：">
                                <div class="flex flex-col items-center py-8" data-fg-d3bl37="0.8：1.26440：/src/app/App.tsx：173：２５：57２７：３２９：e：div：etete" data-fgid-d3bl３７="：ru：">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload w-12 h-12 text-slate-400 mb-2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" x2="12" y1="3" y2="15"></line>
                                    </svg>
                                    <p class="text-slate-600 mb-1" data-fg-d3bl39="0.8:1.26440:/src/app/App.tsx:175:27:5882:55:e:p:t" data-fgid-d3bl39=":r10:">Subir fotografía</p>
                                    <p class="text-xs text-slate-400" data-fg-d3bl41="0.8:1.26440:/src/app/App.tsx:176:27:5964:61:e:p:t" data-fgid-d3bl41=":r11:">JPG, PNG (máx. 5MB)</p>
                                </div>
                                <input id="comprobante_pago_verificacion" type="file" name="comprobante_verificaciones" class="hidden">
                                 @if ($vehiculos->comprobante_pago_verificacion == null)
                                    <p id="comprobante-status" class="text-red-500 text-sm mt-2">No se ha subido ningún comprobante.</p>
                                @else
                                    <p id="comprobante-status" class="text-green-500 text-sm mt-2">Comprobante actual: {{ $vehiculos->comprobante_pago_seguro }}</p>
                                @endif
                                <p id="comprobante-added" class="text-green-500 text-sm mt-2 hidden">Se agregó una fotografía correctamente.</p>
                            </label>
                        </div>
                    </div>
                    <div class="lg:col-span-2 grid grid-cols-1 grid-col-2 md:grid-cols-2 gap-4" data-fg-d3bl45="0.8:1.26440:/src/app/App.tsx:190:17:6464:5231:e:div:etetetetetetete" data-fgid-d3bl45=":r13:">
                        <div Onlyread="true" >
                            <label class="block text-sm text-slate-700 mb-2 flex items-center gap-2" data-fg-d3bl47="0.8:1.26440:/src/app/App.tsx:192:21:6578:201:e:label:et" data-fgid-d3bl47=":r15:">
                                Nombre del vehículo</label>
                            <!-- Campo donde aparece el nombre del vehiculo -->
                            <input id="" onlyread="true" type="text" class="w-full px-4 py-3 focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" value="{{ $vehiculos->nombre_vehiculo }}" >
                        </div>
                        <div>
                            <label class="block text-sm text-slate-700 mb-2 flex items-center gap-2">
                                Fecha de pago</label>
                            <input name="fecha_pago_verificacion" type="date" class="w-full px-4 py-3 focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none">
                        </div>
                        <div>
                            <label class="block text-sm text-slate-700 mb-2 flex items-center gap-2" data-fg-d3bl47="0.8:1.26440:/src/app/App.tsx:192:21:6578:201:e:label:et" data-fgid-d3bl47=":r15:">
                                Fecha proxima de pago</label>
                            <input name="fecha_proxima_verificacion" type="date" class="border border-slate-300 w-full px-4 py-3 focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none">
                        </div>
                        
                        <div>
                            <label class="block text-sm text-slate-700 mb-2 flex items-center gap-2" data-fg-d3bl47="0.8:1.26440:/src/app/App.tsx:192:21:6578:201:e:label:et" data-fgid-d3bl47=":r15:">
                                Monto</label>
                            <input name="monto_verificacion" type="number" step="0.01" class="col-span-2 border border-slate-300 w-full px-4 py-3 focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none">
                        </div>
                        
                        <div class="col-span-2">
                            <label class="block text-sm text-slate-700 mb-2 flex items-center gap-2" data-fg-d3bl47="0.8:1.26440:/src/app/App.tsx:192:21:6578:201:e:label:et" data-fgid-d3bl47=":r15:">
                                Observaciones o comentarios</label>
                            <input name="observaciones_verificacion" type="text" class="columns-2 border border-slate-300 w-full px-4 py-3 focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none">
                        </div>
                    </div>
                    <div class=" mt-2 flex justify-end">
                        <x-primary-button class="mr-4">Registrar</x-primary-button>
                        <a href="{{ route('index-vehiculos') }}"
                            class="px-4 py-2 bg-red-800 dark:bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-red-400 dark:hover:bg-green-400 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                    </div>
            </form>
            {{-- -Aqui es para mostrar los errores del sistema- --}}

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <strong>¡Error!</strong> Revisa los campos marcados. <br>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const input = document.getElementById('comprobante_pago_verificacion');
                    const addedMessage = document.getElementById('comprobante-added');
                    const statusMessage = document.getElementById('comprobante-status');

                    if (!input) return;

                    input.addEventListener('change', function () {
                        if (input.files && input.files.length > 0) {
                            addedMessage.classList.remove('hidden');
                            addedMessage.textContent = 'Se agregó una fotografía correctamente.';
                            if (statusMessage) {
                                statusMessage.classList.add('hidden');
                            }
                        } else {
                            addedMessage.classList.add('hidden');
                            if (statusMessage) {
                                statusMessage.classList.remove('hidden');
                            }
                        }
                    });
                });
            </script>
</x-guest-layout>