<?php

use App\Http\Controllers\ChecadaController;
use App\Models\Checada;
use Carbon\Carbon;
use Tests\TestCase;

uses(TestCase::class);

function calcularJornada(Checada $checada): array
{
    $metodo = new ReflectionMethod(ChecadaController::class, 'calcularJornada');

    return $metodo->invoke(new ChecadaController, $checada);
}

it('usa el último marcaje como salida cuando no hay salida registrada', function () {
    $jornada = calcularJornada(new Checada([
        'fecha_verificador' => Carbon::parse('2026-08-20'),
        'hora_entrada_verificador' => '08:00:00',
        'hora_salida_comida_verificador' => '12:00:00',
        'hora_entrada_comida_verificador' => '13:00:00',
    ]));

    expect($jornada)
        ->minutos->toBe(240)
        ->horas->toBe('4 h 00 min')
        ->comida->toBe('1 h 00 min');
});

it('usa el segundo marcaje como salida cuando es el último disponible', function () {
    $jornada = calcularJornada(new Checada([
        'fecha_verificador' => Carbon::parse('2026-08-20'),
        'hora_entrada_verificador' => '08:00:00',
        'hora_salida_comida_verificador' => '17:00:00',
    ]));

    expect($jornada)
        ->minutos->toBe(540)
        ->horas->toBe('9 h 00 min');
});
