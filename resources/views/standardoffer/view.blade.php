@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Standard Offer Detail </div>
                                    <div class="actions">
                                        <a href="{{ route('standardoffer.edit', $standardoffer->id) }}" class="btn btn-circle btn-info">
                                            <span class="hidden-xs"> Edit </span>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Name this offering </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->offertitle }}</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Internal Offering Reference </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->offerref }} </div>
                                    </div>
                                    <!--<div class="row static-info">
                                        <div class="col-md-5 name"> Applicable to </div>
                                        <div class="col-md-7 value">{{ $standardoffer->definition_id }}</div>
                                    </div>-->
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Effective Date </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->effectivedate }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Effective Time (PST) </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->effectivetime }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> End Date </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->enddate }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> End Time (PST) </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->endtime }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Available to Vendors </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->vendors }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Minimum Transaction Value (PKR) </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->transactionamount }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Administrative / Processing Fee (PKR) </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->processingfees }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Terms & Conditions </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->termscondition }} </div>
                                    </div>
                                     @foreach($interestreate as $interestreates)
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Interest Rate (p.a.) % for {{ $interestreates->interestmonth }} Mo. </div>
                                        <div class="col-md-7 value"> {{ $interestreates->interestrate }} </div>
                                    </div>
                                    @endforeach
                                    
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Status </div>
                                        <div class="col-md-7 value"> {{ $standardoffer->status }} </div>
                                    </div>
                                </div>
                            </div>
                <!-- End: life time stats -->
            </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection