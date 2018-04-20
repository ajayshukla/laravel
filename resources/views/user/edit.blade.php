@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption"> Update Profile</div>
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
               {{ Form::open(array('url' => 'user/update/'.$user_id, 'name' => 'report')) }}
                <div class="form-group">
                	{{ Form::label('organization', 'Organization') }}<span class="error">&nbsp;*</span>
                    <div>
                    	{{ Form::text('organization',$user->organization, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('mailingaddress', 'Mail Address') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('mailingaddress',$user->mailingaddress, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('ntn', 'NTN') }}
                    <div>
                        {{ Form::text('ntn',$user->ntn, array('class' => 'form-control')) }}
                    </div>
            	</div>
                <div class="form-group">
                    {{ Form::label('firstname', 'First Name') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('firstname',$user->firstname, array('class' => 'form-control')) }}
                    </div>
            	</div>
                <div class="form-group">
                    {{ Form::label('lastname', 'Last Name') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('lastname',$user->lastname, array('class' => 'form-control')) }}
                	</div>
            	</div>
                <div class="form-group">
                    {{ Form::label('designation', 'Designation') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('designation',$user->designation, array('class' => 'form-control')) }}
                	</div>
            	</div>
                <div class="form-group">
                    {{ Form::label('phonenumber', 'Phone Number') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('phonenumber',$user->phonenumber, array('class' => 'form-control')) }}
                	</div>
            	</div>
                <div class="form-group">
                    {{ Form::label('email', 'Emial Id') }}<span class="error">&nbsp;*</span>
                    <div>
                        {{ Form::text('email',$user->email, array('class' => 'form-control')) }}
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