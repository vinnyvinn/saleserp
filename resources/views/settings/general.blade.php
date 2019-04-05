@extends('layouts.app')

@section('page-title', trans('app.general_settings'))
@section('page-heading', trans('app.general_settings'))

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">
        @lang('app.settings')
    </li>
    <li class="breadcrumb-item active">
        @lang('app.general')
    </li>
@stop

@section('content')

@include('partials.messages')
<div class="row">
    <div class="col-md-3">
        <ul class="nav settings-tabs navbar-pills navbar-pills-flat nav-tabs nav-stacked" role="tablist">
            <li>
                <a id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
            </li>
            <li>
                    <a href="">Company Information</a>
            </li>
            <li>
                    <a id="lead-tab" data-toggle="tab" href="#lead" role="tab" aria-controls="lead" aria-selected="false">Leads</a>
            </li>
        </ul>
    </div>
    <div class="col-md-9"> 
            <div class="tab-content">
                    <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            {!! Form::open(['route' => 'settings.general.update', 'id' => 'general-settings-form']) !!}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">@lang('app.name')</label>
                                                <input type="text" class="form-control" id="app_name"
                                                       name="app_name" value="{{ settings('app_name') }}">
                                            </div>
                                            <div class="form-group">
                                                    <label for="name">Address</label>
                                                    <input type="text" class="form-control" id="app_address"
                                                           name="app_address" value="{{ settings('app_address') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">City</label>
                                                <input type="text" class="form-control" id="app_city"
                                                               name="app_city" value="{{ settings('app_city') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Telephone</label>
                                                <input type="text" class="form-control" id="app_phone"
                                                                   name="app_phone" value="{{ settings('app_phone') }}">
                                            </div>
                                            <div class="form-group">
                                                  <label for="name">VAT</label>
                                                  <input type="text" class="form-control" id="app_vat"
                                                                       name="app_vat" value="{{ settings('app_vat') }}">
                                            </div>
                                            <div class="form-group">
                                                    <label for="name">Quotation Prefix</label>
                                                    <input type="text" class="form-control" id="app_qpref"
                                                                         name="app_qpref" value="{{ settings('app_qpref') }}">
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" id="general">
                                @lang('app.update_settings')
                            </button>
                            
                            {{ Form::close() }}
                    </div>
                    <div class="tab-pane" id="lead" role="tabpanel" aria-labelledby="lead-tab">
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                                {!! Form::open(['route' => 'leads/status', 'id' => 'general-settings-form']) !!}

                                            <div class="form-group">
                                                <label for="name">status</label>
                                                <input type="text" class="form-control" id="status"
                                                       name="status" >
                                            </div>
                                            <button type="submit" class="btn btn-primary" id="leads">
                                                    Save Status
                                                 </button>
                                                 
                                                 {{ Form::close() }}

                                                 <hr>
                                                 <ul class="list-group">
                                                        @if ($leads)
                                                            @foreach ($leads as $item)
                                                            <li class="list-group-item">
                                                                    <b>Lead Status</b>: 
                                                                    <a href="#" class="settings-textarea-merge-field" data-to="customer_info_format">{{ $item->status }}</a>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <p>Sorry no added Status</p>
                                                        @endif
                                                    </ul>
                                                            
                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                               

                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
                    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
                  </div>
           
    </div>
</div>

@stop