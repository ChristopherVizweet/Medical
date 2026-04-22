<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $fillable = [
        'project_id',
        'subtotal',
        'iva',
        'total',
        'status'
    ];

    //COMIENZAN LAS RELACIONES CON LAS DEMAS TABLAS
    public function proyecto()
    {
        return $this->belongsTo(Project::class);
    }
    public function secciones(){
        return $this->hasMany(CotizacionSeccion::class);
    }
}
