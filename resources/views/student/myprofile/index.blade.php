@extends('student.myprofile.myprofile_layout')

@section('pagestyles')
        <link rel="stylesheet" href="{{ asset('public/assets/css/pages/shortcode_timeline2.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/plugins/chosen/chosen.min.css') }}">
@stop

@section('pagecontent')
    <div class="profile-body">
        <div class="profile-bio">
            <div class="row">
                <div class="col-md-5">
                    <form id="file-upload" action="{{ url('student/upload-profile-image') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <img class="img-responsive md-margin-bottom-10" width="219.31" height="221.3" src="{{ (isset($user->profile->image) && $user->profile->image !="" && $user->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$user->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $user->first_name }}">
                        <a class="btn-u btn-u-sm" onclick="showFileChooser();" href="#">Change Picture</a>
                        <input type="file" name="image" id="uploadfile" value="" style="display: none" />
                    </form>
                </div>
                <div class="col-sm-7">
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-cog hover-hand-cursor" onclick="showEditModal('description');"></i> {{ $user->first_name }} {{ $user->last_name }}</h2>
                        </div>
                        <div class="panel-body">
                            <p>{{ $user->profile->description or 'User profile description not available. Please use the cog icon in this box to add profile description' }}</p>
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
                        <a href="#"><i class="fa fa-cog hover-hand-cursor pull-right" onclick="showEditModal('social_contact');"></i></a>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled social-contacts-v2">
                            @if(isset($user->profile->social_contact) && $user->profile->social_contact != "")
                                {{--*/
                                        $social_contact = $user->profile->social_contact;
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
                                Social media contacts not yet available, please use the cog icon to add new social media contact information
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
                <a href="#"><i class="fa fa-cog hover-hand-cursor pull-right" onclick="showEditModal('education');"></i></a>
            </div>
            <div class="panel-body">
                @if(isset($user->profile->school) && $user->profile->education != '' && $user->profile->education != null)
                <ul class="timeline-v2 timeline-me">

                        {{--*/
                                $education_information = $user->profile->education;
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
@stop

@section('pagescripts')
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
    <script type="application/javascript">
        $("#uploadfile").on("change",function(){
            $("#file-upload").submit();
        });
        function showFileChooser(){
            $("#uploadfile").click();
        }

        function showEditModal(type){
            $.ajax({
                url: "{!! url('student/edit-view') !!}",
                method: "post",
                data:{_token:"{!! csrf_token() !!}", type:type},
                success:function(response, status, xhr){
                    var header_content_type = xhr.getResponseHeader("content-type") || "";

                    if (header_content_type.indexOf('html') > -1) {
                        $(".bs-example-modal-lg .modal-body").html(response);
                        $(".bs-example-modal-lg #edit-title").html(type.toString().toUpperCase());
                        $(".bs-example-modal-lg").modal("show");
                    }

                    if (header_content_type.indexOf('json') > -1) {
                        if(response.session_expired){
                            window.location = response.url;
                        }
                    }
                }
            });

            $(".bs-example-modal-lg").on("shown.bs.modal", function () {
                $('.chosen-select', this).chosen('destroy').chosen();
            });
        }
    </script>
@stop
