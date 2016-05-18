@extends('admin_layout')

@section('pagetitle')
{{ucwords($subject->name)}}
@stop
@section('maincontent')
<div class="tab-v1">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            @foreach($subject->exam as $exam)
            <div class="col-sm-4 sm-margin-bottom-40">
                <a href="javascript:void(0);">
                    <h2 class="heading-sm">
                        <i class="icon-custom icon-sm icon-bg-u fa fa-lightbulb-o"></i>
                        <span>{{$exam->examProvider->code}} {{$exam->month->name}} {{$exam->session->name}}</span>
                    </h2>
                </a>
                <p>
                    <strong>Time Allowed: </strong> {{$exam->time_allowed}}<br/>
                    <strong># Questions: </strong> {{count($exam->question)}}<br/>
                    <strong>Total Attempts: </strong> {{count($exam->history)}}<br/>
                    <strong>Average Score: </strong> <br/>
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
@section('pagejs')

@stop