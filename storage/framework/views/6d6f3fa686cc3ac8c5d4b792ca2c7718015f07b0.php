<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Attempts</th>
                <th>Average Score</th>
            </tr>
            </thead>
            <tbody>
            <?php /**/$count = 1/**/ ?>
            <?php foreach($student->history->groupBy('exam_id') as $exam): ?>
                <?php /**/$examdetails = $exam->first();/**/ ?>
                <tr>
                    <td><?php echo e($count); ?></td>
                    <td>
                        <?php echo e($examdetails->exam->examProvider->code); ?>,
                        <?php echo e($examdetails->exam->subject->name); ?>

                        (<?php echo e($examdetails->exam->month->name); ?>

                        <?php echo e($examdetails->exam->session->name); ?>)
                    </td>
                    <td><?php echo e($exam->count()); ?></td>
                    <?php /**/
                    $averagescore = $exam->average('score');
                    $noQuestions = $examdetails->exam->question->count();
                    $score = $averagescore / $noQuestions;
                    $score = $score * 100;
                    /**/ ?>
                    <td><?php echo e(number_format($score, 1)); ?>%</td>
                </tr>
                <?php /**/$count++/**/ ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>