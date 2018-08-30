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
										<th class="center">Album Name</th>
										<th class="center">Description</th>
										<th class="center"> Cover </th>
										<th class="center"> Action </th>
									</tr>
								</thead>
								<tbody>
									@foreach ($picture as $pictures)
									<tr class="odd gradeX">
										<td class="center">{{ $pictures->album_name}}</td>
										<td class="center">{{ $pictures->descrition}}</td>
										<td class="center"><img src="assets/img/pool.jpg""></td>
										<td class="center">
											<a href="/admin/album/{album_name}/edit" class="btn btn-tbl-edit btn-xs">
												<i class="fa fa-pencil"></i>
											</a>
											<a href="/admin/album/{album_name}/view_images" class="btn btn-tbl-view btn-xs">
												<i class="fa fa-eye"></i>
											</a>
											<button class="btn btn-tbl-delete btn-xs">
												<i class="fa fa-trash-o "></i>
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
			<button type="button" class="btn btn-default" onclick="goBack()">Go back</button>
		</div>
	</div>
</div>


@endsection