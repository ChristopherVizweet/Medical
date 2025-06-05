<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $fillable=[
            'id_categories','name_product','codeExt_product','codeInt_product','diameterMM_product',
            'diameterIN_product','manufact_product','valueArt_product','id_supplier','image_product'
        ];
    
    
}
