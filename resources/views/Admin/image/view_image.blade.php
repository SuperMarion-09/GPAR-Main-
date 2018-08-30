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
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Album images</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-6">
				<div class="btn-group">
					<a href="/admin/album/{album_name}/add_images" id="addRow" class="btn btn-info">
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
						<header>*Album name</header>
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
									<tr class="odd gradeX">
										<td class="center">pool1.jpg</td>
										<td class="center"><img src="assets/img/pool.jpg""></td>
										<td class="center">
											<button class="btn btn-tbl-delete btn-xs">
												<i class="fa fa-trash-o "></i>
											</button>
										</td>
									</tr>
									<tr class="odd gradeX">
										<td class="center">pool2.jpg</td>
										<td class="center"><img src="assets/img/pool.jpg""></td>
										<td class="center">
											<button class="btn btn-tbl-delete btn-xs">
												<i class="fa fa-trash-o "></i>
											</button>
										</td>
									</tr>
									<tr class="odd gradeX">
										<td class="center">pool1.jpg</td>
										<td class="center"><img src="assets/img/pool.jpg""></td>
										<td class="center">
											<button class="btn btn-tbl-delete btn-xs">
												<i class="fa fa-trash-o "></i>
											</button>
										</td>
									</tr>

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