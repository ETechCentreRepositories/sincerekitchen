<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //table name
    protected $table = 'inventory';

    public $timestamps = false;
    public function products() 
    {
        return $this-> belongsTo('App\Models\Inventory');

    }
}

