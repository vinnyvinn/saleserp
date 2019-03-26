<div class="card">
        <div class="card-title">
            <div class="row">
                <div class="col-12"><h4>Profile</h4></div>
                
            </div>
        </div>
        <div class="card-body">
                <ul class="nav navbar-pills navbar-pills-flat nav-tabs nav-stacked mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-customer-tab" data-toggle="pill" href="#pills-customer" role="tab" aria-controls="pills-home" aria-selected="true">Customer Details</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Billing Details </a>
                        </li>
                        
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-customer" role="tabpanel" aria-labelledby="pills-customer-tab">
                                <form action="{{ route('accounts.updateaccount', $account->id) }}" method="post">
                                        <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                                        <input type="hidden" value="{{ $account->id }}" name="account_id">
                                     <div class="row">
                                         <div class="col-6">
                                             <div class="form-group">
                                                 <label for="">Type of Account</label>
                                                
                                                 {!! Form::select('type', array('Prospect' => 'Prospect', 'Opportunity' => 'Opportunity', 'Customer' =>'Customer', 'Lead' => 'Lead'), $account->type, ['class' => 'form-control']) !!}
                                                
                                             </div>
                                         </div>
                                         <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Website</label>
                                                    <input type="text" class="form-control" name="website" value="{{ $account->website }}">
                                                </div>
                                            </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Account Name</label>
                                                <input name="account_name" type="text" class="form-control" value="{{ $account->account_name }}">
                                            </div>
                                            <div class="form-group">
                                                    <label for="">KRA Pin</label>
                                                    <input type="text" class="form-control" name="company_kra_pin" value="{{ $account->company_kra_pin }}">
                                                </div>
                                               
                                         </div>
                                         <div class="col-6">
                                                <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" class="form-control" name="phone" value="{{ $account->phone }}">
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="text" class="form-control" name="email" value="{{ $account->email }}">
                                                        </div>
                                            </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-6">
                                                <div class="form-group">
                                                        <label for="">Address</label>
                                                        <textarea name="billingaddress" class="form-control" id="" cols="30" rows="10">{{ $account->billingaddress }}</textarea>
                                                    </div>
                                         </div>
                                         <div class="col-6">
                                                <div class="form-group">
                                                        <label for="">Currency</label>
                                                        <select name="currency" class="form-control" id="">
                                                            <option value="Kes">Kes</option>
                                                            <option value="Usd">Usd</option>
                                                        </select>
                                                    </div>
                                         </div>
                                         
                                     </div>
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-primary">update</button>
                                 </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                      </div>


        </div>
</div>