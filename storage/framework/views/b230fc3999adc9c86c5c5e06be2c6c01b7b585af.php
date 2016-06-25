<?php $__env->startSection('pagecss'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagetitle'); ?>
    STUDENT PROFILE
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="container">
        <div class="row margin-bottom-10">
            <div class="col-md-12">
                <div class="tag-box tag-box-v2 box-shadow shadow-effect-1">
                    <h2>
                         <?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?>

                    </h2>
                    <div class="row margin-bottom-20">
                        <div class="col-md-2">
                            <img src="<?php echo e((isset($student->profile->image) && $student->profile->image !="" && $student->profile->image !=NULL)? url('student/file').'/'.$student->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($student->first_name); ?>" width="100%">
                        </div>
                        <div class="col-md-10">
                            <?php /**/
                           $profileStats = ($student->profile)?
                           $student->profile()->statistics() : 0;
                           /**/ ?>
                            <div class="progress progress-u progress-xxs">
                                        <span class="progress-bar <?php echo e(($profileStats < 30)? 'progress-bar-red':($profileStats < 70)? 'progress-bar-warning':'progress-bar-success'); ?>" style="width: <?php echo e($profileStats); ?>%">
                                        </span>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if($student->profile): ?>
                                    <?php echo e($student->profile->description); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Email: </strong><?php echo e($student->email); ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="tab-v1">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#examhis" data-toggle="tab">Examination History</a></li>
                            <li><a href="#comhis" data-toggle="tab">Communcation History</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="examhis">
                                <?php echo $__env->make('admin.student.examhistory', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div class="tab-pane fade in" id="comhis">
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