<?php $__env->startSection('pagecss'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/chosen/chosen.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
        <div class="row">
                <div class="col-md-12">
                        <!--Basic Table-->
                        <div class="panel panel-warning margin-bottom-40">
                                <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Saved</h3>
                                </div>
                                <div class="panel-body">
                                        <div class="header pull-right">
                                                <input type="submit" class="btn btn-warning" name="compose" data-toggle="modal" data-target="#compose" value="Compose">
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
                                                                        <form action="#" id="sky-form2" class="sky-form">
                                                                                <fieldset>
                                                                                        <section>
                                                                                                <label class="input">
                                                                                                        <select data-placeholder="To" multiple style="width: 906px;" class="chosen-select">
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
                                                                                                        <textarea rows="3" name="message" id="message" placeholder="Message Body"></textarea>
                                                                                                </label>
                                                                                        </section>
                                                                                </fieldset>
                                                                        </form>
                                                                        <!-- End Review Form-->
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn-u btn-primary">Send</button>
                                                                        <button type="button" class="btn btn-warning">Save</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>


                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <table class="table">
                                                <thead>
                                                <tr>
                                                        <th>
                                                                <input type="checkbox">
                                                        </th>
                                                        <th>To</th>
                                                        <th class="hidden-sm">Subject</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($message_saved as $message): ?>
                                                        <tr>
                                                                <td><input type="checkbox"></td>
                                                                <td>
                                                                        <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><?php echo ($message->status == 0)? '<strong>'.(isset($message->receiver->first_name))? $message->receiver->first_name : ''.'</strong>' : (isset($message->receiver->first_name))? $message->receiver->first_name : ''; ?></a>
                                                                </td>
                                                                <td class="hidden-sm">
                                                                        <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><?php echo ($message->status == 0)? '<strong>'.$message->subject.'</strong>' : $message->subject; ?></a>
                                                                </td>
                                                                <td>
                                                                        <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><span class="label label-<?php echo e(($message->status == 0)? 'info' :(($message->status == 1)? 'success' : '')); ?>"><?php echo e(($message->status == 0)? 'new' :(($message->status == 1)? 'read' : '')); ?></span></a>
                                                                </td>
                                                                <td>
                                                                        <a href="#" title="trash"><span class="fa fa-trash-o"></span></a>
                                                                </td>
                                                        </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                        </table>
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
                        CKEDITOR.replace('message');
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
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>