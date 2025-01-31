<!DOCTYPE html>
<html lang="en">
<head>
    @yield('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/fontawesome-all.min.css')}}">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue. 'frontend/css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/resources/style/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/resources/templates/basic/frontend/css/custom/custom.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/seller_profile.css')}}">


    {{-- <link rel="stylesheet" href="{{asset('/assets/resources/style/index.scss')}}"> --}}

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/bootstrap-fileinput.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/resources/style/index.css')}}">
    @stack('style-lib')
    @stack('style')
    <link href="{{ asset($activeTemplateTrue . 'frontend/css/color.php') }}?color={{$general->base_color}}&secondColor={{$general->secondary_color}}"
          rel="stylesheet"/>
</head>
<body>
@stack('fbComment')

{{-- Start Preloader --}}
<div class="preloader">
    <div class="box-loader">
        <div class="loader animate">
            <img src="{{ asset('assets/images/loader/dureforceloader.gif') }}" alt="@lang('image')">
{{--            <svg class="circular" viewBox="50 50 100 100">--}}
{{--                <circle class="path" cx="75" cy="75" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>--}}
{{--                <line class="line" x1="127" x2="150" y1="0" y2="0" stroke="black" stroke-width="3"--}}
{{--                      stroke-linecap="round"/>--}}
{{--            </svg>--}}
        </div>
    </div>
</div>
{{-- End Preloader --}}

@if(!\Route::is('verification.notice') )
    @guest
    @include($activeTemplate.'partials.header')
    @endguest
    @auth
        @if( getLastLoginRoleId() == App\Models\Role::$Freelancer )
            @include($activeTemplate.'partials.seller_user_header')
        @elseif (getLastLoginRoleId() == App\Models\Role::$Client)
            @include($activeTemplate.'partials.client_user_header')
        @endif
    @endauth
@endif
@yield('content')
@include($activeTemplate.'partials.footer')

@php
    $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
@endphp

<!-- Modal -->
<div class="modal fade" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cookieModalLabel">@lang('Cookie Policy')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php echo @$cookie->data_values->description @endphp
                <a href="{{ @$cookie->data_values->link }}" target="_blank">@lang('Read Policy')</a>
            </div>
            <div class="modal-footer">
                <a href="{{ route('cookie.accept') }}" class="btn btn-primary">@lang('Accept')</a>
            </div>
        </div>
    </div>
</div>

<script src="{{asset($activeTemplateTrue.'frontend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/chosen.jquery.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/wow.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/main.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/select2.min.js')}}"></script>
<script src="{{asset('/assets/resources/js/general.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'frontend/js/sweet-alert.js')}}"></script>

