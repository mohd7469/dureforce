@extends('admin.layouts.app')
@section('panel')

<style>
    a.disabled{
        pointer-events: none;
        cursor: default;
    }
.icon-btn i {
    font-size: 22px;
}
.editbtn-c {
    width: 35px;
    height: 35px;
    /* background: red; */
    display: inline-block;
}
.tickbtn {
    padding: 5.5px 7px;
    /* position: relative;
    right: 180px; */
    float: left;
}
a.icon-btn{
    float: left;
    
}
th.tlst {
    text-align: left !important;
}
.table td{
    white-space: revert !important;
}
</style>
<div class="row">
    <div class="col-lg-12">
     
        <a href="{{ route('admin.degree.create') }} " class="btn btn-primary btn-sm float-right">Create Degree</a>
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
                            
                            <th style="width: 30%">@lang('Title')</th>
                            <th style="width: 30%">@lang('Slug')</th>
                            <th style="width: 20%">@lang('Status')</th>
                            <th style="width: 20%" class="tlst">@lang('Action')</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                            
                        @foreach($degrees as $degree)
                        <tr>
                            
                            <td data-label="@lang('Title')" style="width: 30%">
                                <div class="user">
                                    <span class="name">{{$degree->title}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Slug')" style="width: 30%">
                                <div class="user">
                                    <span class="name">{{$degree->slug}}</span>
                                </div>
                            </td>
                           
                            <td data-label="@lang('Status')" style="width: 20%"> 
                                @if($degree->is_active == 1)
                                    <span class="font-weight-normal badge--success">@lang('Active')</span>
                                @elseif($degree->is_active == 0)
                                    <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                @endif
                            </td>
                            
                            <td data-label="@lang('Action')" style="width: 30%">
                               
                                    <a  href="{{route('admin.degree.edit', $degree->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('InActive')" data-id="">
                                        <i class="las la-edit"></i>
                                    </a>
                               
                                     {{-- <a href="#" class="delete" data-confirm="Are you sure to delete this item?">Delete</a>  --}}
                               
                                     <a type="submit"  href="{{route('admin.degree.delete', $degree->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete disabled" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
                                        <i class="las la-trash"></i>
                                    </a> 
                                    <div data-label="@lang('Action')">
                                        @if($degree->is_active == 1)
                                            <button class="icon-btn btn--danger  ml-1 bannerinactive active  tickbtn" id="banneractive " data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="{{$degree->id}}">
                                                <i class="las la-check "></i>
                                            </button>
                                        @endif
        
                                        @if($degree->is_active == 0)
                                            <button class="icon-btn btn--success ml-1 banneractive inactive tickbtn " id="bannerinactive" data-toggle="tooltip" title="" data-original-title="@lang('Active')" data-id="{{$degree->id}}">
                                            <i class="las la-times"></i>
                                            </button>
                                        @endif
                                    </div>
                                   
                              
             
                               
                            </td>
                        </tr>
                        {{-- @empty --}}
                            {{-- <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr> --}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                {{ paginateLinks($degrees) }}
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
            
            <form action="{{ route('admin.degree.inactive') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to inactive this Degree?')</p>
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
            
            <form action="{{ route('admin.degree.active') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to active this Degree?')</p>
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
    var deleteLinks = document.querySelectorAll('.delete');
 
    $('.bannerinactive').on('click', function () {
        
        var modal = $('#inactiveBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.banneractive').on('click', function () {
        var modal = $('#activeBy');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

</script>
@endpush