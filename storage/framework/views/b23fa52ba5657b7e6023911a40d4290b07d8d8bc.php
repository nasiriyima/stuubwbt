<?php $__env->startSection('pagetitle'); ?>
SYSTEM USER MANAGEMENT
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="tab-v1">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Edit Staff Details</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <?php echo Form::open(array('url' => url('admin/update-staff-profile'),'class'=>'sky-form', 'id'=>'sky-form')); ?>

            <input type="hidden" name="staffid"  value="<?php echo e(Crypt::encrypt($staff->id)); ?>">
            <fieldset>
                <div class="row">
                    <section class="col col-6">
                        <label class="input">
                            <span>STAFF NAME</span>
                            <input type="text" name="first_name" placeholder="Full Name" value="<?php echo e($staff->first_name); ?>">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="input">
                            <span>EMAIL</span>
                            <input type="text" name="email" placeholder="Email Address" value="<?php echo e($staff->email); ?>">
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
                    <button type="submit" class="btn-u">Update Staff Details</button>
                </div>
            </footer>
            <?php echo Form::close(); ?>

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
        function toggleuser(){
            $('#userlist').toggle();
            $('#adduser').toggle();
            $('#adduserbtn').toggle();
            $('#closeuseradd').toggle();
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