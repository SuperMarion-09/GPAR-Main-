@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Create Album</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Album</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Please fill this form to create new album</header>
					</div>
					<div class="card-body " id="">
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<!-- text input -->
								<form action="#" method="" name="add-albums">
									<div class="form-group">
										<label>Album name or title <span style="color:red;">*</span><small>(example birthdays,our pool etc)</small></label>
										<input type="text" class="form-control" placeholder="Album name" required/>
									</div>

									<!-- textarea -->
									<div class="form-group">
										<label>Album description<small> (*100 characters only)</small></label>
										<textarea class="form-control" rows="3" placeholder="Album description"></textarea>
									</div>
									<div class="form-group">
										<label>Choose album cover<small>  (*recommended image size 400 x 300 jpg only)</small></label>
										<input type="file" class="form-control" placeholder="Album name" name="img">
									</div>
									<div class="form-group">
										<label>add images<small>  (*recommended image size 400 x 300 jpg only)</small></label>
										<input type="file" class="form-control" placeholder="Album name" name="img" multiple required="true">
									</div>
									<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 m-l-20 btn-pink">Submit</button>
									<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection