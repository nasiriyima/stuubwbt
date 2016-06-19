@extends('admin_layout')

@section('pagetitle')
SCHOOL MANAGER
@stop
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#list" data-toggle="tab">School List</a></li>
        <li><a href="#active" data-toggle="tab">Add School</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="list">
            @include('admin.school.list')
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