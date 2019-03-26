<!-- Modal -->
<div class="modal fade" id="addlead" tabindex="-1" role="dialog" aria-labelledby="addleadLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addleadLabel">New lead</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('leads.store') }}" method="post">
                        <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                        
                    <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="lead_name" class="form-control">
                                </div>
                                <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status_id" id="" class="form-control">
                                            <option>--None--</option>
                                            @foreach ($lead_status as $item)
                                            <option value="{{ $item->id }}">{{ $item->status }}</option>
                                                
                                            @endforeach
                                        </select>
                                </div>
                               
                                <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone">
                                </div>
                        </div>
                        <div class="col-6">
                                <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                        <label for="">City</label>
                                        <input type="text" class="form-control" name="city">
                               </div>
                               <div class="form-group">
                                    <label for="">Company</label>
                                    <input type="text" class="form-control" name="company">
                                </div>
                                <div class="form-group">
                                        <label for="">Date Contacted</label>
                                       
                                        <div class="input-group">
                                                <input type="text" id="datepicker" class="form-control" name="contact_date">
                                                <div class="input-group-append">
                                                 
                                                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                              </div>
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
                                        <label for="">Salutation</label>
                                        <select name="salutation" id="" class="form-control">
                                            <option>--None--</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Dr.">Dr.</option>
                                            <option value="Prof.">Prof.</option>
                                        </select>
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