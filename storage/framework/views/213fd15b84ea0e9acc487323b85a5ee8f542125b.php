<?php $__env->startSection('pagetitle'); ?>
    ADMIN DASHBOARD
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>