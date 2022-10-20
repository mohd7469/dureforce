<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Edit Card</h5>
             
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('buyer.basic.profile.save.payment.methods') }}" method="POST" id="payment_methods" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid welcome-body" id="">
                   
                    <span class="cmnt pb-4" style="display:none">Complete your profile to search from thousands of skilled freelancers and
                        request proposals.</span>
                    <div>
                        <div id="company-container" class="company-c-style">

                            <div id="">
                                <div class="col-md-12">
                                    <label class="mt-4">Cardholder’s Name *  </label>
                                    <input type="text" name="name_on_card" id="company-name" value=""
                                        placeholder="Tidal Wave Inc." value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="mt-4">Card Number *  </label>
                                    <input type="text" name="card_number" id="company-name"
                                        placeholder="Tidal Wave Inc."  value="{{ old('card_number', @$userPayment->card_number) }}" placeholder=""
                                        >
                                </div>
                                <div class="row">
                                    
                                <div class="col-md-6">
                                    <label class="mt-4">Expiry Date *</label>
                                    <input type="date" name="expiration_date"
                                    value="{{ old('expiration_date', @$userPayment->expiration_date) }}"
                                    placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label class="mt-4">CVV * </label>
                                    <input ype="text" name="cvv_code"
                                    value="{{ old('cvv_code', @$userPayment->cvv_code) }}" placeholder="" required  />
                                </div>
                                </div>
                      
                                

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary c-canel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-continue btn-secondary">Save</button>
                     </div>
                    
                </div>
            </form>
        </div>
   
     </div>
  </div>
</div>