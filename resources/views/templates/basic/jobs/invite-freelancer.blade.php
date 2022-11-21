@extends($activeTemplate.'layouts.frontend')
@section('content')
    @include('templates.basic.jobs.modal.invite_job')

    <section class="all-sections pt-3">
    <div class="container-fluid p-max-sm-0">
            @include('templates.basic.jobs.breadcrum',['job_uuid' => $job->uuid])
        <div class="sections-wrapper d-flex flex-wrap justify-content-center invite-container">
                <div class="container network_wrapper col-sm ">
                    <!-- Tabs navs -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#Search_tab">Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Invited_Freelancers_tab">Invited Freelancers ({{count($invited_freelancers)}})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#My_Hires_tab">My Hires (2)</a>
                                </li>
                            </ul>
                        </div>
                        <form class="card-body tab-content">
                            <div class="tab-pane active" id="Search_tab">
                                <div class="row card-text">
                                    <div class="col-12"></div>
                                        <div class="col-md-3">
                                        <h2 class="prosals-h">Invite Freelancers</h2>
                                        </div>
                                        <div class="col-md-9 sorting-mbl">
                                            <div class="row">
                                                <!--Sorting Section Start-->
                                                <div class="col-md-4">
                                                    <div id="custom-search-input">
                                                        <div class="input-group">
                                                            <input type="text" class="search-query form-control" placeholder="Search" />
                                                            <span class="input-group-btn">
                                                                <button type="button" disabled>
                                                                    <span class="fa fa-search"></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <select name="Best match" id="bestmatch">
                                                            <option>Best match</option>
                                                            <option>1</option>
                                                            <option>1</option>
                                                            <option>1</option>
                                                            <option>1</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="Filters" id="Filters">
                                                        <option>Filters</option>
                                                        <option>1</option>
                                                        <option>1</option>
                                                        <option>1</option>
                                                        <option>1</option>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                    @foreach ($freelancers as $freelancer )
                                    @if($freelancer->user_basic !=null && $freelancer->experiences !=null && $freelancer->skills !=null && $freelancer->education !=null)
                                    <div class="">
                                        <div class="row biorow">
                                            <div class="col-md-3">
                                                <div class="row borderleftc"> 
                                                    <div class="col-md-4">
                                                    <img alt="User Pic" src="{{ !empty($freelancer->user_basic->profile_picture)? $freelancer->user_basic->profile_picture: getImage('assets/images/default.png') }}" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 85px;height: 85px"> 
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h4 class="pname-c"> 
                                                        {{$freelancer->first_name}} {{ $freelancer->last_name }}
                                                            </h4>
                                                            <p class="pdesination-c">{{isset($freelancer->user_basic) ?$freelancer->user_basic->designation:null}}</p>  <p class="plocation"> {{$freelancer->country->name}}</p>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row btns-per">
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Rate Per Hour</p>
                                                        <p class="rateperh">${{$freelancer->rate_per_hour}}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Total Earnings</p>
                                                        <p class="perhourprice">$120k + earned</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Job Success Rate</p>
                                                        <p class="perhourprice">90%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row btns-s">
                                                    {{-- <div class="col-md-4"><a href="#" class="btn-products-s">Shortlist</a></div> --}}
                                                    <a href="{{route('seller.profile',$freelancer->uuid)}}" class="btn-products-s">View Profile</a>
                                                    <a href="#" class="btn-products-s">Hire</a>
                                                    <a class="btn-products-s phire inviteJobModal"
                                                               data-bs-toggle="modal"
                                                               onclick="inviteJobModal({{$freelancer}},{{$job}},{{$freelancer->user_basic}},{{$freelancer->country}})">Invite to
                                                                job</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--===  Bio Profile Section End ===-->
                                        <!--Skills Section Start-->
                                        <div class="row skills-c">
                                            <div class="col-md-7"> 
                                                <h2>Has {{count($freelancer->skills)}} relevant skills to your job</h2>
                                                <ul class="skills-listing">
                                                    @foreach ($freelancer->skills as $skill )
                                                    <li>{{$skill->name}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <!--Skills Section End-->
                                    </div> 
                                    <hr>
                                    @endif
                                    @endforeach
                                </div>
                            <div class="tab-pane" id="Invited_Freelancers_tab">
                                <div class="row card-text">
                                    <div class="col-12"></div>
                                        <div class="col-md-3">
                                            <h2 class="prosals-h">Invited Freelancers</h2> 
                                        </div>
                                        <div class="col-md-9 sorting-mbl">
                                            <div class="row">
                                                <!--Sorting Section Start-->
                                                <div class="col-md-4">
                                                    <div id="custom-search-input">
                                                        <div class="input-group">
                                                            <input type="text" class="search-query form-control" placeholder="Search" />
                                                            <span class="input-group-btn">
                                                                <button type="button" disabled>
                                                                    <span class="fa fa-search"></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <select name="Best match" id="bestmatch">
                                                            <option>Best match</option>
                                                            <option>1</option>
                                                            <option>1</option>
                                                            <option>1</option>
                                                            <option>1</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="Filters" id="Filters">
                                                        <option>Filters</option>
                                                        <option>1</option>
                                                        <option>1</option>
                                                        <option>1</option>
                                                        <option>1</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($invited_freelancers as $invited_freelancers)
                                    @isset($invited_freelancers->user)
                                    <div class="">
                                        <div class="row biorow">
                                           <div class="col-md-3">
                                              <div class="row borderleftc"> 
                                                <div class="col-md-4">
                                                    <img alt="User Pic" src="{{ !empty($invited_freelancers->user->user_basic->profile_picture)? $invited_freelancers->user->user_basic->profile_picture: getImage('assets/images/default.png') }}" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 85px;height: 85px"> 
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="pname-c">

                                                       {{$invited_freelancers->user->first_name}} {{ $invited_freelancers->user->last_name }}
                                                     </h4>
                                                      
                                                      <p class="pdesination-c">{{isset($invited_freelancers->user->user_basic) ?$invited_freelancers->user->user_basic->designation:null}}</p>
                                                       
                                                        <p class="plocation"> {{$invited_freelancers->user->country->name}}</p>
                                                </div>
                                               </div>
                                           </div>
                                            <div class="col-md-5">
                                                <div class="row btns-per">
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Rate Per Hour</p>
                                                        <p class="perhourprice">${{$invited_freelancers->user->rate_per_hour}}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Total Earnings</p>
                                                        <p class="perhourprice">$120k + earned</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Job Success Rate</p>
                                                        <p class="perhourprice">90%</p>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row btns-s">
                                                    {{-- <div class="col-md-4"><a href="#" class="btn-products-s">Shortlist</a></div> --}}
                                                    <a href="#" class="btn-products-s phire">Hire</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p_desription">
                                            <div class="col-md-12">
                                                @isset($invited_freelancers->message)
                                                    <p> <strong>Message -  </strong> {{$invited_freelancers->message}}</p>
                                                @endisset
                                            </div>
                                        </div>

                                        <div class="row skills-c">
                                            <div class="col-md-7">
                                                
                                                <h2>Has {{count($invited_freelancers->user->skills)}} relevant skills to your job</h2>
                                                <ul class="skills-listing">

                                                @foreach ($invited_freelancers->user->skills as $skill )
                                                    <li>{{$skill->name}}</li>
                                                    @endforeach
                                                    
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <!--Skills Section End-->
                                    </div> 
                                    <hr>
                                    @endisset
                                @endforeach
                                </div>
                                
                            <div class="tab-pane" id="My_Hires_tab">
                                <p class="card-text text-center">
                                <div class="d-flex align-items-center justify-content-center ">
                                    <h3 class="display-1 fw-bold">My Hires Data Not Found</h3>
                                </div>
                                </p>
                            </div>
                        </form>
                    </div>
                    <!-- Tabs content -->
                </div>
                </div>
    </div>
    </section>
    </div>
    @include($activeTemplate . 'partials.end_ad')
@endsection
@push('style')
    <link href="{{ asset('assets/templates/basic/frontend/css/custom/all-proposal.css') }}" rel="stylesheet">
@endpush
<style>
    .img-card{
        margin-left: 22px;
        margin-top: 12px;
    }
    .nav-link.active {
        background: -o-linear-gradient(left, #1c6a6a 0%, #1c6a6a 100%) !important;
        background: linear-gradient(to right, #1c6a6a 0%, #1c6a6a 100%) !important;
    }
    .nav-tabs {
        margin: 0px !important;
        border-bottom: 1px solid #e1e7ec;
    }
    .card-header {
        padding: 0.8rem 1rem !important;
        margin-bottom: 0 !important;
        background-color: rgba(0,0,0,0) !important;
        border-bottom: 0px solid rgba(0,0,0,.125) !important;
    }
    .invite-container {
        border: 1px solid #CBDFDF;
        padding: 0px 0px 0px 0px;
    }
    .container {
        width: 100%;
        padding: 0px !important;
        margin-right: auto;
        margin-left: auto;
    }
    .card {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }
    .attachment {
        display: inline-block;
        width: 100%;

        margin: top;
        margin-top: -50px;
    }

    .heading-text {
        text-align: left;
    }

    a.btn-products-s {
        border: 1px solid #7F007F;
        border-radius: 4px;
        padding: 8px 18px;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #7F007F;
        width: auto !important;
        margin: 0px 1%;

    }

    .row.btns-s {
        width: 330px;
        left: 68px !important;
    }

    @media only screen and (min-width: 768px) {
        .sorting-mbl .col-md-4:first-child {

            width: 30%;

        }

        div#custom-search-input {

            position: relative;
            top: -16px;
        }

        .col-md-9.sorting-mbl {
            text-align: right;
            display: inline-block;
            /* width: 100%; */
        }

        .sorting-mbl .col-md-4 {
            width: 17%;
            /* float: right; */
            text-align: right;
            display: inline-block;
            clear: right;
        }
    }

    @media only screen and (max-width: 767px) {
        .attachment {
            margin-top: -20px;
        }

        ul.skills-listing {
            width: 100%;
        }

        .sorting-mbl .col-md-4 {
            float: left !important;
        }

        .p_desription p {
            width: 100%;
            text-align: center;
        }

        a.btn-products-s {
            width: auto !important;
            text-align: CENTER;
            margin: 8px auto;
            display: block;
            padding: 7px 20%;
            display: inline-block;

        }

        .row.btns-s {
            width: 100%;
        }

        ul.skills-listing li {
            margin-right: 1% !important;
            margin-bottom: 14px !important;
            font-size: 12px !important;
            padding: 2px 2% !important;
        }

        select#Filters {
            float: none;
            background: #EFF8F8;
            border: 1px solid #CBDFDF;
            border-radius: 5px;
            padding: 8px 17px 8px 34px;
            width: 100%;
            margin-right: -13px;
        }

        p.rateperh {
            text-align: center;
        }

        p.perhourprice {
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            color: #000000;
            text-align: CENTER;
            margin-bottom: 20px;
        }

        .row.borderleftc {
            text-align: center;
            margin-top: 30px;
        }

        .borderleftc:after {
            display: none;
        }

        .plocation {
            font-weight: 600;
            font-size: 14px;
            position: relative;
            padding-left: 0px;
            margin-top: 2px;
            margin-bottom: 40px !important;
            margin-top: 16px;
            display: inline-block;
        }

        .row.btns-s {
            position: relative;
            left: 0px;
            text-align: center;
        }

        .row.btns-s .col-md-4 {
            display: inline-block;
            flex: auto;
            width: 3.33%;
        }

        .row.btns-per .col-md-4 {
            display: inline-block;
            float: left;
            width: 33%;
        }

        ul.skills-listing {
            margin-top: 15px;
            text-align: center;
            display: inline-block;
        }

        ul.skills-listing li {
            float: none;
            display: inline-block;
        }

        .skills-c h2 {
            text-align: center;
        }

        .col-md-9.sorting-mbl .col-md-2 {
            width: 40%;
            float: left;
            display: inline-block;
        }

        .col-md-9.sorting-mbl .col-md-10 {
            width: 60%;
            float: left;
            display: inline-block;
        }

        select#bestmatch {

            float: right !important;
            width: 84% !important;
            margin-bottom: 15px;
            right: 0px;

        }

        p.sort-p {
            width: auto !important;
        }

        .col-md-9.sorting-mbl {
            margin-top: 20px;
        }

        select#bestmatch, select#Filters {
            font-size: 12px !important;
        }
    }

    @media only screen and (max-width: 767px) and (min-width: 481px) {
        .row.btns-s {
            left: 7px !important;
        }

        a.btn-products-s {
            padding: 7px 30px !important;
        }

    }

    @media only screen and (max-width: 480px) {
        .row.btns-s {
            left: 7px !important;
        }

        a.btn-products-s {
            padding: 7px 12px !important;
        }
    }

    @media only screen and (max-width: 414px) {
        select#bestmatch {
            right: -15px !important;
        }

        select#bestmatch {
            padding: 8px 5px 8px 5px !important;
            color: #007F7F;
            font-size: 13px !important;
            width: 77% !important;

        }

        select#Filters {
            padding: 8px 17px 8px 13px !important;
            font-size: 13px !important;
        }

        ul.skills-listing li {
            margin-right: 1% !important;
            margin-bottom: 14px !important;
            font-size: 12px !important;
            padding: 1px 3% !important;
        }

    }

    @media only screen and (min-width: 767px) and (max-width: 992px) {
        a.btn-products-s {
            border: 1px solid #7F007F;
            border-radius: 4px;
            padding: 6px 5px !important;
            font-weight: 600;
            font-size: 10px !important;
        }

        p.rateperh {
            font-size: 12px !important;
            line-height: 18px;
            color: #007F7F;
            font-weight: 600;
            margin-top: 6px;
        }

        h4.pname-c {
            font-weight: 600;
            font-size: 12px !important;
            line-height: 23px;
            color: #7F007F;
            margin-top: 0px !important;
        }

        p.pdesination-c {
            font-weight: 600;
            font-size: 12px !important;
            line-height: 18px;
            color: #000000;
        }

        p.perhourprice {
            font-weight: 600;
            font-size: 12px !important;
            line-height: 12px !important;
            color: #000000;
        }

        select#Filters {
            float: right;
            background: #EFF8F8;
            border: 1px solid #CBDFDF;
            border-radius: 5px;
            padding: 8px 17px 8px 11px;
            color: #007F7F;
            font-size: 16px;
            width: 123px !important;
        }

        select#bestmatch {
            float: right;
            background: #EFF8F8;
            border: 1px solid #CBDFDF;
            border-radius: 5px;
            padding: 10px 15px 8px 10px;
            color: #007F7F;
            font-size: 14px;
            position: relative;
            width: 120px;
            top: 0px;
        }
    }

    .plocation {
        font-weight: 600;
        font-size: 12px !important;
        line-height: 18px;
        color: #000000;
        position: relative;
        padding-left: 20px !important;
        margin-top: 12px !important;
    }

    p.plocation:before {
        width: 20px;
        height: 20px;
        background: red;
        position: absolute;
        left: 0px !important;
        top: 8px !important;
        content: '';
        background: url(/assets/images/job/location-icon.png) no-repeat;
        margin-left: 0px !important;

    }

    @media only screen and (max-width: 320px) {

        a.btn-products-s {
            padding: 7px 7px !important;
        }

        .container.single-jobc {
            padding-left: 0px;
            padding-right: 0px;
        }
    }
