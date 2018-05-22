<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';

    public $timestamps = false;


    public function customers(){
        return $this -> belongsTo('App\Models\SalesOrder');
    }
}

