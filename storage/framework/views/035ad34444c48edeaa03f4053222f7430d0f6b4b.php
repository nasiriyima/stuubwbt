<?php $__env->startSection('pagetitle'); ?>
<?php echo e($exam->examProvider->code); ?>, <?php echo e($exam->subject->name); ?>, <?php echo e($exam->month->code); ?> <?php echo e($exam->session->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/chosen/chosen.min.css')); ?>">
	<div class="row">
        <div class="col-md-6">
            <div class="row margin-bottom-10">
                <div class="col-md-6">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-question"></i>Questions</a>
                                <span class="badge badge-green rounded-x"><?php echo e($exam->question->count()); ?></span>
                            </li>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-5 margin-top-20">
            <a href="javascript:void(0);" onclick="trashexam()"><i class="fa fa-3x fa-trash pull-right"></i></a>
            <a href="<?php echo e(url('admin/exam-profile')); ?>/<?php echo e(\Crypt::encrypt($exam->id)); ?>/edit" onclick="editexam()"><i class="fa fa-3x fa-edit pull-right"></i></a>
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
                                     <a href="<?php echo e(url('admin/exam-question-edit')); ?>/<?php echo e(\Crypt::encrypt($question->id)); ?>"><i class="fa fa-edit"></i> Edit|</a>
                                     <a href="javascript:void(0)" onclick="showDeleteModal('<?php echo e($question->id); ?>');"><i class="fa fa-trash"></i> Delete</a>                                 </td>
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
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="alert alert-danger fade in">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Warning !</h4>
            <p>You are about to delete a question from an examination, are you sure you will like to delete selected Item?</p>
            <input type="hidden" name="delete_question_id" value="" />
            <p>
                <a class="btn-u btn-u-red" href="javascript:deleteQuestion()">Continue</a>
                <a class="btn-u btn-u-sea" href="javascript:void(0)" data-dismiss="modal">Cancel</a>
            </p>
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

    function showDeleteModal(delQueId){
        $("input[name=delete_question_id]").val(delQueId);
        $("#deletemodal").modal("show");
    }
    function deleteQuestion(){

        var formdata = new Object();
        formdata.question_id = $("input[name=delete_question_id]").val();
        formdata.exam_id = $("input[name=examid]").val();
        formdata._token = "<?php echo csrf_token(); ?>";
        $.ajax({
            url: "<?php echo url('wbt/delete-exam-question'); ?>",
            data: formdata,
            method:"post",
            success:function(response){
                var obj = JSON.parse(response);
                window.location = obj.url;
            }
        });
    }

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
        var qcount = '<?php echo e($exam->question->count()); ?>';
        if(qcount == 0){
            var message = 'Add Examination Question(s) Before Publishing';
            $('#message_div').html(
                    '<div class="col-md-12">'+
                    '<div class="alert alert-danger fade in text-center">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    '<h4>CANNOT PUBLISH EXAM</h4>'+
                    '<h5>'+message+'</h5>'+
                    '</div>'+
                    '</div>');
        }else{
            $.ajax({
                url: '<?php echo e(url("admin/publish-exam")); ?>',
                method: 'POST',
                data:{
                    _token:'<?php echo e(csrf_token()); ?>',
                    exam: '<?php echo e($exam->id); ?>'
                },
                success:function(response){
                    $('#message_div').html(
                            '<div class="col-md-12">'+
                            '<div class="alert alert-succes fade in text-center">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                            '<h4>Exam Was Successfully Published</h4>'+
                            '</div>'+
                            '</div>');
                },
                error:function(){

                }
            });

        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>