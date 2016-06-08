@extends('student_layout')

@section('pagecss')
<!-- CSS Page Style -->
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/profile.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/shortcode_timeline2.css') }}">
@stop

@section('maincontent')
<!--=== Profile ===-->
@if(count($errors) > 0)
        <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Oh snap! You got an error!</h4>
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
                <p>
                        <a class="btn-u btn-u-red" href="#" data-dismiss="alert" aria-hidden="true">OK</a>
                </p>
        </div>
@endif
<div class="container content profile">
    <div class="row">
            <!-- Inline Form -->
            <div class="panel panel-grey margin-bottom-40">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i></h3>
                    </div>
                    <div class="panel-body">
                            <!-- Datepicker Forms -->
                            <div class="tab-pane fade in active" id="home-1">
                                    <form id="sky-form" class="sky-form" method="post" action="{{ url('student/my-record') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <header>My Records</header>
                                            <fieldset>
                                                    <label class="label">Select date range</label>
                                                    <div class="row">
                                                            <section class="col col-6">
                                                                    <label class="input">
                                                                            <i class="icon-append fa fa-calendar"></i>
                                                                            <input type="text" name="startDate" id="start" value="{{ $startDate->format('d.m.Y') }}" placeholder="Start date">
                                                                    </label>
                                                            </section>
                                                            <section class="col col-6">
                                                                    <label class="input">
                                                                            <i class="icon-append fa fa-calendar"></i>
                                                                            <input type="text" name="endDate" id="finish" value="{{ $endDate->format('d.m.Y') }}" placeholder="End date">
                                                                    </label>
                                                            </section>
                                                            <section class="col col-4 pull-right">
                                                                    <label class="input">
                                                                            <input type="submit" class="btn-u btn-u" value="Sort My Records">
                                                                    </label>
                                                            </section>
                                                    </div>
                                            </fieldset>
                                    </form>
                            </div>
                            <!-- End Datepicker Forms -->
                            <!-- Profile Content -->
                            <div class="col-md-12">
                                    <div class="panel-heading">
                                            Showing Records Between {{ $startDate->format('d-m-Y') }} to {{ $endDate->format('d-m-Y') }}
                                    </div>
                                    <div class="profile-body">
                                            <!--Timeline-->
                                            <ul class="timeline-v2">
                                                    @foreach($histories as $history)
                                                            <li>
                                                                    <time class="cbp_tmtime" datetime=""><span>{{ date('d/m/Y',strtotime($history->created_at)).' @ '.date('h:m:s',strtotime($history->created_at)) }}</span> <span>{{ date('F',strtotime($history->created_at)) }}</span></time>
                                                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                                                    <div class="cbp_tmlabel">
                                                                            <h2>{{ $history->exam->examProvider->code }} {{ $history->exam->subject->name }}</h2>
                                                                            <p><strong>{{ $history->exam->month->name }} {{ $history->exam->session->name }}</strong></p>
                                                                            <p><label>Exam Instruction: </label> {{ $history->exam->instruction->description }}</p>
                                                                            <p><label>Time Allowed: </label> {{ $history->exam->time_allowed }}</p>
                                                                            <p><label>Time Elapsed: </label> {{ $history->elapsed_time }}</p>

                                                                            <div class="margin-bottom-20"></div>

                                                                            <div class="row">
                                                                                    <div class="col-sm-6">
                                                                                            <!-- Progress Bar Text -->
                                                                                            <div class="progress-bar-text">
                                                                                                    <p class="text-left">Score</p>
                                                                                                    {{--*/ $x = $history->score*100/count($history->exam->question); /*--}}
                                                                                                    <p class="text-right">{{ (double) $history->score  }}</p>
                                                                                                    <div class="progress progress-u progress-xs">
                                                                                                            <div class="progress-bar progress-bar-u progress-bar-u-success" role="progressbar" aria-valuenow="{{ $x }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $x }}%">
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <!-- End Progress Bar Text -->

                                                                                            <!-- Progress Bar Text -->
                                                                                            <div class="progress-bar-text">
                                                                                                    <p class="text-left">Percentage</p>
                                                                                                    <p class="text-right">{{   round($x, 2) }}%</p>
                                                                                                    <div class="progress progress-u progress-xs">
                                                                                                            <div class="progress-bar progress-bar-u progress-bar-u-success" role="progressbar" aria-valuenow="{{ $x }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $x }}%">
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <!-- End Progress Bar Text -->
                                                                                    </div>

                                                                                    <div class="col-sm-6">
                                                                                            <!-- Progress Bar Text -->
                                                                                            <div class="progress-bar-text">
                                                                                                    <p class="text-left">Attempts</p>
                                                                                                    {{--*/ $z = floor(($history->cumulativeAverage($history->exam_id, $startDate, $endDate)*100)/$history->examAttemptAll($history->exam_id)->count()); /*--}}
                                                                                                    <p class="text-right">{{ $history->examAttempts($history->exam_id, $startDate, $endDate)->count()  }} ({{ $z }}%)</p>

                                                                                                    <div class="progress progress-u progress-xs">
                                                                                                            <div style="width:{{ $z }}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $z }}" role="progressbar" class="progress-bar progress-bar-u">
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <!-- End Progress Bar Text -->

                                                                                            <!-- Progress Bar Text -->
                                                                                            <div class="progress-bar-text">
                                                                                                    <p class="text-left">Cumulative Average</p>
                                                                                                    {{--*/ $y = floor($history->cumulativeAverage($history->exam_id, $startDate, $endDate)*100/count($history->exam->question)); /*--}}
                                                                                                    <p class="text-right">{{ rand($history->cumulativeAverage($history->exam_id, $startDate, $endDate), 2)  }}</p>
                                                                                                    <div class="progress progress-u progress-xs">
                                                                                                            <div style="width:{{ $y  }}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $y }}" role="progressbar" class="progress-bar progress-bar-u">
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
            </div>
            <!-- End Inline Form -->
    </div>
</div><!--/container-->
<!--=== End Profile ===-->

@stop
@section('pagejs')
        <script type="text/javascript" src="{{ asset('public/assets/js/plugins/datepicker.js')}}"></script>
        <script type="text/javascript">
                jQuery(document).ready(function() {
                        Datepicker.initDatepicker();
                });
        </script>
@stop