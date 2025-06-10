<x-guest-layout>  
    <form method="POST" action="{{ route('store-employees') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mt-4">
           
            <div class=" text-center text-gray-800 dark:text-white">
               <h1>REGISTRAR EMPLEADO</h1> 
            </div><br>
           
           <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        {{-- Nombre --}}
        <div>
            <x-input-label for="Nombre" :value="__('Nombre de empleado')" />
            <x-text-input id="Nombre" class="mt-1 block w-full" type="text" name="Nombre" :value="old('Nombre')" required />
            <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
        </div>

        {{-- Apellidos --}}
        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="mt-1 block w-full" type="text" name="apellidos" :value="old('apellidos')" required />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        {{-- CURP --}}
        <div>
            <x-input-label for="curp" :value="__('CURP')" />
            <x-text-input id="curp" class="mt-1 block w-full" type="text" name="curp" :value="old('curp')" required />
            <x-input-error :messages="$errors->get('curp')" class="mt-2" />
        </div>

        {{-- Organización --}}
        <div>
            <x-input-label for="organizacion" :value="__('Organización')" />
            <x-text-input id="organizacion" class="mt-1 block w-full" type="text" name="organizacion" :value="old('organizacion')" required />
            <x-input-error :messages="$errors->get('organizacion')" class="mt-2" />
        </div>

        {{-- Cargo --}}
        <div>
            <x-input-label for="cargo" :value="__('Cargo')" />
            <x-text-input id="cargo" class="mt-1 block w-full" type="text" name="cargo" :value="old('cargo')" required />
            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
        </div>

        {{-- Correo electrónico --}}
        <div>
            <x-input-label for="correoElectronico" :value="__('Correo Electrónico')" />
            <x-text-input id="correoElectronico" class="mt-1 block w-full" type="email" name="correoElectronico" :value="old('correoElectronico')" required />
            <x-input-error :messages="$errors->get('correoElectronico')" class="mt-2" />
        </div>

        {{-- Teléfono trabajo --}}
        <div>
            <x-input-label for="numeroTelefonoTrabajo" :value="__('Número telefónico de trabajo')" />
            <x-text-input id="numeroTelefonoTrabajo" class="mt-1 block w-full" type="text" name="numeroTelefonoTrabajo" :value="old('numeroTelefonoTrabajo')" required />
            <x-input-error :messages="$errors->get('numeroTelefonoTrabajo')" class="mt-2" />
        </div>

        {{-- Teléfono particular --}}
        <div>
            <x-input-label for="numeroTelParti" :value="__('Número telefónico particular')" />
            <x-text-input id="numeroTelParti" class="mt-1 block w-full" type="text" name="numeroTelParti" :value="old('numeroTelParti')" required />
            <x-input-error :messages="$errors->get('numeroTelParti')" class="mt-2" />
        </div>

        {{-- Sueldo --}}
        <div>
            <x-input-label for="sueldo" :value="__('Sueldo $')" />
            <x-text-input id="sueldo" class="mt-1 block w-full" type="text" name="sueldo" :value="old('sueldo')" required />
            <x-input-error :messages="$errors->get('sueldo')" class="mt-2" />
        </div>

        {{-- Calle --}}
        <div>
            <x-input-label for="calle" :value="__('Calle')" />
            <x-text-input id="calle" class="mt-1 block w-full" type="text" name="calle" :value="old('calle')" required />
            <x-input-error :messages="$errors->get('calle')" class="mt-2" />
        </div>

        {{-- Ciudad --}}
        <div>
            <x-input-label for="ciudad" :value="__('Ciudad')" />
            <x-text-input id="ciudad" class="mt-1 block w-full" type="text" name="ciudad" :value="old('ciudad')" required />
            <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
        </div>

        {{-- Estado o Provincia --}}
        <div>
            <x-input-label for="estadoProv" :value="__('Estado o Provincia')" />
            <x-text-input id="estadoProv" class="mt-1 block w-full" type="text" name="estadoProv" :value="old('estadoProv')" required />
            <x-input-error :messages="$errors->get('estadoProv')" class="mt-2" />
        </div>

        {{-- Código Postal --}}
        <div>
            <x-input-label for="codigoPostal" :value="__('Código Postal')" />
            <x-text-input id="codigoPostal" class="mt-1 block w-full" type="text" name="codigoPostal" :value="old('codigoPostal')" required />
            <x-input-error :messages="$errors->get('codigoPostal')" class="mt-2" />
        </div>

        {{-- País --}}
        <div>
            <x-input-label for="pais" :value="__('País o región')" />
            <x-text-input id="pais" class="mt-1 block w-full" type="text" name="pais" :value="old('pais')" required />
            <x-input-error :messages="$errors->get('pais')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tipoSangre" :value="__('Tipo de sangre')" />
            <x-text-input id="tipoSangre" class="mt-1 block w-full" type="text" name="tipoSangre" :value="old('tipoSangre')" required />
            <x-input-error :messages="$errors->get('tipoSangre')" class="mt-2" />
        </div>

        {{-- Foto --}}
        <div class="sm:col-span-2">
            <x-input-label for="foto" :value="__('Foto de empleado')" />
            <x-text-input id="foto" class="mt-1 block w-full" type="file" name="foto" :value="old('foto')" required />
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>

    </div>
</div>


        </div>
        <div style="text-align: center;" class="mt-4">
           <x-primary-button class="ms-4 ">
                Registrar
            </x-primary-button>
           
            <a href="{{ route('index-employees') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Cancelar
            </a>
        </div>
    </form>
</x-guest-layout>