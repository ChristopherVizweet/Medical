<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionItemsChecklist extends Model
{
    protected $fillable = ['nombre_seccion_ch'];
    

    public function items(){
        return $this->hasMany(ItemsChecklist::class, 'id_section');
    }
    
}
