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
                        <form action="{{route('seller.proposal.store',$job->uuid)}}" method="post" id="propsal_form" enctype="multipart/form-data">
                           @csrf
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
                                             <p class="jb-title" ><b>{{$job->title? $job->title : ''}}</b></p>
                                             <span class="simpletext"><b>Posted On :{{$job->created_at->format('Y-m-d') ? $job->created_at->format('Y-m-d') : '' }}</b></span> 
                                          </div>
                                          
                                          {{-- description and job post link --}}
                                          <div>
                                             
                                             <p class="simpletext">
                                                {{str_limit($job->description, 500 )}}
                                             </p>

                                             <div>
                                                <a href="{{route('seller.job.jobview',$job->uuid)}}" role="button" class="standard-btn" >View job posting</a>
                                             </div>
                                          </div>

                                       </div>

                                       {{-- job summary --}}
                                       <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                          <div class="sidebar">
                                             <div class="widget custom-widget mb-30 cstm-sidebar">
                                                @if($job->budget_type_id == \App\Models\BudgetType::$hourly)
                                                   <ul class="sidebar-title2 sidebar-heading-border">
                                                         <li><span>Hourly Range:</span>
                                                            <span>{{ '$'.$job->hourly_start_range." - $".$job->hourly_end_range }}</span>
                                                         </li>
                                                   </ul>
                                                @else
                                                   <ul class="sidebar-title2 sidebar-heading-border">
                                                         <li><span>Fixed Amount:</span>
                                                            <span>{{ '$'.$job->fixed_amount}}</span>
                                                         </li>
                                                   </ul>
                                                @endif


                                                <ul class="sidebar-title2">
                                                   <li><span>Location</span>
                                                         <p>{{$job->country ? $job->country->name : '' }}</p>
                                                   </li>
                                                </ul>

                                                <ul class="sidebar-title2">
                                                   <li><span>Budget Type</span>
                                                         <p>{{$job->budgetType->title ? $job->budgetType->title : ''}}</p>
                                                   </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                   <li><span>Project Length</span>
                                                         <p>{{$job->project_length ? $job->project_length->name : ''}}</p>
                                                   </li>
                                                </ul>
                                                
                                                <ul class="sidebar-title2">
                                                   <li><span>Project Stage</span>
                                                         <p>{{$job->projectStage ? $job->projectStage->title  : ''}}</p>
                                                   </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                   <li><span>Experience Level</span>
                                                         <p>{{$job->rank->level ?? ''}}</p>
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
                                 
                                    @foreach($job->skill as $skil)
                                       <span class="attr">{{$skil->name}}</span>
                                    @endforeach
                                    
                                 </div>

                              </div>

                           </div>
                           <input type="hidden" name="job_type" id="" value="{{$job->budget_type_id}}">
                           @if ($job->budget_type_id==App\Models\BudgetType::$hourly)
                              @include('templates.basic.jobs.Proposal.hourly')
                           @else
                              @include('templates.basic.jobs.Proposal.fixed',['job' => $job])
                              
                           @endif
                        

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
                                          Do not attach your résumé — your Dureforce profile is automatically forwarded to the client with your job.
                                       </small>
                                 
                                    </div>
                                 </div>

                              </div>

                           </div>
                           <div id="outer" class="text-right">
                              <div class="inner">
                                  <a role="button" href="{{route('seller.jobs.listing')}}" class="pl-4 submit-btn  mt-20 w-70 cancel-job-btn ">@lang('Cancel')</a>
                              </div>
                              <div class="inner">
                                  <button type="submit" class="pl-4 submit-btn mt-20 w-70 cretae-job-btn" id="submit-all">@lang('Submit Proposal')</button>
                              </div>
                          </div>
                        </form>
                        
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
   <script src="{{asset('/assets/resources/templates/basic/frontend/js/job-proposal.js')}}"></script>

@endpush


