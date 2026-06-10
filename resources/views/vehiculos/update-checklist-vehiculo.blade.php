<x-guest-layout>
    <form method="POST" action="{{ route('update-checklist-vehiculo',$vehiculos->id) }} " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" text-center text-gray-800 dark:text-white">
            <h1>REGISTRAR CHECKLIST PRE USO DEL VEHÍCULO</h1>
        </div><br>

        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                {{-- Nombre del vehiculo --}}
                <div class="col-span-2">
                    <x-input-label for="Nombre" :value="__('Nombre del vehículo')" />
                    <x-text-input autocomplete="off" id="Nombre" class="mt-1 block w-full" type="text" name="id_vehiculo" value="{{ $vehiculos->vehiculo->nombre_vehiculo }}" />
                    <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
                </div>

                {{-- Placa --}}
                <div>
                    <x-input-label for="curp" :value="__('Placa')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="id_placa_vehiculo" value="{{ $vehiculos->vehiculo->placas_vehiculo }}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- destino --}}
                <div>
                    <x-input-label for="apellidos" :value="__('Salida a: ')" />
                    <x-text-input autocomplete="off" id="apellidos" class="mt-1 block w-full" type="text" name="destino_check" value="{{ $vehiculos->destino_check }}" />
                    <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                </div>

                {{-- motivo de salida --}}
                <div>
                    <x-input-label for="curp" :value="__('Motivo de salida')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="motivo_checklist" value="{{ $vehiculos->motivo_checklist }}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Conductor --}}
                <div>
                    <x-input-label for="curp" :value="__('Conductor')" />
                   <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="motivo_checklist" value="{{ $vehiculos->conductor->Nombre ?? 'Sin asignar' }}" />

                </div>

                {{-- fecha de salida --}}
                <div>
                    <x-input-label for="curp" :value="__('Fecha de salida')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="date" name="fecha_salida_checklist" value="{{ $vehiculos->fecha_salida_checklist ? \Carbon\Carbon::parse($vehiculos->fecha_salida_checklist)->format('Y-m-d') : '' }}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- fecha de entrega --}}
                <div>
                    <x-input-label for="curp" :value="__('Fecha de entrega')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="date" name="fecha_entrega_checklist" value="{{ $vehiculos->fecha_entrega_checklist ? \Carbon\Carbon::parse($vehiculos->fecha_entrega_checklist)->format('Y-m-d') : ($vehiculos->fecha_salida_checklist ? \Carbon\Carbon::parse($vehiculos->fecha_salida_checklist)->format('Y-m-d') : '') }}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Hora de inspección --}}
                <div>
                    <x-input-label for="curp" :value="__('Hora de inspección')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="time" name="hora_inspeccion" value="{{ $vehiculos->hora_inspeccion }}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Kilometraje inicial --}}
                <div>
                    <x-input-label for="curp" :value="__('Kilometraje inicial')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="kilometraje_inicial" value="{{ $vehiculos->kilometraje_inicial }}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Kilometraje final --}}
                <div>
                    <x-input-label for="curp" :value="__('Kilometraje final')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="kilometraje_final" value="{{ $vehiculos->kilometraje_final }}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Verificador --}}
                <div>
                    <x-input-label for="curp" :value="__('Verificador')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="motivo_checklist" value="{{ $vehiculos->responsableEntrega->name  ?? 'Sin asignar'}}" />
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