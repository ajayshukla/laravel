@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Report Detail </div>
                                    <div class="actions">
                                        <a href="{{ route('report.edit', $report->id) }}" class="btn btn-circle btn-info">
                                            <span class="hidden-xs"> Edit </span>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Card Holder Name </div>
                                        <div class="col-md-7 value"> {{ $report->cardholdername }}
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Card No # </div>
                                        <div class="col-md-7 value"> {{ $report->cardno }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Transaction ID </div>
                                        <div class="col-md-7 value">{{ $report->transactionid }}
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Date </div>
                                        <div class="col-md-7 value"> {{ $report->date }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Transaction Amount </div>
                                        <div class="col-md-7 value"> {{ $report->installmenttenure }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Installment Tenure </div>
                                        <div class="col-md-7 value"> {{ $report->interestrate }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name">  Interest Rate </div>
                                        <div class="col-md-7 value"> {{ $report->interestrate }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Status </div>
                                        <div class="col-md-7 value"> {{ $report->status }} </div>
                                    </div>
                                </div>
                            </div>
                <!-- End: life time stats -->
            </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection