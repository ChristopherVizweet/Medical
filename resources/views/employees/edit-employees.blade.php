<x-guest-layout>
    <div class="mx-auto max-w-6xl py-6 sm:py-8">
        <form method="POST" action="{{ route('edit-employees', $empleados->id) }}" enctype="multipart/form-data" class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">
            @csrf
            @method('PUT')

            <div class="bg-gradient-to-r from-slate-800 to-slate-700 px-6 py-8 text-white sm:px-8">
                <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-300">Gestión de personal</p>
                        <h1 class="mt-2 text-3xl font-bold">Editar empleado</h1>
                        <p class="mt-2 text-sm text-slate-300">Actualiza datos personales, laborales y documentos en un solo lugar.</p>
                    </div>
                    <div class="rounded-full bg-white/10 px-4 py-2 text-sm font-medium backdrop-blur">
                        ID: {{ $empleados->id }}
                    </div>
                </div>
            </div>

            <div class="space-y-6 p-6 sm:p-8">
                <section class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                        <div class="flex flex-col items-center lg:w-1/3">
                            <div class="mb-4 flex h-32 w-32 items-center justify-center overflow-hidden rounded-full border-4 border-white bg-slate-200 shadow-md">
                                @if ($empleados->foto)
                                    <img src="{{ asset('storage/' . $empleados->foto) }}" alt="Foto actual" class="h-full w-full object-cover">
                                @else
                                    <span class="text-lg font-semibold text-slate-500">Foto</span>
                                @endif
                            </div>

                            <x-input-label for="foto" value="Foto del empleado" class="text-sm font-semibold text-slate-700" />
                            <x-text-input id="foto" class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="foto" />
                            <input type="hidden" name="foto_actual" value="{{ $empleados->foto }}">

                            <div class="mt-3 w-full rounded-lg border border-dashed border-slate-300 bg-white px-4 py-3 text-center text-sm text-slate-600">
                                @if ($empleados->foto)
                                    <span class="font-semibold text-emerald-600">Imagen actual cargada</span>
                                @else
                                    <span class="font-semibold text-amber-600">Aún no hay foto registrada</span>
                                @endif
                            </div>
                        </div>

                        <div class="flex-1 space-y-4">
                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <x-input-label for="Nombre" :value="__('Nombre de empleado')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="Nombre" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="Nombre" value="{{ $empleados->Nombre }}" />
                                </div>
                                <div>
                                    <x-input-label for="apellidos" :value="__('Apellidos')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="apellidos" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="apellidos" value="{{ $empleados->apellidos }}" />
                                </div>
                                <div>
                                    <x-input-label for="numero_checador" :value="__('Número en reloj checador (EnNo)')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="numero_checador" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="numero_checador" value="{{ old('numero_checador', $empleados->numero_checador) }}" placeholder="Ej. 000000003" />
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <x-input-label for="curp" :value="__('CURP')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="curp" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="curp" value="{{ $empleados->curp }}" />
                                </div>
                                <div>
                                    <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="fecha_nacimiento" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date" name="fecha_nacimiento" value="{{ $empleados->fecha_nacimiento }}" />
                                </div>
                                <div>
                                    <x-input-label for="fecha_ingreso" :value="__('Fecha de ingreso')" class="text-sm font-semibold text-slate-700" />
                                    <x-text-input id="fecha_ingreso" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date" name="fecha_ingreso" value="{{ optional($empleados->fecha_ingreso)->format('Y-m-d') }}" />
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
                                <select name="organizacion" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="{{ $empleados->organizacion }}">{{ $empleados->organizacion }}</option>
                                    <option value="medical gas systems international">MGSI</option>
                                    <option value="Ascort">Ascort</option>
                                    <option value="Meicon">Meicon</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="cargo" :value="__('Cargo')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="cargo" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="cargo" value="{{ $empleados->cargo }}" />
                            </div>
                            <div>
                                <x-input-label for="sueldo" :value="__('Sueldo $')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="sueldo" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="sueldo" value="{{ $empleados->sueldo }}" />
                            </div>
                           
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-slate-800">Contacto</h2>
                        <div class="mt-4 space-y-4">
                            <div>
                                <x-input-label for="correoElectronico" :value="__('Correo Electronico')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="correoElectronico" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="email" name="correoElectronico" value="{{ $empleados->correoElectronico }}" />
                            </div>
                            <div>
                                <x-input-label for="numeroTelefonoTrabajo" :value="__('Número del trabajo')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="numeroTelefonoTrabajo" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" maxlength="10" placeholder="Ej. 5566334455" autocomplete="off" type="tel" name="numeroTelefonoTrabajo" value="{{ $empleados->numeroTelefonoTrabajo }}" />
                            </div>
                            <div>
                                <x-input-label for="numeroTelParti" :value="__('Número particular')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="numeroTelParti" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" maxlength="10" placeholder="Ej. 5566334455" autocomplete="off" type="tel" name="numeroTelParti" value="{{ $empleados->numeroTelParti }}" />
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
                                <x-text-input id="calle" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="calle" value="{{ $empleados->calle }}" />
                            </div>
                            <div>
                                <x-input-label for="ciudad" :value="__('Ciudad')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="ciudad" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="ciudad" value="{{ $empleados->ciudad }}" />
                            </div>
                            <div>
                                <x-input-label for="estadoProv" :value="__('Estado/Provincia')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="estadoProv" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="estadoProv" value="{{ $empleados->estadoProv }}" />
                            </div>
                            <div>
                                <x-input-label for="codigoPostal" :value="__('Codigo Postal')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="codigoPostal" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="codigoPostal" value="{{ $empleados->codigoPostal }}" />
                            </div>
                            <div>
                                <x-input-label for="pais" :value="__('País')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="pais" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="pais" value="{{ $empleados->pais }}" />
                            </div>
                            <div>
                                <x-input-label for="tipoSangre" :value="__('Tipo de sangre')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="tipoSangre" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="tipoSangre" value="{{ $empleados->tipoSangre }}" />
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-slate-800">Tallas y observaciones</h2>
                        <div class="mt-4 space-y-4">
                            <div>
                                <x-input-label for="talla_pantalon" :value="__('Talla de pantalón')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="talla_pantalon" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="talla_pantalon" value="{{ $empleados->talla_pantalon }}" />
                            </div>
                            <div>
                                <x-input-label for="talla_camisa" :value="__('Talla de camisa')" class="text-sm font-semibold text-slate-700" />
                                <select name="talla_camisa" id="talla_camisa" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value=""></option>
                                    <option value="S" {{ $empleados->talla_camisa == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M" {{ $empleados->talla_camisa == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L" {{ $empleados->talla_camisa == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL" {{ $empleados->talla_camisa == 'XL' ? 'selected' : '' }}>XL</option>
                                    <option value="XXL" {{ $empleados->talla_camisa == 'XXL' ? 'selected' : '' }}>XXL</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="talla_calzado" :value="__('Talla de calzado')" class="text-sm font-semibold text-slate-700" />
                                <select name="talla_calzado" id="talla_calzado" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">--Selecciona una talla de calzado--</option>
                                    <option value="22" {{ $empleados->talla_calzado == '22' ? 'selected' : '' }}>22</option>
                                    <option value="22.5" {{ $empleados->talla_calzado == '22.5' ? 'selected' : '' }}>22.5</option>
                                    <option value="23" {{ $empleados->talla_calzado == '23' ? 'selected' : '' }}>23</option>
                                    <option value="23.5" {{ $empleados->talla_calzado == '23.5' ? 'selected' : '' }}>23.5</option>
                                    <option value="24" {{ $empleados->talla_calzado == '24' ? 'selected' : '' }}>24</option>
                                    <option value="24.5" {{ $empleados->talla_calzado == '24.5' ? 'selected' : '' }}>24.5</option>
                                    <option value="25" {{ $empleados->talla_calzado == '25' ? 'selected' : '' }}>25</option>
                                    <option value="25.5" {{ $empleados->talla_calzado == '25.5' ? 'selected' : '' }}>25.5</option>
                                    <option value="26" {{ $empleados->talla_calzado == '26' ? 'selected' : '' }}>26</option>
                                    <option value="26.5" {{ $empleados->talla_calzado == '26.5' ? 'selected' : '' }}>26.5</option>
                                    <option value="27" {{ $empleados->talla_calzado == '27' ? 'selected' : '' }}>27</option>
                                    <option value="27.5" {{ $empleados->talla_calzado == '27.5' ? 'selected' : '' }}>27.5</option>
                                    <option value="28" {{ $empleados->talla_calzado == '28' ? 'selected' : '' }}>28</option>
                                    <option value="28.5" {{ $empleados->talla_calzado == '28.5' ? 'selected' : '' }}>28.5</option>
                                </select>
                            </div>
                            <div>
                                <x-input-label for="observaciones_empleado" :value="__('Observaciones del empleado')" class="text-sm font-semibold text-slate-700" />
                                <x-text-input id="observaciones_empleado" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="observaciones_empleado" value="{{ $empleados->observaciones_empleado }}" />
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div class="flex flex-col gap-4 rounded-xl border border-dashed border-slate-300 bg-white p-5 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-800">Documentos y certificados</h2>
                            <p class="mt-1 text-sm text-slate-600">
                                @if ($empleados->cv_empleado)
                                    <span class="font-semibold text-emerald-600">Cuenta con currículum</span>
                                @else
                                    <span class="font-semibold text-amber-600">Sin currículum registrado</span>
                                @endif
                                ·
                                @if ($empleados->certificados_empleados)
                                    <span class="font-semibold text-emerald-600">Cuenta con certificados</span>
                                @else
                                    <span class="font-semibold text-amber-600">Sin certificados</span>
                                @endif
                            </p>
                        </div>
                        <div class="w-full md:max-w-md">
                            <x-input-label for="cv_empleado" value="Currículum" class="text-sm font-semibold text-slate-700" />
                            <x-text-input id="cv_empleado" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="cv_empleado" />
                            <input type="hidden" name="cv_actual" value="{{ $empleados->cv_empleado }}">
                        </div>
                    </div>

                    <div class="mt-4 rounded-xl border border-dashed border-slate-300 bg-white p-5">
                        <x-input-label for="certificados_empleados" value="Agregar o actualizar certificados del empleado" class="text-sm font-semibold text-slate-700" />
                        <x-text-input id="certificados_empleados" class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="certificados_empleados" />
                        <input type="hidden" name="certificados_actual" value="{{ $empleados->certificados_empleados }}">
                    </div>
                </section>
            </div>

            <div class="flex flex-col gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                <div class="text-sm text-slate-500">Revisa la información antes de guardar los cambios.</div>
                <div class="flex flex-wrap gap-3">
                    <x-primary-button class="ms-0">
                        {{ __('Actualizar') }}
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
                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-guest-layout>
