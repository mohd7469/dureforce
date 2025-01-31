@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary btn-sm float-right">Create Banner</a>
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
                            <th>@lang('Subject')</th>
                            <th>@lang('Category / SubCategory')</th>
                            <th>@lang('Backgroung Banner')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Last Update')</th>
                            <th>@lang('Action')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($banners as $banner)
                        <tr>
                            <td data-label="@lang('Title')">
                                <div class="user">
                                    <span class="name">{{__(str_limit($banner->subject, 20))}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Category / SubCategory')">
                                <span class="font-weight-bold">{{__($banner->category->name)}}</span>
                                <br>
                                @if($banner->sub_category_id)
                                    <span>{{__($banner->subCategory->name)}}</span>
                                @else
                                    <span>@lang('N/A')</span>
                                @endif
                            </td>
                            <td data-label="@lang('Image')">
                                <a class="bannerModal" id="image_url" data-url="{{$banner->url}}" >
                                    <img src="{{ isset($banner->url) ? ($banner->url) : asset('assets\images\default.png')}}" alt="@lang('Banner Image')" class="b-radius--10" height="50" width="50" >
                                </a>
                            </td>
                            <td data-label="@lang('Status')">
                                @if($banner->is_active == 1)
                                    <span class="font-weight-normal badge--success">@lang('Active')</span>
                                @elseif($banner->is_active == 0)
                                    <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                @endif
                            </td>
                            <td data-label="@lang('Last Update')">
                                @if(isset($banner->created_at))
                                    <span>{{systemDateTimeFormat($banner->created_at)}}</span>
                                    <br>
                                    {{diffforhumans($banner->created_at)}}
                                    @else
                                    <span>{{showDateTime($banner->updated_at)}}</span>
                                    <br>
                                    {{diffforhumans($banner->updated_at)}}
                                 @endif
                                
                            </td>
                            <td data-label="@lang('Action')">
                                @if($banner->is_active == 1)
                                    <button class="icon-btn btn--danger ml-1 techlogoinactive inactive" id="techlogoinactive" data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="{{$banner->id}}">
                                        <i class="las la-check"></i>
                                    </button>
                                @endif

                                @if($banner->is_active == 0)
                                    <button class="icon-btn btn--success ml-1 techlogoactive active" id="techlogoactive" data-toggle="tooltip" title="" data-original-title="@lang('active')" data-id="{{$banner->id}}">
                                    <i class="las la-check"></i>
                                    </button>
                                @endif
                                <a  href="{{route('admin.techlogo.edit', $banner->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('Edit')" data-id="">
                                        <i class="las la-edit"></i>
                                </a>
                                <td>
                                    <form action="{{route('admin.techlogo.destroy', [$banner->id])}}" method="POST" >
                                        @csrf
                                        <button  data-toggle="tooltip" title="" onclick="return confirm('Are you sure you want to delete.')"  data-original-title="@lang('Delete')" class="icon-btn btn--danger ml-1"  type="submit">Delete</button>
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
                {{ paginateLinks($banners) }}
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="container">
    <div
            class="modal fade"
            id="bannerModal"
            tabindex="-1"
            aria-labelledby="emailVerifyLabel"
            aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <img alt="User Pic" src="" id="profile-image-invite"
                                             class=" img-responsive img-card" style="border-radius:10%; width: 100%;height: 100%">
                            </div>
                        </div>
                    </div>
                </div>
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
            
            <form action="{{ route('admin.banner.inactiveBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to inactive this Banner post?')</p>
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
            
            <form action="{{ route('admin.banner.activeBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to active this Banner post?')</p>
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