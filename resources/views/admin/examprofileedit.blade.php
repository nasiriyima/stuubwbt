@extends('admin_layout')

@section('pagetitle')
{{$exam->examProvider->code}}, {{$exam->subject->name}}, {{$exam->month->code}} {{$exam->session->name}}
@stop
@section('maincontent')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/chosen/chosen.min.css') }}">
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
                    {!! Form::open(array('url' => url('wbt/add-examination'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
                    <fieldset>
                        <div class="row">
                            <section class="col col-4">
                                <label class="select">
                                    <span>EXAM PROVIDER</span>
                                    <select name="provider">
                                        <option value="0" selected disabled>Exam Provider</option>
                                        @foreach($providers as $provider)
                                            <option value="{{$provider->id}}" {{($exam->exam_provider_id == $provider->id)? 'selected':''}}>{{$provider->name}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="select">
                                    <span>EXAM SUBJECT</span>
                                    <select name="subject_id" class="select">
                                        <option value="0" selected disabled>Exam Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}" {{($exam->subject_id == $subject->id)? 'selected':''}}>{{$subject->name}}</option>
                                        @endforeach
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
                                        @foreach($sessions as $session)
                                            <option value="{{$session->id}}" {{($exam->session_id == $session->id)? 'selected':''}}>{{$session->name}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="select">
                                    <span>EXAM MONTH</span>
                                    <select name="month_id">
                                        <option value="0" selected disabled>Exam Month</option>
                                        @foreach($months as $month)
                                            <option value="{{$month->id}}" {{($exam->month_id == $month->id)? 'selected':''}}>{{$month->name}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </section>
                            <section class="col col-4">
                                <label class="select">
                                    <span>INSTRUCTION</span>
                                    <select name="instruction" class="select">
                                        <option value="0" selected disabled>Exam Instruction</option>
                                        @foreach($instructions as $instruction)
                                            <option value="{{$instruction->id}}" {{($exam->instruction_id == $instruction->id)? 'selected':''}}>{{$instruction->title}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <div class="pull-right">
                            <a href="{{url('admin/exam-profile')}}/{{\Crypt::encrypt($exam->id)}}" type="submit" class="btn-u btn-u-red">Cancel</a>
                            <button type="submit" class="btn-u">Update Question Profile</button>
                        </div>
                    </footer>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@stop
@section('pagecss')
<link rel="stylesheet" href="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
@stop
@section('pageplugins')
<script type="text/javascript" src="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/forms/checkout.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/plugins/ckeditor/ckeditor.js')}}"></script>
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

        var url = '{!! url("wbt/additional-info") !!}';
        var formData = {
            "_token" : "{!! csrf_token() !!}",
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
            var img_url = '{!! asset("storage/additional_info/' + img_id + '.' + img_ext + '")!!}';
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
                        '<h5>You are about to trash <strong>{{$exam->examProvider->code}}, {{$exam->subject->name}}, {{$exam->month->code}} {{$exam->session->name}}</strong></h5>'+
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
        var qcount = {{$exam->question->count()}};
        if(qcount == 0){
            var message = '<strong>{{$exam->examProvider->code}}, {{$exam->subject->name}}, {{$exam->month->code}} {{$exam->session->name}}</strong>';
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
@stop