@extends('layouts.app')
@include('inc.navbar')
@section('content')
@include('inc.sidebar')

<div class="container-fluid">
    <div class="pageContent">
        <h3 class="title">Add User</h3>
        <hr>
        <div class="ProductDetails">
            <h3 class="title">User Details</h3>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('name', 'Name', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('name', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('email', 'Email', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('email', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('username', 'Username', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('username', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('password', 'Password', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('password', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('phonenumber', 'Phone Number', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('phonenumber', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('bankdetails', 'Bank Details', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('bankdetails', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
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
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="centerButton">
                <button type="button" class="btn btn-warning btn-lg yellowButton">Add User</button>
            </div>
        </div>
    </div>
</div>