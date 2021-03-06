@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color:#F8F7F7;" >
    <div class="container">
        <a class="nav navbar-left" href="{{ url('/') }}">
            
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <a href="/"><img src="/../../storage/logo/sincerekitchen_logo.png" class="logo"/></a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                                                                <!-- Authentication Links -->
                 <!-- @guest
                <li><a class="nav-link" style="color:#e3b417;" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                 @else -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}<span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <!-- @endguest  -->
            </ul>
        </div>
    </div>
</nav>
       
       <div id="product-content"  class="w3-card-4">
    <header class="w3-container w3">
    <h1 style="text-align:center;">Product Item Details</h1>
    </header>
    
<div class="w3-container">
    <table class="table">
        <thead>
            <tr>
                <th class="coloredHeader">Item & Serial No.</th>
                <th class="coloredHeader">Qty</th>
                <th class="coloredHeader">Amount</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($salesorderlists as $salesorderlist)
             <tr>
                <td>{{$salesorderlist->products['product_name']}} ({{$salesorderlist->products['serial_no']}})</td>
                <td>{{$salesorderlist->quantity}}</td>
                <td>{{$salesorderlist->amount}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p style="font-size: 14.5px;color: red;">Note : Click the proceed button below to update status. Otherwise, click cancel to return.</p>
 </div>   

<footer  class="w3-container w3">
    
    <div  class="d-flex flex-row user-buttons">
        @if ($salesorder->status_id == '1')
        {!! Form::open(['action' => ['SalesOrdersController@update', $salesorder->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'received']) !!}
        <div class="p-2">
            <input type="hidden" id="date" name="date" value="{{$salesorder->salesorder_date}}">
            @foreach ($salesorderlists as $salesorderlist)
            <input type="hidden" id="product" name="rows[product{{$salesorderlist->id}}][productId]" value="{{$salesorderlist->products_id}}">
                <input type="hidden" id="qty" name="rows[product{{$salesorderlist->id}}][quantity]" value="{{$salesorderlist->quantity}}">
            @endforeach
            <div class="centerButton">
            {{Form::hidden('_method', 'PUT')}}
            <button type="submit" class="btn btn-warning btn-lg yellowButton">Proceed</button>
            </div>
        </div>
        {!! Form::close() !!}
        @endif

        @if ($salesorder->status_id == '2')
     {!! Form::open(['action' => ['SalesOrdersController@update', $salesorder->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'received']) !!}
        
        <div class="p-2">
            <div class="centerButton">
            {{Form::hidden('_method', 'PUT')}}
            <input type="hidden" id="statusId" name="statusId" value="3">
            <button type="submit" class="btn btn-success btn-lg">Invoiced</button>
            </div>
        </div>
        {!! Form::close() !!}
        @endif

          @if ($salesorder->status_id == '3')
     {!! Form::open(['action' => ['SalesOrdersController@update', $salesorder->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'received']) !!}
        
        <div class="p-2">
            <div class="centerButton">
            {{Form::hidden('_method', 'PUT')}}
            <input type="hidden" id="statusId" name="statusId" value="4">
            <button type="submit" class="btn btn-success btn-lg">Rejected</button>
            </div>
        </div>
        {!! Form::close() !!}
        @endif

        <div class="p-2">
            <div class="centerButton">
            <button onclick = "goBack()" class="btn btn-danger btn-lg yellowButton">Cancel</button>
            </div>
        </div>


    <div>

</footer>

</div>
<script>
function goBack() {
    window.history.back();
}
</script>


@endsection


