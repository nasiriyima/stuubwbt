@extends('web_layout')

@section('maincontent')
        <div class="container content">
                <div class="title-box-v2">
                        <h2>About <span class="color-green">STUUB</span></h2>
                        <p>
                                At Stuub Agency, we recruit students for renowned universities in Turkey.
                                Our expertise in students’ recruitment has given these higher institutions
                                we partner with the luxury of focusing on university administration and instructing
                                while we run point on promoting and creating awareness for their brands. We do this
                                through organizing school fairs and exclusive presentations at various high schools across Nigeria.
                                These methods have fetched us the desired result, thus making us stand out amongst our competitors.
                                In the 2014/14 session fall semester, we have recruited over 30 students for Bahcesehir University
                                Istanbul and Bilgi University Istanbul into various programs such as Engineering, Medicine,
                                Business Administration and loads more. Our relationship with the recruited students doesn’t end in
                                getting them admissions into these universities, we also assisted them in processing their visas into
                                Turkey at the Turkish Consulate in Abuja and accommodation when they reached there.
                                This shows that we are determined to keep our word on Customer Relations.
                        </p>
                </div>
                <div class="row">
                        <div class="col-md-6">
                                <div class="banner-info dark margin-bottom-10">
                                        <i class="rounded-x icon-bell"></i>
                                        <div class="overflow-h">
                                                <h3>Our mission</h3>
                                                <p>
                                                        To create sustainable growth through superior customer service, conceptualization and commitment.
                                                </p>
                                        </div>
                                </div>
                                <div class="banner-info dark margin-bottom-10">
                                        <i class="rounded-x fa fa-magic"></i>
                                        <div class="overflow-h">
                                                <h3>Our vision</h3>
                                                <p>
                                                        To be a premier in providing agency services to individuals and organizations alike
                                                        while maximizing returns to our stakeholders and maintaining our integrity.
                                                </p>
                                         </div>
                                </div>
                                <div class="margin-bottom-20"></div>
                        </div>
                        <div class="col-md-6">
                                <div class="banner-info dark margin-bottom-10">
                                        <i class="rounded-x fa fa-magic"></i>
                                        <div class="overflow-h">
                                                <h3>Our Partners</h3>
                                                <p>
                                                        Some of the schools STUUB Agency deals with include:
                                                </p>
                                        </div>
                                </div>
                                <div style="margin-left: 20px;">
                                        <ul class="list-unstyled">
                                                <li><i class="fa fa-check color-green"></i> Bachesehir University Istanbul</li>
                                                <li><i class="fa fa-check color-green"></i> Istanbul Bilgi University</li>
                                                <li><i class="fa fa-check color-green"></i> Sabanci University Istanbul</li>
                                                <li><i class="fa fa-check color-green"></i> Okan University Istanbul</li>
                                                <li><i class="fa fa-check color-green"></i> Eastern Washington University</li>
                                        </ul><br />
                                </div>
                        </div>
                </div>
        </div>
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