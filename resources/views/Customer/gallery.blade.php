@extends('customer.layouts.master')

@section('content')

<!--HEADER SECTION RESERVATION--> 
<section class="page-title" style="background-image:url(css/images/background/gallery-head.jpg);">
	<div class="auto-container">
		<!--Title Box-->
		<div class="title-box">
			<h2>GALLERY</h2>
		</div>
	</div>
</section>
<!-- HEADER SECTION RESERVATION E-->

<!--Gallery Page Section / Style Two-->
<section class="gallery-page-section style-two">
	<div class="auto-container">
		<!--Gallery Title-->
		<div class="gallery-title">
			<h3>We captured our sweet moment in our gallery</h3>
			<div class="text">View our amenities and past events</div>
		</div>
		
		<div class="row clearfix">
			@foreach($gallery as $pictures)
			<!--Gallery Item Three-->
			<div class="gallery-item-three col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="image-box">
						<figure class="image"><img src="{{asset('storage/upload/gallery/covers/'.$pictures->album_name.'/'.$pictures->cover_image)}}" alt=""></figure>
						<!--Overlay Box-->
						<a href="/gallery/album/{{$pictures->id}}/view_images" data-fancybWox-group="gallery" class="overlay-box lightbox-image"><span class=""><h3>{{$pictures->album_name}}</h3></span></a>
					</div>
				</div>
			</div>
			@endforeach
			
			
			
		</div>
		
	</div>
	
</section>
<!--Gallery Page Section-->

@endsection