</style>
<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/breadcrum.css')}}">



<div class="container">
    <div
            class="modal fade"
            id="inviteJobModal"
            tabindex="-1"
            aria-labelledby="emailVerifyLabel"
            aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="container">


                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <p class="c-bannerh">Invite to job</p>
                                <span class="close-c" data-bs-dismiss="modal">X</span>

                            </div>
                            <hr>

                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img alt="User Pic" src="" id="profile-image-invite"
                                             class="img-circle img-responsive img-card" style="border-radius:50%; width: 85px;height: 85px">
                                    </div>
                                    <input type="hidden" class="" id="freelancerid" value="">
                                    <input type="hidden" class="" id="job" value="">
                                    <input type="hidden" class="" id="jobid" value="">
                                    <div class="col-md-10">
                                        <div style="display: inline-flex;">
                                            <h4 class="pname-c dev-name " id="freelancer_first_name">
                                            </h4>
                                            <p id="space"></p>
                                            <h4 class="pname-c dev-name" id="freelancer_last_name" style="margin-left: 7px;">
                                            </h4>
                                        </div>
                                        <p class="pdesination-c" id="freelancer_designation"></p>
                                        <p class="plocation" id="freelancer_location"></p>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                    <form class="account-form" id="inviteJobForm" >
                        @csrf
                        <div class="row ml-b-20">
                            {{-- <div class="form-group col-lg-7">
                                <!-- <label>@lang('Select One')</label> -->
                                <label for="exampleFormControlTextarea1">Reason</label>
                                <select class="form-control form--control" name="type">
                                    <option value="email">@lang('Select reason')</option>
                                    <option value="username">@lang('Offer1')</option>
                                    <option value="username">@lang('Offer2')</option>
                                    <option value="username">@lang('Offer3')</option>
                                    <option value="username">@lang('Offer4')</option>
                                </select>
                            </div> --}}

                            <div class="form-group col-lg-12 pt-2">
                                <label for="exampleFormControlTextarea1">Message </label>
                                <textarea class="form-control" name="message" id="textAreaExample1" rows="4"></textarea>
                                <input type="hidden" id="user_id" name="user_id">

                            </div>
                            {{--                            <input type="hidden" class="" id="id" value="">--}}

                            <div class="col-lg-6 form-group text-center">

                            </div>
                            <div class="col-lg-6 form-group text-center">
                                {{-- <button type="submit" class="float-left" data-bs-dismiss="modal">Cancle</button> --}}
                                <button type="submit" class="submit-btn w-80 float-right">Send Invitation</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('style')
    <style>
        .dev-name h4 {
            margin-bottom: 20px !important;
        }

        .c-bannerh {
            padding: 18px 30px 0px 7px !important;
        }

        .close-c {
            right: 10px !important;
        }

        form.account-form textarea {
            background: #FFFFFF;
            border: 1px solid #CBDFDF;
            border-radius: 4px;
            height: 114px;
        }

        .c-bannerh {
            font-weight: 600;
            font-size: 22px;
            line-height: 28px;
            color: #000000;
            padding: 18px 30px 0px 19px;

        }

        form.account-form {
            padding: 0px 26px;
        }


        .account-header {
            margin-bottom: 10px;
        }

        button.float-left {
            background: transparent;
            text-align: right;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            margin-top: 10px;
            display: inline-block;
            /* margin-right: 7px; */
            position: relative;
            right: 15px;
            color: #7F007F;
        }

        .modal-dialog {
            max-width: 676px !important;
            margin: 1.75rem auto;

        }

        .modal-body {
            padding: 0px !important;
        }

        .close-c {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: absolute;
            right: 30px;
            top: 15px;
            z-index: 1;
            background: url(/assets/images/job/close-icon.png) no-repeat;
            background-position: center;
            font-size: 0px;
            cursor: pointer;
        }

        a.btn-products-s.phire {
            cursor: pointer;
        }

        .form-control:focus {
            background-color: #fff !important;
        }

        p.plocation:before {
            top: 3px !important;
        }
    </style>
