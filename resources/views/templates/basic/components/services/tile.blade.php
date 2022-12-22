<div class="item-card col-3 bg-gray">
    <div class="item-card-thumb">

        @include($activeTemplate.'partials._banner-listing',['model'=>$service,'folder'=>'service','optionalFolder'=>'optionalService'])

    </div>
    <div class="item-card-content  mt-2">
        <div>
            <div class="col-md-12" >
                <h3>
                    <b>
                        {{$service->title}}
                    </b>
                </h3>
            </div>
            <h3 class="" style="color:teal">
                <a href="{{$service->uuid ?route('service.view',[$service->uuid]) : '#'}}" class="" style=""><i class="fa fa-eye"></i></a>
            </h3>

            {{-- Tag content --}}
            <div class="tags-container">
                @foreach ($service->tags as $tag)
                    <a href="tags/{{ $tag->id }}"
                       class=" grey_badge  custom_badge badge-secondary">{{ $tag->name }}
                    </a>
                @endforeach
            </div>

            <div class="footer row mt-4">
                <div class="author_detail col-12 col-md-7">
                    <span class="author text-capitalize">by
                        <a href="{{ route('profile', $service->user->username ?? '') }}">
                            {{ __($service->user->username ?? '-') }} </a></span><br>
                    <span class="delivery">{{"Delivery Time ".$service->estimated_delivery_time}}</span>
                </div>
                <div class="col-12 col-md-5 ">
                    <span class="rates">
                        <span
                            class="value">{{ __($general->cur_sym) }}{{ __(showAmount($service->rate_per_hour)) }}</span>
                        <small>per hour</small></span>
                </div>
            </div>
        </div>
    </div>

</div>
