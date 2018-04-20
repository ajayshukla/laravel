@extends('layouts/admin_template')
@section('content')
<div class="page-content">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-lg-12 col-xs-12 col-sm-12">
    			<!-- Begin: life time stats -->
                <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Shared Definitions Detail </div>
                                    <div class="actions">
                                        <a href="{{ route('shareddefinition.edit', $definition->id) }}" class="btn btn-circle btn-info">
                                            <span class="hidden-xs"> Edit </span>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Name of Card </div>
                                        <div class="col-md-7 value"> {{ $definition->name }}</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Types of Cards </div>
                                        <div class="col-md-7 value"> {{ $definition->cardtype }} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Card Identifier </div>
                                        <div class="col-md-7 value">{{ str_replace(',',' ',$definition->cardidentifiers) }}&nbsp;XXXX&nbsp;XXXX</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Status </div>
                                        <div class="col-md-7 value"> {{ $definition->status }} </div>
                                    </div>
                                </div>
                            </div>
                <!-- End: life time stats -->
            </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection