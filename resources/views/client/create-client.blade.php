<x-guest-layout>
    <form method="POST" action="{{ route('store_client') }}">
        @csrf
         <div class="text-center font-semibold text-gray-800 dark:text-white">
                REGISTRO DE CLIENTE
            </div>
        <div class="mb-9 grid grid-cols-3 md:grid-cols-3 gap-4 mt-6">
            <!-- Name -->
            <div>
                <x-input-label for="name_Client" :value="__('Nombre')" />
                <x-text-input id="name_Client" class="block mt-1 w-full" type="text" name="name_Client" :value="old('name_Client')" required autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('name_client')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="">
                <x-input-label for="address_Client" :value="__('Ubicación')" />
                <x-text-input id="address_Client" class="block mt-1 w-full" autocomplete="off" type="text" name="address_Client" :value="old('address_Client')"  />
                <x-input-error :messages="$errors->get('address_Client')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phoneNumber_Client" :value="__('Teléfono de la empresa')" />
                <x-text-input maxlength="10" id="phoneNumber_Client" class="block mt-1 w-full" placeholder="Ej. 5566334455" autocomplete="off" type="tel" name="phoneNumber_Client" :value="old('phoneNumber_Client')" required />
                <x-input-error :messages="$errors->get('phoneNumber_Client')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email_Client" :value="__('Email de la empresa')" />
                <x-text-input id="email_Client" class="block mt-1 w-full" autocomplete="off" type="email" name="email_Client" :value="old('email_Client')"  />
                <x-input-error :messages="$errors->get('email_Client')" class="mt-2" />
            </div>

            <!-- RFC -->
            <div class="mt-4">
                <x-input-label for="RFC" :value="__('RFC de la empresa')" />
                <x-text-input maxlength="13" id="RFC" class="block mt-1 w-full" autocomplete="off" type="text" name="RFC" :value="old('RFC')"  />
                <x-input-error :messages="$errors->get('RFC')" class="mt-2" />
            </div>
            
        </div>
         <h1 class="text-center text-black bg-blue-400">DATOS DEL SUPERVISOR</h1>
        <div class="mb-9 grid grid-cols-3 md:grid-cols-3 gap-4 mt-6">
            <!-- SUPERVISOR -->
            <div class="mt-4">
                <x-input-label for="supervisor" :value="__('Nombre del supervisor')" />
                <x-text-input id="supervisor" class="block mt-1 w-full" autocomplete="off" type="text" name="supervisor" :value="old('supervisor')"  />
                <x-input-error :messages="$errors->get('supervisor')" class="mt-2" />
            </div>
            <!-- CORREO SUPERVISOR -->
            <div class="mt-4">
                <x-input-label for="email_supervisor" :value="__('Correo del supervisor')" />
                <x-text-input  id="email_supervisor" class="block mt-1 w-full" autocomplete="off" type="email" name="email_supervisor" :value="old('email_supervisor')"  />
                <x-input-error :messages="$errors->get('email_supervisor')" class="mt-2" />
            </div>
             <!-- TELEFONO SUPERVISOR -->
            <div class="mt-4">
                <x-input-label for="telefono_supervisor" :value="__('Teléfono del supervisor')" />
                <x-text-input  id="telefono_supervisor" class="block mt-1 w-full" autocomplete="off" type="tel" name="telefono_supervisor" :value="old('telefono_supervisor')"  />
                <x-input-error :messages="$errors->get('telefono_supervisor')" class="mt-2" />
            </div>
            
        </div>
        <h1 class="text-center text-black bg-blue-400">DATOS DEL ENCARGADO</h1>
        <div class="mb-9 grid grid-cols-3 md:grid-cols-3 gap-4 mt-6">
            <!-- ENCARGADO -->
            <div class="mt-4">
                <x-input-label for="encargado" :value="__('Nombre del encargado')" />
                <x-text-input id="encargado" class="block mt-1 w-full" autocomplete="off" type="text" name="encargado" :value="old('encargado')"  />
                <x-input-error :messages="$errors->get('encargado')" class="mt-2" />
            </div>
            <!-- CORREO ENCARGADO -->
            <div class="mt-4">
                <x-input-label for="email_encargado" :value="__('Correo del encargado')" />
                <x-text-input  id="email_encargado" class="block mt-1 w-full" autocomplete="off" type="email" name="email_encargado" :value="old('email_encargado')"  />
                <x-input-error :messages="$errors->get('email_encargado')" class="mt-2" />
            </div>
             <!-- TELEFONO ENCARGADO-->
            <div class="mt-4">
                <x-input-label for="telefono_encargado" :value="__('Teléfono del encargado')" />
                <x-text-input  id="telefono_encargado" class="block mt-1 w-full" autocomplete="off" type="tel" name="telefono_encargado" :value="old('telefono_encargado')"  />
                <x-input-error :messages="$errors->get('telefono_encargado')" class="mt-2" />
            </div>
        </div>
        <!-- Submit and Cancel Buttons -->
        <div style="text-align: center;" class="mt-4">
            <x-primary-button class="ms-4">
                Registrar
            </x-primary-button>

            <a href="{{ route('index-client') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Cancelar
            </a>
        </div>
    </form>
</x-guest-layout>