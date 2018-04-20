<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Updated Promo Offer</div>
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
            <?php echo e(Form::model($promooffer, array('route' => array('promooffer.update', $promooffer->id), 'method' => 'PUT','name' => 'promooffer'))); ?>

                <div class="form-group">
                	<?php echo e(Form::label('name', 'Name this offering')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('offertitle',$promooffer->offertitle, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('offerref', 'Internal Offering Reference or Name')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('offerref',$promooffer->offerref, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                <?php echo e(Form::label('applicableto', 'Applicable To')); ?>

                <div>
                <?php echo e(Form::checkbox('selectallapplicable',null,null,array('class' => 'selectallapplicable'))); ?>&nbsp;All
                 <?php $__currentLoopData = $definition_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $definition_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                       <?php echo e(Form::checkbox('applicableto[]', $definition_list->id,null)); ?>&nbsp;<?php echo e($definition_list->name); ?>

             	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('effectivedate', 'Effective Date')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('effectivedate',$promooffer->effectivedate, array('class' => 'form-control date'))); ?>

                    </div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('effectivetime', 'Effective Time (PST)')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('effectivetime',$promooffer->effectivetime, array('class' => 'form-control time'))); ?>

                    </div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('date', 'End Date (PST)')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('offerdate',$promooffer->enddate, array('class' => 'form-control date'))); ?>

                    </div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('time', 'End Time')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('offertime',$promooffer->endtime, array('class' => 'form-control time'))); ?>

                    </div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('vendor', 'Available to Vendors')); ?>

                    <div>
                        <?php echo e(Form::checkbox('vendor', 'value')); ?>

                	</div>
            	</div>
                <div class="form-group">
                	<?php echo e(Form::label('transactionamount', 'Minimum Transaction Value (PKR)')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('transactionamount',$promooffer->transactionamount, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                	<?php echo e(Form::label('processingfee', 'Administrative / Processing Fee (PKR)')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('processingfee',$promooffer->processingfees, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group" style="padding-top:20px">
                	<?php echo e(Form::label('terms', 'Terms And Conditions')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::textarea('terms', $promooffer->termscondition, ['class' => 'form-control','size' => '50x2'])); ?>

                    </div>
                </div>
                <div class="form-group abc">
                	<?php echo e(Form::label('interestrate', 'Add Interest Rate')); ?><span class="error">&nbsp;*</span>
                    
                    <div class="interest">
                     <?php $__currentLoopData = $interestrate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interestrates): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    	<?php echo e(Form::text('interestrate[]',$interestrates->interestrate, array('class' => 'form-control interestrate'))); ?>

                        <?php echo e(Form::text('interestamount[]',$interestrates->interestamount, array('class' => 'form-control interestmonth'))); ?>

                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>      
                       
                        <?php echo e(Form::label('interestrate', 'Please enter Interest Rate',array('class' => 'interestrateerror','style' => 'display:none;color:#e7505a'))); ?>

                    </div>
                   
                </div>
                <div class="form-group">
                	<?php echo e(Form::label('transactionvalue', 'Transaction Value')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('transactionvalue',$promooffer->transactionvalue, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                	<?php echo e(Form::label('installmentnumber', 'Number of Installments (Mo)')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::select('installmentnumber',array('3' => '3','6' => '6','9' => '9','12' => '12','15' => '15','18' => '18','21' => '21','24' => '24'),null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                 <div class="form-group" style="padding-top:20px">
                	<?php echo e(Form::label('status', 'status')); ?>

                    <div>
                    	<?php echo e(Form::select('status',array('active' => 'Active', 'draft ' => 'Draft ', 'inactive ' => 'Inactive ', 'expired' => 'Expired'), null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <?php echo e(Form::submit('Save',array('class' => 'btn btn-success','id' => 'savepromooffer'))); ?>

        <?php echo e(Form::close()); ?>       
        </div>
                    
        <!-- End: life time stats -->
    </div>
    <!-- END CONTENT BODY -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>