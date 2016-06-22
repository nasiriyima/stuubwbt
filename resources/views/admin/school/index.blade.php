@extends('admin_layout')

@section('pagetitle')
SCHOOL MANAGER
@stop
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
@stop
@section('maincontent')
    @if(isset($message))
        <div class="alert alert-success fade in alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!  </strong>{{$message}}.
        </div>
    @endif
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#list" data-toggle="tab">School List</a></li>
        <li><a href="#add" data-toggle="tab">Add School</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="list">
            @include('admin.school.list')
        </div>
        <div class="tab-pane fade in" id="add">
            @include('admin.school.addschool')
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