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
                     <span class="badge badge-primary badge-pill">$1200</span>
                   </li>
                   
                  
                   {{-- project start date --}}
                   <li class="list-group-item d-flex justify-content-between align-items-center">
                      Estimated Project Start Date
                     <span class="badge badge-primary badge-pill">7/22/2022 </span>
                   </li>

                </ul>

             </div>
          </div>

          {{-- payment  mode  --}}
          <div class="row section-end-line text-dark pt-3 pb-1">
            
            <div class="form-check">
               <input class="form-check-input" type="radio" name="payment_mode" id="milestone" checked onclick="byMilestone()">
               <label class="form-check-label" for="milestone">
                  By Milestone
               </label>
               <small>Divide the project into smaller segments, called milestones. You'll be paid for milestones as they are completed and approved.</small>
             </div>

             <div class="form-check">
               <input class="form-check-input" type="radio" name="payment_mode" id="project" onclick="byProject()">
               <label class="form-check-label" for="project">
                  By Project
               </label>
               <small>Divide the project into smaller segments, called milestones. You'll be paid for milestones as they are completed and approved.</small>
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
                        <input type="text" name="description" maxlength="255" value="" class="form-control" >
                     </div>
      
                     {{-- start date --}}
                     <div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">
                        <label>@lang('Start Date')*</label>
                        <div class="input-group mb-3">
                        <input type="date" class="form-control" name="start_date" value="" >
                        </div>
                     </div>
      
                     {{-- due date --}}
                     <div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">
                        <label>@lang('Due Date')*</label>
                        <div class="input-group mb-3">
                        <input type="date" class="form-control" name="due_date" value=""  >
                        </div>
                     </div>
      
                     {{-- amount --}}
                     <div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">
                        <label>@lang('Amount')*</label>
                        <input type="integer" name="title" maxlength="255" value="" class="form-control" >
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
                     
                        <label for=""><strong class="text-dark">Total Price of Project</strong></label>
                        <small  class="form-text text-muted">This includes all milestones, and is the amount 
                        your client will see</small>
                        <input type="integer" class="form-control" id="total_amount"  name="total_amount">
                     </div>
               </div>
               
               {{-- service fee --}}
               <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 bg-default">
                  
                  <div class="form-group pt-3">
                     <label for="" ><strong class="text-dark">Dureforce Service Fee</strong></label>
                     <small  class="form-text text-muted">20% Service Fee <a href="#" class="link-space">Explain this</a></small><br>
                     <span class="pt-2 text-dark">$12.00</span>
                  </div>

               </div>
               
               {{-- freelancer recieving amount --}}
               <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                  <div class="form-group pt-3">
                     <label for=""><strong class="text-dark">You’ll Recieve *</strong></label>
                     <small  class="form-text text-muted">The estimated amount you'll receive after service fees</small>
                     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
               </div>

            </div>

            <div class="row ">
               
         
               {{-- Mode of Work Delivery --}}
               <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                  <div class="form-group pt-3">
                     <label for="" ><strong class="text-dark">What is your mode of work delivery?</strong></label>
                     <small  class="form-text text-dark">Mode of Devlivery *</small>
                     <select name="mode_of_delivery" id="mode_of_delivery" class="form-control">
                        <option value="">Select Mode Of Delivery</option>
                     </select>
                  </div>
               </div>

            </div>

       </div>

    </div>

 </div>