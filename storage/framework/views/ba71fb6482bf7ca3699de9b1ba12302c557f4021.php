<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php echo e($users->firstname); ?>&nbsp;<?php echo e($users->lastname); ?> Profile </div>
                                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="actions">
                                        <a href="<?php echo e(url('user/edit', $user_id)); ?>" class="btn btn-circle btn-info">
                                            <span class="hidden-xs"> Edit </span>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> organization </div>
                                        <div class="col-md-7 value"> <?php echo e($users->organization); ?>

                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Mail Address </div>
                                        <div class="col-md-7 value"> <?php echo e($users->mailingaddress); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> NTN </div>
                                        <div class="col-md-7 value"><?php echo e($users->ntn); ?>

                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> First Name </div>
                                        <div class="col-md-7 value"> <?php echo e($users->firstname); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Last Name </div>
                                        <div class="col-md-7 value"> <?php echo e($users->lastname); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Designation </div>
                                        <div class="col-md-7 value"> <?php echo e($users->designation); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name">  Phone Number </div>
                                        <div class="col-md-7 value"> <?php echo e($users->phonenumber); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Email </div>
                                        <div class="col-md-7 value"> <?php echo e($users->email); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Role </div>
                                        <div class="col-md-7 value"> <?php echo e($users->Role->name); ?> </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                <!-- End: life time stats -->
            </div>
    <!-- END CONTENT BODY -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>