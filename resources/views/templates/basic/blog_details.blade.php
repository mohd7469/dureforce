@extends($activeTemplate.'layouts.frontend')
@section('header')
    @php
    \App\Models\GeneralSetting::$showSEOTags = false;
    @endphp
    <title>DureForce - {{ __($blog->title) }}</title>
    <meta itemprop="name" content="{{ __($blog->title) }}">
    <meta itemprop="description" content="{{ __($blog->title) }}">
    <meta itemprop="image"
        content="{{ !empty($blog->blog_image_1)? getImage('assets/images/frontend/blog/' . $blog->blog_image_1, '728x465'): '' }}">
    <meta name="title" Content="DureForce - {{ __($blog->title) }}">
    <meta name="description" content="{{ __($blog->title) }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __($blog->title) }}">
    <meta property="og:description" content="{{ __($blog->title) }}">
    <meta property="og:image"
        content="{{ !empty($blog->blog_image_1)? getImage('assets/images/frontend/blog/' . $blog->blog_image_1, '728x465'): '' }}" />
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
                                                    <div class="detail-banner d-block w-100"
                                                        style='height: 390px;width:auto; background-image: url({{ !empty($blog->attachments[0]->url)? $blog->attachments[0]->url : getImage(imagePath()['logoIcon']['path'] . '/service-banner-bg.png') }})'>
                                                        <div class="banner_header"></div>
                                                    </div>
                                                    {{-- ----------Banner---------- --}}
                                                    <div class="blog-date text-center">
                                                        <h3 class="title">
                                                            {{ showDateTime($blog->created_at, 'd') }}</h3>
                                                        <span
                                                            class="sub-title">{{ showDateTime($blog->created_at, 'M') }}</span>
                                                    </div>
                                                </div>
                                                <div class="blog-content">
                                                    <div class="blog-content-inner">
                                                        <h3 class="title">{{ __($blog->title) }}
                                                        </h3>
                                                         {!! $blog->description  !!}
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
                                                        <a href="http://twitter.com/share?url={{ Request::url() }}&text={{ __($blog->title) }}"
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
