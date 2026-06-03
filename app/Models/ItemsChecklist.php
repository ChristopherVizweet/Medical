<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsChecklist extends Model
{
    protected $fillable = ['id_section',
    'nombre_items_ch'];
    
    public function section(){
        return $this->belongsTo(SectionItemsChecklist::class, 'id_section');
    }
    public function respuestas()
    {
        return $this->hasMany(RespuestaChecklist::class, 'id_item');
    }
}
