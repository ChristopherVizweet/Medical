<?php

use App\Exports\VehiculoSalidasExport;
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
        'costo_por_litro' => 22.70,
    ])->assertRedirect(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']));

    $salida = $vehiculo->salidas()->firstOrFail();

    $this->get(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']))
        ->assertOk()
        ->assertSee('Obra Centro')
        ->assertSee('$800.00')
        ->assertSee('35.25 L')
        ->assertSee('$22.70/L')
        ->assertSee('Pendiente');

    $this->patch(route('finalizar-salida-vehiculo', ['id' => $vehiculo->id, 'salida' => $salida->id]), [
        'odometro_final' => 12045.5,
    ])->assertRedirect(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']));

    $this->get(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']))
        ->assertOk()
        ->assertSee('45.50 km')
        ->assertSee('1.29 km/L')
        ->assertSee('Registrado');
});

it('summarizes fuel cost and efficiency by day, week, and month', function () {
    $this->actingAs(User::factory()->create([
        'ap_user' => 'test',
        'am_user' => 'test',
    ]));

    $vehiculo = crearVehiculoParaSalidas();

    foreach ([
        ['2026-10-20', 100, 150],
        ['2026-10-22', 150, 200],
        ['2026-10-05', 200, 250],
    ] as [$fecha, $odometroInicial, $odometroFinal]) {
        $vehiculo->salidas()->create([
            'fecha' => $fecha,
            'obra' => 'Obra de prueba',
            'odometro_inicial' => $odometroInicial,
            'odometro_final' => $odometroFinal,
            'dinero_entregado' => 100,
            'litros_cargados' => 10,
            'costo_por_litro' => 10,
        ]);
    }

    $this->get(route('salidas-vehiculo', [
        'id' => $vehiculo->id,
        'fecha' => '2026-10-22',
        'periodo' => 'dia',
    ]))
        ->assertOk()
        ->assertSee('50.00 km')
        ->assertSee('$10.00/L')
        ->assertSee('5.00 km/L');

    $this->get(route('salidas-vehiculo', [
        'id' => $vehiculo->id,
        'fecha' => '2026-10-22',
        'periodo' => 'semana',
    ]))
        ->assertOk()
        ->assertSee('100.00 km')
        ->assertSee('Totales del 19/10/2026 al 25/10/2026')
        ->assertSee('$10.00/L')
        ->assertSee('5.00 km/L');

    $this->get(route('salidas-vehiculo', [
        'id' => $vehiculo->id,
        'fecha' => '2026-10-22',
        'periodo' => 'mes',
    ]))
        ->assertOk()
        ->assertSee('150.00 km')
        ->assertSee('Totales del 01/10/2026 al 31/10/2026')
        ->assertSee('$10.00/L')
        ->assertSee('5.00 km/L');
});

it('exports the selected vehicle report to PDF and Excel', function () {
    $this->actingAs(User::factory()->create([
        'ap_user' => 'test',
        'am_user' => 'test',
    ]));

    $vehiculo = crearVehiculoParaSalidas();
    $vehiculo->salidas()->create([
        'fecha' => '2026-10-22',
        'obra' => 'Obra de exportación',
        'odometro_inicial' => 100,
        'odometro_final' => 150,
        'dinero_entregado' => 100,
        'litros_cargados' => 10,
        'costo_por_litro' => 10,
    ]);

    $filtros = [
        'id' => $vehiculo->id,
        'fecha' => '2026-10-22',
        'periodo' => 'semana',
    ];

    $pdf = $this->get(route('exportar-salidas-vehiculo-pdf', $filtros))->assertOk();
    expect($pdf->headers->get('content-type'))->toContain('application/pdf')
        ->and($pdf->headers->get('content-disposition'))->toContain('salidas-vehiculo-' . $vehiculo->id . '-20261019-20261025.pdf')
        ->and(substr($pdf->getContent(), 0, 4))->toBe('%PDF');

    $excel = $this->get(route('exportar-salidas-vehiculo-excel', $filtros))->assertOk();
    expect($excel->headers->get('content-type'))->toContain('spreadsheetml.sheet')
        ->and($excel->headers->get('content-disposition'))->toContain('salidas-vehiculo-' . $vehiculo->id . '-20261019-20261025.xlsx');

    $contenidoExcel = (new VehiculoSalidasExport([
        'vehiculo' => $vehiculo,
        'fechaInicio' => \Carbon\Carbon::parse('2026-10-19'),
        'fechaFin' => \Carbon\Carbon::parse('2026-10-25'),
        'salidas' => $vehiculo->salidas()->get(),
        'resumen' => [
            'kilometros' => 50,
            'dinero' => 100,
            'litros' => 10,
            'costo_por_litro' => 10,
            'kilometros_por_litro' => 5,
            'pendientes' => 0,
            'gasto_combustible' => 100,
        ],
    ]))->view()->render();
    expect(str_contains($contenidoExcel, 'Totales del periodo'))->toBeTrue()
        ->and(str_contains($contenidoExcel, '100.00'))->toBeTrue();
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
        'costo_por_litro' => 0,
    ])->assertRedirect(route('salidas-vehiculo', ['id' => $vehiculo->id, 'fecha' => '2026-10-22']));

    $salida = $vehiculo->salidas()->firstOrFail();

    $this->patch(route('finalizar-salida-vehiculo', ['id' => $vehiculo->id, 'salida' => $salida->id]), [
        'odometro_final' => 12000,
    ])->assertSessionHasErrors('odometro_final');

    expect($salida->fresh()->odometro_final)->toBeNull();
});
