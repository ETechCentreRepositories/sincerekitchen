@extends('layouts.app')
@section('content')
@include('inc.navbar')

@include('inc.sidebar')


  
<div class="container-fluid">
    <div class="pageContent">
        <div class="d-flex">
            <h3 class="title mr-auto p-2">Sales Order</h3>
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
    
       
            <input id="dateInput" type="text"  onkeyup="myDate()" class="fontawesome" name="searchDate" placeholder="Search Date"></th>
             <input id="salesInput" type="text" onkeyup="searchSales()"  class="fontawesome" name="searchSales" placeholder="Search Sales"></th>
             <input id="refInput" type="text" onkeyup="myRef()"  class="fontawesome" name="searchReferences" placeholder="Search ref"></th>
            <input id="custInput"  type="text"onkeyup="myCust()" class="fontawesome" name="searchcust" placeholder="Search CustName "></th>
        <input id="statusInput" type="text"  onkeyup="myStatus()" class="fontawesome" name="searchStatus" placeholder="Search Status"></th>
    
            
        <table class="table table-striped" id="myTable"> 
        @if(count($salesorders)>0)
            <thead>   
                <tr>
                    <th>Date </th>
                    <th>Sales Order#</th>
                    <th>References#</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Amount</th>
                   
                </tr>
              
            </thead>
            <tbody>
           @foreach($salesorders as $salesorder)
                <tr>
                     <td>{{$salesorder-> salesorder_date}}</td>
                     <td style="font-weight:bold; color:blue;"> <a href="{{URL::to('/salesorder',$salesorder->id)}}/">
                      {{$salesorder-> salesorder_name}}</a> </td>
                     <td>{{$salesorder-> references}}</td>
                     <td>{{$salesorder-> customers['name']}}</td>
                     <td style="color:red;">{{$salesorder->status['name']}}</td>
                     <td>S$ {{$salesorder->grandtotal}}</td>                       
                    <td>   
                        <div class="d-flex flex-row user-buttons">
                        @if ($salesorder->status_id == '2')
                        <div class="p-2">
                             <a href="/salesorder/{{$salesorder->id}}/edit">
                                <button type="button" class="btn btn-success yellowButton">
                                  <label class="addLabel">RE-Finalize Status</label>
                                </button> 
                            </div>
                     @endif 
                         @if ($salesorder->status_id == '3')
                        <div class="p-2">
                             <a href="">
                                <button type="button" class="btn btn-primary yellowButton">
                                <label class="addLabel">STATUS : DONE</label>
                                </button> 
                            </div>

                        <div class="p-2">
                             <a href="/salesorder/{{$salesorder->id}}/edit">
                                <button type="button" class="btn btn-warning yellowButton">
                                <label class="addLabel">Rejected</label>
                                </button> 
                            </div>
                            
                         @endif 


                        @if ($salesorder->status_id != '3' && $salesorder->status_id == '1' )
                            <div class="p-2">
                             <a href="/salesorder/{{$salesorder->id}}/edit">
                                <button type="button" class="btn btn-warning yellowButton">
                                    <label class="addLabel">Update Status</label>
                                </button> 
                            </div>
                            @endif


                            <div class="p-2">
                                {!!Form::open(['action' => ['SalesOrdersController@destroy', $salesorder->id], 'onsubmit' => 'return ConfirmDelete()','method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger action-buttons'])}}
                                {!!Form::close()!!}                          
                                
                             </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
            @endforeach
            <tr></tr>
            </tbody>
           
        </table>
        @endif
    </div>
</div>
@endsection



<script>

function myDate() {
 var input, filter, table, tr, td,tds,i;
  input = document.getElementById("dateInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  tds = table.getElementsByTagName("td");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function searchSales() {
 var input, filter, table, tr, td,tds,i;
  input = document.getElementById("salesInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  tds = table.getElementsByTagName("td");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myRef() {
 var input, filter, table, tr, td,tds,i;
  input = document.getElementById("refInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  tds = table.getElementsByTagName("td");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myCust() {
 var input, filter, table, tr, td,tds,i;
  input = document.getElementById("custInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  tds = table.getElementsByTagName("td");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myStatus() {
 var input, filter, table, tr, td,tds,i;
  input = document.getElementById("statusInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  tds = table.getElementsByTagName("td");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}





</script>
