@extends('admin.layout.master')

@section('content')
@foreach($album as $album)
<form method="post" action="/admin/gallery/album/{{$album->id}}/update" enctype="multipart/form-data">
	{{method_field('PATCH')}}
	{{csrf_field()}}
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Edit Gallery</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Edit Gallery (Album)</li>
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
							<header>Album Details</header>
						</div>
						<div class="card-body row">
							
							
							<div class="card-body " id="">
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<!-- text input -->
								
								
									{{csrf_field()}}
									<div class="form-control">
										<label>Album name or title <span style="color:red;">*</span><small>(example birthdays,our pool etc)</small></label>
										<input type="text" class="form-control" placeholder="Album name" value="{{$album->album_name}}" name="album_name" required/>
									</div>

									<!-- textarea -->
									<div class="form-control">
										<label>Album description<small> (*100 characters only)</small></label>
										<textarea class="form-control" rows="3" placeholder="Album description"  name="description">{{$album->description}}</textarea>
									</div>
									<div class="form-control">
										<label>Choose album cover<small>  (*recommended image size 400 x 300 jpg only)</small></label>
										<input type="file" class="form-control" placeholder="Album name" name="album_cover">
									</div>
								</br>
									<div>
										<center>
									<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 m-l-20 btn-pink">Submit</button>
									<a type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" href="/admin/gallery/view_gallery">Cancel</a>
								</center>
								</div>
							
							</div>
							<div  class="col-md-6 col-sm-6">
								@if($album->cover_image != "")
								<img src="{{asset('storage/upload/gallery/covers/'.$album->album_name.'/'.$album->cover_image)}}" class="img-responsive">
								<center><span><b>{{$album->cover_image}}</b></span></center>
								@else
								<center><span><b>No Image</b></span></center>
								@endif
							</div>

						</div>

						
					</div>
					</div>
				</div>
			</div>
		
	</div> 


</div>
</div>
</form>
@endforeach

@endsection