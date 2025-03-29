<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = 
    [
        'title',
        'details',
        'img',
        'user_id',
        'select_category',
        'select_country',
        'select_city',
        'active'
    ];  

    
}