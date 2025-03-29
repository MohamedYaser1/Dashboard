<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   

class Users extends Authenticatable
{


    protected $fillable=[
        'name',
        'email_address',
        'password',
        'password_comfirmation',
        'active'
    ];
}