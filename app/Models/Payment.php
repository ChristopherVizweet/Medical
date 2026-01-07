<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'project_id',
        'empleados_id',
        'tipo',
        'concepto',
        'folio',
        'metodo_pago',
        'fecha_recepcion',
        'subtotal',
        'iva',
        'total',
        'comprobante_path',
        'es_planeado',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleados::class, 'empleados_id');
    }
}
