<x-guest-layout>
    <form method="POST" action="{{ route('edit-employees', $empleados->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                EMPLEADO
            </div>
       <div class="mt-4 justify-center justify-items-center text-center">
    <x-input-label for="foto" value="('Foto del empleado')"/>
    <x-text-input id="foto"  class="block mt-1 w-full justify-center justify-items-center text-center" type="file" name="foto" value/>
    <input type="hidden" name="foto_actual" value="{{ $empleados->foto }}">
            </div> 

<!-- Mostrar imagen actual -->
@if ($empleados->foto)
    <div class="mt-2 justify-center justify-items-center text-center">
        <p class="text-sm text-gray-600 dark:text-gray-300 text-center">Imagen actual:</p>
        <img src="{{ asset('storage/' . $empleados->foto) }}" alt="Foto actual" class="w-40 h-40 object-cover rounded justify-items-center">
    </div>
@endif
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
        <div>
            <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento"  value="{{ $empleados->fecha_nacimiento }}" required />
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
        <div>
             <x-input-label for="talla_pantalon" :value="__('Talla de pantalón')" />
             <x-text-input id="talla_pantalon" class="block mt-1 w-full" type="text" name="talla_pantalon"  value="{{ $empleados->talla_pantalon }}" required />
        </div>
        <div>
            <x-input-label for="talla_camisa" :value="__('Talla de camisa')" />
            <select name="talla_camisa" id="talla_camisa" value="{{ $empleados->talla_camisa }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" >
                <option value="">--Selecciona una talla de camisa--</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </div>
        <div>
             <x-input-label for="talla_calzado" :value="__('Talla de calzado')" />
            <select name="talla_calzado" id="talla_calzado" value="{{ $empleados->talla_calzado }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" >
                <option value="">--Selecciona una talla de calzado--</option>
                <option value="S">22</option>
                <option value="M">22.5</option>
                <option value="L">23</option>
                <option value="XL">23.5</option>
                <option value="XXL">24</option>
                <option value="XXL">24.5</option>
                <option value="XXL">25</option>
                <option value="XXL">25.5</option>
                <option value="XXL">26</option>
                <option value="XXL">26.5</option>
                <option value="XXL">27</option>
                <option value="XXL">27.5</option>
                <option value="XXL">28</option>
                <option value="XXL">28.5</option>
            </select>
        </div>
        <div>
             <x-input-label for="fecha_vacaciones" :value="__('Fecha de vacaciones')" />
             <x-text-input id="fecha_vacaciones" class="block mt-1 w-full" type="date" name="fecha_vacaciones" value="{{ $empleados->fecha_vacaciones }}" required />
        </div>
        <div>
             <x-input-label for="observaciones_empleado" :value="__('Observaciones del empleado')" />
             <x-text-input id="observaciones_empleado" class="block mt-1 w-full" type="text" name="observaciones_empleado" value="{{ $empleados->observaciones_empleado }}" required />
        </div>
        <div class="text-center">
            <x-input-label for="certificados_empleados" value="Certificados del empleado"/>
            @if ($empleados->certificados_empleados)
                <span class="text-green-700 font-semibold">Cuenta con capacitaciones/certificados</span>
            @else
                <span class="text-red-700 font-semibold">Sin capacitaciones/certificados</span>
            @endif
        </div>
        <div class="mt-4 justify-center justify-items-center text-center">
            <x-input-label for="certificados_empleados" value="Agregar o actualizar certificados del empleado"/>
            <x-text-input id="certificados_empleados"  class="block mt-1 w-full justify-center justify-items-center text-center" type="file" name="certificados_empleados" value/>
            <input class="text-center" type="hidden" name="certificados_actual" value="{{ $empleados->certificados_empleados }}">
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
    {{---Aqui es para mostrar los errores del sistema---}}

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
</x-guest-layout>