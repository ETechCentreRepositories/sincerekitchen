@extends('layouts.app')
@section('content')
@include('inc.navbar')  


<div class="container">
{!!Form::open(['action'=>['PurchaseOrdersController@store'],'method'=>'POST'])!!}
{{csrf_field()}}  
    <div class="pageContent">
     <h3 class="title">New Purchase Order</h3>
        <hr>
        <div class="SalesDetails">  
       
        <div class="row">
             <div class="col-md-9">
            
             {!!Form::open(['action'=>'PurchaseOrdersController@getData','method'=>'GET'])!!}
                 <div class="row">
                    <div class="col-md-3">
                    
                    {{Form::label('suppliername','Supplier Name',['class'=>'formLabel','id' =>'customername'])}}
                </div>
               
                
                <div class="col-md-9"> 
                 {!! Form::select('suppliername',$valuesupp, null, ['class'=>'form-control']) !!}
                
                </div>
                </div>
               
                <br/>
                <br/>
                
                <div class="row">
                    <div class="col-md-3">
                     {{Form::label('purchaseorder','Purchase Order#',['class'=>'formLabel'])}}
                </div>
                <div class="col-md-5">
                <input type ="text" id="purchaseorder" name="purchaseorder" class="form-control" value="PO<?php echo date("Y");?>{{$stringnewId}}">
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
                 <div class="col-md-3">
                 {{Form::label('purchaseorderdate','Purchase Order Date',['class'=>'formLabel'])}}
                            </div>
                <div class="col-md-5">
                 {{Form::date('purchaseorderdate',\Carbon\Carbon::now(),['class'=>'form-control'])}}
             </div>

        </div>
                        
    
         </div>

        </div>

        <hr>  

        <br/>
        <br/>
        <div class="row">
            <div class="col-md-7">
                {{-- <div class="input-group"> --}}
                <input type="text" id="itemSearchField" class="form-control" style="background:transparent">
            </div>
            <div class="col-md-2">
                <button id="addItem" type="button" class="btn btn-warning yellowButton">Add Existing Product </button>
            </div>

               <div class="col-md-2">
               <button id="myBtn" type="button" class="btn btn-danger yellowButton">Add New Products </button>
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
                {{Form::label('gst','GST %',['class'=>'formLabel'])}}
            </div>
        <div class="col-md-9">
        <input type="text" id="gst" onchange="findgrandtotal()" class="form-control gst" name="gst" value="0" >

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
    {{Form::label('note', 'Note : ', ['class' => 'formLabel'])}}
    </div>
    <div class="col-md-12">
    {{Form::textarea('note', '', ['class' => 'field'])}}
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
            <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
            </div>
        </div>
           </div> 
      </div>  
</div>

<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
    <div class="modal-header">
        <span class="close">&times;</span>
        <div class="container-fluid">
            <div class="pageContent">
                <h3 class="title">Add Item</h3>
                {!! Form::open(['action'=>['ProductsController@AddNewItem'],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                {{csrf_field()}}
                <div class="row">

                    <div class="col-md-3">
                        {{Form::label('productname', 'Product Name', ['class' => 'formLabel'])}}
                    </div>
                    <div class="col-md-9">
                        {{Form::text('productname','', ['class' => 'form-control'])}}
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('serialno', 'SerialNo.', ['class' => 'formLabel'])}}
                    </div>
                    <div class="col-md-9">
                        {{Form::text('serialno','', ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('dimension', 'Dimension(mm)', ['class' => 'formLabel'])}}
                    </div>
                    <div class="col-md-9">
                        {{Form::text('dimension','', ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('descriptions', 'Product Descriptions', ['class' => 'formLabel'])}}
                    </div>
                <div class="col-md-9">
                    {{Form::text('descriptions','', ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    {{Form::label('images', 'Add Image', ['class' => 'formLabel'])}}
                </div>
                <div class="col-md-9">
                    {!! Form::file('image',array('id'=>'image_add','file'=> true))!!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    {{Form::label('manufacturer', 'Manufacturer', ['class' => 'formLabel'])}}
                </div>
                <div class="col-md-9">
                    {{Form::text('manufacturer','', ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    {{Form::label('brand', 'Brand', ['class' => 'formLabel'])}}
                </div>
                <div class="col-md-9">
                    {{Form::text('brand','', ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    {{Form::label('modelno', 'Model No', ['class' => 'formLabel'])}}
                </div>
                <div class="col-md-9">
                    {{Form::text('modelno','', ['class' => 'form-control'])}}
                </div>
            </div>

            <hr>
            <div class="row">
                <div class= "col-md-2">
                    <button  type="submit" class="btn btn-warning btn-lg yellowButton">Add Product</button>
                </div>
                    <div class= "col-md-2">
                        <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>



<script>
  
$(document).ready(function(){
  // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
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
var subtotal = document.getElementById('subtotal').value;
console.log(subtotal);

var discount = document.getElementById('discount').value;
console.log(discount);

var gst = document.getElementById('gst').value;
console.log(gst);


afterdisc = subtotal-(subtotal*discount/100);
console.log(afterdisc);

grandtotal = afterdisc+(afterdisc*gst/100);

document.getElementById('grandtotal').value = grandtotal.toFixed(2);

console.log(grandtotal);

}   



</script>
@endsection
  

