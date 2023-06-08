
@extends($activeTemplate.'layouts.frontend')
@section('content')
    <div class="container-fluid">
        <h2 class="all_p_heading">All Proposals</h2>

        <div class="all_propsal_container">
            {{-- <ul class="allp_nav">

                <li><a href="#">All (7)</a></li>
                <li><a href="#">Draft Proposals (5)</a></li>
                <li><a href="#">Submitted Proposals (6)</a></li>
            </ul> --}}


            <ul class="nav nav-tabs card-header-tabs jbs_nav_s allp_nav" data-bs-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link {{ $type==null ? 'active' : ''}}" aria-current="true" data-bs-toggle="tab" href="#all">All ({{count($proposal_count)}})</a>

                </li>
                <li class="nav-item">

                    <a class="nav-link {{ $type=="submitted_proposals" ? 'active' : ''}}" data-bs-toggle="tab" href="#submitted_proposals">Submitted Proposals ({{count($submitted_proposal_count)}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $type=="active_proposals" ? 'active' : ''}}" data-bs-toggle="tab" href="#active_proposals">Active Proposals ({{count($active_proposal_count)}})</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $type=="archived_proposals" ? 'active' : ''}}" data-bs-toggle="tab" href="#draft_proposals">Archived Proposals ({{count($archived_proposal_count)}})</a>

                </li>
               
            </ul>


            <div class="tab-content">
                <div class="listing_table_con card-body tab-pane {{ $type==null ? 'active' : ''}}" id="all">
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Job Type</th>
                        <th>Proposed Price</th>
                        <th>Proposal Status</th>
                        <th>Action</th>
                        </thead>

                        @if(isset($proposals) && $proposals->count() > 0)
                        @foreach($proposals as $proposal)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{isset($proposal->module) ? $proposal->module->title: null}}</h2>
                                    <p class="per_jobs_d">Job posted by <span class="per_heading_name">{{$proposal->module->user->first_name ?? '' }}&nbsp; {{$proposal->module->user->last_name[0] ?? '' }}</span> on {{getYearMonthDays($proposal->module->created_at)}}</p>
                                </td>
                                <td>
                    <span class="jobtype-per">
                        @if($proposal->module_type == "App\Models\Job")
                            Job
                        @elseif($proposal->module_type == "App\Models\Service")
                            Service
                        @elseif($proposal->module_type == "App\Models\Software")
                            Software
                        @else

                        @endif
                    </span>
                                </td>
                                <td>
                                    <p class="job_price">{{$proposal->hourly_bid_rate ?? $proposal->fixed_bid_amount}}</p>
                                </td>
                                <td>
                                @if($proposal->status_id == App\Models\Proposal::STATUSES['SUBMITTED'])
                                    <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Submitted</span>
                                @elseif($proposal->status_id == App\Models\Proposal::STATUSES['ARCHIVED'])
                                    <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Archived</span>
                                @elseif($proposal->status_id == App\Models\Proposal::STATUSES['ACTIVE'])
                                    <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Active</span>
                                @else

                                @endif

                                </td>
                                <td><a href="{{ route('seller.proposal.detail',$proposal->uuid) }}"
                                       class="view_propasal_per">View Proposal</a></td>
                            </tr>
                        @endforeach
                        @endif
                    </table>

                    <div class="card-footer py-4">
                        {{ paginateLinks($proposals ?? '') }}
                    </div>
                </div>

                <div class="listing_table_con card-body tab-pane {{ $type=="submitted_proposals" ? 'active' : ''}}" id="submitted_proposals"> 
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Job Type</th>
                        <th>Proposed Price</th>
                        <th>Proposal Status</th>
                        <th>Action</th>
                        </thead>
                        @if(isset($submitted_proposals) && $submitted_proposals->count() > 0)
                        @foreach($submitted_proposals as $proposal)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{isset($proposal->module) ? $proposal->module->title: null}}</h2>
                                    <p class="per_jobs_d">Job posted by <span class="per_heading_name">{{$proposal->module->user->first_name ?? ''}} &nbsp; {{$proposal->module->user->last_name[0] ?? ''}}</span> on {{getYearMonthDays($proposal->module->created_at)}}</p>
                                </td>
                                <td>
                    <span class="jobtype-per">
                        @if($proposal->module_type == "App\Models\Job")
                            Job
                        @elseif($proposal->module_type == "App\Models\Service")
                            Service
                        @elseif($proposal->module_type == "App\Models\Software")
                            Software
                        @else

                        @endif
                    </span>
                                </td>
                                <td>
                                    <p class="job_price">{{$proposal->hourly_bid_rate ?? $proposal->fixed_bid_amount}}</p>
                                </td>
                                <td>
                                    @if($proposal->status_id == App\Models\Proposal::STATUSES['SUBMITTED'])
                                        <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Submitted</span>
                                    @elseif($proposal->status_id == App\Models\Proposal::STATUSES['ARCHIVED'])
                                        <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Archived</span>
                                    @elseif($proposal->status_id == App\Models\Proposal::STATUSES['ACTIVE'])
                                        <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Active</span>
                                    @else

                                    @endif

                                </td>
                                <td><a href="{{ route('seller.proposal.detail',$proposal->uuid) }}"
                                       class="view_propasal_per">View Proposal</a></td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
                    <div class="card-footer py-4">
                        {{ paginateLinks($submitted_proposals) }}
                    </div>
                </div>

                <div class="listing_table_con card-body tab-pane {{ $type=="archived_proposals" ? 'active' : ''}}" id="draft_proposals"> 
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Job Type</th>
                        <th>Proposed Price</th>
                        <th>Proposal Status</th>
                        <th>Action</th>
                        </thead>
                        @if(isset($archived_proposals) && $archived_proposals->count() > 0)
                        @foreach($archived_proposals as $proposal)
                                <tr>
                                    <td>
                                        <h2 class="per_heading">{{isset($proposal->module) ? $proposal->module->title: null}}</h2>
                                        <p class="per_jobs_d">Job posted by <span class="per_heading_name">{{$proposal->module->user->first_name ?? '' }} &nbsp; {{$proposal->module->user->last_name[0] ?? ''}}</span> on {{getYearMonthDays($proposal->module->created_at)}}</p>
                                    </td>
                                    <td>
                    <span class="jobtype-per">
                        @if($proposal->module_type == "App\Models\Job")
                            Job
                        @elseif($proposal->module_type == "App\Models\Service")
                            Service
                        @elseif($proposal->module_type == "App\Models\Software")
                            Software
                        @else

                        @endif
                    </span>
                                    </td>
                                    <td>
                                        <p class="job_price">{{$proposal->hourly_bid_rate ?? $proposal->fixed_bid_amount}}</p>
                                    </td>
                                    <td>
                                        @if($proposal->status_id == App\Models\Proposal::STATUSES['SUBMITTED'])
                                            <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Submitted</span>
                                        @elseif($proposal->status_id == App\Models\Proposal::STATUSES['ARCHIVED'])
                                            <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Archived</span>
                                        @elseif($proposal->status_id == App\Models\Proposal::STATUSES['ACTIVE'])
                                            <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--info'}}">Active</span>
                                        @else

                                        @endif

                                    </td>
                                    <td><a href="{{ route('seller.proposal.detail',$proposal->uuid) }}"
                                           class="view_propasal_per">View Proposal</a></td>
                                </tr>
                        @endforeach
                        @endif
                    </table>
                    <div class="card-footer py-4">
                        {{ paginateLinks($archived_proposals) }}
                    </div>
                </div>
                <div class="listing_table_con card-body tab-pane {{ $type=="active_proposals" ? 'active' : ''}}" id="active_proposals"> 
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Job Type</th>
                        <th>Proposed Price</th>
                        <th>Proposal Status</th>
                        <th>Action</th>
                        </thead>

                        @foreach($active_proposals as $proposal)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{isset($proposal->module) ? $proposal->module->title: null}}</h2>
                                    <p class="per_jobs_d">Job posted by <span class="per_heading_name">{{$proposal->module->user->first_name ?? ''}} &nbsp; {{$proposal->module->user->last_name[0] ?? ''}}</span> on {{getYearMonthDays($proposal->module->created_at)}}</p>
                                </td>
                                <td>
                    <span class="jobtype-per">
                        @if($proposal->module_type == "App\Models\Job")
                            Job
                        @elseif($proposal->module_type == "App\Models\Service")
                            Service
                        @elseif($proposal->module_type == "App\Models\Software")
                            Software
                        @else

                        @endif
                    </span>
                                </td>
                                <td>
                                    <p class="job_price">{{$proposal->hourly_bid_rate ?? $proposal->fixed_bid_amount}}</p>
                                </td>
                                <td>
                                    @if($proposal->status_id == App\Models\Proposal::STATUSES['SUBMITTED'])
                                        <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--success'}}">Submitted</span>
                                    @elseif($proposal->status_id == App\Models\Proposal::STATUSES['ARCHIVED'])
                                        <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--dark'}}">Archived</span>
                                    @elseif($proposal->status_id == App\Models\Proposal::STATUSES['ACTIVE'])
                                        <span class="badge {{$proposal->status ? $proposal->status->color : 'badge--success'}}">Active</span>
                                    @else

                                    @endif

                                </td>
                                <td><a href="{{ route('seller.proposal.detail',$proposal->uuid) }}"
                                       class="view_propasal_per">View Proposal</a></td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="card-footer py-4">
                        {{ paginateLinks($active_proposals) }}
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection

    <style>
        ul.allp_nav {
            padding: 0px 0px 15px 24px;
            border-bottom: 1px solid #CBDFDF;
        }

        ul.allp_nav li {
            float: left;
            display: inline-block;
        }

        ul.allp_nav li a {
            margin-right: 60px;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            text-align: center;
            color: #808285;
        }

        .listing_table_con table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #CBDFDF;
        }

        .listing_table_con th, .listing_table_con td {
            text-align: left;
            padding: 30px 30px;
        }

        h2.all_p_heading {
            font-weight: 600;
            font-size: 20px;
            line-height: 25px;
            color: #000000;
            margin-top: 29px;
            margin-bottom: 30px;
        }

        .all_propsal_container {
            width: 100%;
            display: inline-block;
            background: #FFFFFF;
            border: 1px solid #CBDFDF;
        }

        ul.allp_nav {
            padding: 21px 31px 35px 31px;
            border-bottom: 1px solid #CBDFDF;
        }

        .listing_table_con {
            width: 100%;
            padding: 31px 31px;
            border-radius: 4px;

        }

        .listing_table_con thead {
            /* background: red; */
            background: #F1F8F8;
            border: 1px solid #CBDFDF;
            border-radius: 12px 12px 0px 0px
        }

        h2.per_heading {
            font-weight: 600;
            font-size: 18px;
            line-height: 23px;
            color: #007F7F;
        }
        .per_heading_name {
            font-weight: 600;
            font-size: 18px;
            line-height: 23px;
            color: #007F7F;
        }

        p.per_jobs_d {
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            color: #000000;
            margin-top: 20px;
        }

        span.jobtype-per {
            background: #58A7A7;
            border-radius: 20px;
            display: inline-block;
            padding: 7px 17px;
            font-size: 14px;
            color: #fff;
        }

        p.job_price {
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            color: #000000;
        }

        span.job_status_p {
            background: #5BACF6;
            border-radius: 20px;
            display: inline-block;
            padding: 7px 31px;
            color: #fff;
            font-size: 14px;
        }

        a.view_propasal_per {
            color: #7F007F;
            font-size: 14px;
            padding: 10px 30px;
            border: 2px solid #7F007F;
            border-radius: 5px;
        }

        .listing_table_con {
            width: 100%;
            padding: 31px 31px;
            border-radius: 4px;

        }

        .listing_table_con tr {
            border-bottom: 1px solid #CBDFDF;
        }

        .listing_table_con tr:last-child td {
            padding-bottom: 70px !important;
        }

        .listing_table_con thead th {
            font-weight: 600;
            font-size: 16px;
            /* line-height: 10px; */
            color: #000000;
            padding: 17px 30px;
            border-top-right-radius: 5px !important;
            border-top-left-radius: 5px !important;
        }

        /**********Responsive********/
        @media only screen and (max-width: 1187px) {
            a.view_propasal_per {
                padding: 10px 20px;
            }

            .listing_table_con th, .listing_table_con td {
                text-align: left;
                padding: 30px 25px;
            }

            a.view_propasal_per {
                padding: 7px 9px;
            }
        }

        @media only screen and (max-width: 1124px) {
            .listing_table_con {
                overflow-x: scroll;

            }

            .listing_table_con table {
                width: 1180px;

            }

        }

        @media only screen and (max-width: 767px) {
            ul.allp_nav li a {
                margin-right: 12px;
                font-weight: 600;
                font-size: 12px;
            }

            ul.allp_nav {
                padding: 16px 15px 36px 15px;
                border-bottom: 1px solid #CBDFDF;
            }

            .listing_table_con {
                width: 100%;
                padding: 15px 15px;
                border-radius: 4px;
            }

            h2.per_heading {
                font-weight: 600;
                font-size: 16px;
                line-height: 21px;
                color: #007F7F;
            }

            p.per_jobs_d {
                font-weight: 400;
                font-size: 14px;
                line-height: 20px;
                color: #000000;
                margin-top: 18px;
            }
        }
    </style>

@push('script')
    <script>
        'use strict';
        $('#defaultSearch').on('change', function () {
            this.form.submit();
        });
    </script>
@endpush
