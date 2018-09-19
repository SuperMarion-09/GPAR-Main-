@extends('admin.layout.master')

@section('content')

<form method="POST" action="/admin/pool/edit/{{$id->id}}" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Edit Pool Details</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Pools</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Edit Pool Details</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Edit Pool Details</header>
					</div>
					<div class="card-body row">
						<div class="col-lg-12 p-t-20"> 
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="text" name="new_type"  value="{{$id->pool_type}}" id="sample2" >
								<label class="mdl-textfield__label" for="sample2">Pool Type</label>
								
							</div>
						</div>

						<div class="col-lg-12 p-t-20"> 
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="text" name="new_price" pattern="-?[0-9]*(\.[0-9]+)?" value="{{$id->pool_price}}" id="sample2" required>
								<label class="mdl-textfield__label" for="sample2">Pool Price (Private Usage)</label>
								<span class="mdl-textfield__error">Input is not a number!</span>
							</div>
							<div class="col-lg-12 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" value="{{$id->minimum_pax}}" name="new_min_pax" id="sample2" required>
									<label class="mdl-textfield__label" for="sample2">Minimun number of pax (input numbers only) </label>
									<span class="mdl-textfield__error">Input is not a number!</span>
								</div>
							</div>
						</div>

							<div class="col-lg-12 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" value="{{$id->price_per_head_day}}" name="new_add_price_day" id="sample2">
									<label class="mdl-textfield__label" for="sample2">Daytime rate per head (price of pax per head)</label>
									<span class="mdl-textfield__error">Input is not a number!</span>
								</div>
							</div>

							<div class="col-lg-12 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" name="new_add_price_night" pattern="-?[0-9]*(\.[0-9]+)?" value="{{$id->price_per_head_night}}" id="sample2">
									<label class="mdl-textfield__label" for="sample2">Night rate per head (price of pax per head)</label>
									<span class="mdl-textfield__error">Input is not a number!</span>
								</div>
							</div>

							<div class="col-lg-12 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield txt-full-width">
									<textarea class = "mdl-textfield__input" name="new_description" rows =  "4" 
									id = "education" >{{$id->pool_description}}</textarea>
									<label class = "mdl-textfield__label" for = "text7">Description</label>
								</div>
							</div>
							<div class="col-lg-12 p-t-20 text-center">
								<label class="control-label col-md-3">Upload Pool Photos</label>
										<br><input type="file" name="upload">
										<h3>Drop files here or click to upload.</h3>
										<em>(400 x 300 recommended size in pixels)
										</em>
									</div>
								
							</div>
							<div class="col-lg-12 p-t-20 text-center"> 
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
								<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
		<br>
		<div class="row">
			<button type="button" class="btn btn-default" onclick="goBack()">Go back</button>
		</div>
	</div>

	@endsection