@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections zero_top_padding">
    <div class="container-fluid">

        <div class="section-wrapper ">

            <div class="row justify-content-center mb-30-none">
                @include('templates.basic.user.seller.work_diary.side_bar')
                <div class="col-xl-9 col-lg-12 mb-30 ">
                    
                    @if (getLastLoginRoleId()==App\Models\Role::$Freelancer && !isApproved($day_planning))
                        <div class="text-right mt-2 mb-2">
                            <button class="submit-btn" data-bs-toggle="modal" data-bs-target="#add_task_model_id">Add Task</button>
                        </div>
                    @endif

                    <div class="col-md-12  col-lg-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">

                            <table class="table " style="border: 2px solid #e6eeee !important" id="job-listing">
                                        
                                <thead class="table-header" style="border-bottom:2px solid #e6eeee !important">
                                <tr>
                                    <th style="width: 20%">@lang('Job Title')</th>
                                    <th style="width: 20%">@lang('Description')</th>

                                    <th>@lang('Date')</th>
                                    <th>@lang('Start Time')</th>
                                    <th>@lang('End Time')</th>
                                    <th>@lang('Attachments')</th>
                                    <th>@lang('Action')</th>
    
                                </tr>
                                </thead>
                                <tbody >
                                    @forelse($work_diary_tasks as $key => $task)
                                        <tr class="{{ $key% 2==1 ? 'info-row' : ''}}" id="{{$task->uuid}}">
                                            
                                            <td data-label="@lang('title')">
                                                {{ $task->job->title }}
                                            </td>

                                            <td data-label="@lang('description')">
                                                {{ $task->description }}
                                            </td>
    
                                            
                                            <td data-label="@lang('date')">
                                                {{ getFormattedDate($task->day->planning_date,'d-m-Y') }}
                                            </td>
    
                                            <td>
                                                {{$task->start_time}}
                                            </td>  
    
                                            <td>
                                                {{$task->end_time}}
                                            </td>  
                                            <td> 
                                                
                                                @foreach($task->attachments as $attachment)
                                                    <a href="{{ $attachment->url }}" target="_blank">
                                                        {{ $attachment->uploaded_name }}
                                                    </a>
                                                    <br>
                                                @endforeach
                                            </td>
                                                <td data-label="Action">
                                                    
                                                    
                                                    
                                                    @if (getLastLoginRoleId()==App\Models\Role::$Freelancer && IsDayPlanningNotApproved($day_planning))
                                                        <a href="#"  onclick="editTask({{$task}})">
                                                            <i class="fa fa-edit icon-color" style="margin-right:7px; "></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="delete_btn" data-id="{{$task->uuid}}" data-bs-toggle="modal" data-bs-target="#cancelModal">
                                                            <i class="fa fa-trash icon-color" style="margin-right:7px; "></i>
                                                        </a>
                                                        
                                                    @endif
                                                    <a href="{{route('work-diary.day.planning.task.comments',$task->uuid)}}" class="task_comments_btn" >
                                                        <i class="fa fa-tasks icon-color" style="margin-right:7px; "></i>
                                                    </a>
    
                                                </td>
                                            
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%">{{ __($emptyMessage) }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
    
                            </table>
    
                        </div>
                        @if ($work_diary_tasks->isNotEmpty())
                            {{$work_diary_tasks->links()}}
                        @endif
                    </div>

                    @if ( isApprovalRequired($day_planning) && getLastLoginRoleId()==App\Models\Role::$Client)
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 card text-left" >
                                
                            <div class="card-header" style="background-color:#EFF4F4">
                                <strong>{{$day_planning->status->name}}</strong>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Approval Has been request for (<b>{{$day_planning->contract->contract_title}} </b>) and day planning of (<b>{{$day_planning->planning_date}} </b>) </h5>
                                
                                <form action="{{route('buyer.day.planning.status.update')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$day_planning->id}}" name="day_planning_id">   
                                    <div class="form-group text-left">
                                        <label for="exampleFormControlTextarea1">Comment</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" style="min-height:136px !important;" name="comment">{{ old('comment')}}</textarea>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" name="approval_status_code"  value="{{ App\Models\DayPlanning::STATUSES['Rejected']}}"  class="btn btn-danger">Reject</button>

                                        <button type="submit" name="approval_status_code"  value="{{ App\Models\DayPlanning::STATUSES['Approved']}}"  class="btn btn-success">Accept</button>
            
                                    </div>

                                </form>

                            </div>
                            
                        
                        </div>
                    @endif
                    
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
               
            <input type="hidden" name="day_planning_task_id" id="day_planning_task_id">
            <div class="modal-body">
                <p>@lang('Are you sure to delete this task')</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn--info btn-rounded text-white" data-bs-dismiss="modal">@lang('Close')</button>
                <button type="button" class="btn btn--danger btn-rounded text-white" id="confirmation_btn">@lang('Confirm')</button>
            </div>
        </div>
                
    </div>
