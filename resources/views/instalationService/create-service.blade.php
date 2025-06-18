
<x-guest-layout>  
    <form method="POST" action="{{ route('store-service') }}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                REGISTRAR SERVICIO DE INSTALACIÓN
            </div>
            <x-input-label  for="nameInstalation" :value="__('Nombre del servicio de instalación')" />
            <x-text-input id="nameInstalation" class="block mt-1 w-full is-invalid " autocomplete="off" type="text" name="nameInstalation" :value="old('nameInstalation')" required />
            <x-input-error :messages="$errors->get('nameInstalation')" class="mt-2 is-invalid" />
        </div>
        <input type="hidden" name="redirect_to" value="{{ url()->previous() }}">
        <div style="text-align: center;" class="mt-4">
           <x-primary-button class="ms-4 ">
                Registrar
            </x-primary-button>
           
            <a href="{{ route('index-service') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Cancelar
            </a>
        </div>
    </form>
</x-guest-layout>

