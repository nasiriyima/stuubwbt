<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{ asset('public/assets/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/jquery.countdown.js')}}"></script>
<script src="{{ asset('public/assets/js/loading.js') }}"></script>

<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/jquery-appear.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/smoothScroll.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/counter/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/counter/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
@yield('pageplugins')
<!-- JS Page Level -->
<script type="text/javascript" src="{{ asset('public/assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/fancy-box.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/progress-bar.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/owl-carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/style-switcher.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initCounter();
        App.initParallaxBg();
        App.initScrollBar();
        FancyBox.initFancybox();
        App.initSidebarMenuDropdown();
        OwlCarousel.initOwlCarousel();
        StyleSwitcher.initStyleSwitcher();
        ProgressBar.initProgressBarHorizontal();
    });
</script>
<!--[if lt IE 9]>
<script src="{{ asset('public/assets/plugins/respond.js')}}"></script>
<script src="{{ asset('public/assets/plugins/html5shiv.js')}}"></script>
<script src="{{ asset('public/assets/plugins/placeholder-IE-fixes.js')}}"></script>
<![endif]-->
