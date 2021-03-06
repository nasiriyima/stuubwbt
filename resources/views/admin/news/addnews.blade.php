@extends('admin_layout')

@section('pagetitle')
NEWS MANAGEMENT - <small>ADD NEWS ITEM</small>
@stop
@section('maincontent')
    {!! Form::open(array('url' => url('admin/add-news'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
    <fieldset>
        <div class="row">
            <div class="col-md-12">
                <section>
                    <label class="input">
                        <span>NEWS TITLE</span>
                        <input rows="2" name="title" placeholder="NEWS TITLE" required></input>
                    </label>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <section>
                    <label class="textarea">
                        <span>NEWS CAPTION</span>
                        <textarea rows="2" name="caption" placeholder="NEWS CAPTION" required></textarea>
                    </label>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <section>
                    <label class="textarea">
                        <span>NEWS BODY</span>
                        <textarea rows="2" name="body" placeholder="Question Text" id="question" required></textarea>
                    </label>
                </section>
            </div>
        </div>
    </fieldset>
    <footer>
        <div class="pull-right">
            <button type="submit" class="btn-u">Save</button>
        </div>
    </footer>
    {!! Form::close() !!}
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