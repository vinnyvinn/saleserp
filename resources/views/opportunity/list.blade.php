@extends('layouts.app')

@section('page-title', 'Opportunities')
@section('page-heading', 'Opportunities')


@section('content')
<div class="m-subheader ">
        <div class="d-flex align-items-center">
             <div class="mr-auto">
                 <h3 class="m-subheader__title ">Lists of Opportunities</h3>			
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
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addopportunity">
                            New
                    </button>
            </div>
                <hr class="hr-panel-heading">
                
                    <div class="table-responsive">
                            <table class="table table table-striped" style="width:100%" id="list">
                                    <thead>
                                        <th>Opportunity Name</th>
                                        <th>Account Name</th>
                                        <th>Probability</th>
                                        <th>Stage</th>
                                        <th>Close Date</th>
                                        <th>Source</th>
                                    </thead>
                                    <tbody>
                                        @if ($opportunity)
                                            @foreach($opportunity as $item)
                                            <tr>
                                                <td>{{ $item->opportunity_name }}</td>
                                                <td>{{ $item->accounts->account_name }}</td>
                                                <td>{{ $item->probability }} %</td>
                                                <td>{{ $item->stage }}</td>
                                                <td>{{ $item->closedate }}</td>
                                                <td>{{ $item->source }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>Sorry no Opportunity found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
   </div>
</div>
@include('opportunity.modaladdopportunity')
@stop