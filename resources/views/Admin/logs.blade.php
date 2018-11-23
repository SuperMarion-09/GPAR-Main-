@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		@include('sweet::alert')
		<label>Reservation type</label>
		<select name="service-type" id="optservice" onchange="show_fields(this.value)">
			<option class="" disabled selected="">Type of service</option>
			<option value="view-pools">Pools</option>
			<option value="view-rooms">Rooms</option>
			<option value="view-staffs">Staff</option>
			<option value="view-events">Events</option>
			<option value="view-albums">Albums</option>
			<option value="view-reservation">Past Reservation</option>
		</select>

		
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					
					<div class="col-md-12">
					
					@include('admin.deletedLogs.pools')
					</div>
					<div class="col-md-12">
					@include('admin.deletedLogs.rooms')
					</div>
					<div class="col-md-12">
					
					@include('admin.deletedLogs.staff')
					</div>
					<div class="col-md-12">
					
					@include('admin.deletedLogs.event')
					</div>
					<div class="col-md-12">
					
					@include('admin.deletedLogs.album')
					</div>
					<div class="col-md-12">
					
					@include('admin.deletedLogs.reservation')
					</div>
				</div>
			</div>
			


		</div>
	</div>




	@endsection
	<script type="text/javascript">
		function show_fields(selected)
		{


			if (selected == 'view-pools')
			{
				$('#view-pools').show();
				$('#view-rooms').hide();
				$('#view-staffs').hide();
				$('#view-events').hide();
				$('#view-albums').hide();
				$('#view-reservation').hide();


			}
			if (selected == 'view-rooms')
			{
				$('#view-rooms').show();
				$('#view-pools').hide();
				$('#view-staffs').hide();
				$('#view-events').hide();
				$('#view-albums').hide();
				$('#view-reservation').hide();


			}
			if (selected == 'view-staffs')
			{
				$('#view-staffs').show();
				$('#view-pools').hide();
				$('#view-rooms').hide();
				$('#view-events').hide();
				$('#view-albums').hide();
				$('#view-reservation').hide();

			}
			if (selected == 'view-events')
			{
				$('#view-events').show();
				$('#view-pools').hide();
				$('#view-rooms').hide();
				$('#view-staffs').hide();
				$('#view-albums').hide();
				$('#view-reservation').hide();

			}
			if (selected == 'view-albums')
			{
				$('#view-albums').show();
				$('#view-pools').hide();
				$('#view-rooms').hide();
				$('#view-staffs').hide();
				$('#view-events').hide();
				$('#view-reservation').hide();

			}
			if (selected == 'view-reservation')
			{
				$('#view-reservation').show();
				$('#view-pools').hide();
				$('#view-rooms').hide();
				$('#view-staffs').hide();
				$('#view-events').hide();
				$('#view-albums').hide();

			}
			
		}	

	</script>