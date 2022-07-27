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
                    href="{{ route('software.details', [slug($software->title), encrypt($software->id)]) }}">{{ __($software->title) }}</a>
            </h3>

            {{-- Tag content --}}
            <div class="tags-container">

                @foreach ($software->tags as $tag)
                    @if (!empty($tag))
                        <a href="tags/{{ $tag->id }}"
                            class=" grey_badge  custom_badge badge-secondary">{{ $tag->name }}</a>
                    @endif
                @endforeach

            </div>

            <div class="footer row">
                <div class="author_detail col-12 col-md-8">
                    <span class="author text-capitalize">by <a
                            href="{{ route('profile', $software->user->username ?? '') }}">{{ __($software->user->username ?? '') }}
                        </a> </span>
                    <span class="delivery">Delivered in 4 days</span>
                </div>
                {{-- <div class=" col-12 col-md-4">
                    <span class="rates">
                        <span
                            class="value">{{ __($general->cur_sym) }}{{ __(showAmount($software->price)) }}</span>
                        <small>per hour</small></span>
                </div> --}}
            </div>
        </div>
    </div>

</div>
