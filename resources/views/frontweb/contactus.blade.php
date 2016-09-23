@extends('web_layout')
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/css/pages/page_contact.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
@stop

@section('maincontent')
    <div class="container content">
    <div class="row margin-bottom-30">
        <div class="col-md-9 mb-margin-bottom-30">
            <div class="headline"><h2>Get in Touch</h2></div>
            <p>
                
            </p>
            <form action="assets/php/sky-forms-pro/demo-contacts-process.php" method="post" id="sky-form3" class="sky-form contact-style">
                <fieldset class="no-padding">
                    <label>Name <span class="color-red">*</span></label>
                    <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                            <div>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <label>Email <span class="color-red">*</span></label>
                    <div class="row sky-space-20">
                        <div class="col-md-7 col-md-offset-0">
                            <div>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                        </div>
                    </div>

                    <label>Message <span class="color-red">*</span></label>
                    <div class="row sky-space-20">
                        <div class="col-md-11 col-md-offset-0">
                            <div>
                                <textarea rows="8" name="message" id="message" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <p><button type="submit" class="btn-u">Send Message</button></p>
                </fieldset>

                <div class="message">
                    <i class="rounded-x fa fa-check"></i>
                    <p>Your message was successfully sent!</p>
                </div>
            </form>
        </div><!--/col-md-9-->

        <div class="col-md-3">
            <!-- Google Map -->
            <div id="map" class="map map-box map-box-space1 margin-bottom-40">
            </div><!---/map-->
            <!-- End Google Map -->

            <div class="headline"><h2>Contacts</h2></div>
            <ul class="list-unstyled who margin-bottom-30">
                <li><a href="#"><i class="fa fa-home"></i>Suite 102 APC Plaza, 12 Cape town street, Wuse Zone 4, Abuja - Nigeria </a></li>
                <li><a href="#"><i class="fa fa-phone"></i>(+234) 081-5734-0545 </a></li>
                <li><a href="#"><i class="fa fa-home"></i>Hakki Yeten Caddesi Selenium Plaza
No. 10/C K5/6 Besiktas
Istanbul, Turkey </a></li>
                <li><a href="#"><i class="fa fa-envelope"></i>admissions@stuub.com</a></li>
                <li><a href="#"><i class="fa fa-phone"></i>(+90) 212-381-8723 </a></li>
            </ul>
        </div><!--/col-md-3-->
    </div>
    </div>
@stop
@section('pagejs')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{ asset('public/assets/plugins/gmap/gmap.js')}}"></script>

    <script type="text/javascript" src="{{ asset('public/assets/js/app.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/forms/contact.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/pages/page_contacts.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            ContactPage.initMap();
            ContactForm.initContactForm();
        });
</script>
@stop
