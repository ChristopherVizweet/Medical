<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotesEmpleados extends Model
{
    protected $fillable = [
        'lotes_asistencia_instaladores_id',
        'empleado_id',
        'fecha_asistencia',
        'hora_entrada',
        'hora_salida',
        'status_asistencia',
        'observaciones',
    ];

    public function lotesAsistenciaInstaladores()
    {
        return $this->belongsTo(LotesAsistenciaInstaladores::class, 'lotes_asistencia_instaladores_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleados::class, 'empleado_id');
    }
}
