<x-guest-layout>
    <form method="POST" action="{{ route('store-checklist',$vehiculos->id) }} " enctype="multipart/form-data">
        @csrf
        <div class=" text-center text-gray-800 dark:text-white">
            <h1>REGISTRAR CHECKLIST PRE USO DEL VEHÍCULO</h1>
        </div><br>

        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                {{-- Nombre del vehiculo --}}
                <div class="col-span-2">
                    <x-input-label for="Nombre" :value="__('Nombre del vehículo')" />
                    <x-text-input autocomplete="off" id="Nombre" class="mt-1 block w-full" type="text" name="id_vehiculo" value="{{ $vehiculos->nombre_vehiculo }}" />
                    <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
                </div>

                {{-- Placa --}}
                <div>
                    <x-input-label for="curp" :value="__('Placa')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="id_placa_vehiculo" value="{{ $vehiculos->placas_vehiculo }}" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- destino --}}
                <div>
                    <x-input-label for="apellidos" :value="__('Salida a: ')" />
                    <x-text-input autocomplete="off" id="apellidos" class="mt-1 block w-full" type="text" name="destino_check" />
                    <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                </div>

                {{-- motivo de salida --}}
                <div>
                    <x-input-label for="curp" :value="__('Motivo de salida')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="motivo_checklist" :value="old('motivo_checklist')" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Conductor --}}
                <div>
                    <x-input-label for="curp" :value="__('Conductor')" />
                    <select name="id_conductor_checklist" id="">
                        <option value="">--Seleccionar--</option>
                        @foreach ($conductores as $conductor)
                        <option value="{{ $conductor->id }}">{{ $conductor->Nombre }}</option>
                        @endforeach
                    </select>

                </div>

                {{-- fecha de salida --}}
                <div>
                    <x-input-label for="curp" :value="__('Fecha de salida')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="date" name="fecha_salida_checklist" :value="old('fecha_salida_checklist')" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- fecha de entrega --}}
                <div>
                    <x-input-label for="curp" :value="__('Fecha de entrega')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="date" name="fecha_entrega_checklist" :value="old('fecha_entrega_checklist')" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Hora de inspección --}}
                <div>
                    <x-input-label for="curp" :value="__('Hora de inspección')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="time" name="hora_inspeccion" value="now()->format('h:i A')SHOE" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- KIlometraje inicial --}}
                <div>
                    <x-input-label for="curp" :value="__('Kilometraje inicial')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="kilometraje_inicial" :value="old('kilometraje_inicial')" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Kilometraje final --}}
                <div>
                    <x-input-label for="curp" :value="__('Kilometraje final')" />
                    <x-text-input autocomplete="off" id="curp" class="mt-1 block w-full" type="text" name="kilometraje_final" :value="old('kilometraje_final')" />
                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                </div>

                {{-- Verificador --}}
                <div>
                    <x-input-label for="curp" :value="__('Verificador')" />
                    <select name="responsable_entrega_checklist" id="curp">
                        <option value="">--Seleccionar--</option>
                        @foreach ($responsables as $responsable)
                        <option value="{{ $responsable->id }}">{{ $responsable->name }}</option>
                        @endforeach
                    </select>
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