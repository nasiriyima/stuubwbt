@extends('admin_layout')

@section('pagetitle')
NEWS MANAGEMENT
@stop
@section('maincontent')
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-40">
                <div class="col-md-6">
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>Published</a>
                            <span class="badge badge-red rounded-x">3</span>
                        </li>
                        <li>
                            <a class="rounded" href="#"><i class="fa fa-cog"></i>Settings</a>
                            <span class="badge badge-blue">7</span>
                        </li>
                        <li>
                            <a class="rounded-2x" href="#"><i class="fa fa-gift"></i>Bounces</a>
                            <span class="badge badge-dark rounded-x">5</span>
                        </li>
                        <li>
                            <a  class="rounded-3x" href="#"><i class="fa fa-exclamation-triangle"></i>Alerts</a>
                            <span class="badge badge-yellow rounded">2</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 pull-right">
                    <a href="{{url('admin/news-item/add')}}">
                        <center>
                            <i class="icon-custom rounded-x icon-bg-grey icon-line  icon-plus"></i><br/>
                            <strong>ADD NEWS</strong>
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
                        <div class="row">
                            <div class="col-sm-12 news-v3">
                                <div class="news-v3-in-sm no-padding">
                                    <ul class="list-inline posted-info">
                                        <li>By {{$newsitem->user->first_name}} {{$newsitem->user->last_name}}</li>
                                        <li>Posted {{$newsitem->created_at->format('F d, Y' )}}</li>
                                    </ul>
                                    <h2><a href="{{url('')}}">{{$newsitem->title}}</a><span class="label label-default">test</span></h2>
                                    <p>{{$newsitem->caption}}</p>
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