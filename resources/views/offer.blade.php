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
                                        Offers Listing </div>
                                    <!--<div class="actions">
                                        <a href="{{ url('/standardoffer/create') }}" class="btn btn-circle btn-info">
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
                                    </div>-->
                                </div>
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <div class="table-actions-wrapper" style="display:block">
                                            <span> </span>
                                            {{ Form::open(array('url' => 'offers/filteroffer/', 'name' => 'searchbyrole')) }}
                                            <select class="table-group-action-input form-control input-inline input-small input-sm" name="search">
                                                <option value="select">Select...</option>
                                                <option value="active">Active</option>
                                                <option value="draft">Draft</option>
                                                <option value="inactive">Inactive</option>
                                                <option value="expired">Expired</option>
                                            </select>
                                            <button class="btn btn-sm btn-success table-group-action-submit">
                                                <i class="fa fa-check"></i> Submit</button>
                                        	{!! Form::close() !!}   	     
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_products">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <!--<th width="1%">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="checkalloffer" id="checkalloffer" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>-->
                                                    <th width="10%"> ID </th>
                                                    <th width="15%"> Name this offering </th>
                                                    <th width="15%"> Internal Offering Reference </th>
                                                    <th width="10%"> Effective Date </th>
                                                    <th width="15%"> Effective Time (PST) </th>
                                                    @if(Auth::user()->role_id==1)
                                                    <th width="15%"> Administrator/Bank/Retailer </th>
                                                    @endif
                                                    <th width="10%"> Status </th>
                                                </tr>
                                                @if($countoffer==0)
                                                <tr role="row" class="filter">
                                                	<td colspan="7">No Record Found.</td>
                                               	</tr>     
                                                @else
                                                @foreach($offers as $offer)
                                                <tr role="row" class="filter">
                                                    <!--<td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="checkoffer" id="checkoffer" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </td>-->
                                                    <td>{{ $offer->id }}</td>
                                                    <td>{{ $offer->offertitle }}</td>
                                                    <td>{{ $offer->offerref }}</td>
                                                    <td>{{ $offer->effectivedate }}</td>
                                                    <td>{{ $offer->effectivetime }}</td>
                                                    @if(Auth::user()->role_id==1)
                                                    <td> {{ $offer->name }} </td>
                                                    @endif
                                                    <td>{{ $offer->status }}</td>
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