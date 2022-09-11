@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $content = getContent('breadcrumbs.content', true);
@endphp
{{--  data-background="{{getImage('assets/images/frontend/breadcrumbs/'.$content->data_values->background_image,'1920x1200') }}" --}}
<!-- <section class="account-section"> -->
    <div class="container">

    <div
        class="modal fade"
        id="signUpModal"
        tabindex="-1"
        aria-labelledby="signUpModalLabel"
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
                                @lang('Complete Your Free Account Setup')
                            </h3>
                        </div>
                    </div>
                    <form class="account-form col-md-12 m-auto" action="{{ route('user.register') }}" method="POST" onsubmit="return submitUserForm();">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <div class="btn-group justify-content-center" role="group" style="width: 100%" aria-label="Basic radio toggle button group">
                                 <div>
                                    <input type="radio" class="btn-check" name="type" value="1" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn btn-outline-secondary btn-freelance" for="btnradio1">@lang('Work As A Freelancer')</label>
                                </div>
                                <div>

                                    <input type="radio" class="btn-check" name="type" value="2" id="btnradio2" autocomplete="off">
                                    <label class="btn btn-outline-secondary btn-hire" for="btnradio2">@lang('Hire For A Project')</label>
                                </div>
                                {{--                                    <input type="radio" class="btn-check" name="type" value="3" id="btnradio3" autocomplete="off">--}}
                                {{--                                    <label class="btn btn-outline-secondary" for="btnradio3">@lang('Both')</label>--}}
                                  </div>
                            </div>

                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="submit-btn w-100">@lang('Create Account')</button>
                            </div>

                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label>@lang('Already Have An Account')? <a href="{{route('user.login')}}" class="text--base">@lang('Sign In')</a></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
<!-- </section> -->

@endsection
@push('style')
<style>
    .hover-input-popup {
        position: relative;
    }
    .hover-input-popup:hover .input-popup {
        opacity: 1;
        visibility: visible;
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
        padding: 2rem;
    }
    .btn-outline-secondary{
        color: #007F7F;
        background-color: #ccffff;
        border-radius: 4px;
        padding-top: 85px;
        height: 200px;
    }
    .btn-check:checked+.btn-outline-secondary, .btn-outline-secondary.hover, .btn-outline-secondary.dropdown-toggle.show, .btn-outline-secondary:hover {
        color: #fff;
        background-color: #007F7F;
        border-color: #007F7F;
    }
    .btn-check:checked+.btn-outline-secondary, .btn-outline-secondary.active, .btn-outline-secondary.dropdown-toggle.show, .btn-outline-secondary:active {
        color: #fff;
        background-color: #007F7F;
        border-color: #007F7F;
    }
</style>
@endpush
@push('script')
    <script>
      "use strict";
      $(document).ready(function(){
            $("#signUpModal").modal('show');
        });
    </script>
@endpush
