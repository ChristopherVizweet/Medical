<x-guest-layout>
    <form method="POST" action="{{ route('store-checklist-items', $id) }} " enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_checklist" value="{{ $id }}">
        <div class=" text-center text-gray-800 dark:text-white">
            <h1>REGISTRAR CHECKLIST PRE USO DEL VEHÍCULO</h1>
        </div><br>

        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                {{-- Nombre del vehiculo --}}
                <div class="col-span-2">
                     <x-input-label for="curp" :value="__('Nombre del vehículo')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="id_placa_vehiculo" value="{{$vehiculos->vehiculo->nombre_vehiculo}}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>
              

                {{-- Placa --}}
                <div>
                    <x-input-label for="curp" :value="__('Placas del vehículo')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="id_placa_vehiculo" value="{{$vehiculos->id_placa_vehiculo}}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- DESTINO --}}
                <div>
                    <x-input-label for="curp" :value="__('Destino')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="id_placa_vehiculo" value="{{$vehiculos->destino_check}}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>
                {{-- MOTIVO --}}
                <div>
                    <x-input-label for="curp" :value="__('Motivo')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="id_placa_vehiculo" value="{{$vehiculos->motivo_checklist}}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- CONDUCTOR --}}
                <div>
                    <x-input-label for="curp" :value="__('Conductor asignado')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="id_placa_vehiculo" value="{{$vehiculos->conductor->Nombre}}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

            </div>
            <div class="mt-6 text-red-500 border-t border-gray-300 pt-6">
                <h1>
                    CADA CONDUCTOR REALIZARA EL CHECK LIST DE SU VEHICULO, DE ENCONTRAR
                    ALGUNA NOVEDAD, DEBERA INFORMAR AL ÁREA DE ADMINISTRACIÓN, QUIEN TOMARA
                    LAS ACCIONES CORRECTIVAS NECESARIAS.
                </h1>
            </div>

            <div class="mt-6 border-t border-slate-200 pt-6 dark:border-slate-700">
                @foreach ($seccions as $seccion)
                    <div class="mb-8 rounded-3xl border border-slate-200 bg-slate-50/80 p-5 shadow-sm shadow-slate-200/80 dark:border-slate-700 dark:bg-slate-900/80">
                        <div class="mb-4 flex items-center justify-between gap-4 rounded-2xl bg-white px-5 py-4 shadow-sm shadow-slate-200/50 dark:bg-slate-800 dark:shadow-black/20">
                            <h2 class="text-xl font-semibold text-slate-900 dark:text-slate-100">{{ $seccion->nombre_seccion_ch }}</h2>
                            <span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-sky-700 dark:bg-sky-900/20 dark:text-sky-200">Sección</span>
                        </div>
                        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
                            <table class="min-w-full text-left text-sm text-slate-700 dark:text-slate-300">
                                <thead class="bg-slate-50 text-slate-600 dark:bg-slate-900 dark:text-slate-300">
                                    <tr>
                                        <th class="px-5 py-4 font-semibold">Item</th>
                                        <th class="px-5 py-4 text-center font-semibold">Bueno</th>
                                        <th class="px-5 py-4 text-center font-semibold">Malo</th>
                                        <th class="px-5 py-4 text-center font-semibold">No aplica</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                    @foreach ($seccion->items as $item)
                                        <tr class="bg-white hover:bg-slate-50 dark:bg-slate-800 dark:hover:bg-slate-700">
                                            <td class="px-5 py-4 font-medium text-slate-900 dark:text-slate-100">{{ $item->nombre_items_ch }}</td>
                                            <td class="px-5 py-4 text-center">
                                                <input type="hidden" name="items[{{ $item->id }}][id_item]" value="{{ $item->id }}">
                                                <label class="inline-flex items-center">
                                                    <input type="radio" id="item_{{ $item->id }}_bueno" name="items[{{ $item->id }}][estado_item]" value="bueno" class="sr-only peer" />
                                                    <span class="inline-flex h-9 w-24 items-center justify-center rounded-full border border-slate-300 bg-white text-xs font-semibold text-slate-700 transition peer-checked:border-sky-500 peer-checked:bg-sky-500 peer-checked:text-white dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:peer-checked:bg-sky-500 dark:peer-checked:text-white">Bueno</span>
                                                </label>
                                            </td>
                                            <td class="px-5 py-4 text-center">
                                                <label class="inline-flex items-center">
                                                    <input type="radio" id="item_{{ $item->id }}_malo" name="items[{{ $item->id }}][estado_item]" value="malo" class="sr-only peer" />
                                                    <span class="inline-flex h-9 w-24 items-center justify-center rounded-full border border-slate-300 bg-white text-xs font-semibold text-slate-700 transition peer-checked:border-rose-500 peer-checked:bg-rose-500 peer-checked:text-white dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:peer-checked:bg-rose-500 dark:peer-checked:text-white">Malo</span>
                                                </label>
                                            </td>
                                            <td class="px-5 py-4 text-center">
                                                <label class="inline-flex items-center">
                                                    <input type="radio" id="item_{{ $item->id }}_no_aplica" name="items[{{ $item->id }}][estado_item]" value="no_aplica" class="sr-only peer" />
                                                    <span class="inline-flex h-9 w-24 items-center justify-center rounded-full border border-slate-300 bg-white text-xs font-semibold text-slate-700 transition peer-checked:border-amber-500 peer-checked:bg-amber-500 peer-checked:text-white dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:peer-checked:bg-amber-500 dark:peer-checked:text-white">No aplica</span>
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
                   
               
               
            </div>
            <div class="flex justify-end mt-6">
                <x-primary-button>
                    {{ __('Registrar checklist') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>