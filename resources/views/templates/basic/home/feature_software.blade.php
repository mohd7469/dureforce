<div class="item-bottom-area">
    <div class="row justify-content-center mb-30-none">
        <div class="col-xl-12 col-lg-12 mb-30">

            <div class="item-card-wrapper grid-view  row">
                <div class="slick-slider-container be-center ">
                    @forelse($softwares as $software)

                        @include($activeTemplate.'components.software.tile',['software'=>$software])
                    @empty
                        <div class="empty-message-box bg--gray">
                            <div class="icon"><i class="las la-frown"></i></div>
                            <p class="caption">{{__($emptyMessage)}}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        {{--                                        @include($activeTemplate.'partials.home_filter',['type_id'=>\App\Models\Category::ServiceType])--}}
    </div>
</div>