@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections zero_top_padding">
    <div class="container-fluid">
        @include('templates.basic.user.seller.work_diary.tasks_header' , ['contract' => $data['contract']])
        @php
            $contract_id=$data['contract']->id;
        @endphp
        <input type="hidden" value="{{$data['contract_uuid']}}" id="contract_uuid">

        <div class="section-wrapper ">
            
            <div class="row align-items-center bbs">
                
                <div class="col-md-2 col-lg-2">
                    <div class="d-inline-flex align-items-center">
                        <input type="text" id="datepicker" class="datepicker-button" style="padding-right: 0;">
                        <span class="date-picker-icon">
                          <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.55012 0H8.71012C9.02012 0 9.27012 0.25 9.27012 0.56C9.27012 0.71 9.21012 0.85 9.11012 0.95L5.53012 4.53C5.31012 4.75 4.96012 4.75 4.74012 4.53L1.16012 0.95C0.940117 0.73 0.940117 0.38 1.16012 0.16C1.27012 0.06 1.41012 0 1.55012 0Z" fill="#898989"/>
                          </svg>
                        </span>
                      </div>
                        
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 today-buttons">
                    
                    <button type="button" class="btn  btn-floating btn_date" onclick="showDate('previous')" >
                        <i class="fas fa-chevron-left icon"></i>
                      </button>

                    <button class="btn btn-secondary today btn_date" onclick="showDate('today')">Today</button>
                    
                    <button type="button" class="btn  btn-floating btn_date" onclick="showDate('next')">
                        <i class="fas fa-chevron-right icon"></i>
                      </button>

                    
                </div>

                 <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 mt-2 mobile-view-search">
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
                            @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                <button class="btn-add-task ml-2" type="button" id="" data-bs-toggle="modal" data-bs-target="#add_task_model_id">Add Task</button>
                            @else
                                <button class="btn-add-task ml-2" type="button" id="" data-bs-toggle="modal" data-bs-target="#reports">Generate Report</button>
                            @endif
                        </div>
                    </form>
                </div>
                


            </div>

            <div class="row mt-3 mb-2 " data-bs-tabs="tabs" >
                
                @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                    <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 " >

                        <a  class="nav-link" data-bs-toggle="tab" href="#in_draft">
                            
                            <div class="row selected metrics-container">
                            
                                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 num_task mt-2 ">
                                    <strong id="draft_count_id">{{$data['tasks_in_draft_count_count']}}</strong>
                                    
                                </div>
                                <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 ">
                                    
                                    <span>Tasks</span><br>
                                    <span>In Draft</span>
                                
                                    
                                </div>
                            </div>

                        </a>

                    </div>
               

                @endif
                

                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 ">
                    <a class="nav-link" data-bs-toggle="tab" href="#awaiting_approval">
                        <div class="row {{ getLastLoginRoleId() == App\Models\Role::$Client ? 'selected ' : '' }} metrics-container">
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 num_task mt-2">
                                <strong id="awaiting_count_id">{{$data['tasks_in_awating_approval_count']}}</strong>
                                
                            </div>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 ">
                                <span>Tasks</span><br>
                                <span> {{getLastLoginRoleId() == App\Models\Role::$Freelancer ? 'Awaiting Approval' : 'Pending Approval'}}</span>
                            </div>
                            
                        </div>
                    </a>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 ">
                    <a class="nav-link" data-bs-toggle="tab" href="#approved_tasks">
                        <div class="row  metrics-container">
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 num_task mt-2">
                                <strong id="approved_count_id">{{$data['tasks_in_approved_count']}}</strong>
                                
                            </div>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 ">
                                <span>Tasks</span><br>
                                <span> Approved </span>
                            </div>
                            
                        </div>
                    </a>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 ">
                    <a class="nav-link" data-bs-toggle="tab" href="#in_progress">
                        <div class="row metrics-container">
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 num_task mt-2 ">
                                <strong id="in_progress_count_id">{{$data['tasks_in_progress_count']}}</strong>
                                 
                            </div>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 ">
                                <span>Tasks</span><br>
                                <span> In Progress</span>
                            </div>
                                
                        </div>
                    </a>
                </div>

                

                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 ">
                    <a class="nav-link" data-bs-toggle="tab" href="#completed">
                        <div class="row metrics-container">
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 num_task mt-2 ">
                                <strong id="completed_count_id">{{$data['tasks_in_completed_count']}}</strong>
                                
                            </div>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 ">
                                <span>Tasks</span><br>
                                <span>Completed</span>
                            </div>
                            
                        </div>
                    </a>
                </div>

               
                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 col-xs-12 total-day-hours mt-2">
                    
                    <div class="mp">
                        <span>Day Total</span><br>
                        <strong class="wh" id="total_day_hours_id">{{$data['total_day_hours']}}</strong> <span class="mid-line"></span> <strong class="wh" id="total_day_amount_id">{{$data['total_day_hours_dollars']}}</strong>
                    </div>
                    

                </div>


            </div>
            <div class="tab-content mt-3">
                
                {{-- In Draft Table --}}
                @if ( getLastLoginRoleId() == App\Models\Role::$Freelancer )
                    <div class="tab-pane active" id="in_draft">
                        
                        <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="in_draft_hours_listing_id">
                                        
                            <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                                <tr>
                                    <th style="width: 10%" class="tl" >@lang('Task ID')</th>
                                    <th style="width: 10%" class="tl" >@lang('Task Title')</th>
                                    <th>@lang('Est. Start Time')</th>
                                    <th>@lang('Est. End Time')</th>
                                    <th>@lang('Est. Total Hrs')</th>
                                    <th>@lang('Est. Amount')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>


                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @foreach ($data['tasks_in_draft'] as $item)
                                    <tr id="{{$item->uuid}}">

                                        <td class="tl"  {!! getLastLoginRoleId() == App\Models\Role::$Freelancer ? "onclick='editTask(\"$item->uuid\",true)'" : "onclick='editTask(\"$item->uuid\",false)'" !!}> 
                                            <svg width="23" height="16" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4998 22.9584C9.2336 22.9584 7.01825 22.2863 5.13393 21.0273C3.24962 19.7682 1.78098 17.9787 0.913723 15.8849C0.0464687 13.7912 -0.180445 11.4873 0.261678 9.26462C0.7038 7.04192 1.7951 5.00024 3.39758 3.39776C5.00005 1.79528 7.04173 0.703983 9.26443 0.261861C11.4871 -0.180262 13.791 0.0466518 15.8848 0.913906C17.9785 1.78116 19.768 3.2498 21.0271 5.13412C22.2862 7.01843 22.9582 9.23378 22.9582 11.5C22.9582 14.539 21.751 17.4534 19.6021 19.6023C17.4533 21.7511 14.5388 22.9584 11.4998 22.9584ZM11.4998 2.12503C9.64564 2.12503 7.83308 2.67486 6.29137 3.705C4.74966 4.73514 3.54804 6.19931 2.83847 7.91237C2.1289 9.62543 1.94324 11.5104 2.30498 13.329C2.66672 15.1476 3.5596 16.818 4.87072 18.1292C6.18183 19.4403 7.8523 20.3332 9.67087 20.6949C11.4894 21.0566 13.3744 20.871 15.0875 20.1614C16.8006 19.4518 18.2647 18.2502 19.2949 16.7085C20.325 15.1668 20.8748 13.3542 20.8748 11.5C20.8748 9.01362 19.8871 6.62905 18.129 4.8709C16.3708 3.11275 13.9862 2.12503 11.4998 2.12503ZM11.1978 15.3646L17.4478 9.11461L15.9686 7.63544L10.4582 13.1563L8.07276 10.7604L6.59359 12.2396L9.71859 15.3646C9.81543 15.4622 9.93064 15.5397 10.0576 15.5926C10.1845 15.6455 10.3207 15.6727 10.4582 15.6727C10.5957 15.6727 10.7318 15.6455 10.8588 15.5926C10.9857 15.5397 11.1009 15.4622 11.1978 15.3646Z" 
                                                fill="{{$item->status_id == App\Models\DayPlanning::$Completed ? '#219A21' : 'black'}}"/>
                                            </svg>
                                        {{$item->task_id ?? null}}

                                        </td>
                                        <td>{{$item->custom_description ?? null}}</td>

                                        <td>{{$item->custom_start_time}}</td>
                                        <td>{{$item->custom_end_time}}</td>
                                        <td>{{$item->custom_hours}}h</td>
                                        <td>{{$item->custom_task_amount}}</td>
                                        <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>
                                        <td>
                                            @if ($item->status_id == App\Models\DayPlanning::STATUSES['Draft'] && getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                                <form id="hiddenForm" method="GET" action="{{route('work-diary.day.planning.request.approval',$item->uuid)}}" >
                                                    @csrf
                                                    <input type="hidden" name="next_status" value="{{ App\Models\DayPlanning::STATUSES['AwaitingApproval']}}">
                                                    <button type="submit" class="bc" >
                                                        <span class="badge ra-color" >Submit For Approval</span>
                                                    </button>
                                                </form>
                                                
                                            @else
                                                <span class="badge {{$item->status->color}}" >{{$item->status->name}}</span>

                                        @endif
                                        </td>

                                    </tr>
                                @endforeach
                                
                            
                            </tbody>
                                
                        </table>

                    </div>
                @endif
               

                {{-- Awaiting Approval Table --}}
                <div class="tab-pane mt-c {{  getLastLoginRoleId() == App\Models\Role::$Client ? 'active ' : '' }}" id="awaiting_approval"> 
                    <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="awaiting_approvals_hours_listing_id">
                                    
                        <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 10%" class="tl" >@lang('Task ID')</th>
                                <th style="width: 10%" class="tl" >@lang('Task Title')</th>
                                <th>@lang('Est. Start Time')</th>
                                <th>@lang('Est. End Time')</th>
                                <th>@lang('Est. Total Hrs')</th>
                                <th>@lang('Est. Amount')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>


                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($data['tasks_in_awating_approval'] as $item)
                                <tr id="{{$item->uuid}}">

                                    <td class="tl"{!! getLastLoginRoleId() == App\Models\Role::$Freelancer ? "onclick='editTask(\"$item->uuid\",true)'" : "onclick='editTask(\"$item->uuid\",false)'" !!}>
                                        <svg width="23" height="16" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4998 22.9584C9.2336 22.9584 7.01825 22.2863 5.13393 21.0273C3.24962 19.7682 1.78098 17.9787 0.913723 15.8849C0.0464687 13.7912 -0.180445 11.4873 0.261678 9.26462C0.7038 7.04192 1.7951 5.00024 3.39758 3.39776C5.00005 1.79528 7.04173 0.703983 9.26443 0.261861C11.4871 -0.180262 13.791 0.0466518 15.8848 0.913906C17.9785 1.78116 19.768 3.2498 21.0271 5.13412C22.2862 7.01843 22.9582 9.23378 22.9582 11.5C22.9582 14.539 21.751 17.4534 19.6021 19.6023C17.4533 21.7511 14.5388 22.9584 11.4998 22.9584ZM11.4998 2.12503C9.64564 2.12503 7.83308 2.67486 6.29137 3.705C4.74966 4.73514 3.54804 6.19931 2.83847 7.91237C2.1289 9.62543 1.94324 11.5104 2.30498 13.329C2.66672 15.1476 3.5596 16.818 4.87072 18.1292C6.18183 19.4403 7.8523 20.3332 9.67087 20.6949C11.4894 21.0566 13.3744 20.871 15.0875 20.1614C16.8006 19.4518 18.2647 18.2502 19.2949 16.7085C20.325 15.1668 20.8748 13.3542 20.8748 11.5C20.8748 9.01362 19.8871 6.62905 18.129 4.8709C16.3708 3.11275 13.9862 2.12503 11.4998 2.12503ZM11.1978 15.3646L17.4478 9.11461L15.9686 7.63544L10.4582 13.1563L8.07276 10.7604L6.59359 12.2396L9.71859 15.3646C9.81543 15.4622 9.93064 15.5397 10.0576 15.5926C10.1845 15.6455 10.3207 15.6727 10.4582 15.6727C10.5957 15.6727 10.7318 15.6455 10.8588 15.5926C10.9857 15.5397 11.1009 15.4622 11.1978 15.3646Z" 
                                            fill="{{$item->status_id == App\Models\DayPlanning::$Completed ? '#219A21' : 'black'}}"/>
                                        </svg>
                                        {{$item->task_id ?? null}}
                                    </td>
                                    <td>{{$item->custom_description ?? null}}</td>

                                    <td>{{$item->custom_start_time}}</td>
                                    <td>{{$item->custom_end_time}}</td>
                                    <td>{{$item->custom_hours}}h</td>
                                    <td>{{$item->custom_task_amount}}</td>
                                    <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>
                                    <td>
                                        @if ($item->status_id == App\Models\DayPlanning::STATUSES['AwaitingApproval'] && getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                            <a href="#">
                                                <span class="badge ra-color" >Remind</span>
                                            </a>
                                        @else
                                            <form id="hiddenForm" method="GET" action="{{route('work-diary.day.planning.request.approval',$item->uuid)}}" >
                                                @csrf
                                                <input type="hidden" name="next_status" value="{{ App\Models\DayPlanning::STATUSES['Approved']}}">
                                                <button type="submit" class="bc" >
                                                    <span class="badge ra-color" >Approve</span>
                                                </button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                 {{-- Approved Tasks Table --}}
                 <div class="tab-pane mt-c" id="approved_tasks"> 
                    <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="in_approved_hours_listing_id">
                                    
                        <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 10%" class="tl" >@lang('Task ID')</th>
                                <th style="width: 10%" class="tl" >@lang('Task Title')</th>
                                <th>@lang('Est. Start Time')</th>
                                <th>@lang('Est. End Time')</th>
                                <th>@lang('Est. Total Hrs')</th>
                                <th>@lang('Est. Amount')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>

                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($data['tasks_in_approved'] as $item)
                                <tr>

                                    <td class="tl" onclick="editTask('{{$item->uuid}}', false)">
                                        <svg width="23" height="16" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4998 22.9584C9.2336 22.9584 7.01825 22.2863 5.13393 21.0273C3.24962 19.7682 1.78098 17.9787 0.913723 15.8849C0.0464687 13.7912 -0.180445 11.4873 0.261678 9.26462C0.7038 7.04192 1.7951 5.00024 3.39758 3.39776C5.00005 1.79528 7.04173 0.703983 9.26443 0.261861C11.4871 -0.180262 13.791 0.0466518 15.8848 0.913906C17.9785 1.78116 19.768 3.2498 21.0271 5.13412C22.2862 7.01843 22.9582 9.23378 22.9582 11.5C22.9582 14.539 21.751 17.4534 19.6021 19.6023C17.4533 21.7511 14.5388 22.9584 11.4998 22.9584ZM11.4998 2.12503C9.64564 2.12503 7.83308 2.67486 6.29137 3.705C4.74966 4.73514 3.54804 6.19931 2.83847 7.91237C2.1289 9.62543 1.94324 11.5104 2.30498 13.329C2.66672 15.1476 3.5596 16.818 4.87072 18.1292C6.18183 19.4403 7.8523 20.3332 9.67087 20.6949C11.4894 21.0566 13.3744 20.871 15.0875 20.1614C16.8006 19.4518 18.2647 18.2502 19.2949 16.7085C20.325 15.1668 20.8748 13.3542 20.8748 11.5C20.8748 9.01362 19.8871 6.62905 18.129 4.8709C16.3708 3.11275 13.9862 2.12503 11.4998 2.12503ZM11.1978 15.3646L17.4478 9.11461L15.9686 7.63544L10.4582 13.1563L8.07276 10.7604L6.59359 12.2396L9.71859 15.3646C9.81543 15.4622 9.93064 15.5397 10.0576 15.5926C10.1845 15.6455 10.3207 15.6727 10.4582 15.6727C10.5957 15.6727 10.7318 15.6455 10.8588 15.5926C10.9857 15.5397 11.1009 15.4622 11.1978 15.3646Z" 
                                            fill="{{$item->status_id == App\Models\DayPlanning::$Completed ? '#219A21' : 'black'}}"/>
                                        </svg>
                                        {{$item->task_id ?? null}}

                                    </td>
                                    <td>{{$item->custom_description ?? null}}</td>

                                    <td>{{$item->custom_start_time}}</td>
                                    <td>{{$item->custom_end_time}}</td>
                                    <td>{{$item->custom_hours}}h</td>
                                    <td>{{$item->custom_task_amount}}</td>
                                    <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>
                                    <td>
                                        @if ($item->status_id == App\Models\DayPlanning::STATUSES['Approved'] && getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                                <form id="hiddenForm" method="GET" action="{{route('work-diary.day.planning.request.approval',$item->uuid)}}" >
                                                    @csrf
                                                    <input type="hidden" name="next_status" value="{{ App\Models\DayPlanning::STATUSES['In_Progress']}}">
                                                    <button type="submit" class="bc" >
                                                        <span class="badge ra-color" >Start Task</span>
                                                    </button>
                                                </form>
                                                
                                            @else
                                                <span class="badge {{$item->status->color}}" >{{$item->status->name}}</span>

                                        @endif
                                    </td>
                                   

                                </tr>
                            @endforeach
                        </tbody>
                            
                    </table>
                </div>
                
                {{-- In Progress Table --}}
                <div class="tab-pane mt-c" id="in_progress"> 
                    <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="in_progress_hours_listing_id">
                                    
                        <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 10%" class="tl" >@lang('Task ID')</th>
                                <th style="width: 10%" class="tl" >@lang('Task Title')</th>
                                <th>@lang('Est. Start Time')</th>
                                <th>@lang('Est. End Time')</th>
                                <th>@lang('Est. Total Hrs')</th>
                                <th>@lang('Est. Amount')</th>
                                <th>@lang('Status')</th>
                                @if (getLastLoginRoleId() == App\Models\Role::$Freelancer)
                                    <th>@lang('Action')</th>
                                @endif


                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($data['tasks_in_progress'] as $item)
                                <tr>

                                    <td class="tl" onclick="editTask('{{$item->uuid}}', false)">
                                        <svg width="23" height="16" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4998 22.9584C9.2336 22.9584 7.01825 22.2863 5.13393 21.0273C3.24962 19.7682 1.78098 17.9787 0.913723 15.8849C0.0464687 13.7912 -0.180445 11.4873 0.261678 9.26462C0.7038 7.04192 1.7951 5.00024 3.39758 3.39776C5.00005 1.79528 7.04173 0.703983 9.26443 0.261861C11.4871 -0.180262 13.791 0.0466518 15.8848 0.913906C17.9785 1.78116 19.768 3.2498 21.0271 5.13412C22.2862 7.01843 22.9582 9.23378 22.9582 11.5C22.9582 14.539 21.751 17.4534 19.6021 19.6023C17.4533 21.7511 14.5388 22.9584 11.4998 22.9584ZM11.4998 2.12503C9.64564 2.12503 7.83308 2.67486 6.29137 3.705C4.74966 4.73514 3.54804 6.19931 2.83847 7.91237C2.1289 9.62543 1.94324 11.5104 2.30498 13.329C2.66672 15.1476 3.5596 16.818 4.87072 18.1292C6.18183 19.4403 7.8523 20.3332 9.67087 20.6949C11.4894 21.0566 13.3744 20.871 15.0875 20.1614C16.8006 19.4518 18.2647 18.2502 19.2949 16.7085C20.325 15.1668 20.8748 13.3542 20.8748 11.5C20.8748 9.01362 19.8871 6.62905 18.129 4.8709C16.3708 3.11275 13.9862 2.12503 11.4998 2.12503ZM11.1978 15.3646L17.4478 9.11461L15.9686 7.63544L10.4582 13.1563L8.07276 10.7604L6.59359 12.2396L9.71859 15.3646C9.81543 15.4622 9.93064 15.5397 10.0576 15.5926C10.1845 15.6455 10.3207 15.6727 10.4582 15.6727C10.5957 15.6727 10.7318 15.6455 10.8588 15.5926C10.9857 15.5397 11.1009 15.4622 11.1978 15.3646Z" 
                                            fill="{{$item->status_id == App\Models\DayPlanning::$Completed ? '#219A21' : 'black'}}"/>
                                        </svg>
                                        {{$item->task_id ?? null}}

                                    </td>
                                    <td>{{$item->custom_description ?? null}}</td>
                                    <td>{{$item->custom_start_time}}</td>
                                    <td>{{$item->custom_end_time}}</td>
                                    <td>{{$item->custom_hours}}h</td>
                                    <td>{{$item->custom_task_amount}}</td>
                                    <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>

                                    @if (getLastLoginRoleId() == App\Models\Role::$Freelancer)
                                        <td>
                                            @if ($item->status_id == App\Models\DayPlanning::STATUSES['In_Progress'] && getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                                <form id="hiddenForm" method="GET" action="{{route('work-diary.day.planning.request.approval',$item->uuid)}}" >
                                                    @csrf
                                                    <input type="hidden" name="next_status" value="{{ App\Models\DayPlanning::STATUSES['Completed']}}">
                                                    <button type="submit" >
                                                        <span class="badge ra-color" >Mark Completed</span>
                                                    </button>
                                                </form>
                                            @else
                                                <span class="badge {{$item->status->color}}" >{{$item->status->name}}</span>
                                            @endif
                                        </td>
                                    @endif
                                   

                                </tr>
                            @endforeach
                        </tbody>
                            
                    </table>
                </div>

                <input type="hidden" value="{{$data['selected_date']}}" id="active_date_id">
                <input type="hidden" name="lastlogin" value="{{getLastLoginRoleId()}}" id="last_login_role_id">
             
                {{-- Completed Table --}}
                <div class="tab-pane mt-c table-responsive" id="completed"> 
                    <table class="table text-center " style="border: 2px solid #e6eeee !important;" id="completed_hours_listing_id">
                                    
                        <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 10%" class="tl" >@lang('Task ID')</th>
                                <th style="width: 10%" class="tl" >@lang('Task Title')</th>
                                <th>@lang('Est. Start Time')</th>
                                <th>@lang('Est. End Time')</th>
                                <th>@lang('Est. Total Hrs')</th>
                                <th>@lang('Est. Amount')</th>
                                <th>@lang('Status')</th>
                               
                                <th>@lang('Action')</th>



                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($data['tasks_in_completed'] as $item)
                                
                                <tr>

                                    <td class="tl" onclick="editTask('{{$item->uuid}}', false)">
                                        <svg width="23" height="16" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4998 22.9584C9.2336 22.9584 7.01825 22.2863 5.13393 21.0273C3.24962 19.7682 1.78098 17.9787 0.913723 15.8849C0.0464687 13.7912 -0.180445 11.4873 0.261678 9.26462C0.7038 7.04192 1.7951 5.00024 3.39758 3.39776C5.00005 1.79528 7.04173 0.703983 9.26443 0.261861C11.4871 -0.180262 13.791 0.0466518 15.8848 0.913906C17.9785 1.78116 19.768 3.2498 21.0271 5.13412C22.2862 7.01843 22.9582 9.23378 22.9582 11.5C22.9582 14.539 21.751 17.4534 19.6021 19.6023C17.4533 21.7511 14.5388 22.9584 11.4998 22.9584ZM11.4998 2.12503C9.64564 2.12503 7.83308 2.67486 6.29137 3.705C4.74966 4.73514 3.54804 6.19931 2.83847 7.91237C2.1289 9.62543 1.94324 11.5104 2.30498 13.329C2.66672 15.1476 3.5596 16.818 4.87072 18.1292C6.18183 19.4403 7.8523 20.3332 9.67087 20.6949C11.4894 21.0566 13.3744 20.871 15.0875 20.1614C16.8006 19.4518 18.2647 18.2502 19.2949 16.7085C20.325 15.1668 20.8748 13.3542 20.8748 11.5C20.8748 9.01362 19.8871 6.62905 18.129 4.8709C16.3708 3.11275 13.9862 2.12503 11.4998 2.12503ZM11.1978 15.3646L17.4478 9.11461L15.9686 7.63544L10.4582 13.1563L8.07276 10.7604L6.59359 12.2396L9.71859 15.3646C9.81543 15.4622 9.93064 15.5397 10.0576 15.5926C10.1845 15.6455 10.3207 15.6727 10.4582 15.6727C10.5957 15.6727 10.7318 15.6455 10.8588 15.5926C10.9857 15.5397 11.1009 15.4622 11.1978 15.3646Z" fill="{{$item->status_id == App\Models\DayPlanning::$Completed ? '#219A21' : 'black'}}"/>
                                        </svg>
                                        {{$item->task_id ?? null}}
                                    </td>
                                    <td>{{$item->custom_description ?? null}}</td>

                                    <td>{{$item->custom_start_time}}</td>
                                    <td>{{$item->custom_end_time}}</td>
                                    <td>{{$item->custom_hours}}h</td>
                                    <td>{{$item->custom_task_amount}}</td>
                                    <td> <span class="status-btn {{$item->status->color}}">{{$item->status->name}}</span></td>
                                    <td>
                                        @if ($item->status_id == App\Models\DayPlanning::STATUSES['Completed'] && getLastLoginRoleId()==App\Models\Role::$Freelancer )
                                            <a href="{{$item->is_payment_requested == false ? route('work-diary.day.planning.request.task.payment',$item->uuid) : '#'}}">
                                                <span class="badge ra-color" >{{ $item->is_payment_approved == false ? ($item->is_payment_requested ? 'Payment Requested' : 'Request Payment') : 'Payment Approved'}}</span>
                                            </a>
                                        @else
                                            <a href="{{ ($item->is_payment_requested && $item->is_payment_approved ==false )? route('work-diary.day.planning.approve.task.payment',$item->uuid) : '#' }}">
                                                <span class="badge ra-color" >{{ ( $item->is_payment_requested &&  $item->is_payment_approved ==false) ? 'Approve' : ($item->is_payment_approved ? ' Payment Approved ' : '') }}</span>
                                            </a>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                            
                    </table>
                </div>

            </div>

        </div>
    </div>
</section>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel">@lang('Day Planning Task Delete Confirmation')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
               
            <div class="modal-body">
                <p>@lang('Are you sure to delete this task')</p>
            </div>

            <div class="modal-footer text-right">
                <button type="button" class="btn btn--info btn-rounded text-white" data-bs-dismiss="modal">@lang('Close')</button>
                <button type="button" class="btn btn--danger btn-rounded text-white" id="confirmation_btn">@lang('Confirm')</button>
            </div>
        </div>
                
    </div>
</div>

@include('templates.basic.user.seller.work_diary.Models.add_task')

@endsection
@push('script')

<script>

        var edited_task="";
        var add_task= "Add Task";
        var update_task= "Update Task";
        var active_task_uuid='';


        var STATUSES = {
            Draft: 40,
            In_Progress: 41,
            AwaitingApproval: 42,
            ResendForApproval: 43,
            Approved: 44,
            Rejected: 45,
            Completed: 46,

        };

        $(document).ready(function() {
            $('.nav-link').on('click', function() {
                $('.nav-link').find('div').removeClass('selected');
                $(this).find('div').first().addClass('selected');
                var target = $(this).attr('href');
                $('.tab-pane').removeClass('active');
                $(target).addClass('active');
            });
            var today = new Date().toISOString().split('T')[0];
            $("#planning_date").prop("min", today);
        });

        function formattedDate(currentDate){
            const year = currentDate.getFullYear();
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');
            const day = String(currentDate.getDate()).padStart(2, '0');
            var setmodel_date = `${year}-${month}-${day}`;
            return setmodel_date;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var datePicker = document.getElementById("datepicker");
            var active_date=$('#active_date_id').val();
            var currentDate = new Date(active_date);

            var flatpickrInstance = flatpickr(datePicker, {
            dateFormat: "D, j M", // Set the desired date format
            defaultDate: currentDate,
            onClose: function(selectedDates) {
                datePicker.value = flatpickrInstance.formatDate(selectedDates[0], "D, j M");
            }
            });

            $('#planning_date').val(formattedDate(currentDate));

        });

        function showDate(action) {

            var datePicker = document.getElementById("datepicker");
            var selectedDate = flatpickr.parseDate(datePicker.value, "D, j M");
            var currentDate = new Date();

            uuid=$('#contract_uuid').val();

            if (action === 'previous') {
                currentDate.setDate(selectedDate.getDate() - 1);

            } else if (action === 'next') {
                currentDate.setDate(selectedDate.getDate() + 1);

            } else {
                currentDate = new Date(); // Today's date

            }
            
            getDayPlanning(uuid,currentDate,true);
            datePicker._flatpickr.setDate(currentDate, false, "D, j M");
            // $('#planning_date').val(formattedDate(currentDate));

            
        }
        
        
        function deleteDayPlanning(uuid)
        {
            let route = "{{ route('work-diary.day.planning.delete', ':uuid') }}".replace(':uuid', uuid);

            $.ajax({
                type:"GET",
                url:route,
                data: {},
                success:function(data){
                    
                    if(data.error){
                        displayAlertMessage(data.error);
                    
                    }
                    else{
                        $('#'+uuid).remove();
                        console.log(data.success);;
                        displaySuccessMessage(data.success);
                    }
                }
            });  
        }

        function addTableData(table_id,data){

            let form='';
            let last_login_id=$('#last_login_role_id').val();
            console.log(data);
            $(table_id).empty();
            data.forEach(object => {
                let edit_event='';

            if(table_id == '#in_draft_hours_listing_id tbody'){
                    form='';
                    if (object.status.slug == 'draft' && last_login_id == 1){
                        var status_action_url = "{{ route('work-diary.day.planning.request.approval', ':uuid') }}".replace(':uuid', object.uuid);
                        edit_event=`onclick=editTask('${object.uuid}',true)`;

                        form=`<form id="hiddenForm" method="GET" action="${status_action_url}" >
                            @csrf
                            <input type="hidden" name="next_status" value="${STATUSES['AwaitingApproval']}">
                            <button type="submit" class="bc">
                                <span class="badge ra-color" >Submit For Approval</span>
                            </button>
                        </form>`;
                    }                           
                    else{
                        edit_event=`onclick=editTask('${object.uuid}',false)`;

                        form=`<span class="badge ${object.status.color}" >${object.status.name}</span>`
                    }
            } 
            else if(table_id == '#in_approved_hours_listing_id tbody'){
                    form='';
                    edit_event=`onclick=editTask('${object.uuid}',false)`;

                    if (object.status.slug == 'approved' && last_login_id == 1){
                        var status_action_url = "{{ route('work-diary.day.planning.request.approval', ':uuid') }}".replace(':uuid', object.uuid);

                        form=`<form id="hiddenForm" method="GET" action="${status_action_url}" >
                            @csrf
                            <input type="hidden" name="next_status" value="${STATUSES['In_Progress']}">
                            <button type="submit" class="bc">
                                <span class="badge ra-color" >Start Task</span>
                            </button>
                        </form>`;
                    }                           
                    else{
                        form=`<span class="badge ${object.status.color}" >${object.status.name}</span>`
                    }
            }       
            else if( table_id=='#in_progress_hours_listing_id tbody'){
                edit_event=`onclick=editTask('${object.uuid}',false)`;

                if (object.status.slug == 'in_progress' && last_login_id == 1){

                        var status_action_url = "{{ route('work-diary.day.planning.request.approval', ':uuid') }}".replace(':uuid', object.uuid);

                        form=`<form id="hiddenForm" method="GET" action="${status_action_url}" >
                            @csrf
                            <input type="hidden" name="next_status" value="${STATUSES['Completed']}">
                            <button type="submit" >
                                <span class="badge ra-color" >Mark Completed</span>
                            </button>
                        </form>`;
                }                           
                else{
                    form=`<span class="badge ${object.status.color}" >${object.status.name}</span>`
                }

            }
            else if( table_id=='#awaiting_approvals_hours_listing_id tbody'){
                
                var status_action_url = "{{ route('work-diary.day.planning.request.approval', ':uuid') }}".replace(':uuid', object.uuid);

                if (object.status.slug == 'awaiting_approval' && last_login_id == 1){
                        
                        edit_event=`onclick=editTask('${object.uuid}',true)`;
                        form=`<a href="#">
                                    <span class="badge ra-color" >Remind</span>
                                </a>`;

                    }                           
                    else{

                        edit_event=`onclick=editTask('${object.uuid}',false)`;
                        form=`<form id="hiddenForm" method="GET" action="${status_action_url}" >
                            @csrf
                            <input type="hidden" name="next_status" value="${STATUSES['Approved']}">
                            <button type="submit" class="bc">
                                <span class="badge ra-color" >Approve</span>
                            </button>
                        </form>`;

                    }
                
            }
            else{
                edit_event=`onclick=editTask('${object.uuid}',false)`;

                if (object.status.slug == 'completed' && last_login_id == 1){
                        var status_action_url = object.is_payment_requested == false ? "{{ route('work-diary.day.planning.request.task.payment', ':uuid') }}".replace(':uuid', object.uuid) : '#';

                        form=`<a href="${status_action_url}">
                                    <span class="badge ra-color" >${ object.is_payment_approved==false ? (object.is_payment_requested ? 'Payment Requested' : 'Request Payment') :'Payment Apprvoed' }</span>
                                </a>`;
                    }                           
                    else{

                        var status_action_url = (object.is_payment_requested && object.is_payment_approved ==false) ? "{{ route('work-diary.day.planning.approve.task.payment', ':uuid') }}".replace(':uuid', object.uuid) : '#';
                        
                        form=`<a href="${status_action_url}">
                                    <span class="badge ra-color" >${ (object.is_payment_requested && object.is_payment_approved == false ) ? 'Approve' : (object.is_payment_approved ? 'Payment Approved' : '') }</span>
                             </a>`;
                    }

            }
            $(table_id).append(
                `<tr id="${object.uuid}"> 
                    <td class="tl" ${edit_event}>
                        <svg width="23" height="16" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path 
                            d="M11.4998 22.9584C9.2336 22.9584 7.01825 22.2863 5.13393 21.0273C3.24962 19.7682 1.78098 17.9787 0.913723 15.8849C0.0464687 13.7912 -0.180445 11.4873 0.261678 9.26462C0.7038 7.04192 1.7951 5.00024 3.39758 3.39776C5.00005 1.79528 7.04173 0.703983 9.26443 0.261861C11.4871 -0.180262 13.791 0.0466518 15.8848 0.913906C17.9785 1.78116 19.768 3.2498 21.0271 5.13412C22.2862 7.01843 22.9582 9.23378 22.9582 11.5C22.9582 14.539 21.751 17.4534 19.6021 19.6023C17.4533 21.7511 14.5388 22.9584 11.4998 22.9584ZM11.4998 2.12503C9.64564 2.12503 7.83308 2.67486 6.29137 3.705C4.74966 4.73514 3.54804 6.19931 2.83847 7.91237C2.1289 9.62543 1.94324 11.5104 2.30498 13.329C2.66672 15.1476 3.5596 16.818 4.87072 18.1292C6.18183 19.4403 7.8523 20.3332 9.67087 20.6949C11.4894 21.0566 13.3744 20.871 15.0875 20.1614C16.8006 19.4518 18.2647 18.2502 19.2949 16.7085C20.325 15.1668 20.8748 13.3542 20.8748 11.5C20.8748 9.01362 19.8871 6.62905 18.129 4.8709C16.3708 3.11275 13.9862 2.12503 11.4998 2.12503ZM11.1978 15.3646L17.4478 9.11461L15.9686 7.63544L10.4582 13.1563L8.07276 10.7604L6.59359 12.2396L9.71859 15.3646C9.81543 15.4622 9.93064 15.5397 10.0576 15.5926C10.1845 15.6455 10.3207 15.6727 10.4582 15.6727C10.5957 15.6727 10.7318 15.6455 10.8588 15.5926C10.9857 15.5397 11.1009 15.4622 11.1978 15.3646Z" 
                            fill="${object.status_id == 46 ? '#219A21' : 'black'}" />
                        </svg>
                        ${object.task_id}
                    </td>
                    <td>${object.custom_description}</td>
                    <td>${object.custom_start_time}</td> 
                    <td>${object.custom_end_time}</td> 
                    <td>${object.custom_hours}h</td> 
                    <td>${object.custom_task_amount}</td> 
                    <td><span class="status-btn ${object.status.color}">${object.status.name}</span></td> 
                    <td>${form}</td> 
                    </tr>`

            );

            });

        }

        function addData(data){

            $('#draft_count_id').html(data.tasks_in_draft_count_count);
            $('#in_progress_count_id').html(data.tasks_in_progress_count);
            $('#awaiting_count_id').html(data.tasks_in_awating_approval_count);
            $('#completed_count_id').html(data.tasks_in_completed_count);
            $('#approved_count_id').html(data.tasks_in_approved_count);


            $('#total_day_hours_id').html(data.total_day_hours);
            $('#total_day_amount_id').html(data.total_day_hours_dollars);

            const in_drft_tasks=data.tasks_in_draft;   
            const in_progress_tasks=data.tasks_in_progress;   
            const in_awaiting_approval_tasks=data.tasks_in_awating_approval;   
            const completed_tasks=data.tasks_in_completed;
            const approved_tasks=data.tasks_in_approved;

            
            addTableData('#in_draft_hours_listing_id tbody',in_drft_tasks);
            addTableData('#in_progress_hours_listing_id tbody',in_progress_tasks);
            addTableData('#awaiting_approvals_hours_listing_id tbody',in_awaiting_approval_tasks);
            addTableData('#completed_hours_listing_id tbody',completed_tasks);
            addTableData('#in_approved_hours_listing_id tbody',approved_tasks);

        }

        function getDayPlanning(contract_uuid,currentDate,is_custom=true)
        {
            var formatted_date = null;

            if (is_custom) {
                const year = currentDate.getFullYear();
                const month = String(currentDate.getMonth() + 1).padStart(2, '0');
                const day = String(currentDate.getDate()).padStart(2, '0');
                formatted_date = `${year}-${month}-${day}`;
            }
            else{

                formatted_date=currentDate;
            }
           

            let route = "{{ route('work-diary.contract.day.tasks', ':uuid') }}".replace(':uuid', contract_uuid);
            $.ajax({
                type:"GET",
                url:route,
                data: {
                    'day' : formatted_date
                },
                success:function(data){
                    
                    if(data.error){
                        console.log(data.error);
                        displayAlertMessage(data.error);
                    
                    }
                    else{
                        console.log(data.success);
                        addData(data.data);
                    }
                }
            });  
        }

        $('#confirmation_btn').on('click', function () {

            deleteDayPlanningTask();
            var modal = $('#confirmationModal');
            modal.modal('hide');

        });

        function deleteDayPlanningTask()
        {
            let route = "{{ route('work-diary.task.delete', ':uuid') }}".replace(':uuid', active_task_uuid);
            $.ajax({
                type:"GET",
                url:route,
                data: {},
                success:function(data){
                    
                    if(data.error){
                        displayAlertMessage(data.error);
                    }
                    else{
                    
                        $('#'+active_task_uuid).remove();
                        displaySuccessMessage(data.success);
                        active_task_uuid='';
                        var currentDate = new Date(data.day);
                        getDayPlanning(data.uuid,data.day,false);             
                        
                    }
                }
            });  
        }

        $(document).on('click', '.edit_btn', function() {
            var taskId = $(this).data('id'); 
            $('#editModal').find('#taskTitle').val(taskData.title);
            $('#editModal').find('#taskDate').val(taskData.date);
            $('#editModal').modal('show');

        });

        function loadDefaultFiles(attachments){

            $('#file_name_div').empty();
            already_uploaded_files=attachments;
            $('#already_uploaded_files_id').val(JSON.stringify(already_uploaded_files));
            for (let index = 0; index < already_uploaded_files.length; index++) {
                file=already_uploaded_files[index];
                $('#file_name_div').append('<li class="list-group-item d-flex justify-content-between align-items-center" id="file_detail_'+file.name.replace(/[^\w]/gi, "_")+'"><a href="'+file.url+'" download><i class="fa fa-download " style="color:green;margin-right:14px !important"></i>'+file.uploaded_name+'</a><span class="badge badge-primary badge-pill delete-btn action-btn"  id="'+file.name.replace(/\./g,'_')+'"  data-id="'+file.name+'"><i class="fa fa-trash" style="color:red" ></i></span>'+
                    '</li>');
            }

        }

        function editTask(task_uuid,is_edit){

            active_task_uuid=task_uuid;
            $('#add_task_model_id_title').html(update_task);
            $('#delete_task_btn_id').show();
            let route = "{{ route('work-diary.contract.day.task', ':uuid') }}".replace(':uuid', task_uuid);
            $.ajax({
                type:"GET",
                url:route,
                success:function(data){
                    
                    if(data.error){
                        displayAlertMessage(data.error);
                    }
                    else{

                        task=data.task;
                        $('#add_task_model_id').find('#planning_date').val(moment(task.day.planning_date).format('YYYY-MM-DD'));
                        $('#add_task_model_id').find('#start_time').val(task.start_time);
                        $('#add_task_model_id').find('#end_time').val(task.end_time);
                        $('#add_task_model_id').find('#contract_id').val(task.contract_id);
                        $('#add_task_model_id').find('#description_id').val(task.description);
                        $('#add_task_model_id').find('#task_id').val(task.id);
                        $('#add_task_model_id').modal('show');
                        loadDefaultFiles(task.attachments);
                        
                        if(is_edit){
                            $('.action-btn').prop('disabled', false).show();
                            $('form :input').prop('readonly', false).prop('disabled', false);
                            $('#files_upload_input_div_id').show();


                        }
                        else{
                            $('.action-btn').prop('disabled', true).hide();
                            $('form :input:not(.btn-cancel,.bc)').prop('readonly', true).prop('disabled', true);
                            $('#files_upload_input_div_id').hide();
                        }
                    }
                }
            });  

           

        }

    </script>

@endpush

@push('style')
    <style>
        .date-picker-icon{
            margin-left: -57px !important;
        }
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
    .tl{
        text-align: left !important;
    }
    .bc{
        background: transparent;
    }
    .ra-color{
        background: #7F007F
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
    .offset-md-5 {
        margin-left: 38.666667% !important;
    }

    @media only screen and (max-width:683px){
        .date-picker-icon{
            margin-left: -34px !important;
        }
        .table-header {
            background: #EFF4F4;
            border: 1px solid #D0E2E2;
            font-size: 8px !important;;
        }
        .f-container{
            display: none !important;
        }
        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: auto !important;
        }
        .offset-md-5 {
            margin-left: 19.666667% !important;
        }
        .mobile-view-search{
            margin-left: -43px !important;
        }
        .text-center {
            text-align: center!important;
            font-size: 8px !important;
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
            font-size: 12px !important;
            background: #219A21;
            border-radius: 20px;
            position: relative;
        }
        .search {
            background: #FFFFFF;
            border: 1px solid #CBDFDF;
            border-radius: 6px;
            width: 200px !important;
        }
        .today-buttons{
            margin-top: -57px !important;
            margin-left: 184px !important;
            width: 223px !important;
        }
        .total-day-hours {
            background: #FFF4FF;
            border: 1px dashed #A394A3;
            border-radius: 6px;
            height: 61px;
            width: 380px !important;;
            margin-left: 16px !important;;
        }
        .navbar-brand {
            font-size: 0.7rem !important;
            font-weight: 800 !important;
        }
        .metrics-container {
            /* background: #D0E2E2 !important; */
            border-radius: 6px !important;
            height: 100px !important; 
            padding-top: 7px !important;
        }
    }
   
</style>
@endpush