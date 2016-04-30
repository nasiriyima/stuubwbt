@extends('admin_layout')

@section('pagetitle')
EXAMINATION RESOURCES MANAGER - <small>Question Management</small>
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">JAMB Mathematics, May 2015</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row margin-bottom-10">
                <div class="col-md-2 pull-right">
                    <a href="{{url('admin/add-exam')}}" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"><i class="icon-line  icon-education-003"></i> Add Question</a>                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Question</th>
                                 <th class="hidden-sm"><center>Tags</center></th>
                                 <th class="hidden-sm"><center>Estimated Time</center></th>
                                 <th class="hidden-sm">Average Time</th>
                                 <th class="hidden-sm">Average Score</th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>1</td>
                                 <td>If it takes ten men to dig a whole......</td>
                                 <td class="hidden-sm"><center>50</center></td>
                                 <td class="hidden-sm"><center>50</center></td>
                                 <td class="hidden-sm"><center>50</center></td>
                                 <td><center>70%</center></td>
                                 <td></td>
                             </tr>
                         </tbody>
                     </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop