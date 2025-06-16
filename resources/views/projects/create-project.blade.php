<x-guest-layout>
    <form method="POST" action="{{ route('store-project') }}" enctype="multipart/form-data">
        @csrf

        <div class="text-center text-gray-800 dark:text-white">
            <h1 class="text-2xl font-bold">NUEVO PROYECTO</h1>
        </div><br>

        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg max-w-6xl mx-auto space-y-6">
            
            {{-- Información General --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Información del Proyecto</h2>

                  <div class="">
                        <x-input-label for="folioProject" :value="__('Folio del proyecto')" />
                        <x-text-input  id="folioProject" class="mt-1 block w-full" type="text" name="folioProject" :value="old('folioProject')" required />
                        <x-input-error :messages="$errors->get('folioProject')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="nameProject" :value="__('Nombre del proyecto')" />
                        <x-text-input id="nameProject" class="mt-1 block w-full" type="text" name="nameProject" :value="old('nameProject')" required />
                        <x-input-error :messages="$errors->get('nameProject')" class="mt-2" />
                    </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> <!---AQUI COMIENZA EL ESTILO DE LOS CAMPOS-->

                    <div>
                         <x-input-label for="id_client" :value="__('Cliente')" />
                       <select class="mt-1 block w-full" name="id" id="id" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name_Client }}</option><br>
                @endforeach
            </select>
                    </div>

                    <div>
                        <x-input-label for="company" :value="__('Empresa encargada')" />
                       <select class="mt-1 block w-full" name="id" id="id" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->nameCompany }}</option><br>
                @endforeach
            </select>
                    </div>

                    
                         <div>
                            <x-input-label for="id_Client" :value="__('Vendedor')" />
                       <select class="mt-1 block w-full" name="id" id="id" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option><br>
                @endforeach
            </select>
                    </div>
                    

                    <div>
                         <x-input-label for="inCharge_id_usuario" :value="__('Encargado')" />
                       <select class="mt-1 block w-full" name="id" id="id" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option><br>
                @endforeach
            </select>
                    </div>

                    <div>
                        <x-input-label for="company" :value="__('Prioridad')" />
                       <select class="mt-1 block w-full" name="id" id="id" required>
                <option value="">-Seleccionar-</option> 
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->namePriority }}</option><br>
                @endforeach
            </select>
                    </div>

                </div>
            </div>

            {{-- Fechas --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Fechas</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                    <div>
                        <x-input-label for="requestDate" :value="__('Fecha de solicitud')" />
                        <x-text-input id="requestDate" class="mt-1 block w-full" type="date" name="requestDate" :value="old('requestDate')" required />
                        <x-input-error :messages="$errors->get('requestDate')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="dateBegin" :value="__('Fecha de inicio')" />
                        <x-text-input id="dateBegin" class="mt-1 block w-full" type="date" name="dateBegin" :value="old('dateBegin')" required />
                        <x-input-error :messages="$errors->get('dateBegin')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="estimateDate" :value="__('Fecha estimada')" />
                        <x-text-input id="estimateDate" class="mt-1 block w-full" type="date" name="estimateDate" :value="old('estimateDate')" required />
                        <x-input-error :messages="$errors->get('estimateDate')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="authorizedDate" :value="__('Fecha autorizada')" />
                        <x-text-input id="authorizedDate" class="mt-1 block w-full" type="date" name="authorizedDate" :value="old('authorizedDate')" required />
                        <x-input-error :messages="$errors->get('authorizedDate')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="dateEnd" :value="__('Fecha de finalización')" />
                        <x-text-input id="dateEnd" class="mt-1 block w-full" type="date" name="dateEnd" :value="old('dateEnd')" required />
                        <x-input-error :messages="$errors->get('dateEnd')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="finishDate" :value="__('Fecha de terminación')" />
                        <x-text-input id="finishDate" class="mt-1 block w-full" type="date" name="finishDate" :value="old('finishDate')" required />
                        <x-input-error :messages="$errors->get('finishDate')" class="mt-2" />
                    </div>
                </div>
            </div>

            {{-- Servicios Autorizados --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Servicio Autorizado</h2>
                <div class="grid grid-cols-2 gap-2 dark:text-white">
                    @foreach([
                        'Instalación de gases medicinales',
                        'Instalación de equipo médico',
                        'Instalación de gases especiales',
                        'Suministro de gases',
                        'Suministro de equipo médico',
                        'Mantenimiento de instalaciones de gas',
                        'Mantenimiento de equipo médico'
                    ] as $service)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="authorized_services[]" value="{{ $service }}" class="rounded">
                            <span>{{ $service }}</span>
                        </label>
                    @endforeach
                    <label class="flex flex-col">
                        <span>Otro:</span>
                        <input type="text" name="other_service" class="rounded border-gray-300 dark:bg-white dark:text-white">
                    </label>
                </div>
            </div>

            {{-- Mano de Obra --}}
            <div class="border p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4 dark:text-white">Mano de Obra</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="id_empleado" :value="__('Empleado')" />
                        <x-text-input id="id_empleado" class="mt-1 block w-full" type="text" name="id_empleado" :value="old('id_empleado')" required />
                        <x-input-error :messages="$errors->get('id_empleado')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="jornadas" :value="__('Jornadas')" />
                        <x-text-input id="jornadas" class="mt-1 block w-full" type="text" name="jornadas" :value="old('jornadas')" required />
                        <x-input-error :messages="$errors->get('jornadas')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="salario" :value="__('Salario')" />
                        <x-text-input id="salario" class="mt-1 block w-full" type="number" step="0.01" name="salario" :value="old('salario')" required />
                        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="totalSalario" :value="__('Salario Total')" />
                        <x-text-input id="totalSalario" class="mt-1 block w-full" type="number" step="0.01" name="totalSalario" :value="old('totalSalario')" required />
                        <x-input-error :messages="$errors->get('totalSalario')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="totalManoObra" :value="__('Total de mano de obra')" />
                        <x-text-input id="totalManoObra" class="mt-1 block w-full" type="number" step="0.01" name="totalManoObra" :value="old('totalManoObra')" required />
                        <x-input-error :messages="$errors->get('totalManoObra')" class="mt-2" />
                    </div>
                </div>
            </div>

            {{-- Botones --}}
            <div class="text-center">
                <x-primary-button class="ms-4">Registrar</x-primary-button>
                <a href="{{ route('index-project') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                    Cancelar
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
