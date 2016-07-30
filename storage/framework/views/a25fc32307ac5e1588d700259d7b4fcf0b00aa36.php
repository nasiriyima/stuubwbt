<?php $__env->startSection('pagetitle'); ?>
EXAMINATION RESOURCE MANAGER
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="row margin-bottom-20">
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="<?php echo e(url('admin/exam-manager')); ?>"><i class="fa fa-question"></i>Exams</a>
                            <span class="badge badge-green rounded-x"><?php echo e($examcount); ?></span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="<?php echo e(url('admin/provider-manager')); ?>"><i class="icon-line icon-pin"></i>Providers</a>
                            <span class="badge badge-green rounded-x"><?php echo e($providerscount); ?></span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="<?php echo e(url('admin/category-manager')); ?>"><i class="icon-line icon-layers"></i>Categories</a>
                            <span class="badge badge-green rounded-x"><?php echo e($categorycount); ?></span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="<?php echo e(url('admin/subject-manager')); ?>"><i class="icon-line icon-note"></i>Subjects</a>
                            <span class="badge badge-green rounded-x"><?php echo e($subjectcount); ?></span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="<?php echo e(url('admin/session-manager')); ?>"><i class="icon-line icon-note"></i>Sessions</a>
                            <span class="badge badge-green rounded-x"><?php echo e($sessioncount); ?></span>
                        </li>
                    </ul>
                </center>
            </div>
            <div class="col-md-2">
                <center>
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="<?php echo e(url('admin/month-manager')); ?>"><i class="icon-line icon-note"></i>Months</a>
                            <span class="badge badge-green rounded-x"><?php echo e($monthcount); ?></span>
                        </li>
                    </ul>
                </center>
            </div>
        </div>
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Examinations</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="row">
                <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Examination</th>
                            <th class="hidden-sm">Details</th>
                            <th class="hidden-sm">Attempts</th>
                            <th class="hidden-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($exams as $exam): ?>
                        <tr>
                            <td><?php echo e($exam->examProvider->code); ?>, <?php echo e($exam->subject->name); ?> (<?php echo e($exam->month->code); ?> <?php echo e($exam->session->name); ?>)</td>
                            <td class="hidden-sm"><center><?php echo e($exam->question->count()); ?> Questions</center></td>
                            <td><?php echo e($exam->history->count()); ?></td>
                            <td><span class="label <?php echo e(($exam->status == 1)? 'label-success':'label-red'); ?>"><?php echo e(($exam->status == 1)? 'Published':'Unpublished'); ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    <?php /*<div class="col-md-5">
        <div class="tab-v1">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Tickets</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">

                </div>
            </div>
        </div>
    </div>*/ ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageplugins'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.js')); ?>"></script>
    <script>
        jQuery(document).ready(function() {
            $(".table").DataTable();

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>