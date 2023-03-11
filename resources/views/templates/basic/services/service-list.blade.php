@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container-fluid">
        <h2 class="all_p_heading">My Services</h2>

        <div class="all_propsal_container">

            <ul class="nav nav-tabs card-header-tabs jbs_nav_s allp_nav" data-bs-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link 'active'" aria-current="true" data-bs-toggle="tab" href="#all">All ({{$totalServices}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#draft_service">Draft Services ({{$totalDraftServices}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#bokked_service">Booked Services ()</a>
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
                        @forelse($services as $service)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{$service->title}}</h2>
                                    <p class="per_jobs_d">Created on {{$service->created_at}}</p>
                                </td>
                                <td>
                                    <p class="per_jobs_d">{{$service->category->name}}</p>
                                </td>
                                <td>
                                    <p class="per_jobs_d">{{$service->subCategory->name}}</p>
                                </td>
                                <td>
                                    <p class="job_price">{{ __($general->cur_sym) }}{{ __(showAmount($service->rate_per_hour)) }}</p>
                                </td>
                                <td>
                                    @if($service->status_id == 17)
                                    <span class="badge badge--info">Draft</span>
                                    @else
                                    <span class="badge badge--success">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{$service->uuid ?route('service.view',[$service->uuid]) : '#'}}"
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
                        {{ $services->links() }}
                    </nav>
                </div>

                <div class="listing_table_con card-body tab-pane" id="draft_service"> 
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub - Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        @forelse($draftServices as $service)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{$service->title}}</h2>
                                    <p class="per_jobs_d">Created on {{$service->created_at}}</p>
                                </td>
                                <td>
                                    <p class="per_jobs_d">{{$service->category->name}}</p>
                                </td>
                                <td>
                                    <p class="per_jobs_d">{{$service->subCategory->name}}</p>
                                </td>
                                <td>
                                    <p class="job_price">{{ __($general->cur_sym) }}{{ __(showAmount($service->rate_per_hour)) }}</p>
                                </td>
                                <td>
                                    @if($service->status_id == 17)
                                    <span class="badge badge--info">Draft</span>
                                    @else
                                    <span class="badge badge--success">Approved</span>
                                    @endif
                                </td>
                                <td><a href="{{$service->uuid ?route('service.view',[$service->uuid]) : '#'}}"
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
                </div>

                <div class="listing_table_con card-body tab-pane " id="bokked_service"> 
                    <center><h2>Comming Soon</h2></center>
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