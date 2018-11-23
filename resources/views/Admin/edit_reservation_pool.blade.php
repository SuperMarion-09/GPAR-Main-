@extends('admin.layout.master')

@section('content')


@foreach($pool_service as $pool)
<form method="POST" action="/admin/reservation/accepted_update_reservation/{{$pool->id}}">
	{{method_field('PATCH')}}
	{{csrf_field()}}
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Edit Pool Reservation</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Edit Pool Reservation</li>
					</ol>
				</div>
			</div>
			@if(session()->has('notif'))

			<center><div class="col col-md-8 ">
				<div class="alert alert-info ">
					<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Notification</strong><p><center>{{session()->get('notif')}}</center></p>
				</div>
			</div></center>

			@endif
			@if(count($errors))
			<div class="col col-md-12">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Reservation</header>
						</div>

						<div class="card-body row">
							<div class="col-lg-6 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="sample2" name="fname" value="{{$pool->fname}}">
									<label class="mdl-textfield__label" for="sample2">First Name:</label>
									<span class="mdl-textfield__error">Input is not a number!</span>
								</div>
							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class = "mdl-textfield__input" type = "text" id = "sample2" name="lname" value="{{$pool->lname}}">
									<label class = "mdl-textfield__label">Last Name:</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class = "mdl-textfield__input" type = "text" id = "sample2" name="email" value="{{$pool->email}}">
									<label class = "mdl-textfield__label">Email:</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class = "mdl-textfield__input" type = "text" id = "sample2" name="contact_no" value="{{$pool->contact_no}}">
									<label class = "mdl-textfield__label">Contact Number:</label>
								</div>
							</div>
							<div class="col-lg-12 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class = "mdl-textfield__input" type = "text" id = "sample2" name="address" value="{{$pool->address}}">
									<label class = "mdl-textfield__label">Address:</label>
								</div>
							</div>
							<hr>
							<div class="col-lg-12 p-t-20"> 

								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">

									<div class="card-head">
										<header>Pool Type</header>
									</div>
									<br>

									<select class="form-control"  id="optservice" name="pool_type" readonly onchange="show_fields()">
										<option class="" value="{{$pool->pool_type}}" selected="">{{$pool->pool_type}}</option>
										@foreach($pool_reservation as $pools)
										<option class="" value="{{$pools->pool_type}}">{{$pools->pool_type}}</option>
										@endforeach
									</select>
								</div>

							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class = "mdl-textfield__input" type = "text" id = "sample2" name="pool_pax" value="{{$pool->pool_pax}}">
									<label class = "mdl-textfield__label">Number of Pax:</label>
								</div>
							</div>
							@endforeach

						</div>
						<div class="col-lg-12 p-t-20 text-center"> 
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
							<a type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" href="/admin/index">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		<!-- <div class="row">
			<button type="button" class="btn btn-default" onclick="goBack()">Go back</button>
		</div> -->
	</div> 


</div>
</div>
</form>
@endsection