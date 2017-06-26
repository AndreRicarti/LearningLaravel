<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'number', 'active', 'image', 'category', 'description'
    ];
    //protected $guarded = ['admin'];
}
