<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderLists;
use App\Models\Supplier;
use App\Models\Status;


class PurchaseOrder extends Model
{
    protected $table = 'purchaseorder';

    public $timestamps = false;


    public function suppliers(){
        return $this-> belongsTo('App\Models\Supplier');
    }
    public function products(){
        return $this->belongsTo('App\Models\Product');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }


}
