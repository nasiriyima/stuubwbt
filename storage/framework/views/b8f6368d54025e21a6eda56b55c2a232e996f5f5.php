<?php $__env->startSection('pagetitle'); ?>
<?php echo e(ucwords($subject->name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <?php foreach($subject->exam as $exam): ?>
            <div class="col-sm-4 sm-margin-bottom-40">
                <a href="javascript:void(0);">
                    <h2 class="heading-sm">
                        <i class="icon-custom icon-sm icon-bg-u fa fa-lightbulb-o"></i>
                        <span><?php echo e($exam->examProvider->code); ?> <?php echo e($exam->month->name); ?> <?php echo e($exam->session->name); ?></span>
                    </h2>
                </a>
                <p>
                    <strong>Time Allowed: </strong> <?php echo e($exam->time_allowed); ?><br/>
                    <strong># Questions: </strong> <?php echo e(count($exam->question)); ?><br/>
                    <strong>Total Attempts: </strong> <?php echo e(count($exam->history)); ?><br/>
                    <strong>Average Score: </strong> <br/>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>