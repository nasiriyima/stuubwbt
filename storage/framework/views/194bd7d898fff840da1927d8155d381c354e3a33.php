<div class="row">
    <div class="col-md-1 pull-right">
        <a href="javascript:void(0);" onclick="toggleuser()">
            <i class="fa fa-3x fa-user-plus" id="adduserbtn"></i>
        </a>
        <a href="javascript:void(0);" onclick="toggleuser()">
            <i class="fa fa-3x fa-ban" style="display: none;" id="closeuseradd"></i>
        </a>
    </div>
</div>
<br/>
<div class="row" id="userlist">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Users Name</th>
                <th>E-Mail</th>
                <th>Last Seen</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($staffs as $staff): ?>
                <tr>
                    <td>1</td>
                    <td><?php echo e($staff->first_name); ?></td>
                    <td><?php echo e($staff->email); ?></td>
                    <td>
                        <span class="label label-primary rounded-2x">
                            <?php if(empty($staff->last_login)): ?>
                                No Login
                            <?php else: ?>
                            <?php echo e($staff->last_login->diffForHumans()); ?>

                            <?php endif; ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?php echo e(url('admin/users-management')); ?>/<?php echo e(\Crypt::encrypt($staff->id)); ?>/edit">Edit</a> |
                        <a href="#">Disable</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row" id="adduser" style="display: none;">
    <div class="col-md-12">
        <?php echo Form::open(array('url' => url('auth/create-staff'),'class'=>'sky-form', 'id'=>'sky-form')); ?>

            <fieldset>
                <div class="row">
                    <section class="col col-4">
                        <label class="input">
                            <span>STAFF NAME</span>
                            <input type="text" name="fname" placeholder="Full Name">
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="input">
                            <span>EMAIL</span>
                            <input type="text" name="email" placeholder="Email Address">
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="input">
                            <span>PASSWORD</span>
                            <input type="password" name="password" placeholder="Default Password">
                        </label>
                    </section>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <h5>USER ROLE(S)</h5>
                    <div class="inline-group">
                        <?php foreach($roles as $role): ?>
                            <div class="col-md-3">
                                <label class="checkbox"><input type="checkbox" name="userroles[]" value="<?php echo e($role->slug); ?>"><i class="rounded-x" ></i><?php echo e($role->name); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </fieldset>
            <footer>
                <div class="pull-right">
                    <button type="submit" class="btn-u">Create User</button>
                </div>
            </footer>
        <?php echo Form::close(); ?>

    </div>
</div>