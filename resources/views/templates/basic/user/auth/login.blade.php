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
                            <h2 class="title">
                                @lang('Log in to') {{__($general->sitename)}}
                            </h2>
                        </div>
                    </div>
                    <form
                    autocomplete="nope"
                        class="account-form"
                        method="POST"
                        action="{{ route('user.login')}}"
                        onsubmit="return submitUserForm();"
                    >
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <label class="label-color" for="username">@lang('Username / Email')*</label>
                                <input
                                    type="text"
                                    autocomplete="off"
                                    class="form-control form-control-lg form--control"
                                    id="username"
                                    name="username"
                                    value="{{old('username')}}"
                                    placeholder="@lang('Username / Email')"
                                    required=""
                                />
                            </div>

                            <div class="col-lg-12 form-group">
                                <label class="label-color" for="password">@lang('Password')*</label>
                                <input type="password" class="form-control form-control-lg
                                form--control" id="password" name="password"
                                placeholder="@lang('Enter password')"
                                required="">
                            </div>

                            <!-- <div class="col-lg-12 form-group">
                                @php echo loadReCaptcha() @endphp
                            </div> -->

                            @include($activeTemplate.'partials.custom_captcha')

                            <div class="col-lg-12 form-group">
                                <div class="forgot-item float-end">
                                    <label
                                        ><a
                                            href="{{route('user.password.request')}}"
                                            class="text--base "
                                            ><span class="span-color">@lang('Forgot Password')?</span></a
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
                                        ><span class="span-color">@lang('Already Have An Account')?</span>
                                        <a
                                            href="{{ route('user.register') }}"
                                            class="text--base"
                                            ><span class="label-color">@lang('Register Now')</span></a
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
                                Create your free account
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                            <a href="#" class="btn btn-primary google-button">
                            <i class="fab fa-google float-start mt-1" aria-hidden="true"></i> Continue with Google
                            </a>
                    </div>

                    <div class="col-lg-12">
                        <div class="or-seperator">
                            <i><b>or</b></i>
                        </div>
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
                                    class="form-control form-control-lg form--control"
                                    id="username"
                                    name="username"
                                    value="{{old('username')}}"
                                    placeholder="@lang('Enter address')"
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
    .modal { position: fixed; top:10%; } 
    .google-button{
        width: 100%; border-radius: 50px;
    }
    .span-color{
        color: #7F007F;
    }
    .label-color{
        color: #007F7F;
    }
    .or-seperator {
        margin: 30px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .modal-header .btn-close {
        margin-bottom: 30px;
        height: 1px !important;
    }
    .account-header {
        margin-bottom: 15px;
    }
    .modal-body {
        position: relative;
        flex: 1 1 auto;
        padding: 3rem;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #ffffff;
        position: relative;
        top: -11px;
        z-index: 1;
    }
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
            $("#loginModal").modal('show');
        });
        $(function(){                                               
            setTimeout(function(){
                $("input#username").attr("type","username");
            },10);
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
