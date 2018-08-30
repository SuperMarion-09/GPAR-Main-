@extends('customer.layouts.master')


@section('content')

<!--HEADER SECTION RESERVATION--> 
<section class="page-title" style="background-image:url(css/images/background/gallery-head.jpg);">
	<div class="auto-container">
		<!--Title Box-->
		<div class="title-box">
			<h2>CONTACT US</h2>
		</div>
	</div>
</section>
<!-- HEADER SECTION RESERVATION E-->
< <section class="contact-section">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Form Column-->
			<div class="column form-column col-md-7 col-sm-12 col-xs-12">
				<div class="default-title"><h3>Send Us Your Feedbacks</h3><div class="separator"></div></div>

				<div class="contact-form default-form">
					<form method="post" action="#" id="contact-form">
						<div class="row clearfix">

							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<div class="group-inner">
									<input type="text" name="username" value="" placeholder="Full name">
								</div>
							</div>

							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<div class="group-inner">
									<input type="email" name="email" value="" placeholder="Email">
								</div>
							</div>

							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<div class="group-inner">
									<textarea name="message" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<button type="submit" class="theme-btn btn-style-two">SUBMIT </button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!--Info Column-->
			<div class="column info-column col-md-5 col-sm-12 col-xs-12">
				<!--Default Title-->
				<div class="default-title"><h3>Our Address</h3><div class="separator"></div></div>
				<!--Contact Info-->
				<div class="contact-info">
					<div class="text">Come and reach us!</div>
					<ul>
						<li><span class="icon flaticon-placeholder"></span>Address<span><br>Fausto St. Km 37 Pulong Buhangin Santa Maria, Bulacan 3022</span></li>
						<li><span class="icon flaticon-envelope"></span>Email<span><br>grandpavilion@gmail.com</span></li>
						<li><span class="icon flaticon-phone-call"></span>Phone<span><br>0922 827 5767</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection