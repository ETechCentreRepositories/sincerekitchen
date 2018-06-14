<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use DB;

class ProductsController extends Controller
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
        $products = Product::All();
     
        return view('product.product')->with('users_id',$users_id)->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id = auth()->user()->id;
        $users_id = User::find($user_id);
        $products = Product::find($product_id);
        return view('product.edit')->with('users_id',$users_id)->with('products', $products);
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
        $product = new Product;
        $product->product_name= Input::get('productname');
        $product->image = Input::get('image_add');
        $product->serial_no = Input::get('serialno');
        $product->quantity = Input::get('quantity');
        $product->dimension = Input::get('dimension');
        $product->model_no = Input::get('modelno');
        $product->manufacturer= Input::get('manufacturer');
        $product->selling_price = Input::get('sellingprice');
        $product->descriptions= Input::get('descriptions');

        $product-> save();

        return redirect('/product');



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
       
     $product = Product::find($id);
     return view('product.edit')->with('product',$product);
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
       $product = Product::find($id);
       $product->image = $request->input('image_add');
       $product->quantity = $request->input('quantity');
       $product->product_name = $request-> input('productname');
       $product->serial_no = $request -> input('serialno');
       $product->dimension = $request -> input('dimension');
       $product->model_no = $request -> input('modelno');
       $product->selling_price = $request -> input('sellingprice');
       $product->manufacturer= $request->input('manufacturer');
       $product->descriptions= $request->input('descriptions');
       $product->save();
    

       return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
        
        $products= Product::find($id);
        $products->delete();
        return redirect('/product');

    }
    public function getProductImage($filename)
    {
        $myfile = Storage::disk('public')->get($filename);

        return view('product.addproduct',['myFile' =>$myfile]);
    }


    public function getProductsbyProductName($productName){

        $products = Product::select('id','product_name')->where('product_name','=',$productName)->distinct()->get()->toArray();
        return response($products);
    }
}
