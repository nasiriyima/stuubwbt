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
            <?php echo $__env->make('admin.settings.usermgt.users', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="tab-pane fade in" id="role">
            <?php echo $__env->make('admin.settings.usermgt.roles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            var rslug = $("input[name=rslug]").val();
            var rname = $("input[name=rname]").val();

            if(rname == ' ' || rslug == ' '){
                return false;
            }else{
                $.ajax({
                        url: '<?php echo e(url('auth/add-role')); ?>',
                        method: 'POST',
                        dataType: 'json',
                        data:{
                            permissions: permissions,
                            rname: rname,
                            rslug: rslug,
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(rsp){
                                location.reload();
                        },
                        error: function(err){

                        }
                })
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>