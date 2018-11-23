@extends('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">View Pool Reservation</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">View Pool Reservation</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Reservation</header>
					</div>
					<div class="card-body row">
						<div  class="col col-lg-12"> 

							<section> 
								@foreach($pool_service as $pool)
								<div class="row">
									<div class="panel col col col-lg-12"> 
										<div class="panel-heading"> </div>
										<div class="panel-body">
											<table class="table table-condensed" style="background-color: white;">
												<thead>
													<th><h4><b>
													Personal Information</b></h4></th>
													<th></th>
												</thead>
												<tbody>
													<tr>
														<td><b>Name:</b>&nbsp;
															<span>
																{{$pool->fname}} &nbsp; {{$pool->lname}}
																<input type="hidden" name="fname" value="{{$pool->fname}}">
																<input type="hidden" name="lname" value="{{$pool->lname}}">

															</span></td>
															<td></td>

														</tr>
														<tr>
															<td><b>Address:</b>&nbsp;<span>{{$pool->address}}</span></td>
															<input type="hidden" name="address" value="{{$pool->address}}">
															<td></td>
														</tr>
														<tr>
															<td><b>Contact:</b>&nbsp;<span>{{$pool->contact_no}}</span></td>
															<input type="hidden" name="contact_no" value="{{$pool->contact_no}}">
															<td></td>
														</tr>
														<tr>
															<td><b>Email Address:</b>&nbsp;<span>{{$pool->email}}</span></td>
															<input type="hidden" name="email" value="{{$pool->email}}">
															<td></td>
														</tr>
														<tr>
															<td colspan="2"><h4><b>Service information</b></h4>

															</tr>
															<tr>
																<td><b>Service type:</b>&nbsp;<span>Pools</span></td>
																<input type="hidden" name="service_type" value="pools">

															</tr>

															<tr>
																<td><b>Check-in date:</b>&nbsp;<span>{{ \Carbon\Carbon::parse($pool->reservation_in)->format('F j, Y') }}</span></td>
																<input type="hidden" name="date_in" value="{{$pool->reservation_in}}">
																<td><b>Time in:</b>&nbsp;<span>{{\Carbon\Carbon::parse($pool->time_in)->format('h:i A')}}</span></td>
																<input type="hidden" name="time_in" value="{{$pool->time_in}}">
																<tr>
																	<td><b>Check-out date:</b>&nbsp;<span>{{\Carbon\Carbon::parse($pool->reservation_out)->format('F j, Y')}}</span></td>
																	<input type="hidden" name="date_out" value="{{$pool->reservation_out}}">
																	<td><b>Time out:</b>&nbsp;<span>{{\Carbon\Carbon::parse($pool->time_out)->format('h:i A')}}</span></td>
																	<input type="hidden" name="time_out" value="{{$pool->time_out}}">
																</tr>

															</tr>
															<tr>
																<td colspan="2 center"><center><h4><b>Pool Type</b></center></h4>
																</tr>
																<tr>
																	<tr>
																		<td colspan="2 center"><center>{{$pool->pool_type}}</center></h4>
																			<input type="hidden" name="pool_type" value="{{$pool->pool_type}}">
																		</tr>
																		<tr>
																			<td colspan="2 center"><center><h4><b>Number of Pax</b></center></h4>
																			</tr>
																			<tr>
																				<td colspan="2 center"><center>{{$pool->pool_pax}}</center></h4>

																				</tr>
																				<tr>

																					<td class="" >
																						<span class="pull-right" style="margin-right: 50px;"><strong >Total:</strong>
																							&nbsp;&nbsp; Php {{$pool->price}}<input type="hidden" name="total_price" value="{{$pool->pool_price}}"> 
																						</span></td>
																						<td class="" >
																							<span class="pull-left" style="margin-right: 50px;"><strong >Balance:</strong>
																								&nbsp;&nbsp; Php <?php $price=($pool->balance); echo $price;  ?><input type="hidden" name="total_price" value="{{$pool->pool_price}}"> 
																							</span>
																						</td>
																					</tr>
																				</tbody>

																			</table>
																		</div>
																	</div>  
																</div> 
																@endforeach
															</section>
														</div>
														<div class="col-lg-12 p-t-20 text-center"> 

															<a  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" href="/admin/index">Back</a>
														</div>
													</div>
												</div>
											</div>
		<!-- <div class="row">
			<button type="button" class="btn btn-default" onclick="goBack()">Go back</button>
		</div> -->
	</div> 


</div>
</div>


@endsection