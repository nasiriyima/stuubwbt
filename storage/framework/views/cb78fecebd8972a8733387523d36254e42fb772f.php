<?php $__env->startSection('pagetitle'); ?>
NEWS MANAGEMENT - <small>ADD NEWS ITEM</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <?php echo Form::open(array('url' => url('admin/add-news'),'class'=>'sky-form', 'id'=>'sky-form')); ?>

    <fieldset>
        <div class="row">
            <div class="col-md-12">
                <section>
                    <label class="input">
                        <span>NEWS TITLE</span>
                        <input rows="2" name="title" placeholder="NEWS TITLE"  ></input>
                    </label>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <section>
                    <label class="textarea">
                        <span>NEWS CAPTION</span>
                        <textarea rows="2" name="caption" placeholder="NEWS CAPTION" ></textarea>
                    </label>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <section>
                    <label class="textarea">
                        <span>NEWS BODY</span>
                        <textarea rows="2" name="body" placeholder="Question Text" id="question" ></textarea>
                    </label>
                </section>
            </div>
        </div>
    </fieldset>
    <footer>
        <div class="pull-right">
            <button type="submit" class="btn-u">Save</button>
        </div>
    </footer>
    <?php echo Form::close(); ?>

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
        CKEDITOR.replace('question');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>