@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')

<div class="container-fluid">
    <div class="pageContent">
        <div class="d-flex">
            <h3 class="title mr-auto p-2">Employees</h3>
            <div class="p-2">
                <a href="/addemployee">
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
        @if(count($users) >0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Department</th>
                    <th>Username</th>
                    <th>Bank Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
                <tr>
                    <td></td>
                    <td>{{$user ->name}}</td>
                    <td>{{$user ->email}}</td>
                    <td>{{$user ->phone_number}}</td>
                    <td>{{$user ->department}}</td>
                    <td>{{$user ->username}}</td>
                    <td>{{$user -> bankdetails}}</td>    
                    <td>
                    <div class="d-flex flex-row user-buttons">
                        <div class="p-2">
                        <a href="/employee/{{$user->id}}/edit">
                            <button type="button" class="btn btn-warning yellowButton">
                                <label class="addLabel">Edit</label>
                            </button>
                            </div>
                       <div class="p-2">
                              {!!Form::open(['action' => ['UserController@destroy', $user->id],'onsubmit' => 'return ConfirmDelete()','method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger action-buttons'])}}
                                {!!Form::close()!!} 
                                </a>
                                </div>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection