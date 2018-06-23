@extends('layouts.app')
@section('content')
@include('inc.sidebar')

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

<div class="container-fluid">
    <div class="pageContent">
        <div class="row">
            <div class="col-md-4 scrollMenu">
                <div class="row">
                    <div class="col-md-7">
                        <h3>Details Purchase Order</h3>
                    </div>
                    <div class="col-md-1">
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
                    <br><br><br>
                </div>
                <div class="salesorderlist">
                    {{-- <div>{{$purchaseorder->supplier['name']}}</div>
                    <div>{{$purchaseorder->purchaseorder_name}}</div>
                    <div>{{$purchaseorder->purchaseorder_date}}</div> --}}
                </div>
            </div>
            <div class="col-md-8">
                <h3>{{$purchaseorder->purchaseorder_name}}</h3>
                <div class="row">
                <div class="col-md-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="salesorder-tab" data-toggle="tab" href="#salesorder" role="tab" aria-controls="salesorder" aria-selected="true">PURCHASE ORDER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="quotation-tab" data-toggle="tab" href="#quotation" role="tab" aria-controls="quotation" aria-selected="false">QUOTATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="false">INVOICE</a>
                    </li>
                </ul>
                </div>
                <div class="col-md-2">
                <ul class="nav" id="myTab" role="tablist">
                <li>
               <a onclick="abc()"> <svg  style="width:35px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.714 30"><defs><style>.cls-1 {fill: #333;}</style></defs><path  id="printer" data-name="Path 37" class="cls-1" d="M32.143,6H30V.714A.675.675,0,0,0,29.286,0H6.429a.675.675,0,0,0-.714.714V6H3.571A3.537,3.537,0,0,0,0,9.571V22.429A3.537,3.537,0,0,0,3.571,26H5.714v3.286A.675.675,0,0,0,6.429,30H29.286A.675.675,0,0,0,30,29.286V26h2.143a3.537,3.537,0,0,0,3.571-3.571V9.571A3.582,3.582,0,0,0,32.143,6Zm-25-4.571H28.571V6H7.143Zm0,27.143V18H28.571v7.286h0v3.286Zm27.143-6.143a2.1,2.1,0,0,1-2.143,2.143H30V18h.714a.714.714,0,0,0,0-1.429H5A.714.714,0,1,0,5,18h.714v6.571H3.571a2.1,2.1,0,0,1-2.143-2.143V9.571A2.1,2.1,0,0,1,3.571,7.429H32.143a2.1,2.1,0,0,1,2.143,2.143Z"/></svg></a>
                </li>
                </ul>
                </div>
              
                </div>
                <br>
                <div id="printArea">
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
                                <div style="font-size:25px;font-weight:bold">PURCHASE ORDER</div>
                                <div style="font-size:16px;color:black">
                                purchaseorder:  {{$purchaseorder->purchaseorder_name}}
                                </div>
                               
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="font-size:16px">Bill To:</div>
                                 <p>Supplier Name: {{$purchaseorder->suppliers['name']}}</p>
                                <p>Phone No : {{$purchaseorder->suppliers['phone_no']}}</p>
                               <p> Address : {{$purchaseorder->suppliers['address']}}</p>
                            </div>
                            <div class="col-md-6 rightAlign">
                                Order Date: {{$purchaseorder->purchaseorder_date}}<br>
                                Ref#: {{$purchaseorder->references}}
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="coloredHeader">Item & Serial No.</th>
                                    <th class="coloredHeader">Qty</th>
                                    <th class="coloredHeader">Rate</th>
                                    <th class="coloredHeader">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchaseorderlists as $purchaseorderlist)
                                <tr>
                                    <td>{{$purchaseorderlist->products['product_name']}} ({{$purchaseorderlist->products['serial_no']}})</td>
                                    <td>{{$purchaseorderlist->quantity}}</td>
                                    <td>{{$purchaseorderlist->price}}</td>
                                    <td>{{$purchaseorderlist->amount}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                        <hr>
                    <div class="row" style="font-size:16px">
                            <div class="col-md-9" style="text-align: right;">
                                 Subtotal : 
                            </div>
                            <div class="col-md-2" style="text-align: right;">
                                {{$purchaseorder->subtotal}}
                            </div>
                            <br/>
                            <div class="col-md-9" style="text-align: right;">
                                Discount(%) : 
                                </div>
                        <div class="col-md-2" style="text-align: right;">
                            {{$purchaseorder->discount}}%
                            </div>

                            <br/>
                            <div class="col-md-9" style="text-align: right;">
                                GST(%) : 
                                </div>
                        <div class="col-md-2" style="text-align: right;">
                            {{$purchaseorder->gst}}%
                            </div>
                            </div>
                              <hr>
                                <div class = "row" style="font-size:16px">
                                <div class="col-md-9" style="text-align: right;">
                                Grand total(SGD) : 
                                </div>
                                <div class="col-md-2" style="text-align: right;">
                                {{$purchaseorder->grandtotal}}
                                </div> 
                                </div>   
                    </div>
             <div class="tab-pane fade" id="quotation" role="tabpanel" aria-labelledby="quotation-tab">
             <div style="text-align: center;">
             {!!Form:: open(['action'=>['PurchaseOrdersController@uploadFile',$purchaseorder->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                {{csrf_field()}}
             <h1> CLICK TO UPLOAD FILE</h1>
             <br/>
          <svg xmlns="http://www.w3.org/2000/svg" width="400px" height="400px" viewBox="0 0 24 24">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 14h-3v3h-2v-3H8v-2h3v-3h2v3h3v2zm-3-7V3.5L18.5 9H13z"/>
</svg>
<br/>
{!!Form::file('file',array('id'=>'addfile','file'=> true, 'class'=>'form-control' ))!!}
<br/>
{{Form::hidden('_method','PUT')}}
<div class="centerButton">
            <button type="submit" class="btn btn-warning btn-lg yellowButton">Upload File</button>
        </div>
        {!! Form::close() !!}
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
        padding: 3% 0;
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

    .noTopBorder {
        border-top:none !important;
    }

    .noBottomBorder {
        border-bottom:none !important;
    }

   
</style>

<script>
function abc(){

    var page = document.body.innerHTML;
    var printcontent = document.getElementById('printArea').innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = page;

}
</script>



