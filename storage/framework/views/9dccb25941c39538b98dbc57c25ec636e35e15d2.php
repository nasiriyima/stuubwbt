<div class="header-v7 header-left-v7">
    <nav class="navbar navbar-default mCustomScrollbar" role="navigation" data-mcs-theme="minimal-dark">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="menu-container">
            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- End Toggle -->

            <!-- Logo -->
            <div class="logo">
                <a href="index.html">
                    <img id="logo-header" src="<?php echo e(asset('public/assets/img/logo1-default.png')); ?>" alt="Logo">
                </a>
            </div>
            <!-- End Logo -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <div class="menu-container">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo e(url('student/index')); ?>">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            My Exams
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(url('student/my-exam')); ?>">Take Exam </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo e(url('student/my-record')); ?>/<?php echo e(\Carbon\Carbon::now()->startOfMonth()->timestamp); ?>/<?php echo e(\Carbon\Carbon::now()->timestamp); ?>">
                            My Records
                        </a>
                    </li>
                    <li class="dropdown <?php echo e(isset($open) ? $open : ''); ?>">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            My Messages
                        </a>
                        <ul class="dropdown-menu">
                            <li class="">
                                <a href="<?php echo e(url('student/my-message-inbox')); ?>">
                                    <span class="badge badge-u pull-right rounded-2x"><?php echo e($inbox_count); ?></span>
                                    Inbox
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('student/my-message-sent')); ?>">
                                    <span class="badge  badge-green pull-right rounded-2x"><?php echo e($sent_count); ?></span>
                                    Sent
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('student/my-message-saved')); ?>">
                                    <span class="badge badge-yellow pull-right rounded-2x"><?php echo e($saved_count); ?></span>
                                    Saved
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('student/my-message-deleted')); ?>">
                                    <span class="badge badge-red pull-right rounded-2x"><?php echo e($deleted_count); ?></span>
                                    Deleted
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo e(url('student/my-profile')); ?>">
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Navbar Collapse -->
    </nav>
</div>
