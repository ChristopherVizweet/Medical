<x-guest-layout>
    <form method="POST" action="{{ route('edit_client', $client->id) }}">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                EDITAR CLIENTE
            </div>
            <x-input-label for="name_Client" :value="__('Nombre')" />
            <x-text-input id="name_Client" class="block mt-1 w-full" type="text" name="name_Client" value="{{ $client->name_Client }}" required />
        </div>
        <div class="mt-4">
            <x-input-label for="address_Client" :value="__('Dirección')" />
            <x-text-input id="address_Client" class="block mt-1 w-full" type="text" name="address_Client" value="{{ $client->address_Client }}" required />
        </div>
        <div class="mt-4">
            <x-input-label for="email_Client" :value="__('Email')" />
            <x-text-input id="email_Client" class="block mt-1 w-full" type="email" name="email_Client" value="{{ $client->email_Client }}" required />
        </div>

        <div class="mt-4">
            <x-input-label for="phoneNumber_Client" :value="__('Número telefónico')" />
            <x-text-input id="phoneNumber_Client" class="block mt-1 w-full" type="tel" name="phoneNumber_Client" value="{{ $client->phoneNumber_Client }}" required />
        </div>
        <div class="mt-4">
            <x-input-label for="RFC" :value="__('RFC')" />
            <x-text-input id="RFC" class="block mt-1 w-full" type="text" name="RFC" value="{{ $client->RFC }}" required />
        </div>

        <div style="text-align: center;" class="mt-4">
            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>

            <a href="{{ route('index-client') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Cancelar') }}
            </a>
        </div>
    </form>
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