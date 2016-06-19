@extends('admin_layout')

@section('pagetitle')
STUDENT MANAGER
@stop
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Registered Students</a></li>
        <li><a href="#active" data-toggle="tab">Active Accounts</a></li>
        <li><a href="#" data-toggle="tab">In Active Accounts</a></li>
        <li><a href="#" data-toggle="tab">Non Activated Accounts</a></li>
        <li><a href="#" data-toggle="tab">Disabled Account</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            @include('admin.student.registered')
        </div>
        <div class="tab-pane fade in" id="active">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Last Seen</th>
                            <th>Profile</th>
                            <th>School</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            {{--*/
                            $profileStats = ($student->profile)?
                            $student->profile()->statistics() : 0;
                            /*--}}

                            <tr>
                                <td>1</td>
                                <td>
                                    <a href="{{url('admin/student-profile')}}/{{\Crypt::encrypt($student->id)}}">
                                        {{$student->first_name}}
                                        ({{$student->email}})
                                    </a>
                                </td>
                                <td>{{$student->created_at->format('d-M-Y')}} ({{$student->created_at->diffForHumans()}})</td>
                                <td>
                                    <div class="progress progress-u progress-xxs">
                                        <span class="progress-bar {{($profileStats < 30)? 'progress-bar-red':($profileStats < 70)? 'progress-bar-warning':'progress-bar-success'}}" style="width: {{$profileStats}}%">
                                        </span>
                                    </div>
                                </td>
                                <td>
                                </td>
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
@section('pageplugins')
<script type="text/javascript" src="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        $(".table").DataTable();

    });
</script>

@stop