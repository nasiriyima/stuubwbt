@extends('web_layout')

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/parallax-slider/css/parallax-slider.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css')}}">
@stop

@section('maincontent')
<!--=== Slider ===-->
    <div class="slider-inner">
            <div id="da-slider" class="da-slider">
                    <div class="da-slide">
                            <h2><i>CLEAN &amp; FRESH</i> <br /> <i>FULLY RESPONSIVE</i> <br /> <i>DESIGN</i></h2>
                            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i> <br /> <i>veniam omnis </i></p>
                            <div class="da-img"><img class="img-responsive" src="{{ asset('public/assets/plugins/parallax-slider/img/1.png')}}" alt=""></div>
                    </div>
                    <div class="da-slide">
                            <h2><i>RESPONSIVE VIDEO</i> <br /> <i>SUPPORT AND</i> <br /> <i>MANY MORE</i></h2>
                            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i></p>
                            <div class="da-img">
                                    <iframe src="http://player.vimeo.com/video/47911018" width="530" height="300" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            </div>
                    </div>
                    <div class="da-slide">
                            <h2><i>USING BEST WEB</i> <br /> <i>SOLUTIONS WITH</i> <br /> <i>HTML5/CSS3</i></h2>
                            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i> <br /> <i>veniam omnis </i></p>
                            <div class="da-img"><img src="{{ asset('public/assets/plugins/parallax-slider/img/html5andcss3.png')}}" alt="image01" /></div>
                    </div>
                    <div class="da-arrows">
                            <span class="da-arrows-prev"></span>
                            <span class="da-arrows-next"></span>
                    </div>
            </div>
    </div><!--/slider-->
		<!--=== End Slider ===-->
                
                

		<!--=== Purchase Block ===-->
		<div class="purchase">
			<div class="container overflow-h">
				<div class="row">
                                        <div class="col-md-5">
                                            <span>STUUB Web Based Test</span>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa</p>
					</div>
                                        <div class="col-md-4 animated fadeInLeft">
                                                <p><img src="{{ asset('public/assets/img/clients4/1.png')}}" alt="" width="100">
                                                    <img src="{{ asset('public/assets/img/clients4/2.png')}}" alt="" width="100">
                                                    <img src="{{ asset('public/assets/img/clients4/3.png')}}" alt="" width="100">
                                                </p>
					</div>
					<div class="col-md-3 btn-buy animated fadeInRight">
						<a href="javascript:void(0)" onclick="openTestWindow();" class="btn-u btn-block btn-u-lg"><i class="fa fa-cloud-download"></i> Try Now</a>
					</div>
				</div>
			</div>
		</div><!--/row-->
		<!-- End Purchase Block -->

		<!--=== Content Part ===-->
		<div class="container content-sm">
			<!-- Service Blocks -->
			<div class="row margin-bottom-30">
				<div class="col-md-4">
					<div class="service">
						<i class="fa fa-compress service-icon"></i>
						<div class="desc">
							<h4>Admissions Processing</h4>
							<p>
                                We apply for prospective students who show interest in studying abroad. Students can send in their SSCE results and data age of travel passport. In the absence of SSCE, prospective students can send in their SS 1-3 academic transcript as a substitute.
                            </p>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="service">
						<i class="fa fa-cogs service-icon"></i>
						<div class="desc">
							<h4>Post-Admissions Services</h4>
							<p>
                                At Stuub, we render lots of services to our students when they arrive cities where the schools reside. One of the services rendered is accommodation. Finding a good accommodation that suits one’s lifestyle and have a close proximity to campus is a daunting task. On this note, we have taken it upon our heads to make sure that all students we processed admissions for get good, affordable and proximal apartments/hostels to reside in. We offer a host of other services which includes health insurance processing, utility bill payment and so on.
                            </p>
                            <p>
                                Getting an admission is one step forward in attending the University of your Dream. The next step is getting visa into the country which can be very tedious; that’s when you do it all on your own.
                            </p>
						</div>
					</div>
				</div>
			</div>
                        
			<!-- Owl Clients v1 -->
                        <div class="main-counters margin-bottom-40">
                            <div class="row margin-bottom-40">
                                    <div class="counters col-md-3 col-sm-3">
                                            <span class="counter">{{$reg_student}}</span>
                                            <h4>Candidates</h4>
                                    </div>
                                    <div class="counters col-md-3 col-sm-3">
                                            <span class="counter">0</span>
                                            <h4>Examination</h4>
                                    </div>
                                    <div class="counters col-md-3 col-sm-3">
                                            <span class="counter">0</span>
                                            <h4>Questions</h4>
                                    </div>
                                    <div class="counters col-md-3 col-sm-3">
                                            <span class="counter">0</span>
                                            <h4>Questions Solved</h4>
                                    </div>
                            </div>
                        </div>
		</div><!--/container-->
		<!-- End Content Part -->
@stop
@section('pagejs')
<script type="text/javascript" src="{{ asset('public/assets/plugins/counter/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/counter/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/owl-carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/style-switcher.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/parallax-slider.js')}}"></script>

<script type="text/javascript" src="{{ asset('public/assets/plugins/parallax-slider/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/parallax-slider/js/jquery.cslider.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript">
        jQuery(document).ready(function() {
                App.init();
                OwlCarousel.initOwlCarousel();
                App.initCounter();
                StyleSwitcher.initStyleSwitcher();
                ParallaxSlider.initParallaxSlider();
        });
</script>
<script type="text/javascript">
    var examwindow = window;
    function openTestWindow(){
        var w = screen.width;
        var h = screen.height;
//        var s = w+"px "+h+"px";
//        $("body").css("background-size",s);
        examwindow.open("{!! url('web/try-now') !!}",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+w+',height='+h);
    }
</script>
@stop