@extends('customer.layouts.master')

@section('content')
<!--HEADER SECTION RESERVATION--> 


<!-- / Hidden Bar -->  
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
			<!--Form Column-->
			<form method="POST" action="/reservation/checkdate">	
				{{csrf_field()}}
				<div class="form-column col-lg-10 col-md-12 col-sm-12 col-xs-12">
					<div class="inner-box">

						<div class="clearfix">
							<div class="column col-md-9 col-sm-12 col-xs-12">
								<div class="clearfix">


									<div class="form-group col-md-3 col-sm-6 col-xs-12">
										<div class="group-inner">
											<label>Reservation type</label>
											<select name="service_type" id="optservice" onchange="show_fields()">
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
											<input type="text" name="date_in" id="checkindate" value="" placeholder="Select Date" required>
										</div>
									</div>

									<div class="form-group col-md-3 col-sm-12 col-xs-12">
										<div class="group-inner">
											<label>Check Out</label>
											<input type="text" name="date_out" id="checkoutdate" value="" placeholder="Select Date" required>
										</div>
									</div>

									<div class="form-group col-md-3 col-sm-6 col-xs-12">
										<div class="group-inner" id="type-of-room" style="display: none;">
											<label>Room type</label>
											<select name="room_name" id="optrooms" onchange="show_rooms()">
												<option default value="" selected="">Type of Rooms</option>

												@foreach($rooms as $room)
												<option value="{{$room->type}}">{{$room->type}}</option>
												@endforeach
											</select>

										</div>
										<div class="group-inner" id="type-of-pool" style="display: none;">
											<label>Pool type</label>
											<select name="pool_name" id="optpools" onchange="show_pools()">
												<option default value=""  selected="">Type of Pools</option>
												@foreach($pools as $pool)
												<option value="{{$pool->pool_type}}">{{$pool->pool_type}}</option>
												@endforeach
											</select>

										</div>
										<div class="group-inner" id="type-of-event" style="display: none;">
											<label>Pavilion type</label>
											<select name="pavilion_name" id="optpav" onchange="show_pavilions()">
												<option default value="" selected="">Type of Pavilion</option>
												@foreach($events as $pavilion)
												<option value="{{$pavilion->item_name}}">{{$pavilion->item_name}}</option>
												@endforeach										
											</select>

										</div>
									</div>
								</div>
							</div>


							<!--Avalability Column-->
							<div class="avalability-column col-md-3 col-sm-12 col-xs-12">
								<button type="Submit">
									<span class="big-txt">Check Availabilty</span>
								</button>
							</div>
						</div>
						@if(session()->has('notif'))

						<center><div class="col col-md-12 ">
							<div class="alert alert-info ">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Notification</strong><p><center>{{session()->get('notif')}}</center></p>
							</div>
						</div></center>

						@endif


					</div>
				</div>
			</form>
		</div>        
	</div>
</section>

<br/>


<!-- e reservation header -->
<!-- room reservation -->
@foreach($rooms as $room)
@include('customer.Reservation_Kind.family-room')
@endforeach
@foreach($pools as $pool)
@include('customer.Reservation_Kind.pool')
@endforeach
@foreach($events as $event)
@include('customer.Reservation_Kind.event')	
@endforeach
<div class="col-md-12">
	<center>
	<button type="button" id="switch-1" 
											class = "btn btn-tbl-delete btn-md delete" data-toggle="modal" data-target="#delete" data-id=""><i class="fa fa-file-text-o"></i></button><label>Terms and Condition</label></center>
</div>



<!-- room e -->


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
				<div class="modal-body">
					<input type="hidden" class="deleted_album" name="deleted_album" id="album_id">
					<p>By proceeding with the reservation you accept and agree with The Grand Pavillion Hotel and Resort that the reservation (details of which are set out above), if accepted by us, shall be on the terms and conditions as follows:
<br>
A. General
<br>
• The website thegrandpavillion.com (the "Site"), including all content and infrastructure of the Site, is owned and operated by the management and is provided for your (the "User" or "you") personal non-commercial use only, subject to the terms and conditions set out below.
<br>
• These Terms and Conditions of Use (the "Terms and Conditions" or "T&Cs"), as may be amended from time to time, shall apply to all acts engaged in by the User who makes use of the hotel reservation service and events reservation service provided by the management that is made available online on the Site through any computer and mobile device, hereunder collectively referred to as the "Service."
<br>
• The Site provides an online platform through which hotels, including all types of temporary accommodation, and events services, including all types of events activities, events packages, can advertise their rooms for reservation, and through which visitors to the Site can place reservations and payments for these rooms, event activities, pools and packages. By making a reservation through the Site, you enter into a direct, legally binding contractual relationship with the hotel and the tour supplier where you book. In this transaction, the management acts solely as an intermediary between you and the hotel, transmitting the details of your reservation to the relevant hotel and our affiliate service provider, then sending you a confirmation email for and on behalf of the hotel.

