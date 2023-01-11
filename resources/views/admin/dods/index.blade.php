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
    float: right;
}
.table td{
    white-space: revert !important;
}
.icon-btn{
    float: right;
}
table{
    table-layout: fixed;
}
th.tlst {
    text-align: right !important;
    position: relative;
    padding-right: 6% !important;
}

a.disabled{
        pointer-events: none;
        cursor: default;
    }


</style>
<div class="row">
    <div class="col-lg-12">
     
        <a href="{{ route('admin.dod.create') }} " class="btn btn-primary btn-sm float-right">Create Dods Detail</a>
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
                            
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                            
                        @foreach($dods as $dod)
                       
                        <tr>
                            
                            <td data-label="@lang('Title')">
                                <div class="user">
                                    <span class="name">{{$dod->title}}</span>
                                </div>
                            </td>
                           
                            <td data-label="@lang('Status')">
                                @if($dod->is_active == 1)
                                    <span class="font-weight-normal badge--success">@lang('Active')</span>
                                @elseif($dod->is_active == 0)
                                    <span class="font-weight-normal badge--danger">@lang('InActice')</span>
                                @endif
                            </td>
                            
                            <td data-label="@lang('Action')">
                               
                                    <a  href="{{route('admin.dod.edit', $dod->id)}}" class="icon-btn btn--success ml-1  editbtn-c" id="" data-toggle="tooltip1" title="" data-original-title="@lang('InActive')" data-id="">
                                        <i class="las la-edit"></i>
                                    </a>
                               
                                     {{-- <a href="#" class="delete" data-confirm="Are you sure to delete this item?">Delete</a>  --}}
                               
                                    <a type="submit"  href="{{route('admin.dod.delete', $dod->id)}}" class="icon-btn btn--danger ml-1 editbtn-c disabled" id="" data-toggle="tooltip1" title="" data-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
                                        <i class="las la-trash"></i>
                                        
                                    </a> 
                                    <span data-label="@lang('Action')">
                                        @if($dod->is_active == 1)
                                        
                                            <button class="icon-btn btn--danger  ml-1 bannerinactive active  tickbtn" id="banneractive " data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="{{$dod->id}}">
                                                <i class="las la-check "></i>
                                            </button>
                                        @endif
        
                                        @if($dod->is_active == 0)
                                            <button class="icon-btn btn--success ml-1 banneractive inactive tickbtn " id="bannerinactive" data-toggle="tooltip" title="" data-original-title="@lang('Active')" data-id="{{$dod->id}}">
                                            <i class="las la-times"></i>
                                            </button>
                                        @endif
                                    </span>
                                    
                              
             
                               
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
            
            <form action="{{ route('admin.dod.inactive') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to inactive this Dods Details?')</p>
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
            
            <form action="{{ route('admin.dod.active') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to active this Dods Details?')</p>
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