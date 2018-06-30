@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')


<div class="container-fluid">
    <div class="pageContent">
        <h3 class="title">Add Item</h3>
        <div class="productTab d-flex flex-row">
            <div class="productType p-2">Product</div>
            <div class="verticalLinePadding p-2">
                <div class="yellowVerticalLine"></div>
            </div>
            <div class="productType p-2">Spare parts</div>
        </div>
        <hr>
        <div class="ProductDetails">
            <h3 class="title">Product Details</h3>
            {!!Form:: open(['action'=>['ProductsController@store'],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                {{csrf_field()}}
            <div class="row">
               
                
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('productname', 'Product Name', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('productname','', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('serialno', 'SerialNo.', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('serialno','' , ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('dimension', 'Dimension (mm)', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('dimension', '', ['class' => 'form-control'])}}
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
               
                <img src= ""  id="addImage" width="300px"/>
                <br>
                {!!Form::file('image',array('id'=>'image_add','file'=> true))!!}
                </div>
            </div>
        </div>
        <hr>
        <div class="manufacturerDetails">
                <div class="d-flex">
                    <h3 class="title mr-auto p-2">Manufacturer Details</h3>
                    <div class="p-2">
                        <div class="checkbox">
                            <label><input type="checkbox" value=""></label>
                        </div>
                    </div>
                </div>
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
                            {{Form::text('modelno', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="salesInformation">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex">
                        <h3 class="title mr-auto p-2">Sales Information</h3>
                        <div class="p-2">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('sellingprice', 'Selling Price', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('sellingprice', '', ['class' => 'form-control'])}}
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
                    <div class="d-flex">
                        <h3 class="title mr-auto p-2">Purchase Information</h3>
                        <div class="p-2">
                            <div class="checkbox">
                                <label><input type="checkbox" value=""></label>
                            </div>
                        </div>
                    </div>
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
        <div class="centerButton">
            <button type="submit" class="btn btn-warning btn-lg yellowButton">Add Product</button>
        </div>
       
    </div>
    {!! Form::close() !!}

</div>
