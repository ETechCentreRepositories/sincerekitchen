<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $table = 'salesOrder';

    public $timestamps = false;


    public function customers(){

        return $this-> belongsTo('App\Models\Customers');
    }



   
}
