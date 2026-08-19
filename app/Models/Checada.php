<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checada extends Model
{
    protected $table = 'checks';

    protected $fillable = [
        'identificador_verificador',
        'nombre_verificador',
        'fecha_verificador',
        'hora_entrada_verificador',
        'hora_salida_comida_verificador',
        'hora_entrada_comida_verificador',
        'hora_salida_verificador',
        'estado_verificador',
    ];

    protected function casts(): array
    {
        return [
            'fecha_verificador' => 'date',
        ];
    }
}
