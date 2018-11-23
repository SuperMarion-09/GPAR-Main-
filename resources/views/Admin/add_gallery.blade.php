@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			@include('sweet::alert')
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
				<div class="card card-box">
					<div class="card-head">
						<header>Please fill this form to create new album</header>
					</div>
					<div class="card-body " id="">
						
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<!-- text input -->
								<center>
								<form action="/admin/gallery/add_album" method="post" enctype="multipart/form-data" ">
									{{csrf_field()}}
									<div class="col-md-6">
										<label>Album Type <span style="color:red;">*</span><small></small></label>
										<br>
										<div class="form-control">
										<input type="radio" placeholder="Album name" name="album_type" value="Events" style="margin-left: 25px;" /><label>Events</label>
										<input type="radio" placeholder="Album name" name="album_type" value="Pools" style="margin-left: 25px;"/><label>Pools</label>
										<input type="radio" placeholder="Album name" name="album_type" value="Rooms" style="margin-left: 25px;"/><label>Rooms</label>
										<input type="radio" placeholder="Album name" name="album_type" value="Others" style="margin-left: 25px;"/><label>Others</label>
										</div>
									</div>
									<div class="col-md-6">
										<label>Album name or title <span style="color:red;">*</span><small>(example birthdays,our pool etc)</small></label>
										<input type="text" class="form-control" placeholder="Album name" name="album_name" required/>
									</div>

									<!-- textarea -->
									<div class="col-md-6">
										<label>Album description<small> (*100 characters only)</small></label>
										<textarea class="form-control" rows="3" placeholder="Album description" name="description"></textarea>
									</div>
									<div class="col-md-6">
										<label>Choose album cover<small>  (*recommended image size 400 x 300 jpg only)</small></label>
										<input type="file" class="form-control" placeholder="Album name" name="album_cover">
									</div>
									<div class="col-md-6">
										<label>Add images<small>  (*recommended image size 400 x 300 jpg only)</small></label>
										<input type="file" class="form-control" placeholder="Album name" name="images[]" multiple required="true">
									</div>
									<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 m-l-20 btn-pink">Submit</button>
									<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
								</form>
							</center>
							</div>

						</div>

						
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection