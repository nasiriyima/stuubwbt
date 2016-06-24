@extends('admin_layout')

@section('pagetitle')
STUDENT MANAGER
@stop
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
@stop
@section('maincontent')
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-10">
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="{{url('admin/news-item/add')}}"><i class="icon-line icon-note"></i>Active Accounts</a>
                                <span class="badge badge-green rounded-x"></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="{{url('admin/provider-manager')}}"><i class="fa fa-check-circle-o"></i>Dormant Accounts</a>
                                <span class="badge badge-green rounded-x"></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="{{url('admin/provider-manager')}}"><i class="fa fa-ban"></i>Unpublished</a>
                                <span class="badge badge-yellow rounded-x"></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="{{url('admin/provider-manager')}}"><i class="fa fa-trash"></i>Thrashed</a>
                                <span class="badge badge-red rounded-x">6</span>
                            </li>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Registered Students</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            @include('admin.student.registered')
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