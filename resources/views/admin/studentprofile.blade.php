@extends('admin_layout')
@section('pagecss')
@stop
@section('pagetitle')
    STUDENT PROFILE
@stop
@section('maincontent')
    <div class="container">
        <div class="row margin-bottom-10">
            <div class="col-md-12">
                <div class="tag-box tag-box-v2 box-shadow shadow-effect-1">
                    <h2>
                         {{$student->first_name}} {{$student->last_name}}
                    </h2>
                    <div class="row margin-bottom-20">
                        <div class="col-md-2">
                            <img src="{{ (isset($student->profile->image) && $student->profile->image !="" && $student->profile->image !=NULL)? url('student/file').'/'.$student->profile->image : asset('public/assets/img/user.jpg') }}" alt="{{ $student->first_name }}" width="100%">
                        </div>
                        <div class="col-md-10">
                            {{--*/
                           $profileStats = ($student->profile)?
                           $student->profile()->statistics() : 0;
                           /*--}}
                            <div class="progress progress-u progress-xxs">
                                        <span class="progress-bar {{($profileStats < 30)? 'progress-bar-red':($profileStats < 70)? 'progress-bar-warning':'progress-bar-success'}}" style="width: {{$profileStats}}%">
                                        </span>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @if($student->profile)
                                    {{$student->profile->description}}
                                    @endif
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Email: </strong>{{$student->email}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="tab-v1">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#examhis" data-toggle="tab">Examination History</a></li>
                            <li><a href="#comhis" data-toggle="tab">Communcation History</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="examhis">
                                @include('admin.student.examhistory')
                            </div>
                            <div class="tab-pane fade in" id="comhis">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop
@section('pagejs')

@stop