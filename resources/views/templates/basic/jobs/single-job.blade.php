@extends($activeTemplate.'layouts.frontend')
@section('content')
    @guest
    <div class="categories_type_container">
        @include('templates.basic.partials.category._header', [
            'type_id' => \App\Models\Category::JobType,
        ])</div>
    @endguest    

        <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center">
                <article class="main-section">
                    <div class="section-inner">
                        <div class="item-section item-details-section">
                            <div class="container">
                                @include('templates.basic.jobs.breadcrum',['job'=>$job])
                                <div class="item-details-content" style="padding-top: 0px;">
                                    <h2 class="title">{{$job->category->name}} > {{ $job->subCategory ? $job->subCategory->name:'' }}</h2>
                                    
                                    <input type="hidden" value="{{$job->category_id}}" id="category_id">
                                    <input type="hidden" {{$job->sub_category_id}} id="sub_category_id">
                                    <input type="hidden" value="{{$data['selected_skills']}}" name="job_skills" id="job_skills" >

                                </div>
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-md-9 col-lg-9 col-xs-9 col-sm-12 col-xs-12 mb-30">
                                        
                                        <div class="item-details-area">
                                            <div class="item-details-box">

                                                <div class="item-details-thumb-area item-details-footer-v mt-0">
                                                 
                                                    <div class="row" >  

                                                        <div class="col-md-7 col-lg-7 col-xs-7 col-sm-12 col-xs-12">   

                                                            <div class="left ">
                                                                <h3 class="title">
                                                                    {{$job->title? $job->title : '' }}
                                                                </h3>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12 float-right" >
                                                            <div class="float-right">
                                                                <p class="job_staus" style="display: inline">
                                                                <!-- Job Status: <span class="status_btn"> {{$job->status->name ? $job->status->name : '' }} </span>  -->
                                                                Posted on :{{$job->created_at->format('Y-m-d') ? $job->created_at->format('Y-m-d') : '' }}</p>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div >
                                                        
                                                        <div class="sep-solid"></div>
                                                        <div class="product-desc-content" >
                                                            {!!$job->description !!}
                                                        @if ($job->deliverable->count() > 0)
                                                            <div class="service_subtitle2 mt-20 dod-text">
                                                                <p> Deliverables</p>
                                                                    @foreach ($job->deliverable as $deliverable)
                                                                    
                                                                    <span> {{$deliverable->name}},</span>
                                                                    
                                                                    @endforeach
                                                            </div>
                                                        @endif
                                                        
                                                    

                                                        @if ($job->dod->count()>0)
                                                            <div class="service_subtitle2 mt-20 dod-text">
                                                                <p> Definition of Done (DOD)</p>
                                                                    @foreach ($job->dod as $dod)
                                                                    <span>{{$dod->title ? $dod->title  : ''}},</span>
                                                                    @endforeach
                                                            </div>
                                                        @endif
                                                        

                                                        <div>
                                                        @if($job->documents->count()>0)
                                                            <div class="service_subtitle2 mt-20" >
                                                                        Attachments
                                                            </div>

                                                            @foreach($job->documents as $decumentUrl)
                                                                <a href="{{$decumentUrl->url}}" class="btn btn-large pull-right atta"><i class="fa fa-paperclip font-style" aria-hidden="true"></i>{{$decumentUrl->uploaded_name}} </a>
                                                            @endforeach

                                                            @endif
                                                        </div>


                                                        </div>
                                                        
                                                        <div class="sep-solid mt-10 " ></div>
                                                        
                                                    </div>
                                                    
                                                    @if ($job->skill->count()>0)    
                                                        <div class="service_subtitle2 mt-20"  id="skills_heading">
                                                            Job Attributes
                                                        </div>

                                                    
                                                        <div id="form_attributes">
                                                        
                                                        </div>
                                                    @endif
                                                   
                                                    

                                                    
                                                </div>

                                              </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 mb-30">
                                        <div class="sidebar">
                                            <div class="widget custom-widget mb-30 cstm-sidebar">
                                                @if($job->budget_type_id == \App\Models\BudgetType::$hourly)
                                                    <ul class="sidebar-title2">
                                                        <li><span>Per Hour Rate:</span>
                                                            <span>{{ '$'.$job->hourly_start_range." - $".$job->hourly_end_range }}</span>
                                                        </li>
                                                    </ul>
                                                @else
                                                    <ul class="sidebar-title2">
                                                        <li><span>Fixed Amount:</span>
                                                            <span>{{ '$'.$job->fixed_amount}}</span>
                                                        </li>
                                                    </ul>
                                                @endif




                                                <ul class="sidebar-title2">
                                                    <li><span>Resource Location</span>
                                                        <p>{{$job->country ? $job->country->name : '' }}</p>
                                                    </li>
                                                </ul>

                                                <ul class="sidebar-title2">
                                                    <li><span>Budget Type</span>
                                                        <p>{{$job->budgetType->title ? $job->budgetType->title : ''}}</p>
                                                    </li>
                                                </ul>
                                                @if ($job->project_length)
                                                <ul class="sidebar-title2">
                                                    <li><span>Est. Project Duration</span>
                                                        <p>{{$job->project_length ? $job->project_length->name : ''}}</p>
                                                    </li>
                                                </ul>
                                                @endif
                                                
                                                <ul class="sidebar-title2">
                                                    <li><span>Project Start Date:</span>
                                                        <p>{{$job->expected_start_date ? $job->expected_start_date  : ''}}</p>
                                                    </li>
                                                </ul>
                                                @if ($job->projectStage)
                                                    <ul class="sidebar-title2">
                                                        <li><span>Project Stage</span>
                                                            <p>{{$job->projectStage ? $job->projectStage->title  : ''}}</p>
                                                        </li>
                                                    </ul>
                                                @endif

                                                @if ($job->rank)
                                                    <ul class="sidebar-title2">
                                                        <li><span>Experience Level</span>
                                                            <p>{{$job->rank ?  $job->rank->level : ''}}</p>
                                                        </li>
                                                    </ul>
                                                @endif
                                               

                                                <div class="widget-btn- mt-20 cstm-btn">
                                                    <a href="{{route('buyer.job.all.proposals',$job->uuid)}}"    class="standard-btn ">View Proposals ({{$job->proposal->count()}})</a>
                                                    @if($job->status->id == \App\Models\Job::$Pending)
                                                    <a href="{{route('buyer.job.edit',$job->uuid)}}"  class="standard-btn-1">@lang('Edit Job')</a>
                                                    @endif


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

        </div>
    </section>

    @include($activeTemplate . 'partials.end_ad')
@endsection

@push('script')
<script src="{{asset('/assets/resources/templates/basic/frontend/js/job.view.js')}}"></script>

@endpush
<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/job_view.css')}}">
<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/breadcrum.css')}}">
