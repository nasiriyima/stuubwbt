<?php $__env->startSection('pagetitle'); ?>
<?php echo e($exam->examProvider->code); ?>, <?php echo e($exam->subject->name); ?>, <?php echo e($exam->month->code); ?> <?php echo e($exam->session->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Profile</a></li>
        <li><a href="#addquestion" data-toggle="tab" class="add-info-save">Add Question</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Question</th>
                                 <th class="hidden-sm">Tags</th>
                                 <th class="hidden-sm">Estimated Time</th>
                                 <th class="hidden-sm">Average Time</th>
                                 <th class="hidden-sm">Average Score</th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php /**/$count=1;/**/ ?>
                             <?php foreach($exam->question as $question): ?>
                             <tr>
                                 <td><?php echo e($count); ?></td>
                                 <td><?php echo e($question->name); ?></td>
                                 <td class="hidden-sm">50</td>
                                 <td class="hidden-sm">50</td>
                                 <td class="hidden-sm">50</td>
                                 <td>70%</td>
                                 <td></td>
                             </tr>
                             <?php /**/$count++;/**/ ?>
                             <?php endforeach; ?>
                     </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="addquestion">
            <?php echo $__env->make('admin.addexamination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    CKEDITOR.replace('question');
    // jQuery, bind an event handler or use some other way to trigger ajax call.

    $(".add-info-save").click(function() {

        var url = '<?php echo url("wbt/additional-info"); ?>';
        var formData = $("#add_info_form").serialize();

        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            enctype: 'multipart/form-data',
            success: function(informations) {
                $.each(informations, function(key, value) {
                    $.each(value, function(k, val) {
                        console.log(k, val);
                        if (k === "id") {
                            var id = val;
                        };
                        if (k === "name") {
                            var name = val;
                        };
                        $("#additional_info").append("<option value='" + id + "'>" + name + "</option>");
                    });
                });
            },
            error: function() {
                console.log("ERROR");
            }
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>