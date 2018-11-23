@extends('Customer.layouts.master')

@section('content')


    <!--Main Slider-->
    <section class="main-slider" data-start-height="850" data-slide-overlay="yes">

    	<div class="tp-banner-container">
    		@include('sweet::alert')
    		<div class="tp-banner">
    			<ul>

    				<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="css/images/gphar-slider/pic2.jpg "  data-saveperformance="off"  data-title="Awesome Title Here">
    					<img src="css/images/gphar-slider/pic2.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

    					<div class="tp-caption sfr sfb tp-resizeme"
    					data-x="center" data-hoffset="0"
    					data-y="center" data-voffset="0"
    					data-speed="1500"
    					data-start="500"
    					data-easing="easeOutExpo"
    					data-splitin="none"
    					data-splitout="none"
    					data-elementdelay="0.01"
    					data-endelementdelay="0.3"
    					data-endspeed="1200"
    					data-endeasing="Power4.easeIn"><div class="text">Come & Enjoy</div></div>

    					<div class="tp-caption sfl sfb tp-resizeme"
    					data-x="center" data-hoffset="0"
    					data-y="center" data-voffset="60"
    					data-speed="1500"
    					data-start="500"
    					data-easing="easeOutExpo"
    					data-splitin="none"
    					data-splitout="none"
    					data-elementdelay="0.01"
    					data-endelementdelay="0.3"
    					data-endspeed="1200"
    					data-endeasing="Power4.easeIn"><h2>Precious moment with us</h2></div>

    					<div class="tp-caption sfl sfb tp-resizeme"
    					data-x="center" data-hoffset="0"
    					data-y="center" data-voffset="150"
    					data-speed="1500"
    					data-start="500"
    					data-easing="easeOutExpo"
    					data-splitin="none"
    					data-splitout="none"
    					data-elementdelay="0.01"
    					data-endelementdelay="0.3"
    					data-endspeed="1200"
    					data-endeasing="Power4.easeIn">
    				</li>

    				<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="css/images/gphar-slider/img-2.jpg"  data-saveperformance="off"  data-title="Awesome Title Here">
    					<img src="css/images/gphar-slider/img-2.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

    					<div class="tp-caption sfb sfb tp-resizeme"
    					data-x="left" data-hoffset="15"
    					data-y="center" data-voffset="30"
    					data-speed="1500"
    					data-start="500"
    					data-easing="easeOutExpo"
    					data-splitin="none"
    					data-splitout="none"
    					data-elementdelay="0.01"
    					data-endelementdelay="0.3"
    					data-endspeed="1200"
    					data-endeasing="Power4.easeIn">
    					<div class="bg-box">
    						<div class="book-title">Experience<div class="txt">Beautiful amenities</div></div>
    						<!--Promotion Box-->

    					</div>
    				</div>

    			</li>

    			<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="css/images/gphar-slider/img-3.jpg"  data-saveperformance="off"  data-title="Awesome Title Here">
    				<img src="css/images/gphar-slider/img-3.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 

    				<div class="tp-caption sfb sfb tp-resizeme"
    				data-x="center" data-hoffset="0"
    				data-y="center" data-voffset="30"
    				data-speed="1500"
    				data-start="500"
    				data-easing="easeOutExpo"
    				data-splitin="none"
    				data-splitout="none"
    				data-elementdelay="0.01"
    				data-endelementdelay="0.3"
    				data-endspeed="1200"
    				data-endeasing="Power4.easeIn">
    				<div class="bg-box">
    					<div class="book-title text-center">We offer<br><div class="txt"> a choice of comfortable rooms and great rates.</div></div>
    					<!--Promotion Box-->

    				</div>
    			</div>

    		</li>

    	</ul>

    	<div class="tp-bannertimer"></div>
    </div>
</div>
</section>
<!--End Main Slider-->


