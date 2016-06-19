<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>School Name</th>
                <th># of Students</th>
            </tr>
            </thead>
            <tbody>
            <?php /**/$count = 1/**/ ?>
            <?php foreach($schools as $school): ?>
                <tr>
                    <td><?php echo e($count); ?></td>
                    <td><?php echo e($school->code); ?></td>
                    <td><a href="<?php echo e(url('admin/school-profile')); ?>/<?php echo e(\Crypt::encrypt($school->id)); ?>"> <?php echo e($school->name); ?></a></td>
                    <td><?php echo e($school->profile->count()); ?></td>
                </tr>
                <?php /**/$count++/**/ ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>