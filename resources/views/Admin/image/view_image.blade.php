@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
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
		@foreach($img as $images)
		<div class="row">
			<div class="col-md-6 col-sm-6 col-6">
				<div class="btn-group">
					<a href="/admin/gallery/album/{{$images->id}}/add_images" id="addRow" class="btn btn-info">
						Add image <i class="fa fa-plus"></i>
					</a>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-box">
					<div class="card-head">
						
						<header>{{$images->album_name}}</header>
						@endforeach
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
										<th class="center">Image Name</th>
										<th class="center">Image</th>
										<th class="center"> Action </th>
									</tr>
								</thead>
								<tbody>
									@foreach($img as $img)
									@foreach(explode(',',$img->image) as $image)
									<tr class="odd gradeX">

										<td class="center">{{$image}}</td>
										<td class="center">
											<img src="{{asset('storage/upload/gallery/'.$img->album_name.'/'.$image)}}"
											height="150" width="150" >
											
										</td>
										<td class="center">
											<button type="button" id="switch-1" 
											class = "btn btn-tbl-delete btn-xs delete" data-toggle="modal" data-target="#delete" data-id="{{$image}}"><i class="fa fa-trash-o"></i>
										</button>
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
		<div class="row">
			<a type="button" class="btn btn-default" href="/admin/gallery/view_gallery">Go back</a>
		</div>
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
			<form action="/admin/gallery/album/{{$img->id}}/image_delete" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<div class="modal-body">
					<input type="hidden" class="deleted_item" name="deleted_image" id="item_id">
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

			$('.deleted_item').val(record_id);

		});

	});
</script>
@endforeach
@endsection