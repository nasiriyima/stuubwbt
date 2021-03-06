@extends('admin_layout')
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/chosen/chosen.min.css') }}">
@stop
@section('maincontent')
    @if($errors->all())
        <div class="alert alert-danger fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>Oh snap! You got error(s) with your input!</h4>
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
            <p>
                <a class="btn-u btn-u-red" href="#" data-dismiss="alert" aria-hidden="true">OK</a>
            </p>
        </div>
    @endif
    @if(\Session::has('message'))
        <div class="alert alert-success fade in alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ \Session::get('message') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <!--Basic Table-->
            <div class="panel panel-green margin-bottom-40">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks"></i> Sent</h3>
                </div>
                <div class="panel-body">
                    <div class="header pull-left">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                With Selected
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="javascript:void(0)" onclick="showDeleteModal('all');"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header pull-right">
                        @if($profileStats > 49)
                        <input type="submit" class="btn btn-success" name="compose" data-toggle="modal" data-target="#compose" value="Compose">
                        @endif
                    </div>
                    <div class="margin-bottom-20"></div>
                    <div class="modal fade" id="compose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 1000px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel4">Compose Message</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- Review Form-->
                                    <form action="{{ url('student/process-message') }}" method="post" id="sky-form2" class="sky-form">
                                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                        <fieldset>
                                            <section>
                                                <label class="input">
                                                    <select data-placeholder="To" multiple style="width: 906px;" name="to[]" aria-multiselectable="true" class="chosen-select">
                                                        {{--*/$friends = $messageUser->friendship()->requestAccepted()->get()/*--}}
                                                        @foreach($friends as $friend)
                                                            <option value="{{ $friend->friend_id }}">{{ $friend->friend->first_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </section>

                                            <section>
                                                <label class="input">
                                                    <i class="icon-append fa fa-pencil"></i>
                                                    <input type="text" name="subject" id="subject" placeholder="Subject">
                                                </label>
                                            </section>

                                            <section>
                                                <label class="label"></label>
                                                <label class="textarea">
                                                    <i class="icon-append fa fa-comment"></i>
                                                    <textarea rows="4" name="body" id="body" placeholder="Message Body"></textarea>
                                                </label>
                                            </section>
                                            <section>
                                                <div class="pull-right">
                                                    <input type="submit" class="btn-u btn-primary" name="action" value="Send" />
                                                    <input type="submit" class="btn btn-warning" name="action" value="Save" />
                                                    <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                                </div>
                                            </section>
                                        </fieldset>
                                    </form>
                                    <!-- End Review Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="inboxMessages">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <input class="all" id="all" onclick="enableElements('all', 'all');" type="checkbox">
                                </th>
                                <th>To</th>
                                <th class="hidden-sm">Subject</th>
                                <th></th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($message_sent as $message)
                                <tr>
                                    <td><input class="checkbox" type="checkbox" onclick="enableElements('one', '{{ $message->id }}');" id="chk{{ $message->id }}"></td>
                                    <td>
                                        <a href="javascript:showMessage('{!! \Crypt::encrypt($message->id) !!}')">{!! ($message->status == 0)? '<strong>'.$message->receiver->first_name.'</strong>' : $message->receiver->first_name !!}</a>
                                    </td>
                                    <td class="hidden-sm">
                                        <a href="javascript:showMessage('{!! \Crypt::encrypt($message->id) !!}')">{!!  ($message->status == 0)? '<strong>'.$message->subject.'</strong>' : $message->subject !!}</a>
                                    </td>
                                    <td>
                                        <span class="text-highlights text-highlights-purple rounded tooltips" data-toggle="tooltip" data-original-title="{{ $message->created_at->format('d-m-Y @ h:m:s') }}">{{ $message->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <a href="javascript:showMessage('{!! \Crypt::encrypt($message->id) !!}')"><span class="label label-{{ ($message->status == 0)? 'info' :(($message->status == 1)? 'success' : '') }}">{{ ($message->status == 0)? 'new' :(($message->status == 1)? 'read' : '') }}</span></a>
                                    </td>
                                    <td>
                                        @if($profileStats > 49)
                                        <a href="#" title="Forward" onclick="forwardShowMessage('{{ \Crypt::encrypt($message->id) }}')"><span class="fa fa-forward"></span></a>
                                        @endif
                                        <a href="javascript:void(0)" onclick="showDeleteModal('{{ $message->id }}');" title="trash"><span class="fa fa-trash-o"></span></a>
                                        <input type="hidden" class="messages" id="message_id{{ $message->id }}" name="messageId{{ $message->id }}" value="{{ $message->id }}"  disabled />
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <!--End Basic Table-->
        </div>
    </div>
    <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel4">Reply Message</h4>
                </div>
                <div class="modal-body">
                    <!-- Review Form-->
                    <form action="{{ url('student/process-message') }}" method="post" id="sky-form2" class="sky-form">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <fieldset>
                            <section>
                                <label class="select">

                                </label>
                            </section>

                            <section>
                                <label class="input">
                                    <i class="icon-append fa fa-pencil"></i>
                                    <input type="text" name="subject" id="subject" placeholder="Subject">
                                </label>
                            </section>

                            <section>
                                <label class="label"></label>
                                <label class="textarea">
                                    <i class="icon-append fa fa-comment"></i>
                                    <textarea rows="4" name="body" id="reply_body" placeholder="Message Body"></textarea>
                                </label>
                            </section>
                            <section>
                                <div class="pull-right">
                                    <input type="submit" class="btn-u btn-primary" name="action" value="Reply" />
                                    <input type="submit" class="btn btn-warning" name="action" value="Save" />
                                    <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                </div>
                            </section>
                        </fieldset>
                    </form>
                    <!-- End Review Form-->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forward" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel4">Forward Message</h4>
                </div>
                <div class="modal-body">
                    <!-- Review Form-->
                    <form action="{{ url('student/process-message') }}" method="post" id="sky-form2" class="sky-form">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <fieldset>
                            <section>
                                <label class="select">

                                </label>
                            </section>

                            <section>
                                <label class="input">
                                    <i class="icon-append fa fa-pencil"></i>
                                    <input type="text" name="subject" id="subject" placeholder="Subject">
                                </label>
                            </section>

                            <section>
                                <label class="label"></label>
                                <label class="textarea">
                                    <i class="icon-append fa fa-comment"></i>
                                    <textarea rows="4" name="body" id="forward_body" placeholder="Message Body"></textarea>
                                </label>
                            </section>
                            <section>
                                <div class="pull-right">
                                    <input type="submit" class="btn-u btn-primary" name="action" value="Forward" />
                                    <input type="submit" class="btn btn-warning" name="action" value="Save" />
                                    <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                </div>
                            </section>
                        </fieldset>
                    </form>
                    <!-- End Review Form-->
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel4">View Message</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Warning !</h4>
                <p>You are about to delete message(s) from your inbox, are you sure you will like to delete selected Item(s)?</p>
                <input type="hidden" name="delete_type" value="" />
                <p>
                    <a class="btn-u btn-u-red" href="javascript:deleteMessage()">Continue</a>
                    <a class="btn-u btn-u-sea" href="javascript:void(0)" data-dismiss="modal">Cancel</a>
                </p>
            </div>
        </div>
    </div>
@stop
@section('pageplugins')
    <script type="text/javascript" src="{{ asset('public/assets/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/plugins/chosen/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/plugins/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        $("#compose").on("shown.bs.modal", function () {
            $('.chosen-select', this).chosen('destroy').chosen();
        });
        jQuery(document).ready(function() {
            CKEDITOR.replace('body');
            $(".table").DataTable();
            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }

            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        });

        function showMessage(id){
            $.ajax({
                url: '{!! url('admin/message-view') !!}',
                data: {'_token':'{!! csrf_token() !!}', 'id':id},
                method: 'post',
                success:function(response){
                    $("#view .modal-body").html(response);
                    $('#view').modal('show');
                }
            });
        }

        function replyShowMessage(id){
            $.ajax({
                url: '{!! url('admin/message-details') !!}',
                method: 'post',
                data: {_token:'{!! csrf_token() !!}', id:id, action:'reply'},
                success:function(response){
                    var obj = JSON.parse(response);
                    var select = '<select data-placeholder="Reply" multiple style="width: 906px;" name="to[]" aria-multiselectable="true" class="chosen-select">';
                    var option = ' <option value="'+obj.sender.id+'" selected>'+obj.sender.first_name+'</option></select>';
                    select += option;
                    $('#reply textarea[name=body]').text(obj.message.body);
                    $('#reply input[name=subject]').val(obj.message.subject);
                    $(".select").html(select);
                    var editor = CKEDITOR.instances['reply_body'];
                    if(editor){ editor.destroy(true);}
                    CKEDITOR.replace('reply_body');
                }
            });
            $("#reply").modal('show');
            $("#reply").on("shown.bs.modal", function () {
                $('.chosen-select', this).chosen('destroy').chosen();
            });
        }

        function forwardShowMessage(id){
            $.ajax({
                url: '{!! url('admin/message-details') !!}',
                method: 'post',
                data: {_token:'{!! csrf_token() !!}', id:id, action:'forward'},
                success:function(response){
                    var obj = JSON.parse(response);
                    var select = '<select data-placeholder="Forward" multiple style="width: 906px;" name="to[]" aria-multiselectable="true" class="chosen-select">';
                    var option = '';
                    for(var i in obj.friends){
                        option += ' <option value="'+obj.friends[i].id+'">'+obj.friends[i].first_name+'</option>';
                    }

                    select += option+'</select>';
                    $('#forward textarea[name=body]').text(obj.message.body);
                    $('#forward input[name=subject]').val(obj.message.subject);
                    $(".select").html(select);
                    var editor = CKEDITOR.instances['forward_body'];
                    if(editor){ editor.destroy(true);}
                    CKEDITOR.replace('forward_body');
                }
            });
            $("#forward").modal('show');
            $("#forward").on("shown.bs.modal", function () {
                $('.chosen-select', this).chosen('destroy').chosen();
            });
        }

        function showDeleteModal(delete_type){
            $("input[name=delete_type]").val(delete_type);
            $("#deletemodal").modal("show");
        }

        function enableElements(type, id){
            if(type == "all"){
                if($("#"+id).is(":checked")){
                    $(".checkbox").prop("checked", true);
                    $(".messages").prop("disabled", false);
                } else {
                    $(".checkbox").prop("checked", false);
                    $(".messages").prop("disabled", true);
                }
            }

            if(type == "one"){
                if($("#chk"+id).is(":checked")){
                    $("#message_id"+id).prop("disabled", false);
                } else {
                    $("#message_id"+id).prop("disabled", true);
                }
            }
        }

        function deleteMessage(){

            var formdata = new Object();
            if($("input[name=delete_type]").val() == "all"){
                formdata = $("#inboxMessages").serializeArray().reduce(function(obj, item){
                    obj[item.name] = item.value;
                    return obj;
                }, {});
                formdata.deleteType = "all";
            } else {
                formdata.deleteType = "one";
                formdata.id = $("input[name=delete_type]").val();
            }

            formdata._token = "{!! csrf_token() !!}";
            console.log(formdata);
            $.ajax({
                url: "{!! url('admin/delete-message') !!}",
                data: formdata,
                method:"post",
                success:function(response){
                    var obj = JSON.parse(response);
                    window.location = obj.url;
                }
            });
        }
    </script>
@stop