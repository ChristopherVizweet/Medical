<x-guest-layout>
    <form method="POST" action="{{ route('create-user') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre del usuario')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="ap_user" :value="__('Apellido Paterno')" />
            <x-text-input id="ap_user" class="block mt-1 w-full" autocomplete="off" type="text" name="ap_user" :value="old('ap_user')" required />
            <x-input-error :messages="$errors->get('ap_user')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="am_user" :value="__('Apellido Materno')" />
            <x-text-input id="am_user" class="block mt-1 w-full" autocomplete="off" type="text" name="am_user" :value="old('am_user')" required />
            <x-input-error :messages="$errors->get('am_user')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" autocomplete="off" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- RFC -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" autocomplete="off" type="text" name="password" :value="old('password')" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
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
