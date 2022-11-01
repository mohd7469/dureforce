@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="item-details-content">
            <h3 class="title">{{ isset($job->category->name) ? $job->category->name : ''}} > {{ isset($job->subCategory) ? $job->subCategory->name:'' }}</h3>
            
            <input type="hidden" value="{{$job->category_id}}" id="category_id">
            <input type="hidden" {{$job->sub_category_id}} id="sub_category_id">
            <input type="hidden" value="{{$data['selected_skills']}}" name="job_skills" id="job_skills" >
            
        </div>
    </div>
</div>
<br>
<div class="row mb-none-30">
    <div class="col-md-8 col-lg-8 col-xs-8 col-sm-12 col-xs-12 mb-30">
        <div class="item-details-area">
            <div class="item-details-box">

                    <div class="item-details-thumb-area item-details-footer-v mt-0">
                    
                        <div class="row" >  

                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-12 col-xs-12">   

                                <div class="left ">
                                    <h3 class="title">
                                        {{$job->title? $job->title : '' }}
                                    </h3>
                                </div>
                                
                            </div>

                            <div class="col-md-7 col-lg-7 col-xl-7 col-sm-12 col-xs-12 float-right" >
                                <div class="float-right">
                                    <p class="job_staus" style="display: inline"> Posted on :{{$job->created_at->format('Y-m-d') ? $job->created_at->format('Y-m-d') : '' }}</p>
                                    
                                </div>
                                
                            </div>
                        </div>

                    <div >
                        
                        <div class="sep-solid"></div>
                        <div class="product-desc-content" >
                            {!!$job->description !!}
                        
                        <div class="service_subtitle2 mt-20 dod-text">
                            <p> Deliverables</p>
                                @foreach ($job->deliverable as $deliverable)
                                
                                <span> {{$deliverable->name}},</span>
                                
                                @endforeach
                        </div>
                    

                        <div class="service_subtitle2 mt-20 dod-text">
                            <p> Definition of Done (DOD)</p>
                                @foreach ($job->dod as $dod)
                                <span>{{$dod->title ? $dod->title  : ''}},</span>
                                @endforeach
                        </div>

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
                    
                    <div class="service_subtitle2 mt-20"  id="skills_heading">
                        Job Attributes
                    </div>

                    
                    <div id="form_attributes">

                    </div> 
                </div>
                </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 mb-30 cstm-sidebar">
        <div class=" custom-widget mb-30 ">
            @if($job->budget_type_id == \App\Models\BudgetType::$hourly)
                <ul class="sidebar-title2">
                    <li><span>Per Hour Rate:</span>
                        <span class="float-right">{{ '$'.$job->hourly_start_range." - $".$job->hourly_end_range }}</span>
                    </li>
                </ul>
            @else
                <ul class="sidebar-title2">
                    <li><span>Fixed Amount:</span>
                        <span class="float-right">{{ '$'.$job->fixed_amount}}</span>
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
            <ul class="sidebar-title2">
                <li><span>Est. Project Duration</span>
                    <p>{{$job->project_length->name}}</p>
                </li>
            </ul>
            <ul class="sidebar-title2">
                <li><span>Project Start Date:</span>
                    <p>{{$job->expected_start_date ? $job->expected_start_date  : ''}}</p>
                </li>
            </ul>
            <ul class="sidebar-title2">
                <li><span>Project Stage</span>
                    <p>{{$job->projectStage->title ? $job->projectStage->title  : ''}}</p>
                </li>
            </ul>
            <ul class="sidebar-title2">
                <li><span>Experience Level</span>
                    <p>{{$job->rank->level ?  $job->rank->level : ''}}</p>
                </li>
            </ul>

            <div class="widget-btn- mt-20 cstm-btn text-cent">
                @if($job->status->id == 1)
                    <button class="icon-btn btn--success ml-1 approved" data-toggle="tooltip" data-id="{{$job->id}}" data-original-title="@lang('Approve')">
                        <!-- <i class="las la-check"></i> -->
                        @lang('Approve')
                    </button>

                    <button class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" title="" data-original-title="@lang('Cancel')" data-id="{{$job->id}}">
                        <!-- <i class="las la-times"></i> -->
                        @lang('Cancel')
                    </button>
                    @endif

                    @if($job->status->id == 2)
                        <button class="icon-btn btn--warning ml-1 closed" data-toggle="tooltip" title="" data-original-title="@lang('Close')" data-id="{{$job->id}}">
                        <!-- <i class="las la-check"></i> -->
                        @lang('Close')
                        </button>
                    @endif
                    @if($job->status->id == 2)
                        <button class="icon-btn btn--danger ml-1" data-toggle="tooltip" title="" data-original-title="@lang('Close')" data-id="{{$job->id}}">
                            <!-- <i class="las la-times"></i> -->
                            @lang('Close')
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('breadcrumb-plugins')
    <a href="{{ route('admin.job.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i>@lang('Go Back')</a>
@endpush
@push('script')
<script src="{{asset('/assets/resources/templates/basic/frontend/js/job.view.js')}}"></script>

@endpush
<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/admin_job_view.css')}}">