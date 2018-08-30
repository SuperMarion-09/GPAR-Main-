@extends('customer.layouts.master')


@section('content')

<!--HEADER SECTION About-us--> 
<section class="page-title" style="background-image:url(css/images/background/gallery-head.jpg);">
	<div class="auto-container">
		<!--Title Box-->
		<div class="title-box">
			<h2>OUR POOLS</h2>
		</div>
	</div>
</section>

<br>
<br>
<!--Two Col Fluid-->
<section class="two-col-fluid">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 left-column">
				<div class="inner-box">
					<h2>Our Pools</h2> 
					<div class="text">
						<p>There’s lot of pools you can find in the Philippines and one of them is the pool that The Grand Pavilion and Resort offers. The Grand Pavilion and Resort offers a private pool that you can relax and enjoy with. Together with your family and friends, you can savor the moment of happiness in the pool at a low cost. In just a click of your mouse you can own the pool in one day. Bring your friends and family and enjoy the moment with them in our pool.</p>
						<span class="pool-rates" ><h3>150 per head</h3><em><i>minimum of 25 persons</i></em></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="image-column" style="background-image:url(css/images/pools/pool-3.jpg);">
		<div class="hidden-image"><img src="css/images/pools/pool-3.jpg" alt=""></div>
	</div>
</section>
<!--End Two Col Fluid-->

<!--Two Col Fluid-->
<section class="two-col-fluid right-image">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 left-column">
				<div class="inner-box">
					<h2>Pool Rules</h2>
					<div class="text">
						<div class="col-md-6 col-lg-6 col-sm-12">
							<ol class="list-groups list">
								<li>Don't run</li>
								<li>No driving</li>
								<li>No fishing</li>
								<li>No bombing</li>
								<li>Don't shout</li>
							</ol>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12">
							<ol class="list-groups list" start="6">
								<li>Shower before entering pool</li>
								<li>Use restrooms</li>
								<li>Watch your children</li>
								<li>No food or drinks</li>
								<li>No rough play</li>
							</ol>
						</div>
						<br>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="image-column" style="background-image:url(css/images/pools/pool-4.jpg);">
		<div class="hidden-image"><img src="css/images/pools/pool-4.jpg" alt=""></div>
	</div>
</section>
<!--End Two Col Fluid-->

@endsection