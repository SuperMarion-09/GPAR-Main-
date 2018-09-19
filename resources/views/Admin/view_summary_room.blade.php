@extends('admin.layout.master')

@section('content')
<form action="/admin/reservation/summary/pay" method="post" >
	{{csrf_field()}}
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
													<td><b>Service type:</b>&nbsp;<span>Rooms</span></td>
													<input type="hidden" name="service_type" value="rooms">

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
													<td><b>Room Type:</b>&nbsp;<span>{{$room_type}}</span></td>
													<input type="hidden" name="room_type" value="{{$room_type}}">
													<td><b>Room Quantity:</b>&nbsp;<span>{{$room_quantity}}</span></td>
													<input type="hidden" name="room_quantity" value="{{$room_quantity}}">

												</tr>


												<tr>

													<td class="" colspan="2">
														<span class="pull-right" style="margin-right: 50px;"><strong >Total:</strong>
															&nbsp;&nbsp; Php {{$totalr}} <input type="hidden" name="total_price" value="{{$totalr}}">
														</span></td>
													</tr>
												</tbody>
												<tr>
													<td colspan="2">
														<a class="btn btn-info btn-success btn-lg pull-right" data-toggle="modal" data-target="#submit" data-id="">Next</a>

													</td>
												</tr>
											</table>
										</div>
									</div>  
								</div> 
								@endif
							</section>
						</div>
					</div>
				</div>
			</div>
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

							<p><center>Payment</center></p>
							<center><input type="text" name="payment"></center>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Cash</button>
						</div>

					</div>
				</div>
			</div>
		</form>

		@endsection

















































