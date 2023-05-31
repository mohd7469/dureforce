@extends('admin.layouts.app')
@section('panel')
<style>
    .disabled{
        pointer-events: none;
        cursor: default;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('admin.projectLength.create') }}" class="btn btn-primary btn-sm float-right">Create Project Length</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--md  table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Description')</th>
                            <th>@lang('Start range')</th>
                            <th>@lang('End range')</th>
                            <th>@lang('Type')</th>
                            <th>@lang('Module')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Updated At')</th>
                            <th>@lang('Action')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($project_lengths as $project_lengt)
                        <tr>
                        </td>
                            <td data-label="@lang('Title')">
                                <div class="user">
                                    <span class="name">{{$project_lengt->name ?? ''}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Category / SubCategory')">
                                <span class="font-weight-bold">{{$project_lengt->description}}</span>
                            </td>
                            <td data-label="@lang('Category / SubCategory')">
                                <span class="font-weight-bold">{{$project_lengt->start_range}}</span>
                            </td>
                            <td data-label="@lang('Category / SubCategory')">
                                <span class="font-weight-bold">{{$project_lengt->end_range}}</span>
                            </td>
                            <td data-label="@lang('Category / SubCategory')">
                                <span class="font-weight-bold">{{$project_lengt->type}}</span>
                            </td>
                            <td data-label="@lang('Category / SubCategory')">
                                <span class="font-weight-bold">{{$project_lengt->module->name ?? ''}}</span>
                            </td>

                            <td data-label="@lang('Status')">
                                @if($project_lengt->is_active == 1)
                                    <span class="font-weight-normal badge--success">@lang('Active')</span>
                                @elseif($project_lengt->is_active == 0)
                                    <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                @endif
                            </td>
                            <td data-label="@lang('Last Update')">
                                @if(isset($project_lengt->created_at))
                                    <span>{{($project_lengt->created_at  ?? '')}}</span>
                                    <br>
                                    {{isset($project_lengt->created_at) ? diffforhumans($project_lengt->created_at) : ''}}
                                    @else
                                    <span>{{($project_lengt->updated_at ?? '')}}</span>
                                    <br>
                                    {{isset($project_lengt->updated_at) ? diffforhumans($project_lengt->updated_at) : ''}}
                                 @endif
                                
                            </td>
                            <td data-label="@lang('Action')">
                                @if($project_lengt->is_active == 1)
                                    <button class="icon-btn btn--danger ml-1 techlogoinactive inactive" id="techlogoinactive" data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="{{$project_lengt->id}}">
                                        <i class="las la-check"></i>
                                    </button>
                                @endif

                                @if($project_lengt->is_active == 0)
                                    <button class="icon-btn btn--success ml-1 techlogoactive active" id="techlogoactive" data-toggle="tooltip" title="" data-original-title="@lang('active')" data-id="{{$project_lengt->id}}">
                                    <i class="las la-check"></i>
                                    </button>
                                @endif
                                <td>
                                    <form action="{{route('admin.projectLength.destroy', [$project_lengt->id])}}" method="POST" >
                                        @csrf
                                        <button  data-toggle="tooltip" title="" onclick="return confirm('Are you sure you want to delete.')"  data-original-title="@lang('Delete')" class="icon-btn btn--danger ml-1 disabled"  type="submit">Delete</button>
                                    </form>
                                </td>
                                <!-- <a href="#" class="icon-btn ml-1" data-toggle="tooltip" data-original-title="@lang('Details')">@lang('Details')</a> -->
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
                {{ paginateLinks($project_lengths) }}
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="inactiveBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('inactive Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            
            <form action="{{ route('admin.projectLength.inactiveBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to inactive this project length post?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="activeBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('active Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            
            <form action="{{ route('admin.projectLength.activeBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to active this project length post?')</p>
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



@push('script')
<script>
    'use strict';
    $('.techlogoinactive').on('click', function () {
        var modal = $('#inactiveBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.techlogoactive').on('click', function () {
        var modal = $('#activeBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.bannerModal').on('click', function () {
            var url = $(this).data('url');
            console.log(url);
            if(url != null){
                $("#profile-image-invite").attr('src',url);
            }else{
                $("#profile-image-invite").attr('src','/assets/images/default.png');
            }
            $('#bannerModal').modal('show');
    });

</script>
@endpush