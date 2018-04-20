<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Update Report</div>
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
            <?php echo e(Form::model($report, array('route' => array('report.update', $report->id), 'method' => 'PUT','name' => 'report'))); ?>

                <div class="form-group">
                	<?php echo e(Form::label('name', 'Card Holder Name')); ?>

                    <div>
                    	<?php echo e(Form::text('holdernaem',$report->cardholdername, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('cardno', 'Card No')); ?>

                    <div>
                        <?php echo e(Form::text('cardno',$report->cardno, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('transactionid', 'Transaction ID')); ?>

                    <div>
                        <?php echo e(Form::text('transactionid',$report->transactionid, array('class' => 'form-control'))); ?>

                    </div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('date', 'Date')); ?>

                    <div>
                        <?php echo e(Form::text('reportdate',$report->date, array('class' => 'form-control'))); ?>

                    </div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('transactionamount', 'Transaction Amount')); ?>

                    <div>
                        <?php echo e(Form::text('transactionamount',$report->transactionamount, array('class' => 'form-control'))); ?>

                	</div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('installmenttenure', 'Installment Tenure')); ?>

                    <div>
                        <?php echo e(Form::text('installmenttenure',$report->installmenttenure, array('class' => 'form-control'))); ?>

                	</div>
            	</div>
                <div class="form-group">
                    <?php echo e(Form::label('interestrate', 'Interest Rate')); ?>

                    <div>
                        <?php echo e(Form::text('interestrate',$report->interestrate, array('class' => 'form-control'))); ?>

                	</div>
            	</div>
                <div class="form-group" style="padding-top:20px">
                	<?php echo e(Form::label('status', 'status')); ?>

                    <div>
                    	<?php echo e(Form::select('status',array('draft' => 'Draft', 'active' => 'Active', 'disable' => 'Disable', 'expire' => 'Expire'), null, ['class' => 'form-control'])); ?>

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