@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Updated Standard Offer</div>
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
            {{ Form::model($definition, array('route' => array('shareddefinition.update', $definition->id), 'method' => 'PUT','name' => 'shareddefinition')) }}
             <div class="form-group">
                    {{ Form::label('cardname', 'Name of Card') }}
                    <div>
                        {{ Form::text('cardname',$definition->name, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('cardtype', 'Type of Card') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('cardtype',$definition->cardtype, array('class' => 'form-control')) }}
                    </div>
            	</div>
                <div class="form-group cardidentifer">
                    {{ Form::label('cardidentifiers', 'Card Identifier') }}<span class="error">&nbsp;*</span>
                    <div>
                    @foreach($cardidentifiers as $cardidentifier)
                        {{ Form::text('cardidentifiers[]',$cardidentifier, array('class' => 'form-control cardidentifiersfirst','maxlength' => 4)) }}
                        <label class="error errorfirst" style="display:none">Please enter 4 digits numeric value</label>
                  	@endforeach 
                        {{ Form::text('cardidentifiers[]','XXXX', array('class' => 'form-control','placeholder' => 'XXXX','disabled')) }}
                        {{ Form::text('cardidentifiers[]','XXXX', array('class' => 'form-control','placeholder' => 'XXXX','disabled')) }}
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