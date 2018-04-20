<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Shared Definition Detail </div>
                                    <div class="actions">
                                        <a href="<?php echo e(route('shareddefinition.edit', $definition->id)); ?>" class="btn btn-circle btn-info">
                                            <span class="hidden-xs"> Edit </span>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Installment Tenures </div>
                                        <div class="col-md-7 value"> <?php echo e($definition->installmenttenures); ?></div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Types of Cards </div>
                                        <div class="col-md-7 value"> <?php echo e($definition->name); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Card Identifier </div>
                                        <div class="col-md-7 value"><?php echo e($definition->cardidentifiers); ?></div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Status </div>
                                        <div class="col-md-7 value"> <?php echo e($definition->status); ?> </div>
                                    </div>
                                </div>
                            </div>
                <!-- End: life time stats -->
            </div>
    <!-- END CONTENT BODY -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>