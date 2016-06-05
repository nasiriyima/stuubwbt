<?php $__env->startSection('pagecss'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
        <div class="row">
                <div class="col-md-12">
                        <!--Basic Table-->
                        <div class="panel panel-orange margin-bottom-40">
                                <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Saved</h3>
                                </div>
                                <div class="panel-body">
                                        <div class="header pull-right">
                                                <input type="submit" class="btn btn-warning" name="compose" data-toggle="modal" data-target="#compose" value="Compose">
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
                                                                        <button type="button" class="btn-orange btn-orange-default" data-dismiss="modal">Cancel</button>
                                                                        <button type="button" class="btn-orange btn-orange-primary">Send Message</button>
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
                                                        <th>Sender</th>
                                                        <th class="hidden-sm">Subject</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($message_inbox as $message): ?>
                                                        <tr>
                                                                <td>1</td>
                                                                <td>Mark</td>
                                                                <td class="hidden-sm">Otto</td>
                                                                <td>@mdo</td>
                                                                <td><span class="label label-warning">Expiring</span></td>
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