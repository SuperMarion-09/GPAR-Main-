@extends('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="container">
			<div class="card-box">
				@include('sweet::alert')
				<div class="card-head">
					<header>Profile Information</header>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<th class="center" style="width: 400px;">Profile Picture</th>
							<th class="center">Profile Information</th>
						</thead>
						<tbody>
							<tr >
								<td rowspan="8">
									<div class="user-circle-img">

										<img src="{{asset('storage/upload/staff/'.Auth::user()->image_name)}}" class="img-responsive" height="500" width="500" alt=""> </div>

									</div>
								</td>
								<td>
									<b>Full name:</b>&nbsp;&nbsp;<span>{{Auth::user()->first_name}}&nbsp;{{Auth::user()->last_name}}</span>
								</td>
							</tr>
							<tr>
								<td>
									<b>Address:</b>&nbsp;&nbsp;<span>{{Auth::user()->address}}</span>
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>&nbsp;&nbsp;<span>{{Auth::user()->email}}</span>
								</td>
							</tr>
							<tr> 
								<td>
									<b>Contact:</b>&nbsp;&nbsp;<span>{{Auth::user()->contact_number}}</span>
								</td>
							</tr>
							<tr> 
								<td>
									<b>Position:</b>&nbsp;&nbsp;<span>{{Auth::user()->position}}</span>
								</td>
							</tr>
							<tr> 
							</tr>
							<tr> 
								<td>
									<b>Gender:</b>&nbsp;&nbsp;<span>{{Auth::user()->gender}}</span>
								</td>
							</tr>
							<tr> 
								<td>
									<b>Password:</b>&nbsp;&nbsp;<span><a href="/admin/settings/profile/edit">Change Password</a></span>
								</td>
							</tr>
						</tbody>

					</table>
					<a class="btn btn-info btn-md pull-right
					" href="/admin/settings/profile/edit">Edit</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection