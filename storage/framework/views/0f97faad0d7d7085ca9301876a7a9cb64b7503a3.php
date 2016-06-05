
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title>Stuub - WBT | <?php echo e(isset($page_name) ? $page_name : ''); ?></title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <!-- Web Fonts -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">
        <?php echo $__env->make('student.include.header_css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
    <body>
        <div class="wrapper">
            <?php echo $__env->make('student.include.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--=== Content Side Left Right ===-->
            <div class="content-side-right">
                <div class="container content">
                    <?php echo $__env->yieldContent('maincontent'); ?>
                </div>
                <?php echo $__env->make('student.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <!--=== End Content Side Left Right ===-->
        </div><!--/wrapper-->
        <script type="text/javascript"> var timeleft="00:00:00"; </script>
        <?php echo $__env->make('student.include.scripts_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('pagejs'); ?>

    </body>
</html>