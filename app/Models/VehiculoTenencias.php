<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculoTenencias extends Model
{
    protected $fillable = ['id_vehiculo',
    'monto_tenencias',
    'fecha_pago_tenencias',
    'fecha_tenencias_proxima',
    'comprobante_tenencias',
    'observaciones_tenencias'];
    
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculo');
    }
}
