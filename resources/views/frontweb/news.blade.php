@extends('web_layout')
@section('pagecss')
        <link rel="stylesheet" href="{{ asset('public/assets/css/pages/page_search_inner.css')}}">
@stop
@section('maincontent')
        <!--=== Breadcrumbs ===-->
        <div class="breadcrumbs">
                <div class="container">
                        <h1 class="pull-left">News</h1>
                        <ul class="pull-right breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">News</li>
                        </ul>
                </div><!--/container-->
        </div>
        <br/><!--/breadcrumbs-->
        <div class="container s-results margin-bottom-50">
                <div class="tab-content">
                        @foreach($news as $key => $group)
                        <div class="tab-pane fade in {{ ($key+1 == 1)? 'active': '' }}" id="page-{{ $key+1 }}">
                                @foreach($group as $newsitem)
                                <div class="inner-results">
                                        <h3><a href="#">{{$newsitem->title}}</a></h3>
                                        <p>{{$newsitem->caption}}</p>
                                        <ul class="list-inline down-ul">
                                                <li>{{$newsitem->created_at->diffForHumans()}} - By {{$newsitem->user->first_name}} {{$newsitem->user->last_name}}</li>
                                        </ul>
                                        <br/>
                                        <a href="{{url('web/news')}}/{{\Crypt::encrypt($newsitem->id)}}" class="btn-u btn-u-dark-blue">Read More</a>
                                </div>
                                <hr>
                                @endforeach
                        </div>
                        @endforeach
                </div>
                <div class="margin-bottom-30"></div>

                <div class="text-center">
                        <ul class="pagination">
                                <li><a href="#page-1" data-toggle="tab">&laquo;</a></li>
                                @for($x=1;$x<=count($news);$x++)
                                        <li class="($x==1)?'active': '';"><a href="#page-{{$x}}" data-toggle="tab">{{ $x }}</a></li>
                                @endfor
                                <li><a href="#page-{{ count($news) }}" data-toggle="tab">&raquo;</a></li>
                        </ul>
                </div>
        </div><!--/container-->
@stop
@section('pagejs')
<script type="text/javascript" src="{{ asset('public/assets/plugins/counter/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/counter/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/owl-carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/style-switcher.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/parallax-slider.js')}}"></script>
<script type="text/javascript">
        jQuery(document).ready(function() {
                App.init();
                OwlCarousel.initOwlCarousel();
                App.initCounter();
                StyleSwitcher.initStyleSwitcher();
                ParallaxSlider.initParallaxSlider();
        });
</script>
@stop