<?php $__env->startSection('pagetitle'); ?>
EXAMINATION RESOURCES MANAGER - <small>Examination</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">All Entries</a></li>
        <li class=""><a href="#published" data-toggle="tab">Published</a></li>
        <li class=""><a href="#unpublished" data-toggle="tab">Unpublished</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row margin-bottom-10">
                <div class="col-md-2 pull-right">
                    <a href="<?php echo e(url('admin/add-exam')); ?>" class="btn-u btn-brd btn-brd-hover rounded-2x btn-u-aqua btn-u-xs"><i class="icon-line  icon-education-003"></i> Add Exam</a>                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>Examination</th>
                                 <th class="hidden-sm"><center>Questions</center></th>
                                 <th class="hidden-sm"><center>Average Scores</center></th>
                                 <th class="hidden-sm">Published</th>
                                 <th class="hidden-sm">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach($exams as $exam): ?>
                             <tr>
                                 <td><a href="<?php echo e(url('admin/exam-profile')); ?>/<?php echo e(\Crypt::encrypt($exam->id)); ?>"><?php echo e($exam->examProvider->code); ?>, <?php echo e($exam->subject->name); ?> (<?php echo e($exam->month->code); ?> <?php echo e($exam->session->name); ?>)</a></td>
                                 <td class="hidden-sm"><center>50</center></td>
                                 <td><center>70%</center></td>
                                 <td><span class="label label-info">3 Months Ago</span></td>
                                 <td>3 Months Ago</td>
                             </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="published">
        </div>
        <div class="tab-pane fade in" id="unpublished">
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>