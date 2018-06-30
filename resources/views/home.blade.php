@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')

<div class="container-fluid">
    <div class="yellowBackground">
        <div class="salesActivity d-flex flex-column">
        <a href="{{URL::to('/salesorder')}}"> <label class="label">Sales Order Status</label></a>
            <div class="d-flex flex-row">
                <div class="p-2 card salesCards card1">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber1">
                        {{$salesid1}}
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE PACKED
                        </div>
                    </div>
                </div>
                <br>
                <div class="p-2 card salesCards card2">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber3">
                    {{$salesid2}}
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE SHIPPED
                        </div>
                    </div>
                </div>

                <div class="p-2 card salesCards card3">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber3">
                    {{$salesid3}}
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE SHIPPED
                        </div>
                    </div>
                </div>
                <div class="p-2 card salesCards card4">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber4">
                        {{$salesid4}}
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE REJECTED
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="yellowBackground">
        <div class="salesActivity d-flex flex-column">
        <a href="{{URL::to('/purchaseorder')}}"> <label class="label">Purchase Order Status</label></a>
            <div class="d-flex flex-row">
                <div class="p-2 card salesCards card1">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber1">
                        {{$purchaseid1}}
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE PACKED
                        </div>
                    </div>
                </div>
                <br>
                <div class="p-2 card salesCards card2">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber3">
                        {{$purchaseid2}}
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE SHIPPED
                        </div>
                    </div>
                </div>

                <div class="p-2 card salesCards card3">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber3">
                        {{$purchaseid3}}
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE SHIPPED
                        </div>
                    </div>
                </div>
                <div class="p-2 card salesCards card4">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber4">
                        {{$purchaseid4}}
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE REJECTED
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection