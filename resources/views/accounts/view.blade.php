@extends('layouts.app')

@section('page-title', 'Accounts')
@section('page-heading', 'Accounts')


@section('content')

@include('partials.messages')
<div class="row mrn-top-30">
    <div class="col-sm-12">
        <div class="card bg-default">
            <div class="card-title">
                <div class="row">
                        <h3 class="m-subheader__title col-8">{{ $account->account_name }}</h3>
                        <div class="btn-toolbar col-4 pull-right" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                  <button type="button" class="btn btn-outline-secondary btn-sm">Edit</button>
                                  <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#addcontact">New Contact</button>
                                  <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#addopportunity">New Opportunity</button>
                                  <button type="button" class="btn btn-outline-secondary btn-sm">New Proposal</button>
                                </div>
                                
                        </div>
                </div>
                
            </div>
            <div class="card-subheader">
                    <div class="row">
                            <ul class="other-details" role="list">
                                <li><span>Type</span>
                                <div class="element-value">{{ $account->type }}</div></li>
                                <li><span>KRA PIN</span>
                                    <div class="element-value">{{ $account->company_kra_pin }}</div></li>
                                <li><span>Phone</span>
                                    <div class="element-value"><i class="fa fa-phone"></i> {{ $account->phone }}</div></li>
                                <li><span>Email</span>
                                     <div class="element-value"><i class="fa fa-envelope"></i> {{ $account->email }}</div></li>
                                <li><span>Website</span>
                                    <div class="element-value"><i class="fa fa-globe"></i> {{ $account->website }}</div></li>
                                <li><span>Account Owner</span>
                                    <div class="element-value" data-toggle="tooltip"  data-placement="right" data-html="true" title="{{ $account->users->first_name .' '. $account->users->last_name }}"><i class="fa fa-user"></i> {{ $account->users->first_name .' '. $account->users->last_name }}</div></li>     
                                <li><span>Currency</span>
                                    <div class="element-value" data-toggle="tooltip"  data-placement="right" data-html="true" title="Default Currency Chosen is: {{ $account->currency }}"><i class="fa fa-money-bill"></i> {{ $account->currency }}</div></li>
                            </ul>
                        </div>
            </div>
        
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <div class="card card-body">
                <ul id="accountsTab" class="nav navbar-pills navbar-pills-flat nav-tabs nav-stacked customer-tabs" role="tablist">
                        <li class="nav-item">
                                <a class="nav-link" id="profile-tab" href="#profile"  aria-controls="profile" aria-selected="false"><i class="fa fa-user menu-icon" aria-hidden="true"></i>Update Profile</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" id="contact-tab" href="#contact"  aria-controls="contact" aria-selected="false"><i class="fa fa-users menu-icon" aria-hidden="true"></i>Contacts</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" id="opportunities-tab" href="#opportunities"  aria-controls="opportunities" aria-selected="false"><i class="fa fa-file menu-icon" aria-hidden="true"></i>Opportunities</a>
                        </li>
                </ul>
               
        </div>
    </div>
    <div class="col-9">
            <div class="tab-content" id="myTabContent">
                    
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @include('accounts.group.profile')
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        @include('accounts.group.contacts')
                    </div>
                    <div class="tab-pane fade " id="opportunities" role="tabpanel" aria-labelledby="opportunities-tab">
                        @include('accounts.group.opportunities')
                    </div>
            </div>
    </div>
</div>
@include('accounts.modaladdcontacts')
@include('accounts.modaladdopportunity')
@stop