<?php

use App\Models\User;
use App\Models\Vehiculo;

function crearVehiculoParaSalidas(): Vehiculo
{
    return Vehiculo::create([
        'nombre_vehiculo' => 'Unidad de prueba',
        'placas_vehiculo' => 'ABC-123',
    ]);
}

it('registra una salida y muestra el resumen diario de kilómetros, dinero y combustible', function () {
    $this->actingAs(User::factory()->create([
        'ap_user' => 'test',
        'am_user' => 'test',
    ]));

    $vehiculo = crearVehiculoParaSalidas();

    $this->post(route('store-salida-vehiculo', $vehiculo->id), [
        'fecha' => '2026-10-22',
        'obra' => 'Obra Centro',
        'odometro_inicial' => 12000,
        'dinero_entregado' => 800,
        'litros_cargados' => 35.25,
    ])->assertRedirect(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']));

    $salida = $vehiculo->salidas()->firstOrFail();

    $this->get(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']))
        ->assertOk()
        ->assertSee('Obra Centro')
        ->assertSee('$800.00')
        ->assertSee('35.25 L')
        ->assertSee('Pendiente');

    $this->patch(route('finalizar-salida-vehiculo', ['id' => $vehiculo->id, 'salida' => $salida->id]), [
        'odometro_final' => 12045.5,
    ])->assertRedirect(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']));

    $this->get(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']))
        ->assertOk()
        ->assertSee('45.50 km')
        ->assertSee('Registrado');
});

it('rejects a final odometer reading lower than the initial reading', function () {
    $this->actingAs(User::factory()->create([
        'ap_user' => 'test',
        'am_user' => 'test',
    ]));

    $vehiculo = crearVehiculoParaSalidas();

    $this->post(route('store-salida-vehiculo', $vehiculo->id), [
        'fecha' => '2026-10-22',
        'obra' => 'Obra Centro',
        'odometro_inicial' => 12045,
        'dinero_entregado' => 0,
        'litros_cargados' => 0,
    ])->assertRedirect(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']));

    $salida = $vehiculo->salidas()->firstOrFail();

    $this->patch(route('finalizar-salida-vehiculo', ['id' => $vehiculo->id, 'salida' => $salida->id]), [
        'odometro_final' => 12000,
    ])->assertSessionHasErrors('odometro_final');

    expect($salida->fresh()->odometro_final)->toBeNull();
});
