<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['RFC','name_Client','email_Client',
    'address_Client','phoneNumber_Client','supervisor','encargado',
    'telefono_supervisor','telefono_encargado','email_supervisor','email_encargado'];
}
