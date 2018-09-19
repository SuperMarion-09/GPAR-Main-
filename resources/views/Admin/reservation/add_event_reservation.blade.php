<form method="" action="">
	{{csrf_field()}}
		<div class="row" id="eventres" style="display:none; ">
			<div class="col-sm-12">
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
							<form action="Personal-info.html" method="POST">
								<div class="form-row">
									<div class="col">
										<small id="label" class="text-muted">Your event name</small>
										<input type="text" class="form-control" placeholder="Event name" aria-describedby="label">

									</div>
									<div class="col">
										<small id="label" class="text-muted">Your Theme or Motif</small>
										<input type="text" class="form-control" placeholder="motif" aria-describedby="label">
									</div>
								</div>
								<div class="form-row">
									<div class="col col-md-4">
										<small id="label" class="text-muted">Time-in</small>
										<input type="time" class="form-control" placeholder="timein" aria-describedby="label">

									</div>
									<div class="col col-md-4">
										<small id="label" class="text-muted">Time-out</small>
										<input type="time" class="form-control" placeholder="timeout" aria-describedby="label">
									</div>
									<div class="col col-md-4">
										<small id="label" class="text-muted">Number of guest</small>
										<input type="number" class="form-control" placeholder="number of pax" aria-describedby="label">
									</div>
								</div>
								<div class="divider">
									<hr>
									<h3>Inclusions</h3>
									<hr>
								</div>
								<div class="form-row">
									<div class="col col-md-6  col-xs-12">
										<small id="label" class="text-muted">Choose Services</small>
										<select id="multiple" class="form-control select2-multiple" aria-describedby="label" multiple>
											<optgroup label="Services">
												<option value="">Pavilion</option>
												<option value="">Lights</option>
												<option value="">Pool usage</option>
												<option value="">Pool usage</option>
												<option value="">Room usage</option>
												<option value="">Styling</option>
												<option value="">Videoke</option>
												<option value="">photographer</option>
											</optgroup>
										</select>
									</div>
									<div class="col col-md-6  col-xs-12">
										<small id="label" class="text-muted">Choose Foods</small>
										<select id="multiple" class="form-control select1-multiple" aria-describedby="label" multiple>
											<optgroup label="Foods">
												<option value="">Lechon</option>
												<option value="">Kare-kare</option>
												<option value="">Cookies</option>
												<option value="">Pica pica snacks</option>
												<option value="">Salad</option>
												<option value="">Chicken Teriyaki</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="col col-md-12">
										<small id="label" class="text-muted">Special Request</small>
										<textarea class="form-control" rows="7" id="req" aria-describedby="label"></textarea>
									</div>
								</div>
								<div class="form-row">          
									<div class="col col-md-12">
										<br><button class="btn btn-info btn-lg pull-right">Next</button>
									</div>
								</div>
							</form>                                                  
						</div>
					</div>
				</div>
			</div>
		</div>  <!-- e event res-->
		</form> 