<!--About Section-->
<section class="about-section">
	<div class="bg-left-icon"></div>
	<div class="auto-container">
		<div class="row clearfix">
			<!--Content Column-->
			<div class="content-column col-md-6 col-sm-12 col-xs-12">
				<div class="inner-box">
					<!--Sec Title-->
					<div class="sec-title">
						<h2>About Us</h2>
						<h3>Welcome to The Grand Pavilion Hotel and Resort</h3>
					</div>

					<div class="text">The Grand Pavilion and Resort is also a great venue. it can handle all types and sizes of receptions-be it a wedding, birthday, baptismal, meeting and more. With its coffee shop, restaurant, videoke bar, and fully equipped functions room.</div>
					<!--Time Cloud-->
					<a class="learn-more theme-btn btn-style-two" href="#">LEARN MORE</a>

				</div>
			</div>

			<!--Images Column-->
			<div class="images-column col-md-6 col-sm-12 col-xs-12">
				<div class="inner-box">
					<div class="row clearfix">
						<div class="column col-md-12 col-sm-12 col-xs-12">
							<figure class="image-box">
								<a data-fancybox-group="about-gallery" href="css/images/about-us-pic/pic1.jpg" title="Caption Here" class="lightbox-image"><img src="css/images/about-us-pic/pic1.jpg" alt="" /></a>
							</figure>
						</div>
						<div class="column col-md-6 col-sm-6 col-xs-12">
							<figure class="image-box">
								<a data-fancybox-group="about-gallery" href="css/images/about-us-pic/pic2.jpg" title="Caption Here" class="lightbox-image"><img src="css/images/about-us-pic/pic2.jpg" alt="" /></a>
							</figure>
						</div>

						<!--Column-->
						<div class="column col-md-6 col-sm-6 col-xs-12">
							<div class="row clearfix">
								<div class="column col-md-6 col-sm-6 col-xs-6">
									<figure class="image-box">
										<a data-fancybox-group="about-gallery" href="css/images/about-us-pic/pic3.jpg" title="Caption Here" class="lightbox-image"><img src="css/images/about-us-pic/pic3.jpg" alt="" /></a>
									</figure>
								</div>

								<div class="column col-md-6 col-sm-6 col-xs-6">
									<figure class="image-box">
										<a data-fancybox-group="about-gallery" href="images/about-us-pic/pic7.jpg" title="Caption Here" class="lightbox-image"><img src="images/about-us-pic/pic7.jpg" alt="" /></a>
									</figure>
								</div>
								<div class="column col-md-6 col-sm-6 col-xs-6">
									<figure class="image-box">
										<a data-fancybox-group="about-gallery" href="css/images/about-us-pic/pic6.jpg" title="Caption Here" class="lightbox-image"><img src="css/images/about-us-pic/pic6.jpg" alt="" /></a>
									</figure>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--End About Section-->

<!--Services Section-->
<section class="services-section">
	<div class="auto-container">
		<div class="row clearfix">
			<!--Column-->
			<div class="title-column col-md-12 col-sm-12 col-xs-12">
				<div class="inner-box text-center">
					<!--Sec Title-->
					<div class="sec-title">
						<h2>Our Service</h2>
						<h3>What we offer?</h3>
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
						</div>
					</div>

					<!--Service Block-->
					<div class="service-block col-md-4 col-sm-4 col-xs-12">
						<div class="inner">
							<div class="icon-box"><span class="icon flaticon-bed"></span></div>
							<h3>Rooms</h3>
							<div class="text">Affordable room rates</div>
						</div>
					</div>

					<!--Service Block-->
					<div class="service-block col-md-4 col-sm-4 col-xs-12">
						<div class="inner">
							<div class="icon-box"><span class="icon flaticon-exercise"></span></div>
							<h3>Pools</h3>
							<div class="text">Enjoy our clean pool </div>
						</div>
					</div>


				</div>

			</div>
		</div>
	</div>
</section>
<!--End Services Section-->
<!--Rooms Section-->
<section class="rooms-section" style="background-image:url(css/images/background/bg.jpg);">
	<div class="auto-container">

		<!--Sec Title One-->
		<div class="sec-title-one">
			<h2>Our rooms</h2>
			<div class="text">Try our beautiful and affordable rooms</div>
		</div>

		<div class="four-item-carousel">
@foreach($a_room as $room)
			<!--Room Box-->
			<div class="room-box">
				<div class="inner-box">
					<div class="image-box">
						<img src="{{asset('storage/upload/room/'.$room->image_name)}}" alt="" />
					</div>
					<!--Lower Content-->
					<div class="lower-content">
						<h3>{{$room->type}} Room</h3>
						<p>{{$room->room_description}}</p>
						<div class="price clearfix">{{$room->room_price}} <a href="/reservation">Reserve now</a></div>
					</div>

				</div>
			</div>
			@endforeach

			

			<!--Room Box-->
		</div>
	</div>
</section>
<!--End Rooms Section--> 
<!--Event Section-->
<section class="event-section bg-white">
	<div class="auto-container">
		<!--Sec Title-->
		<div class="title-box clearfix">
			<!--Sec Title-->
			<div class="sec-title">
				<h2>Our Past Events</h2>
				<h3>attend with us</h3>
			</div>    
			<div class="text pull-left">View our past events</div>
		</div>

		<div class="row clearfix">
@foreach($gallery as $pictures)
			<!--Post Style One / Style Two -->
			<div class="post-style-one style-two col-md-4 col-sm-6 col-xs-12">
				<div class="inner-box">

					<div class="inner-column">
						<!--Image Box-->
						<figure class="image-box">
							<img src="{{asset('storage/upload/gallery/covers/'.$pictures->album_name.'/'.$pictures->cover_image)}}" alt="" />
						</figure>
					</div>

					<div class="inner-column">
						<!--Content Box-->
						<div class="content-box">
							<div class="title"><span class="date">{{ $pictures->album_name}}</span></div>
							<br>
							<div class="text">{{ $pictures->description}}.</div>
							<a href="/gallery/album/{{$pictures->id}}/view_images" class="theme-btn btn-style-two">view photos</a>
						</div>
					</div>

				</div>
			</div>
			@endforeach

			<!--Post Style One / Style Two -->
			

		</div>
	</div>
</section>
<!--End Event Section-->  



@endsection