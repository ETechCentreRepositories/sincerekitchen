@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')

<div class="container-fluid">
    <div class="pageContent">
    <div class="row">
        <div class="col-md-4"> 
        <div class="d-flex">        
            <h3 class="title mr-auto p-2">All Sales Orders</h3>
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
            <!-- <h1> Adding the list</h1> -->
            <h1> TRY</h1>
            <h1> TRY</h1>
            <h1> TRY</h1>
        </div>
            <div class="verticalLineWidth col-md-1">
                    <div class="verticalLinePadding">
                        <div class="grayVerticalLine"></div>
                    </div>
                </div>

            <div class="col-md-7">
                <div class="d-flex">
                    <div class="row">
                        <div class="col-md-4">
                <h3 class="title mr-auto p-2">Sales Order number</h3>
                            </div>
                            <div class="col-md-3">
             
                            </div>

                    </div>
                </div>
                <hr>

            </div>    

        </div>
    </div>
   
    </div>




</div>
@endsection

