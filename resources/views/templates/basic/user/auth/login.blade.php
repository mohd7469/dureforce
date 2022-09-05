@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $content = getContent('breadcrumbs.content', true);
@endphp
{{--  data-background="{{getImage('assets/images/frontend/breadcrumbs/'.$content->data_values->background_image,'1920x1200') }}" --}}
<!-- <section class="account-section  "> -->
<div class="container">
    <!-- log in form modal  -->
    <div
        class="modal fade"
        id="loginModal"
        tabindex="1"
        aria-labelledby="loginModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="account-header text-center">
                        <h3 class="title">
                            @lang('Sign in to') {{__($general->sitename)}}
                        </h3>
                    </div>
                    <form
                        class="account-form"
                        method="POST"
                        action="{{ route('user.login')}}"
                        onsubmit="return submitUserForm();"
                    >
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <!-- <label for="username">@lang('Username or email')*</label> -->
                                <input
                                    type="text"
                                    class="form-control form--control"
                                    id="username"
                                    name="username"
                                    value="{{old('username')}}"
                                    placeholder="@lang('Enter username or email')"
                                    required=""
                                />
                            </div>

                            <div class="col-lg-12 form-group">
                                <!-- <label for="password">@lang('Password')*</label> -->
                                <input type="password" class="form-control
                                form--control" id="password" name="password"
                                placeholder="@lang("Enter password")"
                                required="">
                            </div>

                            <div class="col-lg-12 form-group">
                                @php echo loadReCaptcha() @endphp
                            </div>

                            @include($activeTemplate.'partials.custom_captcha')

                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label
                                        ><a
                                            href="{{route('user.password.request')}}"
                                            class="text--base"
                                            >@lang('Forgot Password')?</a
                                        ></label
                                    >
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="submit-btn w-100">
                                    @lang('Login Now')
                                </button>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label
                                        >@lang('Already Have An Account')?
                                        <a
                                            href="{{ route('user.register') }}"
                                            class="text--base"
                                            >@lang('Register Now')</a
                                        ></label
                                    >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- end login form modal -->

        <!-- login with gmail modal form -->
    <div
        class="modal fade"
        id="loginWithGmail"
        tabindex="-1"
        aria-labelledby="loginWithGmailLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="account-header text-center">
                        <h3 class="title">
                            Create your free account
                        </h3>
                    </div>
                    <form
                        class="account-form"
                        method="POST"
                        action="#"
                    >
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <!-- <label for="username">@lang('Username or email')*</label> -->
                                <input
                                    type="text"
                                    class="form-control form--control"
                                    id="username"
                                    name="username"
                                    value="{{old('username')}}"
                                    placeholder="@lang('Enter email')"
                                    required=""
                                />
                            </div>

                   
                            <div class="col-lg-12 form-group text-center">
                                <button type="button" class="submit-btn w-100"> Continue with Email</button>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label
                                        >@lang('Already Have An Account')?
                                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                                        @lang('Log in')
                                        </button>
                                        <!-- <a
                                            data-toggle="modal" 
                                            data-target="#loginModal"
                                            class="text--base"
                                            >@lang('Log in')</a
                                        > -->
                                        </label
                                    >
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
   .modal:nth-of-type(even) {
    z-index: 1062 !important;
    }
    .modal-backdrop.show:nth-of-type(even) {
        z-index: 1061 !important;
    }
</style>
@endpush
@push('script')
    <script>
        "use strict";
        $(document).ready(function(){
            $("#loginWithGmail").modal('show');
        });
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span class="text-danger">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }
    </script>
@endpush
