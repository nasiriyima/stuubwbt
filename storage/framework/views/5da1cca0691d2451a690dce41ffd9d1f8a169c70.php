<?php $__env->startSection('pagetitle'); ?>
STUDENT MANAGER
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-10">
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="<?php echo e(url('admin/news-item/add')); ?>"><i class="icon-line icon-note"></i>Active Accounts</a>
                                <span class="badge badge-green rounded-x"></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="<?php echo e(url('admin/provider-manager')); ?>"><i class="fa fa-check-circle-o"></i>Dormant Accounts</a>
                                <span class="badge badge-green rounded-x"></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="<?php echo e(url('admin/provider-manager')); ?>"><i class="fa fa-ban"></i>Unpublished</a>
                                <span class="badge badge-yellow rounded-x"></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="<?php echo e(url('admin/provider-manager')); ?>"><i class="fa fa-trash"></i>Thrashed</a>
                                <span class="badge badge-red rounded-x">6</span>
                            </li>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Registered Students</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <?php echo $__env->make('admin.student.registered', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageplugins'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.js')); ?>"></script>
<script>
    jQuery(document).ready(function() {
        $(".table").DataTable();

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>