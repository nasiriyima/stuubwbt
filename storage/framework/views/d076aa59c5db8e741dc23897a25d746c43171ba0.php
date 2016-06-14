<div class="row">
    <div class="col-md-12">
        <?php echo Form::open(array('url' => url('wbt/add-examination-question'),'class'=>'sky-form', 'id'=>'sky-form')); ?>

        <input type="hidden" name="examid" value="<?php echo e(\Crypt::encrypt($exam->id)); ?>">
<!--            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <section>
                            <label class="input">
                                <span>QUESTION TAGS</span>
                                <input type="text" name="tags">
                            </label>
                        </section>
                    </div>
                    <div class="col-md-3">
                        <section>
                            <label class="select">
                                <span>DIFFICULTY</span>
                                <select name="difficulty_id">
                                    <option value="0" selected disabled>Select Question Difficulty</option>
                                </select>
                            </label>
                        </section>
                    </div>
                    <div class="col-md-3">
                        <section>
                            <label class="input">
                                <span>ESTIMATED TIME TO COMPLETE</span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="min" placeholder="Min.">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="sec" placeholder="Sec.">
                                    </div>
                                </div>
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>-->
            <fieldset>
                <div class="row">
                    <div class="col-md-8">
                        <section>
                            <label class="textarea">
                                <span>QUESTION TEXT</span>
                                <textarea rows="2" name="question_name" placeholder="Question Text" id="question" ></textarea>
                            </label>
                        </section>
                    </div>
                    <div class="col-md-4">
                        <section>
                            <label class="select">
                                <span>ADDITIONAL INFORMATION</span>
                                <select class="gender">
                                    <option value="" selected disabled>select - information</option>
                                    <?php foreach($information as $info): ?>
                                    <option value="<?php echo e($info->id); ?>"><?php echo e($info->name); ?></option>
                                    <?php endforeach; ?>
                                    <i></i>
                                </select>
                            </label>
                        </section>
                        <section>
                            <a class="btn-u" data-toggle="modal" data-target="#add_info">New Additional Information</a>
                            <div class="modal fade" id="add_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel4">Enter Additional Information</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label class="textarea">
                                                <textarea rows="4" name="add_info" placeholder="Question Text" id="add_info"></textarea>
                                            </label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn-u btn-u-primary">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="row">
                    <div class="col-md-8">
                        <section>
                            <label class="input">
                                <div class="row">
                                    <?php /**/$count=1;/**/ ?>
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="<?php echo e($count); ?>"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option1" placeholder="Option A">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    <?php /**/$count++;/**/ ?>
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="<?php echo e($count); ?>"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option2" placeholder="Option B">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    <?php /**/$count++;/**/ ?>
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="<?php echo e($count); ?>"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option3" placeholder="Sec.">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    <?php /**/$count++;/**/ ?>
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="<?php echo e($count); ?>"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option4" placeholder="Sec.">
                                    </div>
                                </div>
                            </label>
                            <label class="input">
                                <div class="row">
                                    <?php /**/$count++;/**/ ?>
                                    <div class="col-md-1">
                                        <label class="radio"><input type="radio" name="answer" value="<?php echo e($count); ?>"><i class="rounded-x"></i></label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" name="option5" placeholder="Sec.">
                                    </div>
                                </div>
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>
            <footer>
                <div class="pull-right">
                    <button type="submit" class="btn-u">Save and Add Questions</button>
                </div>
            </footer>
        <?php echo Form::close(); ?>

    </div>
</div>
