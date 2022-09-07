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
          
          <form>
              {{-- Bidding Rate --}}
             <div class="row section-end-line">
                
                {{-- hourly rate --}}
                <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                      <div class="form-group pt-3">
                         <label for=""><strong class="text-dark">Hourly Rate *</strong></label>
                         <small id="emailHelp" class="form-text text-muted">Total amount the client will see on your proposal</small>
                         <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                      <small id="emailHelp" class="form-text text-muted">The estimated amount you'll receive after service fees</small>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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

                               <small id="emailHelp" class="form-text text-dark">Min. Hours Per Week</small>
                               <input type="integer" class="form-control" id="min_hours" name="min_hours">

                            </div>
                            <div class="col-md-6 col-lg-6 col-sm12 col-xs-12">

                               <small id="emailHelp" class="form-text text-dark">Max. Hours Per Week</small>
                               <input type="integer" class="form-control" id="max_hours" name="max_hours">

                            </div>
                         </div>

                      </div>
                </div>
                
               
                {{-- Mode of Work Delivery --}}
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                   <div class="form-group pt-3">
                      <label for="" ><strong class="text-dark">What is your mode of work delivery?</strong></label>
                      <small id="emailHelp" class="form-text text-dark">Mode of Devlivery *</small>
                      <select name="mode_of_delivery" id="mode_of_delivery" class="form-control">
                         <option value="">Select Mode Of Delivery</option>
                      </select>
                   </div>
                </div>

             </div>


          </form>
          
         

       </div>

    </div>

 </div>