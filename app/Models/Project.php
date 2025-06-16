<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['folioProject,id_client,nameProject','seller_id_usuario',
'company','inCharge_id_usuario','dateBegin','dateEnd',
'budget','accountBank','id_priority','id_instalationService',
'id_status','requestDate','estimateDate','authorizedDate',
'finishDate','id_empleado','jornadas','salario','totalSalario',
'totalManoObra'];
}
