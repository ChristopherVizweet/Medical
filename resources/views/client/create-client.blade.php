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
            <div class="">
                <x-input-label for="phoneNumber_Client" :value="__('Teléfono de la empresa')" />
                <x-text-input
                    maxlength="10"
                    data-maxlength="10"
                    id="phoneNumber_Client"
                    class="block mt-1 w-full"
                    placeholder="Ej. 5566334455"
                    autocomplete="off"
                    type="tel"
                    name="phoneNumber_Client"
                    :value="old('phoneNumber_Client')"
                    required
                    oninput="validateLength(this, 10, 'phoneNumber_Client_error')"
                />
                <p id="phoneNumber_Client_error" class="mt-2 text-sm text-red-600 hidden">No puede tener más de 10 caracteres</p>
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

           <!-- Constancia Fiscal -->
<div class="mt-4">
    <x-input-label for="constancia_fiscal" :value="__('Constancia Fiscal')" />

    <div class="mt-1">
        <label
            for="constancia_fiscal"
            class="flex w-full cursor-pointer items-center justify-between rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm transition duration-200 hover:border-slate-400 hover:bg-slate-50 focus-within:border-slate-500 focus-within:ring-2 focus-within:ring-slate-200"
        >
            <span id="constancia_fiscal_label" class="truncate font-medium text-slate-600">
                Seleccionar archivo PDF
            </span>

            <span class="ml-3 inline-flex items-center rounded-md border border-slate-300 bg-slate-100 px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[0.08em] text-slate-700">
                PDF
            </span>

            <input
                id="constancia_fiscal"
                type="file"
                name="constancia_fiscal"
                
                class="sr-only"
                onchange="document.getElementById('constancia_fiscal_label').textContent = this.files && this.files[0] ? this.files[0].name : 'Seleccionar archivo PDF';"
            />
        </label>
    </div>

    <x-input-error :messages="$errors->get('constancia_fiscal')" class="mt-2" />
