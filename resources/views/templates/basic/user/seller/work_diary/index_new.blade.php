@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections zero_top_padding">
    <div class="container-fluid">
        @include('templates.basic.user.seller.work_diary.tasks_header')

        <div class="section-wrapper ">
            
            <div class="row align-items-center bbs" style="height:80px">
                
                <div class="col-md-2 col-lg-2">
                    <input type="text" id="datepicker" class="datepicker-button">
                   
                </div>

                <div class="col-md-4 col-lg-4 ">
                    
                    <button type="button" class="btn  btn-floating" onclick="showDate('previous')">
                        <i class="fas fa-chevron-left icon"></i>
                      </button>

                    <button class="btn btn-secondary today" onclick="showDate('today')">Today</button>
                    
                    <button type="button" class="btn  btn-floating" onclick="showDate('next')">
                        <i class="fas fa-chevron-right icon"></i>
                      </button>

                    
                </div>

                 <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 mt-2">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="offset-md-5 input-group">
                            <input class="search" type="search" placeholder="Search" aria-label="Search">
                            <div class="f-container">
                                <div class="dropdown">
                                    <div id="Filters" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="bi bi-funnel-fill"></i> Filters
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="Filters">
                                        <!-- Add your filter options here -->
                                        <li><a class="dropdown-item" href="#">Coming Soon</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                            <button class="btn-add-task ml-2" type="button">Add Task</button>
                        </div>
                    </form>
                </div>
                


            </div>

            <div class="row mt-3 mb-2 " data-bs-tabs="tabs" >
                
                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 " >

                    <a  class="nav-link" data-bs-toggle="tab" href="#in_draft">
                        
                        <div class="row selected metrics-container">
                        
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 num_task mt-2 ">
                                <strong>{{$data['tasks_in_draft_count_count']}}</strong>
                                
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 ">
                                
                                <span>Tasks</span><br>
                                <span>In Draft</span>
                            
                                
                            </div>
                        </div>

                    </a>

                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 ">
                    <a class="nav-link" data-bs-toggle="tab" href="#in_progress">
                        <div class="row metrics-container">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 num_task mt-2 ">
                                <strong>{{$data['tasks_in_progress_count']}}</strong>
                                
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 ">
                                <span>Tasks</span><br>
                                <span> In Progress</span>
                            </div>
                                
                        </div>
                    </a>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 ">
                    <a class="nav-link" data-bs-toggle="tab" href="#awaiting_approval">
                        <div class="row metrics-container">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 num_task mt-2">
                                <strong>{{$data['tasks_in_awating_approval_count']}}</strong>
                                
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 ">
                                <span>Tasks</span><br>
                                <span> Awaiting Approval</span>
                            </div>
                            
                        </div>
                    </a>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 ">
                    <a class="nav-link" data-bs-toggle="tab" href="#completed">
                        <div class="row metrics-container">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 num_task mt-2 ">
                                <strong>{{$data['tasks_in_completed_count']}}</strong>
                                
                            </div>
                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 ">
                                <span>Tasks</span><br>
                                <span>Completed</span>
                            </div>
                            
                        </div>
                    </a>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12">

                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 total-day-hours mt-2">
                    
                    <div class="mp">
                        <span>Day Total</span><br>
                        <strong class="wh">{{$data['total_day_hours']}}</strong> <span class="mid-line"></span> <strong class="wh">{{$data['total_day_hours_dollars']}}</strong>
                    </div>
                    

                </div>


            </div>
            <div class="tab-content mt-3">
                
                <div class="tab-pane active" id="in_draft">
                    
                    <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="job-listing">
                                    
                        <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 20%">@lang('Task Title')</th>
                                <th>@lang('Start Time')</th>
                                <th>@lang('End Time')</th>
                                <th>@lang('Total Hrs')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Status')</th>

                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($data['tasks_in_draft'] as $item)
                                <tr>
                                    <td>{{$item->custom_description}}</td>
                                    <td>{{$item->custom_start_time}}</td>
                                    <td>{{$item->custom_end_time}}</td>
                                    <td>{{$item->time_in_hours}}h</td>
                                    <td>{{$item->custom_task_amount}}</td>
                                    <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>

                                </tr>
                            @endforeach
                            
                           
                        </tbody>
                            
                    </table>

                </div>

                <div class="tab-pane mt-c" id="in_progress"> 
                    <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="job-listing">
                                    
                        <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 20%">@lang('Task Title')</th>
                                <th>@lang('Start Time')</th>
                                <th>@lang('End Time')</th>
                                <th>@lang('Total Hrs')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Status')</th>

                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($data['tasks_in_progress'] as $item)
                                <tr>
                                    <td>{{$item->custom_description}}</td>
                                    <td>{{$item->custom_start_time}}</td>
                                    <td>{{$item->custom_end_time}}</td>
                                    <td>{{$item->time_in_hours}}h</td>
                                    <td>{{$item->custom_task_amount}}</td>
                                    <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>

                                </tr>
                            @endforeach
                        </tbody>
                            
                    </table>
                </div>


                <div class="tab-pane mt-c" id="awaiting_approval"> 
                    <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="job-listing">
                                    
                        <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 20%">@lang('Task Title')</th>
                                <th>@lang('Start Time')</th>
                                <th>@lang('End Time')</th>
                                <th>@lang('Total Hrs')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Status')</th>

                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($data['tasks_in_awating_approval'] as $item)
                                <tr>
                                    <td>{{$item->custom_description}}</td>
                                    <td>{{$item->custom_start_time}}</td>
                                    <td>{{$item->custom_end_time}}</td>
                                    <td>{{$item->time_in_hours}}h</td>
                                    <td>{{$item->custom_task_amount}}</td>
                                    <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane mt-c" id="completed"> 
                    <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="job-listing">
                                    
                        <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 20%">@lang('Task Title')</th>
                                <th>@lang('Start Time')</th>
                                <th>@lang('End Time')</th>
                                <th>@lang('Total Hrs')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Status')</th>

                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($data['tasks_in_completed'] as $item)
                                <tr>
                                    <td>{{$item->custom_description}}</td>
                                    <td>{{$item->custom_start_time}}</td>
                                    <td>{{$item->custom_end_time}}</td>
                                    <td>{{$item->time_in_hours}}h</td>
                                    <td>{{$item->custom_task_amount}}</td>
                                    <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>

                                </tr>
                            @endforeach
                        </tbody>
                            
                    </table>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection

