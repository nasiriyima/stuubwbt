<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="index.html">
            <img src="{{ asset('public/assets/img/logo1-default.jpg')}}" width="220px" alt="Logo">
        </a>
        <!-- End Logo -->

        <!-- Topbar -->
        <div class="topbar">
                <ul class="loginbar pull-right">
                        <li><i class="fa fa-globe"></i><a href="page_faq.html"> FAQs</a></li>
                        @if(\Sentinel::check())
                        <li class="topbar-devider"></li>
                        <li><a href="{{(\Sentinel::check()->user_type == 1)? url('student'):url('admin')}}">{{\Sentinel::check()->first_name}} {{\Sentinel::check()->last_name}}</a></li>
                        <li class="topbar-devider"></li>
                        <li><i class="fa fa-lock"></i><a href="{{url('auth/logout')}}"> Logout</a></li>
                        @else
                        <li class="topbar-devider"></li>
                        <li class="cd-log_reg"><a href="javascript:void(0);">Login</a></li>
                        @endif

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
                    <li class="{{($pagename == 'home')? 'active':' '}}">
                        <a href="{{url('web')}}">
                                Home
                        </a>
                    </li>
                    <li class="{{($pagename == 'aboutus')? 'active':' '}}">
                        <a href="{{url('web/about-us')}}">
                                About Us
                        </a>
                    </li>
                    <li>

                        <a href="{{(\Sentinel::check())? url('student/my-exam'):url('web/sign-in')}}">
                                Take Exams
                        </a>
                    </li>
                    <li class="{{($pagename == 'news')? 'active':' '}}">
                        <a href="{{url('web/news')}}">
                                News
                        </a>
                    </li>
                    <li class="{{($pagename == 'contactus')? 'active':' '}}">
                        <a href="{{url('web/contact-us')}}">
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