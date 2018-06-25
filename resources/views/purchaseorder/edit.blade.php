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
        @foreach ($purchaseorderlists as $purchaseorderlist)
             <tr>
                <td>{{$purchaseorderlist->products['product_name']}} ({{$purchaseorderlist->products['serial_no']}})</td>
                <td>{{$purchaseorderlist->quantity}}</td>
                <td>{{$purchaseorderlist->amount}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p>Note : If you accept, the product item change status to futher</p>
 </div>   

<footer  class="w3-container w3">
    <div  class="d-flex flex-row user-buttons">
        {!! Form::open(['action' => ['PurchaseOrdersController@update', $purchaseorder->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'received']) !!}
        <div class="p-2">
            <input type="hidden" id="date" name="date" value="{{$purchaseorder->purchaseorder_date}}">
            @foreach ($purchaseorderlists as $purchaseorderlist)
                <input type="hidden" id="qty" name="qty{{$purchaseorderlist->id}}" value="{{$purchaseorderlist->quantity}}">
            @endforeach
            <div class="centerButton">
            {{Form::hidden('_method', 'PUT')}}
            <button type="submit" class="btn btn-warning btn-lg yellowButton">Accept</button>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="p-2">
            <div class="centerButton">
            <button type="reset" class="btn btn-danger btn-lg yellowButton">Cancel</button>
            </div>
        </div>
    <div>

</footer>

</div>


<script>


</script>




