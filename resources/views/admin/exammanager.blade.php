@extends('admin_layout')
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
@stop
@section('pagetitle')
EXAMINATION RESOURCES MANAGER - <small>Examination</small>
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">All Entries</a></li>
        <li class=""><a href="#published" data-toggle="tab">Published</a></li>
        <li class=""><a href="#unpublished" data-toggle="tab">Unpublished</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row margin-bottom-10">
                <div class="col-md-2 pull-right">
                    <a href="{{url('admin/add-exam')}}" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"><i class="icon-line  icon-education-003"></i> Add Exam</a>                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Examination</th>
                                 <th class="hidden-sm"><center>Questions</center></th>
                                 <th># Attempts</th>
                                 <th class="hidden-sm"><center>Average Scores</center></th>
                                 <th class="hidden-sm">Status</th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                            {{--*/$count = 1/*--}}
                             @foreach($exams as $exam)
                             <tr>
                                 <td>{{$count}}</td>
                                 <td><a href="{{url('admin/exam-profile')}}/{{\Crypt::encrypt($exam->id)}}">{{$exam->examProvider->code}}, {{$exam->subject->name}} ({{$exam->month->code}} {{$exam->session->name}})</a></td>
                                 <td class="hidden-sm"><center>{{$exam->question->count()}}</center></td>
                                 <td><center>{{$exam->history->count()}}</center></td>
                                 <td><center></center></td>
                                 <td><span class="label {{($exam->status == 1)? 'label-success':'label-red'}}">{{($exam->status == 1)? 'Published':'Unpublished'}}</span></td>
                                 <td></td>
                             </tr>
                             {{--*/$count++/*--}}
                             @endforeach
                         </tbody>
                     </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="published">
        </div>
        <div class="tab-pane fade in" id="unpublished">
            
        </div>
    </div>
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