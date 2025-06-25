<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = ['folioProject','id_client','nameProject','seller_id_usuario',
'company','inCharge_id_usuario','dateBegin','dateEnd',
'budget','accountBank','id_priority',
'id_status','requestDate','estimateDate','authorizedDate',
'finishDate','totalManoObra','recursosObtenidos','ejecutionDate','totalProductos'];

public function client()
{
    return $this->belongsTo(Client::class, 'id_client');
}

public function vendedor()
{
    return $this->belongsTo(User::class, 'seller_id_usuario');
}

public function encargado()
{
    return $this->belongsTo(User::class, 'inCharge_id_usuario');
}

public function compani()
{
    return $this->belongsTo(Company::class, 'company');
}

public function priority()
{
    return $this->belongsTo(Priority::class, 'id_priority');
}

public function status()
{
    return $this->belongsTo(Status::class, 'id_status'); 
}

public function empleados()
{
    return $this->hasMany(ProjectEmployee::class); //Es una funcion para que jale los valores o columnas de la tabla ProjectEmployee llamandola empleados
}


public function productos()
{
    return $this->hasMany(ProjectProduct::class); //Es una funcion para que jale los valores o columnas de la tabla ProjectProduct llamandola productos
}

public function services()
{
    return $this->belongsToMany(InstalationService::class, 'project_service', 'project_id', 'instalation_service_id'); //Es una funcion para que jale los valores o columnas de la tabla instalationServices llamando a sus valores
}

public function recursos(){
    return $this->belongsTo(Recursos::class,'recursosObtenidos');
}

public function cuenta(){
    return $this->belongsTo(Bank::class,'accountBank');
}

}

