@extends($activeTemplate.'layouts.frontend')
@section('header')
    @php
    \App\Models\GeneralSetting::$showSEOTags = false;
    @endphp
    <title>DureForce - {{ __($blog->data_values->title) }}</title>
    <meta itemprop="name" content="{{ __($blog->data_values->title) }}">
    <meta itemprop="description" content="{{ __($blog->data_values->title) }}">
    <meta itemprop="image"
        content="{{ !empty($blog->data_values->blog_image_1)? getImage('assets/images/frontend/blog/' . $blog->data_values->blog_image_1, '728x465'): '' }}">
    <meta name="title" Content="DureForce - {{ __($blog->data_values->title) }}">
    <meta name="description" content="{{ __($blog->data_values->title) }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __($blog->data_values->title) }}">
    <meta property="og:description" content="{{ __($blog->data_values->title) }}">
    <meta property="og:image"
        content="{{ !empty($blog->data_values->blog_image_1)? getImage('assets/images/frontend/blog/' . $blog->data_values->blog_image_1, '728x465'): '' }}" />
@endsection
@section('content')
    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center">
                <article class="main-section">
                    <div class="section-inner">
                        <div class="blog-details-section blog-section">
                            <div class="container">
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-xl-9 col-lg-9 mb-30">
                                        <div class="blog-item-area">
                                            <div class="blog-item">
                                                <div class="blog-thumb">

                                                    {{-- ----------Banner---------- --}}
                                                    <div class="detail-banner"
                                                        style='background-image: url({{ getImage(imagePath()['logoIcon']['path'] . '/service-banner-bg.png') }})'>

                                                        <div class="banner_header"><img
                                                                style="max-width: 200px; display: inline-block"
                                                                src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}"
                                                                alt="{{ __($general->sitename) }}"></div>
                                                        <div class="content">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6">
                                                                    <h2 class="heading">
                                                                        {{ !empty($blog->data_values->banner_heading) ? $blog->data_values->banner_heading : '' }}
                                                                    </h2>
                                                                    <p class="para">
                                                                        {{ !empty($blog->data_values->banner_detail) ? $blog->data_values->banner_detail : '' }}
                                                                    </p>
                                                                </div>
                                                                {{-- <div class=" col- 12 col-sm-6"> --}}
                                                                {{-- <img alt="{{$blog->data_values->banner_heading}}" --}}
                                                                {{-- src="{{getAzureImage('service/'.$blog->data_values->blog_image_1, imagePath()['service']['size'])}}"> --}}
                                                                {{-- </div> --}}
                                                            </div>


                                                        </div>
                                                        <div class="footer">
                                                            {{-- @foreach ($model->optionalImage as $value) --}}
                                                            {{--  --}}{{-- <img title="{{$value->caption}}" --}}
                                                            {{--  --}}{{-- src="{{getImage('assets/images/optionalService/'.$value->image, imagePath()['optionalService']['size']) }}" --}}
                                                            {{--  --}}{{-- alt="@lang('item-banner')"> --}}
                                                            {{-- @endforeach --}}
                                                        </div>
                                                    </div>
                                                    {{-- ----------Banner---------- --}}
                                                    {{-- <img src="{{  !empty($blog->data_values->blog_image_1) ? getImage('assets/images/frontend/blog/'.$blog->data_values->blog_image_1,'728x465'):""  }}" --}}
                                                    {{-- alt="@lang('blog')"> --}}
                                                    <div class="blog-date text-center">
                                                        <h3 class="title">
                                                            {{ showDateTime($blog->created_at, 'd') }}</h3>
                                                        <span
                                                            class="sub-title">{{ showDateTime($blog->created_at, 'M') }}</span>
                                                    </div>
                                                </div>
                                                <div class="blog-content">
                                                    <div class="blog-content-inner">
                                                        <h3 class="title">{{ __($blog->data_values->title) }}
                                                        </h3>
                                                        {!! \App\Models\Frontend::parseBlogDescription($blog) !!}
                                                        {{-- {!! $blog->data_values->description  !!} --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="blog-social-area d-flex flex-wrap justify-content-between align-items-center">
                                                <h3 class="title">@lang('Share This Post')</h3>
                                                <ul class="blog-social">
                                                    <li>
                                                        <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}"
                                                            target="__blank"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="http://twitter.com/share?url={{ Request::url() }}&text={{ __($blog->data_values->title) }}"
                                                            target="__blank"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}"
                                                            target="__blank"><i class="fab fa-linkedin-in"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xl-3 col-lg-3 mb-30">
                                        <div class="sidebar">
                                            <div class="widget mb-30">
                                                <h3 class="widget-title">@lang('CATEGORIES')</h3>
                                                <ul class="category-list">
                                                    @foreach ($categorys as $category)
                                                        <li>
                                                            <a
                                                                href="{{ route('service.category', [slug($category->name), $category->id]) }}">{{ __($category->name) }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="widget">
                                                <h3 class="widget-title">@lang('FEATURED SERVICE')</h3>
                                                <ul class="small-item-list" id="featuredService">
                                                    @foreach ($fservices as $ser)
                                                        <li class="small-single-item">
                                                            <div class="thumb">
                                                                <img src="{{ getAzureImage('service/' . $ser->image, imagePath()['service']['size']) }}"
                                                                    alt="@lang('service image')">
                                                            </div>
                                                            <div class="content">
                                                                <h5 class="title"><a
                                                                        href="{{ route('service.details', [slug($ser->title), encrypt($ser->id)]) }}">{{ __($ser->title) }}</a>
                                                                </h5>
                                                                <div class="ratings">
                                                                    <i class="fas fa-star text--warning"></i>
                                                                    <span
                                                                        class="rating">({{ $ser->rating }})</span>
                                                                    <p
                                                                        class="author-like d-inline-flex flex-wrap align-items-center ms-2">
                                                                        <span class="las la-thumbs-up text--base"></span>
                                                                        ({{ __($ser->likes) }})
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="widget-btn text-center">
                                                @if ($fservices->total() > 4)
                                                    <a href="javascript:void(0)" class="btn--base readMore" data-page="2"
                                                        data-link="{{ route('home') }}?page=">@lang('Show More')</a>
                                                @endif
                                            </div>
                                            @include(
                                                'templates.basic.partials._tag_cloud',
                                                ['tag_type_id' => \App\Models\Tag::TAG_TYPE_BLOG]
                                            )
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    @include($activeTemplate . 'partials.end_ad')
@endsection
@push('fbComment')
    @php echo loadFbComment() @endphp
@endpush


@push('script')
    <script>
        'use strict';
        $('.readMore').on('click', function() {
            var link = $(this).data('link');
            var page = $(this).data('page');
            var href = link + page;
            var featuredServiceCount = {{ $fservices->total() }};
            $.get(href, function(response) {
                var html = $(response).find("#featuredService").html();
                $("#featuredService").append(html);
                var loadMoreCount = 4 * page;
                if (loadMoreCount >= featuredServiceCount) {
                    $('.readMore').hide()
                }
            });
            $(this).data('page', (parseInt(page) + 1));

        });
    </script>
    <style>
        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }

    </style>
@endpush
