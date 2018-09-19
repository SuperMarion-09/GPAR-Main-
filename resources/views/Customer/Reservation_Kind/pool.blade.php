<section id="{{$pool->pool_type}}" style="display: none;">
	<div class="container">
		<div class="product-content product-wrap clearfix">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image">
						@if($pool->image_name == "")
						<p> No Picture</p>
						@elseif($pool->image_name == $pool->image_name) 
						<img src="{{asset('storage/upload/pool/'.$pool->image_name)}}" alt="194x228" class="img-responsive"> 
						@endif
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="product-details">
						<h3 class="name">
							<a href="#">
								{{$pool->pool_type}} type
							</a>
						</h3>
						<p class="price-container">
							
							<span>Private Usage: {{$pool->pool_price}} php</span>

						</p>
						<p class="available-rooms">
							<span>Daytime: {{$pool->price_per_head_day}} php</span></br>
							<span>Night: {{$pool->price_per_head_night}} php</span>
						</p>
						
						<span class="tag1"></span> 
					</div>
					<div class="description">
						<p>{{$pool->pool_description}} </p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

