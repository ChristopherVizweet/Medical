<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name_categories'];

    public function products()
{
    return $this->hasMany(Product::class, 'id_categories');
}
}