@endpush
@push('script')
    <script>
        'use strict';
        let inviteJobForm=$('#inviteJobForm');
        let user_id=null;
    </script>
@endpush
@push('script')
    <script>
        function inviteJobModal(freelancer,job,user_basic,country) {
            console.log(freelancer);
            inviteJobForm[0].reset();
            var route="{{route('buyer.job.save.invite.freelancer',':id')}}";
            route=route.replace(':id',job.id);
            inviteJobForm.attr('action', route);
            user_id = freelancer.id;
            document.getElementById('user_id').value = user_id;


            $("#freelancer_first_name").html(freelancer.first_name);
            $('#freelancer_last_name').html(freelancer.last_name);
            $('#freelancer_designation').html(user_basic.designation);
            $('#freelancer_location').html(country.name);
            if(user_basic.profile_picture != null){
                $("#profile-image-invite").attr('src',user_basic.profile_picture);
            }else{
                $("#profile-image-invite").attr('src','/assets/images/default.png');
            }
            $('#inviteJobModal').modal('show');
        }




    </script>
@endpush
@push('script')
    <script>
        $(document).ready(function() {


            inviteJobForm.submit(function (e) {
                e.preventDefault();
                e.stopPropagation();
                addJobInvitation();
            });



        });


        function addJobInvitation()
        {

            let form_data = new FormData(inviteJobForm[0]);
            let route=inviteJobForm.attr('action');
            $.ajax({
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:route,
                data: form_data,
                processData: false,
                contentType: false,
                success:function(response){

                    if(response.success){
                        notify('success', response.success);
                        $('#inviteJobForm').modal('hide');
                        location.reload();

                    }
                    else if(response.error){
                        displayAlertMessage(response.error);
                    }
                    else{
                        errorMessages(response.errors);
                    }

                }
            });
        }

        function displayAlertMessage(message)
        {
            iziToast.error({
                message: message,
                position: "topRight",
            });
        }
        function errorMessages(errors)
        {
            $.each(errors, function(i, val) {
                notify('error', val);
            });
        }
    </script>
@endpush