<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Standard Offer Detail </div>
                                    <div class="actions">
                                        <a href="<?php echo e(route('standardoffer.edit', $standardoffer->id)); ?>" class="btn btn-circle btn-info">
                                            <span class="hidden-xs"> Edit </span>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Name this offering </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->offertitle); ?></div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Internal Offering Reference </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->offerref); ?> </div>
                                    </div>
                                    <!--<div class="row static-info">
                                        <div class="col-md-5 name"> Applicable to </div>
                                        <div class="col-md-7 value"><?php echo e($standardoffer->definition_id); ?></div>
                                    </div>-->
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Effective Date </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->effectivedate); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Effective Time (PST) </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->effectivetime); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> End Date </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->enddate); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> End Time (PST) </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->endtime); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Available to Vendors </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->vendors); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Minimum Transaction Value (PKR) </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->transactionamount); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Administrative / Processing Fee (PKR) </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->processingfees); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Terms & Conditions </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->termscondition); ?> </div>
                                    </div>
                                     <?php $__currentLoopData = $interestreate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interestreates): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Interest Rate (p.a.) % for <?php echo e($interestreates->interestmonth); ?> Mo. </div>
                                        <div class="col-md-7 value"> <?php echo e($interestreates->interestrate); ?> </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Status </div>
                                        <div class="col-md-7 value"> <?php echo e($standardoffer->status); ?> </div>
                                    </div>
                                </div>
                            </div>
                <!-- End: life time stats -->
            </div>
    <!-- END CONTENT BODY -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>