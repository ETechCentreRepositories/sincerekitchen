<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderLists;
use App\Models\Supplier;
use App\Models\Status;
use App\Models\Product;
use App\Models\Inventory;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;


class PurchaseOrdersController extends Controller
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
        // $suppliers = Supplier::All();
        $purchaseorders = PurchaseOrder::All()->sortByDesc('id');
        return view('purchaseorder.index')->with('users_id',$users_id)->with('purchaseorders',$purchaseorders);

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
        $purchaseorders = PurchaseOrder::find($id);
       return view('purchaseorder.edit')->with('users_id',$users_id)->with('purchaseorders', $purchaseorders);
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

        $purchase  = new PurchaseOrder;
        $purchase->purchaseorder_name = Input::get('purchaseorder');
        $purchase->references = Input::get('references');
        $purchase->purchaseorder_date = Input::get('purchaseorderdate');
        $purchase->suppliers_id = Input::get('suppliername');
        $purchase->subtotal = Input::get('subtotal');
        $purchase->discount = Input::get('discount');
        $purchase->grandtotal = Input::get('grandtotal');
        $purchase->gst = Input::get('gst');
        $purchase->notes = Input::get('note');
        $purchase-> status_id = 1;
        $id = $purchase->save();

        $rows = $request->input('rows');
        foreach($rows as $row){
            $data[]=[
                'purchaseorder_id' =>$purchase['id'],
                'products_id'=>$row['productId'],
                'quantity'=> $row['quantity'],
                'price' =>$row['price'],
                'amount'=>$row['amount'],
            ];
         
        }

        PurchaseOrderLists::insert($data);
        return redirect('/purchaseorder');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchaseorder =PurchaseOrder::find($id);
        $purchaseOrderId = PurchaseOrder::find($id)->id;
        $purcahaseorders = PurchaseOrder::orderBy('id','desc')->get();
        $purchaseorderlists = PurchaseOrderLists::where('purchaseorder_id','=',$purchaseOrderId)->get();
        return view('purchaseorder.viewpurchaseorder')->with('purchaseorder',$purchaseorder)->with('purchaseorders',$purcahaseorders)->with('purchaseorderlists',$purchaseorderlists); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $purchaseorder = PurchaseOrder::find($id);
     $purchaseOrderId = PurchaseOrder::find($id)->id;
     $purchaseorders = PurchaseOrder::orderBy('id','desc')->get();
     $purchaseorderlists = PurchaseOrderLists::where('purchaseorder_id','=',$purchaseOrderId)->get();
     $poIds = $this->purchaseOrderArray($purchaseOrderId);
     return view('purchaseorder.edit')->with('purchaseorder',$purchaseorder)->with('purchaseorders',$purchaseorders)->with('purchaseorderlists',$purchaseorderlists)->with('poIds',$poIds); 
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
        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrderId = PurchaseOrder::find($id)->id;
    
   

            $checkstatus =  $purchaseOrder->status_id;
            if($checkstatus == "2"){
                $purchaseOrder->status_id="3";
                $purchaseOrder->save();
                return redirect('/purchaseorder');
                
            } else if($checkstatus == "3"){
                $purchaseOrder->status_id = "4";
                $purchaseOrder->save();
                return redirect('/purchaseorder');
            }    
            else{
                $poIds = $this->purchaseOrderArray($purchaseOrderId);
                foreach($poIds as $test){
                    $check = Inventory::where('products_id','=', $test->products_id)->first();
                }
    
                if($check != null){
                    $rows = $request->input('rows');
                    foreach($rows as $row){
                        $data[] = [
                            'quantity' => $row['quantity'],
                        ];
                        
                        foreach($poIds as $test) {
                            $inventory = Inventory::where('products_id', '=', $test->products_id)->first();
                            $currentQuantity = $inventory->quantity;
                            $inventory->quantity = $currentQuantity + $data[0]['quantity'];
                          
                            $purchaseOrder->status_id = "2";
                            $inventory->stock_in = $request->input('date');
                            $inventory->save();
                            $purchaseOrder->save();
                        }
    
                        return redirect('/purchaseorder');
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
        
                    foreach($poIds as $test) {
                        $inventory = Inventory::where('products_id', '=', $test->products_id)->first();
                        $currentQuantity = $inventory->quantity;
                        $inventory->quantity = $currentQuantity + $request->input('qty');
                        $purchaseOrder->status_id = "2";
                        $inventory->stock_in = $request->input('date');
                        $inventory->save();
                        $purchaseOrder->save();
                    }
                return redirect('/purchaseorder');
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
        $purchaseorder= PurchaseOrder::find($id);
        $purchaseorder->delete();
        return redirect('/purchaseorder');
    }

    public function getData(){
        $suppliers =  Supplier:: All();
        $valuesupp = [];
        foreach($suppliers as $supplier){
            $valuesupp[$supplier->id] = $supplier->name;
        }
          
     $check0 = DB::table('purchaseorder')->count();

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

         
         return view('purchaseorder.addpurchaseorder',compact('valuesupp'))->with('stringnewId',$stringnewId);
    }

    public function uploadFile(Request $request, $id){
        $purchaseorder = PurchaseOrder::find($id);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/document');
            $file->move($destinationPath,$name);
            $purchaseorder->quatation = $name;
            $purchaseorder->save();
            $boat_update = $request->all();
            $purchaseorder->update($boat_update);
            return redirect('/viewpurchaseorder');
        } 
    }

    public function purchaseOrderArray($purchaseOrderId) {
        $poId = DB::table('purchaseorder_list')->where('purchaseorder_id', '=', $purchaseOrderId)->select('products_id')->get()->toArray();
        return $poId;
    }

    public function quantityArray($selectedOutlet, $getProductsValue) {
        $quantity = Inventory::where('products_id', '=', $getProductsValue)->select('stock_level')->get()->toArray();
        return $quantity;
     }
}
