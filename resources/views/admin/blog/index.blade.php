@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm float-right">Create Blog</a>
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
                            <th>@lang('Title')</th>

                            <th>@lang('Image')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Featured Item')</th>
                            <th>@lang('Created At')</th>
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($blogs as $blog)

                        <tr>
                            <td data-label="@lang('Title')">
                                <div class="user">
                                    <span class="name">{{ str_limit($blog->title,30) }}</span>
                                </div>
                            </td>

                            <td data-label="@lang('Image')">
                                <a class="bannerModal" id="image_url" data-url="{{$blog->attachments[0]->url ?? ''}}" >
                                    <!-- <img src="asset('assets\images\default.png')" alt="@lang('Banner Image')" class="b-radius--10" height="50" width="50" > -->
                                    <img src="{{ isset($blog->attachments[0]->url) ? ($blog->attachments[0]->url) : asset('assets\images\default.png')}}" alt="@lang('Blog Image')" class="b-radius--10" height="50" width="50" >
                                </a>
                            </td>
                            <td data-label="@lang('Status')">
                                @if($blog->is_active == 1)
                                    <span class="font-weight-normal badge--success">@lang('Active')</span>
                                @elseif($blog->is_active == 0)
                                    <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                @endif
                            </td>
                            <td data-label="@lang('Featured Item')">
                                @if ($blog->is_featured == 1)
                                    <span
                                        class="badge badge-success badge-pill font-weight-bold">@lang('Included')</span>
                                    <a href="javascript:void(0)" class="icon-btn btn--info ml-2 notInclude"
                                        data-toggle="tooltip" title=""
                                        data-original-title="@lang('Not Include')"
                                        data-id="{{ $blog->id }}">
                                        <i class="las la-arrow-alt-circle-left"></i>
                                    </a>
                                @else
                                    <span
                                        class="badge badge-warning badge-pill font-weight-bold text-white">@lang('Not
                                        included')</span>
                                    <a href="javascript:void(0)"
                                        class="icon-btn btn--success ml-2 include text-white"
                                        data-toggle="tooltip" title="" data-original-title="@lang('Include')"
                                        data-id="{{ $blog->id }}">
                                        <i class="las la-arrow-alt-circle-right"></i>
                                    </a>
                                @endif
                            </td>
                            <td data-label="@lang('Last Update')">
                                @if(isset($blog->created_at))
                                    <span>{{systemDateTimeFormat($blog->created_at)}}</span>
                                    <br>
                                    {{diffforhumans($blog->created_at)}}
                                    @else
                                    <span>{{showDateTime($blog->updated_at)}}</span>
                                    <br>
                                    {{diffforhumans($blog->updated_at)}}
                                 @endif
                                
                            </td>
                            <td data-label="@lang('Action')">
                                @if($blog->is_active == 1)
                                    <button class="icon-btn btn--danger ml-1 bannerinactive inactive" id="bannerinactive" data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="{{$blog->id}}">
                                        <i class="las la-check"></i>
                                    </button>
                                @endif

                                @if($blog->is_active == 0)
                                    <button class="icon-btn btn--success ml-1 banneractive active" id="banneractive" data-toggle="tooltip" title="" data-original-title="@lang('active')" data-id="{{$blog->id}}">
                                    <i class="las la-check"></i>
                                    </button>
                                @endif

                                <a  href="{{route('admin.blog.edit', $blog->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('Edit')" data-id="">
                                        <i class="las la-edit"></i>
                                </a>
                                
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
                {{ paginateLinks($blogs) }}
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
                                <img alt="User Pic" src="" id="blog-image_"
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
            
            <form action="{{ route('admin.blog.inactiveBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to inactive this blog post?')</p>
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
            
            <form action="{{ route('admin.blog.activeBy') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to active this Blog post?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="includeFeatured" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Featured Item Include')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.blog.featured.include') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure include this blog featured list?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="NotincludeFeatured" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Featured Item Remove')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.blog.featured.remove') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure remove this blog featured list?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<style>
    .disabled{
        pointer-events: none;
        cursor: default;
    }
   
</style>


@push('script')
<script>
    'use strict';
    $('.bannerinactive').on('click', function () {
        var modal = $('#inactiveBy');
        modal.find('input[name=id]').val($(this).data('id'))
        $('.disabled').addClass('disabled');
        modal.modal('show');

    });

    $('.banneractive').on('click', function () {
        var modal = $('#activeBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.bannerModal').on('click', function () {
            var url = $(this).data('url');
            console.log(url);
            if(url != null){
                $("#blog-image_").attr('src',url);
            }else{
                $("#blog-image_").attr('src','/assets/images/default.png');
            }
            $('#bannerModal').modal('show');
    });
    $('.include').on('click', function() {
        var modal = $('#includeFeatured');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.notInclude').on('click', function() {
        var modal = $('#NotincludeFeatured');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

</script>
@endpush

