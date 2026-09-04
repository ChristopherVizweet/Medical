<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoAsistenciaInstaladores extends Model
{
    protected $table = 'proyecto_asistencia_instaladores';

    protected $fillable = [
        'nombre_proyecto_asistencia',
        'concepto_proyecto_asistencia',
    ];
    public function lotesAsistenciaInstaladores()
    {
        return $this->hasMany(LotesAsistenciaInstaladores::class, 'proyecto_asistencia_instaladores_id');
    }
    public function lotesEmpleados(){

        return $this->hasManyThrough(
            LotesEmpleados::class,
            LotesAsistenciaInstaladores::class,
            'proyecto_asistencia_instaladores_id', // Foreign key on LotesAsistenciaInstaladores table
            'lotes_asistencia_instaladores_id', // Foreign key on LotesEmpleados table
            'id', // Local key on ProyectoAsistenciaInstaladores table
            'id'  // Local key on LotesAsistenciaInstaladores table
        );
    }
}
