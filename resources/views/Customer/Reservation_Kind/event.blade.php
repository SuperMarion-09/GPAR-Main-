
			<section id="{{$event->item_name}}" style="display: none;">
				<div class="container">
					<div class="product-content product-wrap clearfix">
						<div class="row">
							<div class="col-md-5 col-sm-12 col-xs-12">
								<div class="product-image">
									@if($event->image_name == "")
									<p> No Picture</p>
									@elseif($event->image_name == $event->image_name) 
									<img src="{{asset('storage/upload/item/pavilion/'.$event->image_name)}}" alt="194x228" class="img-responsive"> 
									@endif
								</div>
							</div>
							<div class="col-md-7 col-sm-12 col-xs-12">
								<div class="product-details">
									<h3 class="name">
										<a href="#">
											{{$event->item_name}} type
										</a>
									</h3>
									<p class="price-container">

										<span>Pavilion Price: {{$event->item_price}} php</span>

									</p>
									

									<span class="tag1"></span> 
								</div>
								<div class="description">
									<p>{{$event->item_description}} </p>

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
