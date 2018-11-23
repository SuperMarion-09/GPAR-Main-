@extends('admin.layout.master')

@section('content')
<form action="/admin/manage/add_staff/add" method="post" enctype="multipart/form-data" >
	{{csrf_field()}}
<div class="page-content-wrapper">
	<div class="page-content">
		@include('sweet::alert')
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Staff Details</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Add Staff</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Staff Details</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Staff Details</header>
					</div>
					<div class="card-body row">
						<div class="col-lg-4 p-t-20"> 
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="text" id="" name="fname">
								<label class="mdl-textfield__label" for="">First name</label>
							</div>
						</div>
						<div class="col-lg-4 p-t-20"> 
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="text" id="" name="mname">
								<label class="mdl-textfield__label" for="">Middle name</label>
							</div>
						</div>
						<div class="col-lg-4 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" type = "text" name="lname">
								<label class = "mdl-textfield__label">Last name</label>
							</div>
						</div>
						<div class="col-lg-4 p-t-20"> 
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="email" name="email">
								<label class="mdl-textfield__label" for="">Email</label>

							</div>
						</div>
						<div class="col-lg-4 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" type = "text" name="uname">
								<label class = "mdl-textfield__label">User Name</label>
							</div>
						</div>
						<div class="col-lg-4 p-t-20"> 
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								<input class="mdl-textfield__input" type="text" id="sample4" name="gender" tabIndex="-1">
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
							<div class="col-lg-6 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" maxlength="11" minlength="11" name="contact_no" id="" >
									<label class="mdl-textfield__label" for="">Contact Number</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" value="" id="" name="position">
									<label class="mdl-textfield__label" for="">Position</label>
								</div>
							</div>
							<div class="col-lg-12 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield txt-full-width">
									<textarea class = "mdl-textfield__input" rows =  "4" 
									id = "education" name="address" ></textarea>
									<label class = "mdl-textfield__label" for = "text7">Address</label>
								</div>
							</div>

							<div class="col-lg-6 p-t-20"> 
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="password" id="" name="password" >
									<label class="mdl-textfield__label" for="password">Password</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20"> 
								<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class = "mdl-textfield__input" type = "password" name="password_confirmation">
									<label class = "mdl-textfield__label" for="password_confirmation">Confirm Password</label>
								</div>
							</div>

							<div class="col-lg-12 p-t-20 text-center">
								<label class="control-label col-md-3">Upload Staff Photo</label>
								
									<div class="dz-message">
										<input type="file" name="upload">
										<h3>Drop files here or click to upload.</h3>
										<em>(400 x 300 recommended size in pixels)
										</em>
									</div>
								
							</div>
							<div class="col-lg-12 p-t-20 text-center"> 
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Add Staff</button>
								<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div> 

</form>
			@endsection