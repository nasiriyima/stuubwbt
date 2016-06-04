<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="index.html">
            <img src="<?php echo e(asset('public/assets/img/logo1-default.png')); ?>" width="220px" alt="Logo">
        </a>
        <!-- End Logo -->

        <!-- Topbar -->
        <div class="topbar">
                <ul class="loginbar pull-right">
                        <li><i class="fa fa-globe"></i><a href="page_faq.html"> FAQs</a></li>
                        <?php if(\Sentinel::check()): ?>
                        <li class="topbar-devider"></li>
                        <li><a href="<?php echo e((\Sentinel::check()->user_type == 1)? url('student'):url('admin')); ?>"><?php echo e(\Sentinel::check()->first_name); ?> <?php echo e(\Sentinel::check()->last_name); ?></a></li>
                        <li class="topbar-devider"></li>
                        <li><i class="fa fa-lock"></i><a href="<?php echo e(url('auth/logout')); ?>"> Logout</a></li>
                        <?php else: ?>
                        <li class="topbar-devider"></li>
                        <li class="cd-log_reg"><a href="javascript:void(0);">Login</a></li>
                        <?php endif; ?>

                </ul>
        </div>
        <!-- End Topbar -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
                <ul class="nav navbar-nav">
                    <li class="<?php echo e(($pagename == 'home')? 'active':' '); ?>">
                        <a href="<?php echo e(url('web')); ?>">
                                Home
                        </a>
                    </li>
                    <li class="<?php echo e(($pagename == 'aboutus')? 'active':' '); ?>">
                        <a href="<?php echo e(url('web/about-us')); ?>">
                                About Us
                        </a>
                    </li>
                    <li class="dropdown mega-menu-fullwidth">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                Take Exams
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content disable-icons">
                                    <div class="container">
                                        <div class="row equal-height">
                                            <div class="col-md-4 equal-height-in">
                                                <ul class="list-unstyled equal-height-list">
                                                    <li><h3>Joint Admissions &amp; Matriculation Board</h3></li>
                                                        <li><a href="#">Mathematics</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 equal-height-in">
                                                <ul class="list-unstyled equal-height-list">
                                                    <li><h3>West African Examination Council</h3></li>
                                                        <li><a href="#">Mathematics</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 equal-height-in">
                                                <ul class="list-unstyled equal-height-list">
                                                    <li><h3>National Examination Council</h3></li>
                                                        <li><a href="#">Mathematics</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo e(($pagename == 'news')? 'active':' '); ?>">
                        <a href="<?php echo e(url('web/news')); ?>">
                                News
                        </a>
                    </li>
                    <li class="<?php echo e(($pagename == 'contactus')? 'active':' '); ?>">
                        <a href="<?php echo e(url('web/contact-us')); ?>">
                                Contact Us
                        </a>
                    </li>

                        <!-- Search Block -->
                        <li>
                                <i class="search fa fa-search search-btn"></i>
                                <div class="search-open">
                                        <div class="input-group animated fadeInDown">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <span class="input-group-btn">
                                                        <button class="btn-u" type="button">Go</button>
                                                </span>
                                        </div>
                                </div>
                        </li>
                        <!-- End Search Block -->
                </ul>
        </div>
    </div>
</div>