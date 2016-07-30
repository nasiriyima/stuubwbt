<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>STUUB WBT |</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
        <?php echo $__env->make('includes.admin.header_css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
    <div class="wrapper">
        <?php echo $__env->make('includes.admin.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="content-side-right" style="margin-top: 10px">
                <div class="col-md-12">
                    <div class="headline"><h2><?php echo $__env->yieldContent('pagetitle'); ?></h2></div>
                <?php echo $__env->yieldContent('maincontent'); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('includes.admin.scripts_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>