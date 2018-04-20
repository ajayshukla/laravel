@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Updated Promo Offer</div>
            </div>
            <span class="error">&nbsp;*</span> <b>Fields must be required.</b>
            	@if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
               @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="portlet-body">
            {{ Form::model($promooffer, array('route' => array('promooffer.update', $promooffer->id), 'method' => 'PUT','name' => 'promooffer')) }}
                <div class="form-group">
                	{{ Form::label('name', 'Name this offering') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::text('offertitle',$promooffer->offertitle, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('offerref', 'Internal Offering Reference or Name') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('offerref',$promooffer->offerref, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                {{ Form::label('applicableto', 'Applicable To') }}
                <div>
                {{ Form::checkbox('selectallapplicable',null,null,array('class' => 'selectallapplicable')) }}&nbsp;All
                 @foreach ($definition_lists as $definition_list)
                       {{ Form::checkbox('applicableto[]', $definition_list->id,null) }}&nbsp;{{ $definition_list->name }}
             	 @endforeach
                </div>
                <div class="form-group standarddatetime">
                    {{ Form::label('effectivedate', 'Effective Date') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('effectivedate',$promooffer->effectivedate, array('class' => 'form-control date')) }}
                    </div>
            	</div>
                <div class="form-group standarddatetime">
                    {{ Form::label('effectivetime', 'Effective Time (PST)') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('effectivetime',$promooffer->effectivetime, array('class' => 'form-control time')) }}
                    </div>
            	</div>
                <div class="form-group standarddatetime">
                    {{ Form::label('date', 'End Date (PST)') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('offerdate',$promooffer->enddate, array('class' => 'form-control date')) }}
                    </div>
            	</div>
                <div class="form-group standarddatetime">
                    {{ Form::label('time', 'End Time') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('offertime',$promooffer->endtime, array('class' => 'form-control time')) }}
                    </div>
            	</div>
                <div class="form-group vendors">
                    {{ Form::label('vendor', 'Available to Vendors') }}
                    <div>
                        {{ Form::checkbox('vendor', 'value') }}
                	</div>
            	</div>
                <div class="form-group standardtransaction">
                	{{ Form::label('transactionamount', 'Minimum Transaction Value (PKR)') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::text('minimumtransactionamount',$promooffer->transactionamount, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group standardtransaction">
                	{{ Form::label('processingfee', 'Administrative / Processing Fee (PKR)') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::text('processingfee',$promooffer->processingfees, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group termcondition" style="padding-top:20px">
                	{{ Form::label('terms', 'Terms And Conditions') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::textarea('terms', $promooffer->termscondition, ['class' => 'form-control','size' => '50x2']) }}
                    </div>
                </div>
                <div class="form-group abc">
                	{{ Form::label('interestrate', 'Add Interest Rate') }}<span class="error">&nbsp;*</span>
                    {{-- <div style="padding-bottom:10px">{{ Form::button('Add More',array('class' => 'btn btn-success addinterest')) }}</div> --}}
                    <div class="interest">
                     @foreach ($interestrate as $interestrates)
                    	{{ Form::text('interestrate[]',$interestrates->interestrate, array('class' => 'form-control interestrate')) }}
                        {{ Form::text('interestamount[]',$interestrates->interestamount, array('class' => 'form-control interestmonth')) }}
                  	@endforeach      
                       {{-- {{ Form::selectRange('interestmonth[]', 1, 12,13, ['class' => 'form-control interestmonth']) }} --}}
                        {{ Form::label('interestrate', 'Please enter Interest Rate',array('class' => 'interestrateerror','style' => 'display:none;color:#e7505a')) }}
                    </div>
                   {{-- {{ Form::button('Remove',array('class' => 'removediv')) }} --}}
                </div>
                <div class="form-group">
                	{{ Form::label('transactionvalue', 'Transaction Value') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::text('transactionvalue',$promooffer->transactionvalue, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                	{{ Form::label('installmentnumber', 'Number of Installments (Mo)') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::select('installmentnumber',array('3' => '3','6' => '6','9' => '9','12' => '12','15' => '15','18' => '18','21' => '21','24' => '24'),null, ['class' => 'form-control']) }}
                    </div>
                </div>
                 <div class="form-group status" style="padding-top:20px">
                	{{ Form::label('status', 'status') }}
                    <div>
                    	{{ Form::select('status',array('active' => 'Active', 'draft ' => 'Draft ', 'inactive ' => 'Inactive ', 'expired' => 'Expired'), null, ['class' => 'form-control']) }}
                    </div>
                </div>
                {{ Form::submit('Save',array('class' => 'btn btn-success','id' => 'savepromooffer')) }}
        {{ Form::close() }}       
        </div>
                    
        <!-- End: life time stats -->
    </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection