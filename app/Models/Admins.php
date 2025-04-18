<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;   


class Admins extends Authenticatable
{
    protected $fillable=[
        'name',
        'email_address',
        'password',
        'password_comfirmation',
        'active'
    ];
}