@push('script')

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>

        $(document).ready(function() {
            $('.nav-link').on('click', function() {
                $('.nav-link').find('div').removeClass('selected');
                $(this).find('div').first().addClass('selected');
                var target = $(this).attr('href');
                $('.tab-pane').removeClass('active');
                $(target).addClass('active');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var datePicker = document.getElementById("datepicker");
            var currentDate = new Date();
            var flatpickrInstance = flatpickr(datePicker, {
            dateFormat: "D, j M", // Set the desired date format
            defaultDate: currentDate,
            onClose: function(selectedDates) {
                datePicker.value = flatpickrInstance.formatDate(selectedDates[0], "D, j M");
            }
            });
        });

        function showDate(action) {

            var datePicker = document.getElementById("datepicker");
            var selectedDate = flatpickr.parseDate(datePicker.value, "D, j M");
            var currentDate = new Date();

            if (action === 'previous') {
                currentDate.setDate(selectedDate.getDate() - 1);
            } else if (action === 'next') {
                currentDate.setDate(selectedDate.getDate() + 1);
            } else {
                currentDate = new Date(); // Today's date
            }

            datePicker._flatpickr.setDate(currentDate, false, "D, j M");
        }

    </script>

@endpush

@push('style')
    <style>
        .search{
            background: #FFFFFF;
            border: 1px solid #CBDFDF;
            border-radius: 6px;
            width: 225px !important;
        }
        .btn-add-task{
            background: #007F7F;
            border-radius: 6px;
            text-align: center;
            color: #FFFFFF;
            margin: 4px !important;
            border-top-left-radius: 6px !important; 
            border-bottom-left-radius: 6px !important; 
        }

        .f-container {
            position: relative;
            float: right;
        }
        #Filters {
            margin-left: 4px !important;
            margin-right: 4px !important;
            border-radius: 5px;
            padding: 8px 13px 8px 38px;
            color: #007F7F;
            font-size: 14px;
            width: 100%;
            appearance: none;
            background: #FFFFFF url(/assets/images/job/lines.png) no-repeat !important;
            background-position: 15% center !important;
            max-width: 98px;
            height:49px;
            border: 1px solid #CBDFDF;
            cursor: pointer;
        }
    .mt-c{
        margin-top:-24px !important;
    }
    .wh{
        padding: 3px;
    }
    .mp{
        padding-top: 7px !important; 
    }

    .mid-line{
        border-left: 2px solid #A394A3;
        padding: 3px;
        padding-top: 7px;

    }
    .total-day-hours{
        background: #FFF4FF;
        border: 1px dashed #A394A3;
        border-radius: 6px;
        height: 61px;
    }
    .metrics-container{
        background: #D0E2E2;
        border-radius: 6px;
        height: 61px;
        padding-top: 7px;
    }
    .row.selected strong,
    .row.selected span {
        color: white;
    }
    .row.selected.metrics-container {
        background: #007F7F;
        border-radius: 6px;
    }
   
    .num_task{
        font-size: 30px;
        font-weight: 500
    }

    .section-wrapper {
        background: #F8FAFA;
    }
    .bbs{
        border-bottom: 1px solid #DCEDED
    }
    .btn-floating{
        border: 1px solid #007F7F;
        background: transparent;
        border-radius: 50%;
        
    }
    .btn:hover {
        color:  #007F7F !important;
        background-color: transparent !important;
    }
   
   .icon{
        color: #007F7F;
   }

   .today{
    
        margin: 15px;
        background: transparent;
        color: #007F7F;
        border: 2px solid #007F7F;
        border-radius: 6px;
    
   }

   .disable-hover-events {
        pointer-events: none;
    }
    
    .datepicker-button{

        border: none;
        font-weight: 600;
        font-size: 18px;
        background:transparent

    }
    a.active strong{
        color: white
    }
   
</style>
@endpush