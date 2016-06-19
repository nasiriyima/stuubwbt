<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Date Registered</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php /**/$count = 1/**/ ?>
            <?php foreach($students as $student): ?>
                <tr>
                    <td><?php echo e($count); ?></td>
                    <td><a href="<?php echo e(url('admin/student-profile')); ?>/<?php echo e(\Crypt::encrypt($student->id)); ?>"><?php echo e($student->first_name); ?></a></td>
                    <td>
                        <?php echo e($student->email); ?>

                    </td>
                    <td><?php echo e($student->created_at->format('d-M-Y')); ?> (<?php echo e($student->created_at->diffForHumans()); ?>)</td>
                    <td>
                        <span class="label label-green rounded-2x">Active</span>
                    </td>
                </tr>
                <?php /**/$count++/**/ ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>