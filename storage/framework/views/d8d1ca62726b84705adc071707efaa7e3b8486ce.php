<?php $__env->startSection('maincontent'); ?>
<!--=== Slider ===-->
    <div class="slider-inner">
            <div id="da-slider" class="da-slider">
                    <div class="da-slide">
                            <h2><i>CLEAN &amp; FRESH</i> <br /> <i>FULLY RESPONSIVE</i> <br /> <i>DESIGN</i></h2>
                            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i> <br /> <i>veniam omnis </i></p>
                            <div class="da-img"><img class="img-responsive" src="<?php echo e(asset('public/assets/plugins/parallax-slider/img/1.png')); ?>" alt=""></div>
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
                            <div class="da-img"><img src="<?php echo e(asset('public/assets/plugins/parallax-slider/img/html5andcss3.png')); ?>" alt="image01" /></div>
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
                                                <p><img src="<?php echo e(asset('public/assets/img/clients4/1.png')); ?>" alt="" width="100">
                                                    <img src="<?php echo e(asset('public/assets/img/clients4/2.png')); ?>" alt="" width="100">
                                                    <img src="<?php echo e(asset('public/assets/img/clients4/3.png')); ?>" alt="" width="100">
                                                </p>
					</div>
					<div class="col-md-3 btn-buy animated fadeInRight">
						<a href="#" class="btn-u btn-block btn-u-lg"><i class="fa fa-cloud-download"></i> Try Now</a>
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
							<h4>Fully Responsive</h4>
							<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<i class="fa fa-cogs service-icon"></i>
						<div class="desc">
							<h4>HTML5 + CSS3</h4>
							<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<i class="fa fa-rocket service-icon"></i>
						<div class="desc">
							<h4>Launch Ready</h4>
							<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
						</div>
					</div>
				</div>
			</div>
                        
			<!-- Owl Clients v1 -->
                        <div class="main-counters margin-bottom-40">
			<div class="headline"><h2>Our Clients</h2></div>
                            <div class="row margin-bottom-40">
                                    <div class="counters col-md-3 col-sm-3">
                                            <span class="counter">52147</span>
                                            <h4>Registered Users</h4>
                                    </div>
                                    <div class="counters col-md-3 col-sm-3">
                                            <span class="counter">24583</span>
                                            <h4>Projects</h4>
                                    </div>
                                    <div class="counters col-md-3 col-sm-3">
                                            <span class="counter">7349</span>
                                            <h4>Working Hours</h4>
                                    </div>
                                    <div class="counters col-md-3 col-sm-3">
                                            <span class="counter">87904</span>
                                            <h4>Job Offers</h4>
                                    </div>
                            </div>
                        </div>
		</div><!--/container-->
		<!-- End Content Part -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/counter/waypoints.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/counter/jquery.counterup.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/app.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/owl-carousel.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/style-switcher.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/parallax-slider.js')); ?>"></script>
<script type="text/javascript">
        jQuery(document).ready(function() {
                App.init();
                OwlCarousel.initOwlCarousel();
                App.initCounter();
                StyleSwitcher.initStyleSwitcher();
                ParallaxSlider.initParallaxSlider();
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>