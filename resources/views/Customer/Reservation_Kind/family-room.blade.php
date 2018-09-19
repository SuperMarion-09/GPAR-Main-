
<section id="{{$room->type}}" style="display: none;">

	<div class="container">
		<div class="product-content product-wrap clearfix">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image">
						@if($room->image_name == "")
						<p> No Picture</p>
						@elseif($room->image_name == $room->image_name) 
						<img src="{{asset('storage/upload/room/'.$room->image_name)}}" alt="194x228" class="img-responsive"> 
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
						<p><b>	<em>	{{$room->room_cancellation_type}}</em>	</b></p>
						<span class="tag1"></span> 
					</div>
					<div class="description">
						<p>{{$room->room_description}} </p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


