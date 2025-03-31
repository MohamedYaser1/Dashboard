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

    public function category()
    {
        // assuming you have a state_id in your customers table
        return $this->belongsTo(Category::class, 'Category_id', 'id');
    }
    
}