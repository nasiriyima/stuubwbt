@extends('admin_layout')

@section('pagetitle')
NEWS MANAGEMENT - <small>{{$newsitem->title}}</small>
@stop
@section('maincontent')
        <div class="news-v3 bg-color-white margin-bottom-30">
            <div class="news-v3-in">
                <ul class="list-inline badge-lists badge-icons margin-bottom-30 pull-right">
                    <li>
                        <a href="#"><i class="fa fa-edit"></i></a>
                        <span class="badge badge-yellow rounded-x"></span>
                    </li>
                    @if($newsitem->status == 1)
                    <li>
                        <a href="#"><i class="fa fa-ban"></i></a>
                        <span class="badge badge-yellow rounded-x"></span>
                    </li>
                    @endif
                    @if($newsitem->status == 0)
                    <li>
                        <a href="javascript:void();" onclick="publishnewsitem('{{Crypt::encrypt($newsitem->id)}}')"><i class="fa fa-check-circle-o"></i></a>
                        <span class="badge badge-yellow rounded-x"></span>
                    </li>
                    @endif
                    <li>
                        <a href="#"><i class="fa fa-trash"></i></a>
                        <span class="badge badge-yellow rounded-x"></span>
                    </li>
                </ul>
                <ul class="list-inline posted-info">
                    <li><strong>By</strong> {{$newsitem->user->first_name}} {{$newsitem->user->last_name}}</li>
                    <li><strong>Posted</strong> {{$newsitem->created_at->format('F d, Y' )}}</li>
                </ul>
                <h2>{{$newsitem->title}}
                    @if($newsitem->status == 0)
                    <span class="badge badge-yellow rounded-2x">Unpublished</span>
                    @endif
                    @if($newsitem->status == 1)
                        <span class="badge badge-green rounded-2x">Published</span>
                    @endif
                </h2>
                <p>{{$newsitem->caption}}</p>
                {!! $newsitem->post !!}
            </div>
        </div>
@stop
@section('pagecss')
@stop
@section('pageplugins')
    <script type="text/javascript">
        function publishnewsitem(id){
            
        }
    </script>
@stop