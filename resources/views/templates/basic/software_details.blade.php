@extends($activeTemplate.'layouts.frontend')
@section('content')
    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center">
                <article class="main-section">
                    <div class="section-inner">
                        <div class="item-section item-details-section">
                            <div class="container">
                                <div class="item-details-content" style="padding-top: 0px;">
                                    <h2 class="title">{{ __($software->category->name) }}</h2>
                                </div>
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-xl-9 col-lg-9 mb-30">
                                        <div class="item-details-area">
                                            <div class="item-details-box">
                                                <div class="item-details-thumb-area item-details-footer mt-0">
                                                    <div class="left mb20">
                                                        <h3 class="title">{{ __($software->title) }}</h3>
                                                        <div class="item-details-tag">
                                                            <ul class="tags-wrapper">
                                                            <!--<li class="caption">@lang('Tags')</li>-->
                                                                @foreach ($software->tags as $tag)
                                                                    <li><a
                                                                                href="javascript:void(0)">{{ __($tag->name) }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="right mb-20">
                                                        <div class="social-area">
                                                            <ul class="footer-social">
                                                                <li>
                                                                    <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}"
                                                                       target="__blank"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="http://twitter.com/share?url={{ Request::url() }}&text={{ __($software->title) }}&hashtags={{ __($software->title) }}"
                                                                       target="__blank"><i class="fab fa-twitter"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}"
                                                                       target="__blank"><i
                                                                                class="fab fa-linkedin-in"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    {{-- slider area --}}
                                                    @include($activeTemplate . 'partials._banner-listing', [
                                                        'model' => $software,
                                                        'folder' => 'software',
                                                        'optionalFolder' => 'optionalSoftware',
                                                    ])
                                                    {{-- <div class="item-details-slider-area"> --}}
                                                    {{-- <div class="item-details-slider"> --}}
                                                    {{-- <div class="swiper-wrapper"> --}}
                                                    {{-- <div class="swiper-slide"> --}}
                                                    {{-- <div class="item-details-thumb"> --}}
                                                    {{-- <img src="{{getImage('assets/images/software/'.$software->image, imagePath()['software']['size']) }}" --}}
                                                    {{-- alt="@lang('item-banner')"> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    {{-- @foreach ($software->optionalImage as $value) --}}
                                                    {{-- <div class="swiper-slide"> --}}
                                                    {{-- <div class="item-details-thumb"> --}}
                                                    {{-- <img src="{{getImage('assets/images/screenshot/'.$value->image, imagePath()['screenshot']['size']) }}" --}}
                                                    {{-- alt="@lang('item-banner')"> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    {{-- @endforeach --}}
                                                    {{-- </div> --}}
                                                    {{-- <div class="slider-prev"> --}}
                                                    {{-- <i class="las la-angle-left"></i> --}}
                                                    {{-- </div> --}}
                                                    {{-- <div class="slider-next"> --}}
                                                    {{-- <i class="las la-angle-right"></i> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    {{-- <div thumbsSlider="" class="item-small-slider mt-20"> --}}
                                                    {{-- <div class="swiper-wrapper"> --}}
                                                    {{-- @foreach ($software->optionalImage as $value) --}}
                                                    {{-- <div class="swiper-slide"> --}}
                                                    {{-- <div class="item-small-thumb"> --}}
                                                    {{-- <img src="{{getImage('assets/images/screenshot/'.$value->image, imagePath()['screenshot']['size']) }}" --}}
                                                    {{-- alt="@lang('item-banner')"> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    {{-- @endforeach --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    <div class="item-details-content">
                                                        <div class="service_subtitle1 mt-20">{{ $pageTitle }}</div>
                                                        <div class="service_subtitle2">
                                                            Description
                                                        </div>
                                                        <div class="sep-solid"></div>
                                                        <div class="product-desc-content">
                                                            {!! $software->description !!}
                                                        </div>
                                                       
                                                       
                                                        <div class="service_subtitle2 mt-20">
                                                            Steps
                                                        </div>
                                                        <div class="sep-solid"></div>
                                                        <div class="simpletext">
                                                            @if ($software->softwareSteps->isNotEmpty())
                                                                @foreach ($software->softwareSteps as $softwareKey => $item)
                                                                    <h5> {{ $item->name }} </h5>
                                                                    {{ $item->description }}
                                                                @endforeach
                                                            @endif

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="item-details-thumb-area2">
                                                    <div class="service_subtitle1">Add-Ons</div>
                                                    <div class="service_subtitle3">
                                                        <ul class="service-table-title">
                                                            <li>
                                                                <p>@lang('Add-On Name & Description')</p>
                                                                <p>@lang('Per Hour')</p>
                                                                <p>@lang('Estimated Delivery Time')</p>
                                                                <p></p>
                                                                <p></p>
                                                            </li>
                                                        </ul>

                                                        <ul class="service-table">
                                                            @if ($software->modules->isNotEmpty())
                                                                @foreach ($software->modules as $module)
                                                                    <li>
                                                                        <div style="width: 30%;">{{ __($module->name) }}</div>
                                                                        <div style="width: 18%;">{{ showAmount($module->start_price) }}</div>
                                                                        <div style="width: 18%;">{{ $module->estimated_lead_time }} Days</div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>

                                                </div>

                                                <div class="item-details-thumb-area2">
                                                    <div class="service_subtitle3">
                                                        About {{ __($software->user->username) }}
                                                        <span><i class="fa fa-regular fa fa-star"></i> 4.5 ({{ $software->reviewCount->count() }} Reviews)</span>
                                                    </div>
                                                    <div class="profile-widget-header">
                                                        <div class="profile-widget-author pb-20">
                                                            <div class="left">
                                                                <div class="thumb">
                                                                    <img src="{{ !empty($software->user->image)? userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $software->user->image, 'profile_image'): getImage('assets/images/default.png') }}"
                                                                         alt="{{ __($software->user->username) }}">
                                                                </div>
                                                                <div class="content mt-15">
                                                                    <h4 class="name">
                                                                        {{ __(@$software->user->designation) }}
                                                                    </h4>
                                                                    <h4 class="name">
                                                                        Architect/Consultant
                                                                    </h4>
                                                                    <span class="designation">
                                                                        {{ __(@$software->user->country_code) }}
                                                                        - 5:20pm local time</span>
                                                                </div>
                                                            </div>
                                                            <div class="right btn-area mb-10">
                                                                <a href="{{ route('profile', $software->user->username) }}"
                                                                   class="standard-btn mr-15">@lang('View Profile')</a>

                                                                <a href="{{ route('profile', $software->user->username) }}"
                                                                   class="standard-btn">@lang('View Portfolio')</a>
                                                            </div>
                                                        </div>
                                                        <div class="profile-widget-author-meta mb-10-none">
                                                        <!--<div class="location mb-10">
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                    <span>{{ __(@$software->user->address->country) }}</span>
                                                                </div>-->
                                                            <div class="location mb-10" id="aboutme">
                                                                <p class="show-read-more">
                                                                    {{ __(@$software->user->about_me) }}</p>
                                                            </div>
                                                            <!--<a href="javascript:void(0)" id="readmore" class="standard-btn-sm">Read more</a>-->
                                                            <a href="javascript:void(0)" id="readless"
                                                               class="standard-btn-sm">Read less</a>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 mb-30">
                                        <div class="sidebar">
                                            <div class="widget custom-widget text-center mb-30">
                                                <ul class="sidebar-title2">
                                                    <li><span>@lang('Estimated Delivery Time')</span>
                                                        <span>{{ __($software->delivery_time) }} @lang('Hours')</span>
                                                    </li>
                                                </ul>

                                                <ul class="sidebar-list">
                                                    <li><span>@lang('Number of Revisions')</span>
                                                        <span>10</span>
                                                    </li>
                                                    {{-- @if (!empty($software->deliverables()))
                                                        @foreach ($software->deliverables() as $delivery)
                                                            <li><span> {{ $delivery }}</span>
                                                        <span><i class="fa fa-regular fa fa-check"
                                                                 style="color: #4c9d97;font-size: 18px;"></i></span>
                                                            </li>
                                                        @endforeach
                                                    @endif --}}
                                                </ul>

                                                <div class="widget-btn- mt-20">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                       data-bs-target="#depoModal" class="standard-btn mr-15">@lang('Book
                                                        Developer')</a>

                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                       data-bs-target="#depoModal"
                                                       class="standard-btn">@lang('Message')</a>
                                                </div>
                                               
                                            </div>
<!--
                                            <div class="widget custom-widget mb-30">
                                                <h3 class="widget-title">@lang('PRODUCT DETAILS')</h3>
                                                <ul class="details-list">
                                                    <li><span>@lang('First release')</span>
                                                        <span>{{ showDateTime($software->created_at, 'd M Y') }}</span>
                                                    </li>

                                                    <li><span>@lang('Last update')</span>
                                                        <span>{{ showDateTime($software->updated_at, 'd M Y') }}</span>
                                                    </li>
                                                    <li><span>@lang('Documentation')</span>
                                                        <span>@lang('Well Documented')</span>
                                                    </li>

                                                    <li><span>@lang('Files Included')</span> <span>
                                                            @if (!empty($software->file_include))
                                                                @foreach ($software->file_include as $name)
                                                                    {{ $name }},
                                                                @endforeach
                                                            @endif
                                                        </span></li>

                                                </ul>
                                            </div>-->

<!--
                                            <div class="widget">
                                                <div class="profile-widget">
                                                    <div class="profile-widget-header">
                                                        <div class="profile-widget-thumb">
                                                            <img src="{{ userDefaultImage(imagePath()['profile']['user_bg']['path'] . '/' . $software->user->bg_image,'background_image') }}"
                                                                alt="@lang('User background image')">
                                                        </div>
                                                        <div class="profile-widget-author">
                                                            <div class="thumb">
                                                                <img src="{{ userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $software->user->image, 'profile_image') }}"
                                                                    alt="{{ __($software->user->username) }}">
                                                            </div>
                                                            <div class="content">
                                                                <h4 class="name">
                                                                    <a
                                                                        href="{{ route('profile', $software->user->username) }}">{{ __($software->user->username) }}</a>
                                                                </h4>
                                                                <span
                                                                    class="designation">{{ __(@$software->user->designation) }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-widget-author-meta mb-10-none">
                                                            <div class="location mb-10">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                <span>{{ __(@$software->user->address->country) }}</span>
                                                            </div>
                                                            <div class="btn-area mb-10">
                                                                <a href="{{ route('profile', $software->user->username) }}"
                                                                    class="btn--base">@lang('View Profile')</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                </div>


                                {{-- @if ($otherServices->isNotEmpty())
                                    <div class="item-bottom-area pt-50">
                                        <div class="row justify-content-center">
                                            <!--<div class="col-xl-12">-->
                                            <div class="col-xl-11">
                                                <div class="section-header">
                                                <!--<h2 class="section-title">@lang('Other Softwares by')
                                                {{ __($software->user->username) }}</h2>-->
                                                    <h2 class="section-title">@lang('Related Softwares')</h2>
                                                </div>
                                                <div class="item-card-wrapper border-0 p-0 grid-view">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    @include($activeTemplate . 'partials.end_ad')
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $("#readless").hide();
        var maxLength = 700;
        $(".show-read-more").each(function() {
            var myStr = $(this).text();
            if ($.trim(myStr).length > maxLength) {
                var newStr = myStr.substring(0, maxLength);
                //var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                var removedStr = myStr.substring(maxLength, (myStr).length);
                $(this).empty().html(newStr);
                //$(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
                $(this).append(
                        '<a href="javascript:void(0)" id="readmore" class="standard-btn-sm" style="margin-left: 10px;">Read more</a>'
                );
                $(this).append('<span class="more-text">' + removedStr + '</span>');
                //$(".more-text").hide();
            }
        });
        //$(".read-more").click(function(){
        $("#readmore").click(function() {
            $(this).siblings(".more-text").contents().unwrap();
            //$("#readless").show();
            $("#readmore").hide();
            //$(this).hide();
            //$(".show-read-more").append('<a href="javascript:void(0)" id="readless" class="standard-btn-sm">Read less</a>');
        });
        $("#readless").click(function() {
            $(".more-text").hide();
            //$("#readmore").show();
            $("#readless").hide();
            $(".show-read-more").append(
                    '<a href="javascript:void(0)" id="readmore" class="standard-btn-sm">Read more</a>');
        });
    });
</script>
    <script>
        'use strict';
        var swiper = new Swiper(".item-small-slider", {
            loop: true,
            spaceBetween: 30,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".item-details-slider", {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.slider-next',
                prevEl: '.slider-prev',
            },
            thumbs: {
                swiper: swiper,
            },
        });

      
    </script>
@endpush
