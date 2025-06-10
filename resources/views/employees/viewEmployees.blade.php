<x-guest-layout>
    <form method="POST" action="{{ route('viewEmployees', $empleados->id) }}">
        @csrf
        @method('PUT')

       
    <div class="max-w-4xl mx-auto mt-10 p-8 bg-white dark:bg-gray-900 shadow-lg rounded-2xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-6">Perfil del Empleado</h2>

        <div class="flex flex-col items-center mb-8">
            <img class="rounded-full border-4 border-gray-300 dark:border-gray-700 shadow-md w-36 h-36 object-cover" 
                 src="{{ asset('storage/' . $empleados->foto) }}" 
                 alt="Imagen de empleado">
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <x-form-group label="Nombre de empleado" value="{{ $empleados->Nombre }}" />
            <x-form-group label="Apellidos" value="{{ $empleados->apellidos }}" />
            <x-form-group label="Organización" value="{{ $empleados->organizacion }}" />
            <x-form-group label="Cargo" value="{{ $empleados->cargo }}" />
            <x-form-group label="Correo Electrónico" value="{{ $empleados->correoElectronico }}" />
            <x-form-group label="Número del trabajo" value="{{ $empleados->numeroTelefonoTrabajo }}" />
            <x-form-group label="Número particular" value="{{ $empleados->numeroTelParti }}" />
            <x-form-group label="Sueldo $" value="{{ $empleados->sueldo }}" />
            <x-form-group label="Calle" value="{{ $empleados->calle }}" />
            <x-form-group label="Ciudad" value="{{ $empleados->ciudad }}" />
            <x-form-group label="Estado/Provincia" value="{{ $empleados->estadoProv }}" />
            <x-form-group label="Código Postal" value="{{ $empleados->codigoPostal }}" />
            <x-form-group label="País" value="{{ $empleados->pais }}" />
            <x-form-group label="Tipo de sangre" value="{{ $empleados->tipoSangre }}" />
        </div>
        <div class="flex justify-center mt-8">
         <a href="{{ route('edit-employees', $empleados->id) }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-300 transition duration-200">Editar</a> |
            <a href="{{ route('index-employees') }}" 
               class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200">
                Cerrar
            </a>
        </div>
    </div>
</x-guest-layout>
