@extends('layouts.app')
@include('inc.navbar')
@section('content')
@include('inc.sidebar')

<div class="container-fluid">
    <div class="pageContent">
        <div class="d-flex">
            <h3 class="title mr-auto p-2">Products</h3>
            <div class="p-2">
            <!-- move to another page -->
                <a href="/addproduct">
                    <button type="button" class="btn btn-warning yellowButton">
                        <svg class="addIcon" xmlns="http://www.w3.org/2000/svg" viewBox="4813 -139 24 24">
                            <defs>
                                <style>
                                .cls-3 {
                                    fill: #fff;
                                }
                                </style>
                            </defs>
                            <path id="Path_6" data-name="Path 6" class="cls-3" d="M22.286,10.286H13.714V1.714A1.62,1.62,0,0,0,12,0a1.62,1.62,0,0,0-1.714,1.714v8.571H1.714A1.62,1.62,0,0,0,0,12a1.62,1.62,0,0,0,1.714,1.714h8.571v8.571A1.62,1.62,0,0,0,12,24a1.62,1.62,0,0,0,1.714-1.714V13.714h8.571A1.62,1.62,0,0,0,24,12,1.62,1.62,0,0,0,22.286,10.286Z" transform="translate(4813 -139)"/>
                        </svg>
                        <label class="addLabel">New</label>
                    </button>
                </a>
            </div>
        </div>
        @if(count($products) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Product Image</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Dimension</th>
                    <th>Model No.</th>
                    <th>Serial No.</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <div class="checkbox">
                            <label><input type="checkbox" value=""></label>
                        </div>
                    </td>

                    
                   
                    <!-- <td>Thor - Stand 36"</td>
                    <td>1</td>
                    <td>935*645*65</td>
                    <td>TR-T36</td>
                    <td>201708000051</td> -->
                  
          <td> <img src="{{$product->image}}"></td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->dimension}}</td>
                    <td>{{$product->serial_no}}</td>
                    <td>{{$product->model_no}}</td>
                    <td>
                    <div class="d-flex flex-row user-buttons">
                        <div class="p-2">
                            <a href="/product/{{$product->id}}/edit">
                                <button type="button" class="btn btn-warning yellowButton">
                                    <label class="addLabel">Edit</label>
                                </button>
                            </a>
                        </div>
                        <div class="p-2">
                        {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger action-buttons'])}}
                                {!!Form::close()!!}
                        </div>
                    </div>
                           
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>