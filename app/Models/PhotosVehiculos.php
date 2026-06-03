<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotosVehiculos extends Model
{
    protected $fillable = [
        'id_checklist',
        'foto_frente',
        'foto_lado_izquierdo',
        'foto_lado_derecho',
        'foto_trasera',
        'foto_adicional',
    ];

    public function checklist()
    {
        return $this->belongsTo(VehiculoCheckList::class, 'id_checklist');
    }

    public function item()
    {
        return $this->belongsTo(ItemsChecklist::class, 'id_item');
    }
}
