<?php $__env->startSection('pagetitle'); ?>
NEWS MANAGEMENT
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-40">
                <div class="col-md-3">
                    <a href="<?php echo e(url('admin/news-item/add')); ?>">
                        <center>
                            <i class="icon-custom rounded-x icon-bg-grey icon-line  icon-pin"></i><br/>
                            <strong>ADD NEWS</strong>
                        </center>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo e(url('admin/category-manager')); ?>">
                        <center>
                            <i class="icon-custom rounded-x icon-bg-grey icon-line icon-layers"></i><br/>
                            <strong>UNPUBLISHED</strong>
                        </center>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo e(url('admin/subject-manager')); ?>">
                        <center>
                            <i class="icon-custom rounded-x icon-bg-grey icon-line icon-note"></i><br/>
                            <strong>SUBJECTS</strong>
                        </center>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo e(url('admin/exam-manager')); ?>">
                        <center>
                            <i class="icon-custom rounded-x icon-bg-grey icon-line icon-question"></i><br/>
                            <strong>EXAMINATIONS</strong>
                        </center>
                    </a>
                </div>
            </div>
            <div class="margin-bottom-20"><hr></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="tab-content">
            <?php foreach($news as $key => $group): ?>
                <div class="tab-pane fade in <?php echo e(($key+1 == 1)? 'active': ''); ?>" id="page-<?php echo e($key+1); ?>">
                    <?php foreach($group as $newsitem): ?>
                        <div class="row margin-bottom-20">
                            <div class="col-sm-12 news-v3">
                                <div class="news-v3-in-sm no-padding">
                                    <ul class="list-inline posted-info">
                                        <li>By <?php echo e($newsitem->user->first_name); ?> <?php echo e($newsitem->user->last_name); ?></li>
                                        <li>Posted <?php echo e($newsitem->created_at->format('F d, Y' )); ?></li>
                                    </ul>
                                    <h2><a href="#"><?php echo e($newsitem->title); ?></a></h2>
                                    <p><?php echo e($newsitem->caption); ?></p>
                                    <ul class="post-shares">
                                        <li><a href="#"><i class="rounded-x icon-pencil"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix margin-bottom-20"><hr></div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <ul class="pagination">
                <li><a href="#page-1" data-toggle="tab">&laquo;</a></li>
                <?php for($x=1;$x<=count($news);$x++): ?>
                    <li class="($x==1)?'active': '';"><a href="#page-<?php echo e($x); ?>" data-toggle="tab"><?php echo e($x); ?></a></li>
                <?php endfor; ?>
                <li><a href="#page-<?php echo e(count($news)); ?>" data-toggle="tab">&raquo;</a></li>
            </ul>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>