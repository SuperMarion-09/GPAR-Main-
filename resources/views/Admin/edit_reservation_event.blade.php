@extends('admin.layout.master')

@section('content')
@foreach($event_service as $event)
<form method="post" action="/admin/reservation/accepted_update_reservation/{{$event->id}}">
	{{csrf_field()}}
	{{method_field('PATCH')}}
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
				<div class="col col-md-12">
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
					<div class="page-title">Edit Event Reservation</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Edit Event Reservation</li>
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
						
						
						<div class="col-lg-6 p-t-20"> 
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="text" name="fname" id="sample2" value="{{$event->fname}}">
								<label class="mdl-textfield__label" for="sample2">First Name:</label>
								<span class="mdl-textfield__error">Input is not a number!</span>
							</div>
						</div>
						<div class="col-lg-6 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" type = "text" name="lname" id = "sample2" value="{{$event->lname}}">
								<label class = "mdl-textfield__label">Last Name:</label>
							</div>
						</div>
						<div class="col-lg-6 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" type = "text" id = "sample2" name='email' value="{{$event->email}}">
								<label class = "mdl-textfield__label">Email:</label>
							</div>
						</div>
						<div class="col-lg-6 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" type = "text" id = "sample2" name="contact_no" value="{{$event->contact_no}}">
								<label class = "mdl-textfield__label">Contact Number:</label>
							</div>
						</div>
						<div class="col-lg-12 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" type = "text" name="address" id = "sample2" value="{{$event->address}}">
								<label class = "mdl-textfield__label">Address:</label>
							</div>
						</div>

						<hr>
						<div class="col-lg-12 p-t-20"> 
							
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">

								<div class="card-head">
									<header>Event Type</header>
								</div>
								<br>
								
								<select class="form-control"  id="optservice" name="pav_type" readonly onchange="show_fields()">
									<option class="" value="{{$event->event_type}}" selected="">{{$event->event_type}}</option>
									@foreach($pavilion as $pav)
									<option class="" value="{{$pav->item_name}}">{{$pav->item_name}}</option>
									@endforeach
								</select>
							</div>

						</div>
						<div class="col-lg-12 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" name="add_pax" type = "text" id = "sample2" value="{{$event->event_pax}}">
								<label class = "mdl-textfield__label">Add Event Pax:</label>
							</div>
						</div>
						@endforeach

						<div class="col-lg-6 p-t-20">
							<span><label>Foods</label></span> 
							<div class = "form-control">
								@foreach($event_service as $ev)
								@foreach($event_food as $event)
								@foreach(explode(',',$ev->event_foods) as $foo)
								
									@if($event->item_name==$foo)
									<input type="checkbox" name="foods[]" value="{{$event->item_name}}" checked><label>{{$event->item_name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									@endif
								@endforeach
								@endforeach
								@if($event->item_name!=$foo)
									<input type="checkbox" name="foods[]" value="{{$event->item_name}}"><label>{{$event->item_name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								@endif
								@endforeach
							</div>
						</div>
						<div class="col-lg-6 p-t-20">
							<span><label>Services</label></span> 
							<div class = "form-control">
								@foreach($event_service as $ev)
								@foreach($event_item as $item)
								@foreach(explode(',',$ev->event_service) as $ser)
								
									@if($item->item_name==$ser)
									<input type="checkbox" name="services[]" value="{{$item->item_name}}" checked><label>{{$item->item_name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									@endif
								@endforeach
								@endforeach
								@if($item->item_name!=$ser)
									<input type="checkbox" name="services[]" value="{{$item->item_name}}"><label>{{$item->item_name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								@endif
								@endforeach
							</div>
						</div>
						@foreach($event_service as $event)
						
						<div class="col-lg-12 p-t-20">
							<span><label>Pool Reservation</label></span> 
							<select class="form-control"  id="optservice" name="pool_type" readonly onchange="show_fields()">
									<option class="" value="{{$event->pool_type}}" selected="">{{$event->pool_type}}</option>
									@foreach($pool_reservation as $pool)
									<option class="" value="{{$pool->pool_type}}">{{$pool->pool_type}}</option>
									@endforeach
									<option class="" value="no_pool" >Delete Pool</option>
								</select>
							
						</div>
					
						@endforeach

						@foreach($event_service as $event)
						
						<div class="col-lg-6 p-t-20">
							<span><label>Room Reservation</label></span> 
							<select class="form-control"  id="optservice" name="room_type" readonly onchange="show_fields()">
									<option class="" value="{{$event->room_type}}" selected="">{{$event->room_type}}</option>
									@foreach($room_reservation as $room)
									<option class="" value="{{$room->room_type}}">{{$room->room_type}}</option>
									@endforeach
									<option class="" value="no_room" >Delete Room</option>
								</select>
							
						</div>
						<div class="col-lg-6 p-t-20">
							<span><label>Room Reservation</label></span> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" name="no_room" type = "text" id = "sample2" value="{{$event->room_quantity}}">
								<label class = "mdl-textfield__label">Number of Rooms:</label>
							</div>
							
						</div>
						
						@endforeach

					</div>
					<div class="col-lg-12 p-t-20 text-center"> 
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
						<a type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" href="/admin/index">Cancel</a>
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
</form>

@endsection