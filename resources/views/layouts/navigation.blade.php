<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700"> <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 items-center h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-none flex items-center"> <a href="{{ route('dashboard') }}">
                        <x-logo-navigation class="w-20 h-20 fill-current text-gray-500" />
                </div>
                <!-- Navigation Links -->
                <div class="hidden sm:flex justify-center space-x-12">

                    <!-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Panel
                    </x-nav-link>-->
                    @hasanyrole('superadmin|admin|ventas')
                    <x-nav-link :href="route('index_Supplier')" :active="request()->routeIs('index_Supplier')">
                        Proveedores
                    </x-nav-link>
                    @endhasanyrole
                    @hasanyrole('superadmin|admin|ventas')
                    <x-nav-link :href="route('index-client')" :active="request()->routeIs('index-client')">
                        Clientes
                    </x-nav-link>
                    @endhasanyrole

                    @hasanyrole('superadmin|ventas')
                    <x-nav-link :href="route('index-project')" :active="request()->routeIs('index-project')">
                        Proyectos
                    </x-nav-link>
                    @endhasanyrole

                    @hasanyrole('superadmin')
                    <x-nav-link :href="route('index-facturas')" :active="request()->routeIs('index-facturas')">
                        Facturas
                    </x-nav-link>
                    @endhasanyrole

                    @hasanyrole('superadmin|almacen|laboratorio')
                    <x-nav-link :href="route('index-product')" :active="request()->routeIs('index-product')">
                        Gestión de Materiales
                    </x-nav-link>
                    @endhasanyrole
                    @hasanyrole('superadmin|admin|ingenieria')
                    <x-nav-link :href="route('index-existencias')" :active="request()->routeIs('index-existencias')">
                        Existencias
                    </x-nav-link>
                    @endhasanyrole
                    @role('superadmin')
                    <x-nav-link :href="route('index-employees')" :active="request()->routeIs('index-employees')">
                        Gestión de empleados
                    </x-nav-link>
                    @endrole
                    @role('superadmin')
                    <x-nav-link :href="route('index-user')" :active="request()->routeIs('index-user')">
                        Usuarios
                    </x-nav-link>
                    @endrole
                    @role('superadmin')
                    <x-nav-link :href="route('index-vehiculos')" :active="request()->routeIs('index-vehiculos')">
                        Vehículos
                    </x-nav-link>
                    @endrole
                </div>


                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-right  sm:ms-6">

                    <!-- Campana de notificaciones -->
                    @hasanyrole('admin|superadmin|laboratorio|almacen')
                    <div
                        x-data="notificationBell({{ Auth::id() }})"
                        class="relative hidden sm:flex sm:items-center sm:ms-6">
                        {{-- Botón de campana --}}
                        <button
                            type="button"
                           @click="enableSound(); open = !open"
                            class="relative inline-flex items-center justify-center p-2
               text-gray-500 dark:text-gray-300
               hover:text-gray-700 dark:hover:text-white
               hover:bg-gray-100 dark:hover:bg-gray-700
               rounded-full transition"
                            aria-label="Notificaciones">
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11
                   a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341
                   C7.67 6.165 6 8.388 6 11v3.159
                   c0 .538-.214 1.055-.595 1.436L4 17h5
                   m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>

                            {{-- Contador --}}
                            <span
                                x-show="count > 0"
                                x-cloak
                                x-text="count > 99 ? '99+' : count"
                                class="absolute -top-1 -right-1 min-w-5 h-5 px-1
                   flex items-center justify-center
                   text-xs font-bold text-white bg-red-600
                   rounded-full"></span>
                        </button>

                        {{-- Menú desplegable --}}
                        <div
                            x-show="open"
                            x-cloak
                            @click.outside="open = false"
                            x-transition
                            class="absolute right-0 top-12 z-50
               w-80 sm:w-96
               bg-white dark:bg-gray-800
               border border-gray-200 dark:border-gray-700
               rounded-lg shadow-xl overflow-hidden">
                            <div
                                class="flex items-center justify-between px-4 py-3
                   border-b border-gray-200 dark:border-gray-700">
                                <div>
                                    <h3 class="font-semibold text-gray-800 dark:text-gray-100">
                                        Notificaciones
                                    </h3>

                                    <p
                                        class="text-xs text-gray-500 dark:text-gray-400"
                                        x-text="count === 1
                        ? '1 notificación pendiente'
                        : `${count} notificaciones pendientes`"></p>
                                </div>

                                <button
                                    x-show="count > 0"
                                    @click="markAllAsRead()"
                                    type="button"
                                    class="text-xs font-medium text-blue-600
                       hover:text-blue-800 dark:text-blue-400">
                                    Marcar todas
                                </button>
                            </div>

                            <div class="max-h-96 overflow-y-auto">
                                {{-- Cargando --}}
                                <div
                                    x-show="loading"
                                    class="px-4 py-6 text-center text-sm
                       text-gray-500 dark:text-gray-400">
                                    Cargando notificaciones...
                                </div>

                                {{-- Sin notificaciones --}}
                                <div
                                    x-show="!loading && notifications.length === 0"
                                    class="px-4 py-8 text-center">
                                    <svg
                                        class="mx-auto h-9 w-9 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>

                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                        No tienes notificaciones pendientes.
                                    </p>
                                </div>

                                {{-- Lista --}}
                                <template
                                    x-for="notification in notifications"
                                    :key="notification.id ?? notification.movimiento_id">
                                    <button
                                        type="button"
                                        @click="openNotification(notification)"
                                        class="block w-full px-4 py-3 text-left
                           border-b border-gray-100 dark:border-gray-700
                           hover:bg-gray-50 dark:hover:bg-gray-700
                           transition">
                                        <div class="flex gap-3">
                                            <div
                                                class="flex-none w-9 h-9 rounded-full
                                   bg-blue-100 dark:bg-blue-900
                                   flex items-center justify-center">
                                                <svg
                                                    class="w-5 h-5 text-blue-600 dark:text-blue-300"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6
                                       a2 2 0 00-2 2v7
                                       m16 0v5a2 2 0 01-2 2H6
                                       a2 2 0 01-2-2v-5
                                       m16 0h-3.586
                                       a1 1 0 00-.707.293l-2.414 2.414
                                       a1 1 0 01-.707.293h-1.172
                                       a1 1 0 01-.707-.293l-2.414-2.414
                                       A1 1 0 007.586 13H4" />
                                                </svg>
                                            </div>

                                            <div class="min-w-0">
                                                <p
                                                    class="text-sm font-semibold
                                       text-gray-800 dark:text-gray-100"
                                                    x-text="notification.titulo"></p>

                                                <p
                                                    class="mt-1 text-sm
                                       text-gray-600 dark:text-gray-300"
                                                    x-text="notification.mensaje"></p>

                                                <p
                                                    class="mt-1 text-xs
                                       text-gray-400 dark:text-gray-500"
                                                    x-text="notification.created_at"></p>
                                            </div>
                                        </div>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                    @endhasanyrole






                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-right px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>

                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-24 flex justify-end sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index_Supplier')" :active="request()->routeIs('index_Supplier')">
                {{ __('Proveedores') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index-client')" :active="request()->routeIs('index-client')">
                {{ __('Clientes') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index-project')" :active="request()->routeIs('index-project')">
                {{ __('Proyectos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index-facturas')" :active="request()->routeIs('index-facturas')">
                {{ __('Facturas') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index-product')" :active="request()->routeIs('index-product')">
                {{ __('Gestión de Materiales') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index-existencias')" :active="request()->routeIs('index-existencias')">
                {{ __('Gestión de existencias') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index-employees')" :active="request()->routeIs('index-employees')">
                {{ __('Gestión de empleados') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index-user')" :active="request()->routeIs('index-user')">
                {{ __('Gestión de usuarios') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('index-vehiculos')" :active="request()->routeIs('index-vehiculos')">
                {{ __('Vehículos') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name   }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>