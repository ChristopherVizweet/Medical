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
        'costo_por_litro',
        'kilometro_por_litro',
        'costo_por_kilometro',
    ];

    protected $casts = [
        'fecha' => 'date',
        'odometro_inicial' => 'decimal:2',
        'odometro_final' => 'decimal:2',
        'dinero_entregado' => 'decimal:2',
        'litros_cargados' => 'decimal:2',
        'costo_por_litro' => 'decimal:2',
        'kilometro_por_litro' => 'decimal:2',
        'costo_por_kilometro' => 'decimal:2',
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

    public function getCostoPorLitroAttribute(): ?float
    {
        if ((float) $this->litros_cargados <= 0) {
            return null;
        }

        if ($this->getRawOriginal('costo_por_litro') !== null) {
            return (float) $this->getRawOriginal('costo_por_litro');
        }

        return (float) $this->dinero_entregado / (float) $this->litros_cargados;
    }

    public function getKilometrosPorLitroAttribute(): ?float
    {
        if ($this->kilometros_recorridos === null || (float) $this->litros_cargados <= 0) {
            return null;
        }

        if ($this->getRawOriginal('kilometro_por_litro') !== null) {
            return (float) $this->getRawOriginal('kilometro_por_litro');
        }

        return $this->kilometros_recorridos / (float) $this->litros_cargados;
    }
}
