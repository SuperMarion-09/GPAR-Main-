<!--Main Footer-->
@foreach($settings as $setting)
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
                           <div class="text">The Grand Pavilion Hotel and Resort is also a great venue. it can handle all types and sizes of receptions-be it a wedding, birthday, baptismal, meeting and more. With its coffee shop, restaurant, videoke bar, and fully equipped functions room</div>
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
                       <li>{{$setting->contact_no}}</li>
                       <li>{{$setting->email}}</li>
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
@endforeach
<!--End Main Footer-->