<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrderLists extends Model
{
    protected $table = 'salesorder_list';

    protected $fillable = ['salesorder_id','products_id','quantity','price','amount'];

    public $timestamps = false;

    public function products(){
        return $this->belongsTo('App\Models\Product');
    }

}
