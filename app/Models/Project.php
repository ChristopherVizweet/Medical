<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['folioProject','id_client','nameProject','seller_id_usuario',
'company','inCharge_id_usuario','dateBegin','dateEnd',
'budget','accountBank','id_priority','id_instalationService',
'id_status','requestDate','estimateDate','authorizedDate',
'finishDate','id_empleado','jornadas','salario','totalSalario',
'totalManoObra','id_product','id_supplier','costo','totalProductos','recursosObtenidos','ejecutionDate'];

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

public function company()
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

}

