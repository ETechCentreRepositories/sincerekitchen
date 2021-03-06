<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inventory;
use App\User;
use Auth;

use DB;


class InventoryController extends Controller{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user_id = auth()->user()->id;
        $users_id = User::find($user_id);
         $products = Product::All();
        $inventory= Inventory::All();
        return view('inventory.index')->with('users_id',$users_id)->with('products',$products)-> with('inventorys',$inventory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // $products = DB::table('Inventory')->join('inventory','product.id','=','inventory.product_id')->
        // select('product_name','serial_no','model_no')->get(); 

        // return redirect('/inventory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = DB::table('inventory')->join('inventory','inventory.product_id','=','products.product_id')
        // -> select ('product_name','serial_no','model_no')-> get();
        // return redirect('/Inventory');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
    //     DB::table('deadline', 'job')
    // ->leftJoin('job', 'deadline.id', '=', 'job.deadline_id')
    // ->where('deadline.id', $id)
    // ->delete();
      $inventory= Inventory::leftJoin('products','inventory.product_id','=','product_id')->where('inventory.product_id',$id)->delete();
      
      return redirect('/inventory');
    }

       /**

     * Create a new controller instance.

     *

     * @return void

     */


// public function getInventory(){

//     $inventory = Inventory:: 
//     select('product_name','serial_no','model_no','stock_in','stock_out','image')->get()->toArray();

//     return response($inventory);


// }


public function getInventoryByProductId($product_id){
    $inventorybyProductId = Inventory:: join('products','inventory.product_id','=', 'products.id')
    ->select('products.name','products.serial_no','products.model_no')->where('inventory.product_id',$product_id)
    ->get()->toArray();

    return response($product_id); 
}

public function search(Request $request){
    $term= $request->term;
    $products = Product::where('product_name','LIKE','%'.$term.'%')->get();
    $data = [];

    foreach($products as $key => $value){
        $data [] = ['id' => $value->id, 'value'=>$value->product_name];
    }
    return response($data);    
}

}

