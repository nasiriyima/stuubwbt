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
                    <td>
                        <?php if($student->last_login != NULL): ?>
                        <?php echo e($student->last_login->format('d M, Y')); ?> (<?php echo e($student->last_login->diffForHumans()); ?>)
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($student->last_login != NULL): ?>
                            <?php if($student->userStatus(0,60)->find($student->id) != NULL): ?>
                                <span class="label label-green rounded-2x">Active</span>
                            <?php elseif($student->userStatus(60, 90)->find($student->id) != NULL): ?>
                                <span class="label label-yellow rounded-2x">Dormant</span>
                            <?php else: ?>
                                <span class="label label-red rounded-2x">In Active</span>
                            <?php endif; ?>
                        <?php else: ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php /**/$count++/**/ ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>