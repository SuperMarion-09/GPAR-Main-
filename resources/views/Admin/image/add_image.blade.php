@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add image</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add image</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Add image</header>
					</div>
					<div class="card-body " id="">
						<form name="" action="" method="">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Choose images<small>  (*recommended image size 400 x 300 jpg only)</small></label>
										<input type="file" class="form-control" placeholder="Album name" multiple>
									</div>
									<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 m-l-20 btn-pink">Submit</button>
									<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		<!-- back button-->
		<br>
		<div class="row">
			<button type="button" class="btn btn-default" onclick="goBack()">Go back</button>
		</div>
		<!--end back button-->
	</div>
</div>

@endsection