@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $content = getContent('breadcrumbs.content', true);
@endphp
{{-- data-background="{{getImage('assets/images/frontend/breadcrumbs/'.$content->data_values->background_image,'1920x1200') }}" --}}
    <div class="container">
    <div
        class="modal fade"
        id="emailVerify"
        tabindex="-1"
        aria-labelledby="emailVerifyLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row"> 
                        <div class="account-header col-md-12 col-sm-12 text-center">
                            <h3 class="title">
                                @lang('Reset Password')
                            </h3>
                        </div>
                    </div>
                    <form class="account-form" method="POST" action="{{ route('user.password.email') }}" onsubmit="return submitUserForm();">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="form-group col-lg-12">
                                <!-- <label>@lang('Select One')</label> -->
                                <select class="form-control form--control" name="type">
                                    <option value="email">@lang('Select E-Mail Address')</option>
                                    <option value="username">@lang('Username')</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control form--control  @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" placeholder="@lang('Enter E-Mail Address')" required autofocus="off">
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="submit-btn w-100">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('style')
<style>
    .account-header {
        margin-bottom: 15px;
    }
    .modal-body {
        position: relative;
        flex: 1 1 auto;
        padding: 2rem;
    }

</style>
@endpush
@push('script')
<script>

    (function($){
        "use strict";
        $(document).ready(function(){
            $("#emailVerify").modal('show');
        });
        myVal();
        $('select[name=type]').on('change',function(){
            myVal();
        });
        function myVal(){
            $('.my_value').text($('select[name=type] :selected').text());
        }
    })(jQuery)
</script>
@endpush