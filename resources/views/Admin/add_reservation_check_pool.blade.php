@extends ('admin.layout.master')

@section('content')


<!-- start page content -->
<form action="{{route('reservation_summary')}}" method="post" onsubmit="return validate()" >
	<div class="page-content-wrapper">
		<div class="page-content">
			@if(session()->has('notif'))

			<center><div class="col col-md-8 ">
				<div class="alert alert-info ">
					<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Notification</strong><p><center>{{session()->get('notif')}}</center></p>
				</div>
			</div></center>

			@endif
			@if(count($errors))
				<div class="col col-md-8">
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				</div>
				@endif

			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">ADD RESERVATION</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">ADD RESERVATION </li>
					</ol>
				</div>
			</div>
			<!-- start check res -->
			<div class="container">

				{{csrf_field()}}
				<div class="form-row">
					<div class="bgwrap">

						
						<div class="col col-lg-12">
							<label for="service-type">Reservation type</label>
							<select class="form-control"  id="optservice" readonly onchange="show_fields()">
								<option class="" value="pool_type" disabled selected="">Pool</option>

							</select>
							<input type="hidden" name="service-type" value="pool_type">
							
						</div>
						
							<input type="hidden" name="date_in" value="{{$in}}">
							<input type="hidden" name="date_out" value="{{$out}}">


						<div class="col col-lg-12">
							<label>Check In</label>
							<input class="form-control date_1" type="date"  id="date_in"  value="{{$in}}" placeholder="Check-in Date" readonly  required>


						</div>
						<div class="col col-lg-12">
							<label>Check Out</label>
							<input class="form-control date_2" type="date" id="date_out" value="{{$out}}" placeholder="Check-out Date" readonly required>

						</div>
					</div>  
				</div> 
				<br>
				<br>
				<div class="row" id="pool-res"  ">
					<div class="col-sm-12">
						<div id="event_reserve">
							<div class="card-box">
								<div class="card-head">
									<header>Pool Reservation</header>
								</div>
								<div class="card-body ">

									<nav aria-label="breadcrumb">
										<ol class="navhelp breadcrumb">
											<li class=" breadcrumb-item active">Reservation Information</li>
											<li class="breadcrumb-item">Personal Information</li>
											<li class="breadcrumb-item">Summary</li>
											<li class="breadcrumb-item" >Payment</li>
										</ol>
									</nav>
									<h3>Event Information</h3>
									<hr>
									<div>

										<div class="form-row">

											<div class="col col-md-6">
												<small id="label" class="text-muted">Time-in</small>
												<input type="time" class="form-control" placeholder="timein" required name="time_in" aria-describedby="label">
											</div>
											<div class="col col-md-6">
												<small id="label" class="text-muted">Time-out</small>
												<input type="time" class="form-control" placeholder="timeout" required name="time_out" aria-describedby="label">
											</div>


										</div>

										<div class="divider">
											<hr>    
										</div>
										<!-- room reservation -->
										<div class="form-row">
											<div class="col col-md-12">
												@foreach($poolk as $pool)
												<section id="{{$pool->pool_type}}" ">
													<div class="container">
														<div class="product-content product-wrap clearfix">
															<div class="row">
																<div class="col-md-5 col-sm-12 col-xs-12">
																	<div class="product-image">
																		@if($pool->image_name!="") 
																		<img src="{{asset('storage/upload/pool/'.$pool->image_name)}}" alt="194x228" class="img-responsive">
																		@else
																		<p >No Picture Available</p>
																		@endif
																	</div>
																</div>
																<div class="col-md-7 col-sm-12 col-xs-12">
																	<div class="product-details">
																		<h2 class="name">
																			<a href="#">
																				<input type="hidden" name="pool_type" value="{{$pool->pool_type}}">
																				<center>{{$pool->pool_type}}</center>
																			</a>
																		</h2>
																		<p class="price-container">
																			<center><span><b><em>Private Usage Price: </b>{{$pool->pool_price}}php</em></span></center>
																			<input type="hidden" name="pool_price" value="{{$pool->pool_price}}">
																		</p>
																		<p class="available-rooms">
																			<center><span><b><em>Daily Rate(per head):</b>{{$pool->price_per_head_day}} php</em></span><br>
																				<span><b><em>Night Rate(per head): </b>{{$pool->price_per_head_night}} php</em></span></center>
																			</p>
																			<span class="tag1"></span> 
																		</div>
																		<div class="description">
																			<center><span><b><em>Pool Description</em></b></span>
																				<p>{{$pool->pool_description}}. </p></center>
																				<input type="hidden" name="pool_description" value="{{$pool->pool_description}}">
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

												<div class="form-row">          
													<div class="col col-md-6">
														&nbsp
														<a class="btn btn-info btn-lg " href="/admin/reservation/add_reservation">Back</a>
														<a class="btn btn-info btn-lg  Pool_sum" >Next</a>
													</div>
												</div>
												<div class="form-row">
													<div class="col col-md-6">

													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="personal_info" style="display: none;">
							

							<div class="row" id="eventres" style="display: ">
								<div class="col-sm-12">
									<div class="card-box">
										<div class="card-head">
											<header>Personal Reservation</header>
										</div>
										<div class="card-body ">

											<nav aria-label="breadcrumb">
												<ol class="navhelp breadcrumb">
													<li class="breadcrumb-item ">Reservation Information</li>
													<li class="breadcrumb-item active" aria-current="page">Personal Information</li>
													<li class="breadcrumb-item" >Summary</li>
													<li class="breadcrumb-item">Payment</li>
												</ol>
											</nav>
											<h3>Personal Information</h3>
											<hr>

											<div class="form-row">
												<div class="col col-md-6 col-xs-12 col-sm-12">
													<small id="label" class="text-muted">First Name</small>
													<input type="text" class="form-control" required name="fname" placeholder="First Name" aria-describedby="label">

												</div>
												<div class="col col-md-6 col-xs-12 col-sm-12">
													<small id="label" class="text-muted">Last Name</small>
													<input type="text" class="form-control" required name="lname" placeholder="Last Name" aria-describedby="label">
												</div>
											</div>
											<div class="form-row">
												
												<div class="col col-md-6 col-xs-12 col-sm-12">
													<small id="label" class="text-muted">Email</small>
													<input type="email" class="form-control" name="email" placeholder="Email" aria-describedby="label">
												</div>
											</div>
											<div class="form-row">
												<div class="col col-md-12">
													<small id="label" class="text-muted">Address</small>
													<textarea class="form-control" rows="4" id="reqq" required name="address" aria-describedby="label" placeholder="Address"></textarea>
												</div>
											</div>
											<div class="form-row">
												<div class="col col-md-6 col-xs-12 col-sm-12">
													<small id="label" class="text-muted">Contact</small>
													<input type="text" class="form-control" placeholder="Contact Number" aria-describedby="label"  required name="contact_no" id="contactno">
												</div>
												<div class="col col-md-6 col-xs-12 col-sm-12">
													<center>
														<div class="form-check">

															<small id="label" class="text-muted">Gender
																<br></small>
																<input type="radio" class="form-check-input" required name="gender" value="Male" id="male">
																<label class="form-check-label" for="male">Male</label><br>
																<input type="radio" class="form-check-input" name="gender" value="Female" id="female">
																<label class="form-check-label" for="female">Female</label>
															</div>


														</div>
													</center>
												</div>
												<div class="col col-md-12">
													<button type="submit" class="btn btn-info btn-lg pull-right" >Submit</button>
												</div>
												<div class="col col-md-12">
													<a class="btn btn-info btn-lg pull-left reserve_info">Back</a>
												</div>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>






					</div>
				</div>
				

				
				
			</form>
			<script type="text/javascript">
				
				$(document).ready(function() {

					$('.Pool_sum').click(function(){

						$('#personal_info').show();
						$('#event_reserve').hide();

					});
					$('.reserve_info').click(function(){

						$('#personal_info').hide();
						$('#event_reserve').show();

					});

				});

				
			</script>
			


			@endsection