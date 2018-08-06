<?php

namespace App\Http\Controllers;

use PDF;
use Validator;
use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\SalesOrderLists;
use App\Models\Customers;
use App\Models\Status;
use App\Models\Product;
use App\Models\Inventory;
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
     
        // $customers = Customers::All();
        // $sales = SalesOrder::leftJoin('customers','salesorder.customers_id','=','customers.id')->get();
        $salesorders = SalesOrder::All()->sortByDesc('id');
    return view('salesorder.index')->with('users_id',$users_id)->with('salesorders',$salesorders);
    
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


        $this->validate($request, [
            'rows' => 'required',
        
         
        ]);
        


        $checklastid = SalesOrder::select('id')->get()->last();
    
        $sales = new SalesOrder;
        $sales->salesorder_name= Input::get('salesorder');
        $sales->references= Input::get('references');
        $sales->salesorder_date= Input::get('salesorderdate');
        $sales->expected_date = Input::get('expecteddate');
        $sales->customers_id = Input::get('customername');    
        $sales->subtotal = Input::get('subtotal');
        $sales->discount = Input::get('discount');
        $sales->gstresult= Input::get('gstresult');
        $sales->grandtotal = Input::get('grandtotal');
        $sales->customers_notes = Input::get('customernote');
        $sales->status_id = 1;
       
        $id = $sales->save();

        $rows = $request->input('rows');
        foreach($rows as $row){
            $data[]= [
                'salesorder_id'=> $sales['id'],
                'products_id'=> $row['productId'],
                'quantity'=> $row['quantity'],
                'price'=> $row['price'],
                'amount'=>$row['amount'], 
            ]; 
        }


        SalesOrderLists::insert($data);
        return redirect('/salesorder');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        
        $salesorder =SalesOrder::find($id);
        $salesOrderId = SalesOrder::find($id)->id;
        $salesorders = SalesOrder::orderBy('id','desc')->get();
       
        $salesorderlists = SalesOrderLists::where('salesorder_id','=',$salesOrderId)->get();
    
        return view('salesorder.viewsalesorder')->with('salesorder',$salesorder)->with('salesorders',$salesorders)->with('salesorderlists',$salesorderlists); 
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
        $salesorder = SalesOrder::find($id);
        $salesOrderId = SalesOrder::find($id)->id;
        $salesorders = SalesOrder::orderBy('id','desc')->get();
        $salesorderlists = SalesOrderLists::where('salesorder_id','=',$salesOrderId)->get();
        $soIds = $this->salesOrderArray($salesOrderId);
        return view('salesorder.edit')->with('salesorder',$salesorder)->with('salesorders',$salesorders)->with('salesorderlists',$salesorderlists)->with('soIds',$soIds); 
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
        $salesOrder = SalesOrder::find($id);
        $salesOrderId = SalesOrder::find($id)->id;
    
            $soIds = $this->salesOrderArray($salesOrderId);

            $checkstatus =  $salesOrder->status_id;
            if($checkstatus == "2"){
                $salesOrder->status_id="3";
                $salesOrder->save();
                return redirect('/salesorder');
                
            } else if($checkstatus == "3"){
                $salesOrder->status_id = "4";
                $salesOrder->save();
                return redirect('/salesorder');
            }    
            else{

                foreach($soIds as $test){
                    $check = Inventory::where('products_id','=', $test->products_id)->first();
                }
    
                if($check != null){
                    $rows = $request->input('rows');
                    foreach($rows as $row){
                        $data[] = [
                            'quantity' => $row['quantity'],
                        ];
                      
                        foreach($soIds as $test) {
                            $inventory = Inventory::where('products_id', '=', $test->products_id)->first();
                            $currentQuantity = $inventory->quantity;
                            $inventory->quantity = $currentQuantity - $data[0]['quantity'];
                          
                            $salesOrder->status_id = "2";
                            $inventory->stock_out = $request->input('date');
                            $inventory->save();
                            $salesOrder->save();
                        }
    
                        return redirect('/salesorder');
                    }
                } else{
                    $rows = $request->input('rows');
                    foreach($rows as $row){
                        $data[]= [
                            'products_id'=> $row['productId'],
                            'quantity'=> $row['quantity'],
                        ]; 
                    }
                    Inventory::insert($data);
        
                    foreach($soIds as $test) {
                        $inventory = Inventory::where('products_id', '=', $test->products_id)->first();
                        $currentQuantity = $inventory->quantity;
                        $inventory->quantity = $currentQuantity - $request->input('qty');
                        $salesOrder->status_id = "2";
                        $inventory->stock_out = $request->input('date');
                        $inventory->save();
                        $salesOrder->save();
                    }
                return redirect('/salesorder');
                
         }
    }
           
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
    $products = Product::all();
    $customers = Customers::all();
    $valuecust = [];
    foreach($customers as $customer){
        $valuecust[$customer->id] = $customer->companyname;
    }
   
    $check0 = DB::table('salesorder')->count();

    if($check0 == 0){
        $totalnewid = 1;
        $total = strlen($totalnewid);
        $diff = 3-$total;
        $stringnewId = (string)$totalnewid;

        for($i=0;$i<$diff;$i++){
            $stringnewId = "0" . $stringnewId;
        }
      
    } else{
        $totalnewid = 0;
        $checkid = DB::table('salesorder')->latest('id')->first()->id;
        $totalnewid = $checkid+1;
        
        $total = strlen($totalnewid);
        $diff = 3-$total;
        $stringnewId = (string)$totalnewid;
    
        for($i=0;$i<$diff;$i++){
            $stringnewId = "0" . $stringnewId;
        }
    
    }

    //  dd($checkid);
   
    return view('salesorder.addsalesorder',compact('valuecust'))->with('stringnewId',$stringnewId)->with('products',$products);
}


public function salesOrderArray($salesOrderId) {
    $soId = DB::table('salesorder_list')->where('salesorder_id', '=', $salesOrderId)->select('products_id')->get()->toArray();
    return $soId;
}

public function quantityArray($selectedOutlet, $getProductsValue) {
    $quantity = Inventory::where('products_id', '=', $getProductsValue)->select('stock_level')->get()->toArray();
    return $quantity;
 }
public function dbQuery($salesOrderId) {
    $salesOrder = DB::table('salesorder')
    ->where('salesorder.id', '=', $salesOrderId)
    ->get()
    ->toArray();
    return $salesOrder;
}

public function autocomplete(Request $request){
    $term= $request->term;
    $products = Product::where('product_name','LIKE','%'.$term.'%')->get();
    $data = [];

    foreach($products as $key => $value){
        $data [] = ['id' => $value->id, 'value'=>$value->product_name];
    }
    return response()->json($data);    
}
}