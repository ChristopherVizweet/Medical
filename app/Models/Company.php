<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['nameCompany','rfc_company'];

public function facturas(){
    return $this->belongsTo(Factura::class);
}
}
