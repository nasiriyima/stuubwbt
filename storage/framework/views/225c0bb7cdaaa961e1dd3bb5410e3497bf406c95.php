<?php $__env->startSection('pagetitle'); ?>
    QUESTION EDIT
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/chosen/chosen.min.css')); ?>">
    <div class="row" id="message_div">
    </div>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Question Edit</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <?php echo $__env->make('admin.addexaminationquestionedit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
			CheckoutForm.initCheckoutForm();
                    });
    CKEDITOR.replace('question');
    addInfoSave();
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

    function addInfoSave() {
        $("#img_select_preview,#desc_select_preview,#select_preview_title").hide();
        $("#additional_info").append("<option value=''> No additional info </option>");
        var url2 = '<?php echo url("wbt/additional-infos"); ?>';
        $.ajax({
            type: 'get',
            url: url2,
            success: function(informations) {
                $("#additional_info").empty();
                $("#additional_info").append("<option value='0'> No additional info </option>");
                var add_info_id = '<?php echo $question->question_additional_information_id; ?>';
                $.each(informations, function(key, value) {
                    var id = value["id"];
                    var name = value["name"];
                    var typ = value["information_type_id"];
                    var desc = value["description"];
                    $("#additional_info").append("<option value='" + id + "' data-typ='" + typ + "' data-desc='" + desc + "'>" + name + "</option>");
                });
                if (add_info_id != 0) {
                    $('select[name="add_info"]').val(add_info_id);
                }else{
                    $('select[name="add_info"]').val(0);
                };
                $("#additional_info").trigger("change");
            },
            error: function() {
                console.log("ERROR");
            }
        });
    }
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>