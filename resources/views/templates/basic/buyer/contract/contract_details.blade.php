@extends($activeTemplate.'layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="row m-auto">
            <nav class="navbar navbar-expand-lg navbar-light bg-light bb">

                <div class="row col-md-12 col-lg-12 ">

                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 bor">
                        <a class="navbar-brand " href="#">All Contracts
                            > {{str_limit($contract->contract_title,35)}}</a>
                        <button class="status float-right">{{$contract->status->name}}</button>
                    </div>

                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 moile-view-nav-link">
                        <div class="d-flex align-items-center justify-content-between">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="nav-link" href="#">Contract Summary <span class="sr-only"></span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="nav-link" href="#">Payments</a>
                                </li>
                            </ul>

                            @if (empty($user_feedback))

                                <div class="moile-view-icons">
                                    <div class="dropdown">
                                        <a class="btn" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_12558_9588)">
                                                    <path d="M20.3506 11.9795C19.2364 11.9795 18.33 12.8859 18.33 14.0001C18.33 15.1143 19.2364 16.0207 20.3506 16.0207C21.4647 16.0207 22.3712 15.1143 22.3712 14.0001C22.3712 12.8859 21.4647 11.9795 20.3506 11.9795Z"
                                                          fill="#007F7F"/>
                                                    <path d="M7.64952 11.9795C6.53536 11.9795 5.62891 12.8859 5.62891 14.0001C5.62891 15.1143 6.53536 16.0207 7.64952 16.0207C8.76369 16.0207 9.67014 15.1143 9.67014 14.0001C9.67014 12.8859 8.76369 11.9795 7.64952 11.9795Z"
                                                          fill="#007F7F"/>
                                                    <path d="M14 11.9795C12.8858 11.9795 11.9794 12.8859 11.9794 14.0001C11.9794 15.1143 12.8858 16.0207 14 16.0207C15.1142 16.0207 16.0206 15.1143 16.0206 14.0001C16.0206 12.8859 15.1142 11.9795 14 11.9795Z"
                                                          fill="#007F7F"/>
                                                    <path d="M23.8995 4.10047C21.2552 1.45629 17.7395 0 14 0C10.2605 0 6.74477 1.45629 4.10047 4.10047C1.45629 6.74477 0 10.2605 0 14C0 17.7395 1.45629 21.2552 4.10047 23.8995C6.74477 26.5437 10.2605 28 14 28C17.7395 28 21.2552 26.5437 23.8995 23.8995C26.5437 21.2552 28 17.7395 28 14C28 10.2605 26.5437 6.74477 23.8995 4.10047ZM14 26.268C7.23537 26.268 1.73196 20.7646 1.73196 14C1.73196 7.23537 7.23537 1.73196 14 1.73196C20.7646 1.73196 26.268 7.23537 26.268 14C26.268 20.7646 20.7646 26.268 14 26.268Z"
                                                          fill="#007F7F"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_12558_9588">
                                                        <rect width="28" height="28" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu moile-view-icons-dropdown "
                                             aria-labelledby="dropdownMenuLink">

                                            @if($feedbackData == 'empty')

                                                <a class="dropdown-item" id="endContract" data-toggle="modal"
                                                   data-target="#myModal">End Contract</a>

                                            @else

                                                <a class="dropdown-item" id="endContract" data-toggle="modal"
                                                   data-target="#formModal"> Give Feedback</a>

                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>


                </div>

            </nav>


        </div>
        <div class="main_con_p">
            <div class="prosal-left-con">
                <!---Cover Letter Section Start--->
                <h3 class="heading_proposal">Job Description</h3>
                <div class="btm-c">
                    <p class="prop_description">
                        {{$contract->offer->module->description}}
                    </p>
                    <p><a href="{{route('single.view',$contract->offer->module->uuid)}}" class="view_origin">View
                            Original Job Post</a></p>
                    <p><a href="{{route('proposal.show',$contract->offer->proposal->uuid)}}" class="view_origin">View
                            Original Proposal</a></p>
                </div>
                <!---Cover Letter Section End--->


                <!---Job DetailsSection Start--->
                @if (!isHourlyContract($contract))
                    <h3 class="heading_proposal jdc">Milestone Timeline</h3>
                    <div class="btm-c">

                        @if ( $contract->offer->moduleMilestones->count() > 0 )

                            @foreach ($contract->offer->moduleMilestones as $milestone)
                                <p class="posted_date_c">
                                    <strong>
                                        {{$milestone->description}}
                                    </strong>


                                <p class="posted_date_c"><strong>${{$milestone->amount}}</strong>
                                    @if ($milestone->status)
                                        <span class="badge  {{$milestone->status->color}}">{{$milestone->status->name}}</span>
                                <p>
                                @endif
                                <p>

                                @if($milestone->is_paid)
                                    <p class="prop_description">Paid
                                        on: {{ $milestone->milestone_amount_paid_on ? getFormattedDate($milestone->milestone_amount_paid_on,'M d,Y') : '' }}
                                    <p>
                                @endif
                            @endforeach

                        @else
                            <p class="posted_date_c">Pay as Whole Project<p>
                            <p class="posted_date_c">${{$contract->contract_total_amount}}<p>
                            @if ($contract->all_amount_paid_on)
                                <p class="prop_description">Paid
                                    on: {{$contract->all_amount_paid_on ? getFormattedDate($contract->all_amount_paid_on,'M d,Y') : '' }}
                                <p>

                            @endif

                        @endif

                    </div>
                @endif


                <!---Job Details Section End--->

                <!---Your message and file Terms Start--->
                {{-- <h3 class="heading_proposal jdc">Messages and Files</h3>
                <div class="btm-c">
                    <div class="pt_con">
                        <ul class="client_listing-c">
                            <li style="border-top: none;">
                                <img src="http://127.0.0.1:8000/assets/images/default.png" alt="client">
                                <div class="about_client" style="margin-left:-20px;margin-top:15px;">
                                    <b class="client_name">Arslan Ayoub</b>
                                    <span class="client_date">April 20 2022 - 9:01 AM</span>
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-subtitle mb-2">Hi Martin. See the samples here.</h5>

                                        <div class="file_heading_proposal">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fa fa-file" style="font-size:24px"></i>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><span class="file-text">Requirements.zip</span></p>
                                                    <p class="file-size">
                                                        300 KB
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <i class='far fa-comment-dots' style='font-size:24px'></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt_con">
                        <ul class="client_listing-c">
                            <li style="border-top: none;">
                                <img src="http://127.0.0.1:8000/assets/images/default.png" alt="client">
                                <div class="about_client" style="margin-left:-20px;margin-top:15px;">
                                    <b class="client_name">Arslan Ayoub</b>
                                    <span class="client_date">April 20 2022 - 9:01 AM</span>
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-subtitle mb-2">Hi Martin. See the samples here.</h5>

                                        <div class="file_heading_proposal">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <i class="fa fa-file" style="font-size:24px"></i>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><span class="file-text">Requirements.zip</span></p>
                                                    <p class="file-size">
                                                        300 KB
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <i class='far fa-comment-dots' style='font-size:24px'></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!---Your message and file Terms End--->

                @if(count($contract->feedback) == App\Models\Contract::SELLER_BUYER_SUBMITTED_FEEDBACK)
                    @php
                        $loggedin_user_feedback = $contract->feedback->where('feedback_for_id', auth()->user()->id)->first();
                        $other_user_feedback = $contract->feedback->whereNotIn('feedback_for_id', [auth()->user()->id])->first();

                    @endphp

                            <!---Your Feedback Terms Start--->
                    <h3 class="heading_proposal jdc">Your Feedback for {{$other_user_feedback->user->full_name}}</h3>
                    <div class="btm-c">
                        <div class="pt_con">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="rating-c">
                                        @php
                                            $score=$other_user_feedback->total_score;
                                        @endphp
                                        @for ($index=0;$index<5;$index++)

                                            @if ($index < $score)
                                                <i class="fa fa-solid fa-star review-star"></i>

                                            @else
                                                <i class="fa fa-solid fa-star testmonials-review-star"></i>

                                            @endif

                                        @endfor

                                    </p>
                                    <p class="prop_description">
                                        {{$other_user_feedback->feedback}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---Your Proposed Terms End--->

                    <!---Your Proposed Terms Start--->
                    <h3 class="heading_proposal jdc">{{$other_user_feedback->user->full_name}} Feedback for You</h3>
                    <div class="btm-c">
                        <div class="pt_con">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="rating-c">
                                        @php
                                            $score=$loggedin_user_feedback->total_score;
                                        @endphp
                                        @for ($index=0;$index<5;$index++)

                                            @if ($index < $score)
                                                <i class="fa fa-solid fa-star review-star"></i>

                                            @else
                                                <i class="fa fa-solid fa-star testmonials-review-star"></i>

                                            @endif

                                        @endfor

                                    </p>
                                    <p class="prop_description">
                                        {{$loggedin_user_feedback->feedback}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---Your Proposed Terms End--->

                @endif
            </div>
            <div class="prosal-right-con">

                <div class="p_amount_con">
                    <ul class="listing_ps">
                        <li><span class="p_fcs" style="font-weight: 500;">Contract Summary</span></li>
                        <li class="right-navbar-li"><span>Contract ID</span> <span
                                    class="p_days">{{ $contract->contract_id }}</span></li>
                        <li class="right-navbar-li"><span>Contract Type</span> <span
                                    class="p_days">{{ $contract->offer->payment_type }}</span></li>
                        <li class="right-navbar-li"><span>Total Spent</span> <span
                                    class="p_days">${{$contract->approved_hours * $contract->offer->rate_per_hour }}</span>
                        </li>

                        <li class="right-navbar-li"><span>Start Date:</span> <span
                                    class="p_days">{{getFormattedDate($contract->start_date,'d-m-Y')}}</span></li>
                        <li class="right-navbar-li"><span>End Date:</span> <span
                                    class="p_days">{{ $contract->end_date ? getFormattedDate($contract->end_date,'d-m-Y') : ''}}</span>
                        </li>

                        <li class="right-navbar-li"><span>Total Worked Hours:</span> <span
                                    class="p_days">{{$contract->total_worked_hours}}</span></li>
                        <li class="right-navbar-li"><span>Approved Hours:</span> <span
                                    class="p_days">{{ $contract->approved_hours }}</span></li>

                        {{-- @if (getLastLoginRoleId()==App\Models\Role::$Freelancer && isHourlyContract($contract) )
                            <li class="right-navbar-li">
                                <button class="submit-btn" data-bs-toggle="modal" data-bs-target="#add_task_model_id">Add Task</button>
                            </li>
                        @endif --}}

                    </ul>
                </div>
                <br>
                <div class="p_amount_con">
                    <ul class="listing_ps">
                        <li><span class="p_fcs" style="font-weight: 500;">Billing</span></li>
                        <li class="right-navbar-li"><span>Paid Out</span> <span
                                    class="p_days">{{$contract->contract_paid_amount}}</span></li>
                        <li class="right-navbar-li"><span>Funded (Escrow Protection) </span> <span
                                    class="p_days">$0.00</span></li>
                        @if (isHourlyContract($contract))
                            <li class="right-navbar-li"><span>Rate Per Hour</span> <span
                                        class="p_days">{{  $contract->offer->rate_per_hour}}</span></li>
                        @else
                            <li class="right-navbar-li"><span>Project Price</span> <span
                                        class="p_days">{{ $contract->contract_total_amount}}</span></li>
                        @endif

                        <li class="right-navbar-li"><span>Mode of Delivery</span> <span
                                    class="p_days">{{$contract->offer->payment_type}}</span></li>

                        @if (getLastLoginRoleId()==App\Models\Role::$Client)
                            <li>
                                <center><a href="#"
                                           class="btn navbar-burron">Re-Hire {{$contract->offer->sendToUser->full_name}}</a>
                                </center>
                            </li>
                        @endif
                    </ul>
                </div>
                <!----About client--->
                @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                    <div class="about-client-c">
                        <p class="abt-client">{{ 'About the Client' }}</p>
                        <ul class="client_listing-c">

                            <li>
                                <img src="{{ !empty($contract->offer->sendbyUser->basicProfile->profile_picture)? $contract->offer->sendbyUser->basicProfile->profile_picture: getImage('assets/images/default.png') }}"
                                     alt="client">
                                <div class="about_client">
                                    <p class="client_name">{{$contract->offer->sendbyUser->full_name}}</p>
                                    <p class="client_date">Member
                                        since {{getFormattedDate($contract->offer->sendbyUser->created_at,'M d,Y')}}</p>
                                </div>
                            </li>

                            <li>
                                <i class="fa fa-map-marker"></i> <span
                                        class="location_c"> {{$contract->offer->sendbyUser->location}}</span>
                                &nbsp;<i class="fa fa-clock job_count_label_padding"> </i><span class="time_cs"> 08:36 pm local time</span>
                            </li>

                            <li>
                                <p class="payment_c">Payment method verified</p>
                                <p class="rating-c"><img src="/assets/images/job/rating-c.png" alt="Rating"> 4.98 of 32
                                    reviews </p>
                            </li>

                            <li>
                                <span class="no_jobs">22</span> <span class="jb_p">Jobs</span>
                            </li>

                            <li>
                                <span class="no_jobs">$100k+</span> <span class="jb_p">Total Earned </span>
                            </li>
                            <li>
                                <span class="no_jobs">563</span> <span class="jb_p">Total Hours Worked </span>
                            </li>
                            {{-- <li>
                                    <center><a href="{{route('buyer.profile',[$contract->offer->sendbyUser->uuid,'profile' => 'step-1'])}}" class="btn navbar-burron">View Profile</a></center>
                            </li> --}}

                        </ul>

                    </div>
                @else
                    <div class="about-client-c">
                        <p class="abt-client">{{ 'About the Freelancer' }}</p>
                        <ul class="client_listing-c">

                            <li>
                                <img src="{{ !empty($contract->offer->sendToUser->basicProfile->profile_picture)? $contract->offer->sendToUser->basicProfile->profile_picture: getImage('assets/images/default.png') }}"
                                     alt="client">
                                <div class="about_client">
                                    <p class="client_name">{{$contract->offer->sendToUser->full_name}}</p>
                                    <p class="client_date">Member
                                        since {{getFormattedDate($contract->offer->sendToUser->created_at,'M d,Y')}}</p>
                                </div>
                            </li>

                            <li>
                                <i class="fa fa-map-marker"></i> <span
                                        class="location_c"> {{$contract->offer->sendToUser->location}}</span>
                                &nbsp;<i class="fa fa-clock job_count_label_padding"> </i><span class="time_cs"> 08:36 pm local time</span>
                            </li>

                            <li>
                                <p class="payment_c">Payment method verified</p>
                                <p class="rating-c"><img src="/assets/images/job/rating-c.png" alt="Rating"> 4.98 of 32
                                    reviews </p>
                            </li>

                            <li>
                                <span class="no_jobs">22</span> <span class="jb_p">Jobs</span>
                            </li>

                            <li>
                                <span class="no_jobs">$100k+</span> <span class="jb_p">Total Earned </span>
                            </li>
                            <li>
                                <span class="no_jobs">563</span> <span class="jb_p">Total Hours Worked </span>
                            </li>
                            <li>
                                <center><a href="{{route('seller.profile',[$contract->offer->sendToUser->uuid])}}"
                                           class="btn navbar-burron">View Profile</a></center>
                            </li>

                        </ul>

                    </div>

                @endif

            </div>


        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-modal">
                    <h5 class="modal-title">End Contract</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you want to end Contract?</p>
                    <p>You will be promoted to provide feedback and make any final payments in following steps.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn-rounded  btn-cancel action-btn" data-dismiss="modal">Cancel</button>
                    <button class="btn-rounded text-white btn-save-draft  action-btn" onclick="formshow()"
                            data-dismiss="modal">Continue
                    </button>

                    {{-- <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button> --}}
                    {{-- <button type="button" class="btn btn-primary" onclick="formshow()" data-dismiss="modal"> Continue</button> --}}

                </div>
            </div>
        </div>
    </div>


    <div class="modal form fade" id="formModal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-modal">
                    <h5 class="modal-title">End Contract</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    @include('templates.basic.user.contract_feedback_new')
                </div>

            </div>
        </div>
    </div>

@endsection


<style>
    .border-bt {
        border-bottom: 2px solid #007F7F;
    }

    .dropdown-menu.show {
        pointer-events: auto;
        -webkit-transform: scale(1) translateY(0);
        -ms-transform: scale(1) translateY(0);
        transform: scale(1) translateY(0);
        opacity: 1;
        visibility: visible;
        margin-left: -91px !important;
    }

    .bor {

        border-right: 3px solid #C7DEDE;
        padding-left: 30px !important;

    }

    .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        width: 100%;
        padding-right: 0px !important;
        padding-left: 0px !important;
        margin-right: auto;
        margin-left: auto;
    }

    .navbar {
        min-height: 75px !important
    }

    .status {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 0px 16px;
        gap: 6px;
        position: absolute;
        height: 30px;
        top: 5px;
        background: #219A21;
        border-radius: 20px;
        position: relative;
    }


    .nav-item {
        height: 20px;
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        color: #515151;
    }

    .sr-only {
        height: 0px;
        left: 0px;
        border: 1px solid #C7DEDE;
    }

    .bb {
        border-bottom: 2px solid #DCEDED
    }

    @media only screen and (max-width: 683px) {
        .moile-view-nav-link {
            text-align: center !important;
        }

        .datepicker-button {
            border: none !important;
            font-weight: 600 !important;
            font-size: 14px !important;
            background: transparent !important;
        }
    }

    .btn-close {
        color: #808285;
        background-color: transparent;
    }

    .bg-modal {
        background-color: #EDEDED !important;
    }

    .btn-save-draft {
        background-color: transparent;
        border-radius: 5px;
        border: 1px solid #7f007f;
        background-color: #7f007f !important;
        color: white;
        width: 5rem !important;
        padding: 6px 2px;
        font-size: 13px;
        margin-right: 15px !important;

    }

    .btn-cancel {
        background-color: transparent;
        border-radius: 5px;
        border: 1px solid #7f007f;
        color: #7f007f !important;
        width: 5rem !important;
        padding: 6px 2px;
        font-size: 13px;
    }
    .testmonials-review-star{
        padding: 0px !important;
        color: rgb(215, 212, 212);
    }

    .navbar-burron {
        width: 96%;
        font-size: 12px;
        background-color: #007f7f !important;
        color: #fff !important;
        border-radius: 5px !important;
    }

    .right-navbar-li {
        border: none !important;
    }

    .file-text {
        margin: -5px 0 0 0px;
        font-size: 13px;
    }

    .file_heading_proposal {
        width: 40%;
        background: #F3F6F6;
        border-radius: 4px 4px 0px 0px;
        padding: 17px 25px 17px 20px;
        font-weight: 600;
        font-size: 18px !important;
        line-height: 25px;
        color: #000000;
    }

    .file-size {
        margin-top: -15px;
        font-size: 12px;
        font-weight: initial;
    }

    .view_origin {
        /* View Original Job Post */
        width: 166px;
        height: 18px;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        /* identical to box height */
        color: #007F7F;
    }

    p.propsal-h {
        font-weight: 400;
        font-size: 20px;
        line-height: 25px;
        color: #000000;
        margin-top: 26px;
        font-family: "Mulish", sans-serif;
    }

    .heading_proposal {
        background: #F3F6F6;
        border-radius: 4px 4px 0px 0px;
        padding: 17px 25px 17px 20px;
        font-weight: 600;
        font-size: 18px !important;
        line-height: 25px;
        color: #000000;
    }

    .prosal-left-con {
        max-width: 868px;
        width: 70%;
        display: inline-block;
        float: left;
    }

    .main_con_p {
        width: 100%;
        display: inline-block;
        margin-top: 20px !important;
    }

    .prosal-right-con {
        width: 28%;
        float: right;
    }

    .btm-c {
        background: #F8FAFA;
        border-radius: 0px 0px 0px 0px;
        padding: 18px 25px;
        margin-top: -8px;
    }

    p.heading_cover_l {
        font-weight: 600;
        font-size: 16px;
        line-height: 24px;
        color: #000000;
        font-family: "Mulish", sans-serif;
    }

    p.prop_description {
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        color: #000000;
        width: 81%;
    }

    p.heading-att {
        font-weight: 600;
        font-size: 16px;
        line-height: 24px;
        color: #000000;
        margin-top: 56px;
    }

    span.attacment_file {
        font-size: 14px;
        line-height: 24px;
        color: #000000;
        width: 100%;
        margin-bottom: 12px;
        position: relative;
        padding-left: 30px;
    }

    span.attacment_file:before {
        position: absolute;
        width: 20px;
        height: 20px;
        content: '';
        left: 0px;
        top: 5px;
        background: url(/assets/images/job/attachment.svg);
        background-repeat: no-repeat;
    }

    .jdc {
        margin-top: 25px;
    }

    p.posted_date_c {
        font-weight: 600;
        font-size: 13px;
        line-height: 16px;
        color: #000000;
        margin-top: 15px;
    }

    a.btn_viewjob {
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        text-align: center;
        color: #007F7F;
        background: #FFFFFF;
        border: 1px solid #007F7F;
        border-radius: 5px;
        padding: 11px 25px;
        margin-top: 30px;
    }

    .p_amount_con {
        background: #EEF7F7;
        border-radius: 4px;
        padding: 17px 20px;
    }

    span.p_fcs {
        font-size: 16px;
        line-height: 20px;
        color: #000000;
        float: left;
        width: 50%;
        display: inline-block;
    }

    span.p_price {
        float: right;
        text-align: right;
        display: inline-block;
        width: 40%;
        font-size: 16px;
        line-height: 20px;
        color: #000000;
    }

    ul.listing_ps li {
        padding: 9px 0px;

        width: 100%;
        display: inline-block;
    }

    ul.listing_ps li:first-child, ul.listing_ps li:nth-child(2) {
        border-bottom: 1px solid #CBDFDF;
        padding: 13px 0px;
    }

    span.badge_color {
        border-radius: 20px;
        padding: 4px 19px;
        font-size: 14px;
        float: right;
    }

    span.btn_sbmitd {
        background: #219A21;
        border-radius: 20px;
        padding: 4px 19px;
        color: #fff;
        font-size: 14px;
        float: right;
    }

    span.p_pricess {
        background: #58A7A7;
        border-radius: 20px;
        padding: 2px 18px;
        font-size: 14px;
        float: right;
        color: #fff;
    }

    span.p_days {
        float: right;
        font-size: 14px;
        line-height: 18px;
        text-align: right;
        color: #000000;
    }

    .about-client-c {
        background: #EEF7F7;
        border-radius: 4px;
        margin-top: 23px;
        padding: 18px 17px;
    }

    p.abt-client {
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        text-align: left;
        color: #000000;
    }

    .about_client {
        float: left;
        width: 69%;
    }

    .client_listing-c li {
        width: 100%;
        display: inline-block;
        border-top: 1px solid #CBDFDF;
        padding: 12px 0px;
    }

    ul.client_listing-c li:nth-child(1) img {
        width: 55px;
        /* width: 14%; */
        float: left;
        height: 55px;
        border-radius: 50%;
        margin-right: 5%;
    }

    p.client_name {
        font-size: 16px;
        line-height: 20px;
        color: #000000;
        font-weight: 700;
        margin-bottom: 0px;
    }

    p.client_date {
        font-size: 14px;
        line-height: 15px;
        color: #515151;
        margin-top: 8px;
    }

    .client_listing-c li:first-child {
        margin-bottom: 5px;
        margin-top: 0px;
        padding-top: 13px;
    }

    p.rating-c img {
        width: 60px;
        margin-right: 2%;
    }

    p.rating-c {
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        color: #007F7F;
    }

    p.payment_c {
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #000000;
        padding-left: 30px;
        position: relative;
    }

    p.payment_c:before {
        width: 30px;
        height: 30px;
        position: absolute;
        content: '';
        left: 0px;
        background: url(/assets/images/job/tick-c.png);
        background-repeat: no-repeat;
        background-size: 20px;
    }

    span.no_jobs {
        font-weight: 700;
        font-size: 14px;
        line-height: 18px;
        color: #007F7F;
        margin-right: 2%;
        float: left;
        display: inline-block;
    }

    span.jb_p {
        font-weight: 500;
        font-size: 14px;
        line-height: 18px;
        color: #000000;
    }

    .pt_con {
        display: inline-block;
        width: 100%;
    }

    span.fm-c {
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        color: #000000;
        margin-right: 10%;
        float: left;
        display: inline-block;
    }

    span.am_price {
        font-weight: 700;
        font-size: 16px;
        line-height: 20px;
        color: #007F7F;
    }

    .pt_con {
        display: inline-block;
        width: 100%;
        padding: 18px 0px;
    }

    /*************/


    .mainTabs {
        border-top: 1px solid #D0E2E2;
        padding-top: 40px;
        margin-top: 25px;
    }

    .tab {
        overflow: hidden;
        /*   border: 1px solid #dddddd40; */

    }

    /* Style the buttons inside the tab */
    .tab button {
        width: 200px;

        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        color: #fff;
        padding: 21px 22px;
        transition: 0.3s;
        font-size: 17px;
        background: #007F7F;
        /* border-radius: 8px 0px 0px 0px;    */
        font-weight: 700;
        font-size: 14px;
        line-height: 18px;

        /* identical to box height */
        text-align: left;
        padding-left: 58px;

        color: #90BCBC;

    }

    /* Change background color of buttons on hover */
    /*.tab button:hover {
    /*   background-color: #f9f9f920; */
    /* color:#fff;
     background-color: #007F7F;
     /* border-radius: 8px 0px 0px 0px; */


    /*
    }
    */
    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #007F7F;
        color: #ffffff;
        /* border-radius: 0px 8px 0px 0px; */
        font-weight: 700;
    }

    /* Style the tab content */
    .tabcontent {
        color: #273342;
        padding: 6px 12px;
        border: 1px solid #dddddd40;
        margin-top: 10px;
        background: #fff;
        border-radius: 10px;
    }

    ul.method_l {
        display: inline-block;
        width: 100%;
    }

    ul.method_l li {
        width: 28%;
        float: left;
        margin-right: 4%;
        display: inline-block;
    }

    p.lable-c {
        font-weight: 400;
        font-size: 15px;
        line-height: 20px;
        color: #000000;
        margin-bottom: 9px;
    }

    .tabcontent {
        color: #273342;
        padding: 33px 12px 35px 24px;
        border: 1px solid #dddddd40;
        margin-top: 0px;
        background: #EFF5F5;
        border-radius: 0px;
    }

    ul.method_l li input {
        background: #F5F5F5;
        border: 1px solid #CBDFDF;
        border-radius: 4px;
        height: 37px;
        font-size: 14px;
    }

    input.btn_sbmtrm {
        width: 137px;
        height: 35px;
        background: #7F007F;
        border-radius: 5px;
        color: #fff;
        padding: 4px 0px;
        font-size: 14px;
        font-weight: 600;
        margin-right: 1.5%;
    }

    input.btn_withdrw-c {
        width: 155px;
        height: 34.85px;
        left: 214px;
        top: 1518px;
        border: 2px solid #7F007F !important;
        border-radius: 5px;
        font-size: 14px;
        line-height: 18px;
        text-align: center;
        color: #7F007F;
        padding: 0px;
    }

    ul.method_l {
        display: inline-block;
        width: 100%;
        margin-bottom: 26px;
    }

    .btns_container-div {
        margin-top: 26px;
        width: 100%;
        display: inline-block;
        margin-bottom: 60px;
    }

    ul.method_2 li {
        width: 23%;
        float: left;
        margin-right: 2%;
        display: inline-block;
        margin-bottom: 31px;
    }

    button.tablinks {
        position: relative;
    }

    button.tablinks:before {
        width: 30px;
        height: 30px;
        content: '';
        position: absolute;
        left: 28px;
        top: 21px;
        background: url(/assets/images/job/not-selectedc.svg) !important;
        background-repeat: no-repeat !important;
        background-position: center center;
    }

    .tab button.active:before {
        background: url(/assets/images/job/selected-c.svg) !important;
        background-repeat: no-repeat !important;
        background-position: center center;
    }


    /************Respossive**********/
    @media only screen and (max-width: 1100px) {
        span.p_fcs {
            font-size: 13px;
        }

        span.btn_sbmitd {
            padding: 2px 13px;
            font-size: 13px;
        }

        p.payment_c {
            font-size: 13px;
        }

        p.lable-c {
            font-size: 13px;
        }
    }

    @media only screen and (max-width: 767px) {
        .prosal-left-con {
            max-width: 100%;
            width: 100%;
            display: inline-block;
            float: none;
        }

        p.prop_description {
            width: 100%;
        }

        ul.method_2 li {
            width: 100%;
            float: left;
            margin-right: 0%;
            display: inline-block;
            margin-bottom: 17px;
        }

        .tabcontent {
            color: #273342;
            padding: 33px 12px 35px 11px;
        }

        ul.method_l li {
            width: 100%;
            float: left;
            margin-right: 4%;
            display: inline-block;
            margin-bottom: 20px;
        }

        input.btn_sbmtrm {
            width: 130px;
        }

        .prosal-right-con {
            width: 100%;
            float: right;
            margin-top: 32px;
        }

        .tabcontent {
            padding-bottom: 0px !important;
        }

        .heading_proposal {
            background: #F3F6F6;
            border-radius: 4px 4px 0px 0px;
            padding: 13px 25px 12px 20px;
            font-weight: 600;
            font-size: 15px !important;
            line-height: 25px;
            color: #000000;
        }

        p.propsal-h {
            font-size: 16px;
        }
    }

    @media only screen and (max-width: 683px) {
        .moile-view-icons {
            width: 11px !important;
            margin-top: -26px !important;
            margin-left: 325px !important;
        }

        .moile-view-icons-dropdown {
            position: absolute;
            transform: translate3d(-5px, 28px, 0px);
            top: 0px;
            left: -60 !important;
            will-change: transform;
        }
    }

    @media only screen and (max-width: 375px) {
        .tab button {
            width: 100%;
        }
    }

    @media only screen and (max-width: 320px) {
        input.btn_withdrw-c {
            width: 100%;
        }

        input.btn_sbmtrm {
            width: 100%;
            margin-bottom: 11px;
        }
    }
</style>

@push('script')

    <script>
        'use strict';

        function formshow() {
            $('#formModal').modal('toggle');
        }

        function hidemodal() {
            $('#formModal').modal('hide');
        }

    </script>

@endpush
