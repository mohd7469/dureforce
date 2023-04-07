<div class="item-card col-3 bg-gray">
    <div class="item-card-thumb">

        @include($activeTemplate . 'partials._banner-listing', [
            'model' => $software,
            'folder' => 'software',
            'optionalFolder' => 'optionalSoftware',
        ])

        </a>
    </div>
    <div class="item-card-content mt-2">

        <div>
            <h3 class="item-card-title"><a
                    href="{{ route('software.view', [$software->uuid]) }}">{{ __($software->title) }}</a>
            </h3>

            {{-- Tag content --}}
            <div class="tags-container">

                @foreach ($software->tags as $tag)
                    
                    <a href="javascript:;"
                        class=" grey_badge  custom_badge badge-secondary">{{ $tag->name }}</a>
                   
                @endforeach

            </div>

            <div class="footer row mt-4">
                <div class="author_detail col-12 col-md-7">
                    <span class="author text-capitalize">by <a
                            href="{{ route('profile', $software->user->username ?? '') }}">{{ __($software->user->username ?? '') }}
                        </a> </span><br>
                    <span class="delivery">Lead Time {{ $software->estimated_lead_time }} Days</span>
                </div>
                <div class=" col-12 col-md-5">
                    <span class="rates">
                        <span
                            class="value">{{ __("Base Price") }} <p> {{ __(showAmount($software->price)) }}</p></span>
                       
                </div>
            </div>
        </div>
    </div>

</div>
