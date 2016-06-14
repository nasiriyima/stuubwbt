@extends('admin_layout')

@section('pagetitle')
NEWS MANAGEMENT
@stop
@section('maincontent')
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-40">
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="{{url('admin/news-item/add')}}"><i class="icon-line icon-note"></i>Add News</a>
                                <span class="badge badge-green rounded-x"></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="{{url('admin/provider-manager')}}"><i class="fa fa-check-circle-o"></i>Published</a>
                                <span class="badge badge-green rounded-x">{{count($Cnews->publishedNews())}}</span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="{{url('admin/provider-manager')}}"><i class="fa fa-ban"></i>Unpublished</a>
                                <span class="badge badge-yellow rounded-x">{{count($Cnews->unpublishedNews())}}</span>
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
                                    <h2><a href="{{url('admin/news')}}/{{Crypt::encrypt($newsitem->id)}}">{{$newsitem->title}}</a> <span class="badge badge-red rounded-2x">Archive</span></h2>
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