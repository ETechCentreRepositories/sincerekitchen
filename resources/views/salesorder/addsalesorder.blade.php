@extends('layouts.app')
@section('content')
@include('inc.navbar')  
       
<div class="container">
{!!Form::open(['action'=>['SalesOrdersController@store'],'method'=>'POST'])!!}
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
        <div class="row">
            <div class="col-md-10">
                {{-- <div class="input-group"> --}}
                <input type="text" id="itemSearchField" class="form-control" style="background:transparent">
            </div>
            <div class="col-md-2">
                <button id="addItem" type="button" class="btn btn-warning yellowButton">Add Item</button>
            </div>
        </div>

        <br>

        <table class="table table-striped" id="createTableItem">
        <thead>
            <tr>
                <th>Image</th>
                <th>Item Details</th>
                <th>Quantity</th>
                <th>Price(S$)</th>
                <th>Amount(S$)</th>
        </tr>

        </thead>
        <tbody id="addTableItemContent">
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
                {{Form::label('discount','Discount',['class'=>'formLabel'])}}
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
            <button type="submit" class="btn btn-warning btn-lg">Save and Send </button>
            
            </div>
        </div>
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
<script>
$(document).ready(function(){    
    $("#itemSearchField").autocomplete({
        source: 'autocomplete-search',
        minLength:1,
        select:function(key,value)
        {
            console.log("testing");
            console.log(value);
        }
    });

    var trProducts=[];
  
        $("#addItem").click(function(){
            console.log("distinct");
            var productName = $("#itemSearchField").val();
            console.log(productName);
            $.ajax({
                type: "GET",
                url: "{{URL::TO('/retrieve-product-by-product-name')}}/"+productName,
                cache: false,
                datatype:"JSON",
                success: function(response){
                    console.log(response); 
                for(i= 0;i<response.length;i++){
                    console.log(response[i]);
                    var productId = parseInt(response[i].products_id);
                    trProducts.push(productId);
                    $("#addTableItemContent").append(
                        "<tr id='newRow_"+productId+"'>"
                        +"<td>Image</td>"
                        +"<td>"+response[i].product_name+"</td>"
                        +"<td><input class='quantity' name='quantity' type='number' id='qty' type='text' style='width:60px;'value='1'/></td>"
                        +"<td><input class='price' name='price' id='price' type='text'></td>"
                        +"<td><input class='amount' id='amount' name='amount' type='text'></td>"
                        +"<td><button type='button' class='btn btn-danger action-buttons' id='removeTR'> Remove</button></td></tr>"

                    );
                }
                
                },
                error: function (obj, testStatus, errorThrown) {
                console.log("failure");
            }
            });
        });


        $("#addTableItemContent").on("change","input",function(){
            var subtotal = 0;
            var row =$(this).closest("tr");
            var qty = parseFloat(row.find('#qty').val()).toFixed(2);
            var price = parseFloat(row.find('#price').val()).toFixed(2);
            var totalamount = qty * price;
            row.find("#amount").val(isNaN(totalamount) ? "" : totalamount);            
            console.log(qty);
            console.log(price);
            console.log(amount);
            console.log(totalamount);
        });
        $("#createTableItem").on('change','',function(){
    var totalamount = 0;
    $(this).find('.amount').each(function(){
        totalamount += +$(this).val();    

    });

    $('#subtotal').val(totalamount.toFixed(2));

    console.log(subtotal);

    console.log(totalamount);
});
 });




    // (function(){
    //     "use strict";

    //     $("table").on("change","input",function(){
    //         var row =$(this).closest("tr");
    //          var quantity = parseFloat(row.find("input:eq(2)").val());
    //          console.log(quantity);
    //          var price = parseFloat(row.find("input:eq(3)").val());
    //          console.log(price);
    //          var total = quantity *price;
    //          console.log(total);
    //          row.find("input:eq(4)").val(isNaN(total)? "":total);
    //     });


    // })();

function findgrandtotal(){
    var grandtotal = 0;
    var afterdisc = 0;
    var gst = 0.07;
var subtotal = document.getElementById('subtotal').value;
console.log(subtotal);

var discount = document.getElementById('discount').value;
console.log(discount);


afterdisc = subtotal-(subtotal*discount/100);
console.log(afterdisc);

grandtotal = afterdisc+(afterdisc*gst);

document.getElementById('grandtotal').value = grandtotal.toFixed(2);

console.log(grandtotal);

}   

    //     var price = document.getElementById('price').value;
    //     var amount = document.getElementById('quantity');

    //     totalamount = quantity* price;
    //     if(isNaN(totalamount)){
    //         alert('Please enter only numbers');
    //     } 
    //     document.getElementById('amount').value = totalamount;
    //     console.log(quantity);
    //     console.log(price);
    //     console.log(amount);
    //     console.log(totalamount);
    // }

    // function findgrandtotal(){
        

    // }
    </script>
@endsection
  

