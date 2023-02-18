@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="all-sections pt-3">
   <div class="container-fluid p-max-sm-0">
      <div class="sections-wrapper d-flex flex-wrap justify-content-center">
         <article class="main-section">
            <div class="section-inner">
               <div class="item-section item-details-section">
                  
                  {{-- Page container --}}
                  <div class="container">
                     {{--  Page Heading --}}
                     <div>
                        <h2 class="title title-color" >Submit a Proposal</h2>
                     </div>

                     {{-- Job Details--}}
                     <div class="row">
                        
                        <div class="card  mb-3 card_div">
                           
                           {{-- card header --}}
                           <div class="card-header bg-default">
                              {{-- div title --}}
                              <h3>Job Details</h3>
                           </div>
                           {{-- card body --}}
                           <div class="card-body" style="background: #F8FAFA;">
                                 
                              <div class="row">
                                 {{-- job main info --}}
                                 <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                                 
                                    {{-- title and created at --}}
                                    <div class="left">
                                       <p class="jb-title" >{{$proposal->title? $proposal->title : ''}}</p>
                                       <span class="simpletext"> {{$proposal->created_at->format('Y-m-d') ? $proposal->created_at->format('Y-m-d') : '' }}</span> 
                                    </div>
                                    
                                    {{-- description and job post link --}}
                                    <div>
                                       
                                       <p class="simpletext">
                                          {{str_limit($proposal->description, 500 )}}
                                       </p>

                                       <div>
                                          <a href="#" role="button" class="standard-btn" >View job posting</a>
                                       </div>
                                    </div>

                                 </div>

                                 {{-- job summary --}}
                                 <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    <div class="sidebar">
                                       <div class="widget custom-widget mb-30 cstm-sidebar">
                                           @if($proposal->budget_type_id == \App\Models\BudgetType::$hourly)
                                               <ul class="sidebar-title2 sidebar-heading-border">
                                                   <li><span>Hourly Range:</span>
                                                       <span>{{ '$'.$proposal->hourly_start_range." - $".$proposal->hourly_end_range }}</span>
                                                   </li>
                                               </ul>
                                           @else
                                               <ul class="sidebar-title2 sidebar-heading-border">
                                                   <li><span>Fixed Amount:</span>
                                                       <span>{{ '$'.$proposal->fixed_amount}}</span>
                                                   </li>
                                               </ul>
                                           @endif


                                           <ul class="sidebar-title2">
                                               <li><span>Location</span>
                                                   <p>{{$proposal->country ? $proposal->country->name : '' }}</p>
                                               </li>
                                           </ul>

                                           <ul class="sidebar-title2">
                                               <li><span>Budget Type</span>
                                                   <p>{{$proposal->budgetType->title ? $proposal->budgetType->title : ''}}</p>
                                               </li>
                                           </ul>
                                           <ul class="sidebar-title2">
                                               <li><span>Project Length</span>
                                                   <p>{{$proposal->project_length ? $proposal->project_length->name : ''}}</p>
                                               </li>
                                           </ul>
                                           
                                           <ul class="sidebar-title2">
                                               <li><span>Project Stage</span>
                                                   <p>{{$proposal->projectStage ? $proposal->projectStage->title  : ''}}</p>
                                               </li>
                                           </ul>
                                           <ul class="sidebar-title2">
                                               <li><span>Experience Level</span>
                                                   <p>{{$proposal->rank->level ?  $proposal->rank->level : ''}}</p>
                                               </li>
                                           </ul>

                                           
                                       </div>
                                   </div>
                                 </div>

                              </div>

                           </div>

                           {{-- card footer --}}
                           <div class="card-footer bg-transparent ">
                              
                              <div class="service_subtitle2" style="padding-top: 2px">
                                 Skills and Expertise
                              </div>
                             
                              @foreach($proposal->skill as $skil)
                                 <span class="attr">{{$skil->name}}</span>
                              @endforeach
                              
                           </div>

                        </div>

                     </div>

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
                                        @if($proposal->budget_type_id == \App\Models\BudgetType::$hourly)

                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                          Client’s Weekly Hourly Range
                                         <span class="badge badge-primary badge-pill"> {{ '$'.$proposal->hourly_start_range." - $".$proposal->hourly_end_range }} </span>
                                       </li>
                                        @else

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Client’s Budget for Job
                                                <span class="badge badge-primary badge-pill"> {{ '$'.$proposal->fixed_amount}} </span>
                                            </li>
                                        @endif
      
                                       <li class="list-group-item d-flex justify-content-between align-items-center">
                                          Estimated Project Start Date
                                         <span class="badge badge-primary badge-pill">7/22/2022 </span>
                                       </li>
      
                                    </ul>

                                 </div>
                              </div>
                              
                              <form action="{{route('seller.proposal.store',$job->uuid)}}" method="POST">
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
                                          <small id="emailHelp" class="form-text text-muted">20% Service Fee 
                                             {{-- <a href="#" class="link-space" style="color: #007F7F; margin-left: 80px;">Explain this</a> --}}
                                          </small><br>
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
                                                   <input type="integer" class="form-control" step="any" id="min_hours" name="min_hours">

                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm12 col-xs-12">

                                                   <small id="emailHelp" class="form-text text-dark">Max. Hours Per Week</small>
                                                   <input type="integer" step="any" class="form-control" id="max_hours" name="max_hours">

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

                     {{-- Additional Detail--}}
                     <div class="row">
                        
                        <div class="card  mb-3 card_div" >
                           
                           {{-- card header --}}
                           <div class="card-header bg-default ">
                              {{-- div title --}}
                              <h3>Additional Detail </h3>
                           </div>
                           {{-- card body --}}
                           <div class="card-body div-background" >
                              
                              {{-- Cover Letter --}}
                              <div class="form-group">
                                 <label for="cover_letter">Cover Letter*</label>
                                 <textarea class="form-control cover-letter" id="cover_letter" rows="20" cols="8" name="cover_letter" ></textarea>
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
                                    Attachments Guideline: You may attach up to 10 files under the size of 25MB each. Include work samples or other documents to support your application. 
                                    Do not attach your résumé — your Dureforce profile is automatically forwarded to the client with your proposal.
                                 </small>
                           
                              </div>
                           </div>

                        </div>

                     </div>

                     
                  </div>

               </div>
            </div>
         </article>
      </div>
   </div>
</section>
@include($activeTemplate . 'partials.end_ad')
@endsection

@push('style-lib')

    <link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/job_proposal.css')}}">

@endpush
@push('script-lib')

   <script src="{{asset('/assets/resources/templates/basic/frontend/js/dropzone.js')}}"></script>
   <script src="{{asset('/assets/resources/templates/basic/frontend/js/create_job.js')}}"></script>


@endpush

@push('script')
<script>
   'use strict';
   Dropzone.autoDiscover = false;

   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>
@endpush
