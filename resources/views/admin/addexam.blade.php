@extends('admin_layout')

@section('pagetitle')
EXAMINATION RESOURCES MANAGER - <small>Add Examination</small>
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Examination Options</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
                    <form action="#" id="sky-form" class="sky-form">
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="select">
                                        <span>EXAM PROVIDER</span>
                                        <select name="provider">
                                            <option value="0" selected disabled>Exam Provider</option>
                                            <option value="244">JAMB</option>
                                            <option value="1">WEAC</option>
                                            <option value="2">NECO</option>
                                        </select>
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="select">
                                        <span>EXAM SUBJECT</span>
                                        <select name="Subject">
                                            <option value="0" selected disabled>Exam Subject</option>
                                            <option value="244">Mathematics</option>
                                        </select>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <span>EXAM MONTH</span>
                                        <select name="Subject">
                                            <option value="0" selected disabled>Exam Month</option>
                                            <option value="1">January</option>
                                        </select>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <span>EXAM YEAR</span>
                                        <select name="Subject">
                                            <option value="0" selected disabled>Exam Year</option>
                                            <option value="244">2015</option>
                                        </select>
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <span>TIME ALLOWED</span>
                                        <select name="time-allowed">
                                            <option value="0" selected disabled>Exam Provider</option>
                                            <option value="244">JAMB</option>
                                            <option value="1">WEAC</option>
                                            <option value="2">NECO</option>
                                        </select>
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <footer>
                            <div class="pull-right">
                                <a href="{{url('admin/exam-profile')}}" class="btn-u">Save and Add Questions</a>
                            </div>
                        </footer>
                    </form>
                </div>

            </div>
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
    CKEDITOR.replace('texteditor');
</script>
@stop