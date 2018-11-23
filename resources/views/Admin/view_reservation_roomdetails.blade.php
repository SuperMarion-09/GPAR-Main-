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
								@foreach($room_service as $room)
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
																{{$room->fname}} &nbsp; {{$room->lname}}
																<input type="hidden" name="fname" value="{{$room->fname}}">
																<input type="hidden" name="lname" value="{{$room->lname}}">

															</span></td>
															<td></td>

														</tr>
														<tr>
															<td><b>Address:</b>&nbsp;<span>{{$room->address}}</span></td>
															<input type="hidden" name="address" value="{{$room->address}}">
															<td></td>
														</tr>
														<tr>
															<td><b>Contact:</b>&nbsp;<span>{{$room->contact_no}}</span></td>
															<input type="hidden" name="contact_no" value="{{$room->contact_no}}">
															<td></td>
														</tr>
														<tr>
															<td><b>Email Address:</b>&nbsp;<span>{{$room->email}}</span></td>
															<input type="hidden" name="email" value="{{$room->email}}">
															<td></td>
														</tr>
														<tr>
															<td colspan="2"><h4><b>Service information</b></h4>

															</tr>
															<tr>
																<td><b>Service type:</b>&nbsp;<span>Rooms</span></td>
																<input type="hidden" name="service_type" value="pools">

															</tr>

															<tr>
																<td><b>Check-in date:</b>&nbsp;<span>{{ \Carbon\Carbon::parse($room->reservation_in)->format('F j, Y') }}</span></td>
																<input type="hidden" name="date_in" value="{{$room->reservation_in}}">
																<td><b>Time in:</b>&nbsp;<span>{{\Carbon\Carbon::parse($room->time_in)->format('h:i A')}}</span></td>
																<input type="hidden" name="time_in" value="{{$room->time_in}}">
																<tr>
																	<td><b>Check-out date:</b>&nbsp;<span>{{\Carbon\Carbon::parse($room->reservation_out)->format('F j, Y')}}</span></td>
																	<input type="hidden" name="date_out" value="{{$room->reservation_out}}">
																	<td><b>Time out:</b>&nbsp;<span>{{\Carbon\Carbon::parse($room->time_out)->format('h:i A')}}</span></td>
																	<input type="hidden" name="time_out" value="{{$room->time_out}}">
																</tr>

															</tr>
															<tr>
																<td colspan="2 center"><center><h4><b>Room Type</b></center></h4>
																</tr>
																<tr>
																	<tr>
																		<td colspan="2 center"><center>{{$room->room_type}}</center></h4>
																			<input type="hidden" name="pool_type" value="{{$room->room_type}}">
																		</tr>
																		<tr>
																<td colspan="2 center"><center><h4><b>Room Quantity</b></center></h4>
																</tr>
																<tr>
																	<tr>
																		<td colspan="2 center"><center>{{$room->room_quantity}}</center></h4>
																			<input type="hidden" name="pool_type" value="{{$room->room_type}}">
																		</tr>
																		<tr>

																			<td class="" >
																				<span class="pull-right" style="margin-right: 50px;"><strong >Total:</strong>
																					&nbsp;&nbsp; Php {{$room->price}}<input type="hidden" name="total_price" value="{{$room->price}}"> 
																				</span></td>
																				<td class="" >
																							<span class="pull-left" style="margin-right: 50px;"><strong >Balance:</strong>
																								&nbsp;&nbsp; Php <?php $price=$room->price-$room->balance; echo $price;  ?><input type="hidden" name="total_price" value="{{$room->pool_price}}"> 
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