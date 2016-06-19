<?php $__env->startSection('pagetitle'); ?>
SCHOOL MANAGER
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#list" data-toggle="tab">School List</a></li>
        <li><a href="#active" data-toggle="tab">Add School</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="list">
            <?php echo $__env->make('admin.school.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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