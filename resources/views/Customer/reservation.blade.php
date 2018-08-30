@extends('customer.layouts.master')

@section('content')
<!--HEADER SECTION RESERVATION--> 
   <section class="page-title" style="background-image:url(css/images/background/gallery-head.jpg);">
        <div class="auto-container">
            <!--Title Box-->
            <div class="title-box">
                <h2>RESERVATION</h2>
            </div>
        </div>
    </section>
    <!-- HEADER SECTION RESERVATION E-->
<!-- HEADER SECTION RESERVATION E-->
<!-- start reservation header -->
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
					<form method="post" action="#">
						<div class="clearfix">
							<div class="column col-md-9 col-sm-12 col-xs-12">
								<div class="clearfix">

									<div class="form-group col-md-3 col-sm-6 col-xs-12">
										<div class="group-inner">
											<label>Reservation type</label>
											<select name="service-type" id="optservice" onchange="show_fields()">
												<option class="" disabled selected="">Type of service</option>
												<option value="poolserv">Pools</option>
												<option value="roomserv">Rooms</option>
												<option value="eventserv">Events</option>
											</select>
										</div>
									</div>

									<div class="form-group col-md-3 col-sm-6 col-xs-12">
										<div class="group-inner">
											<label>Check In</label>
											<input type="text" name="date" id="checkindate" value="" placeholder="Select Date" required>
										</div>
									</div>

									<div class="form-group col-md-3 col-sm-12 col-xs-12">
										<div class="group-inner">
											<label>Check Out</label>
											<input type="text" name="text" id="checkoutdate" value="" placeholder="Select Date" required>
										</div>
									</div>

									<div class="form-group col-md-3 col-sm-6 col-xs-12">
										<div class="group-inner" id="type-of-room" style="display: none;">
											<label>Room type</label>
											<select name="service-type" id="optrooms" onchange="show_rooms()">
												<option class="" disabled selected="">Type of rooms</option>
												<option value="standard-r">Standard</option>
												<option value="family-r">Family</option>
												<option value="chester-r">Chester's room</option>
												<option value="justine-r">Justine's room</option>
											</select>
										</select>
									</div>
								</div>
							</div>
						</div>

						<!--Avalability Column-->
						<div class="avalability-column col-md-3 col-sm-12 col-xs-12">
							<button type="submit">
								<span class="big-txt">Check Availabilty</span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>        
</div>
</section>
<br/>
<!-- e reservation header -->
<!-- room reservation -->
<section id="family-room" style="display: none;">
	<div class="container">
		<div class="product-content product-wrap clearfix">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="css/images/rooms/family1.jpg" alt="194x228" class="img-responsive"> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="product-details">
						<h3 class="name">
							<a href="#">
								Family room
							</a>
						</h3>
						<p class="price-container">
							<span>2500php</span>
						</p>
						<p class="available-rooms">
							<span>Available rooms: 2</span>
						</p>
						<span class="tag1"></span> 
					</div>
					<div class="description">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. </p>
						<ul class="list-group">
							<li class="list-item">
								feature 1
							</li>
							<li class="list-item">
								feature 2
							</li>
							<li class="list-item">
								feature 3
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="standard-room" style="display: none;">
	<div class="container">
		<div class="product-content product-wrap clearfix">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="css/images/rooms/standard1.jpg" alt="194x228" class="img-responsive"> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="product-details">
						<h3 class="name">
							<a href="#">
								Standard room
							</a>
						</h3>
						<p class="price-container">
							<span>2500php</span>
						</p>
						<p class="available-rooms">
							<span>Available rooms: 2</span>
						</p>
						<span class="tag1"></span> 
					</div>
					<div class="description">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. </p>
						<ul class="list-group">
							<li class="list-item">
								feature 1
							</li>
							<li class="list-item">
								feature 2
							</li>
							<li class="list-item">
								feature 3
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="chester-room" style="display: none;">
	<div class="container">
		<div class="product-content product-wrap clearfix">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="css/images/rooms/chester.jpg" alt="194x228" class="img-responsive"> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="product-details">
						<h3 class="name">
							<a href="#">
								Chester room
							</a>
						</h3>
						<p class="price-container">
							<span>2500php</span>
						</p>
						<p class="available-rooms">
							<span>Available rooms: 1</span>
						</p>
						<span class="tag1"></span> 
					</div>
					<div class="description">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. </p>
						<ul class="list-group">
							<li class="list-item">
								feature 1
							</li>
							<li class="list-item">
								feature 2
							</li>
							<li class="list-item">
								feature 3
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="justine-room" style="display: none;">
	<div class="container">
		<div class="product-content product-wrap clearfix">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="css/images/rooms/justine.jpg" alt="194x228" class="img-responsive"> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="product-details">
						<h3 class="name">
							<a href="#">
								Justine room
							</a>
						</h3>
						<p class="price-container">
							<span>2500php</span>
						</p>
						<p class="available-rooms">
							<span>Available rooms: 1</span>
						</p>
						<span class="tag1"></span> 
					</div>
					<div class="description">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. </p>
						<ul class="list-group">
							<li class="list-item">
								feature 1
							</li>
							<li class="list-item">
								feature 2
							</li>
							<li class="list-item">
								feature 3
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- room e -->

