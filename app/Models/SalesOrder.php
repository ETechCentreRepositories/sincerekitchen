<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $table = 'salesOrder';

    public $timestamps = false;


    public function salesorder(){

        return $this-> belongsToMany('App\Models\Customers');
    }


   
}
