<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguroVehiculo extends Model
{
    protected $fillable = [
        'id_vehiculo',
        'empresa_seguro',
        'telefono_seguro',
        'correo_seguro',
        'comprobante_pago_seguro',
        'fecha_pago_seguro',
        'fecha_proxima_seguro',
        'fecha_expirar_seguro',
        'monto'
    ];
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculo');
    }
}