</div>
            
        </div>
         <h1 class="text-center text-black bg-blue-400">CONTACTO PRINCIPAL</h1>
        <div class="mb-9 grid grid-cols-3 md:grid-cols-3 gap-4 mt-6">
            <!-- SUPERVISOR -->
            <div class="mt-4">
                <x-input-label for="supervisor" :value="__('Nombre del project manager')" />
                <x-text-input id="supervisor" class="block mt-1 w-full" autocomplete="off" type="text" name="supervisor" :value="old('supervisor')"  />
                <x-input-error :messages="$errors->get('supervisor')" class="mt-2" />
            </div>
            <!-- CORREO SUPERVISOR -->
            <div class="mt-4">
                <x-input-label for="email_supervisor" :value="__('Correo del project manager')" />
                <x-text-input  id="email_supervisor" class="block mt-1 w-full" autocomplete="off" type="email" name="email_supervisor" :value="old('email_supervisor')"  />
                <x-input-error :messages="$errors->get('email_supervisor')" class="mt-2" />
            </div>
             <!-- TELEFONO SUPERVISOR -->
            <div class="mt-4">
                <x-input-label for="telefono_supervisor" :value="__('Teléfono del project manager')" />
                <x-text-input
                    maxlength="10"
                    data-maxlength="10"
                    id="telefono_supervisor"
                    class="block mt-1 w-full"
                    autocomplete="off"
                    type="tel"
                    name="telefono_supervisor"
                    :value="old('telefono_supervisor')"
                    oninput="validateLength(this, 10, 'telefono_supervisor_error')"
                />
                <p id="telefono_supervisor_error" class="mt-2 text-sm text-red-600 hidden">No puede tener más de 10 caracteres</p>
                <x-input-error :messages="$errors->get('telefono_supervisor')" class="mt-2" />
            </div>
            
        </div>
        <div id="contactos-wrapper">
            <div class="contacto-item" data-contacto="1">
                <h1 class="text-center text-black bg-blue-400 contacto-titulo">CONTACTO 1</h1>
                <div class="mb-9 grid grid-cols-3 md:grid-cols-3 gap-4 mt-6">
                    <div class="mt-4">
                        <x-input-label for="contacto_1_nombre" :value="__('Nombre del contacto')" />
                        <x-text-input id="contacto_1_nombre" class="block mt-1 w-full" autocomplete="off" type="text" name="contactos[1][nombre]" :value="old('contactos.1.nombre')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="contacto_1_email" :value="__('Correo del contacto')" />
                        <x-text-input id="contacto_1_email" class="block mt-1 w-full" autocomplete="off" type="email" name="contactos[1][email]" :value="old('contactos.1.email')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="contacto_1_telefono" :value="__('Teléfono del contacto')" />
                        <x-text-input
                            maxlength="10"
                            data-maxlength="10"
                            id="contacto_1_telefono"
                            class="block mt-1 w-full"
                            autocomplete="off"
                            type="tel"
                            name="contactos[1][telefono]"
                            :value="old('contactos.1.telefono')"
                            oninput="validateLength(this, 10, 'contacto_1_telefono_error')"
                        />
                        <p id="contacto_1_telefono_error" class="mt-2 text-sm text-red-600 hidden">No puede tener más de 10 caracteres</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 flex items-center justify-end gap-3">
            <button type="button" id="agregar-contacto" class="inline-flex items-center rounded-md border border-indigo-600 bg-indigo-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                + Agregar contacto
            </button>
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

    <script>
        function validateLength(input, maxLength, errorId) {
            const error = document.getElementById(errorId);
            if (!error) return;

            if (input.value.length > maxLength) {
                error.classList.remove('hidden');
                input.classList.add('border-red-500');
            } else {
                error.classList.add('hidden');
                input.classList.remove('border-red-500');
            }
        }

        const wrapper = document.getElementById('contactos-wrapper');
        const addButton = document.getElementById('agregar-contacto');
        let contactoIndex = 1;

        const syncContactTitles = () => {
            const items = [...wrapper.querySelectorAll('.contacto-item')];
            items.forEach((item, index) => {
                item.dataset.contacto = index + 1;
                const title = item.querySelector('.contacto-titulo');
                if (title) {
                    title.textContent = `CONTACTO ${index + 1}`;
                }
            });
            contactoIndex = items.length;
        };

        const createContactoTemplate = (index) => {
            const item = document.createElement('div');
            item.className = 'contacto-item mt-6';
            item.dataset.contacto = index;
            item.innerHTML = `
                <div class="mb-2 flex items-center justify-between">
                    <h1 class="text-center text-black bg-blue-400 px-4 py-2 contacto-titulo">CONTACTO ${index}</h1>
                    <button type="button" class="remove-contacto rounded-md border border-red-300 bg-red-50 px-3 py-1.5 text-xs font-semibold uppercase tracking-widest text-red-600 transition hover:bg-red-100">
                        Eliminar
                    </button>
                </div>
                <div class="mb-9 grid grid-cols-3 md:grid-cols-3 gap-4 mt-2">
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="contacto_${index}_nombre">Nombre del contacto</label>
                        <input id="contacto_${index}_nombre" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" autocomplete="off" type="text" name="contactos[${index}][nombre]" />
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="contacto_${index}_email">Correo del contacto</label>
                        <input id="contacto_${index}_email" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" autocomplete="off" type="email" name="contactos[${index}][email]" />
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700" for="contacto_${index}_telefono">Teléfono del contacto</label>
                        <input id="contacto_${index}_telefono" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" maxlength="10" autocomplete="off" type="tel" name="contactos[${index}][telefono]" oninput="validateLength(this, 10, 'contacto_${index}_telefono_error')" />
                        <p id="contacto_${index}_telefono_error" class="mt-2 hidden text-sm text-red-600">No puede tener más de 10 caracteres</p>
                    </div>
                </div>
            `;
            return item;
        };

        addButton.addEventListener('click', () => {
            contactoIndex += 1;
            const newItem = createContactoTemplate(contactoIndex);
            wrapper.appendChild(newItem);

            const removeButton = newItem.querySelector('.remove-contacto');
            removeButton.addEventListener('click', () => {
                newItem.remove();
                syncContactTitles();
            });
        });

        syncContactTitles();
    </script>
</x-guest-layout>