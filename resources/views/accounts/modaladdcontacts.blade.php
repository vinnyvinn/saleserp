<!-- Modal -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Contact</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="{{ route('accounts.addcontacts') }}" method="post">
                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                    <input type="hidden" value="{{ $account->id }}" name="account_id">
                 <div class="row">
                     <div class="col-12">
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
                     
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                      
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input name="last_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                           
                    
                            <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                        <label for="">Position/Title</label>
                                        <input type="text" class="form-control" name="position">
                                </div>
                            <div class="form-group">
                                    <label for="">Buying Role</label>
                                   <select name="buying_role" class="form-control" id="">
                                       <option>--None--</option>
                                       <option value="Decision">Decision</option>
                                       <option value="Maker">Maker</option>
                                       <option value="Initiator">Initiator</option>
                                       <option value="Influencer">Influencer</option>
                                       <option value="Buyer">Buyer</option>
                                   </select>
                                </div>
                     </div>
                     
                 </div>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save</button>
             </form>
            </div>
          
          </div>
        </div>
      </div>