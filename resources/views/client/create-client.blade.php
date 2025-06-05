<x-guest-layout>
    <form method="POST" action="{{ route('store_client') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name_Client" :value="__('Nombre')" />
            <x-text-input id="name_Client" class="block mt-1 w-full" type="text" name="name_Client" :value="old('name_Client')" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('name_client')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address_Client" :value="__('Dirección')" />
            <x-text-input id="address_Client" class="block mt-1 w-full" autocomplete="off" type="text" name="address_Client" :value="old('address_Client')" required />
            <x-input-error :messages="$errors->get('address_Client')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phoneNumber_Client" :value="__('Teléfono')" />
            <x-text-input id="phoneNumber_Client" class="block mt-1 w-full" autocomplete="off" type="tel" name="phoneNumber_Client" :value="old('phoneNumber_Client')" required />
            <x-input-error :messages="$errors->get('phoneNumber_Client')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email_Client" :value="__('Email')" />
            <x-text-input id="email_Client" class="block mt-1 w-full" autocomplete="off" type="email" name="email_Client" :value="old('email_Client')" required />
            <x-input-error :messages="$errors->get('email_Client')" class="mt-2" />
        </div>

        <!-- RFC -->
        <div class="mt-4">
            <x-input-label for="RFC" :value="__('RFC')" />
            <x-text-input id="RFC" class="block mt-1 w-full" autocomplete="off" type="text" name="RFC" :value="old('RFC')" required />
            <x-input-error :messages="$errors->get('RFC')" class="mt-2" />
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
