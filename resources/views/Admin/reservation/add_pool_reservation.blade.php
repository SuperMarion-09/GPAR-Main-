
	
	
	<!-- room reservation -->
	<div class="form-row">
		<div class="col col-md-12">
			@foreach($pools as $pool)
			<section id="{{$pool->pool_type}}" style="display: none;">
				<div class="container">
					<div class="product-content product-wrap clearfix">
						<div class="row">
							<div class="col-md-5 col-sm-12 col-xs-12">
								<div class="product-image">
									@if($pool->image_name!="") 
									<img src="{{asset('storage/upload/pool/'.$pool->image_name)}}" alt="194x228" class="img-responsive">
									@else
									<p >No Picture Available</p>
									@endif
								</div>
							</div>
							<div class="col-md-7 col-sm-12 col-xs-12">
								<div class="product-details">
									<h2 class="name">
										<a href="#">
											<center>{{$pool->pool_type}}</center>
										</a>
									</h2>
									<p class="price-container">
										<center><span><b><em>Private Usage Price: </b>{{$pool->pool_price}}php</em></span></center>
									</p>
									<p class="available-rooms">
										<center><span><b><em>Daily Rate(per head):</b>{{$pool->price_per_head_day}} php</em></span><br>
											<span><b><em>Night Rate(per head): </b>{{$pool->price_per_head_night}} php</em></span></center>
										</p>
										<span class="tag1"></span> 
									</div>
									<div class="description">
										<center><span><b><em>Pool Description</em></b></span>
											<p>{{$pool->pool_description}}. </p></center>
											<ul class="list-group">

											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

					</section>
					@endforeach
				</div>
			</div>

			

		</div>
	</div>


	<script type="text/javascript">
		$(document).ready(function() {

			$('.Pool_sum').click(function(){

				var record_id = document.getElementById('date').value;

				$('.in_date').val(record_id);

			});

		});
		function show_pools(val) 
		{

			@foreach($pools as $pool)
			if (val == '{{$pool->pool_type}}') 
			{
				$('#{{$pool->pool_type}}').show();
				
				$('#services-section').hide();
				$('#eventres').hide();

				$('#customer-info').hide();
				$('#family-room').hide();
				$('#justine-room').hide();
				$('#chester-room').hide();
				$('#room-info').hide();

			}
			if (val != '{{$pool->pool_type}}')
			{
				$('#{{$pool->pool_type}}').hide();
				$('#pool-res').show();
				$('#services-section').hide();
				$('#eventres').hide();

				$('#customer-info').hide();
				$('#standard-room').hide();
				$('#justine-room').hide();
				$('#chester-room').hide();
				$('#room-info').hide();

			}
			@endforeach


		}
	</script>
