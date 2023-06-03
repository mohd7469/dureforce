<div id="carouselFeatureServices" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($services as $service)
            <div class="carousel-item active ">
                <div class="card card-height">
                    <div class="img-wrapper">
                        <a href="{{ $service->uuid ? route('service.view',[$service->uuid]) : '#'}}">
                            <img src="{{ $service->banner ? getLeadImageUrl($service): asset('assets/images/default.png','590x300') }}"
                                 alt="@lang('image')">
                        </a>
                    </div>

                    <div class="card-body item-area item-card">
                        <h3 class="item-card-title">
                            <a href="{{ $service->uuid ? route('service.view',[$service->uuid]) : '#'}}">{{__(str_limit($service->title, 40))}}</a>
                        </h3>
                        <div class="tags-container">
                            @foreach (($service->tags)->slice(0, 3) as $tag)
                                <a href="javascript:void(0)"
                                   class=" grey_badge  custom_badge badge-secondary">{{ __($tag->name) }}</a>
                            @endforeach
                        </div>

                        <div class="footer row">
                            <div class="author_detail col-7 col-md-8">
                                    <span class="author text-capitalize pb-1">by
                                        <a href="javascript:void(0)">{{ !empty($service->user->fullname)? $service->user->fullname: '' }}</a>
                                    </span>
                                <!-- <div class="col-12 col-md-12 ">
                                    <a href="{{ $service->uuid ? route('service.view',[$service->uuid]) : '#'}}">
                                         <span class="rates">
                                        <p>Schedule Meeting</p></span>
                                    </a>
                                </div> -->
                            </div>
                            <div class="col-5 col-md-4 ">
                                <span class="rates">
                                <small class="start-from">Start from</small>
                                <span class="value">${{ round($service->rate_per_hour, 2) }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <span class="seeall"><a href="{{ route('service') }}">See All</a></span>
    <button class="carousel-control-prev carousel-mobile-view" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next carousel-mobile-view" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>