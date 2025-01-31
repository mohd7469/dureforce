@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold">@lang('Name') <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" maxlength="40" value="{{$staff->name}}" name="name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="username" class="font-weight-bold">@lang('User Name') <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="username" maxlength="40"  value="{{$staff->username}}" name="username" required>
                                    </div>
                                </div>
                            </div>
                        

                            <div class="row">
                                <div class="col-lg-12">  
                                    <div class="form-group">
                                        <label for="email" class="font-weight-bold">@lang('Email') <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" value="{{$staff->email}}" name="email" maxlength="40" placeholder="@lang('Enter Email')" required>
                                    </div>     
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">  
                                    <div class="form-group">
                                        <label for="password" class="font-weight-bold">@lang('Password') <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="@lang('Enter Password')">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12"> 
                                    <div class="form-group">
                                        <label for="confirm_password" class="font-weight-bold">@lang('Confirm Password') <span class="text-danger">*</span></label>
                                        <input type="password" id="confirm_password" class="form-control"
                                            name="password_confirmation" placeholder="@lang('Confirm Password')" autocomplete="new-password">
                                            <p id="message"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="font-weight-bold">@lang('Staff Permission') <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-12" style="margin-left: 20px;">
                                            <input type="checkbox" class="form-check-input" id="selectAllPermissions">
                                            <label class="form-check-label" for="selectAllPermissions">Select All</label>
                                            <br>
                                        </div>
                                        @foreach($permissions->chunk(8) as $permission)

                                        <div class="col-lg-3">
                                            <div class="form-group form-check">

                                                    @foreach($permission as $value)
                                                        <input type="checkbox" class="form-check-input permission-checkbox" name="permission[]" value="{{$value->id}}" id="{{$value->id}}"
                                                               @if(!empty($staff_permission))
                                                                   @foreach($staff_permission as $val)
                                                                       @if($val->permission_id == $value->id)
                                                                           checked
                                                                @endif
                                                                @endforeach
                                                                @endif>
                                                        <label class="form-check-label" for="{{$value->id}}">{{$value->name}}</label>
                                                        <br>
                                                    @endforeach
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary btn-block">@lang('Update Staff')</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.staff.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i>@lang('Go Back')</a>
@endpush

@push('script')
<script>
    $(function () {
    'use strict';
        $('#confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('<i class="las la-info-circle"></i> Password Matched').css('color', 'green');
            } 
            else 
                $('#message').html('<i class="las la-info-circle"></i> Password Does Not Matched').css('color', 'red');
        });
    })(jQuery)
</script>
<script>
    // Get the "Select All" checkbox element
    var selectAllCheckbox = document.getElementById('selectAllPermissions');

    // Get all the permission checkboxes
    var permissionCheckboxes = document.getElementsByClassName('permission-checkbox');

    // Add a change event listener to the "Select All" checkbox
    selectAllCheckbox.addEventListener('change', function() {
        // Iterate over each permission checkbox
        for (var i = 0; i < permissionCheckboxes.length; i++) {
            // Set the checked property of each checkbox to match the "Select All" checkbox
            permissionCheckboxes[i].checked = selectAllCheckbox.checked;
        }
    });
</script>
@endpush








