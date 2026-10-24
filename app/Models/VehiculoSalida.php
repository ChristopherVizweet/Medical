<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehiculoSalida extends Model
{
    protected $fillable = [
        'vehiculo_id',
        'conductor_id',
        'fecha',
        'obra',
        'odometro_inicial',
        'odometro_final',
        'dinero_entregado',
        'litros_cargados',
    ];

    protected $casts = [
        'fecha' => 'date',
        'odometro_inicial' => 'decimal:2',
        'odometro_final' => 'decimal:2',
        'dinero_entregado' => 'decimal:2',
        'litros_cargados' => 'decimal:2',
    ];

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function conductor(): BelongsTo
    {
        return $this->belongsTo(Empleados::class, 'conductor_id');
    }

    public function getKilometrosRecorridosAttribute(): ?float
    {
        if ($this->odometro_final === null) {
            return null;
        }

        return (float) $this->odometro_final - (float) $this->odometro_inicial;
    }
}
