@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container-fluid">
        <h2 class="all_p_heading">My Softwares</h2>

        <div class="all_propsal_container">

            <ul class="nav nav-tabs card-header-tabs jbs_nav_s allp_nav" data-bs-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link 'active'" aria-current="true" data-bs-toggle="tab" href="#all">All ({{$totalSoftwares ?? ''}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#draft_software">Draft Software ({{$totalDraftSoftwares ?? ''}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#booked_software">Booked Software (0)</a>
                </li>
            </ul>


            <div class="tab-content">
                <div class="listing_table_con card-body tab-pane active" id="all">
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub - Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        @forelse($softwares as $software)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{$software->title}}</h2>
                                    <p class="per_jobs_d">Created on {{$software->created_at}}</p>
                                </td>
                                <td>
                                    <p class="per_jobs_d">{{$software->category->name}}</p>
                                </td>
                                <td>
                                    <p class="per_jobs_d">{{$software->subCategory->name}}</p>
                                </td>
                                <td>
                                    <p class="job_price">{{ __(showAmount($software->price)) }}</p>
                                </td>
                                <!-- <td>
                                    @if($software->status_id == 22)
                                    <span class="badge badge--info">Draft</span>
                                    @else
                                    <span class="badge badge--success">Approved</span>
                                    @endif
                                </td> -->
                                <td data-label="@lang('Status')">
                                    @if($software->status_id == 24)
                                        <span class="badge badge--success">@lang('Approved')</span>
                                        <br>
                                    @elseif($software->status_id == 25)
                                        <span class="badge badge--danger">@lang('Canceled')</span>
                                        <br>
                                    @elseif($software->status_id == 23)
                                        <span class="badge badge--primary">@lang('Pending')</span>
                                        <br>
                                    @elseif($software->status_id == 22)
                                        <span class="badge badge--warning">@lang('Draft')</span>
                                        <br>
                                    @elseif($software->status_id == 26)
                                        <span class="badge badge--info" style="background-color: rgba(255, 155, 220, 0.1);border: 1px solid #7367f0;color: #7367f0;padding: 2px 15px;border-radius: 999px;">@lang('Under Review')</span>
                                        <br>    
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('software.view', [$software->uuid]) }}"
                                       class="view_propasal_per">View</a>
                                </td>
                            </tr>
                        @empty
                            <div class="empty-message-box bg--gray">
                                <div class="icon"><i class="las la-frown"></i></div>
                                <p class="caption">{{ __($emptyMessage) }}</p>
                            </div>
                        @endforelse 
                    </table>
                    <nav>
                        {{ paginateLinks($softwares) }}

                    </nav>
                </div>

                <div class="listing_table_con card-body tab-pane" id="draft_software"> 
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub - Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        @forelse($draftSoftwares as $software)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{$software->title}}</h2>
                                    <p class="per_jobs_d">Created on {{$software->created_at}}</p>
                                </td>
                                <td>
                                    <p class="per_jobs_d">{{$software->category->name}}</p>
                                </td>
                                <td>
                                    <p class="per_jobs_d">{{$software->subCategory->name}}</p>
                                </td>
                                <td>
                                    <p class="job_price">{{ __(showAmount($software->price)) }}</p>
                                </td>
                                <!-- <td>
                                    @if($software->status_id == 22)
                                    <span class="badge badge--info">Draft</span>
                                    @else
                                    <span class="badge badge--success">Approved</span>
                                    @endif
                                </td> -->
                                <td data-label="@lang('Status')">
                                    @if($software->status_id == 24)
                                        <span class="badge badge--success">@lang('Approved')</span>
                                        <br>
                                    @elseif($software->status_id == 25)
                                        <span class="badge badge--danger">@lang('Canceled')</span>
                                        <br>
                                    @elseif($software->status_id == 23)
                                        <span class="badge badge--primary">@lang('Pending')</span>
                                        <br>
                                    @elseif($software->status_id == 22)
                                        <span class="badge badge--warning">@lang('Draft')</span>
                                        <br>
                                    @elseif($software->status_id == 26)
                                        <span class="badge badge--info" style="background-color: rgba(255, 155, 220, 0.1);border: 1px solid #7367f0;color: #7367f0;padding: 2px 15px;border-radius: 999px;">@lang('Under Review')</span>
                                        <br>    
                                    @endif
                                </td>
                                <td><a href="{{ route('software.view', [$software->uuid]) }}"
                                       class="view_propasal_per">View</a>
                                </td>
                            </tr>
                        @empty
                            <div class="empty-message-box bg--gray">
                                <div class="icon"><i class="las la-frown"></i></div>
                                <p class="caption">{{ __($emptyMessage) }}</p>
                            </div>
                        @endforelse
                    </table>
                    <nav>
                        {{ paginateLinks($draftSoftwares) }}

                    </nav>
                </div>

                <div class="listing_table_con card-body tab-pane " id="booked_software"> 
                    <center><h2>Coming Soon</h2></center>
                </div>

            </div>


        </div>
    </div>
@endsection

    <style>
        .contract-rating{
            width: 60px;
            margin-left: 10px;
            margin-top: 5px;
        }
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