@extends('admin.layouts.app')
@section('panel')

<style>
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
    position: relative;
    right: 174px;
}

a.disabled{
        pointer-events: none;
        cursor: default;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('admin.soft.create') }}" class="btn btn-primary btn-sm float-right">Create Software Detail</a>
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
                            <th>@lang('Description')</th>
                            
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- {{dd($emails)}} --}}
                            
                        @foreach($softwares as $soft)
                        <tr>
                            
                            <td data-label="@lang('Title')">
                                <div class="user">
                                    <span class="name">{{$soft->title}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Description')">
                                <div class="user">
                                    <span class="name">{{$soft->description}}</span>
                                </div>
                            </td>
                            
                           

                            <td data-label="@lang('Status')">
                                @if($soft->is_active == 1)
                                    <span class="font-weight-normal badge--success">@lang('Active')</span>
                                @elseif($soft->is_active == 0)
                                    <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                @endif
                            </td>
                            
                            <td data-label="@lang('Action')">
                               
                                    <a  href="{{route('admin.soft.edit', $soft->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('InActive')" data-id="">
                                        <i class="las la-edit"></i>
                                    </a>
                               
                                    {{-- <a href="#" class="delete" data-confirm="Are you sure to delete this item?">Delete</a> --}}
                               
                                    <a type="submit"  href="{{route('admin.soft.delete', $soft->id)}}" class="icon-btn btn--danger ml-1 editbtn-c delete disabled" id="" data-toggle="tooltip1" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
                                        <i class="las la-trash"></i>
                                    </a>
                                    <td data-label="@lang('Action')">
                                        @if($soft->is_active == 1)
                                            <button class="icon-btn btn--danger  ml-1 bannerinactive active  tickbtn" id="banneractive " data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="{{$soft->id}}">
                                                <i class="las la-check "></i>
                                            </button>
                                        @endif
        
                                        @if($soft->is_active == 0)
                                            <button class="icon-btn btn--success ml-1 banneractive inactive tickbtn " id="bannerinactive" data-toggle="tooltip" title="" data-original-title="@lang('Active')" data-id="{{$soft->id}}">
                                            <i class="las la-times"></i>
                                            </button>
                                        @endif
                                        <!-- <a href="#" class="icon-btn ml-1" data-toggle="tooltip" data-original-title="@lang('Details')">@lang('Details')</a> -->
                                    </td>
                              
             
                               
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
            
            <form action="{{ route('admin.soft.inactive') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to inactive this Software Details?')</p>
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
            
            <form action="{{ route('admin.soft.active') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to active this Software Details?')</p>
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

for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
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