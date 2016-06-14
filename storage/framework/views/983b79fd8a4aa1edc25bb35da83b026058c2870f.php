<?php $__env->startSection('pagetitle'); ?>
NEWS MANAGEMENT
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-40">
                <div class="col-md-6">
                    <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i>Published</a>
                            <span class="badge badge-red rounded-x">3</span>
                        </li>
                        <li>
                            <a class="rounded" href="#"><i class="fa fa-cog"></i>Settings</a>
                            <span class="badge badge-blue">7</span>
                        </li>
                        <li>
                            <a class="rounded-2x" href="#"><i class="fa fa-gift"></i>Bounces</a>
                            <span class="badge badge-dark rounded-x">5</span>
                        </li>
                        <li>
                            <a  class="rounded-3x" href="#"><i class="fa fa-exclamation-triangle"></i>Alerts</a>
                            <span class="badge badge-yellow rounded">2</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 pull-right">
                    <a href="<?php echo e(url('admin/news-item/add')); ?>">
                        <center>
                            <i class="icon-custom rounded-x icon-bg-grey icon-line  icon-plus"></i><br/>
                            <strong>ADD NEWS</strong>
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
                        <div class="row">
                            <div class="col-sm-12 news-v3">
                                <div class="news-v3-in-sm no-padding">
                                    <ul class="list-inline posted-info">
                                        <li>By <?php echo e($newsitem->user->first_name); ?> <?php echo e($newsitem->user->last_name); ?></li>
                                        <li>Posted <?php echo e($newsitem->created_at->format('F d, Y' )); ?></li>
                                    </ul>
                                    <h2><a href="<?php echo e(url('')); ?>"><?php echo e($newsitem->title); ?></a><span class="label label-default">test</span></h2>
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