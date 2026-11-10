<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Detalle del cliente
            </h2>
            <a href="{{ route('index-client') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                Volver a clientes
            </a>
        </div>
    </x-slot>

    <div class="mx-auto mt-6 max-w-5xl px-4 pb-8 sm:px-6 lg:px-8">
        <section class="overflow-hidden rounded-lg bg-white shadow dark:bg-gray-800">
            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $client->name_Client }}</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">RFC: {{ $client->RFC }}</p>
            </div>

            <div class="space-y-8 p-6">
                <section>
                    <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Datos del cliente</h3>
                    <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $client->name_Client ?: 'Sin dato' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Ubicación</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $client->address_Client ?: 'Sin dato' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Teléfono</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $client->phoneNumber_Client ?: 'Sin dato' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Correo electrónico</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $client->email_Client ?: 'Sin dato' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">RFC</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $client->RFC ?: 'Sin dato' }}</dd>
                        </div>
                    </dl>
                </section>

                <section class="border-t border-gray-200 pt-6 dark:border-gray-700">
                    <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Contacto Principal</h3>
                    <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $client->supervisor ?: 'Sin dato' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Correo</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $client->email_supervisor ?: 'Sin dato' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Teléfono</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $client->telefono_supervisor ?: 'Sin dato' }}</dd>
                        </div>
                    </dl>
                </section>

               <!-- <section class="border-t border-gray-200 pt-6 dark:border-gray-700">
                    <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Contacto principal</h3>
                    <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{ $client->encargado ?: 'Sin dato' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Correo</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{ $client->email_encargado ?: 'Sin dato' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Teléfono</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{ $client->telefono_encargado ?: 'Sin dato' }}</dd>
                        </div>
                    </dl>
                </section> -->

                <section class="border-t border-gray-200 pt-6 dark:border-gray-700">
                    <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Contactos adicionales</h3>
                    @forelse ($client->contactos ?? [] as $contacto)
                        <article class="mb-4 rounded-lg border border-gray-200 p-4 last:mb-0 dark:border-gray-700">
                            <h4 class="mb-3 font-semibold text-gray-800 dark:text-gray-100">Contacto {{ $loop->iteration }}</h4>
                            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $contacto['nombre'] ?? 'Sin dato' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Correo</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $contacto['email'] ?? 'Sin dato' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Teléfono</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $contacto['telefono'] ?? 'Sin dato' }}</dd>
                                </div>
                            </dl>
                        </article>
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">No hay contactos adicionales registrados.</p>
                    @endforelse
                </section>
            </div>

            <div class="flex justify-end border-t border-gray-200 bg-gray-50 px-6 py-4 dark:border-gray-700 dark:bg-gray-900">
                <a href="{{ route('edit_client', $client->id) }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Editar cliente
                </a>
            </div>
        </section>
    </div>
</x-app-layout>
