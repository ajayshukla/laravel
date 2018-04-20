<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('organization') ? ' has-error' : ''); ?>">
                            <label for="organization" class="col-md-4 control-label">Organization</label>

                            <div class="col-md-6">
                                <input id="organization" type="text" class="form-control" name="organization" value="<?php echo e(old('organization')); ?>" required autofocus>

                                <?php if($errors->has('organization')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('organization')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!--<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>-->
                        
                        <div class="form-group<?php echo e($errors->has('mailingaddress') ? ' has-error' : ''); ?>">
                            <label for="mailingaddress" class="col-md-4 control-label">Mailing  Address</label>

                            <div class="col-md-6">
                                <input id="mailingaddress" type="text" class="form-control" name="mailingaddress" value="<?php echo e(old('mailingaddress')); ?>" required>

                                <?php if($errors->has('mailingaddress')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('mailingaddress')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('ntn') ? ' has-error' : ''); ?>">
                            <label for="ntn" class="col-md-4 control-label">NTN</label>

                            <div class="col-md-6">
                                <input id="ntn" type="text" class="form-control" name="ntn" value="<?php echo e(old('ntn')); ?>" required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname')); ?>" required autofocus>

                                <?php if($errors->has('firstname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" required autofocus>

                                <?php if($errors->has('lastname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('designation') ? ' has-error' : ''); ?>">
                            <label for="designation" class="col-md-4 control-label">Designation</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control" name="designation" value="<?php echo e(old('designation')); ?>" required autofocus>

                                <?php if($errors->has('designation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('designation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('phonenumber') ? ' has-error' : ''); ?>">
                            <label for="phonenumber" class="col-md-4 control-label">Phone Number (Mobile)</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="<?php echo e(old('phonenumber')); ?>" required autofocus>

                                <?php if($errors->has('phonenumber')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phonenumber')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>