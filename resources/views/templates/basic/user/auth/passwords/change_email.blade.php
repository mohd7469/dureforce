@extends($activeTemplate.'layouts.frontend', ['pageTitle' => 'Change email' ])
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
                    <div class="row">
                        <div class="col-md-12 text-center">
                        <span class="mb-3">
                            <svg width="86" height="86" viewBox="0 0 86 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M79.3835 27.3452C80.0674 25.2854 80.4516 23.0924 80.4516 20.8065C80.4516 9.33377 71.1178 0 59.6452 0C53.3561 0 47.7217 2.81581 43.903 7.24064L43 6.72881L0 31.0945V86H86V31.0945L79.3835 27.3452ZM59.6452 2.77419C69.5879 2.77419 77.6774 10.8637 77.6774 20.8065C77.6774 30.7492 69.5879 38.8387 59.6452 38.8387C56.4326 38.8387 53.259 37.9635 50.4695 36.3086L49.9563 36.0035L42.2454 38.2062L44.4481 30.4953L44.143 29.9821C42.4882 27.1926 41.6129 24.019 41.6129 20.8065C41.6129 10.8637 49.7025 2.77419 59.6452 2.77419ZM41.3965 10.8249C39.7681 13.7905 38.8387 17.1917 38.8387 20.8065C38.8387 24.3158 39.7417 27.7835 41.4562 30.8712L38.2062 42.2454L49.5804 38.9955C52.6681 40.7099 56.1358 41.6129 59.6452 41.6129C67.8429 41.6129 74.9282 36.8357 78.3169 29.9294L82.1064 32.0766L43 62.0587L3.89358 32.0766L41.3965 10.8249ZM2.77419 34.7149L31.4649 56.7101L2.77419 81.5752V34.7149ZM5.1059 83.2258L33.7134 58.4342L43 65.5542L52.2866 58.4342L80.8941 83.2258H5.1059ZM83.2258 81.5752L54.5351 56.7101L83.2258 34.7149V81.5752Z"
                                    fill="#007F7F" />
                                <path
                                    d="M56.3786 35.7191C57.4647 35.9494 58.5564 36.0631 59.6411 36.0631C61.7411 36.0631 63.8121 35.6331 65.7499 34.7856L64.6388 32.2445C62.2322 33.2973 59.5745 33.5594 56.9529 33.0046C51.9982 31.9559 48.1309 27.8876 47.3292 22.8802C46.7078 18.9949 47.866 15.1388 50.5084 12.3008C53.1509 9.46417 56.9071 8.03962 60.7771 8.37252C66.4434 8.8691 71.1581 13.3078 71.9904 18.9242C72.1929 20.3002 72.1749 21.6748 71.9321 23.0106C71.5812 24.9483 69.8626 26.3548 67.843 26.3548C67.1467 26.3548 66.5807 25.7889 66.5807 25.0926V19.4194C66.5807 15.5951 63.4695 12.4839 59.6452 12.4839C55.821 12.4839 52.7098 15.5951 52.7098 19.4194V22.1936C52.7098 26.0178 55.821 29.129 59.6452 29.129H63.8065V26.3548H59.6452C57.351 26.3548 55.484 24.4878 55.484 22.1936V19.4194C55.484 17.1251 57.351 15.2581 59.6452 15.2581C61.9395 15.2581 63.8065 17.1251 63.8065 19.4194V25.0926C63.8065 27.3175 65.6181 29.129 67.843 29.129C71.2067 29.129 74.0738 26.764 74.662 23.5044C74.9574 21.8718 74.981 20.1934 74.7341 18.5178C73.7173 11.6461 67.9484 6.21697 61.0199 5.60804C56.2621 5.18914 51.7069 6.94104 48.4763 10.4088C45.2472 13.8765 43.8296 18.5829 44.5883 23.3185C45.5718 29.4509 50.3087 34.4333 56.3786 35.7191Z"
                                    fill="#007F7F" />
                                <path d="M44.387 69.3549H41.6128V72.1291H44.387V69.3549Z" fill="#007F7F" />
                                <path d="M49.9356 69.3549H47.1614V72.1291H49.9356V69.3549Z" fill="#007F7F" />
                                <path d="M38.8386 69.3549H36.0645V72.1291H38.8386V69.3549Z" fill="#007F7F" />
                            </svg>
                        </span>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="account-header col-md-12 col-sm-12 text-center">
                            <h3 class="title">
                              @lang('Verify your email to proceed')
                            </h3>
                        </div>
                    </div>
                    <form class="account-form" method="POST" action="{{route('user.change.email.verification.send')}}" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="row ml-b-20">
                                <div class="col-lg-12 form-group">
                                    <input type="email" name="email" placeholder="@lang('Email Address')" class="form-control form--control" id="code">
                                </div>

                                <div class="col-lg-12 form-group text-center mt-10">
                                    <button type="submit" class="submit-btn w-80">@lang('Send Verfication Email')</button>
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

