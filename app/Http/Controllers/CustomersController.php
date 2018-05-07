<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\User;
use Illuminate\Support\Facades\Input;

use DB;

class CustomersController extends Controller
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
        $customers = Customers::All();
     
        return view('customer.customer')->with('users_id',$users_id)->with('customers', $customers);
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

        $customers = new Customers;
        $customers->name =Input::get('name');;
        $customers->phone_no = Input::get('phone_no');;
        $customers->email = Input::get('email');
        $customers->ba = Input::get('ba');
    $customers->sa = Input::get('sa');
        $customers->save();
        return redirect('/customer');
        //
        //  $product = new Product;
        // $product->product_name= Input::get('productname');
        // $product->serial_no = Input::get('sku');
        // $product->dimension = Input::get('dimension');
        // $product->model_no = Input::get('modelno');
        // $product->unit_price = Input::get('sellingprice');
        // $product-> save();

        // return redirect('/product');



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
       
     $customers =Customers::find($id);
     return view('customer.edit')->with('customer',$customers);
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
         $customers = Customers::find($id);
     $customers->name = $request-> input('name');
     $customers->phone_no = $request-> input('phone_no');
     $customers->email = $request-> input('email');
     $customers->ba = $request-> input('ba');
     $customers->sa = $request-> input('sa');
     $customers->save();
     return redirect('/customer');
    //    $product->dimension = $request -> input('dimension');
    //    $product->model_no = $request -> input('modelno');
    //    $product->unit_price = $request -> input('sellingprice');
    //    $product->save();

    //    return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // //
        // $products= Product::find($id);
        // $products->delete();
        // return redirect('/product');

    }
}
