@extends($activeTemplate.'layouts.frontend')
@section('content')

    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center cv-container">
                <div class="container network_wrapper col-sm ">
                    <!-- Tabs navs -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xl-6 col-xs-6">
                            <span class="my-proposal">My proposals</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xl-6 col-xs-6">
                            <div class="float-right">
                                <span class="main-heading">Search for Jobs</span>
                                <span>&nbsp;|&nbsp;</span>
                                <span class="main-heading-top-right">Manage your Profile</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="top-card-header ">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" data-bs-toggle="tab"
                                       href="#Search_tab">Active</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab"
                                       href="#Invited_Freelancers_tab">Archived</a>
                                </li>
                            </ul>
                        </div>
                        <form class="card-body tab-content">
                            <div class="tab-pane active" id="Search_tab">
                                <div class="card-text">
                                    <div class="card">
                                        <div class="card-header">
                                            <span class="card-heading">Offers ({{count($offers)}})</span>
                                        </div>
                                        @foreach($offers as $offer)
                                            @isset($offer)
                                        <div class="card-body">
                                            <span class="card-main-headind">{{$offer->title}}</span>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p class="card-sub-headind">Received {{getYearMonthDays($offer->created_at)}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="day-time">{{getDaysHoursMinutesSeconds($offer->created_at)}}</span>
                                                </div>
                                            </div>


                                        </div>
                                            @endisset
                                            @endforeach
                                    </div>
                                </div>

                                @isset($user->invitations)
                                    <div class="card-text mt-20">
                                        <div class="card">
                                            <div class="card-header float-left">
                                                <span class="card-heading">Invitations to interview ({{count($user->invitations)}})</span>
                                            </div>
                                            @foreach($user->invitations as $invitations)
                                                <div class="card-body">
                                                    <span class="card-main-headind">{{isset($invitations->job) ? $invitations->job->title: null}}</span>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <p class="card-sub-headind">Received {{getYearMonthDays($invitations->created_at)}}</p>
                                                        </div>
                                                        <div class="col-md-4">

                                                            <span class="day-time">{{getDaysHoursMinutesSeconds($invitations->created_at)}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endisset

                                <div class="card-text mt-20">
                                    <div class="card">
                                        <div class="card-header float-left">
                                            <span class="card-heading">Active Proposals (2)</span>
                                        </div>
                                        <div class="card-body">
                                            <span class="card-main-headind">Responsive Web App Design</span>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p class="card-sub-headind">Received Oct 6, 2022</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="day-time">5 days ago</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <span class="card-main-headind">Logo Design</span>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <p class="card-sub-headind">Received Oct 2, 2022</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="day-time">5 days ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @isset($user->proposal)
                                <div class="card-text mt-20">
                                    <div class="card">
                                        <div class="card-header float-left">
                                            <span class="card-heading"> Submitted Proposals ({{count($user->proposal)}})</span>
                                        </div>
                                        @foreach($user->proposal as $proposal)
                                        <div class="card-body">
                                            <span class="card-main-headind">{{isset($proposal->job) ? $proposal->job->title: null}}</span>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p class="card-sub-headind">Sent {{getYearMonthDays($proposal->created_at)}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="day-time"> {{getDaysHoursMinutesSeconds($proposal->created_at)}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endisset
                            </div>
                            <div class="tab-pane" id="Invited_Freelancers_tab">
                                <p class="card-text text-center">
                                <div class="d-flex align-items-center justify-content-center ">
                                    <h3 class="display-1 fw-bold">Coming Soon</h3>
                                </div>
                                </p>
                            </div>
                        </form>
                    </div>
                    <!-- Tabs content -->
                </div>
            </div>
    </section>

    </div>
    @include($activeTemplate . 'partials.end_ad')

@endsection
@push('style')
    <link rel="stylesheet" href="{{asset('css/view-propsal.css')}}">
@endpush
<style>
    .card {
        margin: 0 0.5em;
        box-shadow: 2px 3px 8px 0 rgb(22 22 26 / 18%) !important;
        border: none;
    }

    .nav-link.active {
        background: -o-linear-gradient(left, #1c6a6a 0%, #1c6a6a 100%) !important;
        background: linear-gradient(to right, #1c6a6a 0%, #1c6a6a 100%) !important;
    }

    .nav-tabs {
        margin: 0px !important;
        border-bottom: 1px solid #e1e7ec;
    }

    .top-card-header {
        padding: 0.8rem 1rem !important;
        margin-bottom: 0 !important;
        background-color: rgba(0, 0, 0, 0) !important;
        border-bottom: 0px solid rgba(0, 0, 0, .125) !important;
    }

    .card-header {
        padding: 0.8rem 1rem !important;
        margin-bottom: 0 !important;
        background-color: rgba(241, 248, 248, 1) !important;
        border-bottom: 0px solid rgba(241, 248, 248, 1) !important;
    }

    .my-proposal {
        margin: 10px 0 10px 10px;
        width: 126px;
        height: 25px;
        left: 34px;
        top: 116px;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 25px;
        /* identical to box height */
        color: #000000;
    }

    .main-heading-top-right {
        margin: 10px 0 10px 10px;
        width: 170px;
        height: 20px;
        left: 953px;
        top: 124.5px;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 20px;
        /* identical to box height */
        color: #007F7F;
    }

    .card-heading {
        height: 22px;
        left: 92px;
        top: 1170px;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 20px;
        color: #000000;
    }

    .main-heading {
        margin: 10px 0 10px 10px;
        width: 114px;
        height: 20px;
        left: 953px;
        top: 124.5px;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 20px;
        /* identical to box height */
        color: #007F7F;
    }

    .card-main-headind {
        margin: 10px 0 10px 10px;
        height: 20px;
        left: 953px;
        top: 124.5px;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 20px;
        /* identical to box height */
        color: #007F7F;
    }

    .card-sub-headind {
        margin: 7px 0 10px 15px;
        height: 20px;
        left: 92px;
        top: 380px;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        /* identical to box height */
        color: #000000;
    }

    .day-time {
        margin: 7px 0 10px 15px;
        height: 18px;
        top: 502px;
        font-family: 'Mulish';
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 18px;
        /* identical to box height */
        text-align: center;
        color: #898989;
    }
</style>
