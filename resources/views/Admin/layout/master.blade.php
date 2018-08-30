<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<!-- Mirrored from radixtouch.in/templates/admin/hotel/source/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Jul 2018 21:39:50 GMT -->
<head>
         @include ('admin.layout.link')
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
                 @include ('admin.layout.header')
        
        <!-- end header -->
                <!-- start page container -->
                    <div class="page-container">
                        <!-- start sidebar menu -->
                                    @include ('admin.layout.sidemenu')
                        <!-- end sidebar menu -->  
			         <!-- start page content -->
                                @yield('content')
            <!-- end page content -->
            <!-- start chat sidebar -->
                @include ('admin.layout.sidebar')
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->

    </div>
     <!-- start footer -->
     @include ('admin.layout.footer')
     <!-- end footer -->
  </body>

<!-- Mirrored from radixtouch.in/templates/admin/hotel/source/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Jul 2018 21:39:51 GMT -->
</html>