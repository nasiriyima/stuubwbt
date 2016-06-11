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
        <img class="img-responsive profile-img margin-bottom-20" width="453" height="453" src="<?php echo e(isset($user->profile->image)? url('student/file').'/'.$user->profile->image : asset('public/assets/img/team/img32-md.jpg')); ?>" alt="<?php echo e($user->first_name); ?>">

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
        <div class="profile-body margin-bottom-20">
            <div class="headline headline-sm"><h2>Stats</h2></div>
            <!-- Pie Charts v1 -->
            <div class="row pie-progress-charts margin-bottom-60">
                <div class="inner-pchart col-md-4">
                    <div class="circle" id="circle-1"></div>
                    <h3 class="circle-title">Profile</h3>
                    <p>Profile must be at least 50% completed to send friendship requests</p>
                </div>
                <div class="counters col-md-3 col-sm-3">
                    <span class="counter-icon"><i class="fa fa-users rounded"></i></span>
                    <span class="counter"><?php echo e($friendsStats); ?></span>
                </div>
                <div class="counters col-md-3 col-sm-3">
                    <span class="counter-icon"><i class="fa fa-envelope rounded"></i></span>
                    <span class="counter"><?php echo e($messageStats); ?></span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Profile Content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
    <script type="text/javascript">
        var profileStats = "<?php echo $profileStats; ?>";
    </script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/datepicker.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/circles-master/circles.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/circles-master.js')); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Datepicker.initDatepicker();
            CirclesMaster.initCirclesMaster1();
            CirclesMaster.initCirclesMaster2();
        });
    </script>
    <?php echo $__env->yieldContent('pagescripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>