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

                @foreach($news as $newsitem)
                <div class="inner-results">
                        <h3><a href="#">{{$newsitem->title}}</a></h3>
                        <ul class="list-inline down-ul">
                                <li>3 years ago - By Anthon Brandley</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut orci urna. Morbi blandit enim eget risus posuere dapibus. Vestibulum velit nisi, tempus in placerat non, auctor eu purus. Morbi suscipit porta libero, ac tempus tellus consectetur non. Praesent eget consectetur nunc. Aliquam erat volutpat. Suspendisse ultrices eros eros, consectetur facilisis urna posuere id.</p>
                        <ul class="list-inline up-ul">
                                <li><a href="#">Wrapbootstrap</a></li>
                                <li><a href="#">Dribbble</a></li>
                        </ul>
                </div>
                <hr>
                @endforeach

                <div class="margin-bottom-30"></div>

                <div class="text-center">
                        <ul class="pagination">
                                <li><a href="#">«</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">157</a></li>
                                <li><a href="#">158</a></li>
                                <li><a href="#">»</a></li>
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