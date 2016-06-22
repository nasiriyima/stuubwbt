<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Last Seen</th>
                <th>Profile</th>
                <th>School</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($students as $student): ?>
                <?php /**/
                $profileStats = ($student->profile)?
                $student->profile()->statistics() : 0;
                /**/ ?>

                <tr>
                    <td>1</td>
                    <td>
                        <a href="<?php echo e(url('admin/student-profile')); ?>/<?php echo e(\Crypt::encrypt($student->id)); ?>">
                            <?php echo e($student->first_name); ?>

                            (<?php echo e($student->email); ?>)
                        </a>
                    </td>
                    <td><?php echo e($student->created_at->format('d-M-Y')); ?> (<?php echo e($student->created_at->diffForHumans()); ?>)</td>
                    <td>
                        <div class="progress progress-u progress-xxs">
                                        <span class="progress-bar <?php echo e(($profileStats < 30)? 'progress-bar-red':($profileStats < 70)? 'progress-bar-warning':'progress-bar-success'); ?>" style="width: <?php echo e($profileStats); ?>%">
                                        </span>
                        </div>
                    </td>
                    <td>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>