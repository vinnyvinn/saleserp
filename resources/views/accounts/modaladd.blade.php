<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form action="{{ route('accounts.store') }}" method="post">
                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                 <div class="row">
                     <div class="col-6">
                         <div class="form-group">
                             <label for="">Type of Account</label>
                             <select name="type" id="" class="form-control">
                                 <option>--None--</option>
                                 <option value="Analyst">Analyst</option>
                                 <option value="Competitor">Competitor</option>
                                 <option value="Customer">Customer</option>
                                 <option value="Investor">Investor</option>
                                 <option value="Partner">Partner</option>
                                 <option value="Press">Press</option>
                                 <option value="Prospect">Prospect</option>
                                 <option value="Reseller">Reseller</option>
                                 <option value="Other">Other</option>
                             </select>
                         </div>
                     </div>
                     <div class="col-6">
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" class="form-control" name="website">
                            </div>
                        </div>
                 </div>
                 <div class="row">
                     <div class="col-6">
                        <div class="form-group">
                            <label for="">Account Name</label>
                            <input name="account_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">KRA Pin</label>
                                <input type="text" class="form-control" name="company_kra_pin">
                            </div>
                           
                     </div>
                     <div class="col-6">
                            <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                        </div>
                 </div>
                 <div class="row">
                     <div class="col-12">
                            <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="billingaddress" class="form-control" id="" cols="30" rows="10"></textarea>
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