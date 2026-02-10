<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $fillable = ['curp','Nombre','apellidos','organizacion',
    'cargo','correoElectronico','numeroTelefonoTrabajo',
'numeroTelParti','sueldo','calle','ciudad','estadoProv','codigoPostal',
'pais','foto','tipoSangre','talla_pantalon','talla_camisa','talla_calzado',
'observaciones_empleado','fecha_nacimiento','fecha_vacaciones','certificados_empleados','cv_empleado'];


public function empleado()
    {
        return $this->belongsTo(InventarioMovimiento::class);
    }
public function encargadoA()
    {
        return $this->belongsTo(MovementProduct::class, 'encargado_almacen');
    }
public function encargadoE()
    {
        return $this->belongsTo(MovementProduct::class, 'encargado_envio');
    }
public function encargadoR()
    {
        return $this->belongsTo(MovementProduct::class, 'encargado_recibe');
    }
public function payments()
    {
        return $this->hasMany(Payment::class,'empleados_id');
    }
public function responsable(){
        return $this->hasMany(Factura::class); //Muchos empleados tiene una factura
    }
}

