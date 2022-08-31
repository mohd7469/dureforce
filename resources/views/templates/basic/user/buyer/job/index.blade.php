@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections zero_top_padding">
    <div class="container-fluid">
        <div class="section-wrapper ">
            <div class="row justify-content-center mb-30-none">
                @include($activeTemplate . 'partials.buyer_sidebar')
                <div class="col-xl-9 col-lg-12 mb-30 ">
                    <div class="table-responsive">

                        <table class="table text-center " style="border: 2px solid #e6eeee !important">
                                    
                            <thead class="table-header text-center" style="border-bottom:2px solid #e6eeee !important">
                            <tr>
                                <th style="width: 20%">@lang('Title')</th>
                                <th>@lang('Proposals')</th>
                                <th>@lang('Messages')</th>
                                <th>@lang('Hired')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Action')</th>

                            </tr>
                            </thead>

                            <tbody class="text-center">
                                @forelse($jobs as $key => $job)
                                    <tr class="{{ $key% 2==1 ? 'info-row' : ''}}">
                                        <td data-label="@lang('Title')" class="text-start">
                                            {{-- route('job.details', [slug($job->title), encrypt($job->id)]) --}}
                                            <a href="{{'#'}}" title="">{{__(str_limit($job->title, 20))}}</a>
                                        </td>
                                        <td data-label="@lang('Proposals')">
                                            {{ '2'}}
                                        </td>
                                        <td data-label="@lang('Messages')">
                                            {{ '3' }}
                                        </td>
                                        <td data-label="@lang('Hired')">
                                            {{ '1' }}
                                        </td>
                                        
                                        <td data-label="@lang('Status')">
                                                @if($job->status->slug == 'approved')
                                                    <span class="status-btn status-approved">@lang('Approved')</span>
                                                    
                                                @elseif($job->status->slug == 'draft')
                                                    <span class="status-btn status-draft">@lang('Draft')</span>
                                                
                                                @elseif($job->status->slug == 'pending')
                                                    <span class="status-btn status-pending">@lang('Pending')</span>
                                                    
                                                @elseif($job->status->slug == 'rejected')
                                                    <span class="status-btn status-pending">@lang('Cancel')</span>

                                                @elseif($job->status->slug == 'approved')
                                                    <span class="status-btn status-pending">@lang('Approved')</span>
                                                
                                                @else
                                                    <button class="status-btn status-approved">@lang('Approved')</button>
                                                    
                                                @endif

                                        </td>

                                        <td data-label="@lang('Price')">
                                            {{showDateTime($job->updated_at)}}
                                            {{-- <br> --}}
                                            {{-- {{diffforhumans($job->updated_at)}} --}}
                                        </td>
                                        <td data-label="Action">
                                            {{--  @if($job->status->slug != 'approved')  --}}
                                            {{-- {{route('user.job.edit', [slug($job->title), $job->id])}} --}}

                                                <a href="{{route('user.job.edit', [$job->uuid])}}" ><i class="fa fa-edit icon-color" ></i></a>
                                            {{-- @else --}}
                                                {{-- <a href="#" ><i class="fa fa-edit icon-color" ></i></a> --}}

                                            {{--  @if($job->status->slug!= 'approved')  --}}
                                                <a href="javascript:void(0)" class=" cancelBtn" data-id="{{$job->id}}" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="fa fa-trash icon-color"></i></a>
                                            {{--  @endif  --}}
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


<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel">@lang('Job Closed Confirmation')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" action="{{route('user.job.delete',1)}}">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to close this job')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal">@lang('Close')</button>
                         <button type="submit" class="btn btn--success btn-rounded text-white">@lang('Confirm')</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection



@push('script')
<script>
    'use strict';
    $('.cancelBtn').on('click', function () {
        var modal = $('#cancelModal');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });
</script>
@endpush