@extends('layouts.app')
@section('content')
@include('inc.navbar')  
       
<div class="container">
{!!Form::open(['action'=>['SalesOrdersController@update',$sales->id],'method'=>'POST'])!!}
{{csrf_field()}}  
    <div class="pageContent">
     <h3 class="title">New Sales Order</h3>

        <hr>
        <div class="SalesDetails">  
       
        <div class="row">
             <div class="col-md-9">
            
             {!!Form::open(['action'=>'SalesOrdersController@getData','method'=>'GET'])!!}
                 <div class="row">
                    <div class="col-md-3">
                    
                    {{Form::label('customername','Customer Name',['class'=>'formLabel','id' =>'customername'])}}
                </div>
               
                
                <div class="col-md-9"> 
                 {!! Form::select('customername',$salesorder->$customers_id['name'] ['class'=>'form-control']) !!}
                
                </div>
                </div>
               
                <br/>
                <br/>
                
                <div class="row">
                    <div class="col-md-3">
                     {{Form::label('salesorder','Sales Order#',['class'=>'formLabel'])}}
                </div>
                <div class="col-md-5">
                {{Form::text('salesorder',$salesorder->salesorder_name,['class'=>'form-control'])}}
                </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                     {{Form::label('references','References#',['class'=>'formLabel'])}}
                </div>
                <div class="col-md-5">
                {{Form::text('references',$salesorder->references,['class'=>'form-control'])}}
                </div>
                </div>

                <br/>
                <br/>

                        <div class="row">
                            <div class="col-md-2">
                            {{Form::label('salesorderdate','Sales Order Date',['class'=>'formLabel'])}}
                            </div>
                            <div class="col-md-4">
                        {{Form::date('salesorderdate',$salesorder->salesorder_date,['class'=>'form-control'])}}
                        </div>

                        <div class="col-md-2">
                    {{Form::label('expecteddate','Expected Shippment Date',['class'=>'formLabel'])}}
                        </div>
                        <div class="col-md-4">
                        {{Form::date('expecteddate',$salesorder->expected_date,['class'=>'form-control'])}}
            
                        </div>
                        </div>
                        


         </div>

        </div>

        <hr>  
        <div class="row">   
        <div class="col-md-2">
        {{Form::label('salesperson','SalesPerson',['class'=>'formLabel'])}}
        </div>

        <div class="col-md-3">
        {{Form::select('salesperson',array('Select'),null,['class'=>'fieldDropDown'])}}

        </div>
        </div>
    <div class="row">   
        <div class="col-md-2">
        {{Form::label('delivery','Delivery Method',['class'=>'formLabel'])}}
        </div>
        <div class="col-md-3">
        {{Form::select('delivery',array('Select'),null,['class'=>'fieldDropDown'])}}

        </div>
        </div>

        <br/>
        <br/>
        <br>

        <table class="table table-striped" id="createTableItem">
        <thead>
            <tr>
            <th>Number</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price(S$)</th>
                <th>Amount(S$)</th>
        </tr>

        </thead>
        <tbody id="addTableItemContent">
        if(count($salesorderlists) >0)
        @foreach($salesorderlists as $salesorderlist)
        <tr> 


        </tbody>

        </table>
        <hr>
     
            <br/>

        <div class="containerforaddsalesorder">    
        <div class="row">
            <div class="col-md-3">
                {{Form::label('subtotal','Subtotal',['class'=>'formLabel'])}}
            </div>
             <div class="col-md-9">
             <input type="text" id="subtotal" class="form-control subtotal" name="subtotal" >
             </div>     
        </div>
        <hr>
    
        <div class="row">
            <div class="col-md-3">
                {{Form::label('discount','Discount %',['class'=>'formLabel'])}}
            </div>
        <div class="col-md-9">
        <input type="text" id="discount" onchange="findgrandtotal()" class="form-control discount" name="discount" >

             </div>
            </div>  
<hr>
             <div class="row">
            <div style="background:black; color: white" class="col-md-3">
                {{Form::label('grandtotal','Grand Total (SGD) + 7% GST',['class'=>'formLabel'])}}
            </div>
             <div class="col-md-9">
             <input type="text" id="grandtotal" onchange="findgrandtotal()" class="form-control grandtotal" name="grandtotal" >
             </div>
        </div>
        </div>



        </div>
<hr>
 <div class="row">
     <div class="col-md-4">
        {{Form::label('customernote','Customer Notes',['class'=>'formLabel'])}}
     </div>
    <div class="col-md-12">
        {{Form::text('customernote','',['class'=>'form-control'])}}
    </div>
</div> 
                    
<div class="row">
    <div class="col-md-5">
    {{Form::label('termcondition', 'Term and Condition', ['class' => 'formLabel'])}}
    </div>
    <div class="col-md-12">
    {{Form::textarea('termcondition', '', ['class' => 'field'])}}
    </div>
</div>   
<hr>

         <div style="margin-left:auto;margin-right:auto" class="row">

         <div class="col-md-3">
        <div class="btnsubmit">
            <button id="btnSave" type="submit" class="btn btn-warning btn-lg">Save and Send </button>
            
            </div>
        </div>
        {!!Form::hidden('_token',csrf_token())!!}
        {!! Form::close() !!}
        {!! Form::close() !!}
            <div class="btncancel">
            <button type="cancel" class="btn btn-danger btn-lg">Cancel</button>
            
            </div>
        </div>
           </div> 
      </div>  
</div>
