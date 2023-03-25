<div id="carouselFeatureSoftware" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($softwares as $software)
            <div class="carousel-item active ">
                <div class="card">
                    
                    <div class="img-wrapper">
                        <a href="{{ $software->uuid ? route('software.view',[$software->uuid]) : '#'}}">
                            
                            @if ($software->banner->banner_type==\App\Models\ModuleBanner::$Video)
                                <div id="videoContainer" >
                                    <iframe src="{{getVideoBannerURL($software)}}" title="Banner Video" frameborder="0" id="preview_video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:345px;height:250px"></iframe>
                                </div>
                            @else
                                <img src="{{ $software->banner ? getLeadImageUrl($software) : asset('assets/images/default.png','590x300') }}"
                                 alt="@lang('image')">
                            @endif
                            
                        </a>
                    </div>

                    <div class="card-body item-area item-card">
                        <h3 class="item-card-title">
                            <a href="{{ $software->uuid ? route('software.view',[$software->uuid]) : '#'}}">{{__(str_limit($software->title, 40))}}</a>
                        </h3>
                        <div class="tags-container">
                            @foreach ($software->tags as $tag)
                                <a href="javascript:void(0)"
                                   class=" grey_badge  custom_badge badge-secondary">{{ __($tag->name) }}</a>
                            @endforeach
                        </div>

                        <div class="footer row">
                            <div class="author_detail col-7 col-md-8">
                                <span class="author text-capitalize pb-1">by
                                    <a href="javascript:void(0)">{{ !empty($software->user->fullname)? $software->user->fullname: '' }}</a>
                                </span>
                                <div class="col-12 col-md-12 ">
                                    <a href="{{ $software->uuid ? route('software.view',[$software->uuid]) : '#'}}">
                                    <span class="rates">
                                    <p>Schedule Meeting</p></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-5 col-md-4 ">
                            <span class="rates">
                            <small class="start-from">Start from</small>
                            <span class="value">${{ $software->price }}</span>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <span class="seeall"><a href="{{ route('software') }}">See All</a></span>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>