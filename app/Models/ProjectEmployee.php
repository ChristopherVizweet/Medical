<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectEmployee extends Model
{
    protected $fillable = ['project_id',
'id_empleado','jornadas','salario','total_salario'];

public function project()
{
    return $this->belongsTo(Project::class);
}

 public function empleado()
    {
        return $this->belongsTo(Empleados::class, 'id_empleado');
    }

}
