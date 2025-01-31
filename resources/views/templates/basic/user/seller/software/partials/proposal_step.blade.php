<form action="{{route('seller.software.store.proposal')}}" method="post" id="propsal_form" enctype="multipart/form-data">
   @csrf
   <input type="hidden" value="{{ $software->id ?? '' }}" name="software_id" id="software_id">
    @php
        $proposal=getSoftwareProposalData($software);
        $files=old('uploaded_files',$proposal['attachments']);
        if(is_string($files)){
            $files=json_decode($files);
        }

        $service_fee=getSystemServiceFee();
        $user_percentage=(100-$service_fee)/100;
        $service_fee_percentage=$service_fee/100;

    @endphp
   <div class="card-body">
       <div class="card-form-wrapper">
           <div class="row justify-content-center">
               <input type="hidden" value="{{getSystemServiceFee()}}" id="system_service_fee_id">
               {{-- payment  mode  --}}
               {{-- <div class="row section-end-line text-dark pt-3 pb-1">
                  
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

               </div> --}}
               
               {{-- By Project Section --}}
               <div class="row section-end-line text-dark pt-3 pb-1  " id="by_project_section">

                  {{--project  start date --}}
                  <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6">
                     <label>@lang('Project Start Date')*</label>
                     <div class="input-group mb-3">
                     <input type="date" class="form-control" name="project_start_date" value="{{old('project_start_date',$proposal['project_start_date'])}}">
                     </div>
                  </div>

                  {{-- project due date --}}
                  <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-xs-6" >
                     <label>@lang('Project End Date')*</label>
                     <div class="input-group mb-3">
                     <input type="date" class="form-control" name="project_end_date" value="{{old('project_end_date',$proposal['project_end_date'])}}">
                     </div>
                  </div>

               </div>

               {{-- by milestone section --}}
               <div class="row section-end-line text-dark pt-3 pb-1 d-none" id="by_milestone_section">

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
                              <input type="date" class="form-control" name="milestones[1][start_date]" value="" id="milestones.1.start_date" min="1900-01-01" max="2099-12-31">
                              </div>
                           </div>
            
                           {{-- due date --}}
                           <div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">
                              <label>@lang('Due Date')*</label>
                              <div class="input-group mb-3">
                              <input type="date" class="form-control" name="milestones[1][end_date]" value=""  id="milestones.1.end_date" min="1900-01-01" max="2099-12-31">
                              </div>
                           </div>
            
                           {{-- amount --}}
                           <div class="col-md-2 col-lg-2 col-xl-2 col-sm-4 col-xs-4">
                              <label>@lang('Amount')*</label>
                              
                              <div class="input-group">
                                 <input type="number" name="milestones[1][amount]" step="any" maxlength="255" value="" class="form-control milestones_amount"  id="milestones.1.amount">
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
                              <input type="number" step="any" class="form-control" id="total_milestones_amount"  name="fixed_bid_amount"  oninput="this.value = Math.abs(this.value)" value="{{old('fixed_bid_amount',$proposal['fixed_bid_amount'] ? $proposal['fixed_bid_amount'] : floatval(@$software->price)) }}">
                              <span class="input-group-text float-end">$</span>
                           </div>

                        </div>
                  </div>
                  
                  {{-- service fee --}}
                  <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12 bg-default">
                     
                     <div class="form-group pt-3">
                        <label for="" ><strong class="text-dark">Dureforce Service Fee</strong></label>
                        <small  class="form-text text-muted">{{$service_fee}}% Service Fee 
                           {{-- <a href="#" class="link-space" style="color: #007F7F; margin-left: 80px;">Explain this</a> --}}
                        </small><br>
                        <span class="pt-2 text-dark" id="system_fee">
                           {{old('fixed_bid_amount',$proposal['fixed_bid_amount'] ? (float)$proposal['fixed_bid_amount'] : floatval(@$software->price))*$service_fee_percentage }}
                        </span>
                     </div>

                  </div>
                  
                  {{-- freelancer recieving amount --}}
                  <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                     <div class="form-group pt-3">
                        <label for=""><strong class="text-dark">You’ll Recieve *</strong></label>
                        <small  class="form-text text-muted">The estimated amount you'll receive after service fees</small>
                           
                           <div class="input-group">
                              <input type="number" class="form-control"  aria-describedby="emailHelp " name="amount_receive" step="any" readonly id="milestones_amount_receive" value="{{old('fixed_bid_amount',$proposal['fixed_bid_amount'] ? (float)$proposal['fixed_bid_amount']: floatval(@$software->price)) * $user_percentage }}">
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
                        <small  class="form-text text-dark">Mode of Delivery *</small>
                        <select name="delivery_mode_id" id="delivery_mode_id" class="form-control">
                           <option value="">Select Mode Of Delivery</option>
                           @foreach ($delivery_modes as $mode)
                              <option value="{{$mode->id}}" {{ (old("delivery_mode_id",$proposal['delivery_mode_id']) == $mode->id ? "selected":"") }}>{{$mode->title}}</option>
                              
                           @endforeach
                        </select>
                     </div>
                  </div>

               </div>

               {{-- Additional Detail--}}
               <div class="row">
               
                   {{-- card header --}}
                   <div class="card-header bg-default ">
                       {{-- div title --}}
                       <h3>Additional Detail </h3>
                   </div>
                   {{-- card body --}}
                   <div class="div-background" >
                       
                       {{-- Cover Letter --}}
                       <div class="form-group">
                           <label for="cover_letter">Cover Letter*</label>
                           <textarea class="form-control cover-letter" id="cover_letter" rows="20" cols="8" name="cover_letter" >{{config('settings.software_description_prefix')}} {{old('cover_letter',$proposal['cover_letter'] ? $proposal['cover_letter'] : @$software->description) }}</textarea>
                       </div>
           
                       {{-- Required documents --}}
                       <div class="form-group">
                           <label>@lang('Required Documents')</label>
                           <div id="dropzone">
                               <div class="dropzone needsclick" id="demo-upload" action="#" >
                                   
                                   <div class="fallback">
                                       <input name="file" type="file" multiple />
                                   </div>
                                   <div>
                                       <div class="upload_icon">
                                           <img src="{{url('assets/images/frontend/job/upload.svg')}}" alt="">
                                           <img src="{{url('assets/images/frontend/job/arrow_up.svg')}}" alt="" class="upload_inner_arrow">
                                       </div>
                                   </div>
                                   <div class="dz-message"> 
                                       @lang('Drag or Drop to Upload')  <br> 
                                       <span class="text text-primary ">
                                       @lang('Browse')  
                                       
                                       </span>
                                   </div>
           
                               </div>
                           </div>
                           <small>
                               Attachments Guideline: You may attach up to 6 files under the size of 3MB each. Include work samples or other documents to support your application. 
                               Do not attach your résumé — your Dureforce profile is automatically forwarded to the client with your job.
                           </small>
                   
                       </div>
                   </div>

                   
           
               </div>
                {{-- uploaded files preview --}}
               <div>
                  <table class="table table-bordered" id="uploaded_file_table_id">
                      <tbody id="file_name_div">
                          @foreach ( $files  as $item)
                              <tr>
                                  <td><a href="{{$item->url}}" download>{{$item->uploaded_name}}</a></td>
                                  <td class="text-center">{{$item->type}}</td>
                                  <td class="text-center" id="DeleteButton">
                                      <span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-trash" style="color:red" ></i></span>
                                  </td>
                                  <td class="text-center">
                                      <a href="{{$item->url}}" download><span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-download"  ></i></span></a>

                                  </td>

                              </tr>
                          @endforeach
                      </tbody>
                  </table>
               </div>

            </div>

            <div class="row">
               <div class="col-md-6">
                  <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100 back-button"
                     href="?view=step-3" type="button">@lang('BACK')</a>
               </div>
               <div class="col-md-6 text-right">
                  <a class="stepwizard-step service--btns btn btn-secondary float-left  mt-20 w-100 back-button"
                           href="{{route('user.software.index')}}" type="button">@lang('Cancel')</a>

                  <button class="btn softwar-save-draft--btns btn-secondary float-left  mt-20 w-100"  name="action" type="submit" value="save_project">
                     @lang('Save as Draft')
                  </button> 
                  <button type="submit" name="action" class="btn btn-save-continue btn-primary float-left mt-20 w-100" value="continue">@lang('Continue')</button>
               </div>

            </div>

            <input type="hidden" value="{{old('uploaded_files',json_encode($proposal['attachments']))}}" name="uploaded_files" id="uploaded_files_input_id">

       </div>
   </div>
 
</form>
<style>
   @media only screen and (max-width:683px){
   .dz-message {
      text-align: center !important;
      position: relative !important;
      top: -50% !important;
      left: 0% !important;
   }
   .upload_icon {
      position: absolute !important;
      left: 0% !important;
      right: 0% !important;
      top: 54% !important;
      bottom: 22% !important;
      text-align: center !important;
   }
}
</style>
@push('style-lib')

   <link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/proposal_step.css')}}">

@endpush
@push('script-lib')

   <script>
      var file_upload_url="{{route('file.upload') }}";
   </script>
   <script src="{{asset('/assets/resources/templates/basic/frontend/js/dropzone.js')}}"></script>
   <script src="{{asset('public/js/proposal-step.js')}}"></script>


@endpush


