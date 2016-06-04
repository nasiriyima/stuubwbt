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
                </div><!--/container-->
        </div>
        <br/><!--/breadcrumbs-->
        <div class="container s-results margin-bottom-50">
                <div class="tab-content">
                        <?php foreach($news as $key => $group): ?>
                        <div class="tab-pane fade in <?php echo e(($key+1 == 1)? 'active': ''); ?>" id="page-<?php echo e($key+1); ?>">
                                <?php foreach($group as $newsitem): ?>
                                <div class="inner-results">
                                        <h3><a href="#"><?php echo e($newsitem->title); ?></a></h3>
                                        <p><?php echo e($newsitem->caption); ?></p>
                                        <ul class="list-inline down-ul">
                                                <li><?php echo e($newsitem->created_at->diffForHumans()); ?> - By <?php echo e($newsitem->user->first_name); ?> <?php echo e($newsitem->user->last_name); ?></li>
                                        </ul>
                                        <br/>
                                        <a href="<?php echo e(url('web/news')); ?>/<?php echo e(\Crypt::encrypt($newsitem->id)); ?>" class="btn-u btn-u-dark-blue">Read More</a>
                                </div>
                                <hr>
                                <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>
                </div>
                <div class="margin-bottom-30"></div>

                <div class="text-center">
                        <ul class="pagination">
                                <li><a href="#page-1" data-toggle="tab">&laquo;</a></li>
                                <?php for($x=1;$x<=count($news);$x++): ?>
                                        <li class="($x==1)?'active': '';"><a href="#page-<?php echo e($x); ?>" data-toggle="tab"><?php echo e($x); ?></a></li>
                                <?php endfor; ?>
                                <li><a href="#page-<?php echo e(count($news)); ?>" data-toggle="tab">&raquo;</a></li>
                        </ul>
                </div>
        </div><!--/container-->
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