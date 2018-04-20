<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Update Profile</div>
            </div>
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
               <?php echo e(Form::open(array('url' => 'user/update/'.$user_id, 'name' => 'report'))); ?>

                <div class="form-group">
                	<?php echo e(Form::label('organization', 'Organization')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('organization',$user->organization, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('mailingaddress', 'Mail Address')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('mailingaddress',$user->mailingaddress, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('ntn', 'NTN')); ?>

                    <div>
                        <?php echo e(Form::text('ntn',$user->ntn, array('class' => 'form-control'))); ?>

                    </div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('firstname', 'First Name')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('firstname',$user->firstname, array('class' => 'form-control'))); ?>

                    </div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('lastname', 'Last Name')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('lastname',$user->lastname, array('class' => 'form-control'))); ?>

                	</div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('designation', 'Designation')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('designation',$user->designation, array('class' => 'form-control'))); ?>

                	</div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('phonenumber', 'Phone Number')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('phonenumber',$user->phonenumber, array('class' => 'form-control'))); ?>

                	</div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('email', 'Emial Id')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('email',$user->email, array('class' => 'form-control'))); ?>

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