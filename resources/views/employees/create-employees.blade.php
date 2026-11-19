<x-guest-layout>
    <div class="mx-auto max-w-6xl py-6 sm:py-8">
        <form method="POST" action="{{ route('store-employees') }}" enctype="multipart/form-data" class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">
            @csrf

            <div class="bg-gradient-to-r from-slate-800 to-slate-700 px-6 py-8 text-white sm:px-8">
                <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-300">Gestión de personal</p>
                        <h1 class="mt-2 text-3xl font-bold">Registrar empleado</h1>
                        <p class="mt-2 text-sm text-slate-300">Captura los datos personales, laborales y documentos en un solo lugar.</p>
                    </div>
                    <div class="rounded-full bg-white/10 px-4 py-2 text-sm font-medium backdrop-blur">
                        Nuevo registro
                    </div>
                </div>
            </div>

            <div class="space-y-6 p-6 sm:p-8">
                <section class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                        <div class="flex flex-col items-center lg:w-1/3">
                            <div class="mb-4 flex h-32 w-32 items-center justify-center overflow-hidden rounded-full border-4 border-white bg-slate-200 shadow-md">
                                <span class="text-lg font-semibold text-slate-500">Foto</span>
                            </div>

                            <x-input-label for="foto" value="Foto del empleado" class="text-sm font-semibold text-slate-700" />
                            <x-text-input id="foto" class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="foto" />
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />

                            <div class="mt-3 w-full rounded-lg border border-dashed border-slate-300 bg-white px-4 py-3 text-center text-sm font-semibold text-amber-600">
                                Aún no hay foto registrada
                            </div>
                        </div>

                        <div class="flex-1 space-y-4">
                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <x-input-label for="Nombre" :value="__('Nombre de empleado')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="Nombre" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="Nombre" :value="old('Nombre')" autocomplete="off" />
                                    <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="apellidos" :value="__('Apellidos')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="apellidos" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="apellidos" :value="old('apellidos')" autocomplete="off" />
                                    <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <x-input-label for="curp" :value="__('CURP (obligatorio)')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="curp" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="curp" :value="old('curp')" autocomplete="off" />
                                    <x-input-error :messages="$errors->get('curp')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="fecha_nacimiento" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" />
                                    <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="fecha_ingreso" :value="__('Fecha de ingreso')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="fecha_ingreso" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date" name="fecha_ingreso" :value="old('fecha_ingreso')" />
                                    <x-input-error :messages="$errors->get('fecha_ingreso')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="grid gap-6 lg:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-slate-800">Datos laborales</h2>
                        <div class="mt-4 space-y-4">
                            <div>
                                <x-input-label for="organizacion" :value="__('Organización')" class="text-sm font-semibold text-slate-700" />
                                <select name="organizacion" id="organizacion" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">-- Seleccionar --</option>
                                    <option value="medical gas systems international" {{ old('organizacion') === 'medical gas systems international' ? 'selected' : '' }}>MGSI</option>
                                    <option value="Ascort" {{ old('organizacion') === 'Ascort' ? 'selected' : '' }}>Ascort</option>
                                    <option value="Meicon" {{ old('organizacion') === 'Meicon' ? 'selected' : '' }}>Meicon</option>
                                </select>
                                <x-input-error :messages="$errors->get('organizacion')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="cargo" :value="__('Cargo')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="cargo" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="cargo" :value="old('cargo')" autocomplete="off" />
                                <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="sueldo" :value="__('Sueldo $')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="sueldo" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="sueldo" :value="old('sueldo')" placeholder="$" autocomplete="off" />
                                <x-input-error :messages="$errors->get('sueldo')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-slate-800">Contacto</h2>
                        <div class="mt-4 space-y-4">
                            <div>
                                <x-input-label for="correoElectronico" :value="__('Correo electrónico')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="correoElectronico" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="email" name="correoElectronico" :value="old('correoElectronico')" autocomplete="off" />
                                <x-input-error :messages="$errors->get('correoElectronico')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="numeroTelefonoTrabajo" :value="__('Número telefónico de trabajo')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="numeroTelefonoTrabajo" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" maxlength="10" placeholder="Ej. 5566334455" autocomplete="off" type="tel" name="numeroTelefonoTrabajo" :value="old('numeroTelefonoTrabajo')" />
                                <x-input-error :messages="$errors->get('numeroTelefonoTrabajo')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="numeroTelParti" :value="__('Número telefónico particular')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="numeroTelParti" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" maxlength="10" placeholder="Ej. 5566334455" autocomplete="off" type="tel" name="numeroTelParti" :value="old('numeroTelParti')" />
                                <x-input-error :messages="$errors->get('numeroTelParti')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </section>

                <section class="grid gap-6 lg:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-slate-800">Dirección</h2>
                        <div class="mt-4 grid gap-4 md:grid-cols-2">
                            <div>
                                <x-input-label for="calle" :value="__('Calle')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="calle" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="calle" :value="old('calle')" autocomplete="off" />
                            </div>
                            <div>
                                <x-input-label for="ciudad" :value="__('Ciudad')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="ciudad" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="ciudad" :value="old('ciudad')" autocomplete="off" />
                            </div>
                            <div>
                                <x-input-label for="estadoProv" :value="__('Estado/Provincia')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="estadoProv" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="estadoProv" :value="old('estadoProv')" autocomplete="off" />
                            </div>
                            <div>
                                <x-input-label for="codigoPostal" :value="__('Código Postal')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="codigoPostal" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="codigoPostal" :value="old('codigoPostal')" autocomplete="off" />
                            </div>
                            <div>
                                <x-input-label for="pais" :value="__('País')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="pais" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="pais" :value="old('pais')" autocomplete="off" />
                            </div>
                            <div>
                                <x-input-label for="tipoSangre" :value="__('Tipo de sangre')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="tipoSangre" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="tipoSangre" :value="old('tipoSangre')" autocomplete="off" />
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-slate-800">Tallas y observaciones</h2>
                        <div class="mt-4 space-y-4">
                            <div>
                                <x-input-label for="talla_pantalon" :value="__('Talla de pantalón')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="talla_pantalon" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="talla_pantalon" :value="old('talla_pantalon')" placeholder="Ej. 30" />
                            </div>
                            <div>
                                <x-input-label for="talla_camisa" :value="__('Talla de camisa')" class="text-sm font-semibold text-slate-700" />
                                <select name="talla_camisa" id="talla_camisa" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">-- Seleccionar --</option>
                                    @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $talla)
                                        <option value="{{ $talla }}" {{ old('talla_camisa') === $talla ? 'selected' : '' }}>{{ $talla }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="talla_calzado" :value="__('Talla de calzado')" class="text-sm font-semibold text-slate-700" />
                                <select name="talla_calzado" id="talla_calzado" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">-- Seleccionar --</option>
                                    @foreach(['22', '22.5', '23', '23.5', '24', '24.5', '25', '25.5', '26', '26.5', '27', '27.5', '28', '28.5'] as $talla)
                                        <option value="{{ $talla }}" {{ old('talla_calzado') === $talla ? 'selected' : '' }}>{{ $talla }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="observaciones_empleado" :value="__('Observaciones del empleado')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="observaciones_empleado" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="observaciones_empleado" :value="old('observaciones_empleado')" />
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div class="rounded-xl border border-dashed border-slate-300 bg-white p-5">
                        <h2 class="text-lg font-semibold text-slate-800">Documentos y certificados</h2>
                        <div class="mt-4 grid gap-4 md:grid-cols-2">
                            <div>
                                <x-input-label for="cv_empleado" value="Currículum" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="cv_empleado" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="cv_empleado" />
                                <x-input-error :messages="$errors->get('cv_empleado')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="certificados_empleados" value="Certificados del empleado" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="certificados_empleados" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="certificados_empleados" />
                                <x-input-error :messages="$errors->get('certificados_empleados')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="flex flex-col gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                <div class="text-sm text-slate-500">Revisa la información antes de registrar al empleado.</div>
                <div class="flex flex-wrap gap-3">
                    <x-primary-button class="ms-0">
                        {{ __('Registrar') }}
                    </x-primary-button>
                    <a href="{{ route('index-employees') }}" class="inline-flex items-center rounded-lg bg-green-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-green-700 focus:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Cerrar') }}
                    </a>
                </div>
            </div>
        </form>

        @if ($errors->any())
            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-4 text-sm text-red-700 shadow-sm">
                <p class="font-semibold">¡Error!</p>
                <p class="mt-1">Se encontraron errores en el formulario. Verifica la información y revisa los campos marcados.</p>
            </div>
        @endif
    </div>
</x-guest-layout>
