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

}
