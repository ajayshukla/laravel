@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                                <div class="portlet-title">
                                    <div class="caption">
                                        Report Listing </div>
                                    <div class="actions">
                                        <a href="{{ url('/report/create') }}" class="btn btn-circle btn-info">
                                            <i class="fa fa-plus"></i>
                                            <span class="hidden-xs"> New Report </span>
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
                                        <div class="table-actions-wrapper" style="display:block">
                                            <span> </span>
                                            {{ Form::open(array('url' => 'report/filterreportoffer/', 'name' => 'searchbyrole')) }}
                                            <select class="table-group-action-input form-control input-inline input-small input-sm" name="search">
                                                <option value="select">Select...</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">Bank</option>
                                                <option value="3">Retailer</option>
                                            </select>
                                            <button class="btn btn-sm btn-success table-group-action-submit">
                                                <i class="fa fa-check"></i> Submit</button>
                                         	{!! Form::close() !!}       
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_products">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th width="1%">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="checkallreport" id="checkallreport" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th width="10%"> ID </th>
                                                    <th width="15%"> Card Holder Name </th>
                                                    <th width="15%"> Card No # </th>
                                                    <th width="10%"> Transaction ID </th>
                                                    <th width="10%"> Date </th>
                                                    <th width="15%"> Transaction Amount </th>
                                                    @if(Auth::user()->role_id==1)
                                                    <th width="15%"> Administrator/Bank/Retailer </th>
                                                    @endif
                                                    <th width="10%"> Status </th>
                                                    <th width="14%"> Actions </th>
                                                </tr>
                                                @if($countreport==0)
                                                <tr role="row" class="filter">
                                                    <td colspan="9">No Record Found.</td>
                                                </tr> 
                                                @else
                                                @foreach($report as $reports)
                                                <tr role="row" class="filter">
                                                    <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="checkreport" id="checkreport" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>{{ $reports->id }}</td>
                                                    <td>{{ $reports->cardholdername }}</td>
                                                    <td>{{ $reports->cardno }}</td>
                                                    <td>{{ $reports->transactionid }}</td>
                                                    <td>{{ $reports->date }}</td>
                                                    <td>{{ $reports->transactionamount }}</td>
                                                    @if(Auth::user()->role_id==1)
                                                    <td> {{ $reports->name }} </td>
                                                    @endif
                                                    <td>{{ $reports->status }}</td>
                                                    <td>
                                                        <div class="margin-bottom-5">
                                                           <a href="{{ route('report.edit', $reports->id) }}"><button class="btn btn-sm btn-success filter-submit margin-bottom">Edit</button></a>
                                                           {!! Form::open(['method' => 'DELETE','route' => ['report.destroy', $reports->id]]) !!}
                                                           <button onclick="return deletereport(this.value)" class="btn btn-sm btn-success filter-submit margin-bottom">Delete</button>
        												   {!! Form::close() !!}
                                                           <a href="{{ URL::to('report/' . $reports->id) }}"><button class="btn btn-sm btn-success filter-submit margin-bottom">View</button></a>
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