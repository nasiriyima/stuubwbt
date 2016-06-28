@extends('student_layout')

@section('pagecss')
    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/pages/profile.css') }}">
    <style>
        .hover-hand-cursor{ cursor: pointer; }
    </style>
    <link rel="stylesheet" href="{{ asset('public/assets/css/pages/shortcode_timeline2.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/chosen/chosen.min.css') }}">
@stop

@section('maincontent')
    <div id="alert-message">
        @if(\Session::has('error'))
            <div class="alert alert-danger fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Oh snap!</strong> {{ \Session::get('error') }}</div>
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Well done</strong> {{ \Session::get('success') }} </div>
        @endif
    </div>
   <!--=== Profile ===-->
    <div class="content profile">
        <!--Left Sidebar-->
        <div class="col-md-4 profile-body md-margin-bottom-40">
            <img class="img-responsive profile-img margin-bottom-20" width="453" height="453" src="{{ (isset($friend->profile->image) && $friend->profile->image !="" && $friend->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$friend->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $friend->first_name }}">

            <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                <li class="list-group-item {{ ($page_name == 'profile')? 'active' : '' }}">
                    <a href="{{ url('student/friend-profile') }}/{{ \Crypt::encrypt($friend->id) }}"><i class="fa fa-user"></i> Profile</a>
                </li>
                <li class="list-group-item {{ ($page_name == 'friends')? 'active' : '' }}">
                    <a href="{{ url('student/friend-profile-list') }}/{{ \Crypt::encrypt($friend->id) }}"><i class="fa fa-group"></i> Friends</a>
                </li>
            </ul>

            <hr>
            <a href="{{ url('student/process-friend') }}/{{ \Crypt::encrypt($friend->id) }}/accept" class="btn-u btn-u-sm btn-block" {{ (!$is_friend && $has_friend_request && $friend->id != $user->id)? '' : 'style=display:none;' }}>Accept</a>
            <a href="#" class="btn-u btn-u-sm btn-block" {{ (!$is_friend && $has_friend_request && $friend->id == $user->id)? '' : 'style=display:none;' }}>Friend Request Pending</a>
            <a href="javascript:void(0)" class="btn-u btn-u-info btn-u-sm btn-block" onclick="sendFriendRequest('{{ $friend->id }}', '{{ $friend->first_name }}');" {{ (!$is_friend && !$has_friend_request)? '' : 'style=display:none;' }}>Send Friendship Request</a>
            <a href="{{ url('student/my-friends') }}" class="btn-u btn-u-blue btn-u-sm btn-block">Return to Friend List</a>
            <a href="{{ url('student/my-profile') }}" class="btn-u btn-u-green  btn-u-sm btn-block">Return to Profile</a>
            <a href="javascript:showAlert('confirm', '', '{{ \Crypt::encrypt($friend->id) }}', 'unfriend');" class="btn-u btn-u-red btn-u-sm btn-block" {{ ($is_friend && !$is_me)? '' : 'style=display:none;' }}>Unfriend</a>

            <hr>
            <!--Datepicker-->
            <form action="#" id="sky-form2" class="sky-form">
                <div id="inline-start"></div>
            </form>
            <!--End Datepicker-->

            <hr>

            <div class="margin-bottom-50"></div>

        </div>
        <!--End Left Sidebar-->

        <!-- Profile Content -->
        <div class="col-md-8">
            <div class="profile-body">
                <div class="profile-bio">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="#">
                                <img class="img-responsive md-margin-bottom-10" width="219.31" height="221.3" src="{{ (isset($friend->profile->image) && $friend->profile->image !="" && $friend->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$friend->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $friend->first_name }}">
                            </form>
                        </div>
                        <div class="col-sm-7">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"> {{ $friend->first_name }} {{ $friend->last_name }}</h2>
                                </div>
                                <div class="panel-body">
                                    <p>{{ $friend->profile->description or 'User profile description not available.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/end row-->

                <hr>

                <div class="row">
                    <!--Social Icons v3-->
                    <div class="col-sm-12 sm-margin-bottom-30">
                        <div class="panel panel-profile">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Social Contacts</h2>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled social-contacts-v2">
                                    @if(isset($friend->profile->social_contact) && $friend->profile->social_contact != "")
                                        {{--*/
                                                $social_contact = $friend->profile->social_contact;
                                                $contacts = json_decode($social_contact);
                                         /*--}}
                                        <ul class="list-unstyled social-contacts-v2">
                                            @foreach($contacts as $contact_type => $contact)
                                                <li>
                                                    <i class="{{ $contact->icon }}"></i><a href="{{ $contact->address }}">{{ $contact->name }}</a>
                                                    @if(strtolower($contact_type) == 'twitter')
                                                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.stuu">Tweet</a>
                                                    @endif
                                                    @if(strtolower($contact_type) == 'facebook')
                                                        <div class="fb-share-button" data-href="http://www.stuub.com" data-layout="button" data-mobile-iframe="false">
                                                            <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.stuub.com%2F&amp;src=sdkpreparse">Share</a>
                                                        </div>
                                                    @endif
                                                    @if(strtolower($contact_type) == 'google plus')
                                                        <div class="g-plus" data-action="share" data-annotation="none"></div>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        Social media contacts not yet available
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Social Icons v3-->
                </div><!--/end row-->

                <hr>

                <!--Timeline-->
                <div class="panel panel-profile">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Education</h2>
                    </div>
                    <div class="panel-body">
                        @if(isset($friend->profile->school) && $friend->profile->education != '' && $friend->profile->education != null)
                            <ul class="timeline-v2 timeline-me">

                                {{--*/
                                        $education_information = $friend->profile->education;
                                        $education = json_decode($education_information);
                                 /*--}}
                                @foreach($education as $school => $estimated)
                                    <li>
                                        <time datetime="" class="cbp_tmtime"><span>{{ \Carbon\Carbon::createFromTimestamp(strtotime($estimated->endDate))->subYears(6)->format('Y') }} - {{ \Carbon\Carbon::createFromTimestamp(strtotime($estimated->endDate))->format('Y') }}</span></time>
                                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                        <div class="cbp_tmlabel">
                                            <h2>{{ ucwords($school) }}</h2>
                                            <p></p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            school information not yet available, please use the cog icon to add institutional information
                        @endif
                    </div>
                </div>
            </div>
            <!--=== End Profile ===-->
            <div class="profile-body margin-bottom-20">
                <div class="panel">
                    <div class="panel-heading headline headline-sm"><h2 class="heading-sm"><i class="fa fa-pie-chart"></i>Stats</h2></div>
                    <!-- Pie Charts v1 -->
                    <div class="row pie-progress-charts margin-bottom-60">
                        <div class="inner-pchart col-md-4">
                            <div class="circle" id="circle-1"></div>
                            <h3 class="circle-title">Profile</h3>
                        </div>
                        <div class="counters col-md-3 col-sm-3">
                            <span class="counter-icon"><i class="fa fa-users rounded"></i></span>
                            <span class="counter">{{ $friendsStats }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Profile Content -->
    </div>
    <!-- Large modal -->
    <div class="modal fade bs-example-modal-sm rejection" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="alert alert-warning fade in text-center">
                <h4>Warning!</h4>
                <p><span id="confirm_message"></span></p>
                <p>
                    <a class="btn-u btn-u-xs btn-u-red" id="okoption" href="#">OK</a> <a class="btn-u btn-u-xs btn-u-sea" data-dismiss="modal" href="#">Cancels</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Large modal -->
@stop
@section('pagejs')
    <script type="text/javascript">
        var profileStats = "{!! $profileStats !!}";
        function showAlert(type, message, id, caller){
            if(type === 'confirm'){
                confirmRejection(caller, id, 'Are you sure you will like to reject/un-friend selected friend?');
                $(".rejection").modal('show');
            }

            if(type === 'error'){
                $("div#alert-message").html('<div class="alert alert-danger fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Oh snap!</strong> '+message+'.</div>');
                $("div#alert-message").show("slow");
            }

            if(type === 'success'){
                $("div#alert-message").html('<div class="alert alert-success fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Well done</strong> '+message+'.</div>');
                $("div#alert-message").show("slow");
            }

            if(type === 'warning'){
                $("div#alert-message").html('<div class="alert alert-warning fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> '+message+'.</div>');
                $("div#alert-message").show("slow");
            }

            if(type === 'info'){
                $("div#alert-message").html('<div class="alert alert-info fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Heads up!</strong> '+message+'.</div>');
                $("div#alert-message").show("slow");
            }

            setTimeout(function(){
                $("div#alert-message").hide("slow");
            }, 10000);
        }
        function confirmRejection(caller, id, message){
            $("span#confirm_message").text(message);
            (caller === 'reject')? $("#okoption").prop('href', "{!! url('student/process-friend/') !!}/"+id+"/reject"):
                    $("#okoption").prop('href', "{!! url('student/process-friend/') !!}/"+id+"/unfriend");
        }

        function sendFriendRequest(id, name){
            $.ajax({
                url: "{!! url('student/friendship-request') !!}",
                method:"post",
                data: {_token:"{!! csrf_token() !!}", friend:id},
                success:function(response){
                    console.log(response);
                    if(response.message === "success"){
                        showAlert("info", "Friendship request sent to "+name);
                        $("#request"+id).replaceWith('<li id="pending'+id+'"><i class="fa  fa-hourglass-end"></i><a href="#">Pending</a></li>');
                        return;
                    }
                }
            });
        }
    </script>
    <script type="text/javascript" src="{{ asset('public/assets/js/plugins/datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/plugins/circles-master/circles.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/plugins/circles-master.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/plugins/chosen/chosen.jquery.min.js') }}"></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=286126538391449";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Datepicker.initDatepicker();
            CirclesMaster.initCirclesMaster1();
        });
    </script>
@stop