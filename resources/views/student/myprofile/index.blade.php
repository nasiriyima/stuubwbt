@extends('student.myprofile.myprofile_layout')

@section('pagestyles')
        <link rel="stylesheet" href="{{ asset('public/assets/css/pages/shortcode_timeline2.css') }}">
@stop

@section('pagecontent')
    <div class="profile-body">
        <div class="profile-bio">
            <div class="row">
                <div class="col-md-5">
                    <form id="file-upload" action="{{ url('student/upload-profile-image') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <img class="img-responsive md-margin-bottom-10" src="{{ asset('public/assets/img/team/img32-md.jpg') }}" alt="">
                        <a class="btn-u btn-u-sm" onclick="showFileChooser();" href="#">Change Picture</a>
                        <input type="file" name="image" id="uploadfile" value="" style="display: none" />
                    </form>
                </div>
                <div class="col-sm-7">
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-cog"></i> {{ $user->first_name }} {{ $user->last_name }}</h2>
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
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Social Contacts <small>(option 1)</small></h2>
                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled social-contacts-v2">
                            @if(isset($user->profile->social_contact))
                                {{--*/
                                        $social_contact = $user->profile->social_contact;
                                        $contacts = json_decode($social_contact);
                                 /*--}}
                                <ul class="list-unstyled social-contacts-v2">
                                    @foreach($contacts as $contact)
                                        <li><i class="{{ $contact->icon }}"></i> <a href="{{ $contact->address }}">{{ $contact->name }}</a></li>
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
                <a href="#"><i class="fa fa-cog pull-right"></i></a>
            </div>
            <div class="panel-body">
                <ul class="timeline-v2 timeline-me">
                    @if(isset($user->profile->school))
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <h2>{{ $user->profile->school->name }}</h2>
                        </div>
                    @else
                        school information not yet available, please use the cog icon to add institutional information
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!--=== End Profile ===-->
@stop

@section('pagescripts')
    <script type="application/javascript">
        $('#uploadfile').on('change',function(){
            $("#file-upload").submit();
        });
        function showFileChooser(){
            $('#uploadfile').click();
        }
    </script>
@stop