<br>
B. Our Services
<br>
• The Service offered by the management enables you to reserve rooms, pavillion, pools and other types of temporary accommodation. The reservation for the rooms and reserved events activities at the Posted Facility is made directly by yourself through the internet via the Site. The Posted Facilities provide reservations to their accommodation ("Accommodation Services") and events services ("Events Services") voluntarily and meet their obligations to users of the Site as their own responsibility.
<br>
• Refunds are only accepted within 7 days of the date of purchase. To be eligible for a refund, the customer had already paid initial payment for their reservation.
<br>
• To refund your payment, please contact us at thegrandpavilionandresort@gmail.com. To process your refund, we require a proof of purchase. You will be responsible for any other costs for the refund. Having a refund prior to 3 days of the said event is not accepted.
<br>
• In the event you complete a booking based on a rate that has been incorrectly posted, the Hotel reserves the right to correct the rate or cancel the reservation at its discretion, and will contact you directly in order to do so.
<br>
• A reservation is valid immediately after booking. The management must always be informed of a cancellation in writing. Not making the payment is not a cancellation!
<br>
C. Temporary Discontinuance of the Service
<br>
• The Site is undergoing maintenance operations or technical upgrades.
<br>
• The occurrence, or likeliness of occurrence of, an act of God or other state of emergency which makes operation of the Site or the Services impossible
<br>
D. User Obligations
<br>
• The Site and the Service are for your own private use. You agree not to reproduce or transmit any information obtained therein or otherwise allow such information to be used by a third party in any way, for any purpose other than for your own private use, unless you obtain prior approval of the management and the relevant Posted Facility to do otherwise.
<br>
• When you undertake a Usage Agreement with a Posted Facility, you agree to comply with any terms and conditions, rules, and other requirements separately determined by the Posted Facility.
<br>
• If you breach any of the above user responsibilities as set forth in the preceding items, or the management otherwise determines any of your actions to be incompatible with the operation of the Service, the management reserves the right to cause you to cease such act, and cancel the Usage Agreement between you and the relevant Posted Facility, and may take necessary measures (including legal measures) against you, such as suspension of the use of all the services relating to the Site and the Service, or demand for payment of damages.

<br></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-danger "data-dismiss="modal">Ok</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		
		$('.delete').click(function(){

			var record_id = $(this).data('id');

			$('.deleted_album').val(record_id);

		});

	});
</script>

<!--End Services Section--> 

<script type="text/javascript">

	function show_fields()
	{
		var select_status=$('#optservice').val();
		/* if select personal from select box then show my text box */

		if(select_status == 'eventserv')
		{
			$('#services-section').hide();
			$('#type-of-event').show();  
			$('#pool-res').hide();
			$('#room-res').hide();
			$('#type-of-room').hide();
			$('#customer-info').hide();
			$('#room-info').hide();
			$('#type-of-pool').hide();

			$('select#optrooms').prop('selectedIndex',0);
			$('select#optpav').prop('selectedIndex',0);
			$('select#optpools').prop('selectedIndex',0);

			@foreach($pools as $pool)
			$('#{{$pool->pool_type}}').hide();
			@endforeach
			@foreach($rooms as $room)
			$('#{{$room->type}}').hide();
			@endforeach


		}
		if (select_status == 'poolserv')
		{

			$('#type-of-pool').show();
			$('#services-section').hide();
			$('#eventform').hide();
			$('#room-res').hide();
			$('#type-of-room').hide();
			$('#customer-info').hide();
			$('#room-info').hide();
			$('#type-of-room').hide();
			$('#type-of-event').hide();  
			@foreach($rooms as $room)
			$('#{{$room->type}}').hide();
			@endforeach
			@foreach($events as $event)
			$('#{{$event->item_name}}').hide();
			@endforeach

			$('select#optrooms').prop('selectedIndex',0);
			$('select#optpav').prop('selectedIndex',0);
			$('select#optpools').prop('selectedIndex',0);
		}
		if (select_status == 'roomserv')
		{
			$('#type-of-room').show();

			$('#room-res').show();
			$('#pool-res').hide();
			$('#eventform').hide(); 
			$('#services-section').hide();
			$('#customer-info').hide();
			$('#type-of-pool').hide();
			$('#type-of-event').hide();  
			@foreach($pools as $pool)
			$('#{{$pool->pool_type}}').hide();
			@endforeach
			@foreach($events as $event)
			$('#{{$event->item_name}}').hide();
			@endforeach
			
			$('select#optrooms').prop('selectedIndex',0);
			$('select#optpav').prop('selectedIndex',0);
			$('select#optpools').prop('selectedIndex',0);



		}

	}

	

	
</script>




@endsection