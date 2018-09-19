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
<form action="/reservation/summary" method="post">
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

				<!--Form Column-->

				<div class="form-column col-lg-10 col-md-12 col-sm-12 col-xs-12">
					<div class="inner-box">

						<div class="clearfix">
							<div class="column col-md-9 col-sm-12 col-xs-12">
								<div class="clearfix">

									<div class="form-group col-md-3 col-sm-6 col-xs-12">
										<div class="group-inner">
											<label>Reservation type</label>
											<select name="" disabled id="optservice" onchange="show_fields()">
												<option class="" disabled selected="">Events</option>
												<option value="poolserv">Pools</option>
												<option value="roomserv">Rooms</option>
												<option value="eventserv">Events</option>
											</select>
											<input type="hidden" name="service_type" value="event_type">
										</div>
									</div>

									<div class="form-group col-md-3 col-sm-6 col-xs-12">
										<div class="group-inner">
											<label>Check In</label>
											<input type="text" name="date_in" id="checkindate" value="{{$in}}" disabled placeholder="Select Date" required>
										</div>
									</div>

									<div class="form-group col-md-3 col-sm-12 col-xs-12">
										<div class="group-inner">
											<label>Check Out</label>
											<input type="text" name="date_out" id="checkoutdate" value="{{$out}}" disabled placeholder="Select Date" required>
										</div>
									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>        

	</section>

	<br/>

	<div class="container">
		<div id="pool">
			<section class="pool-res" id="pool-res" style="display:">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<!-- form start -->

						<div class="panel panel-default">
							<div class="panel-heading"><h3>Pool Reservation</h3></div>
							<div class="panel-body">
								<!-- personal info start -->
								<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
									<label for="time-in-pool">Time in: </label>
									<input class="form-control" type="time" name="time_in" placeholder="" required/>
								</div>
								<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
									<label for="time-out-pool">Time out: </label>
									<input class="form-control" type="time" name="time_out" placeholder="" required/>
								</div>
								<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
									<small id="label" class="text-muted">Event Name</small>
									<input type="text" class="form-control" placeholder="Event Name" required name="event_name" aria-describedby="label">
								</div>
								<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
									<small id="label" class="text-muted">Event Motif</small>
									<input type="text" class="form-control" placeholder="Event Motif" required name="event_motif" aria-describedby="label">
								</div>
							</div>
						</div>
						<div>
							<h3>Services and Food</h3>
							<hr>
							<div class="divider"> </div>
							<H3>INCLUSIONS</H3>
							<div class="divider"></div>
							<div class="row">
								<!-- food list start -->
								<div class="foods-events">
									<H3>Foods</H3>
									<div class="divider"></div>
									<div class=" col-md-12 nopad text-center">
										<table class="table table-condensed">
											<thead>
												<tr>
													<th colspan="3"><center></center></th>
												</tr>
											</thead>
											<tbody>
												@foreach($events as $event)
												@if($event->category=='foods')
												<td>
													<label class="image-checkbox"><img class="" src="{{asset('storage/upload/items/foods/'.$event->image_name)}}" height="150" width="150" />
														<input type="checkbox" name="foods[]" value="{{$event->item_name}}" />
														<i class="glyphicon glyphicon-ok hidden"></i></label>
														<div class="desc"><h5>{{$event->item_name}}</h5></div>
												</td>
													@endif
													@endforeach
											</tbody>
										</table>
									</div>
										<H3>Services</H3>
										<div class="divider"></div>
										<div class="col-md-12 nopad text-center">
											<table class="table table-hover">
												<thead>
													<tr>
														<th colspan="3"><center></center></th>
													</tr>
												</thead>
												<tbody>
													@foreach($events as $event)
													@if($event->category=='services')

													<td>
														<label class="image-checkbox"><img class="" src="{{asset('storage/upload/items/services/'.$event->image_name)}}" height="150" width="150" />
															<input type="checkbox" name="services[]" value="{{$event->item_name}}" />
															<i class="glyphicon glyphicon-ok hidden"></i></label>
															<div class="desc"><h5>{{$event->item_name}}</h5></div>
														</td>

														@endif
														@endforeach
													</tbody>
												</table>
											</div>
											<div class="divider"></div>
											<div>
												@foreach($pavk as $pav)
												<section id="{{$pav->item_name}}" ">
													<div class="container">
														<div class="product-content product-wrap clearfix">
															<div class="row">
																<div class="col-md-5 col-sm-12 col-xs-12">
																	<div class="product-image">
																		@if($pav->image_name!="") 
																		<img src="{{asset('storage/upload/items/pavilion/'.$pav->image_name)}}" alt="194x228" class="img-responsive">
																		@else
																		<p >No Picture Available</p>
																		@endif
																	</div>
																</div>
																<div class="col-md-7 col-sm-12 col-xs-12">
																	<div class="product-details">
																		<h2 class="name">
																			<a href="#">
																				<input type="hidden" name="pav_type" value="{{$pav->item_name}}">
																				<center>{{$pav->item_name}}</center>
																			</a>
																		</h2>
																		<p class="price-container">
																			<center><span><b><em>Private Usage Price: </b>{{$pav->item_price}}php</em></span></center>
																			<input type="hidden" name="pav_price" value="{{$pav->item_price}}">
																		</p>
																		@endforeach
																		
																		<span class="tag1"></span> 
																	</div>
																	@foreach($pavk as $pav)
																	<div class="description">
																		<center><span><b><em>Pavilion Description</em></b></span>
																			<p>{{$pav->item_description}}. </p></center>
																			<input type="hidden" name="pav_description" value="{{$pav->item_description}}">
																			<ul class="list-group">

																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>

													</section>
													@endforeach
												</div>


											</div>
										</section>
									</div>

									<div id="personal" style="">
										<section  class="ev" id="customer-info" style="" >
											<div class="container">
												<div class="row">
													<div class="col-md-12 col-lg-12">
														<!-- form start -->

														<div class="panel panel-default">
															<div class="panel-heading"><h3>Personal information</h3></div>
															<div class="panel-body">
																<!-- personal info start -->
																<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
																	<label for="fname-info">First name: </label>
																	<input class="form-control" type="text" name="fname" placeholder="First name" required/>
																</div>
																<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
																	<label for="lname-info">Last name: </label>
																	<input class="form-control" type="text" name="lname" placeholder="Last name" required/>
																</div>
																<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
																	<label for="email-info">Email: <span><i>Working email address</i></span></label>
																	<input class="form-control" type="email" name="email" placeholder="Email Address"required/>
																</div>
																<div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
																	<label for="address-info">Address</label>
																	<textarea class="form-control address-info" rows="3" name="address" id="address-info" placeholder="Address"></textarea>
																</div>
																<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
																	<label for="contact-info">Contact: </label>
																	<input class="form-control" type="tel" name="contact" required/>
																</div>
																<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
																	<div class="radio radio-yellow">
																		<label><input type="radio" name="gender" value="Male">Male</label>
																	</div>
																	<div class="radio radio-yellow">
																		<label><input type="radio" name="gender" value="Female">Female</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
									
								</div>
							</div>
						</form>


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