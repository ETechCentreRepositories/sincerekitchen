<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrderLists extends Model
{
    protected $table = 'salesorder_list';

    public $timestamps = false;


    public function customers(){

        return $this-> belongsTo('App\Models\Customers');
    }

    public function products(){
        return $this->belongsTo('App\Models\Product');
    }

}
