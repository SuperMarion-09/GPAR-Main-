@extends('Customer.layouts.master')
@section('content')

<!--HEADER SECTION RESERVATION--> 


<!-- / Hidden Bar -->  
<!--HEADER SECTION RESERVATION--> 


<section class="page-title" style="background-image:url(/css/images/background/gallery-head.jpg);">
	<div class="auto-container">
		<!--Title Box-->
		<div class="title-box">
			<h2>RESERVATION</h2>
		</div>
	</div>
</section>
<!-- HEADER SECTION RESERVATION E-->
<!-- start reservation header -->
<form action="/reservation/summary/cash" method="post">
	{{csrf_field()}}
	<section class="book-section">
		<div class="auto-container">

			<div class="row clearfix">

				<!--Title Column-->
				<div class="title-column col-lg-2 col-md-12 col-sm-12 col-xs-12">
					<div class="bg-layer"></div>
					<!--Inner Box-->
					<div class="inner-box">
						<h2>RESERVE NOW</h2>
						<div class="text">Best Price Guaranted</div>
						<!--Arrow Box-->
						<div class="arrow-box"><span class="icon fa fa-angle-right"></span></div>
					</div>
				</div>
			</div>
			<div>
				<div class="container">
					<br>
					<nav aria-label="breadcrumb">
						<ol class="navhelp breadcrumb">
							<li class="breadcrumb-item ">Reservation Information</li>
							<li class="breadcrumb-item" aria-current="page">Personal Information</li>
							<li class="breadcrumb-item active" >Summary</li>
							<li class="breadcrumb-item">Payment</li>
						</ol>
					</nav>
					<div  class="col col-lg-12"> 

						<section> 
							@if($service_type='pool_type')
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
															{{$fname}} &nbsp; {{$lname}}
															<input type="hidden" name="fname" value="{{$fname}}">
															<input type="hidden" name="lname" value="{{$lname}}">

														</span></td>
														<td></td>

													</tr>
													<tr>
														<td><b>Address:</b>&nbsp;<span>{{$address}}</span></td>
														<input type="hidden" name="address" value="{{$address}}">

														<td></td>
													</tr>
													<tr>
														<td><b>Contact:</b>&nbsp;<span>{{$contact_no}}</span></td>
														<input type="hidden" name="contact_no" value="{{$contact_no}}">
														<td></td>
													</tr>
													<tr>
														<td><b>Email Address:</b>&nbsp;<span>{{$email}}</span></td>
														<input type="hidden" name="email" value="{{$email}}">
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
															<td><b>Check-in date:</b>&nbsp;<span>{{$date_in}}</span></td>
															<input type="hidden" name="date_in" value="{{$date_in}}">
															<td><b>Time in:</b>&nbsp;<span>{{$time_in}}</span></td>
															<input type="hidden" name="time_in" value="{{$time_in}}">
															<tr>
																<td><b>Check-out date:</b>&nbsp;<span>{{$date_out}}</span></td>
																<input type="hidden" name="date_out" value="{{$date_out}}">
																<td><b>Time out:</b>&nbsp;<span>{{$time_out}}</span></td>
																<input type="hidden" name="time_out" value="{{$time_out}}">
															</tr>

														</tr>
														<tr>
															<td colspan="2 center"><center><h4><b>Pool Type</b></center></h4>
															</tr>
															<tr>
																<tr>
																	<td colspan="2 center"><center>{{$pool_type}}</center></h4>
																		<input type="hidden" name="pool_type" value="{{$pool_type}}">
																	</tr>
																	<tr>

																		<td class="" colspan="2">
																			<span class="pull-right" style="margin-right: 50px;"><strong >Total:</strong>
																				&nbsp;&nbsp; Php {{$pool_price}}<input type="hidden" name="total_price" value="{{$pool_price}}"> 
																			</span></td>
																		</tr>
																	</tbody>
																	<tr>
																		<td colspan="2">
																			<a class="btn btn-info btn-success btn-lg pull-right" data-toggle="modal" data-target="#submit" data-id="" href="paymet.html">Next</a>

																		</td>
																	</tr>
																</table>
															</div>
														</div>  
													</div> 
													

												</div>
												@endif
											</section>
										</div>

									</div>




									
								</div>
							</section>
						


						<section class="services-section" id="services-section" style="background-image:url(images/background/leaves-pattern.png);">
							<div class="auto-container">
								<div class="row clearfix">
									<!--Column-->
									<div class="title-column col-md-12 col-sm-12 col-xs-12">
										<div class="inner-box text-center">
											<!--Sec Title-->
											<div class="sec-title">
												<h2>Our Service</h2>
												<h3>Learn more</h3>
											</div>

											<div class="text">We offer three different services with a very affordable price</div>
										</div>
									</div>

									<!--Content Column-->
									<div class="content-column col-md-12 col-sm-12 col-xs-12">

										<div class="row clearfix" ">
											<!--Service Block-->
											<div class="service-block col-md-4 col-sm-4 col-xs-12">
												<div class="inner">
													<div class="icon-box"><span class="flaticon-calendar-1"></span></div>
													<h3>Events</h3>
													<div class="text">Best place for your events needs</div>
													<a href="#id" class="theme-btn btn-style-two btn-sm">view more</a>
												</div>
											</div>

											<!--Service Block-->
											<div class="service-block col-md-4 col-sm-4 col-xs-12">
												<div class="inner">
													<div class="icon-box"><span class="icon flaticon-bed"></span></div>
													<h3>Rooms</h3>
													<div class="text">Affordable room rates</div>
													<a href="#id" class="theme-btn btn-style-two btn-sm">view more</a>
												</div>
											</div>

											<!--Service Block-->
											<div class="service-block col-md-4 col-sm-4 col-xs-12">
												<div class="inner">
													<div class="icon-box"><span class="icon flaticon-exercise"></span></div>
													<h3>Pools</h3>
													<div class="text">Enjoy our clean pool </div>
													<a href="#id" class="theme-btn btn-style-two btn-sm">view more</a>
												</div>
											</div>  
										</div>
									</div>
								</div>
							</div>
						</section>
						<div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								
									
									<div class="modal-body">
										
										<p>Mode of payment, Cash or Paypal?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Paypal</button>
										<button type="submit" class="btn btn-primary">Cash</button>
									</div>
								
							</div>
						</div>
					</div>
</form>


						<!--End Services Section--> 

						<script type="text/javascript">
							$(document).ready(function() {

								$('.personal_info').click(function(){

									$('#personal').show();
									$('#pool').hide();

								});
								$('.reserve_info').click(function(){

									$('#personal_info').hide();
									$('#event_reserve').show();

								});

							});

						</script>
						@endsection