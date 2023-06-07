<div id="carouselPublications" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
    @foreach ($blogs as $blog)
        <div class="carousel-item active ">
            <div class="card">
                <div class="img-wrapper">
                    <img src="{{ !empty($blog->attachments[0]->url)? $blog->attachments[0]->url : getImage('assets/images/default.png') }}" class="d-block w-100" alt="...">
                </div>

                <div class="card-body item-area item-card">
                    <h3 class="">
                        <a href="{{ route('blog.details', $blog->id) }}">{{ __($blog->title) }}</a>
                    </h3>
                    <div class="footer row">
                     <div class="author_detail col-12 col-md-6">
                    <span class="author text-capitalize">by Dure Force </span>
                            <span class="delivery">{{diffforhumans($blog->created_at)}}</span> 
                     </div>
                    </div>
                    <p>{{ str_limit(strip_tags(@$blog->description), 100) }}
                    </p>
                    <div class="blog-btn">
                        <a href="{{ route('blog.details', $blog->id) }}"
                            class="btn--base text-center w-100">@lang('Read More')</a>
                    </div>
                  </div>
            </div>
        </div>
    @endforeach
    </div>
    <span class="seeall"><a href="{{url('coming-soon')}}">See All</a></span>
    <button class="carousel-control-prev carousel-mobile-view" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next carousel-mobile-view" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>