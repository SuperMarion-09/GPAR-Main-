
<div class="row" id="roomres" style="display: none; ">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Room Reservation</header>
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
						<h3>Room Reservation</h3>
						<hr>
						<div>
							
								<div class="form-row">
									<div class="col">
										<small id="label" class="text-muted">Room type</small>
										<select class="form-control" name="service-type" id="optrooms" onchange="show_rooms(this.value)" arialabelledby="label">
											<option class="" disabled selected="">Type of rooms</option>
											@foreach($rooms as $room)
											<option value="{{$room->type}}">{{$room->type}}</option>
											@endforeach										</select>
									</div>
									<div class="col">
										<small id="label" class="text-muted">Number of pax</small>
										<input type="number" class="form-control" placeholder="No of pax" aria-describedby="label">
									</div>
									<div class="col">
										<small id="label" class="text-muted">Number of rooms</small>
										<input type="number" class="form-control" placeholder="No of rooms" aria-describedby="label">
									</div>
								</div>
								<div class="form-row">
									<div class="col col-md-6 col-sm-12 col-xs-12">
										<small id="label" class="text-muted">Time-in</small>
										<input type="time" class="form-control" placeholder="timein" aria-describedby="label">

									</div>
									<div class="col col-md-6 col-sm-12 col-xs-12">
										<small id="label" class="text-muted">Time-out</small>
										<input type="time" class="form-control" placeholder="timeout" aria-describedby="label">
									</div>
								</div>
								<div class="divider">
									<hr>    
								</div>
								<!-- room reservation -->
								<div class="form-row"> 
									@foreach($rooms as $room)
									<section id="{{$room->type}}" style="display: none;">
										<div class="container">
											<div class="product-content product-wrap clearfix">
												<div class="row">
													<div class="col-md-5 col-sm-12 col-xs-12">
														<div class="product-image">
														@if($room->image_name!="") 
															<img src="{{asset('storage/upload/room/'.$room->image_name)}}" alt="194x228" class="img-responsive">
														@else
														 <p >No Picture Available</p>
														@endif
														</div>
													</div>
													<div class="col-md-7 col-sm-12 col-xs-12">
														<div class="product-details">
															<h3 class="name">
																<a href="#">
																	{{$room->type}} room
																</a>
															</h3>
															<p class="price-container">
																<span>{{$room->room_price}}php</span>
															</p>
															<p class="available-rooms">
																<span>Available rooms: {{$room->room_quantity}}</span>
																
															</p>
															<span class="tag1"></span> 
														</div>
														<div class="description">
															<p>{{$room->room_description}}. </p>
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

								<div class="form-row">          
									<div class="col col-md-12">
										<br><button class="btn btn-info btn-lg pull-right">Next</button>
									</div>
								</div>
							  

						</div>
					</div>
				</div>
			</div>
		</div>