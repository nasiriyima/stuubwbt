@extends('admin_layout')

@section('pagetitle')
EXAMINATION RESOURCES MANAGER - <small>Providers</small>
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Providers</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row margin-bottom-10">
                <div class="col-md-2 pull-right">
                    <a href="{{url('admin/add-provider')}}" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"><i class="icon-line  icon-education-003"></i> Add New Provider</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Provider Name</th>
                                 <th class="hidden-sm"><center>Examinations</center></th>
                                 <th class="hidden-sm"><center>Subjects</center></th>
                                 <th class="hidden-sm"><center>Average Scores</center></th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($providers as $provider)
                             <tr>
                                 <td>1</td>
                                 <td><a href="#">{{$provider->name}}</a></td>
                                 <td class="hidden-sm"><center>{{$provider->exam->count()}}</center></td>
                                 <td class="hidden-sm"><center>{{$provider->exam->groupBy('subject_id')->count()}}</center></td>
                                 <td></td>
                                 <td></td>
                             </tr>
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