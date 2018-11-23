@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		@include('sweet::alert')
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Album Images</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Album images</li>
				</ol>
			</div>
		</div>
		
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Album</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body ">
						<div class="table-scrollable">
							<table class="table table-hover table-checkable album-table order-column full-width" id="example4">
								<thead>
									<tr>
										<th class="center">Album Type</th>
										<th class="center">Album Name</th>
										<th class="center">Description</th>
										<th class="center"> Cover </th>
										<th class="center"> Action </th>
									</tr>
								</thead>
								<tbody>
									@foreach ($picture as $pictures)
									<tr class="odd gradeX">
										<td class="center">{{ $pictures->album_type}}</td>
										<td class="center">{{ $pictures->album_name}}</td>
										<td class="center">{{ $pictures->description}}</td>
										<td class="center"><img src="{{asset('storage/upload/gallery/covers/'.$pictures->album_name.'/'.$pictures->cover_image)}}"></td>
										<td class="center">
											<a href="/admin/gallery/album/{{$pictures->id}}/edit" class="btn btn-tbl-edit btn-xs">
												<i class="fa fa-pencil"></i>
											</a>
											<a href="/admin/gallery/album/{{$pictures->id}}/view_images" class="btn btn-tbl-view btn-xs">
												<i class="fa fa-eye"></i>
											</a>
											<button type="button" id="switch-1" 
											class = "btn btn-tbl-delete btn-xs delete" data-toggle="modal" data-target="#delete" data-id="{{$pictures->id}}"><i class="fa fa-trash-o"></i></button>
										</td>
									</tr>
									@endforeach
									

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- end accepted reservation -->
		</div>
		<br>
		
	</div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/admin/gallery/album/delete/pictures" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<div class="modal-body">
					<input type="hidden" class="deleted_album" name="deleted_album" id="album_id">
					<p>Are you sure that the item will be Deleted?<br>It will stored in the others/logs.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger ">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		
		$('.delete').click(function(){

			var record_id = $(this).data('id');

			$('.deleted_album').val(record_id);

		});

	});
</script>


@endsection