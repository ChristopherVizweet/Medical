<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'nombre_vehiculo',
        'numeroSerie_vehiculo',
        'marca_vehiculo',
        'modeloAño_vehiculo',
        'placas_vehiculo',
        'area_vehiculo',
        'id_encargado_vehiculo',
        'observaciones_vehiculo',
        'estado_vehiculo',
        'photo_vehiculo',
    ];
    public function mantenimiento(){
        return $this->hasMany(VehiculoMantenimiento::class);
    }
    public function encargado(){
        return $this->belongsTo(Empleados::class, 'id_encargado_vehiculo');
    }
    public function tenencias(){
        return $this->hasMany(VehiculoTenencias::class, 'id_vehiculo');
    }
    public function seguros(){
        return $this->hasMany(SeguroVehiculo::class, 'id_vehiculo');
    }
    public function verificaciones(){
        return $this->hasMany(VerificacionVehiculo::class, 'vehiculo_id');
    }
    public function checklist(){
        return $this->hasMany(VehiculoCheckList::class, 'id_vehiculo');
    }
    public function placa(){
        return $this->hasMany(VehiculoCheckList::class, 'id_placa_vehiculo');
    }
}
