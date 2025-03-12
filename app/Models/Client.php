<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['RFC','name_Client','email_client',
    'addres_Client','phoneNumber_Client'];
}
