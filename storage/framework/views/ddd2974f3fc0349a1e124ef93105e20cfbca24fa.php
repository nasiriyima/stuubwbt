<?php $__env->startSection('sidemenu'); ?>
<div class="header-v7 header-left-v7">
    <nav class="navbar navbar-default mCustomScrollbar" role="navigation" data-mcs-theme="minimal-dark">
        <div class="menu-container">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
                            <li class="active">
                                    <a href="#">
                                            <span class="badge pull-right rounded-x">1</span>
                                            Session
                                    </a>
                            </li>
                            <li>
                                    <a href="#">
                                            <span class="badge pull-right rounded-2x">2</span>
                                            Instruction
                                    </a>
                            </li>
                            <li>
                                    <a href="#">
                                            <span class="badge pull-right rounded-2x">3</span>
                                            Questions
                                    </a>
                            </li>
                    </ul>
                </div>
            </div>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel panel-grey margin-bottom-40">
        <div class="panel-body">
            <form class="form-inline" role="form" action="javascript:void(0);">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <input type="hidden" name="body" value="<?php echo e($body); ?>" />
                    <input type="hidden" name="category" value="<?php echo e($category); ?>" />
                    <input type="hidden" name="subject" value="<?php echo e($subject); ?>" />
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Exam Month</label>
                            <div class="btn-group">
                                <button type="button" class="btn-u btn-u-blue">
                                        <i class="fa fa-calendar"></i>
                                        <span id="month">Select Month</span>
                                </button>
                                <button type="button" class="btn-u btn-u-blue btn-u-split-blue dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-angle-down"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                        <li><a href="javascript:void(0);" onclick="getMonth('Select Month')">Select Month</a></li>
                                        <?php foreach($months as $month): ?>
                                        <li><a href="javascript:void(0);" onclick="getMonth('<?php echo e($month->id); ?>','<?php echo e($month->name); ?>')"><?php echo e($month->name); ?></a></li>
                                        <?php endforeach; ?>
                                        <input type="hidden" name="month" value="" />
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Exam Session</label>
                            <div class="btn-group">
                                <button type="button" class="btn-u btn-u-blue">
                                        <i class="fa fa-calendar"></i>
                                        <span id="session">Select Session</span>
                                </button>
                                <button type="button" class="btn-u btn-u-blue btn-u-split-blue dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-angle-down"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="javascript:void(0);" onclick="getSession('Select Session')">Select Session</a></li>
                                    <?php foreach($sessions as $session): ?>
                                    <li><a href="javascript:void(0);" onclick="getSession('<?php echo e($session->id); ?>','<?php echo e($session->name); ?>')"><?php echo e($session->name); ?></a></li>
                                    <?php endforeach; ?>
                                    <input type="hidden" name="session" value="" />
                                </ul>
                            </div>
                        </div>
                    <input type="submit" class="btn-u btn-u-green" onclick="submitform();" value="Continue">
                        <div class="" id="exam-instructions">
                
                        </div>
                </form>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customjs'); ?>
<script type="text/javascript">
    var instructionurl = "<?php echo url('student/instruction'); ?>";
</script>
<script type="text/javascript" src="<?php echo e(asset('public/assets/js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.myexam.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>