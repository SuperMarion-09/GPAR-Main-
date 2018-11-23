<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>GrandPavilion</title>
<!-- Stylesheets -->
<link href="/css/css/bootstrap.css" rel="stylesheet">
<link href="/css/css/revolution-slider.css" rel="stylesheet">
<link rel="stylesheet" href="/css/code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="/css/css/style.css" rel="stylesheet">
<link href="/css/css/style2.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/css/material_style.css">
<!--<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> -->
<!--<link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->
<!-- Responsive -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
    
    <!-- Preloader -->
    <div class="preloader"></div>
    
    <!-- Main Header-->
    <header class="main-header">
        @include('sweet::alert')
        <!-- Main Box -->
        <div class="main-box">
            <div class="auto-container">
                <div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <H2>Grand<span style="color:#3aff65;">Pavilion</H2>
                    </div>
                    
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->      
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix">
                                 <ul class="navigation clearfix">
                                    <li class=""><a href="/">Home</a></li>
                                    <li class="dropdown"><a href="#">Amenities</a>
                                        <ul>
                                            <li><a href="/amenities-event">Events</a></li>
                                            <li><a href="/amenities-room">Rooms</a></li>
                                            <li><a href="/amenities-pool">Pools</a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href="/reservation">Reservation
                                    </a>
                                    </li>
                                    <li><a href="/gallery">Gallery</a></li>
                                    <li><a href="/contact_us">Contact us</a></li>
                                    <li><a href="/about-us">About us</a></li>
                                 </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                        
                    </div><!--Nav Outer End-->
                    
                    <!-- Hidden Nav Toggler -->
                    <div class="nav-toggler">
                        <button class="hidden-bar-opener"><span class="icon fa fa-bars"></span></button>
                    </div><!-- / Hidden Nav Toggler -->
                    
                </div>    
            </div>
        </div>
    
    </header>
    <!--End Main Header -->
    
    <!-- Hidden Navigation Bar -->
    <section class="hidden-bar right-align">
        
        <div class="hidden-bar-closer">
            <button class="btn"><i class="fa fa-close"></i></button>
        </div>
        
        <!-- Hidden Bar Wrapper -->
        <div class="hidden-bar-wrapper">
        
            <!-- .logo -->
            <div class="logo text-center">
               <H2>Grand<span style="color:#3aff65;">Pavilion</H2>      
            </div><!-- /.logo -->
            
            <!-- .Side-menu -->
            <div class="side-menu">
                <!-- .navigation -->
                <ul class="navigation clearfix">
                                    <li class=""><a href="index.html">Home</a></li>
                                    <li class="dropdown"><a href="#">Amenities</a>
                                        <ul>
                                            <li><a href="a-events.html">Events</a></li>
                                            <li><a href="a-rooms.html">Rooms</a></li>
                                            <li><a href="a-pools.html">Pools</a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href="reservation.html">Reservation
                                    </a>
                                    </li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="contactus.html">Contact us</a></li>
                                    <li><a href="aboutus.html">About us</a></li>
                                 </ul>
            </div>
            <!-- /.Side-menu -->
        
            <!--<div class="social-icons">
               <ul>
                    <li>Address:Fausto St. Km 37 Pulong Buhangin Santa Maria, Bulacan 3022 Map</li>
                    <li>Contact us: 0922 827 5767</li>
                </ul>
            </div> -->
            <div class="social-icons">
                 <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                </ul>
                
            </div>
        
        </div><!-- / Hidden Bar Wrapper -->
    </section>
    <!-- / Hidden Bar -->  
  <!--HEADER SECTION RESERVATION--> 
   <section class="page-title" style="background-image:url(/css/images/background/gallery-head.jpg);">
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
                @if(count($errors))
                <div class="col col-md-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                
                <!--Form Column-->
                <div class="column form-column col-md-7 col-sm-12 col-xs-12">
                    <div class="default-title"><h3>Send Us Your Feedbacks</h3><div class="separator"></div></div>
                    
                    <div class="contact-form default-form">
                        <form method="post" action="/contact-us/add_comment" id="contact-form">
                            {{csrf_field()}}
                            <div class="row clearfix">

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="group-inner">
                                        <input type="text" name="uname" value="" placeholder="Full name">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="group-inner">
                                        <input type="email" name="email" value="" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="group-inner">
                                        <textarea name="message" placeholder="Message" name="message"></textarea>
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
    <!--Main Footer-->
    <footer class="main-footer">
        <div class="auto-container">
        
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    <!--Big Column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                            
                            <!--Footer Column-->
                            <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                                <div class="footer-widget about-widget">
                                    <h1 class="main-footer-header">GPAR</h1>
                                    <div class="widget-content">
                                        <div class="text">The Grand Pavilion and Resort is also a great venue. it can handle all types and sizes of receptions-be it a wedding, birthday, baptismal, meeting and more. With its coffee shop, restaurant, videoke bar, and fully equipped functions room</div>
                                        <div class="social-links">
                                            <a href="#"><span class="fa fa-facebook-f"></span></a>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            
                            
                        </div>
                    </div>
                    
                    <!--Big Column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                            
                            <!--Footer Column-->
                            <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                <div class="footer-widget address-widget">
                                    <h2>Our Address</h2>
                                    <div class="widget-content">
                                        <ul>
                                            <li>Fausto St. Km 37 Pulong Buhangin Santa Maria, Bulacan 3022</li>
                                            <li> 0922 827 5767</li>
                                            <li>grandpavilionhotel@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                    
                 </div>
             </div>
        
        </div>
        
        <!--Footer Bottom-->
         <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright-text">Copyright The Grand pavilion Hotel and Resort &copy; 2018 - <a href="">Inspect Element   
                </a></div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>

<script src="/js/js/jquery.js"></script> 
<script src="/js/code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="/js/js/bootstrap.min.js"></script>
<script src="/js/js/revolution.min.js"></script>
<script src="/js/js/jquery.fancybox.pack.js"></script>
<script src="/js/js/jquery.fancybox-media.js"></script>
<script src="/js/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/js/owl.js"></script>
<script src="/js/js/wow.js"></script>
<script src="/js/js/validate.js"></script>
<script src="/js/js/script.js"></script>
</body>
</html>