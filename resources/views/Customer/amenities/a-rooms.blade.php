@extends('customer.layouts.master')

@section('content')

<!--HEADER SECTION RESERVATION--> 
<section class="page-title" style="background-image:url(css/images/background/gallery-head.jpg);">
	<div class="auto-container">
		<!--Title Box-->
		<div class="title-box">
			<h2>Our Rooms</h2>
		</div>
	</div>
</section>
<!-- HEADER SECTION RESERVATION E-->
<!--Services Section-->
<!--Rate Section-->
<section class="rate-section">
	<div class="auto-container">
		<div class="row clearfix">
@foreach($a_room as $room)
			<div class="rate-block col-md-6 col-sm-6 col-xs-12">
				<div class="inner-box">
					<!--Image Box-->
					<div class="image-box">
						<a href="#"><img src="{{asset('storage/upload/room/'.$room->image_name)}}" alt="" /></a>
					</div>
					<!--Lower Content-->
					<div class="lower-content">

						<div class="upper-box">
							<div class="title-box">
								<h3>{{$room->type}} Room</h3>

							</div>

							<div class="text">{{$room->room_description}}</div>
							<!--List Style One-->
							
						</div>

						<!--Lower Box-->
						<div class="lower-box clearfix">
							<div class="price-day pull-left">Start from <span>{{$room->room_price}}</span> / Day</div>
							<a href="/reservation" class="book-now pull-right">
							Reserve now!</a>
						</div>
					</div>
				</div>
			</div>
@endforeach
			
		</div>
	</div>
</section>
<!--End Services Section--> ;

@endsection