<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectProduct extends Model
{
    protected $fillable = ['product_id',
'supplier_id','costo'];

public function project()
{
    return $this->belongsTo(Project::class);
}

 public function productoc()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

}
