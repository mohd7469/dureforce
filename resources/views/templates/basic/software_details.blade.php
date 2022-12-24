@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="all-sections pt-3">
    <div class="container-fluid p-max-sm-0">
        <div class="sections-wrapper d-flex flex-wrap justify-content-center">
            <article class="main-section">
                <div class="section-inner">
                    <div class="item-section item-details-section">
                        <div class="container">
                            <div class="item-details-content" style="padding-top: 0px;">
                                <h2 class="title">{{ __($software->category->name) }} {{ __($software->subCategory ? '>' .$software->subCategory->name: '')}}</h2>
                                
                            </div>
                            <div class="row justify-content-center mb-30-none">
                                <div class="col-xl-9 col-lg-9 mb-30">
                                    <div class="item-details-area">
                                        <div class="item-details-box">

                                            <div class="item-details-thumb-area item-details-footer mt-0">
                                                <div class="left mb20">
                                                    <h3 class="title">{{ __($software->title) }}</h3>
                                                    <div class="item-details-tag">
                                                        <ul class="tags-wrapper mt-3 ">
                                                        <!--<li class="caption">@lang('Tags')</li>-->
                                                            @foreach ($software->tags as $tags)
                                                                <li><a href="javascript:void(0)">{{ __($tags->name) }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="right mb-20">
                                                    <div class="social-area">
                                                        <ul class="footer-social">
                                                            <li>
                                                                <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}"
                                                                   target="__blank"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="http://twitter.com/share?url={{ Request::url() }}&text={{ __($software->title) }}&hashtags={{ __($software->title) }}"
                                                                   target="__blank"><i class="fab fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}"
                                                                   target="__blank"><i
                                                                            class="fab fa-linkedin-in"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                {{-- slider area --}}
                                                @if ($software->banner)
                                                    @include($activeTemplate . 'partials._banner', [
                                                        'model' => $software,
                                                        'folder' => 'software',
                                                        'optionalFolder' => 'optionalService',
                                                    ])
                                                @endif
                                                
                                               
                                                <div class="row item-details-content">
                                                    <div class="service_subtitle1 mt-20">{{ $pageTitle }}</div>
                                                    <div class="service_subtitle2">
                                                        Description
                                                    </div>
                                                    <div class="sep-solid"></div>
                                                    <div class="product-desc-content">
                                                        {!! $software->description !!}
                                                    </div>
                                                    
                                                    <div class="service_subtitle2">
                                                        Software Application
                                                    </div>
                                                    <div class="sep-solid"></div>
                                                    <div class="product-desc-content">
                                                        {!! $software->software_application !!}
                                                    </div>

                                                   
                                                    <div class="service_subtitle2 mt-20">
                                                        Software Providing Steps
                                                    </div>
                                                    <div class="sep-solid"></div>
                                                    <div class="simpletext">
                                                        @if ($software->softwareSteps->isNotEmpty())
                                                            @foreach ($software->softwareSteps as $softwareKey => $item)
                                                                <h5> {{ $item->name }} </h5>
                                                                {{ $item->description }}

                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="item-details-thumb-area2">
                                                <div class="service_subtitle1 mb-3">Software Modules</div>
                                                @if ($software->modules->isNotEmpty())
                                                    <table  class="table software-table" >
                                                        
                                                        <thead >
                                                            <tr >
                                                                    <th class="col-md-6">@lang('Module Title & Description')</th>
                                                                    <th class="col-md-3">@lang('Base Price')</th>
                                                                    <th class="col-md-3">@lang('Estimated Lead Time (Hours)')</th>
                                                            </tr>
                                                                
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($software->modules as $module)
                                                                <tr>
                                                                    <td>
                                                                        <b>{{ $module->name }}</b><br>
                                                                        {{ $module->description }}
                                                                    </td>
                                                                    <td>
                                                                        ${{$module->start_price}}
                                                                    </td>
                                                                    <td>
                                                                        {{$module->estimated_lead_time}} {{ 'Hours'}}

                                                                    </td>

                                                                </tr>
                                                                @endforeach
                                                        </tbody>

                                                    </table>
                                                @endif 
                                            </div>
                                            @if (getLastLoginRoleId()==App\Models\Role::$Client)
                                                <div class="item-details-thumb-area2">
                                                    
                                                    <div class="service_subtitle3">
                                                        About {{ __($software->user->username) }}
                                                        <span><i class="fa fa-regular fa fa-star"></i> 4.5 ({{ $software->reviewCount->count() }} Reviews)</span>
                                                    </div>
                                                    
                                                    <div class="profile-widget-header">
                                                        <div class="profile-widget-author pb-20">
                                                            <div class="left">
                                                                <div class="thumb">
                                                                    <img src="{{ !empty($software->user->basicProfile->profile_picture)? $software->user->basicProfile->profile_picture: getImage('assets/images/default.png') }}"
                                                                        alt="{{ __($software->user->username) }}">
                                                                </div>
                                                                <div class="content mt-15">
                                                                    <h4 class="name">
                                                                        {{ __(@$software->user->basicProfile->designation) }}
                                                                    </h4>
                                                                    <span class="designation">
                                                                        {{ __(@$software->user->location) }}
                                                                        - 5:20pm local time</span>
                                                                </div>
                                                            </div>
                                                            <div class="right btn-area mb-10">
                                                                <a href="{{ route('seller.profile', $software->user->uuid) }}"
                                                                class="standard-btn mr-15">@lang('View Profile')</a>

                                                                <a href="{{  route('seller.profile', $software->user->uuid) }}"
                                                                class="standard-btn">@lang('View Portfolio')</a>
                                                            </div>
                                                        </div>
                                                        <div class="profile-widget-author-meta mb-10-none">
                                                        
                                                            <div class="location mb-10" id="aboutme">
                                                                <p class="show-read-more">
                                                                    {{ __(@$software->user->basicProfile->about) }}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 mb-30">
                                    <div class="sidebar">
                                        
                                        <div class="widget custom-widget-software">

                                            <ul class="sidebar-title1">
                                                <li>@lang('Software Base Price ')
                                                    <span>${{ showAmount($software->price) }}</span>
                                                </li>
                                            </ul>

                                            <ul class="sidebar-title2">
                                                <li><span>@lang('Estimated Lead Time (hrs)')</span>
                                                    <span>{{ __($software->estimated_lead_time) }} @lang('Hours')</span>
                                                </li>
                                            </ul>

                                        </div>
                                        
                                        <ul class="sidebar-title-software">
                                            <li class="bg">@lang('Deliverables Included')</li>
                                            <div class="widget custom-widget-software">
                                                @if ($software && count($software->deliverable)>0)
                                                    @foreach ($software->deliverable as $delivery)
                                                        <li><span> {{ $delivery->name }}</span>
                                                            <span><i class="fa fa-regular fa fa-check"
                                                            style="color: #4c9d97;font-size: 18px;"></i></span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </div>
                                            
                                        </ul>

                                        

                                        <ul class="sidebar-title-software">
                                            <li class="bg">@lang('Features Included')</li>
                                            <div class="widget custom-widget-software">
                                                @if ($software && count($software->features)>0)
                                                    @foreach ($software->features as $feature)
                                                        <li><span> {{ $feature->name }}</span>
                                                            <span><i class="fa fa-regular fa fa-check"
                                                            style="color: #4c9d97;font-size: 18px;"></i></span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </div>
                                            
                                        </ul>

                                        <div class="widget-btn mt-20">
                                            @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                                <a href="{{ route('user.software.create', [$software->id])}}"
                                                 class="standard-btn mr-15">@lang('Edit Software')</a>
                                            @else
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#depoModal" class="standard-btn mr-15">@lang('Book
                                                Developer')</a>

                                                <a href="{{route('chat.start.message',[$software->uuid,'Software'])}}" 
                                               
                                                class="standard-btn">@lang('Message')</a>
                                            @endif
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            @if ($related_softwares && (getLastLoginRoleId()==App\Models\Role::$Client))
                                
                                
                                <div class="row justify-content-center">
                                    <!--<div class="col-xl-12">-->
                                    <div class="col-xl-12" >
                                        
                                        <div class="section-header">
                                            <h2 class="section-title">@lang('Related Softwares')</h2>
                                        </div>

                                        <div class="item-card-wrapper border-0  grid-view" style="padding: 12px">
                                            @forelse($related_softwares as $realted_software)
                                                @include($activeTemplate . 'components.software.tile', ['software' => $realted_software])
                                            @empty
                                                <div class="empty-message-box bg--gray">
                                                    <div class="icon"><i class="las la-frown"></i></div>
                                                    <p class="caption">{{ __($emptyMessage) }}</p>
                                                </div>
                                            @endforelse
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            @endif
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

