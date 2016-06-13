<?php $__env->startSection('pagetitle'); ?>
EXAMINATION RESOURCES MANAGER - <small>Add Examination</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Options</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
                            <?php echo Form::open(array('url' => url('wbt/add-examination'),'class'=>'sky-form', 'id'=>'sky-form')); ?>

                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <span>EXAM PROVIDER</span>
                                        <select name="provider">
                                            <option value="0" selected disabled>Exam Provider</option>
                                            <?php foreach($providers as $provider): ?>
                                            <option value="<?php echo e($provider->id); ?>"><?php echo e($provider->name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <span>EXAM SUBJECT</span>
                                        <select name="subject_id" class="select">
                                            <option value="0" selected disabled>Exam Subject</option>
                                            <?php foreach($subjects as $subject): ?>
                                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="input">
                                        <span>TOTAL TIME ALLOWED</span>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="hr" placeholder="Hr.">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="min" placeholder="Min.">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="sec" placeholder="Sec.">
                                            </div>
                                        </div>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <span>EXAM YEAR</span>
                                        <select name="session_id" class="select">
                                            <option value="0" selected disabled>Exam Year</option>
                                            <?php foreach($sessions as $session): ?>
                                            <option value="<?php echo e($session->id); ?>"><?php echo e($session->name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <span>EXAM MONTH</span>
                                        <select name="month_id">
                                            <option value="0" selected disabled>Exam Month</option>
                                            <?php foreach($months as $month): ?>
                                            <option value="<?php echo e($month->id); ?>"><?php echo e($month->name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                 </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <span>INSTRUCTION</span>
                                        <select name="instruction" class="select">
                                            <option value="0" selected disabled>Exam Instruction</option>
                                            <?php foreach($instructions as $instruction): ?>
                                            <option value="<?php echo e($instruction->id); ?>"><?php echo e($instruction->title); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <footer>
                            <div class="pull-right">
                                <button type="submit" class="btn-u">Save and Add Questions</button>
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
<script type="text/javascript">
    jQuery(document).ready(function() {
                        OrderForm.initOrderForm();
			ReviewForm.initReviewForm();
			CheckoutForm.initCheckoutForm();
                    });
//    CKEDITOR.replace('texteditor');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>