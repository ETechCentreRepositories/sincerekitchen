@extends('layouts.app')
@include('inc.navbar')
@section('content')
@include('inc.sidebar')


  {!!Form::open(['action'=>['SalesOrdersController@store'],'method'=>'POST'])!!}
                {{csrf_field()}}  
<div class="container-fluid">

    <div class="pageContent">
     <h3 class="title">New Sales Order</h3>

        <hr>

       
        <div class="SalesDetails">  
       
        <div class="row">
             <div class="col-md-9">
            
             {!!Form::open(['action'=>'SalesOrdersController@getData','method'=>'GET'])!!}
                 <div class="row">
                    <div class="col-md-3">
                    
                    {{Form::label('customername','Customer Name',['class'=>'formLabel'])}}
                </div>
               
                
                <div class="col-md-9"> 
                 {!! Form::select('customername',$valuecust, null, ['class'=>'form-control']) !!}
                
                </div>
                </div>
               
                <br/>
                <br/>
                
                <div class="row">
                    <div class="col-md-3">
                     {{Form::label('salesorder','Sales Order#',['class'=>'formLabel'])}}
                </div>
                <div class="col-md-5">
                {{Form::text('salesorder','',['class'=>'form-control'])}}
                </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                     {{Form::label('references','References#',['class'=>'formLabel'])}}
                </div>
                <div class="col-md-5">
                {{Form::text('references','',['class'=>'form-control'])}}
                </div>
                </div>

                <br/>
                <br/>

                        <div class="row">
                            <div class="col-md-2">
                            {{Form::label('salesorderdate','Sales Order Date',['class'=>'formLabel'])}}
                            </div>
                            <div class="col-md-4">
                        {{Form::date('salesorderdate',\Carbon\Carbon::now(),['class'=>'form-control'])}}
                        </div>

                        <div class="col-md-2">
                    {{Form::label('expecteddate','Expected Shippment Date',['class'=>'formLabel'])}}
                        </div>
                        <div class="col-md-4">
                        {{Form::date('expecteddate',\Carbon\Carbon::now(),['class'=>'form-control'])}}
            
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

        <table class="table table-striped" id="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Item Details</th>
                <th>Quantity</th>
                <th>Price(S$)</th>
                <th>Amount(S$)</th>
        </tr>

        </thead>
        <tbody>
      
            <tr>
                <td>Image</t>
                <td>{!! Form::select('productname',$valueprod, null, ['class'=>'form-control']) !!} </td>
                
               <td> 
               <select id="quantity" onblur="calculate()">

               <?php 
               for($i=1;$i<=100;$i++){
                   ?> <option value="<?php echo $i;?>"><?php echo $i;?></option>
                   <?php
               }
              
              ?>

               
               </select>
               PC
               </td>
            
                <td>{!! Form::text('price','', ['class'=>'form-control','id'=>'price']) !!} </td>
                <td>S$<h4 style="text-align='center'" id="amount"></h4></td>
            </tr>
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
                 {{Form::text('subtotal','',['class'=>'form-control '])}}

             </div>
           
        </div>
        <hr>
    
        <div class="row">
            <div class="col-md-3">
                {{Form::label('diskon','Discount',['class'=>'formLabel'])}}
            </div>
             <div class="col-md-9">
                 {{Form::text('diskon','',['class'=>'form-control '])}}

             </div>
            </div>            
           

<hr>
             <div class="row">
            <div style="background:black; color: white" class="col-md-3">
                {{Form::label('grandtotal','Grand Total (SGD)',['class'=>'formLabel'])}}
            </div>
             <div class="col-md-9">
                 {{Form::text('grandtotal','',['class'=>'form-control '])}}

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
            <button type="submit" class="btn btn-warning btn-lg">Save and Send </button>
            
            </div>
        </div>
        {!! Form::close() !!}
        {!! Form::close() !!}
        {!! Form::close() !!}

        <div class="col-md-3">
            <div class="btnsavedraft">
            <button type="submit" class=" btn-lg">Save to Draft</button>
             </div>
            </div>   
<div class="col-md-3">

              <div class="btncancel">
            <button type="cancel" class="btn btn-danger btn-lg">Cancel</button>
            
            </div>
        </div>
           </div> 
      </div>  
</div>

 


