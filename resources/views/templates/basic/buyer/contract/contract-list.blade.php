@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container-fluid">
        <h2 class="all_p_heading">All Contracts</h2>

        <div class="all_propsal_container">

            <ul class="nav nav-tabs card-header-tabs jbs_nav_s allp_nav" data-bs-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link 'active'" aria-current="true" data-bs-toggle="tab" href="#all">All({{$contracts->count()}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#active_contrat">Active ({{$contracts_active->count()}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#pending_contract">Paused ({{$contracts_paused->count()}})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#completed_contract">Completed ({{$contracts_completed->count()}})</a>
                </li>
            </ul>


            <div class="tab-content">
                <div class="listing_table_con card-body tab-pane active table-responsive" id="all">
                    <table class="table">
                        <thead>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Total Spent</th>
                        <th>Start / End Dates</th>
                        <th>Action</th>
                        </thead>
                            @foreach ($contracts as $contract)
                                <tr>
                                    <td>
                                        <h2 class="per_heading">{{$contract->offer->module->title}}</h2>
                                    </td>
                                    <td>
                                        <span class="badge {{$contract->status->color}}" >{{$contract->status->name}}</span>
                                            <p class="rating-c">
                                                @php
                                                    $score=$contract->feedbacks->first() ? $contract->feedbacks->first()->total_score:0;
                                                @endphp
                                                @for ($index=0;$index<5;$index++)
                                                    
                                                    @if ($index < $score)
                                                        <i class="fa fa-solid fa-star testmonials-review-star"></i>
                                                    @else
                                                        <i class="fa fa-solid fa-star review-star"></i>
                                                    @endif
                                                
                                                @endfor

                                            </p>
                                    </td>
                                    <td>
                                        <p class="job_price">${{$contract->contract_total_amount ?? 0}}</p>
                                    </td>
                                    <td>
                                        <p class="job_price">{{$contract->start_date ? getFormattedDate($contract->start_date,'M d,Y') : ''}} - {{ $contract->end_date ? getFormattedDate($contract->end_date,'M d,Y') : ''}}</p>
                                    </td>
                                    <td><a href="{{route('contracts.show',$contract->uuid)}}"
                                        class="view_propasal_per">View</a>
                                        @if (isHourlyContract($contract))
                                            <a href="{{route('work-diary.tasks',$contract->uuid)}}"
                                                class="view_propasal_per">Work Diary</a>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                    {{ paginateLinks($contracts) }}
                </div>

                <div class="listing_table_con card-body tab-pane" id="active_contrat"> 
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Total Spent</th>
                        <th>Start / End Dates</th>
                        <th>Action</th>
                        </thead>
                        
                        @foreach ($contracts_active as $contract)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{$contract->offer->module->title}}</h2>
                                </td>
                                <td>
                                    <span class="badge {{$contract->status->color}}" >{{$contract->status->name}}</span>
                                        <p class="rating-c"><img src="/assets/images/job/rating-c.png" alt="Rating" class="contract-rating"> </p>
                                </td>
                                <td>
                                    <p class="job_price">${{$contract->contract_total_amount ?? 0}}</p>
                                </td>
                                <td>
                                    <p class="job_price">{{$contract->start_date ? getFormattedDate($contract->start_date,'M d,Y') : ''}} - {{ $contract->end_date ? getFormattedDate($contract->end_date,'M d,Y') : ''}}</p>
                                </td>
                                <td>
                                    <a href="{{route('contracts.show',$contract->uuid)}}" class="view_propasal_per">View</a>
                                    @if (isHourlyContract($contract))
                                        <a href="{{route('work-diary.tasks',$contract->uuid)}}" class="view_propasal_per">Work Diary</a>
                                     @endif
                                </td>
                            </tr>
                        @endforeach
                         
                    </table>
                </div>


                <div class="listing_table_con card-body tab-pane " id="pending_contract"> 
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Total Spent</th>
                        <th>Start / End Dates</th>
                        <th>Action</th>
                        </thead>
                        
                        @foreach ($contracts_paused as $contract)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{$contract->offer->module->title}}</h2>
                                </td>
                                <td>
                                    <span class="badge {{$contract->status->color}}" >{{$contract->status->name}}</span>
                                        <p class="rating-c"><img src="/assets/images/job/rating-c.png" alt="Rating" class="contract-rating"> </p>
                                </td>
                                <td>
                                    <p class="job_price">${{$contract->contract_total_amount ?? 0}}</p>
                                </td>
                                <td>
                                    <p class="job_price">{{$contract->start_date ? getFormattedDate($contract->start_date,'M d,Y') : ''}} - {{ $contract->end_date ? getFormattedDate($contract->end_date,'M d,Y') : ''}}</p>
                                </td>
                                <td><a href="{{route('contracts.show',$contract->uuid)}}"
                                    class="view_propasal_per">View</a>
                                    @if (isHourlyContract($contract))
                                        <a href="{{route('work-diary.tasks',$contract->uuid)}}" class="view_propasal_per">Work Diary</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                         
                    </table>
                </div>
                <div class="listing_table_con card-body tab-pane " id="completed_contract"> 
                    <table>
                        <thead>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Total Spent</th>
                        <th>Start / End Dates</th>
                        <th>Action</th>
                        </thead>
                        
                        @foreach ($contracts_completed as $contract)
                            <tr>
                                <td>
                                    <h2 class="per_heading">{{$contract->offer->module->title}}</h2>
                                </td>
                                <td>
                                    <span class="badge {{$contract->status->color}}" >{{$contract->status->name}}</span>
                                        <p class="rating-c">
                                            
                                            @php
                                                $score=$contract->feedbacks->first() ? $contract->feedbacks->first()->total_score:0;
                                            @endphp

                                            @for ($index=0;$index<5;$index++)
                                                
                                                @if ($index < $score)
                                                    <i class="fa fa-solid fa-star testmonials-review-star"></i>
                                                @else
                                                    <i class="fa fa-solid fa-star review-star"></i>
                                                @endif
                                            
                                            @endfor 
                                        </p>
                                </td>
                                <td>
                                    <p class="job_price">${{$contract->contract_total_amount ?? 0}}</p>
                                </td>
                                <td>
                                    <p class="job_price">{{$contract->start_date ? getFormattedDate($contract->start_date,'M d,Y') : ''}} - {{ $contract->end_date ? getFormattedDate($contract->end_date,'M d,Y') : ''}}</p>
                                </td>

                                <td><a href="{{route('contracts.show',$contract->uuid)}}"
                                    class="view_propasal_per">View</a>
                                    @if (isHourlyContract($contract))
                                        <a href="{{route('work-diary.tasks',$contract->uuid)}}" class="view_propasal_per">Work Diary</a>
                                    @endif
                                </td>

                            </tr>
                         @endforeach
                         
                    </table>
                </div>

            </div>


        </div>
    </div>
@endsection

    <style>
        .testmonials-review-star{
            padding: 0px !important;
            color: #F09959;
        }
        .review-star{
            padding: 0px;
            color: rgb(215, 212, 212);
        }

        .contract-rating{
            width: 60px;
            margin-left: 10px;
            margin-top: 5px;
        }
        .badge--primary {
            width: auto !important;
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
        @media only screen and (max-width:683px){
            .nav-tabs .nav-link {
                padding: 5px 13px !important;
                border: 0 !important;
                border-bottom: 1px solid transparent !important;
                color: #606975 !important;
                font-weight: 500 !important;
                font-size: 9px !important;
                background-color: transparent !important;
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