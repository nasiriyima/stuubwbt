<?php $__env->startSection('pagetitle'); ?>
<?php echo e($exam->examProvider->code); ?>, <?php echo e($exam->subject->name); ?>, <?php echo e($exam->month->code); ?> <?php echo e($exam->session->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="row margin-bottom-10">
                <div class="col-md-6">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="<?php echo e(url('admin/news-item/add')); ?>"><i class="fa fa-question"></i>Questions</a>
                                <span class="badge badge-green rounded-x"><?php echo e($exam->question->count()); ?></span>
                            </li>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-5 margin-top-20">
            <a href="javascript:void(0);" onclick="trashexam()"><i class="fa fa-3x fa-trash pull-right"></i></a>
            <a href="javascript:void(0);" onclick="editexam()"><i class="fa fa-3x fa-edit pull-right"></i></a>
            <?php if($exam->status == 1): ?>
            <a href="javascript:void(0);" onclick="unpublishexam()"><i class="fa fa-3x fa-ban pull-right"></i></a>
            <?php endif; ?>
            <?php if($exam->status==0): ?>
            <a href="javascript:void(0);" onclick="publichexam()"><i class="fa fa-3x fa-check pull-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row" id="message_div">
    </div>
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
                                 <th class="hidden-sm">Answer</th>
                                 <th class="hidden-sm">Info</th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php /**/$count=1;/**/ ?>
                             <?php foreach($exam->question as $question): ?>
                             <tr>
                                 <td><?php echo e($count); ?></td>
                                 <td><?php echo implode(' ', array_slice(explode(' ', $question->name), 0, 20)); ?></td>
                                 <td class="hidden-sm">50</td>
                                 <td>
                                     <?php echo e(($question->question_additional_information_id)? $question->questionAdditionalInformation->name:' '); ?>

                                 </td>
                                 <td>
                                     <i class="fa fa-edit"></i>
                                     <i class="fa fa-trash"></i>
                                 </td>
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
                $.each(informations, function(key, value) {
                    var id = value["id"];
                    var name = value["name"];
                    $("#additional_info").append("<option value='" + id + "'>" + name + "</option>");
                });
                $('.img_button,.text_button').show();$('.text_area,.for_upload').hide();
                $("#add_info").modal("hide");
                $('#file-upload,input[name=image_description],input[name=text_description],textarea[name=question_description]').val('');
            },
            error: function() {
                console.log("ERROR");
            }
        });
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