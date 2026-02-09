<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrance extends Model
{
    protected $fillable=[
        'id_entrance','product_id_entrance', //falta agregar la de categorias'categorie_id_entrance'
        'user_id_entrance','existence_entrance',
        'date_entrance','factura_id'
    ];

    /**
     * Relación: La factura de la cual proviene esta entrada
     * Una entrada pertenece a UNA factura
     */
   
}
