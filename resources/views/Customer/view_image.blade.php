@extends('customer.layouts.master')

@section('content')
@foreach($gallery as $picture)
<!--HEADER SECTION RESERVATION--> 
<section class="page-title" style="background-image:url({{asset('storage/upload/gallery/covers/'.$picture->album_name.'/'.$picture->cover_image)}});">
	@endforeach
	<div class="auto-container">
		<!--Title Box-->
		<div class="title-box">
			@foreach($gallery as $picture)
			<h2>{{$picture->album_name}}</h2>
			@endforeach
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
			@foreach(explode(',',$pictures->image) as $pic)
			<!--Gallery Item Three-->
			<div class="gallery-item-three col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="image-box">
						<figure class="image"><img src="{{asset('storage/upload/gallery/'.$pictures->album_name.'/'.$pic)}}" alt=""></figure>
						<!--Overlay Box-->
						<span class=""><h3>{{$pic}}</h3></span></a>
					</div>
				</div>
			</div>
			@endforeach
			@endforeach
			
		</div>
		<div>
			<a class="btn btn-info btn-lg" href="/gallery">Back</a>
			</div>
	</div>
	
</section>
<!--Gallery Page Section-->

@endsection