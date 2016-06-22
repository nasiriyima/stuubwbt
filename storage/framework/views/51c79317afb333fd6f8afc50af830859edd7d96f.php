<?php $__env->startSection('pagetitle'); ?>
SCHOOL PROFILE - <small><?php echo e($school->name); ?></small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="row margin-bottom-40">
        <div class="col-md-12">
            <div class="tag-box tag-box-v2 box-shadow shadow-effect-1">
                <h2><?php echo e($school->name); ?></h2>
                <div class="row margin-bottom-20">
                    <div class="col-md-3">
                        <strong>Code: </strong> <?php echo e($school->code); ?>

                    </div>
                    <div class="col-md-7">
                        <strong>Description: </strong> <?php echo e($school->description); ?>

                    </div>
                    <div class="col-sm-2">
                        <button class="btn-u" type="button"><i class="fa fa-pencil"></i></button>
                        <button class="btn-u btn-u-red" type="button"><i class="fa fa-ban"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Expected Grad</th>
                <th>Last Seen</th>
            </tr>
            </thead>
            <tbody>
            <?php /**/$count = 1/**/ ?>
            <?php foreach($students as $student): ?>
                <tr>
                    <td><?php echo e($count); ?></td>
                    <td><?php echo e($student->user->first_name); ?></td>
                    <td></td>
                    <td><?php echo e($student->user->last_login->format('d M, Y')); ?> (<?php echo e($student->user->last_login->diffForHumans()); ?>)</td>
                </tr>
                <?php /**/$count++/**/ ?>
            <?php endforeach; ?>
            </tbody>
        </table>
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