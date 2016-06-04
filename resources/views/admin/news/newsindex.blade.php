@extends('admin_layout')

@section('pagetitle')
NEWS MANAGEMENT
@stop
@section('maincontent')
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-40">
                <div class="col-md-3">
                    <a href="{{url('admin/news-item/add')}}">
                        <center>
                            <i class="icon-custom rounded-x icon-bg-grey icon-line  icon-pin"></i><br/>
                            <strong>ADD NEWS</strong>
                        </center>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('admin/category-manager')}}">
                        <center>
                            <i class="icon-custom rounded-x icon-bg-grey icon-line icon-layers"></i><br/>
                            <strong>UNPUBLISHED</strong>
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
            <div class="margin-bottom-20"><hr></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="tab-content">
            @foreach($news as $key => $group)
                <div class="tab-pane fade in {{ ($key+1 == 1)? 'active': '' }}" id="page-{{ $key+1 }}">
                    @foreach($group as $newsitem)
                        <div class="row margin-bottom-20">
                            <div class="col-sm-12 news-v3">
                                <div class="news-v3-in-sm no-padding">
                                    <ul class="list-inline posted-info">
                                        <li>By {{$newsitem->user->first_name}} {{$newsitem->user->last_name}}</li>
                                        <li>Posted {{$newsitem->created_at->format('F d, Y' )}}</li>
                                    </ul>
                                    <h2><a href="#">{{$newsitem->title}}</a></h2>
                                    <p>{{$newsitem->caption}}</p>
                                    <ul class="post-shares">
                                        <li><a href="#"><i class="rounded-x icon-pencil"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix margin-bottom-20"><hr></div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="text-center">
            <ul class="pagination">
                <li><a href="#page-1" data-toggle="tab">&laquo;</a></li>
                @for($x=1;$x<=count($news);$x++)
                    <li class="($x==1)?'active': '';"><a href="#page-{{$x}}" data-toggle="tab">{{ $x }}</a></li>
                @endfor
                <li><a href="#page-{{ count($news) }}" data-toggle="tab">&raquo;</a></li>
            </ul>
        </div>

    </div>
@stop
@section('pagejs')

@stop