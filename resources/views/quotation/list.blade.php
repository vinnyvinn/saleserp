@extends('layouts.app')

@section('page-title', 'Quotations')
@section('page-heading', 'Quotations')


@section('content')
<div class="m-subheader ">
        <div class="d-flex align-items-center">
             <div class="mr-auto">
                 <h3 class="m-subheader__title ">Lists of Quotations</h3>			
                         </div>
              <div>
                          </div>
        </div>
    </div>
@include('partials.messages')
<div class="row">
   <div class="col-sm-12">
        <div class="card">
                <div class="card-body">
            <div class="_buttons">
                    <a href="{{ route('quotations.create') }}" class="btn btn-info">
                            Create New Quotation
                    </a>
            </div>
                <hr class="hr-panel-heading">
                <div class="row">
                        <div class="col-md-12">
                                <h4 class="no-margin">Quotations Summary</h4>
                             </div>
                </div>
                <div class="row">
                        <div class="col-md-2 col-xs-6 border-right">
                                <h3 class="bold">
                                        {{-- {{ number_format($Quotations_new) }}                                    </h3> --}}
                               <span style="color:#757575" class="">New</span>
                          </div>
                          <div class="col-md-2 col-xs-6 border-right">
                                <h3 class="bold">
                                        {{-- {{ number_format($Quotations_Contacted) }}                                    </h3> --}}
                               <span style="color:#757575" class="">Contacted</span>
                          </div>
                          <div class="col-md-2 col-xs-6 border-right">
                                <h3 class="bold">
                                        {{-- {{ number_format($Quotations_Qualified) }}                                 </h3> --}}
                               <span style="color:#757575" class="">Qualified</span>
                          </div>
                          <div class="col-md-2 col-xs-6 border-right">
                                <h3 class="bold">
                                        {{-- {{ number_format($Quotations_working) }}                                    </h3> --}}
                               <span style="color:#757575" class="">Working</span>
                          </div>
                          <div class="col-md-2 col-xs-6 border-right">
                                <h3 class="bold">
                                        {{-- {{ number_format($Quotations_proposalsent) }}                                    </h3> --}}
                               <span style="color:#757575" class="">Proposal Sent</span>
                          </div>
                          <div class="col-md-2 col-xs-6 border-right">
                                <h3 class="bold">
                                   {{-- {{ number_format($Quotations_customer) }}                                   </h3> --}}
                               <span style="color:#757575" class="">Customer</span>
                          </div>
                         
                </div>
                <hr class="hr-panel-heading">
                    <div class="table-responsive">
                            <table class="table table table-quotations" style="width:100%" id="list">
                                    <thead>
                                        <th>Quotation #</th>
                                        <th>Amount</th>
                                        <th>Total Tax</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        {{-- @if ($Quotations)
                                            @foreach($Quotations as $item)
                                            <tr>
                                                <td>{{ $item->lead_name }}</td>
                                                <td>{{ $item->company }}</td>
                                                <td>{{ $item->email }} </td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->users->first_name .' '. $item->users->last_name }}</td>
                                                <td>@if ($item->status_id ==2)
                                                        <span class="lable-badge lable-badge-outline-primary">{{ $item->status->status }}</span>
                                                @else
                                                <span class="lable-badge lable-badge-outline-primary">{{ $item->status->status }}</span>
                                                @endif </td>
                                                <td>{{ $item->source }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>Sorry no lead found</td>
                                            </tr>
                                        @endif --}}
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
   </div>
</div>
{{-- @include('lead.modaladdlead') --}}
@stop