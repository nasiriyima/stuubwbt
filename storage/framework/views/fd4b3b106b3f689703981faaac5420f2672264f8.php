<?php $__env->startSection('pagecss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/chosen/chosen.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <?php if($errors->all()): ?>
        <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Oh snap! You got error(s) with your input!</h4>
                <?php foreach($errors->all() as $error): ?>
                <p><?php echo e($error); ?></p>
                <?php endforeach; ?>
                <p>
                    <a class="btn-u btn-u-red" href="#" data-dismiss="alert" aria-hidden="true">OK</a>
                </p>
            </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <!--Basic Table-->
            <div class="panel panel-u margin-bottom-40">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks"></i> Inbox</h3>
                </div>
                <div class="panel-body">
                    <div class="header pull-left">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                With Selected
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="javascript:void(0)" onclick="showDeleteModal('all');"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header pull-right">
                        <input type="submit" class="btn-u" name="compose" data-toggle="modal" data-target="#compose" value="Compose">
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
                                    <form action="<?php echo e(url('student/process-message')); ?>" method="post" id="sky-form2" class="sky-form">
                                        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" />
                                        <fieldset>
                                            <section>
                                                <label class="input">
                                                    <select data-placeholder="To" multiple style="width: 906px;" name="to[]" aria-multiselectable="true" class="chosen-select">
                                                        <?php foreach($user->friendship as $friend): ?>
                                                            <option value="<?php echo e($friend->friend_id); ?>"><?php echo e($friend->user->first_name); ?></option>
                                                        <?php endforeach; ?>
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
                                <th>From</th>
                                <th class="hidden-sm">Subject</th>
                                <th></th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($message_inbox as $message): ?>
                                <tr>
                                    <td><input class="checkbox" type="checkbox" onclick="enableElements('one', '<?php echo e($message->id); ?>');" id="chk<?php echo e($message->id); ?>"></td>
                                    <td>
                                        <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><?php echo ($message->status == 0)? '<strong>'.$message->sender->first_name.'</strong>' : $message->sender->first_name; ?></a>
                                    </td>
                                    <td class="hidden-sm">
                                        <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><?php echo ($message->status == 0)? '<strong>'.$message->subject.'</strong>' : $message->subject; ?></a>
                                    </td>
                                    <td>
                                        <a title="<?php echo e($message->created_at->format('d-m-Y @ h:m:s')); ?>"><?php echo e($message->created_at->diffForHumans()); ?></a>
                                    </td>
                                    <td>
                                        <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><span class="label label-<?php echo e(($message->status == 0)? 'info' :(($message->status == 1)? 'success' : '')); ?>"><?php echo e(($message->status == 0)? 'new' :(($message->status == 1)? 'read' : '')); ?></span></a>
                                    </td>
                                    <td>
                                        <a href="#" title="reply"><span class="fa fa-reply"></span></a>
                                        <a href="#" title="Forward"><span class="fa fa-forward"></span></a>
                                        <a href="javascript:void(0)" onclick="showDeleteModal('<?php echo e($message->id); ?>');" title="trash"><span class="fa fa-trash-o"></span></a>
                                        <input type="hidden" class="messages" id="message_id<?php echo e($message->id); ?>" name="messageId<?php echo e($message->id); ?>" value="<?php echo e($message->id); ?>"  disabled />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <!--End Basic Table-->
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/chosen/chosen.jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/ckeditor/ckeditor.js')); ?>"></script>

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
                url: '<?php echo url('student/message-view'); ?>',
                data: {'_token':'<?php echo csrf_token(); ?>', 'id':id},
                method: 'post',
                success:function(response){
                    $("#view .modal-body").html(response);
                    $('#view').modal('show');
                }
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

            formdata._token = "<?php echo csrf_token(); ?>";
            console.log(formdata);
            $.ajax({
                url: "<?php echo url('student/delete-message'); ?>",
                data: formdata,
                method:"post",
                success:function(response){
                    var obj = JSON.parse(response);
                    window.location = obj.url;
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>