@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
    $content = getContent('breadcrumbs.content', true);
    @endphp
    {{-- data-background="{{getImage('assets/images/frontend/breadcrumbs/'.$content->data_values->background_image,'1920x1200') }}" --}}
    <!-- <section class="account-section"> -->
        <div class="container">
            <!-- <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="account-form-area">
                        <div class="account-logo-area text-center">
                            {{-- <div class="account-logo">
                            <a href="{{route('home')}}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="{{__($general->sitename)}}"></a>
                        </div> --}}
                        </div>
                        <div class="account-header text-center">
                            <h3 class="title">@lang('Code Verify11')</h3>
                        </div>
                        <form class="account-form" method="POST" action="{{ route('user.password.verify.code') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="row ml-b-20">
                                <div class="col-lg-12 form-group">
                                    <label>@lang('Verification Code')</label>
                                    <input type="text" name="code" class="form-control form--control" id="code">
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
            </div> -->
    <!-- code verify modal form -->
    <div
        class="modal fade"
        id="verifyCode"
        aria-labelledby="verifyCodeLabel"
        aria-hidden="true"
        data-backdrop="static" data-keyboard="false"
        >
        <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal body -->
                        <div class="modal-body">
                        <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="account-logo-area text-center">
                                {{-- <div class="account-logo">
                                <a href="{{route('home')}}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="{{__($general->sitename)}}"></a>
                            </div> --}}
                            </div>
                            <div class="account-header text-center">
                                <h2 class="title">@lang('Code Verify')</h2>
                            </div>
                            <form class="account-form" method="POST" action="{{ route('user.password.verify.code') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <div class="row ml-b-20">
                                    <div class="col-lg-12 form-group">
                                        <label>@lang('Verification Code')</label>
                                        <input type="text" name="code" class="form-control form--control" id="code">
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
        </div>
    </div>
    <!-- code verify modal -->
        </div>
    <!-- </section> -->
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function(){
                $("#verifyCode").modal('show');
            });
            $('#code').on('input change', function() {
                var xx = document.getElementById('code').value;
                $(this).val(function(index, value) {
                    value = value.substr(0, 7);
                    return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
                });
            });
        })(jQuery)
    </script>
@endpush
