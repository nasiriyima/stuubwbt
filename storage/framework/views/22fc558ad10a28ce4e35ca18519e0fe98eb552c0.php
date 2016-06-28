<?php $__env->startSection('pagestyles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/ladda-buttons/css/custom-lada-btn.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/hover-effects/css/custom-hover-effects.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecontent'); ?>
    <div class="profile-body margin-bottom-20">
        <!--Profile Blog-->
        <div class="panel panel-profile">
            <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Friendship Requests</h2>
                <center><?php echo $friendshipRequests->links(); ?></center>
            </div>
            <div class="panel-body">
                <?php /**/
                    $requests = $friendshipRequests->getCollection()->chunk(2);
                    $count = 0;
                /**/ ?>
                <?php if(count($requests) < 1): ?>
                    You have no friendship requests. Add your social contact information to invite your friends from facebook, google-plus and twitter
                <?php endif; ?>
                <?php foreach($requests as $rows): ?>
                    <div class="row">
                        <?php foreach($rows as $data): ?>
                            <div class="col-sm-6">
                                <div class="profile-blog blog-border">
                                    <img class="rounded-x" src="<?php echo e((isset($data->user->profile->image) && $data->user->profile->image !="" && $data->user->profile->image !=NULL)? url('student/file').'/profile_pictures/'.$data->user->profile->image : asset('public/assets/img/user.jpg')); ?>" alt="<?php echo e($data->user->profile->first_name); ?>">
                                    <div class="name-location">
                                        <strong><a href="<?php echo e(url('student/friend-profile')); ?>/<?php echo e(\Crypt::encrypt($data->user->id)); ?>"><?php echo e($data->user->first_name); ?></a></strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#"><?php echo e(isset($data->user->profile->address) ? $data->user->profile->address : ''); ?></a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p><?php echo e(isset($data->user->profile->school->name) ? $data->user->profile->school->name : ''); ?></p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li id="accept<?php echo e($count); ?>"><i class="fa fa-check"></i><a href="javascript:void(0)" onclick="acceptFriendRequest('<?php echo e(\Crypt::encrypt($data->user->id)); ?>', '<?php echo e($data->user->first_name); ?>', '<?php echo e($count); ?>');">Accept</a></li>
                                        <li><i class="fa fa-group"></i><a href="#"><?php echo e($data->user->friendship()->requestAccepted()->count()); ?> Friends</a></li>

                                    </ul>
                                </div>
                            </div>
                            <?php /**/$count++;/**/ ?>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
        <!--End Profile Blog-->

        <hr>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescripts'); ?>
<script type="text/javascript">
    function showAlert(type, message){
        if(type === 'error'){
            $("div#alert-message").html('<div class="alert alert-danger fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Oh snap!</strong> '+message+'.</div>');
            $("div#alert-message").show("slow");
        }

        if(type === 'success'){
            $("div#alert-message").html('<div class="alert alert-success fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Well done</strong> '+message+'.</div>');
            $("div#alert-message").show("slow");
        }

        if(type === 'warning'){
            $("div#alert-message").html('<div class="alert alert-warning fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> '+message+'.</div>');
            $("div#alert-message").show("slow");
        }

        if(type === 'info'){
            $("div#alert-message").html('<div class="alert alert-info fade in alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Heads up!</strong> '+message+'.</div>');
            $("div#alert-message").show("slow");
        }

        setTimeout(function(){
            $("div#alert-message").hide("slow");
        }, 10000);
    }

    function acceptFriendRequest(id, name, count){
        $.ajax({
            url: "<?php echo url('student/process-friend'); ?>/"+id+"/accept",
            method:"get",
            data: {_token:"<?php echo csrf_token(); ?>", friend:id},
            success:function(response){
                console.log(response);
                if(response.message === "success"){
                    showAlert("success", "You have accepted a friendship request from "+name);
                    $("#accept"+count).replaceWith('<li id="accept'+count+'"><i class="fa fa-user"></i><a href="<?php echo e(url('student/friend-profile')); ?>/'+id+'">Profile</a></li>');
                    return;
                }
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.myprofile.myprofile_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>