<!-- customer information form -->
<section  class="ev" id="customer-info" style="display: none;" >
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<!-- form start -->
				<form method="" action="" name="personalinfo-form">
					<div class="panel panel-default">
						<div class="panel-heading"><h3>Personal information</h3></div>
						<div class="panel-body">
							<!-- personal info start -->
							<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
								<label for="fname-info">First name: </label>
								<input class="form-control" type="text" name="fname-info" placeholder="First name" required/>
							</div>
							<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
								<label for="lname-info">Last name: </label>
								<input class="form-control" type="text" name="lname-info" placeholder="Last name" required/>
							</div>
							<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
								<label for="bday">Birthday </label>
								<input type="text" name="bday" class="form-control" id="bday" placeholder="Select Date" required>
							</div>

							<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
								<label for="email-info">Email: <span><i>Working email address</i></span></label>
								<input class="form-control" type="email" name="email-info" placeholder="Email Address"required/>
							</div>
							<div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<label for="address-info">Address</label>
								<textarea class="form-control address-info" rows="3" id="address-info" placeholder="Address"></textarea>
							</div>
							<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
								<label for="contact-info">Contact: </label>
								<input class="form-control" type="tel" name="contact-info" required/>
							</div>
							<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
								<div class="radio radio-yellow">
									<label><input type="radio" name="gender" checked>Male</label>
								</div>
								<div class="radio radio-yellow">
									<label><input type="radio" name="gender">Female</label>
								</div>
							</div>

							<!-- personal info e -->
							<button class="btn btn-style-two center-block">Next</button>
							<br>

						</div>

					</form>
					<!-- form e -->
				</div>
			</div>
		</div>

	</section>
	<!-- customer information form end-->


	<section  class="ev" id="room-info" style="display: none;" >
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<!-- form start -->
					<form method="" action="" name="personalinfo-form">
						<div class="panel panel-default">
							<div class="panel-heading"><h3>Room information</h3></div>
							<div class="panel-body">
								<!-- personal info start -->
								
								<div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
									<label for="timeinroom">time in: </label>
									<input class="form-control" type="time" name="timeinroom"  required/>
								</div>
								<div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
									<label for="timeoutroom">time out: </label>
									<input class="form-control" type="time" name="timeoutroom"  required/>
								</div>
								<div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
									<label for="paxroom">No of pax: </label>
									<input class="form-control" type="number" name="paxroom" placeholder="No of pax" min="1" max="5" required/>
								</div>


								

								<!-- personal info e -->
								<button class="btn btn-style-two ">Next</button>
								<br>

							</div>

						</form>
						<!-- form e -->
					</div>
				</div>
			</div>

		</section>

		<!-- pool reservation-->
		<section class="pool-res" id="pool-res" style="display: none;">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<!-- form start -->
						<form method="" action="" name="pools-form">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Pool Reservation</h3></div>
								<div class="panel-body">
									<!-- personal info start -->
									<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
										<label for="time-in-pool">Time in: </label>
										<input class="form-control" type="time" name="time-in-pool" placeholder="" required/>
									</div>
									<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
										<label for="time-out-pool">Time out: </label>
										<input class="form-control" type="time" name="time-out-pool" placeholder="" required/>
									</div>
									<div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
										<label for="pax-pool">Number of pax: <span><i> Minimum of 25 person</i></span></label>
										<input type="number" name="pax-pool" class="form-control" id="pax-pool" placeholder="" min="25" required>
									</div>

									<!-- personal info e -->
									<button class="btn btn-style-two center-block">Next</button>
									<br>

								</div>

							</form>
							<!-- form e -->
						</div>
					</div>
				</div>

			</section>
			<!-- pool reservation end -->

			<!--  RESERVATION Event-->
			<section class="ev" style="display: none;" id="eventform">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<!-- form start -->
							<form method="" action="" name="event-form">
								<div class="panel panel-default">
									<div class="panel-heading"><h3>Event information</h3></div>
									<div class="panel-body">
										<!-- event info start -->
										<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
											<label for="occ-event">Event name:<span><i> birthdays,debut,meetings,wedding etc.</i></span>  </label>
											<input class="form-control" type="text" name="occ-event" placeholder="Event name" required/>
										</div>
										<div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
											<label for="motif">Theme or motif:<span><i> black and white,silver and gold etc.</i></span> </label>
											<input class="form-control" type="text" name="motif" placeholder="Your theme/motif" required/>
										</div>
										<div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
											<label for="timein">Time in: </label>
											<input class="form-control" type="time" name="timein" required/>
										</div>
										<div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
											<label for="timein">Time out: </label>
											<input class="form-control" type="time" name="timein" required/>
										</div>
										<div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
											<label for="nopax">Number of pax/guest <span><i> Minimum of 20pax.</i></span> </label>
											<input class="form-control" type="number" name="nopax" min="20" placeholder="150" required/>
										</div>
										<!-- event info e -->
										<!-- event inclusion start -->
										<div class="divider"> </div>
										<H3>INCLUSIONS</H3>
										<div class="divider"></div>
										<div class="row">
											<!-- food list start -->
											<div class="foods-events">
												<H4>Foods</H4>
												<div class="divider"></div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/foods/lechon.jpg" />
														<input type="checkbox" name="image_check[]" value="1" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<div class="desc"><h5>Lechon</h5></div>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/foods/cookies.jpg" />
														<input type="checkbox" name="image_check[]" value="2" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<div class="desc"><h5>Cookies</h5></div>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/foods/pica.jpg" />
														<input type="checkbox" name="image_check[]" value="3" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<div class="desc"><h5>Pica-Pica snacks</h5></div>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/foods/karekare.jpg" />
														<input type="checkbox" name="image_check[]" value="4" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<div class="desc"><h5>Kare-Kare</h5></div>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/foods/salad.jpg" />
														<input type="checkbox" name="image_check[]" value="5" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<div class="desc"><h5>Salad</h5></div>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/foods/chickenteri.jpg" />
														<input type="checkbox" name="image_check[]" value="6" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<div class="desc"><h5>Chicken Teriyaki</h5></div>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/foods/tempura.jpg" />
														<input type="checkbox" name="image_check[]" value="6" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<div class="desc"><h5>Tempura</h5></div>
												</div>
											</div>

											<!-- food list e -->
										</div>
										<div class="divider"></div>
										<div class="row"> 
											<!-- service list start -->
											<div class="services-events">
												<H4>Services</H4>
												<div class="divider"></div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/pavilion.png" />
														<input type="checkbox" name="image_check[]" value="7" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Pavilion</h5>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/lights.png" />
														<input type="checkbox" name="image_check[]" value="8" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Lights</h5>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/photographer.png" />
														<input type="checkbox" name="image_check[]" value="9" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Photographer</h5>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/poolusage.png" />
														<input type="checkbox" name="image_check[]" value="10" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Pool usage</h5>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/roomusage.png" />
														<input type="checkbox" name="image_check[]" value="11" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Room usage</h5>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/styling.png" />
														<input type="checkbox" name="image_check[]" value="12" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Styling </h5>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/gowns.png" />
														<input type="checkbox" name="image_check[]" value="13" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Gowns</h5>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/videoke.png" />
														<input type="checkbox" name="image_check[]" value="14" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Videoke</h5>
												</div>
												<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
													<label class="image-checkbox">
														<img class="img-responsive" src="css/images/events/services/photobooth.png" />
														<input type="checkbox" name="image_check[]" value="15" />
														<i class="glyphicon glyphicon-ok hidden"></i>
													</label>
													<h5>Photobooth</h5>
												</div>
											</div>
										</div>
										<!-- food list start -->
										
										<!-- event inclusion e -->
										<!-- other requests -->
										<div class="divider"></div>
										<div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12 text-request">
											<label for="req">Personal Request <span><i>Please specify your personal request,additional foods or any other.</i></span> </label>
											<textarea class="form-control" rows="7" id="req"></textarea>
										</div>
									</div>
									<button class="btn btn-style-two center-block" onclick="customerInfo()">Next</button>
									<br>
								</div>
							</form>
							<!-- form e -->
						</div>  
					</div>
				</div>
			</section>
			<!-- event reservation end -->
			<!--Services Section-->
			<section class="services-section" id="services-section" style="background-image:url(css/images/background/leaves-pattern.png);">
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
			function show_fields()
			{
				var select_status=$('#optservice').val();
				/* if select personal from select box then show my text box */

				if(select_status == 'eventserv')
				{
					$('#services-section').hide();
					$('#eventform').show();  
					$('#pool-res').hide();
					$('#room-res').hide();
					$('#type-of-room').hide();
					$('#customer-info').hide();
					$('#standard-room').hide();
					$('#family-room').hide();
					$('#justine-room').hide();
					$('#chester-room').hide();
					$('#room-info').hide();
				}
				else if (select_status == 'poolserv')
				{
					$('#pool-res').show();
					$('#services-section').hide();
					$('#eventform').hide();
					$('#room-res').hide();
					$('#type-of-room').hide();
					$('#customer-info').hide();
					$('#standard-room').hide();
					$('#family-room').hide();
					$('#justine-room').hide();
					$('#chester-room').hide();
					$('#room-info').hide();
				}
				else if (select_status == 'roomserv')
				{
					$('#type-of-room').show();
					$('#room-res').show();
					$('#pool-res').hide();
					$('#eventform').hide(); 
					$('#services-section').hide();
					$('#customer-info').hide();
					$('#standard-room').hide();
					$('#family-room').hide();
					$('#room-info').hide();

				}

			}

			function show_rooms() 
			{
				var selected_rooms = $('#optrooms').val();

				if (selected_rooms == 'standard-r') 
				{
					$('#standard-room').show();
					$('#pool-res').hide();
					$('#services-section').hide();
					$('#eventform').hide();
					$('#room-res').hide();
					$('#customer-info').hide();
					$('#family-room').hide();
					$('#justine-room').hide();
					$('#chester-room').hide();
					$('#room-info').show();

				}
				else if (selected_rooms == 'family-r')
				{
					$('#family-room').show();
					$('#pool-res').hide();
					$('#services-section').hide();
					$('#eventform').hide();
					$('#room-res').hide();
					$('#customer-info').hide();
					$('#standard-room').hide();
					$('#justine-room').hide();
					$('#chester-room').hide();
					$('#room-info').show();

				}
				else if (selected_rooms == 'chester-r')
				{
					$('#chester-room').show();
					$('#pool-res').hide();
					$('#services-section').hide();
					$('#eventform').hide();
					$('#room-res').hide();
					$('#customer-info').hide();
					$('#standard-room').hide();
					$('#family-room').hide();
					$('#room-info').show();



				}
				else if (selected_rooms == 'justine-r')
				{
					$('#justine-room').show();
					$('#pool-res').hide();
					$('#services-section').hide();
					$('#eventform').hide();
					$('#room-res').hide();
					$('#customer-info').hide();
					$('#standard-room').hide();
					$('#family-room').hide();
					$('#chester-room').hide();
					$('#room-info').show();


				}

			}
			function customerInfo() 
			{
				$('#customer-info').show();
				$('#services-section').hide();
				$('#eventform').hide();  
				$('#pool-res').hide();
				$('#room-res').hide();
				$('#type-of-room').hide();
				$('#standard-room').hide();
				$('#family-room').hide();
				$('#justine-room').hide();
				$('#chester-room').hide();
				$('#room-info').hide();

			}
		</script>





				@endsection