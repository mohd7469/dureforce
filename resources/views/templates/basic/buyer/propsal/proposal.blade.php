@extends($activeTemplate.'layouts.frontend')
@section('content')


<section class="all-sections pt-3">
   <div class="container-fluid p-max-sm-0">
      <div class="sections-wrapper d-flex flex-wrap justify-content-center cv-container">
         <article class="main-section">
            <div class="section-inner">
               <div class="item-section item-details-section">
                  <div class="container single-jobc">
                        <div class="allpropsel_container">
                        
                        <div class="container card-bg-color">
                            <div class="row profile-border">
                                
                                {{-- links  --}}
                                <div class="row pt-3 ">
                                    <div class="d-flex justify-content-start col-sm-2 col-xs-2 col-md-6 col-lg-6">
                                        <i class="fa fa-chevron-left"></i>
                                    </div>
                                    <div class="d-flex justify-content-end col-sm-10 col-xs-10 col-md-6 col-lg-6 vertical-center-div">
                                         <span class="margin-right"> Open Proposal in a new window</span><i class="fas fa-external-link-alt" ></i>
                                        
                                    </div>
                                    
                                </div>

                                {{-- seller Profile --}}
                                <div class="row pt-2 pb-2 profile-border-bottom">
                                    {{-- Profile img --}}
                                    <div class="col-sm-4 col-xs-4 col-md-3 col-lg-1 pl-5"> 
                                        <img alt="User Pic" src="{{ !empty($user->user_basic->profile_picture)? $user->user_basic->profile_picture: getImage('assets/images/default.png') }}" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 85px;height: 85px"> 
                                    </div>
                                    {{-- profile info --}}
                                    <div class="col-sm-8 col-xs-8 col-md-3 col-lg-2 pt-2 profile-border-right">
                                        <strong>{{$user->full_name}}</strong><br>
                                        <span>{{$user->job_title}}</span><br>
                                        <i class="fa fa-map-marker-alt"></i></i><span class="margin-left">{{$user->location}}</span>
                                    </div>
                                    {{-- rate --}}
                                    <div class="col-sm-12 col-xs-12 col-md-6  col-lg-5 profile-border-right">
                                        <table class="table">
                                            <thead>
                                                <td>Rate Per Hour</td>
                                                <td>Total Earnings</td>
                                                <td>Job Success Rate</td>
                                            </thead>
                                            <tbody>
                                                <td>${{$user->rate_per_hour}} / Per Hour</td>
                                                <td>Coming Soon</td>
                                                <td>Coming Soon</td>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- bid rate --}}
                                    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 d-flex justify-content-end vertical-center-div-without-color ">
                                        <span class="padding-right">Proposed Bid</span>
                                        <strong >{{ getProposelBid($proposal,$job)}}</strong>
                                          
                                        <button class="btn-sm ">Hire</button>
                                    </div>


                                </div>
                                
                                <div class="row pt-3">
                                    
                                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                        
                                        <div class="profile-border-bottom ">
                                            <b>Applicant</b><br>

                                            Applicant
                                            {{$user->full_name}} has applied to or been 
                                            invited to your or your company's job
                                            Looking for an  experienced logo
                                            designer.<br>

                                            <button class="btn-sm view-pfoile-btn mt-3 mb-3 ">
                                               <a href="{{route('seller.profile',$user->uuid)}}">View Profile</a>
                                            </button>

                                        </div>
                                        
                                        <div class="profile-border-bottom ">
                                            <table class="table">
                                                <thead class="text-center">
                                                    <td>$8k+</td>
                                                    <td>23</td>
                                                    <td>188</td>
                                                </thead>
                                                <tbody>
                                                    <td>Total Earning</td>
                                                    <td>Total Jobs</td>
                                                    <td>Total Hours</td>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="profile-border-bottom ">
                                            You or your team 
                                            ended <b>{{$user->full_name}}</b> contract 
                                            <span class="job-title-color">Responsive Web Design Project</span> 
                                            on October 20, 2017
                                        </div>

                                        <div class="profile-border-bottom ">
                                            <b>Hours per week</b><br>
                                            <b>More than 30 hrs/week</b><br>
                                            <b>Languages</b><br>
                                            @foreach ($user->languages as $item)
                                            {{getLanaguageName($item->language_id)}}: {{getProficiencyLevelName($item->language_level_id)}}<br>
                                            @endforeach
                                            
                                            <b>Verifications</b><br>
                                            ID: Verified <br>
                                            <b>Education</b><br>
                                            @foreach ($user->education as $item)
                                                {!!getUserEducation($item)!!}
                                            @endforeach
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 profile-border-left ">
                                       
                                        <h3>Proposal Details</h3>
                                       <b>Cover letter</b>
                                        
                                       <p>
                                        {{$proposal->cover_letter}}
                                       </p>

                                       @if (count($propsal_attachments))
                                        <div class="pt-3 profile-border-bottom">
                                               <b class="">Attachments </b>
                                                <p>
                                                    @foreach ($propsal_attachments as $item)
                                                        <a href="{{$item->url}}" class="btn btn-large pull-right " download><i class="fa fa-paperclip font-style" aria-hidden="true"></i>{{$item->uploaded_name}} </a><br>  
                                                    @endforeach

                                                </p>
                                            </div>
                                       @endif
                                        
                                        
                                        <div  class="pt-3 profile-border-bottom">
                                            @include('templates.basic.buyer.propsal.completed-jobs')
                                        </div>

                                        <div  class="pt-3 pb-3 profile-border-bottom">
                                            @include('templates.basic.buyer.propsal.portfolio',['portfolios'=>$proposal->user->portfolios])
                                        </div>

                                        <div  class="pt-3 pb-3 profile-border-bottom">
                                            <h4 class="pb-2">Skills</h4>
                                            @foreach ($user_skills as $skill)
                                                <button class="btn-sm btn-skill">{{$skill->name}}</button>
                                            @endforeach
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </article>
        
   </div>
</section>

</div>
@include($activeTemplate . 'partials.end_ad')

@endsection
@push('style')
<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/view-propsal.css')}}">
@endpush

