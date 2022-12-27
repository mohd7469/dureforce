@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections zero_top_padding">
    <div class="container-fluid">
        <div class="section-wrapper ">
            <div class="row justify-content-center mb-30-none">
                @include($activeTemplate . 'partials.buyer_sidebar')
                <div class="col-xl-9 col-lg-12 mb-30 ">
                    <div class="table-responsive">

                        <table class="table text-center " style="border: 2px solid #e6eeee !important" id="job-listing">
                                    
                            <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 20%">@lang('Title')</th>
                                <th>@lang('Proposals')</th>
                                <th>@lang('Messages')</th>
{{--                                <th>@lang('Hired')</th>--}}
                                <th>@lang('Status')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Action')</th>

                            </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse($jobs as $key => $job)
                                    <tr class="{{ $key% 2==1 ? 'info-row' : ''}}" id="{{$job->uuid}}">
                                        <td data-label="@lang('Title')" class="text-start">
                                            {{-- route('job.details', [slug($job->title), encrypt($job->id)]) --}}
                                            <a href="{{'#'}}" title="">{{__(str_limit($job->title, 20))}}</a>
                                        </td>
                                        <td data-label="@lang('Proposals')">
                                            <a href="{{route('buyer.job.all.proposals',$job->uuid)}}">{{ $job->proposal->count() }}</a>
                                        </td>
                                        <td data-label="@lang('Messages')">
                                            {{ $job->messages->count() }}
                                        </td>
{{--                                        <td data-label="@lang('Hired')">--}}
{{--                                            {{ '1' }}--}}
{{--                                        </td>--}}
                                        
                                        <td data-label="@lang('Status')">
                                                @if($job->status->id == \App\Models\Job::$Approved)
                                                    <span class="status-btn status-approved">@lang('Approved')</span>
                                                    
                                                 @elseif($job->status->id == \App\Models\Job::$Closed)
                                                    <span class="status-btn status-draft">@lang('Closed')</span> 
                                                
                                                @elseif($job->status->id == \App\Models\Job::$Pending)
                                                    <span class="status-btn status-pending">@lang('Pending')</span>
                                                    
                                                @elseif($job->status->id == \App\Models\Job::$Canceled)
                                                    <span class="status-btn btn--warning">@lang('Canceled')</span>
                                                
                                                @else
                                                    <button class="status-btn btn--danger">@lang('Canceled 2')</button>
                                                @endif

                                        </td>

                                        <td data-label="@lang('Price')">
                                            {{ $job->budget_type_id == \App\Models\BudgetType::$hourly ? 'Hourly:$'.$job->hourly_start_range."-$" .$job->hourly_end_range : "Fixed:$".$job->fixed_amount    }}
                                            {{-- <br> --}}
                                            {{-- {{diffforhumans($job->updated_at)}} --}}
                                        </td>
                                        <td data-label="Action">
                                            {{--  @if($job->status->slug != 'approved')  --}}
                                            {{-- {{route('buyer.job.edit', [slug($job->title), $job->id])}} --}}

                                                <a href="{{route('buyer.job.single.view', [$job->uuid])}} " ><i class="fa fa-eye icon-color" style="margin-right:7px; "></i></a>
                                            @if($job->status->id == \App\Models\Job::$Pending)

                                                <a href="{{route('buyer.job.edit', [$job->uuid])}}" ><i class="fa fa-edit icon-color" style="margin-right:7px; "></i></a>
                                            {{-- @else --}}
                                                {{-- <a href="#" ><i class="fa fa-edit icon-color" ></i></a> --}}

                                            {{--  @if($job->status->slug!= 'approved')  --}}
                                                <a href="javascript:void(0)" class=" delete_btn" data-id="{{$job->uuid}}" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="fa fa-trash icon-color" style="margin-right:7px; "></i></a>
                                            {{--  @endif  --}}
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
                    
                    {{$jobs->links()}}
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
                <h4 class="modal-title" id="ModalLabel">@lang('Job Closed Confirmation')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
               
            <input type="hidden" name="job_id" id="job_id">
            <div class="modal-body">
                <p>@lang('Are you sure to delete this job')</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn--info btn-rounded text-white" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="button" class="btn btn--danger btn-rounded text-white" id="confirmation_btn">@lang('Confirm')</button>
            </div>
                
    </div>
</div>
@endsection



@push('script')
<script>
    
    function displaySuccessMessage(message)
    {
        iziToast.success({
            message: message,
            position: "topRight",
        });
    }

    function delteJob(uuid)
    {
        $.ajax({
            type:"GET",
            url:"destroy/"+uuid,
            data: {},
            success:function(data){
                
                if(data.error){
                   
                }
                else{
                    $('#'+uuid).remove();
                    displaySuccessMessage(data.message);
                }
            }
        });  
    }

    'use strict';
    
    $('.delete_btn').on('click', function () {

        var modal = $('#confirmationModal');
        modal.find('input[name=job_id]').val($(this).data('id'));
        modal.modal('show');

    });

    $('#confirmation_btn').on('click', function () {

        uuid=$('#job_id').val();
        delteJob(uuid);
        var modal = $('#confirmationModal');
        modal.modal('hide');
       
    });

</script>
@endpush