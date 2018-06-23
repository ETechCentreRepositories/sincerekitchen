@extends('layouts.app')
@section('content')


<div class="container-fluid">
{!! Form::open(['action' =>['SupplierController@update',$suppliers->id],'method'=> 'POST']) !!}
            {{csrf_field()}}  
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
                            {{Form::text('name',  $suppliers-> name, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('email', 'Email', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('email', $suppliers-> email, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('phone', 'Phone Number', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('phone', $suppliers->phone_no, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('address', 'Address', ['class' => 'formLabel'])}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('address', $suppliers->address, ['class' => 'form-control'])}}
                        </div>
                    </div> 

                   
            <div class="centerButton">
            {!!Form::hidden('_method','PUT')!!}
                <button type="submit" class="btn btn-warning btn-lg yellowButton">Saved</button>
            </div>
        </div>
    </div>

</div>
{!! Form:: close()!!}         


@endsection