@stack('script-lib')
@stack('script')
@include('partials.plugins')
@include('partials.notify')
<script>

    (function ($) {
        "use strict";
        $(".langSel").on("change", function () {
            window.location.href = "{{route('home')}}/change/" + $(this).val();
        });

        $(document).on("click", ".loveHeartAction", function () {
            let id = $(this).data('serviceid');
            $.ajax({
                headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}",},
                url: "{{ route('user.favorite.service') }}",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (response) {
                    if (response.success) {
                        notify('success', response.success);
                    } else {
                        $.each(response, function (i, val) {
                            notify('error', val);
                        });
                    }
                }
            });
        });


        $(document).on("click", ".loveHeartActionSoftware", function () {
            let id = $(this).data('softwareid');
            $.ajax({
                headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}",},
                url: "{{ route('user.favorite.software') }}",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (response) {
                    if (response.success) {
                        notify('success', response.success);
                    } else {
                        $.each(response, function (i, val) {
                            notify('error', val);
                        });
                    }
                }
            });
        });
    })(jQuery);

    var multipleCardCarouselServices = document.querySelector(
        "#carouselFeatureServices"
    );
    if (window.matchMedia("(min-width: 768px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarouselServices, {
            interval: false,
        });
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $("#carouselFeatureServices .carousel-control-next").on("click", function () {
            if (scrollPosition < carouselWidth - cardWidth * 3) {
                scrollPosition += cardWidth;
                $("#carouselFeatureServices .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
        $("#carouselFeatureServices .carousel-control-prev").on("click", function () {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselFeatureServices .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
    }
    var multipleCardCarouselJobs = document.querySelector(
        "#carouselFeatureJobs"
    );
    if (window.matchMedia("(min-width: 768px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarouselJobs, {
            interval: false,
        });
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $("#carouselFeatureJobs .carousel-control-next").on("click", function () {
            if (scrollPosition < carouselWidth - cardWidth * 3) {
                scrollPosition += cardWidth;
                $("#carouselFeatureJobs .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
        $("#carouselFeatureJobs .carousel-control-prev").on("click", function () {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselFeatureJobs .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
    }
    if (window.matchMedia("(min-width: 1280px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarouselServices, {
            interval: false,
        });
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $("#carouselFeatureServices .carousel-control-next").on("click", function () {
            if (scrollPosition < carouselWidth - cardWidth * 4) {
                scrollPosition += cardWidth;
                $("#carouselFeatureServices .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
        $("#carouselFeatureServices .carousel-control-prev").on("click", function () {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselFeatureServices .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
    }else {
        $(multipleCardCarouselServices).addClass("slide");
    }
    // second card home page
    var multipleCardCarouselSoftware = document.querySelector(
        "#carouselFeatureSoftware"
    );
    if (window.matchMedia("(min-width: 768px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarouselSoftware, {
            interval: false,
        });
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $("#carouselFeatureSoftware .carousel-control-next").on("click", function () {
            if (scrollPosition < carouselWidth - cardWidth * 3) {
                scrollPosition += cardWidth;
                $("#carouselFeatureSoftware .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
        $("#carouselFeatureSoftware .carousel-control-prev").on("click", function () {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselFeatureSoftware .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
    }
    if (window.matchMedia("(min-width: 1280px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarouselSoftware, {
            interval: false,
        });
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $("#carouselFeatureSoftware .carousel-control-next").on("click", function () {
            if (scrollPosition < carouselWidth - cardWidth * 4) {
                scrollPosition += cardWidth;
                $("#carouselFeatureSoftware .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
        $("#carouselFeatureSoftware .carousel-control-prev").on("click", function () {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselFeatureSoftware .carousel-inner").animate(
                    { scrollLeft: scrollPosition },
                    600
                );
            }
        });
    }else {
        $(multipleCardCarouselSoftware).addClass("slide");
    }
    // end second card
    // third card home page
        var multipleCardCarouselPublications = document.querySelector(
        "#carouselPublications"
        );
        if (window.matchMedia("(min-width: 768px)").matches) {
            var carousel = new bootstrap.Carousel(multipleCardCarouselPublications, {
                interval: false,
            });
            var carouselWidth = $(".carousel-inner")[0].scrollWidth;
            var cardWidth = $(".carousel-item").width();
            var scrollPosition = 0;
            $("#carouselPublications .carousel-control-next").on("click", function () {
                if (scrollPosition < carouselWidth - cardWidth * 3) {
                    scrollPosition += cardWidth;
                    $("#carouselPublications .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                        600
                    );
                }
            });
            $("#carouselPublications .carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselPublications .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                        600
                    );
                }
            });
        }
        if (window.matchMedia("(min-width: 1280px)").matches) {
            var carousel = new bootstrap.Carousel(multipleCardCarouselPublications, {
                interval: false,
            });
            var carouselWidth = $(".carousel-inner")[0].scrollWidth;
            var cardWidth = $(".carousel-item").width();
            var scrollPosition = 0;
            $("#carouselPublications .carousel-control-next").on("click", function () {
                if (scrollPosition < carouselWidth - cardWidth * 4) {
                    scrollPosition += cardWidth;
                    $("#carouselPublications .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                        600
                    );
                }
            });
            $("#carouselPublications .carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselPublications .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                        600
                    );
                }
            });
        }else {
            $(multipleCardCarouselPublications).addClass("slide");
        }
    // end third card
    // fourth card home page
        var multipleCardCarouselUserProfile = document.querySelector(
        "#carouselUserProfile"
        );
        if (window.matchMedia("(min-width: 768px)").matches) {
            var carousel = new bootstrap.Carousel(multipleCardCarouselUserProfile, {
                interval: false,
            });
            var carouselWidth = $(".carousel-inner")[0].scrollWidth;
            var cardWidth = $(".carousel-item").width();
            var scrollPosition = 0;
            $("#carouselUserProfile .carousel-control-next").on("click", function () {
                if (scrollPosition < carouselWidth - cardWidth * 3) {
                    scrollPosition += cardWidth;
                    $("#carouselUserProfile .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                        600
                    );
                }
            });
            $("#carouselUserProfile .carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselUserProfile .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                        600
                    );
                }
            });
        }
        if (window.matchMedia("(min-width: 1280px)").matches) {
            var carousel = new bootstrap.Carousel(multipleCardCarouselUserProfile, {
                interval: false,
            });
            var carouselWidth = $(".carousel-inner")[0].scrollWidth;
            var cardWidth = $(".carousel-item").width();
            var scrollPosition = 0;
            $("#carouselUserProfile .carousel-control-next").on("click", function () {
                if (scrollPosition < carouselWidth - cardWidth * 4) {
                    scrollPosition += cardWidth;
                    $("#carouselUserProfile .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                        600
                    );
                }
            });
            $("#carouselUserProfile .carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselUserProfile .carousel-inner").animate(
                        { scrollLeft: scrollPosition },
                        600
                    );
                }
            });
            // end fourth card
        }else {
            $(multipleCardCarouselUserProfile).addClass("slide");
        }
</script>

<style>
    .keyword-container .badge {
        color: #333746;
    }

    .keyword-container .badge:hover {
        color: #153dc7;
    }
</style>
</body>
</html>
