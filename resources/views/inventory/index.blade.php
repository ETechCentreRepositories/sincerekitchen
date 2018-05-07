@extends('layouts.app')
@include('inc.navbar')
@section('content')
@include('inc.sidebar')

<div class="container-fluid">
    <div class="pageContent">
        <label class="tableLabel">Inventory</label>
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
                            <label><input type="checkbox" value=""></label>
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

                    <td>{{$inventory->products['product_name']}}</td>
                    <td>{{$inventory->products['serial_no']}}</td>
                    <td>{{$inventory->products['model_no']}}</td>
                    <td>{{$inventory->stock_in}}</td>
                    <td>{{$inventory->stock_out}}</td>
                    <td></td>
                    <td></td>
                </tr>

                @endforeach
            </tbody>
           
        </table>
        @endif
    
    </div>
</div>