@extends('layouts.app')

@section('page-title', 'Accounts')
@section('page-heading', 'Accounts')


@section('content')
<div class="m-subheader ">
        <div class="d-flex align-items-center">
             <div class="mr-auto">
                 <h3 class="m-subheader__title ">Lists of Accounts</h3>			
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
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                            New Account
                    </button>
            </div>
                <hr class="hr-panel-heading">
                
                    <div class="table-responsive">
                        <table class="table table table-striped" style="width:100%" id="list">
                            <thead>
                                <th>#</th>
                                <th>Account Name</th>
                                <th>Account Owner</th> 
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                               @if ($accounts)
                                   @foreach($accounts as $items)
                                   <tr>
                                       <td>{{ $items->id }}</td>
                                        <td><a href="{{ route('accounts.show', $items->id) }}">{{ $items->account_name }}</a></td>
                                        <td>{{ $items->users->first_name .' '. $items->users->last_name }}</td>
                                        <td>{{ $items->phone }}</td>
                                        <td>{{ $items->email }}</td>
                                        <td>{{ $items->type }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                               @else
                               <tr>
                                    <td>Sorry no Data found, try again later</td>
                                </tr>
                               @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
   </div>
</div>
@include('accounts.modaladd')
@stop