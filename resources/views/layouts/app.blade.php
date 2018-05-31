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



calculate =function(){
    
   var price = document.getElementById('price').value;
   var quantity = document.getElementById('quantity').value;
   console.log(quantity,price);

   var total = parseInt(price)*parseInt(quantity);
   console.log(total);
   
   $("#amount").html(total);







}


    // var price = document.getElementById('price').value;
    // var quantity = document.getElementById('quantity');
    // var selectedquantity = quantity.options[quantity.selectedIndex].value;

    // // console.log(selectedquantity);


    // document.getElementById('amount').value = parseInt(price)*parseInt(selectedquantity);

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
