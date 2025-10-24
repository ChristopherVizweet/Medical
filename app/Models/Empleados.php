<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $fillable = ['curp','Nombre','apellidos','organizacion',
    'cargo','correoElectronico','numeroTelefonoTrabajo',
'numeroTelParti','sueldo','calle','ciudad','estadoProv','codigoPostal',
'pais','foto','tipoSangre','talla_pantalon','talla_camisa','talla_calzado',
'observaciones_empleado','fecha_nacimiento','fecha_vacaciones','certificados_empleados'];


public function empleado()
    {
        return $this->belongsTo(InventarioMovimiento::class);
    }
}

