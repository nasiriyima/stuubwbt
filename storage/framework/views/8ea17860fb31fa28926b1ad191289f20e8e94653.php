<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
        <title>Login 1 | Unify - Responsive Website Template</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- Web Fonts -->
        <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

        <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/style.css')); ?>">

        <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/line-icons/line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/font-awesome/css/font-awesome.min.css')); ?>">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/page_log_reg_v2.css')); ?>">

        <!-- CSS Theme -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/theme-colors/default.css')); ?>" id="style_color">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/theme-skins/dark.css')); ?>">

        <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/custom.css')); ?>">
</head>

<body>
<!--=== Content Part ===-->
<div class="container">
        <!--Reg Block-->
        <div class="reg-block">
                <div class="reg-block-header">
                    <center>
                        <a href="<?php echo e(url('/')); ?>">
                            <img src="http://localhost/stuubwbt/public/assets/img/logo1-default.png" width="160px" class="rounded-4x">
                        </a>
                    </center>
                    <br>
                    <h2>Sign In</h2>
                        <p>Don't Have Account? Click <a class="color-green" href="<?php echo e(url('web/sign-up')); ?>">Sign Up</a> to registration.</p>
                </div>

                <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control" placeholder="Password">
                </div>
                <hr>

                <div class="checkbox">
                        <label>
                                <input type="checkbox">
                                <p>Always stay signed in</p>
                        </label>
                </div>

                <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn-u btn-block">Log In</button>
                        </div>
                </div>
        </div>
        <!--End Reg Block-->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/jquery/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/jquery/jquery-migrate.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/back-to-top.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/backstretch/jquery.backstretch.min.js')); ?>"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/app.js')); ?>"></script>
<script type="text/javascript">
        jQuery(document).ready(function() {
                App.init();
        });
</script>
<script type="text/javascript">
        $.backstretch([
                "assets/img/bg/18.jpg",
        ], {
                fade: 1000,
                duration: 7000
        });
</script>
<!--[if lt IE 9]>
<script src="assets/plugins/respond.js"></script>
<script src="assets/plugins/html5shiv.js"></script>
<script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
