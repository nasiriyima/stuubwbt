@extends('admin_layout')

@section('pagetitle')
SCHOOL PROFILE - <small>{{$school->name}}</small>
@stop
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
@stop
@section('maincontent')
    <div class="row margin-bottom-40">

    </div>
    <div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Expected Grad</th>
                <th>Last Seen</th>
            </tr>
            </thead>
            <tbody>
            {{--*/$count = 1/*--}}
            @foreach($students as $student)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$student->user->first_name}}</td>
                    <td></td>
                    <td>{{$student->user->last_login->format('d M, Y')}} ({{$student->user->last_login->diffForHumans()}})</td>
                </tr>
                {{--*/$count++/*--}}
            @endforeach
            </tbody>
        </table>
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