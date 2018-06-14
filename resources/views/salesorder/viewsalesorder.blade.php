@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')

<div class="container-fluid">
    <div class="pageContent">
        <div class="row">
            <div class="col-md-4 scrollMenu">
                <div class="row">
                    <div class="col-md-8">
                        <h3>All Sales Orders</h3>
                    </div>
                    <div class="col-md-4">
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
                    <br><br><br>
                </div>
                <div class="salesorderlist">
                    <div>{{$salesorder->customers['name']}}</div>
                    <div>{{$salesorder->salesorder_name}}</div>
                    <div>{{$salesorder->salesorder_date}}</div>
                </div>
                <hr>
            </div>
            <div class="col-md-8">
                <h3>{{$salesorder->salesorder_name}}</h3>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="salesorder-tab" data-toggle="tab" href="#salesorder" role="tab" aria-controls="salesorder" aria-selected="true">SALES ORDER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="quotation-tab" data-toggle="tab" href="#quotation" role="tab" aria-controls="quotation" aria-selected="false">QUOTATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="false">INVOICE</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content format" id="myTabContent">
                    <div class="tab-pane fade show active" id="salesorder" role="tabpanel" aria-labelledby="salesorder-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Sincere Kitchen</b><br>
                                10 Ubi Crescent, #03-07<br>
                                Ubi Techpark<br>
                                Singapore 408564
                            </div>
                            <div class="col-md-6 rightAlign">
                                <div style="font-size:16px">SALES ORDER</div>
                                {{$salesorder->salesorder_name}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="font-size:16px">Bill To</div>
                                {{$salesorder->customers['name']}}
                            </div>
                            <div class="col-md-6 rightAlign">
                                Order Date: {{$salesorder->salesorder_date}}<br>
                                Shipment Date: {{$salesorder->expected_date}}<br>
                                Ref#: {{$salesorder->references}}
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="coloredHeader">Item & Description</th>
                                    <th class="coloredHeader">Qty</th>
                                    <th class="coloredHeader">Rate</th>
                                    <th class="coloredHeader">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salesorderlists as $salesorderlist)
                                <tr>
                                    <td>{{$salesorderlist->products['product_name']}}</td>
                                    <td>{{$salesorderlist->quantity}}</td>
                                    <td>{{$salesorderlist->price}}</td>
                                    <td>{{$salesorderlist->amount}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                    <div class="tab-pane fade" id="quotation" role="tabpanel" aria-labelledby="quotation-tab">
                        Quotation
                    </div>
                    <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        Invoice
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    body {
        background: white !important;
    }

    .scrollMenu {
        border-right: 1px solid rgba(0, 0, 0, 0.1);
        height: 500px;
        overflow-y: auto;
    }

    .salesorderlist {
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        padding: 5% 0 4% 0;
        cursor: pointer;
    }

    .rightAlign {
        text-align: right;
    }

    .format {
        padding: 5%;
    }

    .coloredHeader {
        background: lightgrey;
    }
</style>