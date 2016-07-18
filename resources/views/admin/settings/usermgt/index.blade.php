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
            <div class="row">
                <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Users Name</th>
                            <th>E-Mail</th>
                            <th>Last Seen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffs as $staff)
                        <tr>
                            <td>1</td>
                            <td>{{$staff->first_name}}</td>
                            <td>{{$staff->email}}</td>
                            <td><span class="label label-primary rounded-2x">{{$staff->last_login->diffForHumans()}}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="role">
            <div class="row">
                <div class="col-md-1 pull-right">
                    <a href="javascript:void(0);" onclick="togglerole()"><i class="fa fa-3x fa-plus" id="addrolebtn"></i><i class="fa fa-3x fa-ban" style="display: none;" id="addrolebtn"></i></a>
                    <a href="javascript:void(0);" onclick="togglerole()"><i class="fa fa-3x fa-ban" style="display: none;" id="addroleclose"></i></a>
                </div>
            </div>
            <div class="row" id="addrole" style="display:none;">
                <div class="col-md-12">
                    <form action="javascript:void(0);" id="sky-form" class="sky-form">
                        <header>Checkout form</header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input">
                                        <input type="text" name="fname" placeholder="Role Slug">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input">
                                        <input type="text" name="lname" placeholder="Role Name">
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <section>
                                    @foreach($modules as $module)
                                        <h4><strong>{{$module->name}}</strong></h4>
                                            <div class="inline-group">
                                                @foreach($module->permission as $permission)
                                                    <div class="col-md-3">
                                                        <label class="checkbox"><input type="checkbox" name="radio-inline" class="permission" value="{{$permission->slug}}"><i class="rounded-x" ></i>{{$permission->name}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br/>
                                    @endforeach
                            </section>
                        </fieldset>

                        <footer>
                            <button type="submit" class="btn-u" onclick="createRole()">Create Role</button>
                        </footer>
                    </form>
                </div>
            </div>
            <div class="row" id="listrole">
                <div class="col-md-12">
                    <div class="row tab-v3">
                        <div class="col-sm-3">
                            <ul class="nav nav-pills nav-stacked">
                                {{--*/$count = 1/*--}}
                                @foreach($roles as $role)
                                <li class = "{{($count == 1)? 'active':''}}"><a href="#role-{{$count}}" data-toggle="tab"> {{$role->name}}</a></li>
                                {{--*/$count++/*--}}
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                {{--*/$count = 1/*--}}
                                @foreach($roles as $role)
                                <div class="tab-pane fade in {{($count == 1)? 'active':''}}" id="role-{{$count}}">
                                    {{$role->name}}
                                </div>
                                {{--*/$count++/*--}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        function createRole(){
            var permissions = [];
            $(".permission:checked").each(function() {
                permissions.push(this.value);
            });
            var rslug = $("input[name=fname]").val();
            var rname = $("input[name=lname]").val();

            if(rname == '' || rslug == ''){
                return false;
            }else{
                $.ajax({
                        url: '{{url('admin/add-role')}}',
                        method: 'POST',
                        dataType: 'json',
                        data:{
                            permissions: permissions,
                            rname: rname,
                            rslug: rslug,
                            _token: '{{csrf_token()}}'
                        },
                        success: function(rsp){
                                console.log(rsp);
                        },
                        error: function(err){

                        }
                })
            }
        }
    </script>
@stop