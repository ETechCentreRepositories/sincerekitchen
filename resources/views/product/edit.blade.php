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
                            {{Form::label('sku', 'SKU', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('sku', $product->serial_no, ['class' => 'form-control'])}}
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
                            {{Form::textarea('descriptions', '', ['class' => 'field'])}}
                        </div>
                    </div>
                </div>
                <div class="centerImage col-md-3">
                    <svg class="addImage" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 46"><title>image</title><g id="Layer_2" data-name="Layer 2"><g id="Livello_1" data-name="Livello 1"><path d="M42,0H4A4,4,0,0,0,0,4V42a4,4,0,0,0,4,4H42a4,4,0,0,0,4-4V4A4,4,0,0,0,42,0ZM4,2H42a2,2,0,0,1,2,2V26.65L33.23,15.87,23,26.1,17.89,21,2,36.87V4A2,2,0,0,1,4,2ZM42,44H4a2,2,0,0,1-2-2V39.68l.06,0L17.89,23.81,23,28.93,33.23,18.7,43.62,29.09a.8.8,0,0,0,.38.23V42A2,2,0,0,1,42,44Z"/><path d="M12.77,17.89a5.12,5.12,0,1,0-5.11-5.12A5.12,5.12,0,0,0,12.77,17.89Zm0-8.23a3.12,3.12,0,1,1-3.11,3.11A3.12,3.12,0,0,1,12.77,9.66Z"/></g></g></svg>
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
                            {{Form::text('manufacturer', '', ['class' => 'form-control'])}}
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
                            {{Form::text('sellingprice', $product->unit_price, ['class' => 'form-control'])}}
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
            <button type="submit" class="btn btn-warning btn-lg yellowButton">Add Product</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>