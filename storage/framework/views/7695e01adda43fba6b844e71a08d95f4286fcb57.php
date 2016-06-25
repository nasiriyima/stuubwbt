<?php $__env->startSection('sidemenu'); ?>
<div class="header-v7 header-left-v7">
    <nav class="navbar navbar-default mCustomScrollbar" role="navigation" data-mcs-theme="minimal-dark">
        <div class="menu-container">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
                        <li class="">
                            <a data-toggle="modal" data-target=".bs-example-modal-sm">
                                    <span class="badge badge-green pull-right rounded-x">1</span>
                                    Session
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="modal" data-target=".bs-example-modal-sm">
                                    <span class="badge badge-green pull-right rounded-x">2</span>
                                    Instructions
                            </a>
                        </li>
                            <?php /**/$count=1;/**/ ?>
                            <?php foreach($questions->get() as $question): ?>
                            <li class="<?php echo e(($count==1)? 'active' : ''); ?>" id="question-side-menu<?php echo e($count); ?>">
                                <a href="javascript:void(0);" onclick="gotoQuestion('<?php echo e($count); ?>');">
                                    <span class="badge pull-right rounded-x" id="side-menu-badge<?php echo e($count); ?>"><?php echo e($count +  2); ?></span>
                                    Question - <?php echo e($count); ?>

                                </a>
                            </li>
                            <?php /**/$count++;/**/ ?>
                            <?php endforeach; ?>
                    </ul>
                </div>
            </div>
    </nav>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-9">
    <?php /**/$questionCount=1;/**/ ?>
    <?php /**/$questionids=[];/**/ ?>
    <input type="hidden" value="<?php echo e($questionCount); ?>" name="active_question" />
    <?php foreach($questions->get() as $question): ?>
    <div class="shadow-wrapper" id="question-<?php echo e($questionCount); ?>" style="<?php echo e(($questionCount==1)? '' : 'display:none;'); ?>">
        <blockquote  class="tag-box tag-box-v1 box-shadow shadow-effect-2">
            <p><span class="dropcap-bg"><?php echo e($questionCount); ?></span><em id="question"><?php echo $question->name; ?></em></p>
        </blockquote>
        <?php /**/$questionids[$question->id]= "0";/**/ ?>
        <?php if(count($question->option) > 0): ?>
        <div class="note note-success">
            <?php /**/$optionCount=0;/**/ ?>
            <?php foreach($question->option as $option): ?>
            <label class="radio state-success"><input type="radio" class="options<?php echo e($questionCount); ?>" name="option<?php echo e($questionCount); ?>" value="<?php echo e($option->id); ?>"><?php echo e(ucwords(\App\Http\Controllers\StudentController::generateOptionLable($optionCount))); ?>.&nbsp;<?php echo e($option->name); ?></label>
            <?php /**/$optionCount++;/**/ ?>
            <?php endforeach; ?>
            <input type="hidden" name="selection" value="" />
        </div>
        <?php endif; ?>
        <ul class="pager">
            <li class="previous" style="<?php echo e(($questionCount==1)? 'display:none' : ''); ?>"><a class="rounded-4x" href="javascript:void(0);" onclick="previousQuestion('<?php echo e($questionCount); ?>','<?php echo e($question->id); ?>');">← Older</a></li>
            <li class="next"><a class="rounded-4x" href="javascript:void(0);" onclick="nextQuestion('<?php echo e($questionCount); ?>','<?php echo e($question->id); ?>');"><?php echo ($questionCount==count($questions->get()))? 'Finish &ofcir;' : 'Newer →'; ?></a></li>
        </ul>
    </div>
    <?php /**/$questionCount++;/**/ ?>
    <?php endforeach; ?>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-danger">
                    <div class="modal-header alert alert-danger fade in text-center">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 id="myLargeModalLabel3" class="modal-title">WBT Error Message!</h4>
                    </div>
                    <div class="modal-body alert alert-danger fade in text-center">
                        <p>You are not allowed to select this option, because an exam session has already started</p>
                        <p>
                        <a class="btn-u btn-u-xs btn-u-red" data-dismiss="modal" href="#">Continue</a>
                    </div>
            </div>
    </div>
</div>
<div class="modal fade waring-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-warning">
                    <div class="modal-header alert alert-warning fade in text-center">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 id="myLargeModalLabel3" class="modal-title">WBT Warning Message!</h4>
                    </div>
                    <div class="modal-body alert alert-warning fade in text-center">
                        <p>You have chosen to continue without selecting an option. If you wish to select an option for the skipped question, you can go back at anytime during the exam</p>
                        <p><label class="checkbox"><input type="checkbox" name="donot"><i></i>Do not show this prompt again</label>
                        <a class="btn-u btn-u-xs btn-u-default" data-dismiss="modal" href="javascript:void(0);">OK</a>
                    </div>
            </div>
    </div>
</div>

<div class="modal fade finish-waring-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-warning">
                    <div class="modal-header alert alert-warning fade in text-center">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 id="myLargeModalLabel3" class="modal-title">WBT Warning Message!</h4>
                    </div>
                    <div class="modal-body alert alert-warning fade in text-center">
                        <p id="message"></p>
                        <a class="btn-u btn-u-xs btn-u-default" data-dismiss="modal" href="javascript:void(0);">Cancel</a> <a class="btn-u btn-u-xs btn-u-default" onclick="finish();" href="javascript:void(0);">OK</a>
                    </div>
            </div>
    </div>
</div>
<!-- End Small Modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customjs'); ?>
<script type="text/javascript">
    var totalQuestion = parseInt("<?php echo $questions->count(); ?>");
    var timeleft = "<?php echo $time_left; ?>";
    var questionids = JSON.parse('<?php echo json_encode($questionids); ?>');
    var csrf = "<?php echo csrf_token(); ?>";
    var exam = "<?php echo $exam; ?>";
    var examcompleteurl = "<?php echo url('student/exam-complete'); ?>";
</script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.myexam.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>