@extends('layouts.app')
@section('content')

{!! Form::open(['action' =>['UserController@store'],'method'=> 'POST']) !!}
            {{csrf_field()}}  
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
                            {{Form::text('email','', ['class' => 'form-control'])}}
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
                         <input name="password" type="password" class="form-control">
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
                            {{Form::text('department', '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="centerButton">
                <button type="submit" class="btn btn-warning btn-lg yellowButton">Saved</button>
            </div>
        </div>

       
    </div>
</div>
{{!! Form:: close()!!}}
@endsection