<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculoMantenimiento extends Model
{
    protected $fillable = [
        'vehiculo_id','fecha_servicio_vehiculo','concepto_vehiculo',
        'km_vehiculo','cantidad_vehiculo','costoUnitario_vehiculo',
        'total_vehiculo','responsable_mantenimiento_vehiculo'
    ];
    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class);
    }
    public function responsables(){
        return $this->belongsTo(Empleados::class, 'responsable_mantenimiento_vehiculo');
    }
   
}
