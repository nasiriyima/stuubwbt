<?php $__env->startSection('pagetitle'); ?>
SYSTEM USER MANAGEMENT
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">System Users</a></li>
        <li><a href="#role" data-toggle="tab">System Roles</a></li>
        <li><a href="#log" data-toggle="tab">Activity Log</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="row">
                <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Users Name</th>
                            <th>E-Mail</th>
                            <th>Last Seen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($staffs as $staff): ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo e($staff->first_name); ?></td>
                            <td><?php echo e($staff->email); ?></td>
                            <td><span class="label label-primary rounded-2x"><?php echo e($staff->last_login->diffForHumans()); ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="role">
            <div class="row">
                <div class="col-md-1 pull-right">
                    <a href="javascript:void(0);" onclick="togglerole()"><i class="fa fa-3x fa-plus" id="addrolebtn"></i><i class="fa fa-3x fa-ban" style="display: none;" id="addrolebtn"></i></a>
                    <a href="javascript:void(0);" onclick="togglerole()"><i class="fa fa-3x fa-ban" style="display: none;" id="addroleclose"></i></a>
                </div>
            </div>
            <div class="row" id="addrole" style="display:none;">
                <div class="col-md-12">
                    <form action="javascript:void(0);" id="sky-form" class="sky-form">
                        <header>Checkout form</header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input">
                                        <input type="text" name="fname" placeholder="Role Slug">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input">
                                        <input type="text" name="lname" placeholder="Role Name">
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <section>
                                    <?php foreach($modules as $module): ?>
                                        <h4><strong><?php echo e($module->name); ?></strong></h4>
                                            <div class="inline-group">
                                                <?php foreach($module->permission as $permission): ?>
                                                    <div class="col-md-3">
                                                        <label class="checkbox"><input type="checkbox" name="radio-inline" class="permission" value="<?php echo e($permission->slug); ?>"><i class="rounded-x" ></i><?php echo e($permission->name); ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <br/>
                                    <?php endforeach; ?>
                            </section>
                        </fieldset>

                        <footer>
                            <button type="submit" class="btn-u" onclick="createRole()">Create Role</button>
                        </footer>
                    </form>
                </div>
            </div>
            <div class="row" id="listrole">
                <div class="col-md-12">
                    <div class="row tab-v3">
                        <div class="col-sm-3">
                            <ul class="nav nav-pills nav-stacked">
                                <?php /**/$count = 1/**/ ?>
                                <?php foreach($roles as $role): ?>
                                <li class = "<?php echo e(($count == 1)? 'active':''); ?>"><a href="#role-<?php echo e($count); ?>" data-toggle="tab"> <?php echo e($role->name); ?></a></li>
                                <?php /**/$count++/**/ ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <?php /**/$count = 1/**/ ?>
                                <?php foreach($roles as $role): ?>
                                <div class="tab-pane fade in <?php echo e(($count == 1)? 'active':''); ?>" id="role-<?php echo e($count); ?>">
                                    <?php echo e($role->name); ?>

                                </div>
                                <?php /**/$count++/**/ ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="log">
            <div class="row">
                <div class="col-md-12">
               
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagecss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageplugins'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/dataTables/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/js/forms/checkout.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/assets/plugins/ckeditor/ckeditor.js')); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            CheckoutForm.initCheckoutForm();
        });
    </script>
    <script type="text/javascript">
        function togglerole(){
            $('#addrole').toggle('slow');
            $('#listrole').toggle('slow');
            $('#addrolebtn').toggle();
            $('#addroleclose').toggle();
        }
        function createRole(){
            var permissions = [];
            $(".permission:checked").each(function() {
                permissions.push(this.value);
            });
            var rslug = $("input[name=fname]").val();
            var rname = $("input[name=lname]").val();

            if(rname == '' || rslug == ''){
                return false;
            }else{
                $.ajax({
                        url: '<?php echo e(url('admin/add-role')); ?>',
                        method: 'POST',
                        dataType: 'json',
                        data:{
                            permissions: permissions,
                            rname: rname,
                            rslug: rslug,
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(rsp){
                                console.log(rsp);
                        },
                        error: function(err){

                        }
                })
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>