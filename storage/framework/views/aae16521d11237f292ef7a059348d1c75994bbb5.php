<?php $__env->startSection('pagetitle'); ?>
NEWS MANAGEMENT - <small><?php echo e($newsitem->title); ?></small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
        <div class="news-v3 bg-color-white margin-bottom-30">
            <div class="news-v3-in">
                <ul class="list-inline badge-lists badge-icons margin-bottom-30 pull-right">
                    <li>
                        <a href="#"><i class="fa fa-edit"></i></a>
                        <span class="badge badge-yellow rounded-x"></span>
                    </li>
                    <?php if($newsitem->status == 1): ?>
                    <li>
                        <a href="#"><i class="fa fa-ban"></i></a>
                        <span class="badge badge-yellow rounded-x"></span>
                    </li>
                    <?php endif; ?>
                    <?php if($newsitem->status == 0): ?>
                    <li>
                        <a href="javascript:void();" onclick="publishnewsitem('<?php echo e(Crypt::encrypt($newsitem->id)); ?>')"><i class="fa fa-check-circle-o"></i></a>
                        <span class="badge badge-yellow rounded-x"></span>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="#"><i class="fa fa-trash"></i></a>
                        <span class="badge badge-yellow rounded-x"></span>
                    </li>
                </ul>
                <ul class="list-inline posted-info">
                    <li><strong>By</strong> <?php echo e($newsitem->user->first_name); ?> <?php echo e($newsitem->user->last_name); ?></li>
                    <li><strong>Posted</strong> <?php echo e($newsitem->created_at->format('F d, Y' )); ?></li>
                </ul>
                <h2><?php echo e($newsitem->title); ?>

                    <?php if($newsitem->status == 0): ?>
                    <span class="badge badge-yellow rounded-2x">Unpublished</span>
                    <?php endif; ?>
                    <?php if($newsitem->status == 1): ?>
                        <span class="badge badge-green rounded-2x">Published</span>
                    <?php endif; ?>
                </h2>
                <p><?php echo e($newsitem->caption); ?></p>
                <?php echo $newsitem->post; ?>

            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageplugins'); ?>
    <script type="text/javascript">
        function publishnewsitem(id){
            $.ajax(
                    url:'<?php echo e(url('admin/')); ?>'
            )
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>