@extends ('admin.layout.master')

@section('content')
@foreach($settings as $setting)
<div class="page-content-wrapper">
	<div class="page-content">
		@include('sweet::alert')
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Settings</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Settings</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Manage</header>
					</div>
					<div class="card-body ">
						<div class = "mdl-tabs mdl-js-tabs">
							<div class = "mdl-tabs__tab-bar tab-left-side">
								<a href = "#resort-settings" class = "mdl-tabs__tab is-active">Resort settings</a>
								
							</div>
							<div class = "mdl-tabs__panel is-active p-t-20" id = "resort-settings">
								<div class="col-md-12 col-sm-12">
									<div class="card card-box">
										<div class="card-body" id="bar-parent2">
											<form action="/admin/resort/settings/{{$setting->id}}" method="POST" id="form_sample_2" class="form-horizontal">
												{{csrf_field()}}
												{{method_field('PATCH')}}
												<div class="form-body">
													<div class="form-group row  margin-top-20">
														<label class="control-label col-md-3">Name
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<div class="input-icon right">
																<i class="fa"></i>
																<input type="text" class="form-control" value="{{$setting->resorts_fname}}" name="fname" />
																<span><small>(Resort Name *Displayed on client side)</small></span> </div>
															</div>
														</div>
														
														</div>
														<div class="form-group row  margin-top-20">
														<label class="control-label col-md-3">Name
															<span class="required"> * </span>
														</label>
														<div class="col-md-4">
															<div class="input-icon right">
																<i class="fa"></i>
																<input type="text" class="form-control" value="{{$setting->resorts_lname}}" name="lname" />
																<span><small>(Resort Name *Displayed on client side)</small></span> </div>
															</div>
														</div>
														
														<div class="form-group row">
															<label class="control-label col-md-3">Email
																<span class="required"> * </span>
															</label>
															<div class="col-md-4">
																<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="text" class="form-control" value="{{$setting->email}}" name="email" />
																	<span><small>(Resort active email *Displayed on client side)</small></span> </div>
																</div>
															</div>
															<div class="form-group row">
																<label class="control-label col-md-3">Contact
																	<span class="required"> * </span>
																</label>
																<div class="col-md-4">
																	<div class="input-icon right">
																		<i class="fa"></i>
																		<input type="text" class="form-control" value="{{$setting->contact_no}}" name="contact" /><span><small>(Resort active contact *Displayed on client side)</small></span> </div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<div class="offset-md-3 col-md-9">
																	<button type="submit" class="btn btn-info">Submit</button>
																	
																</div>
															</div>
														
													</div>
												</div>
											</div>
										</div>

										<!-- reservation settings -->
										 
													<!-- reservation settings end -->
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- back button-->
								<br>
								
							</div>

						</div>
					</div>

@endforeach
					@endsection