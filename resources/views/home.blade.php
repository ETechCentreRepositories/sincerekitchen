@extends('layouts.app')
@include('inc.navbar')
@section('content')
@include('inc.sidebar')

<div class="container-fluid">
    <div class="yellowBackground">
        <div class="salesActivity d-flex flex-column">
            <label class="label">Sales Activity</label>
            <div class="d-flex flex-row">
                <div class="p-2 card salesCards card1">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber1">
                            0
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
                        <div class="salesNumber salesNumber2">
                            0
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
                            0
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE DELIVERED
                        </div>
                    </div>
                </div>
                <div class="p-2 card salesCards card4">
                    <div class="salesCardsBody card-body">
                        <div class="salesNumber salesNumber4">
                            0
                        </div>
                        Qty
                        <br><br>
                        <div class="salesProcess">
                            TO BE INVOICED
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="whiteBackground">
        <div class="purchaseOrder row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        PURCHASE ORDER
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        SALES ORDER
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        STATISTICS
                    </div>
                    <div class="col-md-1">
                        <div style="border-left:1px solid rgba(0, 0, 0, 0.125);height:200px"></div>
                    </div>
                    <div class="col-md-3">
                        TOTAL SALES
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                AUDIT TRAILS
            </div>
        </div>
    </div>
</div>