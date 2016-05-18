@extends('student.myexam.layout')
@section('pagecss')
<!-- CSS Page Style -->
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/profile.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/shortcode_timeline2.css') }}">
@stop
@section('sidemenu')
 <!--Left Sidebar-->
 <div class="header-v7 header-left-v7">
    <nav class="navbar navbar-default mCustomScrollbar" role="navigation" data-mcs-theme="minimal-dark">
        <div class="menu-container">
            <div class="col-md-12">
                <img class="img-responsive profile-img margin-bottom-20" src="{{ asset('public/assets/img/team/img32-md.jpg') }}" alt="">

                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item active">
                            <a href="page_profile.html"><i class="fa fa-bar-chart-o"></i> Overall</a>
                    </li>
                    <li class="list-group-item">
                            <a href="page_profile_me.html"><i class="fa fa-user"></i> My Profile</a>
                    </li>
                    <li class="list-group-item">
                            <a href="page_profile_users.html"><i class="fa fa-group"></i> My Relationship</a>
                    </li>
                    <li class="list-group-item">
                            <a href="{{ url('student/my-record') }}"><i class="fa fa-history"></i> My Records</a>
                    </li>
                    <li class="list-group-item">
                                <a href="page_profile_settings.html"><i class="fa fa-cog"></i> My Settings</a>
                        </li>
                </ul>
            </div>
        </div> 
    </nav>
 </div>
 <!--End Left Sidebar-->

@stop
@section('content')
<div class="wrapper">
        <!--=== Profile ===-->
        <div class="container content profile">
            <div class="row">
                <!-- Profile Content -->
                <div class="col-md-12">
                    <div class="profile-body">
                        <!--Service Block v3-->
                        <div class="row margin-bottom-10">
                            <a href="{{ url('student/review') }}">
                                <div class="col-sm-6 sm-margin-bottom-20">
                                    <div class="service-block-v3 service-block-green">
                                        <i class="icon-check"></i>
                                        <span class="service-heading">Passed</span>
                                        <span class="counter">{{ $passed }}</span>

                                        <div class="clearfix margin-bottom-10"></div>

                                        <div class="statistics">
                                            <h3 class="heading-xs">Statistics in Progress Bar <span class="pull-right">{{ $passedpercentage }}%</span></h3>
                                            <div class="progress progress-u progress-xxs">
                                                <div style="{{ 'width: '.$passedpercentage.'%' }}" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $passedpercentage }}" role="progressbar" class="progress-bar progress-bar-light">
                                                </div>
                                            </div>
                                            <small><strong>Click here to review your answers</strong></small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('student/review') }}">
                                <div class="col-sm-6 sm-margin-bottom-20">
                                    <div class="service-block-v3 service-block-red">
                                            <i class="icon-close"></i>
                                            <span class="service-heading">Failed</span>
                                            <span class="counter">{{ $failed }}</span>

                                            <div class="clearfix margin-bottom-10"></div>

                                            <div class="statistics">
                                                    <h3 class="heading-xs">Statistics in Progress Bar <span class="pull-right">{{ $failedpercentage }}%</span></h3>
                                                    <div class="progress progress-u progress-xxs">
                                                            <div style="{{ 'width: '.$failedpercentage.'%' }}" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $failedpercentage }}" role="progressbar" class="progress-bar progress-bar-light">
                                                            </div>
                                                    </div>
                                                    <small><strong>Click here to review your answers</strong></small>
                                            </div>
                                    </div>
                                </div>
                            </a>
                        </div><!--/end row-->
                        <!--End Service Block v3-->
                        <!--Service Block v3-->
                        <div class="row margin-bottom-10">
                                <div class="col-sm-12">
                                    <div class="service-block-v3 service-block-u">
                                            <i class="icon-clock"></i>
                                            <span class="service-heading">Overall Attempts</span>
                                            <span class="counter">{{ $history_count }}</span>

                                            <div class="clearfix margin-bottom-10"></div>

                                            <div class="row margin-bottom-20">
                                                    <div class="col-xs-6 service-in">
                                                            <small>Last Week</small>
                                                            <h4 class="counter">{{ $history_week_count }}</h4>
                                                    </div>
                                                    <div class="col-xs-6 text-right service-in">
                                                            <small>Last Month</small>
                                                            <h4 class="counter">{{ $history_month_count }}</h4>
                                                    </div>
                                            </div>
                                            <div class="statistics">
                                                    <h3 class="heading-xs">Statistics in Progress Bar <span class="pull-right">{{ $attempt_percentage }}%</span></h3>
                                                    <div class="progress progress-u progress-xxs">
                                                            <div style="{{ 'width: '.$attempt_percentage.'%' }}" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $attempt_percentage }}" role="progressbar" class="progress-bar progress-bar-light">
                                                            </div>
                                                    </div>
                                                    {!! $attempt_phrase !!}
                                            </div>
                                    </div>
                                </div>
                        </div><!--/end row-->
                        <!--End Service Block v3-->
                    </div>
                </div>
                <!-- End Profile Content -->
            </div>
        </div><!--/container-->
        <!--=== End Profile ===-->
</div><!--/wrapper-->
@stop
@section('pagejs')
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/datepicker.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
            App.init();
            App.initCounter();
            App.initScrollBar();
            Datepicker.initDatepicker();
            StyleSwitcher.initStyleSwitcher();
    });
</script>
@stop