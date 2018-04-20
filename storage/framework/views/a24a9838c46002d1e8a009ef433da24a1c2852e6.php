<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Create Standard Offer</div>
            </div>
            <span class="error">&nbsp;*</span> <b>Fields must be required.</b>
            <span><?php echo e(Form::select('status',array('active' => 'Active', 'draft ' => 'Draft ', 'inactive ' => 'Inactive ', 'expired' => 'Expired'), null, ['class' => 'form-control status'])); ?></span>
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
            <?php echo e(Form::open(array('url' => 'standardoffer','name' => 'standardoffer'))); ?>

            <?php echo e(Form::hidden('url',URL::to('/'),array('id' => 'url'))); ?>

                <div class="form-group">
                	<?php echo e(Form::label('name', 'Name this offering')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('offertitle',null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('offerref', 'Internal Offering Reference')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('offerref',null, array('class' => 'form-control'))); ?>

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
            	</div>
                <div class="form-group standarddatetime">
                    <?php echo e(Form::label('effectivedate', 'Effective Date')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('effectivedate',null, array('class' => 'form-control date','id' => 'fromdate'))); ?>

                    </div>
            	</div>
                <div class="form-group standarddatetime">
                    <?php echo e(Form::label('effectivetime', 'Effective Time (PST)')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('effectivetime',null, array('class' => 'form-control time'))); ?>

                    </div>
            	</div>
                <div class="form-group standarddatetime">
                    <?php echo e(Form::label('date', 'End Date')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('offerdate',null, array('class' => 'form-control date'))); ?>

                    </div>
            	</div>
                <div class="form-group standarddatetime">
                    <?php echo e(Form::label('time', 'End Time (PST)')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::text('offertime',null, array('class' => 'form-control time'))); ?>

                    </div>
            	</div>
                <div class="form-group vendors">
                    <?php echo e(Form::label('vendor', 'Available to Vendors')); ?>

                    <div>
                        <?php echo e(Form::checkbox('vendor', '1')); ?>

                	</div>
            	</div>
                <div class="form-group standardtransaction">
                	<?php echo e(Form::label('minimumtransactionvalue', 'Minimum Transaction Value (PKR)')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('minimumtransactionvalue',null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group standardtransaction">
                	<?php echo e(Form::label('processingfee', 'Administrative / Processing Fee (PKR)')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('processingfee',null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group termcondition" style="padding-top:20px">
                	<?php echo e(Form::label('terms', 'Terms And Conditions')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::textarea('terms', null, ['class' => 'form-control','size' => '50x2'])); ?>

                    </div>
                </div>
                <div class="form-group abc">
                	<?php echo e(Form::label('interestrate', 'Add Interest Rate')); ?><span class="error">&nbsp;*</span>
                    
                    <div class="interest">
                    <?php $__currentLoopData = $definition_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $definition_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    	
                        <?php echo e(Form::text('interestamount[]',null, array('class' => 'form-control interestmonth'))); ?>

                        </br>
                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>      
                        <?php echo e(Form::label('interestrate', 'Please enter Interest Rate',array('class' => 'interestrateerror','style' => 'display:none;color:#e7505a'))); ?>

                    </div>
                    
                </div>
                <div class="form-group">
                	<?php echo e(Form::label('transactionvalue', 'Transaction Value')); ?><span class="error">&nbsp;*</span>
                    <div>
                    	<?php echo e(Form::text('transactionvalue',null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                	<?php echo e(Form::label('installmentnumber', 'Number of Installments (Mo)')); ?><span class="error">&nbsp;*</span>
                    <div>
                        <?php echo e(Form::select('installmentnumber',array('3' => '3','6' => '6','9' => '9','12' => '12','15' => '15','18' => '18','21' => '21','24' => '24'),null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                
                <div class="form-group installmentlabel">
                    <b>Equal Monthly installment</b></br>
                    Amount Financed (Rs.):</br>
                    Interest Paid (Rs.):</br>
                    Administration Fee (Rs.):</br>
                    Total Cost (Rs.):
                </div>
                
                <div class="form-group installmentvalue">
                	<span id="monthlyinstallment" style="text-align:center"></span></br>
                    <span id="financed" style="text-align:center"></span></br>
                    <span id="paid" style="text-align:center"></span></br>
                    <span id="administratorfees" style="text-align:center"></span></br>
                    <span id="totalcost" style="text-align:center"></span>
                </div>
                
                 <!--<div class="form-group status" style="padding-top:20px">
                	<?php echo e(Form::label('status', 'status')); ?>

                    <div>
                    	<?php echo e(Form::select('status',array('active' => 'Active', 'draft ' => 'Draft ', 'inactive ' => 'Inactive ', 'expired' => 'Expired'), null, ['class' => 'form-control status'])); ?>

                    </div>
                </div>-->
                <?php echo e(Form::submit('Save',array('class' => 'btn btn-success','id' => 'savestandardoffer'))); ?>

        <?php echo e(Form::close()); ?>       
        </div>
                    
        <!-- End: life time stats -->
    </div>
    <!-- END CONTENT BODY -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>