@include($activeTemplate . 'partials.end_ad')

    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">@lang('Start new conversation')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.conversation.store') }}">
                        @csrf
                        <input type="hidden" name="recevier_id" value="{{ $software->user_id }}">

                        <div class="form-group">
                            <label for="subject" class="font-weight-bold">@lang('Subject')</label>
                            <input type="text" class="form-control" name="subject" placeholder="@lang('Enter Subject')"
                                maxlength="255" required>
                        </div>

                        <div class="form-group">
                            <label for="message" class="font-weight-bold">@lang('Message')</label>
                            <textarea rows="8" class="form-control" name="message" maxlength="500" placeholder="@lang('Enter Message')"
                                    required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn--base" style="width:100%;">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--danger btn-rounded text-white"
                            data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>

    </section>
    @include($activeTemplate . 'partials.end_ad')
@endsection
@push('style')
<style>
.table>:not(:last-child)>:last-child>* {
    border-bottom-color: #CBDFDF !important;
}
</style>
    
@endpush
@push('script')
<script>
    $(document).ready(function() {
        $("#readless").hide();
        var maxLength = 700;
        $(".show-read-more").each(function() {
            var myStr = $(this).text();
            if ($.trim(myStr).length > maxLength) {
                var newStr = myStr.substring(0, maxLength);
                //var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                var removedStr = myStr.substring(maxLength, (myStr).length);
                $(this).empty().html(newStr);
                //$(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
                $(this).append(
                        '<a href="javascript:void(0)" id="readmore" class="standard-btn-sm" style="margin-left: 10px;">Read more</a>'
                );
                $(this).append('<span class="more-text">' + removedStr + '</span>');
                //$(".more-text").hide();
            }
        });
        //$(".read-more").click(function(){
        $("#readmore").click(function() {
            $(this).siblings(".more-text").contents().unwrap();
            //$("#readless").show();
            $("#readmore").hide();
            //$(this).hide();
            //$(".show-read-more").append('<a href="javascript:void(0)" id="readless" class="standard-btn-sm">Read less</a>');
        });
        $("#readless").click(function() {
            $(".more-text").hide();
            //$("#readmore").show();
            $("#readless").hide();
            $(".show-read-more").append(
                    '<a href="javascript:void(0)" id="readmore" class="standard-btn-sm">Read more</a>');
        });
    });
</script>
    <script>
        'use strict';
        var swiper = new Swiper(".item-small-slider", {
            loop: true,
            spaceBetween: 30,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".item-details-slider", {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.slider-next',
                prevEl: '.slider-prev',
            },
            thumbs: {
                swiper: swiper,
            },
        });

      
    </script>
@endpush
