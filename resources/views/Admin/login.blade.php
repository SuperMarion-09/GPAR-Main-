<!DOCTYPE html>
<html>

<!-- Mirrored from radixtouch.in/templates/admin/hotel/source/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Jul 2018 21:40:00 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Spice Hotel | Bootstrap 4 Admin Dashboard Template + UI Kit</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="/css/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="/css/assets/plugins/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="/css/assets/plugins/material/material.min.css">
    	<link rel="stylesheet" href="/css/assets/css/material_style.css">
    <!-- bootstrap -->
	<link href="/css/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="/css/assets/css/pages/extra_pages.css">
	<!-- favicon -->
    <link rel="shortcut icon" href="/css/assets/img/favicon.ico" /> 
</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form method="POST" action="/admin" class="login100-form validate-form">
					{{csrf_field()}}
					<span class="login100-form-logo">
						 <i class="large material-icons">person</i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="Submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- start js include path -->
    <script src="/css/assets/plugins/jquery/jquery.min.js" ></script>
    <!-- bootstrap -->
    <script src="/css/assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="/css/assets/js/pages/extra_pages/login.js" ></script>
    <!-- end js include path -->
</body>

<!-- Mirrored from radixtouch.in/templates/admin/hotel/source/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Jul 2018 21:40:00 GMT -->
</html>/css/