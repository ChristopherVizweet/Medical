<?php

use App\Models\Empleados;
use App\Models\User;

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

it('stores vacation records by selected period and displays only that period', function () {
    $this->actingAs(User::factory()->create([
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
