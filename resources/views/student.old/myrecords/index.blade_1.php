@extends('student_layout')

@section('pagecss')
<!-- CSS Page Style -->
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/profile.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/shortcode_timeline2.css') }}">
@stop

@section('maincontent')
<!--=== Profile ===-->
<div class="container content profile">
    <div class="row">
       <!-- Profile Content -->
        <div class="col-md-12">
            <div class="profile-body">
                <!--Timeline-->
                <ul class="timeline-v2">
                        @foreach($histories as $history)
                        <li>
                                <time class="cbp_tmtime" datetime=""><span>{{ date('d/m/Y',strtotime($history->created_at)).' @ '.date('h:m:s',strtotime($history->created_at)) }}</span> <span>{{ date('F',strtotime($history->created_at)) }}</span></time>
                                <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                <div class="cbp_tmlabel">
                                        <h2>{{ $history->exam->examProvider->code }} {{ $history->exam->subject->name }}</h2>
                                        <p>{{ $history->exam->subject->description }}</p>
                                        <p>{{ $history->elapsed_time }}</p>

                                        <div class="margin-bottom-20"></div>

                                        <div class="row">
                                                <div class="col-sm-6">
                                                        <!-- Progress Bar Text -->
                                                        <div class="progress-bar-text">
                                                                <p class="text-left">Score</p>
                                                                {{--*/ $x = $history->score*100/count($history->exam->question); /*--}}
                                                                <p class="text-right">{{ $x }}%</p>
                                                                <div class="progress progress-u progress-xs">
                                                                        <div class="progress-bar progress-bar-u progress-bar-u-success" role="progressbar" aria-valuenow="{{ $x }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $x }}%">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- End Progress Bar Text -->

                                                        <!-- Progress Bar Text -->
                                                        <div class="progress-bar-text">
                                                                <p class="text-left">Web Animation</p>
                                                                <p class="text-right">55%</p>
                                                                <div class="progress progress-u progress-xs">
                                                                        <div class="progress-bar progress-bar-u progress-bar-u-info" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- End Progress Bar Text -->
                                                </div>

                                                <div class="col-sm-6">
                                                        <!-- Progress Bar Text -->
                                                        <div class="progress-bar-text">
                                                                <p class="text-left">Web Design</p>
                                                                <p class="text-right">67%</p>
                                                                <div class="progress progress-u progress-xs">
                                                                        <div class="progress-bar progress-bar-u progress-bar-u-danger" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- End Progress Bar Text -->

                                                        <!-- Progress Bar Text -->
                                                        <div class="progress-bar-text">
                                                                <p class="text-left">PHP &amp; Javascript</p>
                                                                <p class="text-right">73%</p>
                                                                <div class="progress progress-u progress-xs">
                                                                        <div class="progress-bar progress-bar-u progress-bar-u-warning" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- End Progress Bar Text -->
                                                </div>
                                        </div>
                                </div>
                        </li>
                        @endforeach
                </ul>
                <!--End Timeline-->
            </div>
        </div>
        <!-- End Profile Content -->
    </div>
</div><!--/container-->
<!--=== End Profile ===-->

@stop
@section('pagejs')
@stop