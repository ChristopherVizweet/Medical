<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculoCheckList extends Model
{
    protected $fillable = [
        'id_vehiculo',
        'destino_check',
        'id_placa_vehiculo',
        'id_conductor_checklist',
        'motivo_checklist',
        'fecha_salida_checklist',
        'fecha_entrega_checklist',
        'responsable_entrega_checklist',
        'hora_inspeccion',
        'kilometraje_inicial',
        'kilometraje_final',
    ];
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculo');
    }
    public function conductor()
    {
        return $this->belongsTo(Empleados::class, 'id_conductor_checklist');
    }
    public function responsableEntrega()
    {
        return $this->belongsTo(User::class, 'responsable_entrega_checklist');
    }
    public function placas()
    {
        return $this->belongsTo(Vehiculo::class, 'id_placa_vehiculo');
    }
}
