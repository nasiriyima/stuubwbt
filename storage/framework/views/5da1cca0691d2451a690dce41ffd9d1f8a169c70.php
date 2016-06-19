<?php $__env->startSection('pagetitle'); ?>
STUDENT MANAGER
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Registered Students</a></li>
        <li><a href="#active" data-toggle="tab">Active Accounts</a></li>
        <li><a href="#" data-toggle="tab">In Active Accounts</a></li>
        <li><a href="#" data-toggle="tab">Non Activated Accounts</a></li>
        <li><a href="#" data-toggle="tab">Disabled Account</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <?php echo $__env->make('admin.student.registered', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="tab-pane fade in" id="active">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Last Seen</th>
                            <th>Profile</th>
                            <th>School</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($students as $student): ?>
                            <?php /**/
                            $profileStats = ($student->profile)?
                            $student->profile()->statistics() : 0;
                            /**/ ?>

                            <tr>
                                <td>1</td>
                                <td>
                                    <a href="<?php echo e(url('admin/student-profile')); ?>/<?php echo e(\Crypt::encrypt($student->id)); ?>">
                                        <?php echo e($student->first_name); ?>

                                        (<?php echo e($student->email); ?>)
                                    </a>
                                </td>
                                <td><?php echo e($student->created_at->format('d-M-Y')); ?> (<?php echo e($student->created_at->diffForHumans()); ?>)</td>
                                <td>
                                    <div class="progress progress-u progress-xxs">
                                        <span class="progress-bar <?php echo e(($profileStats < 30)? 'progress-bar-red':($profileStats < 70)? 'progress-bar-warning':'progress-bar-success'); ?>" style="width: <?php echo e($profileStats); ?>%">
                                        </span>
                                    </div>
                                </td>
                                <td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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