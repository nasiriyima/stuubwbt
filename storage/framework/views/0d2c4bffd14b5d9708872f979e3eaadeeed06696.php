<?php $__env->startSection('pagetitle'); ?>
<?php echo e($exam->examProvider->code); ?>, <?php echo e($exam->subject->name); ?>, <?php echo e($exam->month->code); ?> <?php echo e($exam->session->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/chosen/chosen.min.css')); ?>">
    <div class="row" id="message_div">
    </div>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Profile Edit</a></li>
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
                                            <option value="<?php echo e($provider->id); ?>" <?php echo e(($exam->exam_provider_id == $provider->id)? 'selected':''); ?>><?php echo e($provider->name); ?></option>
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
                                            <option value="<?php echo e($subject->id); ?>" <?php echo e(($exam->subject_id == $subject->id)? 'selected':''); ?>><?php echo e($subject->name); ?></option>
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
                                            <option value="<?php echo e($session->id); ?>" <?php echo e(($exam->session_id == $session->id)? 'selected':''); ?>><?php echo e($session->name); ?></option>
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
                                            <option value="<?php echo e($month->id); ?>" <?php echo e(($exam->month_id == $month->id)? 'selected':''); ?>><?php echo e($month->name); ?></option>
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
                                            <option value="<?php echo e($instruction->id); ?>" <?php echo e(($exam->instruction_id == $instruction->id)? 'selected':''); ?>><?php echo e($instruction->title); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <div class="pull-right">
                            <a href="<?php echo e(url('admin/exam-profile')); ?>/<?php echo e(\Crypt::encrypt($exam->id)); ?>" type="submit" class="btn-u btn-u-red">Cancel</a>
                            <button type="submit" class="btn-u">Update Question Profile</button>
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
<link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageplugins'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.js')); ?>"></script>
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
			$(".table").DataTable();
    CKEDITOR.replace('question');
    // jQuery, bind an event handler or use some other way to trigger ajax call.

    function loadImageFileAsURL()
    {
        var preview = document.querySelector('#img_preview');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    $(".add-info-save").click(function() {
        $("#img_select_preview,#desc_select_preview,#select_preview_title").hide();
        $("#additional_info").append("<option value=''> No additional info </option>");
        if ($(this).val() === "Upload") {
            if ($("input[name=image_description]").val() === "" || $("input[name=image]").val() === "") {
                alert("Please select an image or fill the image description");
                return false;
            }
        }
        if ($(this).val() === "Add") {
            if ($("input[name=text_description]").val() === "" || $("textarea[name=question_description]").val() === "") {
                alert("Please fill the question name or description");
                return false;
            }
        }

        var url = '<?php echo url("wbt/additional-info"); ?>';
        var formData = {
            "_token" : "<?php echo csrf_token(); ?>",
            "image" : $("#img_preview").prop("src"),
            "image_description" : $("input[name=image_description]").val(),
            "text_description" : $("input[name=text_description]").val(),
            "question_name" : $("textarea[name=question_description]").val()
        };

        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            enctype: 'multipart/form-data',
            success: function(informations) {
                $("#additional_info").empty();
                if (formData["image_description"] === "" && formData["text_description"] === "") {
                    $("#additional_info").append("<option value='0'> No additional info </option>");
                };
                $.each(informations, function(key, value) {
                    var id = value["id"];
                    var name = value["name"];
                    var typ = value["information_type_id"];
                    var desc = value["description"];
                    $("#additional_info").append("<option value='" + id + "' data-typ='" + typ + "' data-desc='" + desc + "'>" + name + "</option>");
                });
                if (formData["image_description"] !== "" || formData["text_description"] !== "") {
                    $("#additional_info").append("<option value='0'> No additional info </option>");
                };
                $('.img_button,.text_button').show();$('.text_area,.for_upload').hide();
                $("#add_info").modal("hide");
                $('#file-upload,input[name=image_description],input[name=text_description],textarea[name=question_description]').val('');
                $("#additional_info").trigger("change");
            },
            error: function() {
                console.log("ERROR");
            }
        });
    });

    $("#additional_info").change(function() {
        $("#img_select_preview,#desc_select_preview,#select_preview_title").hide().empty();
        if ($("option:selected", this).attr("data-typ") == 1) {
            var img_id = $('option:selected', this).val();
            var img_ext = $('option:selected', this).attr('data-desc');
            var img_url = '<?php echo asset("storage/additional_info/' + img_id + '.' + img_ext + '"); ?>';
            $("#img_select_preview").prop("src",img_url);
            $("#select_preview_title,#img_select_preview").show();
            $("#select_preview_title").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PREVIEW");
        };
        if ($("option:selected", this).attr("data-typ") == 2) {
            $("#select_preview_title,#desc_select_preview").show();
            $("#select_preview_title").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DESCRIPTION");
            $("#desc_select_preview").append($("option:selected", this).attr("data-desc"));
        };
    });
	function trashexam(){
        $('#message_div').html(
                '<div class="col-md-12">'+
                    '<div class="alert alert-warning fade in text-center">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                        '<h5>You are about to trash <strong><?php echo e($exam->examProvider->code); ?>, <?php echo e($exam->subject->name); ?>, <?php echo e($exam->month->code); ?> <?php echo e($exam->session->name); ?></strong></h5>'+
                        '<h4>DO YOU YOU WANT TO CONTINUE?</h4>'+
                        '<p>'+
                            '<a class="btn-u btn-u-xs btn-u" href="#">No, Cancel</a>'+
                            ' <a class="btn-u btn-u-xs btn-u-red" href="#">Yes, Trash</a>'+
                        '</p>'+
                    '</div>'+
                '</div>');
    }

    function publichexam(){
        //Check Number of Questions != 0
        //Check Each Question has Answer Selected
        var qcount = <?php echo e($exam->question->count()); ?>;
        if(qcount == 0){
            var message = '<strong><?php echo e($exam->examProvider->code); ?>, <?php echo e($exam->subject->name); ?>, <?php echo e($exam->month->code); ?> <?php echo e($exam->session->name); ?></strong>';
        }
        $('#message_div').html(
                '<div class="col-md-12">'+
                '<div class="alert alert-danger fade in text-center">'+
                '<h4>CANNOT PUBLISH EXAM</h4>'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<h5>'+message+'</h5>'+
                '<p>'+
                '<a class="btn-u btn-u-xs btn-u" href="#">No, Cancel</a>'+
                ' <a class="btn-u btn-u-xs btn-u-red" href="#">Yes, Trash</a>'+
                '</p>'+
                '</div>'+
                '</div>');
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>