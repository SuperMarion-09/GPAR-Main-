@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<form method="post" action="/admin/room/add_rooms">
		{{ csrf_field() }}
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Add Room Details</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li><a class="parent-item" href="#">Rooms</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Add Room Details</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Add Room Details</header>
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
				<!-- <div class="col-lg-6 p-t-20"> 
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2" >
						<label class="mdl-textfield__label" for="sample2">Room number</label>
						<span class="mdl-textfield__error">Input is not a number!</span>
					</div>
				</div> -->
				<div class="col-lg-6 p-t-20"> 
					<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class = "mdl-textfield__input" type = "text" id = "txtRoomNo" name="roomType">
						<label class = "mdl-textfield__label">Room Type</label>
					</div>
				</div>
				<div class="col-lg-6 p-t-20"> 
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2" name="roomPrice">
						<label class="mdl-textfield__label" for="sample2">Price</label>
						<span class="mdl-textfield__error">Input is not a number!</span>
					</div>
				</div>
				<div class="col-lg-6 p-t-20"> 
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
						<input class="mdl-textfield__input" type="text" id="sample4" value=""  tabIndex="-1" name="roomTypeCancellation">
						<!-- <label class="pull-right margin-0">
							<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
						</label>-->
						<label class="mdl-textfield__label" >Cancellation Charges</label>
						<!--<ul data-mdl-for="sample4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" >
							<li class="mdl-menu__item" data-val="1">Free Cancellation</li>
							<li class="mdl-menu__item" data-val="2">10% Before 24 Hours</li>
							<li class="mdl-menu__item" data-val="1">No Cancellation Allow</li>
						</ul> -->
					</div>
				</div>
				<div class="col-lg-6 p-t-20"> 
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
						<input class="mdl-textfield__input" type="text" id="list2" value=""  tabIndex="-1" name="roomQuantity">
						<!-- <label for="list2" class="pull-right margin-0">
							<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
						</label>-->
						<label for="list2" class="mdl-textfield__label">Quantity</label>
						<!-- <ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" >
							<li class="mdl-menu__item" data-val="1">1</li>
							<li class="mdl-menu__item" data-val="2">2</li>
							<li class="mdl-menu__item" data-val="3">3</li>
							<li class="mdl-menu__item" data-val="4">4</li>
							<li class="mdl-menu__item" data-val="5">5</li>
							<li class="mdl-menu__item" data-val="6">6</li>
							<li class="mdl-menu__item" data-val="7">7</li>
							<li class="mdl-menu__item" data-val="8">8</li>
						</ul> -->
					</div>
				</div>
				<div class="col-lg-6 p-t-20">
					<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class = "mdl-textfield__input" type = "text" 
						pattern = "-?[0-9]*(\.[0-9]+)?" id = "text8" name="roomTelNo">
						<label class = "mdl-textfield__label" for = "text8">Telephone Number</label>
						<span class = "mdl-textfield__error">Number required!</span>
					</div>
				</div>
				<div class="col-lg-12 p-t-20"> 
					<div class = "mdl-textfield mdl-js-textfield txt-full-width">
						<textarea class = "mdl-textfield__input" rows =  "4" 
						id = "education" name="roomDetails" ></textarea>
						<label class = "mdl-textfield__label" for = "text7">Room Details</label>
					</div>
				</div>
				<div class="col-lg-12 p-t-20 text-center">
					<label class="control-label col-md-3">Upload Room Photos</label>
					<form id="id_dropzone" class="dropzone">
						<div class="dz-message">
							<div class="dropIcon">
								<i class="material-icons">cloud_upload</i>
							</div>
							<h3>Drop files here or click to upload.</h3>
							<em>(<strong>400 x 300</strong> recommended size in pixels)</em>
						</div>
					</form>
				</div>
				<div class="col-lg-12 p-t-20 text-center"> 
					<button type="Submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
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