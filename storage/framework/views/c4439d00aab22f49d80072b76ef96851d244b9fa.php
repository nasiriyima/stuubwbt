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
                            <a href="">
                                    <img id="logo-header" src="<?php echo e(asset('public/assets/img/stuub.jpg')); ?>" alt="Logo">
                            </a>
                    </div>
                    <!-- End Logo -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <div class="menu-container">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="<?php echo e(url('admin')); ?>">Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('admin/student-manager')); ?>">
                                            Student Manager
                                    </a>
                                </li>
                                <li>
                                        <a href="<?php echo e(url('admin/wbt-manager')); ?>">
                                                WBT Manager
                                        </a>
                                </li>
                                <li class="dropdown <?php echo e(isset($open) ? $open : ''); ?>">
                                    <a href="javascript:void(0);" class="dropdown-toggle">
                                        My Messages
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="">
                                            <a href="<?php echo e(url('admin/my-message-inbox')); ?>">
                                                <span class="badge badge-u pull-right rounded-2x"><?php echo e($inbox_count); ?></span>
                                                Inbox
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('admin/my-message-sent')); ?>">
                                                <span class="badge badge-green pull-right rounded-2x"><?php echo e($sent_count); ?></span>
                                                Sent
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('admin/my-message-saved')); ?>">
                                                <span class="badge badge-yellow pull-right rounded-2x"><?php echo e($saved_count); ?></span>
                                                Saved
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('admin/my-message-deleted')); ?>">
                                                <span class="badge badge-red pull-right rounded-2x"><?php echo e($deleted_count); ?></span>
                                                Deleted
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('admin/schools-manager')); ?>">
                                        Schools Manager
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('admin/news')); ?>">
                                        News Manager
                                    </a>
                                </li>
                                <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle">
                                                System Settings
                                        </a>
                                        <ul class="dropdown-menu">
                                                <li><a href="<?php echo e(url('admin/users-management')); ?>">User Management</a></li>
                                                 <li><a href="<?php echo e(url('email/email-settings')); ?>">Email Settings</a></li>
                                        </ul>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('auth/logout')); ?>">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                            <p class="copyright-text">&copy; 2015 STUUB Web Based Testing.</p>
                    </div>
            </div>
            <!-- End Navbar Collapse -->
    </nav>
</div>