<?php $__env->startSection('pagecss'); ?>
        <!-- CSS Page Style -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/profile.css')); ?>">
<style>
    .hover-hand-cursor{ cursor: pointer; }
</style>
<?php echo $__env->yieldContent('pagestyles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('maincontent'); ?>
        <div id="alert-message" style="display: none;">

        </div>
        <!--=== Profile ===-->
<div class="content profile">
    <!--Left Sidebar-->
    <div class="col-md-4 profile-body md-margin-bottom-40">
        <img class="img-responsive profile-img margin-bottom-20" width="453" height="453" src="<?php echo e((isset($user->profile->image) && $user->profile->image !="" && $user->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$user->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($user->first_name); ?>">

        <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
            <li class="list-group-item <?php echo e(($page_name == 'profile')? 'active' : ''); ?>">
                <a href="<?php echo e(url('student/my-profile')); ?>"><i class="fa fa-user"></i> Profile</a>
            </li>
            <li class="list-group-item <?php echo e(($page_name == 'friends')? 'active' : ''); ?>">
                <a href="<?php echo e(url('student/my-friends')); ?>"><i class="fa fa-group"></i> Friends</a>
            </li>
            <li class="list-group-item <?php echo e(($page_name == 'messages')? 'active' : ''); ?>">
                <a href="<?php echo e(url('student/my-conversations')); ?>"><i class="fa fa-comments"></i> Conversations</a>
            </li>
            <li class="list-group-item <?php echo e(($page_name == 'settings')? 'active' : ''); ?>">
                <a href="<?php echo e(url('student/my-settings')); ?>"><i class="fa fa-cog"></i> Settings</a>
            </li>
        </ul>

        <!--Datepicker-->
        <form action="#" id="sky-form2" class="sky-form">
            <div id="inline-start"></div>
        </form>
        <!--End Datepicker-->

        <hr>

        <div class="margin-bottom-50"></div>

        <?php if(!isset($user->preference) || $user->preference->options['show_notification'] == true): ?>
        <!--Notification-->
        <div class="col-sm-12 sm-margin-bottom-30">
            <div class="panel panel-profile">
                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Notification</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                </div>
                <?php if(count($notifications) > 0): ?>
                    <ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
                        <?php if(isset($notifications['otherNotifications'])): ?>
                            <li class="notification">
                                <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line fa fa-bolt"></i>
                                <div class="overflow-h">
                                    <span><strong>Profile Stats.</strong> <?php echo e($notifications['otherNotifications']->profileStats); ?></span>
                                    <small><?php echo e($notifications['otherNotifications']->time); ?></small>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($notifications['friendshipRequest'])): ?>
                            <li class="notification">
                                <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
                                <div class="overflow-h">
                                    <span><strong><a href="<?php echo e(url('student/friend-profile')); ?>/<?php echo e(\Crypt::encrypt($notifications['friendshipRequest']->user->id)); ?>"><?php echo e($notifications['friendshipRequest']->user->first_name); ?></a></strong> has sent you a friendship request.</span>
                                    <small><?php echo e($notifications['friendshipRequest']->created_at->diffForHumans()); ?></small>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($notifications['messages'])): ?>
                            <li class="notification">
                                <img class="rounded-x" src="<?php echo e((isset($notifications['messages']->sender->profile->image) &&
                            $notifications['messages']->sender->profile->image !="" && $notifications['messages']->sender->profile->image !=NULL)?
                             url('student/file').'/profile_pictures/'.$notifications['messages']->sender->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($notifications['messages']->sender->first_name); ?>">
                                <div class="overflow-h">
                                    <span><strong><?php echo e($notifications['messages']->sender->first_name); ?></strong> has sent you a message.</span>
                                    <small><?php echo e($notifications['messages']->created_at->diffForHumans()); ?></small>
                                </div>
                            </li>
                        <?php endif; ?>

                    </ul>
                    <div class="ladda-btn">
                        <center>
                            <?php /*<button type="button" class="btn-u btn-u-default btn-u-sm btn-block text-center ladda-button" data-style="contract" id="load_more">Load More</button>*/ ?>
                        </center>
                    </div>
                <?php else: ?>
                    You have no notifications yet
                <?php endif; ?>

            </div>
        </div>
        <!--End Notification-->
        <?php endif; ?>

    </div>
    <!--End Left Sidebar-->

    <!-- Profile Content -->
    <div class="col-md-8">
        <?php echo $__env->yieldContent('pagecontent'); ?>
        <div class="profile-body margin-bottom-20">
            <div class="panel">
                <div class="panel-heading headline headline-sm"><h2 class="heading-sm"><i class="fa fa-pie-chart"></i>Stats</h2></div>
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
    </div>
    <!-- End Profile Content -->
</div>
<!-- Large modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myLargeModalLabel2" class="modal-title">EDIT <span id="edit-title"></span> </h4>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<!-- Large modal -->
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
        });
    </script>
    <?php echo $__env->yieldContent('pagescripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>