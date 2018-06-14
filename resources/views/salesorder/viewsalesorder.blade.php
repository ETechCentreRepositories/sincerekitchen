@extends('layouts.app')
@section('content')
@include('inc.sidebar')
@include('inc.navbar')

<div class="container-fluid">
    <div class="pageContent">
        <div class="row">
            <div class="col-md-4">
            <h3 class='title'> Details Sales Order</h3>
            <div class="row">
            <div>{{$salesorders->customers['name']}} </div>
            <div>{{$salesorders->salesorder_date}} </div>
            </div>

        
            <div>{{$salesorders->salesorder_name}}</div>


            </div>
            <div class="col-md-4">
            <h3 class='title'>{{$salesorders->salesorder_name}}</h3>
            </div>
            <div class="col-md-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.024 30"><defs><style>.cls-3{fill:#333;}</style></defs><path class=".cls-3" d="M28.161,1.826A6.024,6.024,0,0,0,23.857,0a6.173,6.173,0,0,0-4.37,1.826L18.117,3.2h0L1.943,19.3a.5.5,0,0,0-.13.326V19.7L-.013,29.217a.526.526,0,0,0,.2.587.592.592,0,0,0,.457.2H.77l9.587-1.761h.065c.13,0,.2-.065.326-.13L28.291,10.565A6.3,6.3,0,0,0,28.161,1.826ZM3.835,19.239l3.717-3.717L18.77,4.3a7.114,7.114,0,0,1,6.848,6.848l-14.87,15A8.612,8.612,0,0,0,3.835,19.239Zm-.913,1.239a7.137,7.137,0,0,1,6.587,6.587l-8.087,1.5ZM26.857,10.043A8.619,8.619,0,0,0,20.009,3.13l.391-.391a4.965,4.965,0,0,1,6.848,0,4.842,4.842,0,0,1,0,6.848Z" transform="translate(0.037)"/></svg>
            </div>

        </div>

    </div>

</div>
@endsection

