<?php $__env->startSection('pagecss'); ?>
        <!-- CSS Page Style -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/profile.css')); ?>">
<?php echo $__env->yieldContent('pagestyles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('maincontent'); ?>
        <!--=== Profile ===-->
<div class="content profile">
    <!--Left Sidebar-->
    <div class="col-md-4 md-margin-bottom-40">
        <img class="img-responsive profile-img margin-bottom-20" src="<?php echo e(asset('public/assets/img/team/img32-md.jpg')); ?>" alt="">

        <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
            <li class="list-group-item <?php echo e(($page_name == 'profile')? 'active' : ''); ?>">
                <a href="<?php echo e(url('student/my-profile')); ?>"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li class="list-group-item <?php echo e(($page_name == 'friends')? 'active' : ''); ?>">
                <a href="<?php echo e(url('student/my-friends')); ?>"><i class="fa fa-group"></i> Friends</a>
            </li>
            <li class="list-group-item <?php echo e(($page_name == 'messages')? 'active' : ''); ?>">
                <a href="<?php echo e(url('student/my-conversations')); ?>"><i class="fa fa-comments"></i> Messages</a>
            </li>
            <li class="list-group-item <?php echo e(($page_name == 'settings')? 'active' : ''); ?>">
                <a href="<?php echo e(url('student/my-settings')); ?>"><i class="fa fa-cog"></i> Settings</a>
            </li>
        </ul>

        <!--Notification-->
        <div class="col-sm-12 sm-margin-bottom-30">
            <div class="panel panel-profile">
                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Notification</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>
                <ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
                        <div class="overflow-h">
                            <span><strong>Albert Heller</strong> has sent you email.</span>
                            <small>Two minutes ago</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Taylor Lee</strong> started following you.</span>
                            <small>Today 18:25 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
                        <div class="overflow-h">
                            <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Mikel Andrews</strong> commented on your Timeline.</span>
                            <small>23/12 11:01 am</small>
                        </div>
                    </li>
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
                        <div class="overflow-h">
                            <span><strong>Bruno Js.</strong> added you to group chating.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
                        <div class="overflow-h">
                            <span><strong>Taylor Lee</strong> changed profile picture.</span>
                            <small>23/12 15:15 pm</small>
                        </div>
                    </li>
                </ul>
                <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>

            </div>
        </div>
        <!--End Notification-->

        <hr>

        <div class="margin-bottom-50"></div>

        <!--Datepicker-->
        <form action="#" id="sky-form2" class="sky-form">
            <div id="inline-start"></div>
        </form>
        <!--End Datepicker-->
    </div>
    <!--End Left Sidebar-->

    <!-- Profile Content -->
    <div class="col-md-8">
        <?php echo $__env->yieldContent('pagecontent'); ?>
    </div>
    <!-- End Profile Content -->
<!--=== End Profile ===-->

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/datepicker.js')); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Datepicker.initDatepicker();
        });
    </script>
    <?php echo $__env->yieldContent('pagescripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>