</div>

@include('templates.basic.user.seller.work_diary.Models.add_task',['contract_id' => $contract->id,'day_planning_day' => $day_planning->planning_date])

@endsection



@push('script')

<script>

    $('.delete_btn').on('click', function () {

        var modal = $('#confirmationModal');
        modal.find('input[name=day_planning_task_id]').val($(this).data('id'));
        modal.modal('show');

    });

  
    $('#confirmation_btn').on('click', function () {

        uuid=$('#day_planning_task_id').val();
        deleteDayPlanningTask(uuid);
        var modal = $('#confirmationModal');
        modal.modal('hide');

    });

    function deleteDayPlanningTask(uuid)
    {
        let route = "{{ route('work-diary.task.delete', ':uuid') }}".replace(':uuid', uuid);
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
                    displaySuccessMessage(data.success);
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
            $('#file_name_div').append('<li class="list-group-item d-flex justify-content-between align-items-center" id="file_detail_'+file.name.replace(/[^\w]/gi, "_")+'">'+file.uploaded_name+'<span class="badge badge-primary badge-pill delete-btn"  id="'+file.name.replace(/\./g,'_')+'"  data-id="'+file.name+'"><i class="fa fa-trash" style="color:red" ></i></span></li>');
        }

    }

    function editTask(task){
        $('#add_task_model_id').find('#planning_date').val(moment(task.day.planning_date).format('YYYY-MM-DD'));
        $('#timezone_id').val(task.timezone).trigger('change');
        $('#add_task_model_id').find('#start_time').val(task.start_time);
        $('#add_task_model_id').find('#end_time').val(task.end_time);
        $('#add_task_model_id').find('#contract_id').val(task.contract_id);
        $('#add_task_model_id').find('#description_id').val(task.description);
        $('#add_task_model_id').find('#task_id').val(task.id);

        $('#add_task_model_id').modal('show');
        loadDefaultFiles(task.attachments);

    }

    $(document).on('click', '#cancel_task_btn_id', function(e) {
        $('#timezone_id').val('').trigger('change');
        $('#add_task_model_id').find('#start_time').val('');
        $('#add_task_model_id').find('#end_time').val('');
        $('#add_task_model_id').find('#description_id').val('');
        $('#add_task_model_id').find('#task_id').val('');
        already_uploaded_files=[];

        loadDefaultFiles(already_uploaded_files);

    });

</script>

@endpush

@push('style')
    <style>
    .btn-save {
        background-color: #7f007f;
        border-radius: 5px;
        border: 1px solid #7f007f;
        color: #fff;
        padding: 6px 2px;
        font-size: 13px;
        width: 5rem !important;
    }
    .btn-cancel {
        color:  #7F007F ;
        padding: 6px 2px;
        font-size: 13px;
        width: 5rem !important;
    }
    </style>
@endpush