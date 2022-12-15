@extends($activeTemplate . 'layouts.master')
@section('content')
<style>
    .btn-save-continue {
        background-color: #7f007f;
        border-radius: 5px;
        border: 1px solid #7f007f;
        color: #fff;
        padding: 10px 4px;
        font-size: 13px;
        width: 150px !important;
    }
    .service--btns {
        background-color: #f8fafa;
        border-radius: 5px;
        border: 1px solid #7f007f;
        color: #7f007f;
        width: 100px !important;
    }

    .hdng-create{
        color: #007F7F;
        font-size: 18px;
        font-weight: 500;
    }
    .lbl-review {
        font-size: 13px;
        font-weight: 500;
        color: #606975;
    }
    .checkbox-review{
        cursor: pointer;
        margin: 7px;
        margin-left: 0;
        border-radius: 1px !important;
        width: fit-content;
        outline: 1.5px solid #007F7F;
        outline-style: auto;
    }
</style>
<section class="all-sections ">
    <div class="container-fluid">
        <div class="section-wrapper px-3">
            <div class="row justify-content-center mb-30-none">
                @include($activeTemplate . 'partials.seller_sidebar')
                <div class="col-xl-10 col-lg-12 px-0 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> @lang('Menu')</div>

                    <div class="card custom--card create-service-main mx-0">
                        <div class="card-header d-flex flex-wrap align-items-center justify-content-between pb-1">
                            @include($activeTemplate . 'user.seller.software.partials.tab')
                        </div>
                        <div class="panel panel-primary setup-content" id="step-1">
                            @include($activeTemplate . 'user.seller.software.partials.overview_step')
                        </div>
                        <div class=" panel panel-primary setup-content" id="step-2">
                            @include($activeTemplate . 'user.seller.software.partials.pricing_step')
                        </div>
                        <div class="panel panel-primary setup-content" id="step-3">
                            @include($activeTemplate . 'user.seller.software.partials.banner_step')
                        </div>
                        <div class="panel panel-primary setup-content" id="step-4">
                            @include($activeTemplate . 'user.seller.software.partials.requirement_step')
                        </div>
                        <div class="panel panel-primary setup-content" id="step-5">
                            @include($activeTemplate . 'user.seller.software.partials.review_step')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('style')
    <style>
        .add-another{
            margin-left:-9px;
        }
        .inline{
            display: flex;
        }
        .select2Tag input {
            background-color: transparent !important;
            padding: 0 !important;
        }

        .logo-ul {
        list-style-type: none;
        }

        .logo-li {
        display: inline-block;
        }

        input[type="checkbox"][id^="cb"] {
        display: none;
        }

        .logo-label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
        }

        .logo-label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
        }

        .logo-label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
        }

        :checked + .logo-label {
        border-color: #ddd;
        }

        :checked + .logo-label:before {
        content: "✓";
        background-color: grey;
        transform: scale(1);
        }

        :checked + .logo-label img {
        transform: scale(0.9);
        box-shadow: 0 0 5px #333;
        z-index: -1;
        }
    </style>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'frontend/css/select2.min.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset($activeTemplateTrue . 'frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'frontend/js/nicEdit.js') }}"></script>
@endpush


@push('script')
    <script>
        let route = "{{ route('user.category') }}";
    </script>
    <script src="{{ asset('/assets/resources/software/software.js') }}"></script>
    
@endpush
