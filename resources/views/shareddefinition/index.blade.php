@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Shared Definitions Listing </div>
                                    <div class="actions">
                                        <a href="{{ url('/shareddefinition/create') }}" class="btn btn-circle btn-info">
                                            <i class="fa fa-plus"></i>
                                            <span class="hidden-xs"> New Definitions </span>
                                        </a>
                                        <!--<div class="btn-group">
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
                                        </div>-->
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
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th width="10%"> ID </th>
                                                    <th width="15%"> Name of Card </th>
                                                    <th width="15%"> Types of Cards </th>
                                                    <th width="10%"> Card Identifier </th>
                                                    <!--<th width="10%"> Status </th>-->
                                                    <th width="14%"> Actions </th>
                                                </tr>
                                                @if($countdefinition==0)
                                                <tr role="row" class="filter">
                                                    <td colspan="6">No Record Found.</td>
                                                </tr> 
                                                @else
												@foreach($definition as $definitions)
                                                <tr role="row" class="filter">
                                                    <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>{{ $definitions->id }}</td>
                                                    <td>{{ $definitions->name }}</td>
                                                    <td>{{ $definitions->cardtype }}</td>
                                                    <td>{{ str_replace(',',' ',$definitions->cardidentifiers) }}&nbsp;XXXX&nbsp;XXXX</td>
                                                    <!--<td>{{ $definitions->status }}</td>-->
                                                    <td>
                                                        <div class="margin-bottom-5">
                                                            <a href="{{ route('shareddefinition.edit', $definitions->id) }}"><button class="btn btn-sm btn-success filter-submit margin-bottom">Edit</button></a>
                                                        {!! Form::open(['method' => 'DELETE','route' => ['shareddefinition.destroy', $definitions->id]]) !!}
                                                           <button onclick="return deletestandardoffer(this.value)" class="btn btn-sm btn-success filter-submit margin-bottom">Delete</button>
        												{!! Form::close() !!} 
                                                        <a href="{{ URL::to('shareddefinition/' . $definitions->id) }}"><button class="btn btn-sm btn-success filter-submit margin-bottom">View</button></a>   
                                                        </div>
                                                       
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
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
@endsection