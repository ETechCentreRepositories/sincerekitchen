@extends('layouts.app')
@include('inc.navbar')
@section('content')
@include('inc.sidebar')

<div class="container-fluid">
    <div class="pageContent">
        <h3 class="title">Edit User</h3>
        <hr>
        <div class="ProductDetails">
            <h3 class="title">User Details</h3>
            <div class="row">
            {!! Form::open(['action' =>['CustomersController@update',$customer->id],'method'=> 'POST']) !!}
            {{csrf_field()}}  
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                         {{Form::label('name', 'Name', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('name', $customer-> name, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('email', 'Email', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('email', $customer-> email, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('phone', 'Phone Number', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('phone', $customer->phone_no, ['class' => 'form-control'])}}
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('ba', 'Billing Address', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('ba', $customer-> ba, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('sa', 'Shipping Address', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('sa', $customer-> sa, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-3">
                            {{Form::label('department', 'Department', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::select('department', array('Department' => 'Department'), null, ['class' => 'fieldDropDown'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('role', 'Role', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::select('role', array('Role' => 'Role'), null, ['class' => 'fieldDropDown'])}}
                        </div>
                    </div>
                </div> -->
                <div class="col-md-3"></div>
            </div>

            {{Form::hidden('_method','PUT')}}
            <div class="centerButton">
                <button type="submit" class="btn btn-warning btn-lg yellowButton">Saved</button>
            </div>
        </div>
        {{!! Form:: close()!!}}
    </div>
</div>