<?php $__env->startSection('pagestyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/shortcode_timeline1.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecontent'); ?>
    <div class="profile-body">
        <div class="panel-heading">
            Showing all your conversations between <?php echo e($conversationStartDate->format('d-m-Y')); ?> to <?php echo e($conversationEndDate->format('d-m-Y')); ?>

        </div>
        <ul class="timeline-v1">
<?php /**/ $massages = $conversations->getCollection() /**/ ?>
        <?php foreach($massages as $conversation): ?>
            <?php if(in_array($conversation['store'], [2])): ?>
                    <li>
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-record"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img class="img-responsive" src="<?php echo e((isset($user->profile->image) && $user->profile->image !="" && $user->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$user->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($user->first_name); ?>" alt=""/>
                            </div>
                            <div class="timeline-body text-justify">
                                <h6><strong><a href="#"><?php echo e(ucfirst($conversation['subject'])); ?></a></strong></h6>
                                <p><?php echo implode(' ', array_slice(explode(' ', $conversation['body']), 0, 30)); ?> ....
                                    <a class="btn-u btn-u-sm" href="javascript:showMessage('<?php echo \Crypt::encrypt($conversation['id']); ?>')">Read More</a>
                            </div>
                            <div class="timeline-footer">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-clock-o"></i> <?php echo e(date('F d, Y', strtotime($conversation['created_at']))); ?></li>
                                    <li><i class="fa fa-comments-o"></i> <a href="#"> Me</a></li>
                                </ul>
                                <a class="likes" href="#"><i class="fa fa-heart"></i>0</a>
                            </div>
                        </div>
                    </li>
            <?php endif; ?>
            <?php if(in_array($conversation['store'], [1])): ?>
                    <li class="timeline-inverted">
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-record invert"></i></div>
                        <div class="timeline-panel">
                            <?php /**/
                                $sender_profile = \App\Profile::where(['user_id' =>  $conversation['sender']['id'] ])->first();
                            /**/ ?>
                            <div class="timeline-heading">
                                <img class="img-responsive" src="<?php echo e((isset($sender_profile->image) && $sender_profile->image !="" && $sender_profile->image !=NULL)? url('student/file').'/profile_pictures/'.$sender_profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($conversation['sender']['first_name']); ?>" alt=""/>
                            </div>
                            <div class="timeline-body text-justify">
                                <h6><strong><a href="#"><?php echo e(ucfirst($conversation['subject'])); ?></a></strong></h6>
                                <p><?php echo implode(' ', array_slice(explode(' ', $conversation['body']), 0, 30)); ?> ....
                                    <a class="btn-u btn-u-sm" href="javascript:showMessage('<?php echo \Crypt::encrypt($conversation['id']); ?>')">Read More</a>
                            </div>
                            <div class="timeline-footer">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-clock-o"></i> <?php echo e(date('F d, Y', strtotime($conversation['created_at']))); ?></li>
                                    <li><i class="fa fa-comments-o"></i> <a href="#"> <?php echo e(explode(',', $conversation['sender']['first_name'])[0]); ?></a></li>
                                </ul>
                                <a class="likes" href="#"><i class="fa fa-heart"></i>0</a>
                            </div>
                        </div>
                    </li>
            <?php endif; ?>
        <?php endforeach; ?>
            <li class="clearfix" style="float: none;"></li>
        </ul>
        <center>
            <div class="row">
                <?php echo $conversations->links(); ?>

            </div>
        </center>
    </div>
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel4">View Conversation</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/plugins/jquery.lazyload.js')); ?>"></script>
    <script type="text/javascript">
        function showMessage(id){
            $.ajax({
                url: '<?php echo url('student/conversation-view'); ?>',
                data: {'_token':'<?php echo csrf_token(); ?>', 'id':id},
                method: 'post',
                success:function(response){
                    $("#view .modal-body").html(response);
                    $('#view').modal('show');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.myprofile.myprofile_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>