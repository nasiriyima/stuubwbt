<?php $__env->startSection('pagestyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/shortcode_timeline1.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecontent'); ?>
    <div class="profile-body">
        <div class="panel-heading">
            Showing all your conversations between <?php echo e($conversationStartDate->format('d-m-Y')); ?> to <?php echo e($conversationEndDate->format('d-m-Y')); ?>

        </div>
        <ul class="timeline-v1">

        <?php foreach($conversations as $conversation): ?>
            <?php if($conversation->sender_id == $user->id && in_array($conversation->status, [2])): ?>
                    <li>
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-record"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img class="img-responsive" src="<?php echo e((isset($user->profile->image) && $user->profile->image !="" && $user->profile->image !=NULL)? url('student/file').'/'.$user->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($user->first_name); ?>" alt=""/>
                            </div>
                            <div class="timeline-body text-justify">
                                <h6><strong><a href="#"><?php echo e(ucfirst($conversation->subject)); ?></a></strong></h6>
                                <p><?php echo implode(' ', array_slice(explode(' ', $conversation->body), 0, 30)); ?> ....
                                    <a class="btn-u btn-u-sm" href="#">Read More</a>
                            </div>
                            <div class="timeline-footer">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-clock-o"></i> <?php echo e($conversation->created_at->format('F d, Y')); ?></li>
                                    <li><i class="fa fa-comments-o"></i> <a href="#"> Me</a></li>
                                </ul>
                                <a class="likes" href="#"><i class="fa fa-heart"></i>239</a>
                            </div>
                        </div>
                    </li>
            <?php endif; ?>
            <?php if($conversation->sender_id != $user->id && in_array($conversation->status, [0, 1])): ?>
                    <li class="timeline-inverted">
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-record invert"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img class="img-responsive" src="<?php echo e((isset($conversation->sender->profile->image) && $conversation->sender->profile->image !="" && $conversation->sender->profile->image !=NULL)? url('student/file').'/'.$conversation->sender->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($conversation->sender->first_name); ?>" alt=""/>
                            </div>
                            <div class="timeline-body text-justify">
                                <h6><strong><a href="#"><?php echo e(ucfirst($conversation->subject)); ?></a></strong></h6>
                                <p><?php echo implode(' ', array_slice(explode(' ', $conversation->body), 0, 30)); ?> ....
                                    <a class="btn-u btn-u-sm" href="#">Read More</a>
                            </div>
                            <div class="timeline-footer">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-clock-o"></i> <?php echo e($conversation->created_at->format('F d, Y')); ?></li>
                                    <li><i class="fa fa-comments-o"></i> <a href="#"> <?php echo e(explode(',', $conversation->sender->first_name)[0]); ?></a></li>
                                </ul>
                                <a class="likes" href="#"><i class="fa fa-heart"></i>87</a>
                            </div>
                        </div>
                    </li>
            <?php endif; ?>
        <?php endforeach; ?>
            <li class="clearfix" style="float: none;"></li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/jquery.lazyload.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.myprofile.myprofile_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>