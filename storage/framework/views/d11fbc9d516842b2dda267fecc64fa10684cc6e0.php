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
                                        <ul class="list-unstyled social-contacts-v2">
                                                <li><i class="rounded-x tw fa fa-twitter"></i> <a href="#">edward.rooster</a></li>
                                                <li><i class="rounded-x fb fa fa-facebook"></i> <a href="#">Edward Rooster</a></li>
                                                <li><i class="rounded-x sk fa fa-skype"></i> <a href="#">edwardRooster77</a></li>
                                                <li><i class="rounded-x gp fa fa-google-plus"></i> <a href="#">rooster77edward</a></li>
                                                <li><i class="rounded-x gm fa fa-envelope"></i> <a href="#">edward77@gmail.com</a></li>
                                        </ul>
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
                                                        <h2>Edward Rooster</h2>
                                                        <hr>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget massa nec turpis congue bibendum. Integer nulla felis, porta suscipit nulla et, dignissim commodo nunc. Morbi a semper nulla.</p>
                                                        <p>Proin mauris odio, pharetra quis ligula non, vulputate vehicula quam. Nunc in libero vitae nunc ultricies tincidunt ut sed leo. Sed luctus dui ut congue consequat. Cras consequat nisl ante, nec malesuada velit pellentesque ac. Pellentesque nec arcu in ipsum iaculis convallis.</p>
                                                </div>
                                                <h4><p><a href="#"><i class="fa fa-cog pull-right"></i></a></h4>
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
                                                                <time datetime="" class="cbp_tmtime"><span>Bachelor of IT</span> <span>2003 - 2000</span></time>
                                                                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                                                <div class="cbp_tmlabel">
                                                                        <h2>Harvard University</h2>
                                                                        <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
                                                                </div>
                                                        </li>
                                                        <li>
                                                                <time datetime="" class="cbp_tmtime"><span>Web Design</span> <span>1997 - 2000</span></time>
                                                                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                                                <div class="cbp_tmlabel">
                                                                        <h2>Imperial College London</h2>
                                                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce.</p>
                                                                </div>
                                                        </li>
                                                        <li>
                                                                <time datetime="" class="cbp_tmtime"><span>High School</span> <span>1988 - 1997</span></time>
                                                                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                                                <div class="cbp_tmlabel">
                                                                        <h2>Chicago High School</h2>
                                                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot.</p>
                                                                </div>
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