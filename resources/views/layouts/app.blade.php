<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://localhost:8000/js/jquery.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sincere Kitchen') }}</title>
    
    <!-- Scripts -->
    
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/> 
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    


<script type="text/javascript">

//SHOW PREVIEW IMAGE
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
    $(document).ready(function(){    
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
                    console.log(trProducts);
                    $("#addTableItemContent").append(
                        "<tr id='newRow_"+productId+"'>"
                        +"<td>Image</td>"
                        +"<td>"+response[i].product_name+"</td>"
                        +"<td><input name='quantity' type='number' id='qty' type='text' style='width:60px;'value='1'/></td>"
                        +"<td><input name='price' id='price' type='text'></td>"
                        +"<td><input name='amount' id='amount' type='text'></td>"
                        +"<td><button type='button' class='btn btn-danger action-buttons' id='removeTR'> Remove</button></td></tr>"

                    );
                }
                
                },
                error: function (obj, testStatus, errorThrown) {
                console.log("failure");
            }

            });


        });

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
