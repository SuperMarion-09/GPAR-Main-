@extends ('admin.layout.master')

@section('content')
<div class="page-content-wrapper">
	<form method="post" action="/admin/pool/add_pools">
		{{ csrf_field() }}
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Add Pool Details</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li><a class="parent-item" href="/admin/pool/view_pools">Pools</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Add Pool Details</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Add Pool Details</header>
							<button id = "panel-button" 
							class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
							data-upgraded = ",MaterialButton">
							<i class = "material-icons">more_vert</i>
						</button>
						<ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
						data-mdl-for = "panel-button">
						<li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
						<li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
						<li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
					</ul>
				</div>
				<div class="card-body row">
					<div class="col-lg-12 p-t-20"> 
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2" name="addPricePerHead">
							<label class="mdl-textfield__label" for="sample2">Rate per head (price of pax per head)</label>
							<span class="mdl-textfield__error">Input is not a number!</span>
						</div>
					</div>
					<div class="col-lg-12 p-t-20"> 
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2" name="addPoolPax">
							<label class="mdl-textfield__label" for="sample2">Minimum number of pax (input numbers only) </label>
							<span class="mdl-textfield__error">Input is not a number!</span>
						</div>
						<div class="col-lg-12 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield txt-full-width">
								<textarea class = "mdl-textfield__input" rows =  "4" 
								id = "education" name="description" required></textarea>
								<label class = "mdl-textfield__label" for = "text7">Description</label>
							</div>
						</div>
						<div class="col-lg-12 p-t-20 text-center">
							<label class="control-label col-md-3">Upload Pool Photos</label>
							<!-- <form id="id_dropzone" class="dropzone">
								<div class="dz-message">
									<div class="dropIcon">
										<i class="material-icons">cloud_upload</i>
									</div>
									<h3>Drop files here or click to upload.</h3>
									<em>(400 x 300 recommended size in pixels)
									</em>
								</div>
							</form> -->
						</div>
						<div class="col-lg-12 p-t-20 text-center"> 
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="btnSubmit">Submit</button>
							<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</form>
</div>

@endsection