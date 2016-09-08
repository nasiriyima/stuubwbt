@extends('admin_layout')

@section('pagetitle')
SYSTEM USER MANAGEMENT
@stop
@section('maincontent')
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">System Users</a></li>
        <li><a href="#role" data-toggle="tab">System Roles</a></li>
        <li><a href="#log" data-toggle="tab">Activity Log</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            @include('admin.settings.usermgt.users')
        </div>
        <div class="tab-pane fade in" id="role">
            @include('admin.settings.usermgt.roles')
        </div>
        <div class="tab-pane fade in" id="log">
            <div class="row">
                <div class="col-md-12">
               
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
            CheckoutForm.initCheckoutForm();
        });
    </script>
    <script type="text/javascript">
        function togglerole(){
            $('#addrole').toggle('slow');
            $('#listrole').toggle('slow');
            $('#addrolebtn').toggle();
            $('#addroleclose').toggle();
        }
        function toggleuser(){
            $('#userlist').toggle();
            $('#adduser').toggle();
            $('#adduserbtn').toggle();
            $('#closeuseradd').toggle();
        }
        function createRole(){
            var permissions = [];
            $(".permission:checked").each(function() {
                permissions.push(this.value);
            });
            var rslug = $("input[name=rslug]").val();
            var rname = $("input[name=rname]").val();

            if(rname == ' ' || rslug == ' '){
                return false;
            }else{
                $.ajax({
                        url: '{{url('auth/add-role')}}',
                        method: 'POST',
                        dataType: 'json',
                        data:{
                            permissions: permissions,
                            rname: rname,
                            rslug: rslug,
                            _token: '{{csrf_token()}}'
                        },
                        success: function(rsp){
                                location.reload();
                        },
                        error: function(err){

                        }
                })
            }
        }
    </script>
@stop