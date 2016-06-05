<?php $__env->startSection('pagecss'); ?>
<!-- CSS Page Style -->
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/profile.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/shortcode_timeline2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('maincontent'); ?>
<!--=== Profile ===-->
<div class="container content profile">
        <div class="row">
                <!--Left Sidebar-->
                <div class="col-md-3 md-margin-bottom-40">
                        <img class="img-responsive profile-img margin-bottom-20" src="<?php echo e(asset('public/assets/img/team/img32-md.jpg')); ?>" alt="">

                        <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                                <li class="list-group-item active">
                                        <a href="page_profile_me.html"><i class="fa fa-user"></i> Profile</a>
                                </li>
                                <li class="list-group-item">
                                        <a href="page_profile_users.html"><i class="fa fa-group"></i> Friends</a>
                                </li>
                                <li class="list-group-item">
                                        <a href="page_profile_comments.html"><i class="fa fa-comments"></i> Messages</a>
                                </li>
                                <li class="list-group-item">
                                        <a href="page_profile_settings.html"><i class="fa fa-cog"></i> Settings</a>
                                </li>
                        </ul>

                        <!--Social Icons v3-->
                        <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                        <h2 class="panel-title heading-sm pull-left">Social Contacts</h2>
                                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                <div class="panel-body">
                                        <?php if(isset($user->profile->social_contact)): ?>
                                                <?php /**/
                                                        $social_contact = $user->profile->social_contact;
                                                        $contacts = json_decode($social_contact);
                                                 /**/ ?>
                                                <ul class="list-unstyled social-contacts-v2">
                                                <?php foreach($contacts as $contact): ?>
                                                        <li><i class="<?php echo e($contact->icon); ?>"></i> <a href="<?php echo e($contact->address); ?>"><?php echo e($contact->name); ?></a></li>
                                                <?php endforeach; ?>
                                                </ul>
                                        <?php else: ?>
                                                Social media contacts not yet available, please use the cog icon to add new social media contact information
                                        <?php endif; ?>
                                </div>
                        </div>
                        <!--End Social Icons v3-->

                        <hr>

                        <!--Notification-->
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
                        <!--End Notification-->

                        <div class="margin-bottom-50"></div>

                        <!--Datepicker-->
                        <form action="#" id="sky-form2" class="sky-form">
                                <div id="inline-start"></div>
                        </form>
                        <!--End Datepicker-->
                </div>
                <!--End Left Sidebar-->

                <!-- Profile Content -->
                <div class="col-md-9">
                        <div class="profile-body">
                                <div class="profile-bio">
                                        <div class="row">
                                                <div class="col-md-5">
                                                        <img class="img-responsive md-margin-bottom-10" src="<?php echo e(asset('public/assets/img/team/img32-md.jpg')); ?>" alt="">
                                                        <a class="btn-u btn-u-sm" href="#">Change Picture</a>
                                                </div>
                                                <div class="col-md-7">
                                                        <h2><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h2>
                                                        <hr>
                                                        <p><?php echo e(isset($user->profile->description) ? $user->profile->description : 'User profile description not available. Please use the cog icon in this box to add profile description'); ?></p>
                                                        <br>
                                                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                        </div>
                                </div><!--/end row-->

                                <hr>

                                <div class="row">
                                        <!--Skills-->
                                        <div class="col-sm-12 sm-margin-bottom-30">
                                                <div class="panel panel-profile">
                                                        <div class="panel-heading overflow-h">
                                                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Skills</h2>
                                                                <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                                        </div>
                                                        <div class="panel-body">
                                                                <small>HTML/CSS</small>
                                                                <small>92%</small>
                                                                <div class="progress progress-u progress-xxs">
                                                                        <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                                                                        </div>
                                                                </div>

                                                                <small>Photoshop</small>
                                                                <small>77%</small>
                                                                <div class="progress progress-u progress-xxs">
                                                                        <div style="width: 77%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="77" role="progressbar" class="progress-bar progress-bar-u">
                                                                        </div>
                                                                </div>

                                                                <small>PHP</small>
                                                                <small>85%</small>
                                                                <div class="progress progress-u progress-xxs">
                                                                        <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-u">
                                                                        </div>
                                                                </div>

                                                                <small>Javascript</small>
                                                                <small>81%</small>
                                                                <div class="progress progress-u progress-xxs">
                                                                        <div style="width: 81%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="81" role="progressbar" class="progress-bar progress-bar-u">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <!--End Skills-->
                                </div><!--/end row-->

                                <hr>
                                <!--Timeline-->
                                <div class="panel panel-profile">
                                        <div class="panel-heading overflow-h">
                                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Education</h2>
                                                <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                        </div>
                                        <div class="panel-body">
                                                <ul class="timeline-v2 timeline-me">
                                                        <li>
                                                           <?php if(isset($user->profile->school)): ?>
                                                                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                                                <div class="cbp_tmlabel">
                                                                        <h2><?php echo e($user->profile->school->name); ?></h2>
                                                                </div>
                                                           <?php else: ?>
                                                                   school information not yet available, please use the cog icon to add institutional information
                                                           <?php endif; ?>
                                                        </li>
                                                </ul>
                                        </div>
                                </div>
                                <!--End Timeline-->
                        </div>
                </div>
                <!-- End Profile Content -->
        </div>
</div>
<!--=== End Profile ===-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>