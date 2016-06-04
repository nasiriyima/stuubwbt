<!-- CSS Global Compulsory -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/style.css')); ?>">

<!-- CSS Header and Footer -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/headers/header-v7.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/footers/footer-v1.css')); ?>">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/animate.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/line-icons/line-icons.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/font-awesome/css/font-awesome.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/fancybox/source/jquery.fancybox.css')); ?>">

<?php echo $__env->yieldContent('pagecss'); ?>

<!-- CSS Theme -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/theme-colors/default.css')); ?>" id="style_color">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/theme-skins/dark.css')); ?>">

<!-- CSS Customization -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/custom.css')); ?>">