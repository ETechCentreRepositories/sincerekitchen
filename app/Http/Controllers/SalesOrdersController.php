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
        $salesorders = SalesOrder::All();
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
        $sales = new SalesOrder;
        $sales->salesorder_name= Input::get('salesorder');
        $sales->references= Input::get('references');
        $sales->salesorder_date= Input::get('salesorderdate');
        $sales->expected_date = Input::get('expecteddate');
        $sales->customers_id = Input::get('customername');    
        $sales->subtotal = Input::get('subtotal');
        $sales->discount = Input::get('discount');
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
       $salesorderlists = SalesOrderLists::where('salesorder_id','=',$salesorders)->get();
       return view('salesorder.edit')->with('salesorders',$salesorders)->with('salesorderlists', $salesorderlists);
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
    $customers = Customers::all();
    $valuecust = [];
    foreach($customers as $customer){
        $valuecust[$customer->id] = $customer->name;
    }

   
    return view('salesorder.addsalesorder',compact('valuecust'));
}

public function generateSO($salesOrderId){
    $salesorder = SalesOrder::find($salesOrderId);
    $salesOrderId = SalesOrder::find($salesOrderId)->id;
    $datas = json_decode( json_encode($this->dbQuery($salesOrderId)), true);

    $pdf = PDF::loadView('salesorder.so', compact('datas'));
    return $pdf->download('sales_order.pdf');
}
public function dbQuery($salesOrderId) {
    $salesOrder = DB::table('salesorder')
    ->where('salesorder.id', '=', $salesOrderId)
    ->get()
    ->toArray();
    return $salesOrder;
}
}
