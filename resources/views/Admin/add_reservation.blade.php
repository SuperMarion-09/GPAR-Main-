@extends ('admin.layout.master')

@section('content')


<!-- start page content -->
<div class="page-content-wrapper">
	@include('sweet::alert')
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
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">ADD RESERVATION </li>
				</ol>
			</div>
		</div>
		<!-- start check res -->
		<div class="container">
			<div class="row">
				<div class="bgwrap">
					<div id="success">

					</div>
					<form action="/admin/reservation/add_reservation/check" method="POST" id="check-date">
						{!! csrf_field() !!}
						<div class="form-row">
							<div class="col col-md-4">
								<label for="service-type">Reservation type</label>
								<select class="form-control" name="service-type" id="optservice" onchange="show_fields()">
									<option class="" disabled selected="">Type of service</option>
									<option value="poolserv">Pools</option>
									<option value="roomserve">Rooms</option>
									<option value="eventserv">Events</option>
								</select>
							</div>

							
							
							<div class="col col-md-4">
								<label>Check In</label>
								<input class="form-control date_1" type="date" name="date_in" id="date"  value="" placeholder="Check-in Date" required>
							</div>
							<div class="col col-md-4">
								<label>Check Out</label>
								<input class="form-control date_2" type="date" name="date_out" id="date1" value="" placeholder="Check-out Date" required>
							</div>
							
							
							<div class="col col-md-6 ">
								<div class="form-row">
									<label >Check</label>
								</div>
								<div class="form-row">
									<input type="submit" name="btnCheck" class="btn btn-info btn-md check_switch" value="Check Availability">
								</div>
							</div>
							<div class="col col-md-6" id="pool_type" style="display: none">
								<label>Pool Type</label>
								<select class="form-control pull-right" name="pool_name" id="optpools" onchange="show_pools(this.value)" arialabelledby="label">
									<option class="" disabled selected="">Type of pools</option>
									@foreach($pools as $pool)
									<option value="{{$pool->pool_type}}">{{$pool->pool_type}}</option>
									@endforeach										
								</select>
							</div>
							<div class="col col-md-6" id="room_type" style="display: none">
								<small id="label" class="text-muted">Room type</small>
								<select class="form-control" name="room_name" id="optrooms" onchange="show_rooms(this.value)" arialabelledby="label">
									<option class="" disabled selected="">Type of rooms</option>
									@foreach($rooms as $room)
									<option value="{{$room->type}}">{{$room->type}}</option>
									@endforeach										
								</select>
							</div>
							<div class="col col-md-6" id="event_type" style="display: none">
								<small id="label" class="text-muted">Pavilion type</small>
								<select class="form-control" name="pavilion_name" id="optrooms" onchange="show_pavilions(this.value)" arialabelledby="label">
									<option class="" disabled selected="">Type of Pavilion</option>
									@foreach($events as $pavilion)
									<option value="{{$pavilion->item_name}}">{{$pavilion->item_name}}</option>
									@endforeach										
								</select>
							</div>
						</div>
						
					</form>
				</div>
			</div>  
		</div> <!-- e check res -->
		<br>
		<br>
		@include('admin.reservation.add_pool_reservation')
		
		


		<!-- e room res--> 
		<!--e -->   
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function() {

		$('.check_switch').click(function(){

			var record_id = document.getElementById('date').value;

			$('.date_1').val(record_id);

		});

	});

	function show_fields()
	{
		var val =$('#optservice').val();

		if (val == 'poolserv')
		{
			$('#pool_type').show();

			$('#services-section').hide();
			$('#eventres').hide();
			$('#roomres').hide();
			$('#type-of-room').hide();
			
		}    


		else if (val == 'roomserve')
		{

			$('#room_type').show();
			$('#pool-res').hide();
			$('#eventres').hide(); 
			$('#services-section').hide();
			$('#standard-room').hide();
			$('#family-room').hide();
			$('#room-info').hide();

		}

		else
		{
			$('#services-section').hide();
			$('#event_type').show();  
			$('#pool-res').hide();
			$('#roomres').hide();
			$('#type-of-room').hide();
			$('#customer-info').hide();
			$('#standard-room').hide();
			$('#family-room').hide();
			$('#justine-room').hide();
			$('#chester-room').hide();
			$('#room-info').hide();
		}


	}

	




	function show_rooms(val) 
	{

		@foreach($rooms as $room)
		if (val == '{{$room->type}}') 
		{
			$('#{{$room->type}}').show();
			$('#pool-res').hide();
			$('#services-section').hide();
			$('#eventres').hide();

			$('#customer-info').hide();
			$('#family-room').hide();
			$('#justine-room').hide();
			$('#chester-room').hide();
			$('#room-info').show();

		}
		if (val != '{{$room->type}}')
		{
			$('#{{$room->type}}').hide();
			$('#pool-res').hide();
			$('#services-section').hide();
			$('#eventres').hide();

			$('#customer-info').hide();
			$('#standard-room').hide();
			$('#justine-room').hide();
			$('#chester-room').hide();
			$('#room-info').show();

		}
		@endforeach


	}


	function customerInfo() 
	{
		$('#customer-info').show();
		$('#services-section').hide();
		$('#eventres').hide();  
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
<script src="https://code.jquery.com/jquery.js"></script>


@endsection