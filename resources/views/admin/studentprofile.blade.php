@extends('admin_layout')
@section('pagecss')
@stop
@section('pagetitle')
{{$student->first_name}} {{$student->last_name}}
@stop
@section('maincontent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="tab-v1">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                            <li><a href="#profile" data-toggle="tab">Examination History</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="profile">
                                {{--<div class="row">
                                    <img class="rounded-x" src="{{asset('public/assets/img/testimonials/img1.jpg')}}" alt="" width="80px">
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
@section('pagejs')

@stop