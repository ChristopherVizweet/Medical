<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotesAsistenciaInstaladores extends Model
{
     protected $fillable = [
        'proyecto_asistencia_instaladores_id',
        'fecha_lote_asistencia',
        'tipo_captura',
        'hora_entrada',
        'hora_salida',
        'status_asistencia',
        'observaciones',
    ];
    public function proyectoAsistenciaInstaladores()
    {
        return $this->belongsTo(ProyectoAsistenciaInstaladores::class, 'proyecto_asistencia_instaladores_id');
    }
}
