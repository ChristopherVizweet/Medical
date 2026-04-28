<x-guest-layout>
    <form action="">
        @csrf
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-200" data-fg-d3bl21="0.8:1.26440:/src/app/App.tsx:145:11:4157:8332:e:div:ete" data-fgid-d3bl21=":rm:">
            <h2 class="text-2xl text-slate-800 mb-6 pb-4 border-b border-slate-200" data-fg-d3bl22="0.8:1.26440:/src/app/App.tsx:146:13:4246:135:e:h2:t" data-fgid-d3bl22=":rn:">Registro de Nuevo Vehículo</h2>
            <form class="space-y-6" data-fg-d3bl24="0.8:1.26440:/src/app/App.tsx:150:13:4395:8077:e:form:ete" data-fgid-d3bl24=":ro:">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" data-fg-d3bl25="0.8:1.26440:/src/app/App.tsx:151:15:4462:7254:e:div:xtetxte" data-fgid-d3bl25=":rp:">
                    <div class="lg:col-span-1" data-fg-d3bl27="0.8:1.26440:/src/app/App.tsx:153:17:4583:1814:e:div:ete" data-fgid-d3bl27=":rq:">
                        <label class="block text-sm text-slate-700 mb-2" data-fg-d3bl28="0.8:1.26440:/src/app/App.tsx:154:19:4633:84:e:label:t" data-fgid-d3bl28=":rr:">Fotografía del Vehículo</label>
                        <div class="border-2 border-dashed border-slate-300 rounded-xl p-4 text-center hover:border-slate-400 transition-colors" data-fg-d3bl30="0.8:1.26440:/src/app/App.tsx:155:19:4736:1638:e:div:x" data-fgid-d3bl30=":rs:">
                            <label class="cursor-pointer block" data-fg-d3bl36="0.8:1.26440:/src/app/App.tsx:172:23:5662:664:e:label:ete" data-fgid-d3bl36=":rt:">
                                <div class="flex flex-col items-center py-8" data-fg-d3bl37="0.8:1.26440:/src/app/App.tsx:173:25:5727:329:e:div:etete" data-fgid-d3bl37=":ru:">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload w-12 h-12 text-slate-400 mb-2" data-fg-d3bl38="0.8:1.26440:/src/app/App.tsx:174:27:5803:52:e:Upload::::::4gZ" data-fgid-d3bl38=":rv:">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" x2="12" y1="3" y2="15"></line>
                                    </svg>
                                    <p class="text-slate-600 mb-1" data-fg-d3bl39="0.8:1.26440:/src/app/App.tsx:175:27:5882:55:e:p:t" data-fgid-d3bl39=":r10:">Subir fotografía</p>
                                    <p class="text-xs text-slate-400" data-fg-d3bl41="0.8:1.26440:/src/app/App.tsx:176:27:5964:61:e:p:t" data-fgid-d3bl41=":r11:">JPG, PNG (máx. 5MB)</p>
                                </div><input type="file" accept="image/*" class="hidden" data-fg-d3bl43="0.8:1.26440:/src/app/App.tsx:178:25:6081:214:e:input" data-fgid-d3bl43=":r12:">
                            </label>
                        </div>
                    </div>
                    <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4" data-fg-d3bl45="0.8:1.26440:/src/app/App.tsx:190:17:6464:5231:e:div:etetetetetetete" data-fgid-d3bl45=":r13:">
                        <div data-fg-d3bl46="0.8:1.26440:/src/app/App.tsx:191:19:6552:720:e:div:ete" data-fgid-d3bl46=":r14:">
                            <label class="block text-sm text-slate-700 mb-2 flex items-center gap-2" data-fg-d3bl47="0.8:1.26440:/src/app/App.tsx:192:21:6578:201:e:label:et" data-fgid-d3bl47=":r15:">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4" data-fg-d3bl48="0.8:1.26440:/src/app/App.tsx:193:23:6678:32:e:FileText::::::B1i5" data-fgid-d3bl48=":r16:">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                    <path d="M10 9H8"></path>
                                    <path d="M16 13H8"></path>
                                    <path d="M16 17H8"></path>
                                </svg>Nombre Inventario</label>
                            <input type="text" name="nombreInventario" ="" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" placeholder="Challenger" data-fg-d3bl50="0.8:1.26440:/src/app/App.tsx:196:21:6800:447:e:input" data-fgid-d3bl50=":r17:" value="">
                        </div>
                        <div data-fg-d3bl51="0.8:1.26440:/src/app/App.tsx:207:19:7292:712:e:div:ete" data-fgid-d3bl51=":r18:">
                            <label class="block text-sm text-slate-700 mb-2 flex items-center gap-2" data-fg-d3bl52="0.8:1.26440:/src/app/App.tsx:208:21:7318:195:e:label:et" data-fgid-d3bl52=":r19:">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hash w-4 h-4" data-fg-d3bl53="0.8:1.26440:/src/app/App.tsx:209:23:7418:28:e:Hash::::::DRps" data-fgid-d3bl53=":r1a:">
                                    <line x1="4" x2="20" y1="9" y2="9"></line>
                                    <line x1="4" x2="20" y1="15" y2="15"></line>
                                    <line x1="10" x2="8" y1="3" y2="21"></line>
                                    <line x1="16" x2="14" y1="3" y2="21"></line>
                                </svg>Número de Serie</label>
                            <input type="text" name="numeroSerie" ="" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" placeholder="2C3CDZBB7GH7098811" data-fg-d3bl55="0.8:1.26440:/src/app/App.tsx:212:21:7534:445:e:input" data-fgid-d3bl55=":r1b:" value="">
                        </div>
                        <div data-fg-d3bl56="0.8:1.26440:/src/app/App.tsx:223:19:8024:558:e:div:ete" data-fgid-d3bl56=":r1c:">
                            <label class="block text-sm text-slate-700 mb-2" data-fg-d3bl57="0.8:1.26440:/src/app/App.tsx:224:21:8050:66:e:label:t" data-fgid-d3bl57=":r1d:">Marca</label>
                            <input type="text" name="marca" ="" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" placeholder="DODGE" data-fg-d3bl59="0.8:1.26440:/src/app/App.tsx:225:21:8137:420:e:input" data-fgid-d3bl59=":r1e:" value="">
                        </div>
                        <div data-fg-d3bl60="0.8:1.26440:/src/app/App.tsx:236:19:8602:566:e:div:ete" data-fgid-d3bl60=":r1f:">
                            <label class="block text-sm text-slate-700 mb-2" data-fg-d3bl61="0.8:1.26440:/src/app/App.tsx:237:21:8628:67:e:label:t" data-fgid-d3bl61=":r1g:">Modelo</label>
                            <input type="text" name="modelo" ="" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" placeholder="Challenger" data-fg-d3bl63="0.8:1.26440:/src/app/App.tsx:238:21:8716:427:e:input" data-fgid-d3bl63=":r1h:" value="">
                        </div>
                        <div data-fg-d3bl64="0.8:1.26440:/src/app/App.tsx:249:19:9188:551:e:div:ete" data-fgid-d3bl64=":r1i:"><label class="block text-sm text-slate-700 mb-2" data-fg-d3bl65="0.8:1.26440:/src/app/App.tsx:250:21:9214:64:e:label:t" data-fgid-d3bl65=":r1j:">Año</label><input type="text" name="año" ="" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" placeholder="2015" data-fg-d3bl67="0.8:1.26440:/src/app/App.tsx:251:21:9299:415:e:input" data-fgid-d3bl67=":r1k:" value=""></div>
                        <div data-fg-d3bl68="0.8:1.26440:/src/app/App.tsx:262:19:9759:563:e:div:ete" data-fgid-d3bl68=":r1l:"><label class="block text-sm text-slate-700 mb-2" data-fg-d3bl69="0.8:1.26440:/src/app/App.tsx:263:21:9785:67:e:label:t" data-fgid-d3bl69=":r1m:">Placas</label><input type="text" name="placas" ="" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" placeholder="PYY378A" data-fg-d3bl71="0.8:1.26440:/src/app/App.tsx:264:21:9873:424:e:input" data-fgid-d3bl71=":r1n:" value=""></div>
                        <div data-fg-d3bl72="0.8:1.26440:/src/app/App.tsx:275:19:10342:589:e:div:ete" data-fgid-d3bl72=":r1o:"><label class="block text-sm text-slate-700 mb-2" data-fg-d3bl73="0.8:1.26440:/src/app/App.tsx:276:21:10368:80:e:label:t" data-fgid-d3bl73=":r1p:">Área de Adscripción</label><input type="text" name="areaAdscripcion" ="" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" placeholder="PH" data-fg-d3bl75="0.8:1.26440:/src/app/App.tsx:277:21:10469:437:e:input" data-fgid-d3bl75=":r1q:" value=""></div>
                        <div data-fg-d3bl76="0.8:1.26440:/src/app/App.tsx:288:19:10951:721:e:div:ete" data-fgid-d3bl76=":r1r:"><label class="block text-sm text-slate-700 mb-2 flex items-center gap-2" data-fg-d3bl77="0.8:1.26440:/src/app/App.tsx:289:21:10977:194:e:label:et" data-fgid-d3bl77=":r1s:">Resguardatario</label><input type="text" name="resguardatario" ="" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-slate-500 focus:border-transparent outline-none" placeholder="Nombre del responsable" data-fg-d3bl80="0.8:1.26440:/src/app/App.tsx:293:21:11192:455:e:input" data-fgid-d3bl80=":r1u:" value=""></div>
                    </div>
                </div>

               
                <x-primary-button class="ms-4"><a href="index-cotizacion">Registrar</a></x-primary-button>
                <a href="{{ route('index-vehiculos') }}" 
                class="px-4 py-2 bg-red-800 dark:bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-red-400 dark:hover:bg-green-400 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Cancelar
            </a>
                
        </div>
    </form>
</x-guest-layout>