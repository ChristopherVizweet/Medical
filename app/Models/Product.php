<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $fillable=[
            'id_categories','name_product','codeExt_product','diameterMM_product',
            'manufact_product','valueArt_product','id_supplier','image_product',
            'stock'
        ];
  public function projectProduct()
{
    return $this->hasMany(projectProduct::class, 'product_id');
}
public function categories(){
    return $this->belongsTo(Categories::class, 'id_categories');
}
public function product(){
    return $this->hasMany(InventarioMovimiento::class, 'product_id');
}
}
