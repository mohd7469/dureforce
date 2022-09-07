@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $content = getContent('breadcrumbs.content', true);
@endphp
{{--  data-background="{{getImage('assets/images/frontend/breadcrumbs/'.$content->data_values->background_image,'1920x1200') }}" --}}
<!-- <section class="account-section  "> -->
<div class="container">

    <!-- code verification modal form -->
    <div
        class="modal fade"
        id="loginWithGmail"
        tabindex="-1"
        aria-labelledby="loginWithGmailLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- <div class="row">
                        <div class="col-md-12">
                        <button
                                type="button"
                                class="btn-close float-end"
                                data-bs-dismiss="modal"
                            ></button>
                        </div>
                    </div> -->
                    <div class="row"> 
                        <div class="account-header col-md-12 col-sm-12 text-center">
                            <h3 class="title">
                              @lang('Code Verify')
                            </h3>
                        </div>
                    </div>
                    <form class="account-form" method="POST" action="#">
                            @csrf
                            <input type="hidden" name="email" value="">
                            <div class="row ml-b-20">
                                <div class="col-lg-12 form-group">
                                    <input type="text" name="code" placeholder="@lang('Verification Code')" class="form-control form--control" id="code">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <div class="forgot-item">
                                        <label><a href="{{ route('user.login') }}"
                                                class="text--base">@lang('Back To Login')?</a></label>
                                    </div>
                                </div>

                                <div class="col-lg-12 form-group text-center">
                                    <button type="submit" class="submit-btn w-100">@lang('Submit')</button>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <div class="account-item mt-10">
                                        <label>@lang('Please check including your Junk/Spam Folder. if not found, you can') <a
                                                href="{{ route('user.password.code.resend', ['email' => session()->get('pass_res_mail') ?? '']) }}"
                                                class="text--base">@lang('Resend code')</a></label>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
        <!-- end login with gmail modal -->
</div>
<!-- </section> -->
@endsection
@push('style')
<style>
    .form-group {
        margin-bottom: 10px;
    }
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
        "use strict";
        $(document).ready(function(){
            $("#loginWithGmail").modal('show');
        });
    </script>
@endpush
