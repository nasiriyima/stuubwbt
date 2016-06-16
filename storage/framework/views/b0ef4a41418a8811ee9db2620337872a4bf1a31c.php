<?php $__env->startSection('pagetitle'); ?>
NEWS MANAGEMENT
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-40">
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="<?php echo e(url('admin/news-item/add')); ?>"><i class="icon-line icon-note"></i>Add News</a>
                                <span class="badge badge-green rounded-x"></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="<?php echo e(url('admin/provider-manager')); ?>"><i class="fa fa-check-circle-o"></i>Published</a>
                                <span class="badge badge-green rounded-x"><?php echo e(count($Cnews->publishedNews())); ?></span>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                            <li>
                                <a href="<?php echo e(url('admin/provider-manager')); ?>"><i class="fa fa-ban"></i>Unpublished</a>
                                <span class="badge badge-yellow rounded-x"><?php echo e(count($Cnews->unpublishedNews())); ?></span>
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
            <div class="margin-bottom-20"><hr></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="tab-content">
            <?php foreach($news as $key => $group): ?>
                <div class="tab-pane fade in <?php echo e(($key+1 == 1)? 'active': ''); ?>" id="page-<?php echo e($key+1); ?>">
                    <?php foreach($group as $newsitem): ?>
                        <div class="row">
                            <div class="col-sm-12 news-v3">
                                <div class="news-v3-in-sm no-padding">
                                    <ul class="list-inline posted-info">
                                        <li>By <?php echo e($newsitem->user->first_name); ?> <?php echo e($newsitem->user->last_name); ?></li>
                                        <li>Posted <?php echo e($newsitem->created_at->format('F d, Y' )); ?></li>
                                    </ul>
                                    <h2><a href="<?php echo e(url('admin/news')); ?>/<?php echo e(Crypt::encrypt($newsitem->id)); ?>"><?php echo e($newsitem->title); ?></a> <span class="badge badge-red rounded-2x">Archive</span></h2>
                                    <p><?php echo e($newsitem->caption); ?></p>
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