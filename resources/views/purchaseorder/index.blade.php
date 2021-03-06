@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')

<div class="container-fluid">
    <div class="pageContent">
        <div class="d-flex">
            <h3 class="title mr-auto p-2">Purchase Order</h3>
            <div class="p-2">
                <a href="/addpurchaseorder">
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
        <table id = "tablepurchaseorder" class="table table-striped"> 
        @if(count($purchaseorders)>0)
            <thead>
                <tr>
                    <th></th>
                    <th>Date</th>
                    <th>Purchase Order#</th>
                    <th>References#</th>
                    <th>Supplier Name</th>
                    <th>Status</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
           @foreach($purchaseorders as $purchaseorder)
                <tr>
                    <td>
                        <div class="checkbox">
                            <label><input type="checkbox" value=""></label>
                        </div>
                    </td>
                     <td>{{$purchaseorder->purchaseorder_date}}</td>
                     <td style="font-weight:bold; color:blue;"> <a href="{{URL::to('/purchaseorder',$purchaseorder->id)}}/">
                      {{$purchaseorder-> purchaseorder_name}}</a> </td>
                     <td>{{$purchaseorder-> references}}</td>
                     <td>{{$purchaseorder-> suppliers['name']}}</td>
                     <td style="color:red;">{{$purchaseorder->status['name']}}</td>
                     <td>S$ {{$purchaseorder->grandtotal}}</td>                      
                    <td>   
                    </div>
                        <div class="d-flex flex-row user-buttons">
                        @if ($purchaseorder->status_id == '2')
                        <div class="p-2">
                             <a href="/purchaseorder/{{$purchaseorder->id}}/edit">
                                <button type="button" class="btn btn-success yellowButton">
                                  <label class="addLabel">RE-Finalize Status</label>
                                </button> 
                            </div>
                     @endif 
                         @if ($purchaseorder->status_id == '3')
                        <div class="p-2">
                             <a href="">
                                <button type="button" class="btn btn-primary yellowButton">
                                <label class="addLabel">STATUS : DONE</label>
                                </button> 
                            </div>

                        <div class="p-2">
                             <a href="/purchaseorder/{{$purchaseorder->id}}/edit">
                                <button type="button" class="btn btn-warning yellowButton">
                                <label class="addLabel">Rejected</label>
                                </button> 
                            </div>
                            
                         @endif 


                        @if ($purchaseorder->status_id != '3' && $purchaseorder->status_id == '1' )
                            <div class="p-2">
                             <a href="/purchaseorder/{{$purchaseorder->id}}/edit">
                                <button type="button" class="btn btn-warning yellowButton">
                                    <label class="addLabel">Update Status</label>
                                </button> 
                            </div>
                            @endif
                            <div class="p-2">
                                {!!Form::open(['action' => ['PurchaseOrdersController@destroy', $purchaseorder->id],'onsubmit' => 'return ConfirmDelete()','method' => 'POST'])!!}
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



@endsection


