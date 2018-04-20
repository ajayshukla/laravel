@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Create Tenures</div>
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
            {{ Form::open(array('url' => 'tenures/savetenures','name' => 'tenures')) }}
                <div class="form-group">
                    {{ Form::label('tenure', 'Tenures') }}<span class="error">&nbsp;*</span>
                    <div class="installedtenures">
                    	{{ Form::button('Add More',array('class' => 'btn btn-success','id' => 'addmoretenure','style' => 'margin-bottom:12px;')) }}
                        {{ Form::text('tenure[]',null, array('class' => 'form-control','style' => 'margin-bottom:12px;')) }}
                    </div>
                </div>
                {{ Form::submit('Save',array('class' => 'btn btn-success','id' => 'savetenures')) }}
        {{ Form::close() }}       
        </div>
                    
        <!-- End: life time stats -->
    </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection