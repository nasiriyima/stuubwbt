@extends('student.myprofile.myprofile_layout')

@section('pagestyles')

@stop

@section('pagecontent')
    <div class="profile-body margin-bottom-20">
        <div class="tab-v1">
            <ul class="nav nav-justified nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
                <li><a data-toggle="tab" href="#passwordTab">Change Password</a></li>
                <li><a data-toggle="tab" href="#payment">Payment Options</a></li>
                <li><a data-toggle="tab" href="#settings">Notification Settings</a></li>
            </ul>
            <div class="tab-content">
                <div id="profile" class="profile-edit tab-pane fade in active">
                    <h2 class="heading-md">Manage your Name, ID and Email Addresses.</h2>
                    <p>Below are the name and email addresses on file for your account. Please use the pencil icon to edit your information.</p>
                    <br>
                    <dl class="dl-horizontal">
                        <dt><strong>Your name </strong></dt>
                        <dd>
                           {{ $user->first_name }}
											<span>
												<a class="pull-right" href="#">
                                                    <i class="fa fa-pencil hover-hand-cursor" onclick="showEditModal('name')"></i>
                                                </a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Your ID </strong></dt>
                        <dd>
                            {{ $user->profile->nick_name or '' }}
											<span>
												<a class="pull-right" href="#">
                                                    <i class="fa fa-pencil hover-hand-cursor" onclick="showEditModal('nick_name')"></i>
                                                </a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Date of Birth </strong></dt>
                        <dd>
                            {{ $user->profile->dofb or '' }}
                            <span>
												<a class="pull-right" href="#">
                                                    <i class="fa fa-pencil hover-hand-cursor" onclick="showEditModal('DofB')"></i>
                                                </a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Secondary Email Address </strong></dt>
                        <dd>
                            {{ $user->profile->email or '' }}
											<span>
												<a class="pull-right" href="#">
                                                    <i class="fa fa-pencil hover-hand-cursor" onclick="showEditModal('email')"></i>
                                                </a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Phone Number </strong></dt>
                        <dd>
                            {{ $user->profile->phone or '' }}
											<span>
												<a class="pull-right" href="#">
                                                    <i class="fa fa-pencil hover-hand-cursor" onclick="showEditModal('phone')"></i>
                                                </a>
											</span>
                        </dd>
                        <hr>
                        <dt><strong>Address </strong></dt>
                        <dd>
                            {{ $user->profile->address or '' }}
											<span>
												<a class="pull-right" href="#">
                                                    <i class="fa fa-pencil hover-hand-cursor" onclick="showEditModal('address')"></i>
                                                </a>
											</span>
                        </dd>
                        <hr>
                    </dl>
                </div>

                <div id="passwordTab" class="profile-edit tab-pane fade">
                    <h2 class="heading-md">Manage your Security Settings</h2>
                    <p>Change your password.</p>
                    <br>
                    <form class="sky-form" id="sky-form4" action="#">
                        <dl class="dl-horizontal">
                            <dt>Username</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" placeholder="Username" name="username"  value="{{ $user->email }}" readonly>
                                        <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Email address</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-envelope"></i>
                                        <input type="email" placeholder="Email address" name="email" value="{{ $user->email }}" readonly>
                                        <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Enter your password</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" id="password" name="password" placeholder="Password">
                                        <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                    </label>
                                </section>
                            </dd>
                            <dt>Confirm Password</dt>
                            <dd>
                                <section>
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                        <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                    </label>
                                </section>
                            </dd>
                        </dl>
                        <label class="toggle toggle-change"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Remember password</label>
                        <br>
                        <section>
                            <label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>
                        </section>
                        <button type="button" class="btn-u btn-u-default">Cancel</button>
                        <button class="btn-u" type="submit">Save Changes</button>
                    </form>
                </div>

                <div id="payment" class="profile-edit tab-pane fade">
                    <h2 class="heading-md">Manage your Payment Settings</h2>
                    <p>Below are the payment options for your account.</p>
                    <br>
                    <form class="sky-form" id="sky-form" action="{{ url('student/update-preferences') }}">
                        <!--Checkout-Form-->
                        <section>
                            <div class="inline-group">
                                <label class="radio"><input type="radio" checked="" name="radio-inline"><i class="rounded-x"></i>Visa</label>
                                <label class="radio"><input type="radio" name="radio-inline"><i class="rounded-x"></i>MasterCard</label>
                                <label class="radio"><input type="radio" name="radio-inline"><i class="rounded-x"></i>PayPal</label>
                            </div>
                        </section>

                        <section>
                            <label class="input">
                                <input type="text" name="name" placeholder="Name on card">
                            </label>
                        </section>

                        <div class="row">
                            <section class="col col-10">
                                <label class="input">
                                    <input type="text" name="card" id="card" placeholder="Card number">
                                </label>
                            </section>
                            <section class="col col-2">
                                <label class="input">
                                    <input type="text" name="cvv" id="cvv" placeholder="CVV2">
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <label class="label col col-4">Expiration date</label>
                            <section class="col col-5">
                                <label class="select">
                                    <select name="month">
                                        <option disabled="" selected="" value="0">Month</option>
                                        <option value="1">January</option>
                                        <option value="1">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-3">
                                <label class="input">
                                    <input type="text" placeholder="Year" id="year" name="year">
                                </label>
                            </section>
                        </div>
                        <button type="button" class="btn-u btn-u-default">Cancel</button>
                        <button class="btn-u" type="submit">Save Changes</button>
                        <!--End Checkout-Form-->
                    </form>
                </div>

                <div id="settings" class="profile-edit tab-pane fade">
                    <h2 class="heading-md">Manage your Notifications.</h2>
                    <p>Below are the notifications you may manage.</p>
                    <br>
                    <form class="sky-form" id="sky-form3" method="post" action="{{ url('student/update-preferences') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label class="toggle"><input type="checkbox" {{ (!isset($user->preference) || $user->preference->options['show_birth_date'])? 'checked' : '' }} name="show_birth_date"><i class="no-rounded"></i>Show my birth date</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" {{ (!isset($user->preference) || $user->preference->options['show_phone'])? 'checked' : '' }} name="show_phone"><i class="no-rounded"></i>Show my telephone number</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" {{ (!isset($user->preference) || $user->preference->options['show_address'])? 'checked' : '' }} name="show_address"><i class="no-rounded"></i>Show my address</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" {{ (!isset($user->preference) || $user->preference->options['show_notification'])? 'checked' : '' }} name="show_notification"><i class="no-rounded"></i>Show system notifications</label>
                        <hr>
                        <label class="toggle"><input type="checkbox" {{ (!isset($user->preference) || $user->preference->options['send_email'])? 'checked' : '' }} name="send_email"><i class="no-rounded"></i>Send me email notification when a user sends me message</label>
                        <hr>
                        <button type="button" onclick="resetSettings()" class="btn-u btn-u-default">Reset</button>
                        <button class="btn-u" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('pagescripts')
    <script type="text/javascript" src="{{ asset('public/assets/plugins/chosen/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/plugins/datepicker.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Datepicker.initDatepicker();
        });

        function resetSettings(){
            $("#sky-form3 input[type=checkbox]").prop("checked", true);
        }

        function showEditModal(type){
            $.ajax({
                url: "{!! url('student/edit-view') !!}",
                method: "post",
                data:{_token:"{!! csrf_token() !!}", type:type},
                success:function(response, status, xhr){
                    var header_content_type = xhr.getResponseHeader("content-type") || "";

                    if (header_content_type.indexOf('html') > -1) {
                        $(".bs-example-modal-lg .modal-body").html(response);
                        $(".bs-example-modal-lg #edit-title").html(type.toString().toUpperCase());
                        $(".bs-example-modal-lg").modal("show");
                    }

                    if (header_content_type.indexOf('json') > -1) {
                        if(response.session_expired){
                            window.location = response.url;
                        }
                    }
                }
            });

            $(".bs-example-modal-lg").on("shown.bs.modal", function () {
                $('.chosen-select', this).chosen('destroy').chosen();
            });
        }
    </script>
@stop