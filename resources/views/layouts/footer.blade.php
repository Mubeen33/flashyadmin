
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <!-- <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank"></a>All rights Reserved</span><span class="float-md-right d-none d-md-block"><i class="feather icon-heart pink"></i></span>
            <button class="btn btn-warning btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer> -->
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/ui/prism.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/sweet-alerts.js') }}"></script>
    
    <!-- BEGIN: Theme JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
    <script>
    jQuery(function($) {
      $(".xzoom").xzoom({
          position: 'right',
          Xoffset: 50
      });
      });
      </script>
    <!-- END: Theme JS-->



    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
   <script type="text/javascript">
       setTimeout(function() {
            $('#msg').fadeOut('fast');
        }, 2000);
   </script>

   @stack('scripts')
   
</body>
<!-- END: Body-->

</html>