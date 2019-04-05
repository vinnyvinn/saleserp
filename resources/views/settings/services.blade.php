@extends('layouts.app')

@section('page-title', "Service Items")
@section('page-heading', "Service Items")

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">
            Service Items
    </li>
    <li class="breadcrumb-item active">
        @lang('app.general')
    </li>
@stop

@section('content')

@include('partials.messages')

<div class="row">
        <div class="col-md-7">
            <div class="card card-body">
                <h3>List of Services</h3>
                <table class="table" style="width:100%" id="list">
                    <thead>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Type</th>
                    </thead>
                    <tbody>
                        @if ($service)
                            @foreach ($service as $item)
                            <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->type }}</td>
                            </tr>
                            @endforeach
                            
                        @else
                            
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    <div class="col-md-5">
       <div class="card card-body">
           <h3>Add New Quotation Service</h3>
            <form action="{{ route('create.service') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label for="">Tax</label>
                        <input type="text" class="form-control" name="vat">
                    </div>
                    <div class="form-group">
                        <label for="">Service Type</label>
                        <select name="type" id="" class="form-control">
                            <option>--None--</option>
                            <option value="KPA">KPA</option>
                            <option value="ALL">ALL</option>
                            <option value="IMPORT">IMPORT</option>
                            <option value="EXPORT">EXPORT</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Save Service</button>
                </form>
       </div>
    </div>
    
</div>
@stop