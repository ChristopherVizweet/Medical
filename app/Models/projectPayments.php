<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projectPayments extends Model
{
    protected $fillable = ['project_id', 'fecha_abono', 'monto_abono', 
    'restante_abono', 'total_abono', 'metodo_pago', 'nota_abono'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
