<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Change Password</div>
            </div>
            <span class="error">&nbsp;*</span> <b>Fields must be required.</b>
            	<?php if(Session::has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('message')); ?>

                    </div>
                <?php endif; ?>
               <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="portlet-body">
            <?php echo e(Form::open(array('url' => 'user/updatepassword/'.$user_id,'name' => 'changepassword'))); ?>

                <div class="form-group">
                	<?php echo e(Form::label('newpassword', 'New Password')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::password('password', array('class' => 'form-control','id' => 'password'))); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('confirmpassword', 'Confirm Password')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::password('password_confirmation', array('class' => 'form-control','id' => 'password_confirmation'))); ?>

                    </div>
                </div>
                <?php echo e(Form::submit('Update',array('class' => 'btn btn-success'))); ?>

        <?php echo e(Form::close()); ?>       
        </div>
                    
        <!-- End: life time stats -->
    </div>
    <!-- END CONTENT BODY -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>