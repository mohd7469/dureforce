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
                                                                @foreach ($software->tag as $tags)
                                                                    <li><a
                                                                                href="javascript:void(0)">{{ __($tags) }}</a>
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
                                                        <div class="service_subtitle2">
                                                            Attributes
                                                        </div>
                                                        <div class="sep-solid"></div>
                                                        <div class="mt-10">

                                                            @foreach ($attributes as $key => $attr)
                                                                    
                                                                @php
                                                                    $check = "";
                                                                    if(! empty($software->softwareDetail->entity_fields)) {
                                                                        if(array_key_exists($key, $software->softwareDetail->entity_fields)) {
                                                                            $check = $software->softwareDetail->entity_fields[$key];
                                                                        }
                                                                    }
                                                                @endphp

                                                                <h4 class="mt-20"> {{ __($attr->name ) }} </h4>

                                                                @if ($attr->field_type != true)
                                                                    @foreach ($attr->attributes as $keyBack => $back)
                                                                        @if ($back->type == 0)
                                                                            @foreach ($software->softwareAttributes as $val)
                                                                                @if( $back->id == $val->attribute_id)
                                                                                    <span class="attr"> {{ $back->name }}raksh </span>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach

                                                                    @foreach ($attr->attributes as $keyFront => $front)
                                                                        @if ($front->type == 1)
                                                                            @foreach ($software->softwareAttributes as $val)
                                                                                @if( $front->id == $val->attribute_id)
                                                                                    <span class="attr">  {{ $front->name }} asm</span>
                                                                                @endif
                                                                            @endforeach

                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach

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

                                                                    <h5>Step1: Requirement Gathering</h5>
                                                                    Stores semi-structure data with high availability with a
                                                                    flexible data scheme. Uses Azure Cosmos DB to take advantage
                                                                    of global distribution, automatic indexing, and OData-based
                                                                    rich queries. Stores semi-structure data with high
                                                                    availability with a flexible data scheme. Uses Azure Cosmos
                                                                    DB to take advantage of global distribution, automatic
                                                                    indexing, and OData-based rich queries.

                                                                    <h5>Step2: Requirement Analysis</h5>
                                                                    Stores semi-structure data with high availability with a
                                                                    flexible data scheme. Uses Azure Cosmos DB to take advantage
                                                                    of global distribution, automatic indexing, and OData-based
                                                                    rich queries. Stores semi-structure data with high
                                                                    availability with a flexible data scheme. Uses Azure Cosmos
                                                                    DB to take advantage of global distribution, automatic
                                                                    indexing, and OData-based rich queries.

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
                                                            @if ($software->extraSoftware->isNotEmpty())
                                                                @foreach ($software->extraSoftware as $extra)
                                                                    <li>
                                                                        <div style="width: 30%;">{{ __($extra->title) }}</div>
                                                                        <div style="width: 18%;">{{ __($general->cur_sym) }}{{ showAmount($extra->price) }}</div>
                                                                        <div style="width: 18%;">{{ $extra->delivery }} Days</div>
                                                                        <div style="width: 18%;"><a href="{{ route('user.service.booking', [slug($software->title), encrypt($software->id)]) }}" class="standard-btn">@lang('Add')</a>
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

                                                    @if ($reviews->isNotEmpty())
                                                        <div class="service_subtitle3 mt-20">Reviews & Testimonials
                                                        <span>
                                                            @if (intval($software->rating) == 1)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @elseif(intval($software->rating) == 2)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @elseif(intval($software->rating) == 3)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @elseif(intval($software->rating) == 4)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @elseif(intval($software->rating) == 5)
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                                <i class="fa fa-regular fa fa-star text--warning"></i>
                                                            @endif

                                                            {{ showAmount($software->rating) }} ({{ $software->reviewCount->count() }} Reviews)</span>

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
                                                <!--<div class="test_container">
                                                        <div class="thumb">
                                                            <img src="{{ !empty($software->user->image)? userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $software->user->image, 'profile_image'): getImage('assets/images/default.png') }}"
                                                                 alt="">
                                                            <span>Rebecca Flex</span>
                                                        </div>
                                                        <p class="mt-10">Completed changes to website as expected.
                                                            And,
                                                            even cleaned up some things I didn't ask for such as fonts
                                                            and colors. Looks great and within the timelines I
                                                            needed.</p>
                                                        <p class="mt-2"><span class="mr-15"><i
                                                                        class="fa fa-regular fa fa-star"
                                                                        style="color:orange"></i> 4.5</span> <span>11 jan
                                                                2021</span>
                                                        </p>
                                                    </div>-->
                                                </div>
                                            </div>
                                            <!--
                                            <div class="product-tab mt-40">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="des-tab" data-bs-toggle="tab"
                                                            data-bs-target="#des" type="button" role="tab"
                                                            aria-controls="des"
                                                            aria-selected="true">@lang('Description')</button>
                                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                                            data-bs-target="#review" type="button" role="tab"
                                                            aria-controls="review" aria-selected="false">@lang('Reviews')
                                                            ({{ $software->reviewCount->count() }})
                                                        </button>
                                                        <button class="nav-link" id="comment-tab" data-bs-toggle="tab"
                                                            data-bs-target="#comment" type="button" role="tab"
                                                            aria-controls="comment" aria-selected="false">@lang('Buyer
                                                            Comments')</button>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">


                                                    <div class="tab-pane fade show active" id="des" role="tabpanel"
                                                        aria-labelledby="des-tab">
                                                        <div class="product-desc-content">
                                                            @php echo $software->description @endphp
                                                        </div>

                                                        <div class="item-details-tag">
                                                            <ul class="tags-wrapper">
                                                                <li class="caption">@lang('Tags')</li>
                                                                @foreach ($software->tag as $tags)
                                                                    <li><a href="javascript:void(0)">{{ __($tags) }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="review" role="tabpanel"
                                                        aria-labelledby="review-tab">
                                                        <div class="product-reviews-content">
                                                            <div class="item-review-widget-wrapper">
                                                                <div class="left">
                                                                    <h2 class="title text-white">
                                                                        {{ showAmount($software->rating) }}</h2>
                                                                    <div class="ratings">
                                                                        @if (intval($software->rating) == 1)
                                                                            <i class="las la-star text--warning"></i>
                                                                        @elseif(intval($software->rating) == 2)
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                        @elseif(intval($software->rating) == 3)
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                        @elseif(intval($software->rating) == 4)
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                        @elseif(intval($software->rating) == 5)
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                            <i class="las la-star text--warning"></i>
                                                                        @endif
                                                                    </div>
                                                                    <span
                                                                        class="sub-title text-white">{{ $software->reviewCount->count() }}
                                                                        @lang('reviews')</span>
                                                                </div>
                                                                <div class="right">
                                                                    <ul class="list">
                                                                        <li>
                                                                            <span class="caption">
                                                                                <i
                                                                                    class="fas fa-thumbs-up text--success"></i>
                                                                                @lang('Total Likes')
                                                                            </span>
                                                                            <span
                                                                                class="value">{{ $software->likes }}</span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="caption">
                                                                                <i
                                                                                    class="fas fa-thumbs-down text--danger"></i>
                                                                                @lang('Total Dislikes')
                                                                            </span>
                                                                            <span
                                                                                class="value">{{ $software->dislike }}</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @if ($softwareGetRating)
                                                                <div class="comment-form-area mb-40">
                                                                    <form class="comment-form"
                                                                        action="{{ route('user.review.store') }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="software_id"
                                                                            value="{{ $software->id }}">
                                                                        <div
                                                                            class="comment-ratings-area d-flex flex-wrap align-items-center justify-content-between">
                                                                            <div class="rating">
                                                                                <input type="radio" id="star1" name="rating"
                                                                                    value="5" /><label for="star1"
                                                                                    title="Rocks!">&nbsp;</label>
                                                                                <input type="radio" id="star2" name="rating"
                                                                                    value="4" /><label for="star2"
                                                                                    title="Pretty good">&nbsp;</label>
                                                                                <input type="radio" id="star3" name="rating"
                                                                                    value="3" /><label for="star3"
                                                                                    title="Meh">&nbsp;</label>
                                                                                <input type="radio" id="star4" name="rating"
                                                                                    value="2" /><label for="star4"
                                                                                    title="Kinda bad">&nbsp;</label>
                                                                                <input type="radio" id="star5" name="rating"
                                                                                    value="1" /><label for="star5"
                                                                                    title="Sucks big time">&nbsp;</label>
                                                                            </div>

                                                                            <div class="like-dislike">
                                                                                <div
                                                                                    class="d-flex flex-wrap align-items-center justify-content-sm-end">
                                                                                    <div class="like-dislike me-4">
                                                                                        <input type="radio" name="like"
                                                                                            value="1" id="review-like">
                                                                                        <label for="review-like"
                                                                                            class="mb-0"><i
                                                                                                class="fas fa-thumbs-up"></i></label>
                                                                                    </div>
                                                                                    <div class="like-dislike">
                                                                                        <input type="radio" name="like"
                                                                                            value="0" id="review-dislike">
                                                                                        <label for="review-dislike"
                                                                                            class="mb-0"><i
                                                                                                class="fas fa-thumbs-down"></i></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <textarea class="form-control h-auto" name="review" placeholder="@lang('Write Review')" rows="8" required=""></textarea>
                                                                        <button type="submit"
                                                                            class="submit-btn mt-20">@lang('Post Your
                                                                            Review')</button>
                                                                    </form>
                                                                </div>
                                                            @endif

                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <h3 class="reviews-title">
                                                                        {{ $software->reviewCount->count() }}
                                                                        @lang('reviews')</h3>
                                                                    <ul class="comment-list" id="reviewShow">

                                                                        @foreach ($reviews as $review)
                                                                            <li class="comment-container d-flex flex-wrap">
                                                                                <div class="comment-avatar">
                                                                                    <img src="{{ userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $review->user->image, 'profile_image') }}"
                                                                                        alt="@lang('client')">
                                                                                </div>
                                                                                <div class="comment-box">
                                                                                    <div class="ratings-container">
                                                                                        <div class="product-ratings">
                                                                                            @if (intval($review->rating) == 1)
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                            @elseif(intval($review->rating) == 2)
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                            @elseif(intval($review->rating) == 3)
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                            @elseif(intval($review->rating) == 4)
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                            @elseif(intval($review->rating) == 5)
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                                <i
                                                                                                    class="las la-star"></i>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="comment-info mb-1">
                                                                                        <h4 class="avatar-name">
                                                                                            {{ $review->user->fullname }}
                                                                                        </h4>
                                                                                        -
                                                                                        <span
                                                                                            class="comment-date">{{ showDateTime($review->created_at, 'd M Y') }}</span>
                                                                                    </div>
                                                                                    <div class="comment-text">
                                                                                        <p>{{ __($review->review) }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>

                                                                    @if ($reviews->total() > 7)
                                                                        <div class="view-more-btn text-center mt-4">
                                                                            <a href="javascript:void(0)"
                                                                                class="btn--base reviewMore" data-page="2"
                                                                                data-link="{{ route('software.details', [slug($software->title), encrypt($software->id)]) }}?page=">
                                                                                @lang('View More')</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="comment" role="tabpanel"
                                                        aria-labelledby="comment-tab">
                                                        <div class="product-reviews-content product-comment-content">
                                                            <div class="comment-form-area mb-40">
                                                                <form class="comment-form" method="POST"
                                                                    action="{{ route('user.comment.store') }}">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $software->id }}"
                                                                        name="software_id">
                                                                    <textarea class="form-control h-auto" name="comment" placeholder="@lang('Write Comment')" rows="8"
                                                                        required=""></textarea>
                                                                    <button type="submit"
                                                                        class="submit-btn mt-20">@lang('Post
                                                                        Comment')</button>
                                                                </form>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <h3 class="reviews-title">{{ $comments->count() }}
                                                                        @lang('comments')</h3>
                                                                    <ul class="comment-list" id="commentShow">
                                                                        @foreach ($comments as $comment)
                                                                            <li class="comment-container d-flex flex-wrap">
                                                                                <div class="comment-avatar">
                                                                                    <img src="{{ userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $comment->user->image, 'profile_image') }}"
                                                                                        alt="@lang('client')">
                                                                                </div>
                                                                                <div class="comment-box">
                                                                                    <div
                                                                                        class="comment-top-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                                                                        <div class="left">
                                                                                            <div class="comment-info">
                                                                                                <h4 class="avatar-name">
                                                                                                    {{ __($comment->user->username) }}
                                                                                                </h4>
                                                                                                -
                                                                                                <span
                                                                                                    class="comment-date">{{ showDateTime($comment->created_at, 'd M Y') }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="comment-text">
                                                                                        <p>{{ __($comment->comments) }}</p>
                                                                                    </div>
                                                                                    <button class="reply-btn mt-20">
                                                                                        <i class="fas fa-reply"></i>
                                                                                        <span>@lang('Reply')</span>
                                                                                    </button>
                                                                                    <div
                                                                                        class="reply-form-area mt-30 mb-40">
                                                                                        <form class="comment-form"
                                                                                            method="POST"
                                                                                            action="{{ route('user.comment.reply') }}">
                                                                                            @csrf
                                                                                            <input type="hidden"
                                                                                                value="{{ $comment->id }}"
                                                                                                name="comment_id">
                                                                                            <input type="hidden"
                                                                                                value="{{ $software->id }}"
                                                                                                name="software_id">
                                                                                            <textarea class="form-control h-auto" placeholder="@lang('Write Reply')" rows="8" name="comment"
                                                                                                required=""></textarea>
                                                                                            <button type="submit"
                                                                                                class="submit-btn mt-20">@lang('Comment')</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            @foreach ($comment->commentReply as $replyComment)
                                                                                <li
                                                                                    class="comment-container reply-container d-flex flex-wrap">
                                                                                    <div class="comment-avatar">
                                                                                        <img src="{{ userDefaultImage(imagePath()['profile']['user']['path'] . '/' . $replyComment->user->image, 'profile_image') }}"
                                                                                            alt="@lang('client')">
                                                                                    </div>
                                                                                    <div class="comment-box">
                                                                                        <div
                                                                                            class="comment-top-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                                                                            <div class="left">
                                                                                                <div
                                                                                                    class="comment-info">
                                                                                                    <h4
                                                                                                        class="avatar-name">
                                                                                                        {{ __($replyComment->user->username) }}
                                                                                                    </h4>
                                                                                                    -
                                                                                                    <span
                                                                                                        class="comment-date">{{ showDateTime($replyComment->created_at, 'd M Y') }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="comment-text">
                                                                                            <p>{{ __($replyComment->comments) }}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                @if ($comments->total() > 7)
                                                                    <div class="view-more-btn text-center mt-4">
                                                                        <a href="javascript:void(0)"
                                                                            class="btn--base commentMore" data-page="2"
                                                                            data-link="{{ route('software.details', [slug($software->title), encrypt($software->id)]) }}?page=">
                                                                            @lang('View More')</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
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
                                                    @if (!empty($software->_decoded_deliverables()))
                                                        @foreach ($software->_decoded_deliverables() as $delivery)
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
                                                <!--
                                                <h3>
                                                    <i class="fas fa-shopping-cart"></i> {{ $softwareSales }}
                                                    @lang('Sales')
                                                </h3>-->
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
                                                    <div class="profile-list-area">
                                                        <ul class="details-list">
                                                            <li><span>@lang('Total Software')</span>
                                                                <span>{{ __($totalService) }}</span>
                                                            </li>
                                                            <li><span>@lang('In Progress')</span>
                                                                <span>{{ $workInprogress }}</span>
                                                            </li>
                                                            <li><span>@lang('Rating')</span> <span> <span
                                                                        class="ratings"><i
                                                                            class="las la-star text--warning"></i></span>
                                                                    ({{ getAmount($reviewRataingAvg, 2) }})</span>
                                                            </li>
                                                            <li><span>@lang('Member Since')</span>
                                                                <span>{{ showDateTime($software->user->created_at, 'd M Y') }}</span>
                                                            </li>
                                                            <li><span>@lang('Verified User')</span>
                                                                @if ($software->user->status == 1)
                                                                    <span class="text--success">@lang('Yes')</span>
                                                                @else
                                                                    <span class="text--danger">@lang('No')</span>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                        <div class="widget-btn mt-20">
                                                            <a href="{{ route('profile', $software->user->username) }}"
                                                                class="btn--base w-100">@lang('Hire Me')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                </div>


                                @if ($otherServices->isNotEmpty())
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
                                                    @foreach ($otherServices as $other)
                                                        <div class="item-card">
                                                            <div class="item-card-thumb">
                                                                <img src="{{ getImage('assets/images/software/' . $other->image, imagePath()['software']['size']) }}"
                                                                     alt="@lang('software-banner')">
                                                                @if ($other->featured == 1)
                                                                    <div class="item-level">@lang('Featured')</div>
                                                                @endif
                                                            </div>
                                                            <div class="item-card-content">
                                                                <div class="item-card-content-top">
                                                                    <h3 class="item-card-title"><a
                                                                                href="{{ route('software.details', [slug($other->title), encrypt($other->id)]) }}">{{ __($other->title) }}</a>
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
                                                        <!--<div class="item-card-footer">
                                                                    <div class="left">
                                                                        <a href="javascript:void(0)"
                                                                            class="item-love me-2 loveHeartAction"
                                                                            data-serviceid="{{ $other->id }}"><i
                                                                                class="fas fa-heart"></i> <span
                                                                                class="give-love-amount">({{ __($other->favorite) }})</span></a>
                                                                        <a href="javascript:void(0)" class="item-like"><i
                                                                                class="las la-thumbs-up"></i>
                                                                            ({{ __($other->likes) }})
    </a>
                                                                    </div>
                                                                    <div class="right">
                                                                        <div class="order-btn">
                                                                            <a href="{{ route('user.service.booking', [slug($other->title), encrypt($other->id)]) }}"
                                                                                class="btn--base"><i
                                                                                    class="las la-shopping-cart"></i>
                                                                                @lang('Order
                                                                                Now')</a>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
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
