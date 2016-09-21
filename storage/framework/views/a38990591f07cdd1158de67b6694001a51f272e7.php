<?php $__env->startSection('pagetitle'); ?>
    ADMIN DASHBOARD
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="row">
        <div class="col-sm-7">
            <div class="row content-boxes-v2 content-boxes-v2-o margin-bottom-40">
                <div class="col-sm-6 sm-margin-bottom-40">
                    <h2 class="heading-sm overflow-h">
                        <i class="icon-custom rounded-x icon-bg-u fa fa-users"></i>
                        <span>STUDENT MANAGER <small></small></span>
                    </h2>
                    <hr class="no-margin margin-bottom-10">

                </div>
                <div class="col-sm-6 sm-margin-bottom-40">
                    <h2 class="heading-sm overflow-h">
                        <i class="icon-custom rounded-x icon-bg-u fa fa-users"></i>
                        <span>STUDENT MANAGER <small></small></span>
                    </h2>
                    <hr class="no-margin margin-bottom-10">

                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="tab-v1">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Recent Activity</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>