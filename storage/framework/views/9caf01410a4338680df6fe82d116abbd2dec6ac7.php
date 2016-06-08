<?php $__env->startSection('pagecss'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
        <div class="row">
                <div class="col-md-12">
                        <!--Basic Table-->
                        <div class="panel panel-green margin-bottom-40">
                                <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Sent</h3>
                                </div>
                                <div class="panel-body">
                                        <div class="header pull-right">
                                                <input type="submit" class="btn btn-success" name="compose" data-toggle="modal" data-target="#compose" value="Compose">
                                        </div>
                                        <div class="margin-bottom-20"></div>
                                        <div class="modal fade" id="compose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
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
                                                                                                        <i class="icon-append fa fa-pencil"></i>
                                                                                                        <input type="text" name="to" id="to" placeholder="To">
                                                                                                </label>
                                                                                        </section>

                                                                                        <section>
                                                                                                <label class="input">
                                                                                                        <i class="icon-append fa fa-envelope"></i>
                                                                                                        <input type="text" name="subject" id="subject" placeholder="Subject">
                                                                                                </label>
                                                                                        </section>

                                                                                        <section>
                                                                                                <label class="label"></label>
                                                                                                <label class="textarea">
                                                                                                        <i class="icon-append fa fa-comment"></i>
                                                                                                        <textarea rows="3" name="review" id="review" placeholder="Message Body"></textarea>
                                                                                                </label>
                                                                                        </section>
                                                                                </fieldset>
                                                                        </form>
                                                                        <!-- End Review Form-->
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn-green btn-green-default" data-dismiss="modal">Cancel</button>
                                                                        <button type="button" class="btn-green btn-green">Send Message</button>
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
                                                <?php foreach($message_sent as $message): ?>
                                                        <tr>
                                                                <td><input type="checkbox"></td>
                                                                <td>
                                                                        <a href="#"><?php echo ($message->status == 0)? '<strong>'.$message->receiver->first_name.'</strong>' : $message->receiver->first_name; ?></a>
                                                                </td>
                                                                <td class="hidden-sm"><a href="#"><?php echo ($message->status == 0)? '<strong>'.$message->subject.'</strong>' : $message->subject; ?></a></td>
                                                                <td><a href="#"><span class="label label-<?php echo e(($message->status == 0)? 'info' :(($message->status == 1)? 'success' : '')); ?>"><?php echo e(($message->status == 0)? 'new' :(($message->status == 1)? 'read' : '')); ?></span></a></td>
                                                                <td>
                                                                        <a href="#"><span class="fa fa-trash-o"></span></a>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
        <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.js')); ?>"></script>
        <script type="text/javascript">
                jQuery(document).ready(function() {
                        $(".table").DataTable();
                });
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>