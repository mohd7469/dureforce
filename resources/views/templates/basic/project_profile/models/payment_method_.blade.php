<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Edit Card</h5>
             
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('profile.save.company') }}" method="POST" id="company_profile" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid welcome-body" id="">
                   
                    <span class="cmnt pb-4" style="display:none">Complete your profile to search from thousands of skilled freelancers and
                        request proposals.</span>
                    <div>
                        <div id="company-container" class="company-c-style">

                            <div id="">
                                <div class="col-md-12">
                                    <label class="mt-4">Cardholder’s Name *  </label>
                                    <input type="text" name="name" id="company-name" value=""
                                        placeholder="Tidal Wave Inc." value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="mt-4">Card Number *  </label>
                                    <input type="text" name="name" id="company-name" value=""
                                        placeholder="Tidal Wave Inc." value="">
                                </div>
                                <div class="row">
                                    
                                <div class="col-md-6">
                                    <label class="mt-4">Expiry Date *</label>
                                    <input type="number" name="phone" value="" />
                                </div>

                                <div class="col-md-6">
                                    <label class="mt-4">CVV * </label>
                                    <input type="text" name="email" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b" value=""/>
                                </div>
                                </div>
                      
                                

                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-secondary c-canel" data-bs-dismiss="modal">Cancel</button>
           <button type="button" class="btn btn-primary">Save</button>
        </div>
     </div>
  </div>
</div>