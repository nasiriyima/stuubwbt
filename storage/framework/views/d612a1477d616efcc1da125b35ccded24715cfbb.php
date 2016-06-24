<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en" oncontextmenu=""> <!--<![endif]-->
    <head>
        <title>STUUB-WBT | <?php echo e((isset($bodyname))? $bodyname : ''); ?> <?php echo e((isset($categoryname))? $categoryname : ''); ?> <?php echo e((isset($subjectname))? $subjectname : ''); ?> <?php echo e((isset($monthname))? $monthname : ''); ?> <?php echo e((isset($sessionname))? $sessionname : ''); ?></title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php echo $__env->make('includes.admin.header_css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('pagecss'); ?>
    </head>
    <body oncontextmenu="return false;">
        <div class="wrapper">
            <?php echo $__env->yieldContent('sidemenu'); ?>
                <div class="content-side-right" style="margin-top: 10px">
                    <?php if(isset($time_allowed)): ?>
                    <div class="col-md-8">
                        <strong>Time Allowed: <?php echo e($time_allowed); ?></strong>
                    </div>
                    <div class="col-md-4">
                        <strong>Time Remaining: <span id="remaining"></span></strong>
                    </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                        <div class="headline"><h2><?php echo $__env->yieldContent('pagetitle'); ?></h2></div>
                        <?php if(\Session::has('error')): ?>
                        <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4>Oh snap! You got an error!</h4>
                                <p><?php echo e(\Session::get('error')); ?></p>
                                <p>
                                    <?php if(\Session::has('actionAname') && \Session::has('actionBname')): ?>
                                        <a class="btn-u btn-u-red" href="<?php echo e(\Session::get('actionA')); ?>"><?php echo e(\Session::get('actionAname')); ?></a>
                                        <a class="btn-u btn-u-sea" href="<?php echo e(\Session::get('actionB')); ?>"><?php echo e(\Session::get('actionBname')); ?></a>
                                    <?php else: ?>
                                        <a class="btn-u btn-u-red" href="#" data-dismiss="alert" aria-hidden="true">OK</a>
                                    <?php endif; ?>
                                </p>
                        </div>
                        <?php endif; ?>
                        <?php if(\Session::has('success')): ?>
                        <div class="alert alert-success fade in margin-bottom-40">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Well done!</h4>
                            <p><?php echo e(\Session::get('success')); ?></p>
                            <a class="btn-u btn-u-sea" href="#" data-dismiss="alert" aria-hidden="true">OK</a>
                        </div>
                        <?php endif; ?>
                    <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('student.include.scripts_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <script type="text/javascript">
                var examwindow = window;
            </script>
            <?php echo $__env->yieldContent('customjs'); ?>
            <script type="text/javascript">
                if(!examwindow.opener){
                    $(".wrapper").hide();
                    document.write("<center>======================================================================================================================================================================<br />");
                    document.write("EXAM WINDOW IS CLOSED!!! SORRY THIS PAGE CANNOT BE VIEWED HERE<br />");
                    document.write("======================================================================================================================================================================</center>");
                    setTimeout(function(){
                        window.location = "<?php echo url('student'); ?>";
                    },2000);
                }
                $(document).ready(function(){
                    $(document).keydown(function(e) { if (e.keyCode === 8) e.preventDefault(); });
                    document.onkeydown = function(e){
                    if (e.ctrlKey && 
                        (e.keyCode === 67 || 
                         e.keyCode === 86 || 
                         e.keyCode === 85 || 
                         e.keyCode === 117)) {
                      return false;
                    } else {
                        return true;
                    }
                    };

                });
        </script>
        
    </body>
</html>