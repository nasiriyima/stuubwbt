@extends('admin_layout')

@section('pagetitle')
{{$exam->examProvider->code}}, {{$exam->subject->name}}, {{$exam->month->code}} {{$exam->session->name}}
@stop
@section('maincontent')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/chosen/chosen.min.css') }}">
	<div class="row">
        <div class="col-md-6">
            <div class="row margin-bottom-10">
                <div class="col-md-6">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="{{url('admin/news-item/add')}}"><i class="fa fa-question"></i>Questions</a>
                                <span class="badge badge-green rounded-x">{{$exam->question->count()}}</span>
                            </li>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-5 margin-top-20">
            <a href="javascript:void(0);" onclick="trashexam()"><i class="fa fa-3x fa-trash pull-right"></i></a>
            <a href="javascript:void(0);" onclick="editexam()"><i class="fa fa-3x fa-edit pull-right"></i></a>
            @if($exam->status == 1)
            <a href="javascript:void(0);" onclick="unpublishexam()"><i class="fa fa-3x fa-ban pull-right"></i></a>
            @endif
            @if($exam->status==0)
            <a href="javascript:void(0);" onclick="publichexam()"><i class="fa fa-3x fa-check pull-right"></i></a>
            @endif
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
                             {{--*/$count=1;/*--}}
                             @foreach($exam->question as $question)
                             <tr>
                                 <td>{{$count}}</td>
                                 <td>{!! implode(' ', array_slice(explode(' ', $question->name), 0, 20)) !!}</td>
                                 <td class="hidden-sm">50</td>
                                 <td>
                                     {{($question->question_additional_information_id)? $question->questionAdditionalInformation->name:' '}}
                                 </td>
                                 <td>
                                     <i class="fa fa-edit"></i>
                                     <i class="fa fa-trash"></i>
                                 </td>
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
</script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nicescroll/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- PLUGINS -->
    <script src="{{ asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/prettify/prettify.js') }}"></script>

    <!-- MAIN APPS JS -->
    <script src="{{ asset('assets/js/plugins/apps.js') }}"></script>
@stop