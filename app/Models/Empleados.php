<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $fillable = ['curp','Nombre','apellidos','organizacion',
    'cargo','correoElectronico','numeroTelefonoTrabajo',
'numeroTelParti','sueldo','calle','ciudad','estadoProv','codigoPostal',
'pais','foto','tipoSangre'];
}
