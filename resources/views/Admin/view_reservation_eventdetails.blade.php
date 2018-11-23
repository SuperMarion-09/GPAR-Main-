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
					<li class="active">View Event Reservation</li>
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
								@foreach($event_service as $event)
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
																{{$event->fname}} &nbsp; {{$event->lname}}
																

															</span></td>
															

														</tr>
														<tr>
															<td><b>Address:</b>&nbsp;<span>{{$event->address}}</span></td>
															
															
														</tr>
														<tr>
															<td><b>Contact:</b>&nbsp;<span>{{$event->contact_no}}</span></td>
															
															
														</tr>
														<tr>
															<td><b>Email Address:</b>&nbsp;<span>{{$event->email}}</span></td>
															
															
														</tr>
														<tr>
															<td colspan="2"><h4><b>Service information</b></h4></td>

														</tr>
														<tr>
															<td><b>Service type:</b>&nbsp;<span>Events</span></td>
															

														</tr>

														<tr>
															<td>
																<b>Check-in date:</b>&nbsp;<span>{{ \Carbon\Carbon::parse($event->reservation_in)->format('F j, Y') }}</span>
															</td>
															
															<td>
																<b>Time in:</b>&nbsp;<span>{{\Carbon\Carbon::parse($event->time_in)->format('h:i A')}}</span>
															</td>
															
														</tr>
														<tr>
															<td>
																<b>Check-out date:</b>&nbsp;<span>{{\Carbon\Carbon::parse($event->reservation_out)->format('F j, Y')}}</span>
															</td>
															<td>
																<b>Time out:</b>&nbsp;<span>{{\Carbon\Carbon::parse($event->time_out)->format('h:i A')}}</span>
															</td>
														</tr>

													</tr>
													<tr>
														<td colspan="2" align="center"><b><h4>Event Type</b></h4></td>
													</tr>

													<tr>
														<td colspan="2" align="center"><h4>{{$event->event_type}}</h4>
															<input type="hidden" name="pool_type" value="{{$event->event_type}}">
														</td>
													</tr>
													<tr>
														<td align="center">
															<b><h4>Foods</b></h4>
														</td>
														<td align="center">
															<b><h4>Services</b></h4>
														</td>
													</tr>
													<tr>
														<td>
															{{$event->event_foods}}
														</td>
														<td>
															{{$event->event_services}}
														</td>
													</tr>
													<tr>

														<td class="" >
															<span class="pull-right" style="margin-right: 50px;"><strong >Total:</strong>
																&nbsp;&nbsp; Php {{$event->price}}<input type="hidden" name="total_price" value="{{$event->pool_price}}"> 
															</span>
														</td>
														<td class="" >
															<span class="pull-left" style="margin-right: 50px;"><strong >Balance:</strong>
																&nbsp;&nbsp; Php <?php $price=$event->price-$event->balance; echo $price;  ?><input type="hidden" name="total_price" value="{{$event->pool_price}}"> 
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