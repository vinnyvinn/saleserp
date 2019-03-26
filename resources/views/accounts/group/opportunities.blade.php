<div class="card">
        <div class="card-title">
            <div class="row">
                <div class="col-9"><h4>Opportunities</h4></div>
                <div class="col-3">
                        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addopportunity">Add New Opportunity</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table table-striped" style="width:100%" id="list">
                    <thead>
                        <th>Opportunity Name</th>
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
