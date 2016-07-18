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
                            <?php /**/$redundant_question= [];/**/ ?>
                            <?php foreach($questions->get() as $question): ?>
                            <?php foreach($selections as $answeredquestion => $answer): ?>
                            <?php /**/if(!in_array($question->id,$redundant_question) && $question->id == $answeredquestion):/**/ ?>
                            <?php /**/array_push($redundant_question,$question->id);/**/ ?>
                            <li class="<?php echo e(($count==1)? 'active' : ''); ?>" id="question-side-menu<?php echo e($count); ?>">
                                <a href="javascript:void(0);" onclick="gotoQuestion('<?php echo e($count); ?>','<?php echo e($question->id); ?>');">
                                    <span class="badge badge-<?php echo e(($question->option()->correctAnswer()->id == $answer)? 'green' : 'red'); ?> pull-right rounded-x" id="side-menu-badge<?php echo e($count); ?>"><?php echo e($count +  2); ?></span>
                                    Question - <?php echo e($count); ?>

                                </a>
                            </li>
                            <?php /**/endif;/**/ ?>
                            <?php endforeach; ?>
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
    <?php /**/$redundantquestion= [];/**/ ?>
    <?php foreach($questions->get() as $question): ?>
    <?php foreach($selections as $answeredquestion => $answer): ?>
    <?php /**/if(!in_array($question->id,$redundantquestion) && $question->id == $answeredquestion):/**/ ?>
    <?php /**/array_push($redundantquestion,$question->id);/**/ ?>
    <div class="shadow-wrapper" id="question-<?php echo e($questionCount); ?>" style="<?php echo e(($questionCount==1)? '' : 'display:none;'); ?>">
        <blockquote  class="tag-box tag-box-v1 box-shadow shadow-effect-2">
            <p><span class="dropcap-bg"><?php echo e($questionCount); ?></span><em id="question"><?php echo $question->name; ?></em></p>
        </blockquote>
        <?php /**/$questionids[$question->id]= "0";/**/ ?>
        <?php if(count($question->option) > 0): ?>
        <div class="note note-success">
            <?php /**/$optionCount=0;/**/ ?>
            <?php foreach($question->option as $option): ?>
            <label class="radio state-success">
                <input type="radio" class="options<?php echo e($questionCount); ?>" name="option<?php echo e($questionCount); ?>" value="<?php echo e($option->id); ?>" <?php echo e(($option->id == $answer)? 'checked' : ''); ?> disabled>
                <?php if($question->option()->correctAnswer()->id == $option->id): ?>
                <span class="badge badge-green rounded-2x"><?php echo e(ucwords(\App\Http\Controllers\StudentController::generateOptionLable($optionCount))); ?>.&nbsp;<?php echo e($option->name); ?></span>
                <?php elseif($answer != $question->option()->correctAnswer()->id && $option->id == $answer): ?>
                <span class="badge badge-red rounded-2x"><?php echo e(ucwords(\App\Http\Controllers\StudentController::generateOptionLable($optionCount))); ?>.&nbsp;<?php echo e($option->name); ?></span>
                <?php else: ?>
                <?php echo e(ucwords(\App\Http\Controllers\StudentController::generateOptionLable($optionCount))); ?>.&nbsp;<?php echo e($option->name); ?>

                <?php endif; ?>
            </label>
            <?php /**/$optionCount++;/**/ ?>
            <?php endforeach; ?>
            <input type="hidden" name="selection" value="" />
        </div>
        <?php endif; ?>
        <ul class="pager">
            <li class="previous" style="<?php echo e(($questionCount==1)? 'display:none' : ''); ?>"><a class="rounded-4x" href="javascript:void(0);" onclick="previousQuestion('<?php echo e($questionCount); ?>','<?php echo e($question->id); ?>');">← Older</a></li>
            <li class="next"><a class="rounded-4x" href="javascript:void(0);" onclick="nextQuestion('<?php echo e($questionCount); ?>','<?php echo e($question->id); ?>');"><?php echo ($questionCount==count($questions->get()))? 'Retake &ofcir;' : 'Newer →'; ?></a></li>
        </ul>
    </div>
    <?php /**/endif;/**/ ?>
    <?php endforeach; ?>
     <?php /**/$questionCount++;/**/ ?>
    <?php endforeach; ?>
</div>

<div class="modal fade finish-waring-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-warning">
                    <div class="modal-header alert alert-warning fade in text-center">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 id="myLargeModalLabel3" class="modal-title">WBT Warning Message!</h4>
                    </div>
                    <div class="modal-body alert alert-warning fade in text-center">
                        <p>If you want to retake this exam click YES on this dialog or click NO to return to exam score board</p>
                        <a class="btn-u btn-u-xs btn-u-default" href="<?php echo e((isset($trynow) && $trynow)? url('web/try-now') : url('student/instructions')); ?>/<?php echo e(\Session::get('body')); ?>/<?php echo e(\Session::get('category')); ?>/<?php echo e(\Session::get('subject')); ?>/<?php echo e(\Session::get('month')); ?>/<?php echo e(\Session::get('session')); ?>">YES</a>
                        <a class="btn-u btn-u-xs btn-u-default" href="<?php echo e((isset($trynow) && $trynow)? url('web/exam-complete') : url('student/exam-complete')); ?>">NO</a>

                    </div>
            </div>
    </div>
</div>
<!-- End Small Modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customjs'); ?>
<script type="text/javascript">
    function nextQuestion(previous,question_id){
        var totalQuestion = parseInt("<?php echo $questions->count(); ?>");
        var next = parseInt(previous) + 1;
        if(next <= totalQuestion){
            $("#question-"+next).css("display","");
            $("#question-"+previous).css("display","none");
            $("input[name=active_question]").val(next);
            $("#question-side-menu"+next).attr("class","active");
            $("#question-side-menu"+previous).attr("class","");
        } else {
            $("#question-side-menu"+next).attr("class","active");
            $("#question-side-menu"+previous).attr("class","");
            $(".finish-waring-message").modal("show");
        }
    }
    
    function previousQuestion(next,question_id){
        var previous = parseInt(next) - 1;
        if(previous > 0){
            $("input[name=active_question]").val(previous);
            $("#question-"+next).css("display","none");
            $("#question-"+previous).css("display","");
            $("#question-side-menu"+previous).attr("class","active");
            $("#question-side-menu"+next).attr("class","");
        }
    }
    
    function gotoQuestion(count,question_id){
        var activequestion = $("input[name=active_question]").val();
        $("#question-"+activequestion).css("display","none");
        $("#question-"+count).css("display","");
        $("#question-side-menu"+count).attr("class","active");
        $("#question-side-menu"+activequestion).attr("class","");
        $("input[name=active_question]").val(count);
    }
	
    $("#remaining").countdown("stop");
    $("#remaining").text("<?php echo $elapsed_time; ?>");
    
    function finish(){
        
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.myexam.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>