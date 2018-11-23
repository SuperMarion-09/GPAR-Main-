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
    <link rel="stylesheet" type="text/css" href="/js/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
    <!--<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> -->
    <!--<link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="css/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <style type="text/css">
    .panel-foods .panel-heading{
        background-color: #baffc9;
        color:#fff;
        font-family: sans-seriff !important;
        
    }
    .panel-services .panel-heading {
        background-color: #c7b086;
        color:#fff;
        font-family: sans-seriff !important;
        
    }
    .panel-heading > h4 {
        font-size: 34px;

    }
    .panel .panel-body .card .card-body h4 {
        font-family: 'playball',cursive !important;
        font-size: 30PX;
        color: #A0522D;

    }
    .panel .panel-body .card .card-img-top   {
        height: 200px ;
    }
</style>


</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        @include('Customer.layouts.header')

        @yield('content') 


        <br>
        <br>

        @include('Customer.layouts.footer')

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
    <script src="/js/js/script.js"></script>
    <script  src="/js/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
    <script  src="/js/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
    <script  src="/js/plugins/material-datetimepicker/datetimepicker.js"></script>


</body>

<!-- Mirrored from world5.commonsupport.com/2017/satek/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Jul 2018 21:48:40 GMT -->
</html>