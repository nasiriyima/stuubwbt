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
                                    <img id="logo-header" src="{{ asset('public/assets/img/stuub.jpg')}}" alt="Logo">
                            </a>
                    </div>
                    <!-- End Logo -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <div class="menu-container">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/student-manager')}}">
                                            Student Manager
                                    </a>
                                </li>
                                <li>
                                        <a href="{{url('admin/wbt-manager')}}">
                                                WBT Manager
                                        </a>
                                </li>

                                <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle">
                                                Reports
                                        </a>
                                        <ul class="dropdown-menu">
                                                <li><a href="page_about2.html">About Us </a></li>
                                        </ul>
                                </li>
                                <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle">
                                                System Settings
                                        </a>
                                        <ul class="dropdown-menu">
                                                <li><a href="{{url('admin/users-management')}}">User Management</a></li>
                                                 <li><a href="{{url('email/email-settings')}}">Email Settings</a></li>
                                        </ul>
                                </li>
                            </ul>
                            <p class="copyright-text">&copy; 2015 STUUB Web Based Testing.</p>
                    </div>
            </div>
            <!-- End Navbar Collapse -->
    </nav>
</div>