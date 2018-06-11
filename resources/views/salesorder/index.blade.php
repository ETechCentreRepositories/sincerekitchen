@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')


  
<div class="container-fluid">
    <div class="pageContent">
        <div class="d-flex">
            <h3 class="title mr-auto p-2">Sales Order</h3>
            <div class="p-2">
                <a href="/addsalesorder">
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
        
        </div>
        <table class="table table-striped"> 
        @if(count($salesorders)>0)
            <thead>
                <tr>
                    <th></th>
                    <th>Date</th>
                    <th>Sales Order#</th>
                    <th>References#</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Invoiced</th>
                    <th>Packed</th>
                    <th>Shipped</th>
                    <th>Amount</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
           @foreach($salesorders as $salesorder)
                <tr>
                    <td>
                        <div class="checkbox">
                            <label><input type="checkbox" value=""></label>
                        </div>
                    </td>

                     <td>{{$salesorder-> salesorder_date}}</td>
                     <td> <a href="/salesorder/{{$salesorder->id}}/">
                      {{$salesorder-> salesorder_name}}</a> </td>
                     <td>{{$salesorder-> references}}</td>
                     <td>{{$salesorder-> customers['name']}}</td>
                     <td></td>
                     <td></td>     
                     <td></td>
                     <td></td>     
                     <td></td>
                     
                    <td>   
                        <div class="d-flex flex-row user-buttons">
                            <div class="p-2">
                                <a href="/salesorder/{{$salesorder->id}}/edit">
                                    <button type="button" class="btn btn-warning yellowButton">
                                        <label class="addLabel">Edit</label>
                                    </button>

                                    {!!Form::open(['action' => ['SalesOrdersController@destroy', $salesorder->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger action-buttons'])}}
                                {!!Form::close()!!}
                                </a>
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
@endsection