<div class="item-card col-3 bg-gray">
    <div class="item-card-thumb">

        @include($activeTemplate.'partials._banner-listing',['model'=>$job,'folder'=>'job','optionalFolder'=>'optionaljob'])

    </div>
    <div class="item-card-content  mt-2">
        <div>
            <h3 class="item-card-title"><a
                    href="{{ route('job.details', [slug($job->title), encrypt($job->id)]) }}">{{ __($job->title) }}</a>
            </h3>

            {{-- Tag content --}}
            <div class="tags-container">

                <div class="item-tags order-3">
                    @foreach($job->skill as $skill)
                        <a href="javascript:void(0)">{{__($skill)}}</a>
                    @endforeach
                </div>
            </div>
            <div class="footer row">
                <div class="author_detail col-12 col-md-8">
                    <span class="author text-capitalize">by
                        <a href="{{ route('profile', $job->user->username ?? '') }}">
                            {{ __($job->user->username ?? '-') }} </a></span>
                </div>
                <div class="left mb-10">
                    <a href="javascript:void(0)" class="btn--base active date-btn">{{$job->delivery_time}} @lang('Days')</a>
                    <a href="javascript:void(0)" class="btn--base bid-btn">@lang('Total Bids')({{$job->jobBiding->count()}})</a>
                </div>
                <div class="right mb-10">
                    <div class="order-btn">
                        <a href="{{route('job.details', [slug($job->title), encrypt($job->id)])}}" class="btn--base"><i class="las la-shopping-cart"></i> @lang('Bid Now')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
