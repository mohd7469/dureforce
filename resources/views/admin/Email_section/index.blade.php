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
</style>
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('admin.email.create') }}" class="btn btn-primary btn-sm float-right">Create Email</a>
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
                            <th>@lang('Type')</th>
                            <th>@lang('Title')</th>
                            <th>@lang('Description')</th>
                            <th>@lang('Footer Title')</th>
                            <th>@lang('Footer Description')</th>
                            <th>@lang('Email image')</th>
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- {{dd($emails)}} --}}
                            
                        @foreach($email_test as $email)
                        <tr>
                            <td data-label="@lang('Type')">
                                <div class="user">
                                    <span class="name">{{($email->type)}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Title')">
                                <div class="user">
                                    <span class="name">{{($email->title)}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Description')">
                                <div class="user">
                                    <span class="name">{{($email->description)}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Footer Title')">
                                <div class="user">
                                    <span class="name">{{($email->footer_title)}}</span>
                                </div>
                            </td>
                            <td data-label="@lang('Footer Description')">
                                <div class="user">
                                    <span class="name">{{($email->footer_description)}}</span>
                                </div>
                            </td>
                          {{-- @dd($email->attachments->name) --}}
                            <td data-label="@lang('Image')">
                                @foreach ($email->attachments as $object)
                                
                                <a class="bannerModal" id="image_url" data-url="{{$object->url}}" >
                                    <img src="{{ isset($object->url) ? ($object->url) : asset('assets\images\default.png')}}" alt="@lang('Email Image')" class="b-radius--10" height="50" width="50" >
                                </a>
                                @endforeach
                                
                            </td>
                            
                            <td data-label="@lang('Action')">
                               
                                    <a  href="{{route('admin.email.edit', $email->id)}}" class="icon-btn btn--success ml-1 bannerinactive inactive editbtn-c" id="bannerinactive" data-toggle="tooltip" title="" data-original-title="@lang('InActive')" data-id="">
                                        <i class="las la-edit"></i>
                                    </a>
                               
                                    {{-- <a href="#" class="delete" data-confirm="Are you sure to delete this item?">Delete</a> --}}
                               
                                    <a type="submit"  href="{{route('admin.email.delete', $email->id)}}" class="icon-btn btn--danger ml-1 banneractive active editbtn-c delete" id="banneractive" data-toggle="tooltip" title="" data-original-title="@lang('active')" data-id="" data-confirm="Are you sure to delete this item?"> 
                                        <i class="las la-trash"></i>
                                    </a>
                              
             
                               
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