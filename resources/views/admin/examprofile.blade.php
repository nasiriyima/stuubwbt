@extends('admin_layout')

@section('pagetitle')
{{$exam->examProvider->code}}, {{$exam->subject->name}}, {{$exam->month->code}} {{$exam->session->name}}
@stop
@section('maincontent')
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
                             {{--*/$count=1;/*--}}
                             @foreach($exam->question as $question)
                             <tr>
                                 <td>{{$count}}</td>
                                 <td>{{$question->name}}</td>
                                 <td class="hidden-sm">50</td>
                                 <td class="hidden-sm">50</td>
                                 <td class="hidden-sm">50</td>
                                 <td>70%</td>
                                 <td></td>
                             </tr>
                             {{--*/$count++;/*--}}
                             @endforeach
                     </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="addquestion">
            @include('admin.addexamination')
        </div>
    </div>
</div>
@stop
@section('pagecss')
<link rel="stylesheet" href="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
@stop
@section('pageplugins')
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
        console.log($("textarea[name=question_name]"));

        if ($(this).val() === "Upload") {
            if ($("input[name=image_description]").val() === "" || $("input[name=image]").val() === "") {
                alert("Please select an image or fill the image description");
                return false;
            }
        }
        if ($(this).val() === "Add") {
            if ($("input[name=text_description]").val() === "" || $("textarea[name=question_name]").val() === "") {
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
            "question_name" : $("textarea[name=question_name]").val()
        };

        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            enctype: 'multipart/form-data',
            success: function(informations) {
                $("#additional_info").empty();
                $.each(informations, function(key, value) {
                    $.each(value, function(k, val) {
                        if (k === "id") {
                            var id = val;
                        };
                        if (k === "name") {
                            var name = val;
                            $("#additional_info").append("<option value='" + id + "'>" + name + "</option>");
                        };
                    });
                    $('.img_button,.text_button').show();$('.text_area,.for_upload').hide();
                    $("#add_info").modal("hide");
                });
            },
            error: function() {
                console.log("ERROR");
            }
        });
    });
</script>
@stop