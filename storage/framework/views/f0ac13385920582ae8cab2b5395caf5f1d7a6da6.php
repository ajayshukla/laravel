<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('message')); ?>

                    </div>
                <?php endif; ?>
                                <div class="portlet-title">
                                    <div class="caption">
                                        User Mangement </div>
                                    <div class="actions">
                                        <!--<a href="<?php echo e(url('/report/create')); ?>" class="btn btn-circle btn-info">
                                            <i class="fa fa-plus"></i>
                                            <span class="hidden-xs"> New Report </span>
                                        </a>-->
                                        <div class="btn-group">
                                            <a class="btn btn-circle btn-default dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                                <i class="fa fa-share"></i>
                                                <span class="hidden-xs"> Tools </span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Export to Excel </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to CSV </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to XML </a>
                                                </li>
                                                <li class="divider"></li>
                                                <a href="javascript:;"> Print Invoices </a>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <div class="table-actions-wrapper">
                                            <span> </span>
                                            <select class="table-group-action-input form-control input-inline input-small input-sm">
                                                <option value="">Select...</option>
                                                <option value="publish">Publish</option>
                                                <option value="unpublished">Un-publish</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                            <button class="btn btn-sm btn-success table-group-action-submit">
                                                <i class="fa fa-check"></i> Submit</button>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_products">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th width="1%">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="checkalluser" id="checkalluser" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th width="10%"> Organization </th>
                                                    <th width="10%"> Mailing Address </th>
                                                    <th width="10%"> NTN </th>
                                                    <th width="10%"> First Name </th>
                                                    <th width="10%"> Last Name </th>
                                                    <th width="10%"> Designation </th>
                                                    <th width="15%"> Phone Number (Mobile) </th>
                                                    <th width="15%"> Email Id </th>
                                                    <th width="10%"> Role </th>
                                                    <th width="10%"> Select Role </th>
                                                    <th width="14%"> Actions </th>
                                                </tr>
                                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr role="row" class="filter">
                                                    <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="checkuser" id="checkuser" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td><?php echo e($users->organization); ?></td>
                                                    <td><?php echo e($users->mailingaddress); ?></td>
                                                    <td><?php echo e($users->ntn); ?></td>
                                                    <td><?php echo e($users->firstname); ?></td>
                                                    <td><?php echo e($users->lastname); ?></td>
                                                    <td><?php echo e($users->designation); ?></td>
                                                    <td><?php echo e($users->phonenumber); ?></td>
                                                    <td><?php echo e($users->email); ?></td>
                                                    <td><?php echo e($users->role->name); ?></td>
                                                    <input type="hidden" name="role" class="role_<?php echo e($users->id); ?>" value="<?php echo e($users->role->name); ?>">
                                                    <?php echo Form::open(array('url' => 'user/changerole/'.$users->id)); ?>

                                                    <?php if($Role_id==1): ?>
                                                    <td>
                                                        <select name="role_status" class="form-control form-filter input-sm role_status_<?php echo e($users->id); ?>">
                                                            <option value="">Select Role</option>
                                                            <option value="2">Bank</option>
                                                            <option value="3">Retailer</option>
                                                        </select>
                                                    </td>
                                                    <?php elseif($Role_id==2): ?>
                                                    <td>
                                                        <select name="role_status" class="form-control form-filter input-sm role_status_<?php echo e($users->id); ?>">
                                                            <option value="">Select Role</option>
                                                            <option value="3">Retailer</option>
                                                        </select>
                                                    </td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <div class="margin-bottom-5">
                                                           <button onclick="return checkrole(<?php echo e($users->id); ?>)" class="btn btn-sm btn-success filter-submit margin-bottom changerole">Change Role</button>
                                                        </div>
                                                    </td>
                                                    <?php echo Form::close(); ?>

                                             	</tr>   
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>   
                                            </thead>
                                            <tbody> </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                <!-- End: life time stats -->
            </div>
    <!-- END CONTENT BODY -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>