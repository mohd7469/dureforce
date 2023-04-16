@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections zero_top_padding">
    <div class="container-fluid">
        <div class="section-wrapper ">
            <div class="row justify-content-center mb-30-none">
                @include($activeTemplate . 'partials.seller_sidebar')
                <div class="col-xl-9 col-lg-12 mb-30 ">
                    <div class="text-right mt-2 mb-2">
                        <button class="submit-btn" data-bs-toggle="modal" data-bs-target="#add_task_model_id">Add Task</button>
                    </div>
                    <div class="table-responsive">

                        <table class="table text-center " style="border: 2px solid #e6eeee !important" id="job-listing">
                                    
                            <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 20%">@lang('Job Title')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Start Time')</th>
                                <th>@lang('End Time')</th>
                                <th>@lang('Action')</th>

                            </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse($work_diary_tasks as $key => $task)
                                    <tr class="{{ $key% 2==1 ? 'info-row' : ''}}" id="{{$task->uuid}}">
                                        
                                        <td data-label="@lang('start time')">
                                            {{ $task->job->title }}
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

                                 
                                        <td data-label="Action">
                                            
                                            {{-- <a href="#">
                                                <i class="fa fa-eye icon-color" style="margin-right:7px; "></i>
                                            </a> --}}
                                            
                                            @if (getLastLoginRoleId()==App\Models\Role::$Freelancer && IsDayPlanningNotApproved($day_planning))
                                                <a href="#" >
                                                    <i class="fa fa-edit icon-color" style="margin-right:7px; "></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete_btn" data-id="{{$task->uuid}}" data-bs-toggle="modal" data-bs-target="#cancelModal">
                                                    <i class="fa fa-trash icon-color" style="margin-right:7px; "></i>
                                                </a>
                                            @endif

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