@extends('admin.layout.master')

@section('content')
<form action="/admin/settings/profile/edit/user" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field('PATCH')}}
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Edit Profile</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li><a class="parent-item" href="#">Edit Profile</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Edit Profile</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Edit Profile</header>
						</div>
						<div class="card-body row">
							<div class="col-lg-6 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="" name="fname" value="{{Auth::user()->first_name}}" >
									<label class="mdl-textfield__label" for="">First name</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class = "mdl-textfield__input" type = "text" name="lname" value="{{Auth::user()->last_name}}">
									<label class = "mdl-textfield__label">Last name</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="email" name="email" value="{{Auth::user()->email}}">
									<label class="mdl-textfield__label" for="">Email</label>
									
								</div>
							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
									<input class="mdl-textfield__input" type="text" id="sample4" name="gender" value="{{Auth::user()->gender}}" tabIndex="-1">
									<label class="pull-right margin-0">
										<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
									</label>
									<label class="mdl-textfield__label">Gender</label>
									<ul data-mdl-for="sample4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
										<li class="mdl-menu__item" data-val="1">Male</li>
										<li class="mdl-menu__item" data-val="2">Female</li>
									</ul>
								</div>
							</div>
							<div class="card-body row">
								<div class="col-lg-12 p-t-20"> 
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" id="" name="contact_no" value="{{Auth::user()->contact_number}}" >
										<label class="mdl-textfield__label" for="">Contact</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20"> 
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="password" name="password" id=""">
										<label class="mdl-textfield__label" for="password">New Password</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20"> 
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="password" name="password_confirmation" id=""  >
										<label class="mdl-textfield__label" for="password_confirmation">Retype New Password</label>
									</div>
								</div>

								<div class="col-lg-12 p-t-20"> 
									<div class = "mdl-textfield mdl-js-textfield txt-full-width">
										<textarea class = "mdl-textfield__input" name="address" rows =  "4" 
										id = "education" >{{Auth::user()->address}}</textarea>
										<label class = "mdl-textfield__label" for = "text7">Address</label>
									</div>
								</div>
								<div class="col-lg-12 p-t-20 text-center">
									<label class="control-label col-md-3">Upload your Photo</label>
									
									<div class="dz-message">
										<div class="">
											<input type="file" name="upload">
										</div>
										<h3>Drop files here or click to upload.</h3>
										<em>(400 x 300 recommended size in pixels)
										</em>
									</div>
									
								</div>
								<div class="col-lg-12 p-t-20 text-center"> 
									<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
									<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
								</div>
								@if(count($errors))

								<div class="form-group">
									<div class="alert alert-danger">
										<ul>
											@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach

										</ul>

									</div>

								</div>
								@endif
							</div>
						</div>
					</div>
				</div> 
				<br>
				<div class="row">
					<button type="button" class="btn btn-default" onclick="goBack()">Go back</button>
				</div>
			</div>
		</div>
	</form>
	@endsection