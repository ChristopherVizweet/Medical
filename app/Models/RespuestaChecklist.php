<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespuestaChecklist extends Model
{
    protected $fillable = ['id_checklist',
    'id_item',
    'estado_item'];
    public function checklist()
    {
        return $this->belongsTo(VehiculoCheckList::class, 'id_checklist');
    }
    public function item()
    {
        return $this->belongsTo(ItemsChecklist::class, 'id_item');
    }
}
