<?php $__env->startSection('pagecss'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagetitle'); ?>
<?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <img class="rounded-x" src="<?php echo e(asset('public/assets/img/testimonials/img1.jpg')); ?>" alt="" width="80px">
            </div>
            <br/>
            <div class="row">
                <div class="tab-v1">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="profile">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="panel-heading-v2 overflow-h">
                <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i> Student Performance</h2>
            </div>
            <?php foreach($performances as $performance): ?>
            <h3 class="heading-xs"><?php echo e($performance->code); ?> <span class="pull-right">92%</span></h3>
            <div class="progress progress-u progress-xxs">
                <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>