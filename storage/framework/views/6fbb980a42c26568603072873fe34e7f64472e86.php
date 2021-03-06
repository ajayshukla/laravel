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
                                        Standard Offer Listing </div>
                                    <div class="actions">
                                        <a href="<?php echo e(url('/standardoffer/create')); ?>" class="btn btn-circle btn-info">
                                            <i class="fa fa-plus"></i>
                                            <span class="hidden-xs"> New Offer </span>
                                        </a>
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
                                        <div class="table-actions-wrapper" style="display:block">
                                            <span> </span>
                                            <?php echo e(Form::open(array('url' => 'standardoffer/filterstandardoffer/', 'name' => 'searchbyrole'))); ?>

                                            <select class="table-group-action-input form-control input-inline input-small input-sm" name="search">
                                                <option value="select">Select...</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">Bank</option>
                                                <option value="3">Retailer</option>
                                            </select>
                                            <button class="btn btn-sm btn-success table-group-action-submit">
                                                <i class="fa fa-check"></i> Submit</button>
                                          	<?php echo Form::close(); ?>      
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_products">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th width="1%">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="checkalloffer" id="checkalloffer" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th width="10%"> ID </th>
                                                    <th width="15%"> Name this offering </th>
                                                    <th width="15%"> Internal Offering Reference </th>
                                                    <th width="10%"> Effective Date </th>
                                                    <th width="15%"> Effective Time (PST) </th>
                                                    <?php if(Auth::user()->id==1): ?>
                                                    <th width="15%"> Administrator/Bank/Retailer </th>
                                                    <?php endif; ?>
                                                    <th width="10%"> Status </th>
                                                    <th width="14%"> Actions </th>
                                                </tr>
                                                <?php $__currentLoopData = $standardoffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $standardoffers): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $__currentLoopData = $standardoffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $standardoffersRes): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr role="row" class="filter">
                                                    <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="checkoffer" id="checkoffer" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td><?php echo e($standardoffersRes->id); ?></td>
                                                    <td><?php echo e($standardoffersRes->offertitle); ?></td>
                                                    <td><?php echo e($standardoffersRes->offerref); ?></td>
                                                    <td><?php echo e($standardoffersRes->effectivedate); ?></td>
                                                    <td><?php echo e($standardoffersRes->effectivetime); ?></td>
                                                    <?php if(Auth::user()->id==1): ?>
                                                    <td> <?php echo e($standardoffersRes->role->name); ?> </td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <?php echo e($standardoffersRes->status); ?>

                                                    </td>
                                                    <td>
                                                        <div class="margin-bottom-5">
                                                            <a href="<?php echo e(route('standardoffer.edit', $standardoffersRes->id)); ?>"><button class="btn btn-sm btn-success filter-submit margin-bottom">Edit</button></a>
                                                        <?php echo Form::open(['method' => 'DELETE','route' => ['standardoffer.destroy', $standardoffersRes->id]]); ?>

                                                           <button onclick="return deletestandardoffer(this.value)" class="btn btn-sm btn-success filter-submit margin-bottom">Delete</button>
        												<?php echo Form::close(); ?>   
                                                        <a href="<?php echo e(URL::to('standardoffer/' . $standardoffersRes->id)); ?>"><button class="btn btn-sm btn-success filter-submit margin-bottom">View</button></a> 
                                                        </div>
                                                       
                                                    </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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