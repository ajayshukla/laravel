@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Change Password</div>
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
            {{ Form::open(array('url' => 'user/updatepassword/'.$user_id,'name' => 'changepassword')) }}
                <div class="form-group">
                	{{ Form::label('newpassword', 'New Password') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::password('password', array('class' => 'form-control','id' => 'password')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('confirmpassword', 'Confirm Password') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::password('password_confirmation', array('class' => 'form-control','id' => 'password_confirmation')) }}
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