
@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('Freelancer Name')</th>
                                <th>@lang('Freelancer Email')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Active Status')</th>
                                <th>@lang('Action')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($testimonials as $testimonial)
                                <tr class="table-light" >
                                    <td data-label="@lang('Client Name')">
                                        <span class="name">{{__($testimonial->client_name)}}</span>
                                        <br>
                                    </td>


                                    <td data-label="@lang('Client Email')">
                                        <span class="font-weight-bold">{{__($testimonial->client_email)}}</span>
                                        <br>

                                    </td>

                                    <td data-label="@lang('Status')">
                                        @if($testimonial->status->id == 36)
                                            <span class="font-weight-normal badge--success">@lang('Requested')</span>
                                            <br>
                                            {{systemDateTimeFormat($testimonial->created_at)}}
                                        @elseif($testimonial->status->id  == 37)
                                            <span class="font-weight-normal badge--warning">@lang('WaitingApproval')</span>
                                            <br>
                                            {{systemDateTimeFormat($testimonial->created_at)}}
                                        @elseif($testimonial->status->id  == 38)
                                            <span class="font-weight-normal badge--danger">@lang('Accepted')</span>
                                            <br>
                                            {{systemDateTimeFormat($testimonial->created_at)}}
                                        @elseif($testimonial->status->id == 39)
                                            <span class="font-weight-normal badge--primary">@lang('Rejected')</span>
                                            <br>
                                            {{systemDateTimeFormat($testimonial->created_at)}}
                                        @endif
                                    </td>
                                    <td data-label="@lang('Status')">
                                        @if($testimonial->is_active == 1)
                                            <span class="font-weight-normal badge--success">@lang('Approved')</span>
                                            <br>

                                        @elseif($testimonial->is_active == 0)
                                            <span class="font-weight-normal badge--warning">@lang('Pending')</span>
                                            <br>


                                        @endif
                                    </td>
                                    <td data-label="@lang('Action')">
                                        @if($testimonial->status->id == 36)
                                            <button class="icon-btn btn--success ml-1 approved" data-toggle="tooltip" data-id="{{$testimonial->id}}" data-original-title="@lang('Accept')">
                                                <i class="las la-check"></i>
                                            </button>

                                            <button class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" title="" data-original-title="@lang('Reject')" data-id="{{$testimonial->id}}">
                                                <i class="las la-times"></i>
                                            </button>

                                        @endif
                                        @if($testimonial->status->id == 37)
                                            <button class="icon-btn btn--success ml-1 approved" data-toggle="tooltip" data-id="{{$testimonial->id}}" data-original-title="@lang('Accept')">
                                                <i class="las la-check"></i>
                                            </button>

                                            <button class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" title="" data-original-title="@lang('Reject')" data-id="{{$testimonial->id}}">
                                                <i class="las la-times"></i>
                                            </button>
                                        @endif

                                        @if($testimonial->status->id == 38)
{{--                                            <button class="icon-btn btn--warning ml-1 closed" data-toggle="tooltip" title="" data-original-title="@lang('Closed')" data-id="{{$testimonial->id}}">--}}
{{--                                                <i class="las la-check"></i>--}}
{{--                                            </button>--}}
                                        @endif
                                        @if($testimonial->status->id == 39)
{{--                                            <button class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" title="" data-original-title="@lang('Rejected')" data-id="{{$testimonial->id}}">--}}
{{--                                                <i class="las la-times"></i>--}}
{{--                                            </button>--}}
                                        @endif

                                            <a href="{{route('admin.testimonial.details', $testimonial->uuid)}}" class="icon-btn ml-1" data-toggle="tooltip" data-original-title="@lang('Details')">@lang('Details')</a>

                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ paginateLinks($testimonials) }}
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="approvedby" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Approval Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('admin.testimonial.approvedBy')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to approved this Testimonial?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="cancelBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Cancel Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.testimonial.closedBy') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to reject this testimonial?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="closedBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Closed Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.testimonial.closedBy') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to closed this job testimonial?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@push('breadcrumb-plugins')
    <form action="{{route('admin.job.search', $scope ?? str_replace('admin.job.', '', request()->route()->getName())) }}" method="GET" class="form-inline float-sm-right bg--white mb-2 ml-0 ml-xl-2 ml-lg-0">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Username or amount')" value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>


    <form action="{{route('admin.job.category')}}" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <select class="form-control" name="category">
                <option>----@lang('Select Category')----</option>
                @foreach($categorys as $category)
                    @if(@$searchCategory == $category->id)
                        <option value="{{$category->id}}" selected="">{{__($category->name)}}</option>
                    @else
                        <option value="{{$category->id}}">{{__($category->name)}}</option>
                    @endif
                @endforeach
            </select>
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush



@push('script')
    <script>
        'use strict';
        $('.approved').on('click', function () {
            var modal = $('#approvedby');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });

        $('.cancel').on('click', function () {
            var modal = $('#cancelBy');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });

        $('.closed').on('click', function () {
            var modal = $('#closedBy');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });
    </script>
@endpush
