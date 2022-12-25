@extends($activeTemplate.'layouts.frontend')
@section('content')

    @if($proposal_submitted)
        <div class="categories_type_container" style="height: 90px; padding: 5px 60px;">
            <div >
                <h5 class="" style="margin-top: 10px!important;">You have already submitted a proposal</h5>
                <p><a href="{{ route('seller.proposal.detail',$proposal->uuid) }}"
                      class="view_propasal_per">View Proposal</a></p>
            </div>
        </div>
    @endif

    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center">
                <article class="main-section">
                    <div class="section-inner">
                        <div class="item-section item-details-section">
                            <div class="container">


                                <div class="item-details-content" style="padding-top: 0px;">

                                    <h2 class="title">{{$job->category->name}}
                                        > {{ $job->subCategory ? $job->subCategory->name:'' }}</h2>

                                    <input type="hidden" value="{{$job->category_id}}" id="category_id">
                                    <input type="hidden" {{$job->sub_category_id}} id="sub_category_id">
                                    <input type="hidden" value="{{$data['selected_skills']}}" name="job_skills"
                                           id="job_skills">

                                </div>
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-md-9 col-lg-9 col-xs-9 col-sm-12 col-xs-12 mb-30">

                                        <div class="item-details-area">
                                            <div class="item-details-box">

                                                <div class="item-details-thumb-area item-details-footer-v mt-0">

                                                    <div class="row">

                                                        <div class="col-md-7 col-lg-7 col-xs-7 col-sm-12 col-xs-12">

                                                            <div class="left ">
                                                                <h3 class="title">
                                                                    {{$job->title? $job->title : '' }}
                                                                </h3>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12 float-right">
                                                            <div class="float-right">
                                                                <p class="job_staus" style="display: inline">Job Status:
                                                                    <span class="status_btn"
                                                                          style="width: 80px;"> {{$job->status ? $job->status->name : '' }} </span>
                                                                    Posted on
                                                                    :{{$job->created_at->format('Y-m-d') ? $job->created_at->format('Y-m-d') : '' }}
                                                                </p>

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div>

                                                        <div class="sep-solid"></div>
                                                        <div class="product-desc-content">
                                                            {{$job->description }}

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
                                                                    <div class="service_subtitle2 mt-20">
                                                                        Attachments
                                                                    </div>

                                                                    @foreach($job->documents as $decumentUrl)
                                                                        <a href="{{$decumentUrl->url}}"
                                                                           class="btn btn-large pull-right atta"><i
                                                                                    class="fa fa-paperclip font-style"
                                                                                    aria-hidden="true"></i>{{$decumentUrl->uploaded_name}}
                                                                        </a>
                                                                    @endforeach

                                                                @endif
                                                            </div>


                                                        </div>

                                                        <div class="sep-solid mt-10 "></div>

                                                    </div>

                                                    <div class="service_subtitle2 mt-20" id="skills_heading">
                                                        Job Attributes
                                                    </div>


                                                    <div id="form_attributes">

                                                    </div>


                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 mb-30">
                                        <div class="sidebar">
                                            <div class="widget custom-widget mb-30 cstm-sidebar">
                                                @if($job->budget_type_id == \App\Models\BudgetType::$hourly)

                                                    <ul class="sidebar-title2 sidebar-heading-border">
                                                        <li><span>Per Hour Rate:</span>
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
                                                    <li><span>Resource Location</span>
                                                        <p>{{$job->country ? $job->country->name : '' }}</p>
                                                    </li>
                                                </ul>

                                                <ul class="sidebar-title2">
                                                    <li><span>Budget Type</span>
                                                        <p>{{$job->budgetType ? $job->budgetType->title : ''}}</p>
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
                                                        <p>{{$job->projectStage ? $job->projectStage->title  : ''}}</p>
                                                    </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                    <li><span>Experience Level</span>
                                                        <p>{{$job->rank ?  $job->rank->level : ''}}</p>
                                                    </li>
                                                </ul>

                                                <div class="widget-btn- mt-20 cstm-btn" style="display: inline">
                                                    @if ($proposal_submitted)
                                                        <a href="{{ route('seller.proposal.detail',$proposal->uuid) }}"
                                                           style="font-size: 12px;"
                                                           class="standard-btn mr-15">View Proposal</a>
                                                    @else
                                                        <a href="{{route('seller.proposal.create',$job->uuid)}}"
                                                           style="font-size: 12px;"
                                                           class="standard-btn mr-15">Submit Proposal</a>
                                                    @endif

                                                    <?php
                                                    if (in_array($job->id, $user_saved_jobs)){
                                                        ?>
                                                    <a href="{{route('seller.jobs.remove.saved.single.view.listing',$job->id)}}"
                                                       style="font-size: 15px;"
                                                       class="standard-btn-1">@lang('Remove Job')</a>
                                                    <?php } else{ ?>
                                                    <a href="{{route('seller.jobs.save.single.view.listing',$job->id)}}"
                                                       class="standard-btn-1">@lang('Save Job')</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 mb-30">
                                                <div class="custom-widget widget mb-30"
                                                     style="width: 330px; height: 455px">
                                                    <h5 class="hheading-c">About the client</h5>

                                                    <div class="col-12">
                                                        <div class="card-block">
                                                            <ul class="row">
                                                                <div class="col-md-3 col-sm-3 profile-img">
                                                                    <img class="btn-md "
                                                                         src="{{ !empty($job->user->basicProfile->profile_picture)? $job->user->basicProfile->profile_picture: getImage('assets/images/default.png') }}"
                                                                         alt=""
                                                                         style="border-radius:50%; width: 55px;height: 55px">

                                                                </div>
                                                                <div class="col-md-9 col-sm-19 text-center">
                                                                    <div class="profile_title">
                                                                        <strong class="card-title ">{{$job->user ? $job->user->first_name.' '.$job->user->last_name[0].'.'  : ''}}</strong><br>
                                                                        <small>Member
                                                                            since {{$job->user ? $job->user->created_at->format('Y-m-d') : '' }} </small>
                                                                    </div>
                                                                </div>
                                                                <div class="sep-solid"></div>
                                                                <div>
                                                                    <ul class="location">
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i> {{$job->user->country? $job->user->country->name: ''}}<span
                                                                                    class="job_count_label_padding">{{$job->user? $job->user->address: ''}} </span>
                                                                            <i class="fa fa-clock job_count_label_padding"></i>
                                                                            <span class="job_count_label_padding"> {{ date('h:i a', strtotime($job->created_at))}} local time</span>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                                <div class="sep-solid"></div>
                                                                <div class="paymentsection">
                                                                    <ul>

                                                                        <li>
                                                                            <div>
                                                                                <svg style="height:33%;"
                                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                                     viewBox="0 0 256 256">
                                                                                    <rect width="25" height="25"
                                                                                          fill="none"/>
                                                                                    <path d="M54.5,201.5c-9.2-9.2-3.1-28.5-7.8-39.8S24,140.5,24,128s17.8-22,22.7-33.7-1.4-30.6,7.8-39.8S83,51.4,94.3,46.7,115.5,24,128,24s22,17.8,33.7,22.7,30.6-1.4,39.8,7.8,3.1,28.5,7.8,39.8S232,115.5,232,128s-17.8,22-22.7,33.7,1.4,30.6-7.8,39.8-28.5,3.1-39.8,7.8S140.5,232,128,232s-22-17.8-33.7-22.7S63.7,210.7,54.5,201.5Z"
                                                                                          fill="none" stroke="#007F7F"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round"
                                                                                          stroke-width="12"/>
                                                                                    <polyline
                                                                                            points="172 104 113.3 160 84 132"
                                                                                            fill="none" stroke="#007F7F"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="12"/>
                                                                                </svg>
                                                                                <span class="text-dark">Payment method verified</span>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-star "></i>
                                                                            <i class="fa fa-star "></i>
                                                                            <i class="fa fa-star "></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i>4.98 of 32 reviews</i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="sep-solid"></div>

                                                                <ul class="sidebar-title-custom">
                                                                    <li>
                                                                        <span class="job-count-color">{{isset($client_total_jobs) ? $client_total_jobs : null}}</span>
                                                                        <span class="job_count_label_padding"> Jobs posted</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="job-count-color">{{isset($client_open_jobs) ? $client_open_jobs : null}}</span>
                                                                        <span class="job_count_label_padding"> Open jobs</span>
                                                                    </li>
                                                                </ul>

                                                                <div class="sep-solid"></div>
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlTextarea1"
                                                                           class="form-label" style="padding-top:3px">Job
                                                                        Link</label>
                                                                    <input type="text" class="form-control" id="jobLink"
                                                                           disabled placeholder="{{ Request::url()}}"
                                                                           value="{{ Request::url()}}">
                                                                </div>
                                                                <button type="button" id="CopyButton"
                                                                        class="copy-link-btn" onclick="copyJobLink()">
                                                                    Copy Link
                                                                </button>
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
    <script>
        function copyJobLink() {
            // Get the text field
            var copyText = document.getElementById("jobLink");
            var copyButton = document.getElementById("CopyButton");


            // Select the text field
            copyButton.style.backgroundColor = '#6c757d';
            copyButton.style.color = 'white';
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

        }
    </script>
@endpush
<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/job_view.css')}}">

<style>
    a.view_propasal_per {
        color: #007F7F;
        font-size: 18px;
        /*padding: 6px;*/
        /*border: 2px solid #7F007F;*/
        /*border-radius: 5px;*/
    }
</style>