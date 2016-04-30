@extends('student_layout')

@section('pagecss')
@stop

@section('pagetitle')
MY DASHBOARD
@stop

@section('maincontent')
<div class="row">
    <div class="col-md-8">
        
    </div>
    <div class="col-md-4">
       <div class="panel-heading-v2 overflow-h">
        <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i> My Progress</h2>
        </div>
        <h3 class="heading-xs">Profile Update <span class="pull-right">92%</span></h3>
        <div class="progress progress-u progress-xxs">
                <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                </div>
        </div>
        <h3 class="heading-xs">JAMB <span class="pull-right">92%</span></h3>
        <div class="progress progress-u progress-xxs">
                <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                </div>
        </div>
        <h3 class="heading-xs">WEAC <span class="pull-right">85%</span></h3>
        <div class="progress progress-u progress-xxs">
                <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-blue">
                </div>
        </div>
        <h3 class="heading-xs">NECO <span class="pull-right">64%</span></h3>
        <div class="progress progress-u progress-xxs margin-bottom-40">
                <div style="width: 64%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="64" role="progressbar" class="progress-bar progress-bar-dark">
                </div>
        </div>
        <hr>
    </div>
</div>


@stop
@section('pagejs')
<script type="text/javascript">
    var subjectsurl = "{!! url('student/subjects') !!}";
    var sessionsurl = "{!! url('student/session') !!}";
    var csrf = "{!! csrf_token() !!}";
</script>
<script type="text/javascript" src="{{ asset('public/assets/js/custom.js') }}"></script>
@stop