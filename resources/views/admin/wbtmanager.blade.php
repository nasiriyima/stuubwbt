@extends('admin_layout')

@section('pagetitle')
EXAMINATION RESOURCE MANAGER
@stop
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
@stop
@section('maincontent')
<div class="row">
    <div class="col-md-12">
        <div class="row margin-bottom-20">
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="{{url('admin/exam-manager')}}"><i class="fa fa-question"></i>Exams</a>
                            <span class="badge badge-green rounded-x">{{$examcount}}</span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="{{url('admin/provider-manager')}}"><i class="icon-line icon-pin"></i>Providers</a>
                            <span class="badge badge-green rounded-x">{{$providerscount}}</span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="{{url('admin/category-manager')}}"><i class="icon-line icon-layers"></i>Categories</a>
                            <span class="badge badge-green rounded-x">{{$categorycount}}</span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="{{url('admin/subject-manager')}}"><i class="icon-line icon-note"></i>Subjects</a>
                            <span class="badge badge-green rounded-x">{{$subjectcount}}</span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="{{url('admin/session-manager')}}"><i class="icon-line icon-note"></i>Sessions</a>
                            <span class="badge badge-green rounded-x">{{$sessioncount}}</span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="{{url('admin/month-manager')}}"><i class="icon-line icon-note"></i>Months</a>
                            <span class="badge badge-green rounded-x">{{$monthcount}}</span>
                        </li>
                    </ul>
                </center>
            </div>
        </div>
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Examinations</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="row">
                <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Examination</th>
                            <th class="hidden-sm">Details</th>
                            <th class="hidden-sm">Attempts</th>
                            <th class="hidden-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exams as $exam)
                        <tr>
                            <td>{{$exam->examProvider->code}}, {{$exam->subject->name}} ({{$exam->month->code}} {{$exam->session->name}})</td>
                            <td class="hidden-sm"><center>{{$exam->question->count()}} Questions</center></td>
                            <td>{{$exam->history->count()}}</td>
                            <td><span class="label {{($exam->status == 1)? 'label-success':'label-red'}}">{{($exam->status == 1)? 'Published':'Unpublished'}}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="col-md-5">
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Tickets</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">

                </div>
            </div>
        </div>
    </div>--}}
</div>
@stop
@section('pageplugins')
    <script type="text/javascript" src="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            $(".table").DataTable();

        });
    </script>
@stop