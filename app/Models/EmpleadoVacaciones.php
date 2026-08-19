<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoVacaciones extends Model
{
    protected $table = 'empleado_vacaciones';
    
    protected $fillable = [
        'empleado_id',
        'fecha_inicio',
        'fecha_fin',
        'dias_tomados',
        'estado',
        'observaciones'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleados::class, 'empleado_id');
    }

    public function getDiasOcupadosAttribute()
    {
        return $this->sum('dias_tomados');
    }
}
