<?php $__env->startSection('pagetitle'); ?>
SYSTEM SETTINGS - <small>Email Settings</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab"><?php echo e(strtoupper('Email Notification Settings')); ?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
                    <?php echo Form::open(array('url' => url('email/update-email-settings'),'class'=>'sky-form', 'id'=>'sky-form')); ?>

                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input">
                                        <span>OUTGOING EMAIL ADDRESS</span>
                                        <input type="email" name="outemailaddress" value="<?php echo e(($mailsettings['outgoing_email_address'])?$mailsettings['outgoing_email_address']:''); ?>"/>
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input">
                                        <span>ACCOUNT PASSWORD</span>
                                        <input type="password" name="password" value="<?php echo e($mailsettings['email_password']); ?>"/>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input">
                                        <span>OUTGOING MAIL SERVER</span>
                                        <input type="text" name="server" value="<?php echo e($mailsettings['email_outgoing_server']); ?>"/>
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="input">
                                        <span>PORT</span>
                                        <input type="number" name="port" value="<?php echo e($mailsettings['email_port']); ?>"/>
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <span>ENCRYPTION TYPE</span>
                                        <select name="encrypt-type">
                                            <option value="ssl">SSL</option>
                                            <option value="tls">TLS</option>
                                        </select>
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <footer>
                            <div class="pull-right">
                                <button type="submit" class="btn-u">SAVE SETTINGS</button>
                            </div>
                        </footer>
                    <?php echo Form::close(); ?>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageplugins'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/forms/checkout.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
                        OrderForm.initOrderForm();
			ReviewForm.initReviewForm();
			CheckoutForm.initCheckoutForm();
                    });
    CKEDITOR.replace('texteditor');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>