<?php $__env->startSection('pagecss'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/page_search_inner.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
        <!--=== Breadcrumbs ===-->
        <div class="breadcrumbs">
                <div class="container">
                        <h1 class="pull-left">News</h1>
                        <ul class="pull-right breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">News</li>
                        </ul>
                </div>
        </div>
        <div class="container">
                <div class="news-v3 bg-color-white margin-bottom-30">
                        <div class="news-v3-in">
                                <ul class="list-inline posted-info">
                                        <li>By <?php echo e($newsitem->user->first_name); ?> <?php echo e($newsitem->user->last_name); ?></li>
                                        <li>Posted <?php echo e($newsitem->created_at->format('F d, Y' )); ?></li>
                                </ul>
                                <h2><?php echo e($newsitem->title); ?></h2>
                                <?php echo $newsitem->post; ?>

                        </div>
                </div>
        </div>
        <br/>
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