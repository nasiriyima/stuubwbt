@extends('admin_layout')

@section('pagetitle')
STUDENT MANAGER
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Registered Students</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>1</td>
                            <td><a href="{{url('admin/student-profile')}}/{{\Crypt::encrypt($student->id)}}">{{$student->first_name}}</a></td>
                            <td>{{$student->email}}</td>
                            <td><span class="label label-warning">Expiring</span></td>
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