@extends('admin_layout')

@section('pagetitle')
EXAMINATION RESOURCES MANAGER - <small>Examination</small>
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examinations</a></li>
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
                                 <th class="hidden-sm"><center>Average Scores</center></th>
                                 <th class="hidden-sm">Published</th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>1</td>
                                 <td><a href="#">JAMB, Mathematics 2015/16</a></td>
                                 <td class="hidden-sm"><center>50</center></td>
                                 <td><center>70%</center></td>
                                 <td><span class="label label-info">3 Months Ago</span></td>
                                 <td>3 Months Ago</td>
                             </tr>
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