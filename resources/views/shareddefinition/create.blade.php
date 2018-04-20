@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Create Shared Definitions</div>
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
            {{ Form::open(array('url' => 'shareddefinition','name' => 'shareddefinition')) }}
                <div class="form-group">
                    {{ Form::label('cardname', 'Name Of Card') }}
                    <div>
                        {{ Form::text('cardname',null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('cardtype', 'Type of Card') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('cardtype',null, array('class' => 'form-control')) }}
                    </div>
            	</div>
                <div class="form-group cardidentifer">
                    {{ Form::label('cardidentifiers', 'Card Identifier') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('cardidentifiers[]',null, array('class' => 'form-control cardidentifiersfirst','maxlength' => 4 )) }}
                        <label class="error errorfirst" style="display:none">Please enter 4 digits numeric value</label>
                        {{ Form::text('cardidentifiers[]',null, array('class' => 'form-control cardidentifierssecond','maxlength' => 4 )) }}
                        <label class="error errorsecond" style="display:none">Please enter 4 digits numeric value</label>
                        {{ Form::text('cardidentifiers[]',null, array('class' => 'form-control','placeholder' => 'XXXX','disabled')) }}
                        {{ Form::text('cardidentifiers[]',null, array('class' => 'form-control','placeholder' => 'XXXX','disabled')) }}
                    </div>
            	</div>
                 <div class="form-group" style="padding-top:20px">
                	{{ Form::label('status', 'status') }}
                    <div>
                    	{{ Form::select('status',array('active' => 'Active', 'draft ' => 'Draft ', 'inactive ' => 'Inactive ', 'expired' => 'Expired'), null, ['class' => 'form-control']) }}
                    </div>
                </div>
                {{ Form::submit('Save',array('class' => 'btn btn-success','id' => 'savedefinition')) }}
        {{ Form::close() }}       
        </div>
                    
        <!-- End: life time stats -->
    </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection