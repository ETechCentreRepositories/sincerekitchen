<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sincere Kitchen') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://localhost:8000/js/jquery.min.js"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<script type="text/javascript">




function calculation(elementID){
    var mainRow = document.getElementById(elementID);
    var quantity = mainRow.querySelectorAll('#quantity')[0].value;
    var price = mainRow.querySelectorAll('[name=price]')[0].value;
    var amount = mainRow.querySelectorAll('[name=amount]')[0];
    var totalamount = parseFloat(quantity)*parseFloat(price);
    amount.value  = parseFloat(totalamount);
    var takeamount = document.getElementsByName('amount');
   


var tot = 0;


for(var i=0;i<takeamount.length;i++){
    if(parseFloat(takeamount[i].value))
    tot +=parseFloat(takeamount[i].value);
}
    $('#subtotal').html("S$ "+tot);
    subtotal.value = parseFloat(tot);

    // $('#grandtotal').html(aftdisc);


    console.log(quantity,price,takeamount,totalamount,tot,aftdisc);
}



function grandtotcalculation(){
    var afterdisc = 0;
    var subtotal = 0;
    var discount = 0;

    subtotal = document.getElementById('subtotal').value;
     discount = document.getElementById('discount').value;
     grandtotal = document.getElementById('grandtotal');
    


    afterdisc= subtotal-(subtotal*discount/100);
    grandtotal.value = parseFloat(afterdisc);

    $("#grandtotal").html(afterdisc);



    console.log(subtotal,discount,afterdisc);

}


function cloneRow(tableitem){
   
    var table = document.getElementById(tableitem);
    var rowCount = table.rows.length;

    var row =table.insertRow(rowCount);

    var colCount = table.rows[0].cells.length;
    row.id = 'row_'+rowCount;
    for(var i =0;i<colCount;i++){
        var newcell = row.insertCell(i);
        newcell.outerHTML =   table.rows[1].cells[i].outerHTML;
    }

    var listitems = row.getElementsByTagName("input")
    for(i=0;i<listitems.length;i++){
        listitems[i].setAttribute("oninput","calculation('"+row.id+"')");
        listitems[i].setAttribute("onchange","calculation('"+row.id+"')");

    }

}





// calculate =function(){
   
//     var quantity = document.getElementById('quantity').value;
//    var price = document.getElementById('price').value;
  
//    console.log(quantity,price);

//    var total = parseFloat(quantity)*parseFloat(price);
//    console.log(total);
   
//    $("#amount").html(total);
   
//    $("#subtotal").html(total);


//    var discount = document.getElementById('discount');

// }



function readURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            $('#addImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
    
$("#image_add").change(function(){
        readURL(this);

    });
</script>
</head>
<body>
    <div id="app">
        <main class="pb-5">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
</body>
</html>
