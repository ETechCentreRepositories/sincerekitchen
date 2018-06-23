<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\User;
use Illuminate\Support\Facades\Input;

class SupplierController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $users_id = User::find($user_id);
        $suppliers = Supplier::All();
     
        return view('supplier.index')->with('users_id',$users_id)->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $user_id = auth()->user()->id;
        // $users_id = User::find($user_id);
        // $products = Product::find($product_id);
        // return view('inventory.edit')->with('users_id',$users_id)->with('products', $products);
    }
     
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|min:8|numeric',
            'email' => 'required|email',
            'address' => 'required',      
        ]);
       
        $suppliers = new Supplier;
        $suppliers->name =Input::get('name');;
        $suppliers->phone_no = Input::get('phone');;
        $suppliers->email = Input::get('email');
        $suppliers->address = Input::get('address');
        $suppliers->save();
        return redirect('/supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
     $suppliers =Supplier::find($id);
     return view('supplier.edit')->with('suppliers',$suppliers);
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
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|min:8|numeric',
            'email' => 'required|email',
            'address' => 'required',      
        ]);
       
        $suppliers  = Supplier::find($id);
         $suppliers->name =$request->input('name');;
         $suppliers->phone_no =$request->input('phone');;
         $suppliers->email = $request->input('email');
         $suppliers->address = $request->input('address');
         $suppliers->save();
         return redirect('/supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $suppliers= Supplier::find($id);
         $suppliers->delete();
        return redirect('/supplier');

    }
    


}
