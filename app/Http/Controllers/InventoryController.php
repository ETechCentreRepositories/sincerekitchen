<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Products;
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

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $user_id = auth()->user()->id;
        $users_id = User::find($user_id);
        $products = Products::All();
     
        return view('inventory.index')->with('users_id',$users_id)->with('products',$products);
    }
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create(){


     }
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
        //
    }

       /**

     * Create a new controller instance.

     *

     * @return void

     */


public function getInventory(){

    $inventory = Inventory:: 
    select('product_name','serial_no','model_no','stock_in','stock_out','image')->get()->toArray();

    return response($inventory);


}



}

