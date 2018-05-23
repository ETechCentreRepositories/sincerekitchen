@extends('layouts.app')
@include('inc.navbar')
@section('content')
@include('inc.sidebar')



<div class="container-fluid">
    <div class="pageContent">
        <h3 class="title">Edit Item</h3>
        <div class="productTab d-flex flex-row">
            <div class="productType p-2">Product</div>
            <div class="verticalLinePadding p-2">
                <div class="yellowVerticalLine"></div>
            </div>
            <div class="productType p-2">Spare parts</div>
        </div>
        <hr>
        <div class="ProductDetails">
            {!!Form::open(['action' => ['ProductsController@update',$product->id],'method' => 'POST']) !!}
            {{csrf_field()}}
            <h3 class="title">Product Details</h3>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('productname', 'Product Name', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('productname', $product->product_name, ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('quantity', 'Quantity', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-3">
                        
                            {{Form::selectRange('quantity',1,20,$product->quantity)}}
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('serialno', 'Serial No.', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('serialno', $product->serial_no, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('dimension', 'Dimension (mm)', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('dimension', $product->dimension, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('category', 'Category', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::select('category', array('Category' => 'Category'), null, ['class' => 'fieldDropDown'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('descriptions', 'Product Descriptions', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::textarea('descriptions',$product->descriptions, ['class' => 'field'])}}
                        </div>
                    </div>
                </div>
                <div class="centerImage col-md-3">
               
                <img src = ""  id="addImage" width="300px"/>
                <br>
                
                {{Form::file('image_add',array('id'=>'image_add'))}}
             
                </div>
            </div>
        </div>
        <hr>
        <div class="manufacturerDetails">
            <h3 class="title">Manufacturer Details</h3>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('manufacturer', 'Manufacturer', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('manufacturer', $product->manufacturer, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('brand', 'Brand', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::select('brand', array('Brand' => 'Brand'), null, ['class' => 'fieldDropDown'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('modelno', 'Model No', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('modelno', $product->model_no, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="salesInformation">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title">Sales Information</h3>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('sellingprice', 'Selling Price', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('sellingprice', $product->selling_price, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('tax', 'Tax', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::select('tax', array('Tax' => 'Tax'), null, ['class' => 'fieldDropDown'])}}
                        </div>
                    </div>
                </div>
                <div class="verticalLineWidth col-md-1">
                    <div class="verticalLinePadding">
                        <div class="grayVerticalLine"></div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h3 class="title">Purchase Information</h3>
                    <div class="row">
                        <div class="col-md-5">
                            {{Form::label('purchaseprice', 'Purchase Price (SGD)', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-7">
                            {{Form::text('purchaseprice', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        {{Form::hidden('_method','PUT')}}
        <div class="centerButton">
            <button type="submit" class="btn btn-warning btn-lg yellowButton">Save</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>