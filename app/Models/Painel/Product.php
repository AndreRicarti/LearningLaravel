<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'number', 'active', 'image', 'category', 'description'
    ];
    //protected $guarded = ['admin'];
    /*
    public $rules = [
        'name'          => 'required|min:3|max:100',
        'number'        => 'required|numeric',
        'category'      => 'required',
        'description'   => 'min:3|max:1000'
    ];*/
}   
