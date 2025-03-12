<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    #use HasFactory;
    
    protected $fillable = ['name_supplier', 'email_supplier', 'phoneNumber_supplier'];
}
