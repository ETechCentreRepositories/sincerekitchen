<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $table = 'salesorder';

    public $timestamps = false;


    public function customers(){

        return $this-> belongsTo('App\Models\Customers');
    }
    public function products(){
        return $this->belongsTo('App\Models\Product');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }

   
}
