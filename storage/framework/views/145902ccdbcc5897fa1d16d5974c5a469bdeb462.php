<?php $__env->startSection('pagecss'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagetitle'); ?>
<?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="tab-v1">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                            <li><a href="#profile" data-toggle="tab">Examination History</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="profile">
                                <?php /*<div class="row">
                                    <img class="rounded-x" src="<?php echo e(asset('public/assets/img/testimonials/img1.jpg')); ?>" alt="" width="80px">
                                </div>*/ ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>