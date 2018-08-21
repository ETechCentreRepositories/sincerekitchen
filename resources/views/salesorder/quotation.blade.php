@extends('layouts.app')
	@section('content')
	



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



						<header>
								 <div class="row">
								<div class="col-md-3">
									<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/singapore_brands.png" style="width: 60%;">
								</div>
								<div class="col-md-6" style="text-align:center;">
									<img src="http://ehostingcentre.com/sincerekitchen/storage/logo/logo.png" style="width:100%; height: 50%;">
	
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
						
						 
						</header>
						  <br/>
						  <br/>
						   
							
							<div style="text-align:center; text-decoration: underline;">
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
							
						
							 
						
							
							
							
		  	 <div style="font-size: 14px;">
								<div style="text-decoration: underline;">NOTE:</div><br>
									
								<input type="text" style="width:100%;border:0;"value="- Owner to provide all necessary M&E utilities points not more than 1m away from equipment location">
								<input type="text" style="width:100%;border:0;"value="- Delivery: 6 - 8 weeks upon confirmation">
								<input type="text" style="width:100%;border:0;"value="- Warranty: Products will be warranted 12 months against manufacturing defects on parts only.">
								<input type="text" style="width:100%;border:0;"value="- Validity: 30 Days from above date">
								<input type="text" style="width:100%;border:0;"value="- Terms: 50% downpayment, Balance C.O.D">
								<p>- Overdue interest will be charged on all unpaid amount(s) and any other expenses incurred by us the Seller on you the Purchaser’s behalf from the due date to the date of payment at twelve percent (12%) per annum or such other rate as may be fixed by us the Seller at our absolute discretion from time to time and such rate shall apply before as well as after judgment to any judgment debt which we the Seller may recover against you the Purchaser</p>

	<p>- All costs charges and expenses (including legal costs on a full indemnity basis) which we the Seller may incur in enforcing this Quotation / Cash Sale Receipt / Invoice shall be borne by the Purchaser</p>


								
							   
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
			   
					   
					  
							</tbody>
							
							
							 
						  
						<footer>
							
								 <div class="col-md-12" >
							<img style="width: 100%; height: 50%;" src="http://ehostingcentre.com/sincerekitchen/storage/images/footer.png" >
								 </div>
							 
						   
								
						</footer>
		
						
						
						
						
				
					  
						</table>
