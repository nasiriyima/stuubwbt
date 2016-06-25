<?php $__env->startSection('maincontent'); ?>
<!-- Tab v1 -->
<div class="tab-v1">
        <ul class="nav nav-tabs">
            <?php foreach($bodies as $index => $body): ?>
                <li class="<?php echo e(($index == 0)? 'active' : ''); ?>"><a href="#<?php echo e($body->id); ?>-<?php echo e($index); ?>" data-toggle="tab"><?php echo e($body->code); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content">
            <?php foreach($bodies as $index => $body): ?>
            <div class="tab-pane fade in <?php echo e(($index==0)? 'active' : ''); ?>" id="<?php echo e($body->id); ?>-<?php echo e($index); ?>">
                    <div class="row">
                        <img alt="<?php echo e($body->name); ?>" class="pull-left lft-img-margin img-width-200" src="<?php echo e(asset('public/assets/img/clients4/'.$body->logo)); ?>">
                        <h4><a href="#"><?php echo e($body->name); ?></a></h4>
                        <p>
                            <div class="input-group-btn">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                            Select <?php echo e($body->code); ?> exam categories
                                            <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php foreach($categories as $key => $category): ?>
                                            <?php if($key==count($categories)-1): ?>
                                            <li class="divider"></li>
                                            <li><a href="javascript:void(0);" onclick="getSubjects('<?php echo e($body->id); ?>','<?php echo e($category->id); ?>');"><?php echo e($category->name); ?></a></li>
                                            <?php else: ?>
                                            <li><a href="javascript:void(0);" onclick="getSubjects('<?php echo e($body->id); ?>','<?php echo e($category->id); ?>');"><?php echo e($category->name); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                            </div>
                        </p>
                            <div class="col-md-12">
                                    <div class="row-fluid <?php echo e($body->id); ?>-subjects">
                                        <div class="tab-pane fade in <?php echo e(($index == 0)? 'active' : ''); ?>">
                                            <p><span class="label label-success rounded">Please Select a category to view subjects</span>
                                        </div>
                                        <div class="row content-boxes-v2">
                                            <div class="tag-box tag-box-v1 text-justify">
                                                <ul class="pagination">
                                                    <li><a href="#" data-toggle="tab">&laquo;</a></li>
                                                    <li class="active"><a href="#" data-toggle="tab">1</a></li>
                                                    <li><a href="#" data-toggle="tab">&raquo;</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>
            </div>
            <?php endforeach; ?>
        </div>
</div>
<!-- End Tab v1 -->

<div class="margin-bottom-30"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>
<script type="text/javascript">
    var subjectsurl = "<?php echo url('student/subjects'); ?>";
    var sessionsurl = "<?php echo url('student/session'); ?>";
    var csrf = "<?php echo csrf_token(); ?>";
    var timeleft = '00:00:00';
</script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>