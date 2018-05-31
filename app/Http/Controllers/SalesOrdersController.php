<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\Customers;
use App\Models\Product;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Auth;

use DB;

class SalesOrdersController extends Controller
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
        // $sales = SalesOrder::leftJoin('customers','salesorder.customers_id','=','customers.id')->get();
        $salesorders = SalesOrder::All();
   
    return view('salesorder.index')->with('users_id',$users_id)->with('customers',$customers)->with('salesorders',$salesorders);
    
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         $user_id = auth()->user()->id;
        $users_id = User::find($user_id);
         $salesorders = SalesOrder::find($id);
        return view('salesorder.edit')->with('users_id',$users_id)->with('salesorders', $salesorders);
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

        // $imageName = time().' . '.$request->file('image')->getClientOriginalExtension(); 
        // $path = $request->file('image_add')->storeAs(public_path('image'),$imageName);
         
        $sales = new SalesOrder;
        $sales->customers_id= Input::get('customername');
        $sales->salesorder_name= Input::get('salesorder');
        $sales->references= Input::get('references');
        $sales->salesorder_date= Input::get('salesorderdate');
        $sales->expected_date= Input::get('expecteddate');
        
        
        $productname=Input::get('productname');
        $quantity = Input::get('quantity');
        $discount = Input::get('discount');
        $amount = Input::get('amount');
        $subtotal =Input::get('subtotal');
        $gst = Input::get('gst');

        
        $sales->grandtotal = Input::get('grandtotal');
        $subtotal =$amount;




        
        $sales->save();

        return redirect('/salesorder');


        
        // $product->image = Input::get($path);
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
        $salesorders =SalesOrder::find($id);
        return view('salesorder.viewsalesorder')->with('salesorders',$salesorders); 
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
       $salesorders = SalesOrder::find($id);
       return view('salesorder.edit')->with('salesorders',$salesorders);
    //  $product = Product::find($id);
    //  return view('product.edit')->with('product',$product);
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
        $sales =SalesOrder::find($id);
        $sales->customers_id= $request->input('customername');
        $sales->salesorder_name=$request->input('salesorder');
        $sales->references= $request->input('references');
        $sales->salesorder_date= $request->input('salesorderdate');
        $sales->expected_date= $request->input('expecteddate');
        $sales->save();
    //    $product = Product::find($id);
    //    $product->image = $request->input('image');
    //    $product->product_name = $request-> input('productname');
    //    $product->serial_no = $request -> input('sku');
    //    $product->dimension = $request -> input('dimension');
    //    $product->model_no = $request -> input('modelno');
    //    $product->unit_price = $request -> input('sellingprice');
    //    $product->save();
    

    //    return redirect('/product');

    return redirect('/salesorder');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $salesorders= SalesOrder::find($id);
        $salesorders->delete();
        return redirect('/salesorder');

    }


    
    public function getData(){

        $products = Product::All();
         $valueprod=[];
            foreach($products as $product){
                   $valueprod[$product->id] = $product->product_name;
             }
    $customers = Customers::all();
    $valuecust = [];
    foreach($customers as $customer){
        $valuecust[$customer->id] = $customer->name;
    }

   
    return view('salesorder.addsalesorder',compact('valuecust','valueprod'));
}
// public function getAllProducts(){
//     $products = Product::All();
//     $select=[];
    
//     foreach($products as $product){
//         $select[$product->id] = $product->product_name;
//     }

//     return view('salesorder.addsalesorder',compact('select'));
// }

public function viewsalesorder(){
    return view('salesorder.viewsalesorder');
}

}

