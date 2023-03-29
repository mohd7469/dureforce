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
                            <th>@lang('Name')</th>
                            <th>@lang('Message')</th>
                            <th>@lang('Email')</th>
                            <th>@lang('Status')</th>
                            <th ></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($testimonials as $testimonial)
                        <tr class="table-light" >
                            <td data-label="@lang('Client Name')">
                                        <span class="name">{{__($testimonial->client_name)}}</span>
                                        <br>
                            </td>

                            <td data-label="@lang('Client Message')">
                                <span class="font-weight-bold">{{__($testimonial->description)}}</span>
                                <br>

                            </td>

                            <td data-label="@lang('Client Email')">
                                <span class="font-weight-bold">{{__($testimonial->client_email)}}</span>
                                <br>

                            </td>

                            <td data-label="@lang('Status')">
                                @if($testimonial->isapproved == 1)
                                   <span class="font-weight-normal badge--success">@lang('Approved')</span>
                                    <br>
                                                                {{systemDateTimeFormat($testimonial->created_at)}}
                                                            @elseif($testimonial->isapproved == 0)
                                                                <span class="font-weight-normal badge--warning">@lang('Pending')</span>
                                                                 <br>
                                                                {{systemDateTimeFormat($testimonial->created_at)}}

                                                            @endif
                                                        </td>
                            <td>
                                <form action="{{route('admin.job.destroy', [$testimonial->id])}}" method="POST" >
                                    @csrf
                                    <button  data-toggle="tooltip" title="" onclick="return confirm('Are you sure you want to delete.')"  data-original-title="@lang('Delete')" class="icon-btn btn--danger ml-1 ancher-delete-link-disabled"  type="submit">Delete</button>
                                </form>

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
            
            <form action="{{route('admin.job.approvedBy')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to approved this job post?')</p>
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

            <form action="{{ route('admin.job.cancelBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to cancel this job post?')</p>
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
            
            <form action="{{ route('admin.job.closedBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to closed this job post?')</p>
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