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
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Search My Records</h3>
                    </div>
                    <div class="panel-body">
                            <form class="form-inline" role="form" method="post" action="{{ url('student/my-record') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">Begin</label>
                                            <input type="date" class="form-control" name="startDate" id="date" value="{{ $startDate->format('Y-m-d') }}" placeholder="Start Date" required>
                                    </div>
                                    <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">End</label>
                                            <input type="date" class="form-control" name="endDate" id="date" value="{{ $endDate->format('Y-m-d') }}" placeholder="End Date" required>
                                    </div>
                                    <button type="submit" class="btn-u btn-u-default">Sort My Records</button>
                                    <div class="label">
                                            <label>
                                                   Only 50 Records can be displayed at a time
                                            </label>
                                    </div>
                            </form>
                    </div>
            </div>
            <!-- End Inline Form -->
       <!-- Profile Content -->
        <div class="col-md-12">
            <div class="panel-heading">
                    Showing Records Between {{ $startDate->format('d - m - Y') }} to {{ $endDate->format('d - m - Y') }}
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
                                        <p>{{ $history->exam->subject->description }}</p>
                                        <p>{{ $history->elapsed_time }}</p>

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
                                                                <p class="text-right">{{ $x }}%</p>
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
                                                                <p class="text-right">{{ $history->examAttempts($history->exam_id, $startDate, $endDate)->count()  }} ({{ $z }})%</p>

                                                                <div class="progress progress-u progress-xs">
                                                                        <div style="width:{{ $z  }}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $z  }}" role="progressbar" class="progress-bar progress-bar-u">
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
                                                                        <div style="width:{{ $y  }}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $y  }}" role="progressbar" class="progress-bar progress-bar-u">
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