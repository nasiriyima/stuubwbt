<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>STUUB - WBT</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
        
        <?php echo $__env->make('includes.header_css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
    <div class="wrapper">
        <?php echo $__env->make('includes.menu_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('maincontent'); ?>
            
            <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('frontweb.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->make('includes.scripts_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
