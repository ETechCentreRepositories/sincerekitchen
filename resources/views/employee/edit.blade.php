@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')

 {!! Form::open(['action' =>['UserController@update',$users->id],'method'=> 'POST'])!!}

{{csrf_field()}}   
<div class="container-fluid">
    <div class="pageContent">
        <h3 class="title">Edit User</h3>
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
                            {{Form::text('name', $users-> name, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('email', 'Email', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('email', $users-> email, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('username', 'Username', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('username', $users->username, ['class' => 'form-control'])}}
                        </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('phonenumber', 'Phone Number', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('phonenumber', $users-> phone_number, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('bankdetails', 'Bank Details', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('bankdetails',$users->bankdetails, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('department', 'Department', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('department',$users->department , ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

            {{Form::hidden('_method','PUT')}}
            <div class="centerButton">
                <button type="submit" class="btn btn-warning btn-lg yellowButton">Saved</button>
            </div>
        </div>
        
    </div>
</div>
{{!! Form:: close()!!}}
@endsection