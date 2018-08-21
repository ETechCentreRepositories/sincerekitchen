	@extends('layouts.app')
	@section('content')
	@include('inc.sidebar')


	<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color:#F8F7F7;" >
		<div class="container">
			<a class="nav navbar-left" href="{{ url('/') }}">
				
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<ul class="navbar-nav mr-auto">
					 <a href="http://ehostingcentre.com/sincerekitchen/"><img src="/sincerekitchen/storage/logo/sincerekitchen_logo.png" class="logo"/></a>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
																	<!-- Authentication Links -->
					 <!-- @guest
					<li><a class="nav-link" style="color:#e3b417;" href="{{ route('login') }}">{{ __('Login') }}</a></li>
					 @else -->
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }}<span class="caret"></span>
						</a>

						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					<!-- @endguest  -->
				</ul>
			</div>
		</div>
	</nav>


	<div class="container-fluid">
		<div class="pageContent">
			<div class="row">
				<div class="col-md-4 scrollMenu">
					<div class="row">
						<div class="col-md-7">
							<h3>Details Sales Order</h3>
						</div>
						<div class="col-md-1">
							<a href="/sincerekitchen/addsalesorder">
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
						<br><br><br>
					</div>
					<div class="salesorderlist">
						{{-- <div>{{$salesorder->customers['name']}}</div>
						<div>{{$salesorder->salesorder_name}}</div>
						<div>{{$salesorder->salesorder_date}}</div> --}}
					</div>
				</div>
				<div class="col-md-8">
					<h3>{{$salesorder->salesorder_name}}</h3>

					<div class="row">
					<div class="col-md-9">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="salesorder-tab" data-toggle="tab" href="#salesorder" role="tab" aria-controls="salesorder" aria-selected="true">DELIVERY ORDER</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="quotation-tab" data-toggle="tab" href="#quotation" role="tab" aria-controls="quotation" aria-selected="false">QUOTATION</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="false">INVOICE</a>
						</li>
					</ul>
					</div>
					<div class="col-md-2">
					<ul class="nav" id="myTab" role="tablist">
					<li>
				   <a onclick="printDiv('printArea')"> <svg  style="width:35px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.714 30"><defs><style>.cls-1 {fill: #333;}</style></defs><path  id="printer" data-name="Path 37" class="cls-1" d="M32.143,6H30V.714A.675.675,0,0,0,29.286,0H6.429a.675.675,0,0,0-.714.714V6H3.571A3.537,3.537,0,0,0,0,9.571V22.429A3.537,3.537,0,0,0,3.571,26H5.714v3.286A.675.675,0,0,0,6.429,30H29.286A.675.675,0,0,0,30,29.286V26h2.143a3.537,3.537,0,0,0,3.571-3.571V9.571A3.582,3.582,0,0,0,32.143,6Zm-25-4.571H28.571V6H7.143Zm0,27.143V18H28.571v7.286h0v3.286Zm27.143-6.143a2.1,2.1,0,0,1-2.143,2.143H30V18h.714a.714.714,0,0,0,0-1.429H5A.714.714,0,1,0,5,18h.714v6.571H3.571a2.1,2.1,0,0,1-2.143-2.143V9.571A2.1,2.1,0,0,1,3.571,7.429H32.143a2.1,2.1,0,0,1,2.143,2.143Z"/></svg></a>
					</li>
					</ul>
					</div>
				  
					</div>
					<br>
					<div id="printArea">
					<div class="tab-content format" id="myTabContent">
						<div class="tab-pane fade show active" id="salesorder" role="tabpanel" aria-labelledby="salesorder-tab">
							<div class="row">
							   <div class="col-md-3">
									<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/singapore_brands.png" style="width: 70%;">
								</div>
							   <div class="col-md-6" style="text-align:center;">
									<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/logo.png" style="width: 90%;height: 10%;"><br>
									10 Ubi Crescent<br>
									#03-07 Ubi Techpark, Singapore 408564<br>
									Tel: (65) 6280 8893   Fax: (65) 6280 9093<br>
									Company & GST Reg. No.: 201007086E
								</div>
							  
								 <div class="col-md-3" style="text-align:right;margin-top: 40px;">
									<div class="row">
										<div class="col-md-6">
											<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/promising.png" style="width: 135%;">
										</div>
										<br/>
										<div class="col-md-6">
											<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/bizsafe.png" style="width: 130%;">
										</div>
									</div>
								</div>
							
								   
						 
				</div>
				 <br/>                        
				 <div style="text-align:center; text-decoration: underline;">
								<b>DELIVERY ORDER</b>
							</div>
							 
							 <br/>   
				
			
						
						
							<div class="row">
								<div class="col-md-8"  style="font-size:16px; color: black;">
								{{$salesorder->customers['companyname']}}
								 <br/>
								{{$salesorder->customers['billingaddress']}}
								 <br/>
								Attn: {{$salesorder->customers['name']}}
								<br/>
								 Tel: {{$salesorder->customers['phone_no1']}}
								<br/>
								 Fax: {{$salesorder->customers['fax']}}
								<br/>
								 H/P: {{$salesorder->customers['name']}}
								<br/>
								Email: {{$salesorder->customers['email']}}
							   
								
								  
								   
								
								   
								</div>
								<div class="col-md-4"  style="font-size:16px; color: black;">
									Ref: {{$salesorder->salesorder_name}}<br/><br/>
									Date: {{ date('d-m-Y', strtotime($salesorder->salesorder_date)) }}
											  
								</div>
							</div>
							
							<br/>
							  <div class="col-md-12" style="text-decoration: underline;">
									<b>RE: {{$salesorder->references}}</b>
								</div>
							<br/>    
							<table class="table">
								<thead>
									<tr>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline">S/N</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline">Description</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline">Quantity</th>
							   
									</tr>
								</thead>
								<tbody>
									@foreach ($salesorderlists as $salesorderlist)
									<tr>
								  
										<td class="noTopBorder"><input type='text' style="width: 30px;" id="getsn"></td>
									
										<td class="noTopBorder" style="word-break: break-all;width: 500px">{{$salesorderlist->products['descriptions']}}</td>
										<td class="noTopBorder" >{{$salesorderlist->quantity}} pc </td>
									   
									</tr>
									@endforeach
								</tbody>
							</table>  
							
							<hr>
						  
							
			
						  <br/>
							<div class="row">
								<div class="col-md-5">
									Yours faithfully,<br><br><br><br>
									___________________<br>
								   <input type="text" style="width:160px"><br>
									HP: <input type="text" style="width:160px">
								</div>
								<div class="col-md-6 rightAlign">
									Received In Good Condition<br><br><br><br>
									___________________<br>
								</div>
							</div>
					   
					   <br/>
					   <br/>
					  
					   
				 
						
						</div>
						
						
						
						
						
						
						
						<div class="tab-pane fade" id="quotation" role="tabpanel" aria-labelledby="quotation-tab" >
						<table border="1px" style="margin: 0px;width: 100%;" >
						<thead id="headq" height="100">
							<tr>
							<th id="header">
								 <div class="row">
								<div class="col-md-3">
									<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/singapore_brands.png" style="width: 60%;">
								</div>
								<div class="col-md-6" style="text-align:center;">
									<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/sklogo.png" style="width: 100%;height: 50%;">
									
								</div>
								<div class="col-md-3" style="text-align:right;margin-top: 40px;">
									<div class="row">
										<div class="col-md-6">
											<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/promising.png" style="width: 135%;">
										</div>
										<br/>
										<div class="col-md-6">
											<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/bizsafe.png" style="width: 90%;padding-top:25px; ">
										</div>
									</div>
								</div>
							</div>
							</th>
							</tr>
						 
							</thead>
						
						 
						   
							
							<tbody>
							<br/>
								<tr>
								<td>
								
							<div style="text-align:center; text-decoration: underline;">
								<br/>
								<b>QUOTATION</b>
							</div>
							<br>
						   <div class="row">
								<div class="col-md-8"  style="font-size:16px; color: black;">
								{{$salesorder->customers['companyname']}}
								 <br/>
								{{$salesorder->customers['billingaddress']}}
								 <br/>
								Attn: {{$salesorder->customers['name']}}
								<br/>
								 Tel: {{$salesorder->customers['phone_no1']}}
								<br/>
								 Fax: {{$salesorder->customers['fax']}}
								<br/>
								 H/P: {{$salesorder->customers['name']}}
								<br/>
								Email: {{$salesorder->customers['email']}}
							   
								
								  
								   
								
								   
								</div>
								<div class="col-md-4 rightalign"  style="font-size:16px; color: black;">
								
									<p id='ref'>Quotation Ref: {{$salesorder->salesorder_name}}</p>                                 
									Date: {{ date('d-m-Y', strtotime($salesorder->salesorder_date)) }}
								</div>
							</div>
							<br>
							<br>
		  
							<div class="row">
								<div class="col-md-1">
								</div>
								<div class="col-md-11" style="text-decoration: underline;">
									<b>RE: {{$salesorder->references}}</b>
								</div>
							</div>
							</td>
							</tr>
							
					  
							
							<br>
							
							
							<tr>
							 <td>
							<table class="table" >
								<thead>
									<tr>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline" >S/N</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline ">Description</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline; text-align: center" >Quantity</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline ;text-align:center">Price (S$)</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline;text-align: right">Amount (S$)</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($salesorderlists as $salesorderlist)
									<tr>
										<td class="noTopBorder"><input type='text' style="width: 30px;"></td>
										<td class="noTopBorder" style="word-break: break-all;width: 450px">{{$salesorderlist->products['descriptions']}}</td>
										<td class="noTopBorder"  style="text-align: center;">{{$salesorderlist->quantity}} pc</td>
										<td class="noTopBorder" style="text-align: center;"id="price">{{$salesorderlist->price}}</td>
										<td class="noTopBorder"style="text-align: center;" id ="amount">{{$salesorderlist->amount}}</td>
									</tr>
									@endforeach
									
									
								</tr> 
						   
									
								</tbody>
							</table>
	
								<br/>

							<div>
								<table width ="100%" style="font-size:16px;font-weight: bold;">
									<tr>
										<td width="8%"></td>
											<td width="55%"></td>
											<td width="19%" style="text-align:center;">Sub-Total(SGD)</td>
											<td style="text-align:center;">{{$salesorder->subtotal}}</td>
										</tr>
										 <tr>
											<td width="8%" ></td>
											<td width="55%"></td>
											
											<td width="19%" style="text-align:center;">GST 7%</td>
											<td style="text-align:center;">{{$salesorder->gstresult}}</td>
										</tr>
								 <tr>
									<td width="8%" ></td>
									<td width="55%"></td>
											
									<td width="19%" style="text-align:center;" >Grand Total(SGD)</td>
									<td style="text-align:center;text-decoration: overline underline;">{{$salesorder->grandtotal}}</td>
								</tr>
										   
										</table>
				
								</div>
							
						
							 
							</td>
							
							
							
							</tr>
							
							
							
							
							<tr>
								<td>
							
		  	 <div style="font-size: 14px;">
								<div style="text-decoration: underline;">NOTE:</div><br>
									
								<input type="text" style="width:100%;border:0;"value="- Owner to provide all necessary M&E utilities points not more than 1m away from equipment location">
								<input type="text" style="width:100%;border:0;"value="- Delivery: 6 - 8 weeks upon confirmation">
								<input type="text" style="width:100%;border:0;"value="- Warranty: Products will be warranted 12 months against manufacturing defects on parts only.">
								<input type="text" style="width:100%;border:0;"value="- Validity: 30 Days from above date">
								<input type="text" style="width:100%;border:0;"value="- Terms: 50% downpayment, Balance C.O.D">
								<div style="color: black">
- Overdue interest will be charged on all unpaid amount(s) and any other expenses incurred by us the Seller on you the Purchaser’s behalf from the due date to the date of payment at twelve percent (12%) per annum or such other rate as may be fixed by us the Seller at our absolute discretion from time to time and such rate shall apply before as well as after judgment to any judgment debt which we the Seller may recover against you the Purchaser<br/>
- All costs charges and expenses (including legal costs on a full indemnity basis) which we the Seller may incur in enforcing this Quotation / Cash Sale Receipt / Invoice shall be borne by the Purchaser

</div>

								
							   
							</div>
							<br>
							<div class="row">
								<div class="col-md-6">
									Yours faithfully,<br><br><br><br>
									______________<br>
								  <input type="text" style="width:160px"><br>
									HP: <input type="text" style="width:160px">
								</div>
								<div class="col-md-6" style="text-align:right" >
									We accept the above quotation<br><br><br><br>
									______________<br>
								</div>
							</div>
						 
							<br/><br/>
						  
							<div>
						 
							</div>  
								   
				</td>
						 </tr>         
					   
					  
							</tbody>
							
							
							 
						  
						<tfoot id="tfootq" >
								<tr>   
								<th id="footer" style="bottom: 0;">
								 <div class="col-md-12" >
							<img style="width: 100%; height: 50%;" src="http://ehostingcentre.com/sincerekitchen/storage/images/footer.png" >
								 </div>
							 
						   
									</th>
								</tr>
						</tfoot>
		
						
						
						
						
				
					  
						</table>
						
						  </div>
						<div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
							<div class="row">
								<div class="col-md-3">
									<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/singapore_brands.png" style="width: 70%;">
								</div>
								<div class="col-md-6" style="text-align:center;">
								<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/logo.png" style="width: 90%;height: 10%;">
								<br>10 Ubi Crescent<br>
									#03-07 Ubi Techpark, Singapore 408564<br>
									Tel: (65) 6280 8893   Fax: (65) 6280 9093<br>
									Company & GST Reg. No.: 201007086E
								</div>
							   <div class="col-md-3" style="text-align:right;margin-top: 40px;">
									<div class="row">
										<div class="col-md-6">
											<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/promising.png" style="width: 135%;">
										</div>
										<br/>
										<div class="col-md-6">
											<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/bizsafe.png" style="width: 130%;">
										</div>
									</div>
								</div>
							</div>
							<br>
							<div style="text-align:center; text-decoration: underline;">
								<b>TAX INVOICE</b>
							</div>
							<br>
							<div class="row">
								<div class="col-md-8" style="font-size:16px; color: black;">
								{{$salesorder->customers['companyname']}}
								 <br/>
								{{$salesorder->customers['billingaddress']}}
								 <br/>
								Attn: {{$salesorder->customers['name']}}
								<br/>
								 Tel: {{$salesorder->customers['phone_no1']}}
								<br/>
								 Fax: {{$salesorder->customers['fax']}}
								<br/>
								 H/P: {{$salesorder->customers['name']}}
								<br/>
								Email: {{$salesorder->customers['email']}}
							   
								
			   
								</div>
								<div class="col-md-4 " style="font-size:16px; color: black;">
									<p id='inv'>Quotation Ref: {{$salesorder->salesorder_name}}</p>
									Date: {{ date('d-m-Y', strtotime($salesorder->salesorder_date)) }}
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-1">
								</div>
								<div class="col-md-11" style="text-decoration: underline;">
									<b>RE: {{$salesorder->references}}</b>
								</div>
							</div>
							<br>
							<table class="table" style="margin: 0px auto;">
								<thead>
									<tr>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline">S/N</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline" >Description</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline" >Quantity</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline" >Price (S$)</th>
										<th class="noBottomBorder noTopBorder" style="text-decoration:underline" >Amount (S$)</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($salesorderlists as $salesorderlist)
									<tr>
										<td class="noTopBorder"><input type='text' style="width: 30px;"></td>
										<td class="noTopBorder"style="word-break: break-all;width: 500px">{{$salesorderlist->products['descriptions']}}</td>
										<td class="noTopBorder" >{{$salesorderlist->quantity}} pc</td>
										<td class="noTopBorder" id="price1">{{$salesorderlist->price}}</td>
										<td class="noTopBorder" id="amount1">{{$salesorderlist->amount}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							
							
							
							
							<div class="row" style="font-size:16px;font-weight: bold;">
								<div class="col-md-10" style="text-align: right;">
									Subtotal : 
								</div>
								<div class="col-md-2" style="text-align: right;">
									{{$salesorder->subtotal}}
								</div>
								<br/>
						  
						   
								 <div class="col-md-10" style="text-align: right;">
									GST(7%) : 
								</div>
								<div class="col-md-2" style="text-align: right;">
									{{$salesorder->gstresult}}
									   <hr style="height:1px;border:none;color:#333;background-color:#333;" />
						   
								</div>
								  
							   
						   
							</div>
							<div class = "row" style="font-size:16px;font-weight: bold;">
								<div class="col-md-10" style="text-align: right;">
									Grand total(SGD) : 
								</div>
								<div class="col-md-2" style="text-align: right;">
									{{$salesorder->grandtotal}}
									 <hr style="height:1px;border:none;color:#333;background-color:#333;" />
								</div> 
								
						   
							</div>
							
							<br>
							<div style="font-size: 14px;">
								<div style="text-decoration: underline;">NOTE:</div><br>
								
	 - All Cheques issued to be made payable to “Sincere Kitchen Equipment Pte Ltd”.<br/>
	- Kindly highlight any discrepancy within 3 days of this invoice, else this invoice shall be deemed to be correct<br/>
	- The Goods shall at all times during the continuance of this invoice remain the property of the Firm until the Purchaser pays the full sale price<br/>
	- Overdue interest will be charged on all unpaid amount(s) and any other expenses incurred by us the Seller on you the Purchaser’s behalf from the due date to the date of payment at twelve percent (12%) per annum or such other rate as may be fixed by us the Seller at our absolute discretion from time to time and such rate shall apply before as well as after judgment to any judgment debt which we the Seller may recover against you the Purchaser<br/>
	- All costs sharges and expenses (including legal costs on a full indemnity basis) which we the Seller may incur in enforcing this Quotation / Cash Sale Receipt / Invoice shall be borne by the Purchaser.
							
							</div>
							<br>
							<div class="row">
								<div class="col-md-6">
									Yours faithfully,<br><br><br><br>
									_______<br>
								   K.W Lim<br>
									HP: 9695 4077
								</div>
							</div>
						</div>
					</div>
				   
					
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>

	$(document).ready(function(){

		  var str = document.getElementById("ref").innerHTML;
		   var str1 = document.getElementById("inv").innerHTML;
		   var price = document.getElementById("price").innerHTML;
		   var price1 = document.getElementById("price1").innerHTML;
		   var amount = document.getElementById("amount").innerHTML;
		   var amount1 = document.getElementById("amount1").innerHTML;
		   
		   if(price == "0.00" ||price1=="0.00"||amount == "0.00" || amount1 == "0.00" ){
			document.getElementById("price").innerHTML = "F.O.C";
			document.getElementById("price1").innerHTML = "F.O.C";
			document.getElementById("amount").innerHTML = "F.O.C";
			document.getElementById("amount1").innerHTML = "F.O.C";
		   } 
		  
		var show = str.replace(/DO/g, 'Q');
		var show1 = str.replace(/DO/g, 'INV');
		

		document.getElementById("ref").innerHTML = show;
		document.getElementById("inv").innerHTML = show1;
		
	});

	</script>

	@endsection

	<style>
		body {
			background: white !important;
		}

		.scrollMenu {
			border-right: 1px solid rgba(0, 0, 0, 0.1);
			height: 500px;
			overflow-y: auto;
		}

		.salesorderlist {
			border-top: 1px solid rgba(0, 0, 0, 0.1);
			padding: 3% 0;
		}

		.rightAlign {
			text-align: right;
		}

		.format {
			padding: 5%;
		}

		.coloredHeader {
			background: lightgrey;
		}

		.noTopBorder {
			border-top:none !important;
		}

		.noBottomBorder {
			border-bottom:none !important;
		}
		@media print {
thead { display: table-header-group; }
tfoot { display: table-footer-group; }
}
		
		
   	
	
		
	   
	</style>

	<script>


	function printDiv(divName){
		  var printContents = document.getElementById(divName);
		  var allInputs = printContents.querySelectorAll("input,select,textarea");
		  console.log(allInputs);
	for( var counter = 0; counter < allInputs.length; counter++)
	{
		var input = allInputs.item(counter);
		console.log(input);
		input.setAttribute("value", input.value);
		
	   
	  
		
		
		
	}
	  
		  
	var elementprintContents = document.getElementById(divName).innerHTML;  
		  
	  var originalContents = document.body.innerHTML;
	  

	  document.body.innerHTML = elementprintContents;

	  window.print();

	  document.body.innerHTML = originalContents;

	}

		/*function abc(){
		

		var page = document.body.innerHTML;
	   
		
		var printcontent = document.getElementById('printArea').innerHTML;
		var getallsn = document.querySelectorAll("[id='getsn']");
		
		for($i =0;$i<getallsn.length;$i++){
		console.log(getallsn[$i].value);
		
		}
	  
		
	   
	   

	  
		document.body.innerHTML = printcontent;
		
		window.print();
	   
		
		 document.body.innerHTML = page;
		
	   
	}
	*/


	</script>