 {{-- Proposal Terms --}}
 <div class="row">
                        
    <div class="card  mb-3" style="padding:0px;border:none">
       
       {{-- card header --}}
       <div class="card-header bg-default">
          {{-- div title --}}
          <h3>Proposal Terms</h3>
       </div>
       {{-- card body --}}
       <div class="card-body text-success div-background" >
          
          {{-- Freelancder Profile attributes --}}
          <div class="row section-end-line" >

             <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                
                <ul class="list-group">
             
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                      What is the rate you'd like to bid for this job?
                     <span class="badge badge-primary badge-pill"></span>
                   </li>
                   
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                      Your Profile Rate
                     <span class="badge badge-primary badge-pill">$30.00/hr</span>
                   </li>
                   
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                      Client’s Weekly Hourly Range
                     <span class="badge badge-primary badge-pill">$15.00 - $25.00/hr</span>
                   </li>

                   <li class="list-group-item d-flex justify-content-between align-items-center">
                      Estimated Project Start Date
                     <span class="badge badge-primary badge-pill">7/22/2022 </span>
                   </li>

                </ul>

             </div>
          </div>
          
         
         {{-- Bidding Rate --}}
         <div class="row section-end-line">
            
            {{-- hourly rate --}}
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                  <div class="form-group pt-3">
                     <label for=""><strong class="text-dark">Hourly Rate *</strong></label>
                     <small id="hourly_bid_rate_small" class="form-text text-muted">Total amount the client will see on your proposal</small>
                     <input type="number" name="hourly_bid_rate" class="form-control" id="hourly_bid_rate"  min="1">
                  </div>
            </div>
            
            {{-- service fee --}}
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 bg-default">
               
               <div class="form-group pt-3">
                  <label for="" ><strong class="text-dark">Dureforce Service Fee</strong></label>
                  <small id="emailHelp" class="form-text text-muted">20% Service Fee <a href="#" class="link-space">Explain this</a></small><br>
                  <span class="pt-2 text-dark">$12.00</span>
               </div>

            </div>
            
            {{-- freelancer recieving amount --}}
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
               <div class="form-group pt-3">
                  <label for=""><strong class="text-dark">You’ll Recieve *</strong></label>
                  <small  class="form-text text-muted">The estimated amount you'll receive after service fees</small>
                  <input type="number"  class="form-control" id="amount_receive" aria-describedby="emailHelp" name="amount_receive" readonly>
               </div>
            </div>

         </div>

         <div class="row ">
            
            {{-- hours Limit --}}
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                  <div class="form-group pt-3">
                     <label for=""><strong class="text-dark">What is your weekly working hours limit?</strong></label>
                     <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm12 col-xs-12">

                           <small  class="form-text text-dark">Min. Hours Per Week</small>
                           <input type="integer" class="form-control" id="start_hour_limit" name="start_hour_limit">

                        </div>
                        <div class="col-md-6 col-lg-6 col-sm12 col-xs-12">

                           <small  class="form-text text-dark">Max. Hours Per Week</small>
                           <input type="integer" class="form-control" id="end_hour_limit" name="end_hour_limit">

                        </div>
                     </div>

                  </div>
            </div>
            
         
            {{-- Mode of Work Delivery --}}
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
               <div class="form-group pt-3">
                  <label for="" ><strong class="text-dark">What is your mode of work delivery?</strong></label>
                  <small id="emailHelp" class="form-text text-dark">Mode of Devlivery *</small>
                  <select name="delivery_mode_id" id="mode_of_delivery" class="form-control">
                     <option value="">Select Mode Of Delivery</option>
                     @foreach ($delivery_modes as $mode)
                     <option value="{{$mode->id}}">{{$mode->title}}</option>
                         
                     @endforeach
                  </select>
               </div>
            </div>

         </div>

       </div>

    </div>

 </div>