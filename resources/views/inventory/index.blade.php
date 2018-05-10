@extends('layouts.app')
@include('inc.navbar')
@section('content')
@include('inc.sidebar')

<script>
 ('#btnDelete').hide();

$(document).ready(function(){
   
    function myFunction(){

        $('#myCheck').click(function(){
        if($('#myCheck').is(':checked')){
            ('#btnDelete').show();
         }
        else{
            ('#btnDelete').hide(); }
    });
};
   
});

</script>

<div class="container-fluid">
    <div class="pageContent">
    <div class='d-flex'>
        <h3 class="title mr-auto p-2">Inventory</h3>

        <!-- <div class="p-2" id='btnDelete'>
        <a href="">
        <button type="button" class="btn btn-danger">
       
        <defs>
        <style>
              .cls-3 {
                   fill: #fff;
                                }
                                </style>
                            </defs>
                    
                            <path id="Path_6" data-name="Path 6" class="cls-3" d="M22.286,10.286H13.714V1.714A1.62,1.62,0,0,0,12,0a1.62,1.62,0,0,0-1.714,1.714v8.571H1.714A1.62,1.62,0,0,0,0,12a1.62,1.62,0,0,0,1.714,1.714h8.571v8.571A1.62,1.62,0,0,0,12,24a1.62,1.62,0,0,0,1.714-1.714V13.714h8.571A1.62,1.62,0,0,0,24,12,1.62,1.62,0,0,0,22.286,10.286Z" transform="translate(4813 -139)"/>
                    
                        <label class="deleteLabel">Delete</label>
                    </button>
                </a> -->
                </div>
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
                    <th>Unit No.</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            @foreach($inventorys as $inventory)
                <tr>
                    <td>
                        <div class="checkbox">
                            <label><input type="checkbox" id="myCheck" onclick="myFunction()"></label>
                        </div>
                    </td>
                    <td>
                    <div class="centerImage col-md-3">
                            <svg class="image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 46"><title>image</title><g id="Layer_2" data-name="Layer 2"><g id="Livello_1" data-name="Livello 1"><path d="M42,0H4A4,4,0,0,0,0,4V42a4,4,0,0,0,4,4H42a4,4,0,0,0,4-4V4A4,4,0,0,0,42,0ZM4,2H42a2,2,0,0,1,2,2V26.65L33.23,15.87,23,26.1,17.89,21,2,36.87V4A2,2,0,0,1,4,2ZM42,44H4a2,2,0,0,1-2-2V39.68l.06,0L17.89,23.81,23,28.93,33.23,18.7,43.62,29.09a.8.8,0,0,0,.38.23V42A2,2,0,0,1,42,44Z"/><path d="M12.77,17.89a5.12,5.12,0,1,0-5.11-5.12A5.12,5.12,0,0,0,12.77,17.89Zm0-8.23a3.12,3.12,0,1,1-3.11,3.11A3.12,3.12,0,0,1,12.77,9.66Z"/></g></g></svg>
                        </div>
                    </td>

                 
                    <!-- <td>Thor - Stand 36"</td>
                    <td>201708000051</td>
                    <td>TR-T36</td>
                    <td>21-Aug-2017</td>
                    <td></td>
                    <td>#20-29</td>
                    <td>1</td> -->

                    <td>{{$inventory->product_name}}</td>
                    <td>{{$inventory->serial_no}}</td>
                    <td>{{$inventory->model_no}}</td>
                    <td>{{$inventory->stock_in}}</td>
                    <td>{{$inventory->stock_out}}</td>
                    <td></td>
                    <td></td>
                    <td>{!!Form::open(['action' => ['InventoryController@destroy', $inventory->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger action-buttons'])}}
                                {!!Form::close()!!}
                            </td>
                </tr>

                @endforeach
            </tbody>
           
        </table>
        @endif
    
    </div>
</div>