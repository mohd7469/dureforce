@extends($activeTemplate.'layouts.frontend')
@section('header')
    @php
        \App\Models\GeneralSetting::$showSEOTags = false;
    @endphp

    <meta itemprop="name" content="{{ __($service->title) }}">
    <meta itemprop="description" content="{{ __($service->title) }}">
    <meta itemprop="image"
          content="{{ getImage('assets/images/service/' . $service->image, imagePath()['service']['size']) }}">
    <meta name="title" Content="DureForce - {{ __($service->title) }}">
    <meta name="description" content="{{ __($service->title) }}">
    <title>DureForce - {{ __($service->title) }}</title>
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __($service->title) }}">
    <meta property="og:description" content="{{ __($service->title) }}">
    <meta property="og:image"
          content="{{ getImage('assets/images/service/' . $service->image, imagePath()['service']['size']) }}" />
@endsection
@section('content')
    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center">
                <article class="main-section">
                    <div class="section-inner">
                        <div class="item-section item-details-section">
                            <div class="container">
                                <div class="item-details-content" style="padding-top: 0px;">
                                    <h2 class="title">{{ __($service->category->name) }}</h2>
                                </div>
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-xl-9 col-lg-9 mb-30">
                                        <div class="item-details-area">
                                            <div class="item-details-box">

                                                <div class="item-details-thumb-area item-details-footer mt-0">
                                                    <div class="left mb20">
                                                        <h3 class="title">{{ __($service->title) }}</h3>
                                                        <div class="item-details-tag">
                                                            <ul class="tags-wrapper">
                                                            <!--<li class="caption">@lang('Tags')</li>-->
                                                                @foreach ($service->tag as $tags)
                                                                    <li><a href="javascript:void(0)">{{ __($tags) }}</a>
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
                                                                    <a href="http://twitter.com/share?url={{ Request::url() }}&text={{ __($service->title) }}&hashtags={{ __($service->title) }}"
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
                                                    @include($activeTemplate . 'partials._banner', [
                                                        'model' => $service,
                                                        'folder' => 'service',
                                                        'optionalFolder' => 'optionalService',
                                                    ])
                                                    {{-- slider area --}}
                                                    {{-- <div thumbsSlider="" class="item-small-slider mt-20"> --}}
                                                    {{-- <div class="swiper-wrapper"> --}}
                                                    {{-- @foreach ($service->optionalImage as $value) --}}
                                                    {{-- <div class="swiper-slide"> --}}
                                                    {{-- <div class="item-small-thumb"> --}}
                                                    {{-- <img src="{{getImage('assets/images/optionalService/'.$value->image, imagePath()['optionalService']['size']) }}" --}}
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
                                                            {!! $service->description !!}
                                                        </div>
                                                        <div class="service_subtitle2">
                                                            Attributes
                                                        </div>
                                                        <div class="sep-solid"></div>
                                                        <div class="mt-10">
                                                            @foreach ($attributes as $key => $attr)
                                                                @php
                                                                    $check = "";
                                                                    if(! empty($service->serviceDetail->entity_fields)) {
                                                                        if(array_key_exists($key, $service->serviceDetail->entity_fields)) {
                                                                            $check = $service->serviceDetail->entity_fields[$key];
                                                                        }
                                                                    }
                                                                @endphp

                                                                <h4 class="mt-20"> {{ __($attr->name ) }} </h4>

                                                                @if ($attr->field_type != true)
                                                                    @foreach ($attr->attributes as $keyBack => $back)
                                                                        @if ($back->type == 0)
                                                                            @foreach ($service->serviceAttributes as $val)
                                                                                @if( $back->id == $val->attribute_id)
                                                                                    <span class="attr"> {{ $back->name }} </span>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach

                                                                    @foreach ($attr->attributes as $keyFront => $front)
                                                                        @if ($front->type == 1)
                                                                            @foreach ($service->serviceAttributes as $val)
                                                                                @if( $front->id == $val->attribute_id)
                                                                                    <span class="attr">  {{ $front->name }} </span>
                                                                                @endif
                                                                            @endforeach

                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <!-- foreach ($service->serviceAttributes as $val)
                                                            {$val->attribute->name}
                                                        endforeach -->
                                                        <div class="service_subtitle2 mt-20">
                                                            Steps
                                                        </div>
                                                        <div class="sep-solid"></div>
                                                        <div class="simpletext">
                                                            @if ($service->serviceSteps->isNotEmpty())
                                                                @foreach ($service->serviceSteps as $serviceKey => $item)

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
                                                            @if ($service->extraService->isNotEmpty())
                                                                @foreach ($service->extraService as $extra)
                                                                    <li>
                                                                        <div style="width: 30%;">{{ __($extra->title) }}</div>
                                                                        <div style="width: 18%;">{{ __($general->cur_sym) }}{{ showAmount($extra->price) }}</div>
                                                                        <div style="width: 18%;">{{ $extra->delivery }} Days</div>
                                                                        <div style="width: 18%;"><a href="{{ route('user.service.booking', [slug($service->title), encrypt($service->id)]) }}" class="standard-btn">@lang('Add')</a>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="item-details-thumb-area2">
                                                    <div class="service_subtitle3">
                                                        About {{ __($service->user->username) }}
                                                        <span><i class="fa fa-regular fa fa-star"></i> 4.5 ({{ $service->reviewCount->count() }} Reviews)</span>
                                                    </div>
                                                    <div class="profile-widget-header">
                                                        <div class="profile-widget-author pb-20">
                                                            <div class="left">
                                                                <div class="thumb">
                                                                    <img src="{{ !empty($service->user->image)? userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $service->user->image, 'profile_image'): getImage('assets/images/default.png') }}"
                                                                         alt="{{ __($service->user->username) }}">
                                                                </div>
                                                                <div class="content mt-15">
                                                                    <h4 class="name">
                                                                        {{ __(@$service->user->designation) }}
                                                                    </h4>
                                                                    <h4 class="name">
                                                                        Architect/Consultant
                                                                    </h4>
                                                                    <span class="designation">
                                                                        {{ __(@$service->user->country_code) }}
                                                                        - 5:20pm local time</span>
                                                                </div>
                                                            </div>
                                                            <div class="right btn-area mb-10">
                                                                <a href="{{ route('profile', $service->user->username) }}"
                                                                   class="standard-btn mr-15">@lang('View Profile')</a>

                                                                <a href="{{ route('profile', $service->user->username) }}"
                                                                   class="standard-btn">@lang('View Portfolio')</a>
                                                            </div>
                                                        </div>
                                                        <div class="profile-widget-author-meta mb-10-none">
                                                        <!--<div class="location mb-10">
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                    <span>{{ __(@$service->user->address->country) }}</span>
                                                                </div>-->
                                                            <div class="location mb-10" id="aboutme">
                                                                <p class="show-read-more">
                                                                    {{ __(@$service->user->about_me) }}</p>
                                                            </div>
                                                            <!--<a href="javascript:void(0)" id="readmore" class="standard-btn-sm">Read more</a>-->
                                                            <a href="javascript:void(0)" id="readless"
                                                               class="standard-btn-sm">Read less</a>
                                                        </div>
                                                    </div>

                                                    @if ($reviews->isNotEmpty())
                                                        <div class="service_subtitle3 mt-20">Reviews & Testimonials
                                                        <span>
                                                            @if (intval($service->rating) == 1)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @elseif(intval($service->rating) == 2)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @elseif(intval($service->rating) == 3)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @elseif(intval($service->rating) == 4)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @elseif(intval($service->rating) == 5)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @endif

                                                            {{ showAmount($service->rating) }} ({{ $service->reviewCount->count() }} Reviews)</span>

                                                        </div>
                                                        @foreach ($reviews as $review)
                                                            <div class="test_container">
                                                                <div class="thumb">
                                                                    <img src="{{ !empty($review->user->image)? userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $review->user->image, 'profile_image'): getImage('assets/images/default.png') }}"
                                                                         alt="@lang('client')">
                                                                    <span>{{ @$review->user->fullname }}</span>
                                                                </div>
                                                                <p class="mt-10">{{ __($review->review) }}</p>
                                                                <p class="mt-2"><span class="mr-15">
                                                                            @if (intval($review->rating) == 1)
                                                                            <i class="las la-star"></i>
                                                                        @elseif(intval($review->rating) == 2)
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                        @elseif(intval($review->rating) == 3)
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                        @elseif(intval($review->rating) == 4)
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                        @elseif(intval($review->rating) == 5)
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                            <i class="las la-star"></i>
                                                                        @endif
                                                                        </span>
                                                                    <span>{{ showDateTime($review->created_at, 'd M Y') }}</span>
                                                                </p>
                                                            </div>
                                                    @endforeach
                                                @endif
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 mb-30">
                                        <div class="sidebar">
                                            <div class="widget custom-widget mb-30">

                                                <ul class="sidebar-title1">
                                                    <li><span>@lang('Price')</span>
                                                        <span>${{ showAmount($service->price) }}/hr</span>
                                                    </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                    <li><span>@lang('Estimated Delivery Time')</span>
                                                        <span>{{ __($service->delivery_time) }} @lang('Hours')</span>
                                                    </li>
                                                </ul>

                                                <ul class="sidebar-list">
                                                    <li><span>@lang('Number of Revisions')</span>
                                                        <span>10</span>
                                                    </li>
                                                    @if (!empty($service->_decoded_deliverables()))
                                                        @foreach ($service->_decoded_deliverables() as $delivery)
                                                            <li><span> {{ $delivery }}</span>
                                                        <span><i class="fa fa-regular fa fa-check"
                                                                 style="color: #4c9d97;font-size: 18px;"></i></span>
                                                            </li>
                                                        @endforeach
                                                    @endif
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
                                        </div>
                                    </div>
                                </div>

                                @if ($otherServices->isNotEmpty())
                                    <div class="item-bottom-area pt-50">
                                        <div class="row justify-content-center">
                                            <!--<div class="col-xl-12">-->
                                            <div class="col-xl-11">
                                                <div class="section-header">
                                                <!--<h2 class="section-title">@lang('Other services by')
                                                {{ __($service->user->username) }}</h2>-->
                                                    <h2 class="section-title">@lang('Related Services')</h2>
                                                </div>
                                                <div class="item-card-wrapper border-0 p-0 grid-view">
                                                    @foreach ($otherServices as $other)
                                                        <div class="item-card">
                                                            <div class="item-card-thumb">
                                                                <img src="{{ getImage('assets/images/service/' . $other->image, imagePath()['service']['size']) }}"
                                                                     alt="@lang('service-banner')">
                                                                @if ($other->featured == 1)
                                                                    <div class="item-level">@lang('Featured')</div>
                                                                @endif
                                                            </div>
                                                            <div class="item-card-content">
                                                                <div class="item-card-content-top">
                                                                    <h3 class="item-card-title"><a
                                                                                href="{{ route('service.details', [slug($other->title), encrypt($other->id)]) }}">{{ __($other->title) }}</a>
                                                                    </h3>
                                                                    <div class="item-details-tag">
                                                                        <ul class="tags-wrapper">
                                                                        <!--<li class="caption">@lang('Tags')</li>-->
                                                                            @foreach ($other->tag as $tags)
                                                                                <li>
                                                                                    <a
                                                                                            href="javascript:void(0)">{{ __($tags) }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                    <div class="left">
                                                                    <!--<div class="author-thumb">
                                                                                <img src="{{ !empty($other->user->image)? userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $other->user->image, 'profile_image'): getImage('assets/images/default.png') }}"
                                                                                    alt="@lang('author')">
                                                                            </div>-->
                                                                        <div class="author-content">
                                                                            <h5 class="name"><a
                                                                                        href="{{ route('profile', $other->user->username) }}">by
                                                                                    {{ __($other->user->username) }}</a>
                                                                                <span
                                                                                        class="level-text">{{ __(@$other->user->rank->level) }}</span>
                                                                            </h5>
                                                                            <br>
                                                                            <h5 class="name">Delivered
                                                                                in {{ __($other->delivery_time) }}
                                                                                days</h5>
                                                                        <!--<div class="ratings">
                                                                                    <i class="fas fa-star"></i>
                                                                                    <span
                                                                                        class="rating me-2">{{ __(getAmount($other->rating, 2)) }}</span>
                                                                                </div>-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="right">
                                                                        <div class="item-amount-"
                                                                             style="float: right;background-color: #630573;padding: 10px;color: #fff;border-radius: 5px;">
                                                                            <span>{{ __($general->cur_sym) }}{{ showAmount($other->price) }}
                                                                                <br>per hour</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    @include($activeTemplate . 'partials.end_ad')
    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">@lang('Start new conversation')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.conversation.store') }}">
                        @csrf
                        <input type="hidden" name="recevier_id" value="{{ $service->user_id }}">

                        <div class="form-group">
                            <label for="subject" class="font-weight-bold">@lang('Subject')</label>
                            <input type="text" class="form-control" name="subject" placeholder="@lang('Enter Subject')"
                                   maxlength="255" required>
                        </div>

                        <div class="form-group">
                            <label for="message" class="font-weight-bold">@lang('Message')</label>
                            <textarea rows="8" class="form-control" name="message" maxlength="500" placeholder="@lang('Enter Message')"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn--base" style="width:100%;">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--danger btn-rounded text-white"
                            data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
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

    $('.commentMore').on('click', function() {
        var link = $(this).data('link');
        var page = $(this).data('page');
        var href = link + page;
        var commentCount = {{ $comments->total() }};
        $.get(href, function(response) {
            var html = $(response).find("#commentShow").html();
            $("#commentShow").append(html);
            var loadMoreCount = 7 * page;
            if (loadMoreCount > commentCount) {
                $('.commentMore').hide()
            }
        });
        $(this).data('page', (parseInt(page) + 1));

    });

    $('.reviewMore').on('click', function() {
        var link = $(this).data('link');
        var page = $(this).data('page');
        var href = link + page;
        var reviewCount = {{ $reviews->total() }};
        $.get(href, function(response) {
            var html = $(response).find("#reviewShow").html();
            $("#reviewShow").append(html);
            var loadMoreCount = 7 * page;
            if (loadMoreCount > reviewCount) {
                $('.reviewMore').hide()
            }
        });
        $(this).data('page', (parseInt(page) + 1));
    });
</script>
@endpush
