@extends('admin_layout')

@section('pagetitle')
SYSTEM USER MANAGEMENT
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">System Users</a></li>
        <li><a href="#role" data-toggle="tab">System Roles</a></li>
        <li><a href="#log" data-toggle="tab">Activity Log</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Users Name</th>
                            <th>E-Mail</th>
                            <th>Last Seen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>1</td>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->email}}</td>
                            <td><span class="label label-warning">Expiring</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="role">
            <div class="row">
                <div class="col-md-12">
               
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="log">
            <div class="row">
                <div class="col-md-12">
               
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('pagejs')

@stop