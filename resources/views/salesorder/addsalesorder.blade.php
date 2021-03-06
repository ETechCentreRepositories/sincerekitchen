@extends('layouts.app')
@section('content')

       
<div class="container">
{!!Form::open(['action'=>['SalesOrdersController@store'],'method'=>'POST','onsubmit' => 'return ConfirmSubmit()'])!!}
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

                <input type ="text" id="salesorder" name="salesorder" class="form-control" value="SO<?php echo date("Y");?>{{$stringnewId}}">
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
       

        <br/>
        <br/>
        <div class="row">
         <div class="col-md-10">
           
          <input name="itemSearchField" type="text" id="itemSearchField"  placeholder="Search.."  class="form-control" style="background:transparent">

           </div> 

            <div class="col-md-2">
                <button id="addItem" type="button" class="btn btn-warning yellowButton">Add Item</button>
            </div>
        </div>

        <br>

        <table class="table table-striped" id="createTableItem">
        <thead>
            <tr>
           <th></th>
                <th>Product Name</th>
                <th>Price(S$)</th>
                <th>Quantity</th>
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
             <input type="text" id="subtotal" class="form-control subtotal" onchange="findgrandtotal()" name="subtotal" >
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
            <div class="col-md-3">
                {{Form::label('gst','GST 7 %',['class'=>'formLabel'])}}
            </div>
        <div class="col-md-3" >
        {{Form::select('gst', array('0.07' => 'Yes', '0' => 'No'),null,['class'=>'form-control','id'=>'gst','onchange'=>'findgrandtotal()'])}}
         <input type="hidden" id="gstresult" onchange="findgrandtotal()" name="gstresult">
         </div>

         
            </div>  
            <hr>
             <div class="row">
            <div style="background:black; color: white" class="col-md-3">
                {{Form::label('grandtotal','Grand Total (SGD)',['class'=>'formLabel'])}}
            </div>
             <div class="col-md-9">
             <input type="text" id="grandtotal" onchange="findgrandtotal()" class="form-control grandtotal" name="grandtotal" >
             </div>
        </div>
        </div>
        </div>
<hr>
<div class="row">
    <div class="col-md-5">
    {{Form::label('customernote', 'Customer Note', ['class' => 'formLabel'])}}
    </div>
    <div class="col-md-12">
    {{Form::textarea('customernote', '', ['class' => 'field'])}}
    </div>
</div>   
<hr>

         <div style="margin-left:auto;margin-right:auto" class="row">

         <div class="col-md-3">
        <div class="btnsubmit">
            <button id="btnSave" type="submit" class="btn btn-warning btn-lg" >Save and Send </button>
            
            </div>
        </div>
        {!!Form::hidden('_token',csrf_token())!!}
        {!! Form::close() !!}
        {!! Form::close() !!}
            <div class="btncancel">
            <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
            
            </div>
        </div>
           </div> 
      </div>  
</div>



<script>



$(document).ready(function(){
 $("#itemSearchField").autocomplete({
        source: '{!!URL:: route('autocomplete')!!}',
        minLength:1,
        autoFocus: true,

        select:function(e,ui)
        {
         
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
                    var productId = parseInt(response[i].id);
                    console.log(productId);
                    trProducts.push(productId);
                    $("#addTableItemContent").append(
                        "<tr id='rows["+productId+"]'>"
                        +"<td><input id='number' name='rows["+productId+"][productId]' type='hidden' value='"+productId+"'/></td>"
                        +"<td><input type='text' value='"+response[i].product_name+"'/></td>"
                        +"<td><input class='price' name='rows["+productId+"][price]' id='price' type='text'></td>"
                        +"<td><input class='quantity' name='rows["+productId+"][quantity]' type='number' min='1' id='qty' type='text' style='width:60px;'value='1'/></td>"
                        +"<td><input class='amount' id='amount' name='rows["+productId+"][amount]' type='text'></td>"
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

            if(isNaN(totalamount)){
               alert("Please insert correct value");
            }
            row.find("#amount").val(totalamount);            
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
$(document).on('click','#removeTR',function(){
    var id = $('#removeTR').closest('tr').attr('id');
    for(var i =0;i<trProducts.length;i++){
        if(trProducts[i]==id){
            trProducts.splice(i,1);
        }
    }
    $('#removeTR').closest('tr').remove();
    $('#subtotal').val(null);
    $('#discount').val(null);
    $('#grandtotal').val(null);

    console.log(id);
});
});




function findgrandtotal(){
     var grandtotal = 0;
    var afterdisc = 0;
    var gst = 0.07;


var addgst = document.getElementById('gst');
var gstvalue = addgst.value;

var subtotal = document.getElementById('subtotal').value;
console.log(subtotal);

var discount = document.getElementById('discount').value;
console.log(discount);
afterdisc = subtotal-(subtotal*discount/100);
grandtotal = afterdisc+(afterdisc*gst);
console.log(afterdisc);

if(gstvalue == "0.07"){
    document.getElementById('grandtotal').value = grandtotal.toFixed(2);
    document.getElementById('gstresult').value = (afterdisc*gst).toFixed(2);
    console.log(grandtotal);

} else {
    document.getElementById('grandtotal').value = afterdisc.toFixed(2);
    document.getElementById('gstresult').value = 0.00.toFixed(2);
    console.log(grandtotal);
}
} 
  

</script>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

#myInput {
    border-box: box-sizing;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;
    border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    overflow: auto;
    border: 1px solid #ddd;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
@endsection
  

