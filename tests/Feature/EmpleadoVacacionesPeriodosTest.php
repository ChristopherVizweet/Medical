<?php

use App\Models\Empleados;
use App\Models\EmpleadoVacaciones;
use App\Models\User;
use App\Notifications\SolicitudVacacionesPendiente;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

function crearEmpleadoParaVacaciones(): Empleados
{
    return Empleados::create([
        'curp' => 'CURPTEST1234567890',
        'Nombre' => 'Ana',
        'apellidos' => 'Prueba',
        'organizacion' => 'Medical',
        'cargo' => 'Enfermera',
        'correoElectronico' => 'ana@example.test',
        'numeroTelefonoTrabajo' => '5551234567',
        'numeroTelParti' => '5551234567',
        'sueldo' => 100,
        'calle' => 'Centro',
        'ciudad' => 'Aguascal',
        'estadoProv' => 'Ags',
        'codigoPostal' => 20000,
        'pais' => 'Mexico',
        'foto' => '',
        'tipoSangre' => 'O+',
        'fecha_ingreso' => '2020-06-01',
    ]);
}

function crearRevisoresVacaciones(): array
{
    $marco = User::factory()->create([
        'name' => 'Marco',
        'ap_user' => 'Prueba',
        'am_user' => 'Marco',
    ]);
    $marco->assignRole(Role::findOrCreate('ingenieria', 'web'));

    $juan = User::factory()->create([
        'name' => 'Juan',
        'ap_user' => 'Prueba',
        'am_user' => 'Juan',
    ]);
    $juan->assignRole(Role::findOrCreate('superadmin', 'web'));

    return [$marco, $juan];
}

it('stores vacation records by selected period and displays only that period', function () {
    [$marco, $juan] = crearRevisoresVacaciones();
    Notification::fake();

    $this->actingAs(User::factory()->create([
        'name' => 'RH',
        'ap_user' => 'test',
        'am_user' => 'test',
    ]));
    $empleado = crearEmpleadoParaVacaciones();

    $datosVacaciones = [
        'fecha_inicio' => '2024-03-01',
        'fecha_fin' => '2024-03-01',
        'estado' => 'pendiente',
    ];

    $this->post(route('store-vacaciones', $empleado->id), $datosVacaciones + ['periodo' => '2024-2025'])
        ->assertRedirect(route('vacaciones-employee', ['id' => $empleado->id, 'periodo' => '2024-2025']));

    Notification::assertSentTo($marco, SolicitudVacacionesPendiente::class);
    Notification::assertSentTo($juan, SolicitudVacacionesPendiente::class);

    $this->post(route('store-vacaciones', $empleado->id), [
        ...$datosVacaciones,
        'fecha_inicio' => '2025-03-01',
        'fecha_fin' => '2025-03-02',
        'periodo' => '2025-2026',
    ])->assertRedirect(route('vacaciones-employee', ['id' => $empleado->id, 'periodo' => '2025-2026']));

    $this->get(route('vacaciones-employee', ['id' => $empleado->id, 'periodo' => '2024-2025']))
        ->assertOk()
        ->assertSee('01/03/2024')
        ->assertDontSee('01/03/2025');

    expect($empleado->vacaciones()->where('periodo', '2025-2026')->value('dias_tomados'))->toBe(2);
});

it('allows Marco or Juan to approve a pending vacation request', function () {
    [$marco, $juan] = crearRevisoresVacaciones();
    $empleado = crearEmpleadoParaVacaciones();
    $vacacion = EmpleadoVacaciones::create([
        'empleado_id' => $empleado->id,
        'fecha_inicio' => '2024-03-01',
        'fecha_fin' => '2024-03-01',
        'periodo' => '2024-2025',
        'dias_tomados' => 1,
        'estado' => 'pendiente',
    ]);

    $this->actingAs($juan)
        ->get(route('edit-vacaciones-empleado', $vacacion->id))
        ->assertOk()
        ->assertSee('Aprobar solicitud');

    $this->actingAs($juan)
        ->patch(route('approve-vacaciones', $vacacion->id))
        ->assertRedirect(route('vacaciones-employee', [
            'id' => $empleado->id,
            'periodo' => '2024-2025',
        ]));

    expect($vacacion->fresh()->estado)->toBe('aprobado');

    $segundaSolicitud = EmpleadoVacaciones::create([
        'empleado_id' => $empleado->id,
        'fecha_inicio' => '2024-03-02',
        'fecha_fin' => '2024-03-02',
        'periodo' => '2024-2025',
        'dias_tomados' => 1,
        'estado' => 'pendiente',
    ]);

    $this->actingAs($marco)
        ->patch(route('approve-vacaciones', $segundaSolicitud->id))
        ->assertRedirect();

    expect($segundaSolicitud->fresh()->estado)->toBe('aprobado');
});

it('does not allow another user to approve a vacation request', function () {
    crearRevisoresVacaciones();
    $empleado = crearEmpleadoParaVacaciones();
    $vacacion = EmpleadoVacaciones::create([
        'empleado_id' => $empleado->id,
        'fecha_inicio' => '2024-03-01',
        'fecha_fin' => '2024-03-01',
        'periodo' => '2024-2025',
        'dias_tomados' => 1,
        'estado' => 'pendiente',
    ]);

    $this->actingAs(User::factory()->create([
        'ap_user' => 'Prueba',
        'am_user' => 'Usuario',
    ]))
        ->put(route('update-vacaciones-empleado', $vacacion->id), [
            'fecha_inicio' => '2024-03-01',
            'fecha_fin' => '2024-03-01',
            'periodo' => '2024-2025',
            'estado' => 'aprobado',
        ])
        ->assertForbidden();

    $this->actingAs(User::factory()->create([
        'ap_user' => 'Prueba',
        'am_user' => 'Otro',
    ]))
        ->patch(route('approve-vacaciones', $vacacion->id))
        ->assertForbidden();

    expect($vacacion->fresh()->estado)->toBe('pendiente');
});

it('rejects a period that does not contain consecutive years', function () {
    $this->actingAs(User::factory()->create([
        'ap_user' => 'test',
        'am_user' => 'test',
    ]));
    $empleado = crearEmpleadoParaVacaciones();

    $this->post(route('store-vacaciones', $empleado->id), [
        'periodo' => '2024-2026',
        'fecha_inicio' => '2024-03-01',
        'fecha_fin' => '2024-03-01',
        'estado' => 'pendiente',
    ])->assertSessionHasErrors('periodo');

    expect($empleado->vacaciones()->count())->toBe(0);
});

it('calculates vacation entitlement using the selected period', function () {
    $this->actingAs(User::factory()->create([
        'ap_user' => 'test',
        'am_user' => 'test',
    ]));
    $empleado = crearEmpleadoParaVacaciones();
    $empleado->update(['fecha_ingreso' => '2023-06-01']);

    $this->get(route('vacaciones-employee', ['id' => $empleado->id, 'periodo' => '2024-2025']))
        ->assertOk()
        ->assertViewHas('derechoVacaciones', 12)
        ->assertSee('>12</p>', false);

    $this->get(route('vacaciones-employee', ['id' => $empleado->id, 'periodo' => '2025-2026']))
        ->assertOk()
        ->assertViewHas('derechoVacaciones', 14)
        ->assertSee('>14</p>', false);
});
