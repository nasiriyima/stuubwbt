@extends('web_layout')

@section('maincontent')
        <!--=== Content Part ===-->
        <div class="container content-sm">
                <!-- Service Blocks -->
                <div class="row margin-bottom-30">
                        <div class="col-md-12">
                                <div class="service">
                                        <i class="fa fa-compress service-icon"></i>
                                        <div class="desc">
                                                <h4>Activate Account</h4>
                                                <br/>
                                                <p>Dear {{$user->first_name}} {{$user->last_name}},</p>
                                                <p>Thank you for Registration on STUUB WBT. A confirmation email has being sent to <strong>{{$user->email}}</strong> with an activation code to complete your registration.
                                                Copy and paste the activation code the the text box below to complete your registration.
                                                </p>
                                                <p>
                                                    {!! Form::open(array('url' => url('auth/account-activation'), 'method'=>'POST')) !!}
                                                    <input type="hidden" name="user" value="{{\Crypt::encrypt($user->id)}}"/>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="activationcode">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-primary" type="submit">Activate</button>
                                                            </span>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </p>
                                                <p>If you didn't receive activation code, <a href="#">CLICK HERE</a> resend</p>
                                        </div>
                                </div>
                        </div>
                </div>
        </div><!--/container-->
        <!-- End Content Part -->
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