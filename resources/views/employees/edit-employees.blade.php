<x-guest-layout>
    <form method="POST" action="{{ route('edit-employees', $empleados->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                EMPLEADO
            </div>
        <div class="mt-2 flex justify-center items-center h-full">
            <img class="flex justify-center items-center h-full w-150" src="{{ asset('storage/' . $empleados->foto) }}" alt="Imagen de empleado" width="150">
                            </td>
        </div>
        <div>
            <x-input-label for="Nombre" :value="__('Nombre de empleado')" />
            <x-text-input id="Nombre" class="block mt-1 w-full" type="text" name="Nombre"  value="{{ $empleados->Nombre }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"  value="{{ $empleados->apellidos }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="curp" :value="__('CURP')" />
            <x-text-input id="curp" class="block mt-1 w-full" type="text" name="curp"  value="{{ $empleados->curp }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="organizacion" :value="__('Organización')" />
            <x-text-input id="organizacion" class="block mt-1 w-full" type="text" name="organizacion"  value="{{ $empleados->organizacion }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="cargo" :value="__('Cargo')" />
            <x-text-input id="cargo" class="block mt-1 w-full" type="text" name="cargo"  value="{{ $empleados->cargo }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="correoElectronico" :value="__('Correo Electronico')" />
            <x-text-input id="correoElectronico" class="block mt-1 w-full" type="email" name="correoElectronico"  value="{{ $empleados->correoElectronico }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="numeroTelefonoTrabajo" :value="__('Número del trabajo')" />
            <x-text-input id="numeroTelefonoTrabajo" class="block mt-1 w-full" type="text" name="numeroTelefonoTrabajo"  value="{{ $empleados->numeroTelefonoTrabajo }}" required />
        </div>
         <div class="mt-4">
           <x-input-label for="numeroTelParti" :value="__('Número particular')" />
            <x-text-input id="numeroTelParti" class="block mt-1 w-full" type="text" name="numeroTelParti"  value="{{ $empleados->numeroTelParti }}" required />
        </div>
         <div class="mt-4">
           <x-input-label for="sueldo" :value="__('Sueldo $')" />
            <x-text-input id="sueldo" class="block mt-1 w-full" type="text" name="sueldo"  value="{{ $empleados->sueldo }}" required />
        </div>
         <div class="mt-4">
           <x-input-label for="calle" :value="__('Calle')" />
            <x-text-input id="calle" class="block mt-1 w-full" type="text" name="calle"  value="{{ $empleados->calle }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="ciudad" :value="__('Ciudad')" />
            <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad"  value="{{ $empleados->ciudad }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="estadoProv" :value="__('Estado/Provincia')" />
            <x-text-input id="estadoProv" class="block mt-1 w-full" type="text" name="estadoProv"  value="{{ $empleados->estadoProv }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="codigoPostal" :value="__('Codigo Postal')" />
            <x-text-input id="codigoPostal" class="block mt-1 w-full" type="text" name="codigoPostal"  value="{{ $empleados->codigoPostal }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="pais" :value="__('País')" />
            <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais"  value="{{ $empleados->pais }}" required />
        </div>
        <div class="mt-4">
           <x-input-label for="tipoSangre" :value="__('Tipo de sangre')" />
            <x-text-input id="tipoSangre" class="block mt-1 w-full" type="text" name="tipoSangre"  value="{{ $empleados->tipoSangre }}" required />
        </div>
        <div class="mt-4">
        <x-input-label for="foto" :value="('Foto del empleado')"/>
            <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" value="{{$empleados->foto}}" required/>
        </div>
         <div style="text-align: center;" class="mt-4">
            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>
            <a href="{{ route('index-employees') }}" class="mt-6 ms-4 inline-block px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Cerrar') }}
            </a>
        </div>
    </form>
</x-guest-layout>