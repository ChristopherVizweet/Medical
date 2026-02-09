<x-guest-layout>
    
    <form method="POST" action="{{ route('store_supplier') }}">
        @csrf
    <div class="text-center text-gray-800 dark:text-white">
                REGISTRAR PROVEEDOR
    </div>
    <div class="grid grid-cols-2 md:grid-cols-2 gap-2">
        <!-- Nombre de la empresa -->
        <div class="mt-4">
            <x-input-label  for="name_supplier" :value="__('Nombre')" />
            <x-text-input id="name_supplier" class="block mt-1 w-full is-invalid " autocomplete="off" type="text" name="name_supplier" :value="old('name_supplier')" required />
            <x-input-error :messages="$errors->get('Escriba el nombre del proveedor')" class="mt-2 is-invalid" />
        </div>

        <!-- Nombre del encargado -->
        <div class="mt-4">
            <x-input-label  for="encargado_suppliers" :value="__('Nombre del encargado')" />
            <x-text-input id="encargado_suppliers" class="block mt-1 w-full is-invalid " autocomplete="off" type="text" name="encargado_suppliers" :value="old('encargado_suppliers')"  />
            <x-input-error :messages="$errors->get('Escriba el nombre del encargado')" class="mt-2 is-invalid" />
        </div>

        <!-- RFC de proveedor -->
        <div class="mt-4">
            <x-input-label  for="rfc_supplier" :value="__('RFC del proveedor')" />
            <x-text-input id="rfc_supplier" class="block mt-1 w-full is-invalid " autocomplete="off" type="text" name="rfc_supplier" :value="old('rfc_supplier')"  />
            <x-input-error :messages="$errors->get('Escriba el rfc del proveedor')" class="mt-2 is-invalid" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email_supplier" :value="__('Email')" />
            <x-text-input id="email_supplier" class="block mt-1 w-full" type="email" name="email_supplier" :value="old('email_supplier')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('email_supplier')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phoneNumber_supplier" :value="__('Número telefonico')" />
            <x-text-input id="phoneNumber_supplier" class="block mt-1 w-full" autocomplete="off" type="number" name="phoneNumber_supplier" :value="old('phoneNumber_supplier')" required placeholder="Ej. 5532581234" />
            <x-input-error :messages="$errors->get('phoneNumber_supplier')" class="mt-2" />
        </div>
</div>
<div style="text-align: center;" class="mt-4">
           <x-primary-button class="ms-4 ">
                Registrar
            </x-primary-button>
           
            <a href="{{ route('index_Supplier') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Cancelar
            </a>
        </div>
    </form>
</x-guest-layout>

