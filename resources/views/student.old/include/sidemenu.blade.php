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
                                <img id="logo-header" src="{{ asset('public/assets/img/stuub.jpg')}}" alt="Logo" width="100px">
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
                                <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle">
                                                Take Exams
                                        </a>
                                        <ul class="dropdown-menu">
                                                <li><a href="{{ url('student/my-exam') }}">Exam View </a></li>
                                        </ul>
                                </li>
                                <li>
                                    <a href="#">
                                            My Records
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Mail
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                            My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Logout
                                    </a>
                                </li>
                            </ul>
                            <p class="copyright-text">&copy; <?php echo date('Y')?> - STUUB All Right Reserved</p>
                    </div>
            </div>
            <!-- End Navbar Collapse -->
    </nav>
</div>