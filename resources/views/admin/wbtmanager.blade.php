@extends('admin_layout')

@section('pagetitle')
EXAMINATION RESOURCE MANAGER
@stop
@section('maincontent')
<div class="row">
    <div class="col-md-7">
        <div class="row margin-bottom-40">
            <div class="col-md-3">
                <a href="{{url('admin/provider-manager')}}">
                    <center>
                        <i class="icon-custom rounded-x icon-bg-grey icon-line  icon-pin"></i><br/>
                        <strong>PROVIDERS</strong>
                    </center>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{url('admin/category-manager')}}">
                    <center>
                        <i class="icon-custom rounded-x icon-bg-grey icon-line icon-layers"></i><br/>
                        <strong>CATEGORIES</strong>
                    </center>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{url('admin/subject-manager')}}">
                    <center>
                        <i class="icon-custom rounded-x icon-bg-grey icon-line icon-note"></i><br/>
                        <strong>SUBJECTS</strong>
                    </center>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{url('admin/exam-manager')}}">
                    <center>
                        <i class="icon-custom rounded-x icon-bg-grey icon-line icon-question"></i><br/>
                        <strong>EXAMINATIONS</strong>
                    </center>
                </a>
            </div>
        </div>
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Published Examinations</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="row">
                <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Examination</th>
                            <th class="hidden-sm">Details</th>
                            <th class="hidden-sm">Attempts</th>
                            <th class="hidden-sm">Published</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>JAMB, Mathematics 2015/16</td>
                            <td class="hidden-sm">50 QNS in 50 Min.</td>
                            <td>20</td>
                            <td><span class="label label-info">3 Months Ago</span></td>
                        </tr>
                    </tbody>
                </table> 
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Statistics</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="main-counters margin-bottom-10">
                        <div class="row">
                                <div class="counters col-md-6 col-sm-6">
                                        <span class="counter">52147</span>
                                        <h4>Examinations</h4>
                                </div>
                                <div class="counters col-md-6 col-sm-6">
                                        <span class="counter">24583</span>
                                        <h4>Questions</h4>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Tickets</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">

                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('pagejs')

@stop