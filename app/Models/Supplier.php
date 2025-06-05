<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SupplierController;
use Spatie\Permission\Traits\HasRoles;

class Supplier extends Model
{
    #use HasFactory;
    use HasRoles;
    
    protected $fillable = ['name_supplier', 'email_supplier', 'phoneNumber_supplier'];
}
