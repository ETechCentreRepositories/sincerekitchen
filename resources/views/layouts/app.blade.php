<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://localhost:8000/js/jquery.min.js"></script>
    
    <!-- <script src="http://localhost:8000/js/sorttable.js"></script> -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sincere Kitchen') }}</title>
    
    <!-- Scripts -->
    
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/> 
   
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/sincerekitchen_logo.png') }}">
   
  
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
      <script src="{{asset('js/jquery-1.10.2.js')}}"></script>
 <script src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  

        
            
    <!-- Styles -->
    
    <script> 

  
    

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



function ConfirmDelete(){
return confirm('THIS ACTION WILL DELETE IT!\n\nAre you sure?');
}

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
    