@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections zero_top_padding">
    <div class="container-fluid">
        <div class="section-wrapper ">
            <div class="row justify-content-center mb-30-none">
                @include('templates.basic.user.seller.work_diary.side_bar')

                <div class="col-xl-9 col-lg-12 mb-30 ">
                    
                    @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                        <div class="text-right mt-2 mb-2">
                            <button class="submit-btn" data-bs-toggle="modal" data-bs-target="#add_task_model_id">Add Task</button>
                        </div>
                    @endif
                   
                    <div class="table-responsive">

                        <table class="table text-center " style="border: 2px solid #e6eeee !important" id="job-listing">
                                    
                            <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 20%">@lang('Job Title')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Total Day Hours')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>

                            </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse($day_plannings as $key => $day_planning)
                                    <tr class="{{ $key% 2==1 ? 'info-row' : ''}}" id="{{$day_planning->uuid}}">
                                        
                                        <td data-label="@lang('start time')">
                                            {{ $day_planning->job->title }}
                                        </td>

                                        
                                        <td data-label="@lang('date')">
                                            {{ getFormattedDate($day_planning->planning_date,'d-m-Y') }}
                                        </td>

                                        <td>
                                            {{$day_planning->total_day_hours}}
                                        </td>  


                                        <td>
                                            <span class="badge {{$day_planning->status->color}}" >{{$day_planning->status->name}}</span>
                                        </td>
                                                                        
                                        <td data-label="Action">
                                            
                                            <a href="{{route('work-diary.detail',$day_planning->uuid)}}">
                                                <i class="fa fa-eye icon-color" style="margin-right:7px; "></i>
                                            </a>
                                            
                                            @if (getLastLoginRoleId()==App\Models\Role::$Freelancer && IsDayPlanningNotApproved($day_planning))
                                                <a href="javascript:void(0)" class="delete_btn" data-id="{{$day_planning->uuid}}" data-bs-toggle="modal" data-bs-target="#cancelModal">
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
                    
                    {{$day_plannings->links()}}
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
                <h4 class="modal-title" id="ModalLabel">@lang('Day Planning Delete Confirmation')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
               
            <input type="hidden" name="day_planning_id" id="day_planning_id">
            <div class="modal-body">
                <p>@lang('Are you sure to delete this day planning')</p>
            </div>

            <div class="modal-footer">
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

    $('.delete_btn').on('click', function () {

        var modal = $('#confirmationModal');
        modal.find('input[name=day_planning_id]').val($(this).data('id'));
        modal.modal('show');

    });

    $('#confirmation_btn').on('click', function () {

        uuid=$('#day_planning_id').val();
        deleteDayPlanning(uuid);
        var modal = $('#confirmationModal');
        modal.modal('hide');

    });

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