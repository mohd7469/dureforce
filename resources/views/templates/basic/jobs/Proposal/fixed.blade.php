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
             
                  {{-- fixed price --}}
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                      Fixed Price
                     <span class="badge badge-primary badge-pill">{{ '$'.$job->fixed_amount}}</span>
                   </li>
                   
                  
                   {{-- project start date --}}
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                      Estimated Project Start Date
                     <span class="badge badge-primary badge-pill">{{getFormattedDate($job->expected_start_date,'d-m-Y')}}</span>
                   </li>

                </ul>

             </div>
          </div>

          {{-- payment  mode  --}}
          <div class="row section-end-line text-dark pt-3 pb-1">
            
            <div class="form-check">
               <input class="form-check-input" type="radio" name="bid_type" id="milestone" checked onclick="byMilestone()" value="milestone">
               <label class="form-check-label" for="milestone">
                  By Milestone
               </label>
               <small>Divide the project into smaller segments, called milestones. You'll be paid for milestones as they are completed and approved.</small>
             </div>

             <div class="form-check">
               <input class="form-check-input" type="radio" name="bid_type" id="project" onclick="byProject()" value="by_project">
               <label class="form-check-label" for="project">
                  By Project
               </label>
               <small>You'll be paid for complete amount as the project completed and approved.</small>
             </div>

          </div>
          {{-- By Project Section --}}
         <div class="row section-end-line text-dark pt-3 pb-1 d-none " id="by_project_section">

             {{--project  start date --}}
             <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6">
               <label>@lang('Project Start Date')*</label>
               <div class="input-group mb-3">
               <input type="date" class="form-control" name="project_start_date" value="" >
               </div>
            </div>

            {{-- project due date --}}
            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6" >
               <label>@lang('Project End Date')*</label>
               <div class="input-group mb-3">
               <input type="date" class="form-control" name="project_end_date" value=""  >
               </div>
            </div>

         </div>
         {{-- by milestone section --}}
          <div class="row section-end-line text-dark pt-3 pb-1 " id="by_milestone_section">

               {{-- description --}}
               <div class=" milestones" id="milestiones">
                  
                  <div class="row" id="milestone1">
                     <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                        <label>@lang('Description')*</label>
                        <input type="text" name="milestones[1][description]" maxlength="255" value="" class="form-control" id="milestones.1.description">
                     </div>
      
                     {{-- start date --}}
                     <div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">
                        <label>@lang('Start Date')*</label>
                        <div class="input-group mb-3">
                        <input type="date" class="form-control" name="milestones[1][start_date]" value="" id="milestones.1.start_date" >
                        </div>
                     </div>
      
                     {{-- due date --}}
                     <div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">
                        <label>@lang('Due Date')*</label>
                        <div class="input-group mb-3">
                        <input type="date" class="form-control" name="milestones[1][end_date]" value=""  id="milestones.1.end_date" >
                        </div>
                     </div>
      
                     {{-- amount --}}
                     <div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">
                        <label>@lang('Amount')*</label>
                        
                        <div class="input-group">
                           <input type="number" name="milestones[1][amount]" step="any" maxlength="255" value="" class="form-control milestones_amount"  id="milestones.1.amount" oninput="this.value = Math.abs(this.value)">
                           <span class="input-group-text float-end">$</span>
                        </div>
                     </div>
                  </div>
                  

               </div>
               
               <button type="button" class="btn btn-primary btn-sm add-milestone-btn" id="milestone_btn">Add Milestone</button>

          </div>

          
            {{-- Bidding Rate --}}
            <div class="row section-end-line">
               
               {{-- hourly rate --}}
               <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                     <div class="form-group pt-3">
                     
                        <label for=""><strong class="text-dark">Total Price of Project*</strong></label>
                        <small  class="form-text text-muted">This includes all milestones, and is the amount 
                        your client will see</small>
                        
                        <div class="input-group">
                           <input type="number" step="any" class="form-control" id="total_milestones_amount"  name="total_project_price" readonly oninput="this.value = Math.abs(this.value)">
                           <span class="input-group-text float-end">$</span>
                        </div>

                     </div>
               </div>
               
               {{-- service fee --}}
               <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 bg-default">
                  
                  <div class="form-group pt-3">
                     <label for="" ><strong class="text-dark">Dureforce Service Fee</strong></label>
                     <small  class="form-text text-muted">20% Service Fee 
                        {{-- <a href="#" class="link-space" style="color: #007F7F; margin-left: 80px;">Explain this</a> --}}
                     </small><br>
                     <span class="pt-2 text-dark" id="system_fee"></span>
                  </div>

               </div>
               
               {{-- freelancer recieving amount --}}
               <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                  <div class="form-group pt-3">
                     <label for=""><strong class="text-dark">You’ll Recieve *</strong></label>
                     <small  class="form-text text-muted">The estimated amount you'll receive after service fees</small>
                        
                        <div class="input-group">
                           <input type="number" class="form-control"  aria-describedby="emailHelp " name="amount_receive" step="any" readonly id="milestones_amount_receive">
                           <span class="input-group-text float-end">$</span>
                        </div>
                        
                     
                  </div>
               </div>

            </div>

            <div class="row ">
               
         
               {{-- Mode of Work Delivery --}}
               <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                  <div class="form-group pt-3">
                     <label for="" ><strong class="text-dark">What is your mode of work delivery?</strong></label>
                     <small  class="form-text text-dark">Mode of Devlivery *</small>
                     <select name="delivery_mode_id" id="delivery_mode_id" class="form-control">
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