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
                </div>
        </div>
        <div class="container">
                <div class="news-v3 bg-color-white margin-bottom-30">
                        <div class="news-v3-in">
                                <ul class="list-inline posted-info">
                                        <li>By {{$newsitem->user->first_name}} {{$newsitem->user->last_name}}</li>
                                        <li>Posted {{$newsitem->created_at->format('F d, Y' )}}</li>
                                </ul>
                                <h2>{{$newsitem->title}}</h2>
                                {!! $newsitem->post !!}
                        </div>
                </div>
        </div>
        <br/>
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