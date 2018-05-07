<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = false;


    public function products() 
    {
        return $this-> hasMany('App\Models\Product');

    }
}
