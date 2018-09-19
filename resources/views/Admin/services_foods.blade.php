<div class="row" id="pool-res"  ">
	<div class="col-sm-12">
		<div id="services_foods_reserve" style="display: none;">
			<div class="card-box">
				<div class="card-head">
					<header>Event Reservation</header>
				</div>
				<div class="card-body ">

					<nav aria-label="breadcrumb">
						<ol class="navhelp breadcrumb">
							<li class=" breadcrumb-item active">Reservation Information</li>
							<li class="breadcrumb-item">Personal Information</li>
							<li class="breadcrumb-item">Summary</li>
							<li class="breadcrumb-item" >Payment</li>
						</ol>
					</nav>
					<h3>Event Information</h3>
					<hr>
					<div>

						<div class="divider"> </div>
						<H3>INCLUSIONS</H3>
						<div class="divider"></div>
						<div class="row">
							<!-- food list start -->
							<div class="foods-events">
								<H4>Foods</H4>
								<div class="divider"></div>
								@foreach($events as $event)
								@if($event->category=='foods')
								<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
									<label class="image-checkbox">
									<img class="img-responsive" src="{{asset('storage/upload/items/foods/'.$event->image_name)}}" />
										<input type="checkbox" name="image_check[]" value="1" />
										<i class="glyphicon glyphicon-ok hidden"></i>
									</label>
									<div class="desc"><h5>{{$event->item_name}}</h5></div>
								</div>
								@endif
								<H4>Services</H4>
								<div class="divider"></div>
								@if($event->category=='services')
								<div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
									<label class="image-checkbox">
									<img class="img-responsive" src="{{asset('storage/upload/items/services/'.$event->image_name)}}" />
										<input type="checkbox" name="image_check[]" value="1" />
										<i class="glyphicon glyphicon-ok hidden"></i>
									</label>
									<div class="desc"><h5>{{$event->item_name}}</h5></div>
								</div>
								@endif
								@endforeach

								<div class="form-row">          
									<div class="col col-md-6">
										&nbsp
										<a class="btn btn-info btn-lg back_info">Back</a>
										<a class="btn btn-info btn-lg  info_next" >Next</a>
									</div>
								</div>
								<div class="form-row">
									<div class="col col-md-6">

									</div>
								</div>


							</div>
						</div>
					</div>
				</div>