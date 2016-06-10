<?php $__env->startSection('pagestyles'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/pages/shortcode_timeline2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagecontent'); ?>
    <div class="profile-body">
        <div class="profile-bio">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-responsive md-margin-bottom-10" src="<?php echo e(asset('public/assets/img/team/img32-md.jpg')); ?>" alt="">
                    <a class="btn-u btn-u-sm" href="#">Change Picture</a>
                </div>
                <div class="col-sm-7">
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-cog"></i> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h2>
                        </div>
                        <div class="panel-body">
                            <p><?php echo e(isset($user->profile->description) ? $user->profile->description : 'User profile description not available. Please use the cog icon in this box to add profile description'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/end row-->

        <hr>

        <div class="row">
            <!--Social Icons v3-->
            <div class="col-sm-12 sm-margin-bottom-30">
                <div class="panel panel-profile">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Social Contacts <small>(option 1)</small></h2>
                        <a href="#"><i class="fa fa-cog pull-right"></i></a>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled social-contacts-v2">
                            <?php if(isset($user->profile->social_contact)): ?>
                                <?php /**/
                                        $social_contact = $user->profile->social_contact;
                                        $contacts = json_decode($social_contact);
                                 /**/ ?>
                                <ul class="list-unstyled social-contacts-v2">
                                    <?php foreach($contacts as $contact): ?>
                                        <li><i class="<?php echo e($contact->icon); ?>"></i> <a href="<?php echo e($contact->address); ?>"><?php echo e($contact->name); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                Social media contacts not yet available, please use the cog icon to add new social media contact information
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End Social Icons v3-->
        </div><!--/end row-->

        <hr>

        <!--Timeline-->
        <div class="panel panel-profile">
            <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Education</h2>
                <a href="#"><i class="fa fa-cog pull-right"></i></a>
            </div>
            <div class="panel-body">
                <ul class="timeline-v2 timeline-me">
                    <?php if(isset($user->profile->school)): ?>
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <h2><?php echo e($user->profile->school->name); ?></h2>
                        </div>
                    <?php else: ?>
                        school information not yet available, please use the cog icon to add institutional information
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!--=== End Profile ===-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.myprofile.myprofile_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>