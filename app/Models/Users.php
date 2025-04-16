<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;   

class Users extends Authenticatable
{


    protected $fillable=[
        'name',
        'username',
        'email_address',
        'password',
        'password_comfirmation',
        'active'
    ];
}