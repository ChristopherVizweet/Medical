<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificacionVehiculo extends Model
{
    protected $table = 'verificacion_vehiculos';

    protected $fillable = [
        'vehiculo_id',
        'fecha_pago_verificacion',
        'fecha_proxima_verificacion',
        'comprobante_pago_verificacion',
        'monto_verificacion',
        'observaciones_verificacion',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }
}
