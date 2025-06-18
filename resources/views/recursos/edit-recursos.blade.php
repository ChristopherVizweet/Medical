<x-guest-layout>
    <form method="POST" action="{{ route('edit-priority', $recursos->id) }}">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                EDITAR RECURSO
            </div>
            <x-input-label for="recursosObtenidos" :value="__('Titulo de prioridad')" />
            <x-text-input id="recursosObtenidos" class="block mt-1 w-full" type="text" name="recursosObtenidos" value="{{ $recursos->recursosObtenidos }}" required />
        </div>
        <div style="text-align: center;" class="mt-4">
            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>

            <a href="{{ route('index-priority') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Cancelar') }}
            </a>
        </div>
    </form>
</x-guest-layout>
