<?php $__env->startSection('pagecss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/page_contact.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('maincontent'); ?>
    <div class="container content">
    <div class="row margin-bottom-30">
        <div class="col-md-9 mb-margin-bottom-30">
            <div class="headline"><h2>Get in Touch</h2></div>
            <p>
                Accusamus et iusto odio dignissimos <strong class="color-green">ducimus qui blanditiis</strong> praesentium voluptatum deleniti atque corrupti quos dolores et quas feugiat. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing <strong class="color-green">elit landitiis</strong>. Quidem re
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
                <li><a href="#"><i class="fa fa-phone"></i>1(222) 5x86 x97x</a></li>
                <li><a href="#"><i class="fa fa-home"></i>5B Streat, City 50987 New Town US</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i>info@example.com</a></li>
                <li><a href="#"><i class="fa fa-phone"></i>1(222) 5x86 x97x</a></li>
                <li><a href="#"><i class="fa fa-globe"></i>http://www.example.com</a></li>
            </ul>
        </div><!--/col-md-3-->
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/gmap/gmap.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/app.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/forms/contact.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/pages/page_contacts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')); ?>"></script>
<script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            ContactPage.initMap();
            ContactForm.initContactForm();
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>