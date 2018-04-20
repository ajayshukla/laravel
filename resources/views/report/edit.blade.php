@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Update Report</div>
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
            {{ Form::model($report, array('route' => array('report.update', $report->id), 'method' => 'PUT','name' => 'report')) }}
                <div class="form-group">
                	{{ Form::label('name', 'Card Holder Name') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::text('holdernaem',$report->cardholdername, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('cardno', 'Card No') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('cardno',$report->cardno, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('transactionid', 'Transaction ID') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('transactionid',$report->transactionid, array('class' => 'form-control')) }}
                    </div>
            	</div>
                <div class="form-group">
                    {{ Form::label('date', 'Date') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('reportdate',$report->date, array('class' => 'form-control date')) }}
                    </div>
            	</div>
                <div class="form-group">
                    {{ Form::label('transactionamount', 'Transaction Amount') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('transactionamount',$report->transactionamount, array('class' => 'form-control')) }}
                	</div>
            	</div>
                <div class="form-group">
                    {{ Form::label('installmenttenure', 'Installment Tenure') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('installmenttenure',$report->installmenttenure, array('class' => 'form-control')) }}
                	</div>
            	</div>
                <div class="form-group">
                    {{ Form::label('interestrate', 'Interest Rate') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('interestrate',$report->interestrate, array('class' => 'form-control')) }}
                	</div>
            	</div>
                <div class="form-group" style="padding-top:20px">
                	{{ Form::label('status', 'status') }}
                    <div>
                    	{{ Form::select('status',array('active' => 'Active', 'draft ' => 'Draft ', 'inactive ' => 'Inactive ', 'expired' => 'Expired'), null, ['class' => 'form-control']) }}
                    </div>
                </div>
                {{ Form::submit('Update',array('class' => 'btn btn-success')) }}
        {{ Form::close() }}       
        </div>
                    
        <!-- End: life time stats -->
    </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection