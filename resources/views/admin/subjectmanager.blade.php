@extends('admin_layout')

@section('pagetitle')
EXAMINATION RESOURCES MANAGER - <small>Subjects</small>
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Subjects</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row margin-bottom-10">
                <div class="col-md-2 pull-right">
                    <a href="{{url('admin/add-exam')}}" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"><i class="icon-line  icon-education-003"></i> Add New Subject</a>                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Subject Name</th>
                                 <th class="hidden-sm"><center># Examinations</center></th>
                                 <th class="hidden-sm"><center>Average Scores</center></th>
                                 <th class="hidden-sm">Published</th>
                             </tr>
                         </thead>
                         <tbody>
                             {{--*/$count=1;/*--}}
                             @foreach($subjects as $subject)
                             <tr>
                                 <td>{{$count}}</td>
                                 <td><a href="{{url('admin/subject-exams')}}/{{\Crypt::encrypt($subject->id)}}">{{$subject->name}}</a></td>
                                 <td class="hidden-sm"><center>{{count($subject->exam)}}</center></td>
                                 <td><center></center></td>
                                 <td><span class="label label-info">3 Months Ago</span></td>
                             </tr>
                             {{--*/$count++;/*--}}
                             @endforeach
                         </tbody>
                     </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('pagejs')

@stop