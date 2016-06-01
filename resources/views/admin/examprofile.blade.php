@extends('admin_layout')

@section('pagetitle')
{{$exam->examProvider->code}}, {{$exam->subject->name}}, {{$exam->month->code}} {{$exam->session->name}}
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Profile</a></li>
        <li><a href="#addquestion" data-toggle="tab">Add Question</a></li>
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
</script>
@stop