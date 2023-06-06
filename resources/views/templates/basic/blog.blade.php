@extends($activeTemplate.'layouts.frontend')
@section('content')
    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center">
                <article class="main-section">
                    <div class="section-inner">
                        <div class="blog-section">
                            <div class="container">
                                <div class="row justify-content-center mb-30-none">
                                    @foreach ($blogs as $blog)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                                            <div class="blog-item">
                                                <div class="blog-thumb">
                                                    <a
                                                        href="{{ route('blog.details', $blog->id) }}">
                                                        <img src="{{ !empty($blog->attachments[0]->url)? $blog->attachments[0]->url : getImage('assets/images/default.png') }}"
                                                            alt="blog">
                                                    </a>
                                                    <div class="blog-date text-center">
                                                        <h3 class="title">
                                                            {{ showDateTime($blog->created_at, 'd') }}</h3>
                                                        <span
                                                            class="sub-title">{{ showDateTime($blog->created_at, 'M') }}</span>
                                                    </div>
                                                </div>
                                                <div class="blog-content">
                                                    <div class="blog-content-inner">
                                                        <h3 class="title"><a
                                                                href="{{ route('blog.details', $blog->id) }}">{{ __($blog->title) }}</a>
                                                        </h3>
                                                        <p>{{ str_limit(strip_tags(@$blog->description), 100) }}
                                                        </p>
                                                        <div class="blog-btn">
                                                            <a href="{{ route('blog.details', $blog->id) }}"
                                                                class="btn--base text-center w-100">@lang('Read More')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <nav>
                                    {{ $blogs->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
