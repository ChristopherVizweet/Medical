<x-guest-layout>
    <form method="POST" action="{{ route('edit-user', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <div class="text-center text-gray-800 dark:text-white">
                EDITAR USUARIO
            </div>
            <x-input-label for="name" :value="__('Nombre del usuario')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required />
        </div>
        <div class="mt-4">
            <x-input-label for="ap_user" :value="__('Apellido Paterno')" />
            <x-text-input id="ap_user" class="block mt-1 w-full" type="text" name="ap_user" value="{{ $user->ap_user }}" required />
        </div>
        <div class="mt-4">
            <x-input-label for="am_user" :value="__('Apellido Materno')" />
            <x-text-input id="am_user" class="block mt-1 w-full" type="text" name="am_user" value="{{ $user->am_user }}" required />
        </div>
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
        </div>
        <div class="mt-4">
            <x-input-label for="role" :value="__('Rol')" />
            <select name="role" id="role" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="">Selecciona un rol</option>
                <option value="superadmin">Superadmin</option>
                <option value="admin">Admin</option>
                <option value="ventas">Ventas</option>
                <option value="almacen">Almacén</option>
            </select>
        </div>
        <div style="text-align: center;" class="mt-4">
            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>

            <a href="{{ route('index-user') }}" class="ms-4 inline-block px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Cancelar') }}
            </a>
        </div>
    </form>
</x-guest-layout>
