@extends('layouts.app')
@section('content')
@include('inc.navbar')
@include('inc.sidebar')


<div class="container-fluid">
    <div class="pageContent">
    <div class='d-flex'>
        <h3 class="title mr-auto p-2">Inventory</h3>
        </div>
        @if(count($inventorys) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Image</th>
                    <th>Item</th>
                    <th>Serial No.</th>
                    <th>Model No.</th>
                    <th>Stock In Date</th>
                    <th>Stock Out Date</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            @foreach($inventorys as $inventory)
                <tr>
                <td></td>
                <td> <img style="width:150px; height:150px" src='http://localhost:8000/images/{{$inventory->products['image']}}'></td>
                    <td>{{$inventory->products['product_name']}}</td>
                    <td>{{$inventory->products['serial_no']}}</td>
                    <td>{{$inventory->products['model_no']}}</td>
                    <td>{{$inventory->stock_in}}</td>
                    <td>{{$inventory->stock_out}}</td>
                    <td>{{$inventory->quantity}}</td>
                    <td></td>
    
                </tr>
                @endforeach
            </tbody>
           
        </table>
        @endif
    
    </div>
</div>
@endsection