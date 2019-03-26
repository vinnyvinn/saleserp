<!-- Modal -->
<div class="modal fade" id="addopportunity" tabindex="-1" role="dialog" aria-labelledby="addopportunityLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addopportunityLabel">New Opportunity</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('accounts.addopportunity') }}" method="post">
                        <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                        
                    <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="">Opportunity Name</label>
                                    <input type="text" name="opportunity_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <select name="type" id="myselection" class="form-control">
                                            <option>--None--</option>
                                        <option value="Existing Business">Existing Business</option>
                                        <option value="New Business">New Business</option>
                                    </select>
                                </div>
                                <div id="showaccount" class="showaccount form-group">
                                    <label for="">Choose Business Account below</label>
                                    <select name="account_id" id="" class="form-control">
                                        <option>--None--</option>
                                        @foreach ($accounts as $item)
                                        <option value="{{ $item->id }}">{{ $item->account_name }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="">Amount</label>
                                <input type="number" class="form-control" name="amount">
                                </div>
                        </div>
                        <div class="col-6">
                                <div class="form-group">
                                        <label for="">Close Date</label>
                                       
                                        <div class="input-group">
                                                <input type="text" id="datepicker"class="form-control" name="closedate">
                                                <div class="input-group-append">
                                                 
                                                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Stage</label>
                                        <select name="stage" id="" class="form-control">
                                            <option>--None--</option>
                                            <option value="Qualification">Qualification</option>
                                            <option value="Meeting Scheduled">Meeting Sheduled</option>
                                            <option value="Proposal/Price Quote">Proposal/Price Quote</option>
                                            <option value="Negotiation/Review">Negotiation/Review</option>
                                            <option value="Closed Won">Closed Won</option>
                                            <option value="Closed Lost">Closed Lost</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="">Probability (%)</label>
                                            <input type="text" class="form-control" name="probability">
                                            </div>
                            </div>
                    </div>
                    <div class="row">
                       <div class="col-12">
                           <div class="form-group">
                                <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                           </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Lead Source</label>
                                <select name="source" id="" class="form-control">
                                    <option>--None--</option>
                                    <option value="Advertisement">Advertisement</option>
                                    <option value="Employee Referral">Employee Referral</option>
                                    <option value="External Referral">External Referral</option>
                                    <option value="Other">Other</option>
                                    <option value="Social">Social</option>
                                    <option value="Website">Website</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Next Step</label>
                                <input type="text" name="next_step" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </form>
            </div>
            
          </div>
        </div>
      </div>