@extends ('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
	
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<h1>Register</h1>
			</div>
			<div class="col-md-6">



				<form method="POST" action="/admin/register">
					{{ csrf_field() }}
					<div class="form-group">
						<label>First Name:</label>
						<input type="text" name="fname" class='form-control' required>
					</div>
					<div class="form-group">
						<label>Middle Name:</label>
						<input type="text" name="mname" class='form-control' required>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input type="text" name="lname" class='form-control' required>
					</div>
					<div class="form-group">
						<label>Address:</label>
						<input type="text" name="address" class='form-control' required>
					</div>
					<div class="form-group">
						<label>Username:</label>
						<input type="text" name="uname" class='form-control' required>
					</div>
					<div class="form-group">
						<label>Position:</label>
						<input type="text" name="position" value="Admin" class='form-control' disabled>
					</div>
				</div>

				<hr>
				<div class="col-md-6">
					<div class="form-group">
						<label>Contact Number:</label>
						<input type="text" name="contactNo" class='form-control' required>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="email" name="email" class='form-control' required>
					</div>
					<hr>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" class='form-control' required>
					</div>
					<div class="form-group">
						<label for="password_confirmation">Conformation Password:</label>
						<input type="password" name="password_confirmation" class='form-control' required>
					</div>
				</div>
				<div class="col-md-12">
					<center>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" >Register</button>
					</div>
					</center>





				</form>

			</div>
		</div>
	</div>




	@endsection