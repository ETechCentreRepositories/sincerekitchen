<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderLists extends Model
{
    protected $table = 'purchaseorder_list';

    protected $fillable = ['purchaseorder_id','products_id','quantity','price','amount'];

    public $timestamps = false;

    public function products(){
        return $this->belongsTo('App\Models\Product');
    }

}
