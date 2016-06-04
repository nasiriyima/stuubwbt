<!-- Small Default Content Boxes -->
    <div class="tab-content">
        <?php foreach($pages as $key => $groups): ?>
        <div class="tab-pane fade in <?php echo e(($key+1 == 1)? 'active': ''); ?>" id="provider<?php echo e($body); ?>-<?php echo e($key+1); ?>">
            <?php foreach($groups as $exams): ?>
            <div class="row content-boxes-v2 margin-bottom-40">
                <?php foreach($exams as $exam): ?>
                <div class="col-sm-4 sm-margin-bottom-40">
                    <a href="javascript:void(0);" onclick="openTestWindow('<?php echo e($body); ?>','<?php echo e($category); ?>','<?php echo e($exam->subject->id); ?>');">
                        <h2 class="heading-sm">
                            <i class="icon-custom icon-sm icon-bg-u fa fa-lightbulb-o"></i>
                            <span><?php echo e($exam->subject->name); ?></span>
                        </h2>
                    </a>
                    <p><?php echo e($exam->subject->description); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- Small Default Content Boxes -->

    <div class="row content-boxes-v2">
            <div class="tag-box tag-box-v1 text-justify">
                    <ul class="pagination">
                            <li><a href="#provider<?php echo e($body); ?>-1" data-toggle="tab">&laquo;</a></li>
                            <?php for($x=1;$x<=count($pages);$x++): ?>
                            <li class="($x==1)?'active': '';"><a href="#provider<?php echo e($body); ?>-<?php echo e($x); ?>" data-toggle="tab"><?php echo e($x); ?></a></li>
                            <?php endfor; ?>
                            <li><a href="#provider<?php echo e($body); ?>-<?php echo e(count($pages)); ?>" data-toggle="tab">&raquo;</a></li>
                    </ul>
            </div>
    </div>