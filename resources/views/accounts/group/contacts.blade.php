<div class="card">
    <div class="card-title">
        <div class="row">
            <div class="col-9"><h4>Contacts</h4></div>
            <div class="col-3">
                    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addcontact">Add New Contact</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table table-striped" style="width:100%" id="list">
                <thead>
                    <th>Full Name</th>
                    <th>Position</th>
                    <th>Buying Role</th>
                    <th>Email</th>
                    <th>Phone</th>
                </thead>
                <tbody>
                    @if (count($contact) >0)
                        @foreach($contact as $contact_item)
                        <tr>
                            <td>{{ $contact_item->salutation .' '. $contact_item->first_name . ' '. $contact_item->last_name}}</td>
                            <td>{{ $contact_item->position }}</td>
                            <td>{{ $contact_item->buying_role }}</td>
                            <td>{{ $contact_item->email }}</td>
                            <td>{{ $contact_item->phone }}</td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td>Sorry no Contacts found for this Account</td>
                    </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
</div>