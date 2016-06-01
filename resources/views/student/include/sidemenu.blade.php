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
                    <img id="logo-header" src="{{ asset('public/assets/img/logo1-default.png')}}" alt="Logo">
                </a>
            </div>
            <!-- End Logo -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <div class="menu-container">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('student/index') }}">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            My Exams
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('student/my-exam') }}">Take Exam </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('student/my-record') }}">
                            My Records
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            My Messages
                        </a>
                        <ul class="dropdown-menu">
                            <li class="">
                                <a href="{{ url('student/my-message-inbox') }}">
                                    <span class="badge pull-right rounded-x">7</span>
                                    Inbox
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge pull-right rounded-2x">37</span>
                                    Outbox
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge pull-right rounded">3</span>
                                    Draft
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge pull-right">37</span>
                                    Junk
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge pull-right">37</span>
                                    Trash
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('student/my-profile') }}">
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
