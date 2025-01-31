<div class="modal fade" id="editPaymentModel" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Edit Card</h5>
             
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('buyer.basic.profile.save.payment.methods') }}" method="POST" id="payment_methods_" enctype="multipart/form-data">
                @csrf
                
                <div class="container-fluid welcome-body" id="">
                   
                    <span class="cmnt pb-4" style="display:none">Complete your profile to search from thousands of skilled freelancers and
                        request proposals.</span>
                    <div>
                        <div id="company-container" class="company-c-style">

                            <div id="">
                                <input type="hidden" name="update_payment_id" id="payment_id" value="">
                                <div class="col-md-12">
                                    <label class="mt-4">Cardholder’s Name *  </label>
                                    <input type="text" name="name_on_card" id="edit_name_on_card" value="name_on_card"
                                        placeholder="Tidal Wave Inc." >
                                </div>
                                <div class="col-md-12">
                                    <label class="mt-4">Card Number *  </label>
                                    <input type="text" name="card_number" id="edit_card_number" value="card_number"
                                        placeholder="Tidal Wave Inc."  value="" placeholder=""
                                        >
                                </div>
                                <div class="row">
                                    
                                <div class="col-md-6">
                                    <label class="mt-4">Expiry Date *</label>
                                    <input type="date" name="expiration_date" id="edit_expiration_date"
                                    value="{{ old('expiration_date', @$userPayment->expiration_date) }}"
                                    placeholder="" required   min="1900-01-01" max="2099-12-31"/>
                                </div>

                                <div class="col-md-6">
                                    <label class="mt-4">CVV * </label>
                                    <input type="text" name="cvv_code" id="edit_cvv_code" required  />
                                </div>
                                  <div class="col-md-6">
                                    <label class="mt-4">Country <span class="imp">*</span></label>
                                    <select
                                            name="country_id"
                                            class="form-control select-lang"
                                            id="edit_sec_country_id"
                                            >
                                            <option
                                                value=""
                                            >
                                                Select Country
        
                                            </option>
        
                                            @foreach ($countries as $country)
                                                <option
                                                value="{{$country->id}}"
                                                {{ $country->id == @$userPayment->country_id ? 'selected' : '' }}
                                                
                                                >
                                                {{$country->name}}
                                                </option>
                                            @endforeach
        
                                        </select>
                                </div>
        
                                
        
                                <div class="col-md-6" id="cities_div">
                                    <label class="mt-4">City <span class="imp">*</span></label>
                                    <select class="form-control select-lang select2" id="edit_payment_city_id"  name="city_id" style="width: 100%;" >
                                       
                                        <!-- Add more options here -->
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label class="mt-4">Street Address <span class="imp">*</span></label>
                                    <input type="text" name="address" placeholder="" id="edit_address"  value="{{ old('address', @$userPayment->address) }}"
                                   
                                    
                                        required/>
                                </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary c-canel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-continue btn-secondary">Update</button>
                     </div>
                    
                </div>
            </form>
        </div>
   
     </div>
  </div>
</div>