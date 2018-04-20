@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                    @foreach($user as $users)
                                        {{ $users->firstname }}&nbsp;{{ $users->lastname }} Profile </div>
                                  	@endforeach
                                    <div class="actions">
                                        <a href="{{ url('user/edit', $user_id) }}" class="btn btn-circle btn-info">
                                            <span class="hidden-xs"> Edit </span>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                @foreach($user as $users)
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> organization </div>
                                        <div class="col-md-7 value"> {{ $users->organization }}
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Mail Address </div>
                                        <div class="col-md-7 value"> {{ $users->mailingaddress }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> NTN </div>
                                        <div class="col-md-7 value">{{ $users->ntn }}
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> First Name </div>
                                        <div class="col-md-7 value"> {{ $users->firstname }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Last Name </div>
                                        <div class="col-md-7 value"> {{ $users->lastname }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Designation </div>
                                        <div class="col-md-7 value"> {{ $users->designation }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name">  Phone Number </div>
                                        <div class="col-md-7 value"> {{ $users->phonenumber }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Email </div>
                                        <div class="col-md-7 value"> {{ $users->email }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Role </div>
                                        <div class="col-md-7 value"> {{ $users->Role->name }} </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                <!-- End: life time stats -->
            </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection