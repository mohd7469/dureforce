@extends($activeTemplate.'layouts.frontend')
@section('header')
    @php
        \App\Models\GeneralSetting::$showSEOTags = false;
    @endphp

    <meta itemprop="name" content="{{ __($service->title) }}">
    <meta itemprop="description" content="{{ __($service->title) }}">
    <meta itemprop="image"
          content="{{ getAzureImage('service/' . $service->image, imagePath()['service']['size']) }}">
    <meta name="title" Content="DureForce - {{ __($service->title) }}">
    <meta name="description" content="{{ __($service->title) }}">
    <title>DureForce - {{ __($service->title) }}</title>
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __($service->title) }}">
    <meta property="og:description" content="{{ __($service->title) }}">
    <meta property="og:image"
          content="{{ getAzureImage('service/' . $service->image, imagePath()['service']['size']) }}"/>
@endsection
@section('content')

    <input type="hidden" value="{{$service->category_id}}" id="category_id">
    <input type="hidden" {{$service->sub_category_id}} id="sub_category_id">
    <input type="hidden" value="{{$selected_skills}}" name="job_skills" id="job_skills">

    <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center">
                <article class="main-section">
                    <div class="section-inner">
                        <div class="item-section item-details-section">
                            <div class="container">
                                <div class="item-details-content" style="padding-top: 0px;">
                                    <h2 class="title">{{ __($service->category->name) }}  {{ __($service->subCategory ? '>' .$service->subCategory->name: '')}}</h2>
                                </div>
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-xl-9 col-lg-9 mb-30">
                                        <div class="item-details-area">
                                            <div class="item-details-box">

                                                <div class="item-details-thumb-area item-details-footer mt-0">
                                                    <div class="left mb20">
                                                        <h3 class="title">{{ __($service->title) }}</h3>
                                                        <div class="item-details-tag">
                                                            <ul class="tags-wrapper mt-3 ">
                                                                <!--<li class="caption">@lang('Tags')</li>-->
                                                                @foreach ($service->tags as $tags)
                                                                    <li>
                                                                        <a href="javascript:void(0)">{{ __($tags->name) }}</a>
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
                                                                    <a href="http://twitter.com/share?url={{ Request::url() }}&text={{ __($service->title) }}&hashtags={{ __($service->title) }}"
                                                                       target="__blank"><i
                                                                                class="fab fa-twitter"></i></a>
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
                                                    @if ($service->banner)
                                                        @include($activeTemplate . 'partials._banner', [
                                                            'model' => $service,
                                                            'folder' => 'service',
                                                            'optionalFolder' => 'optionalService',
                                                        ])
                                                    @endif

                                                    {{-- slider area --}}
                                                    {{-- <div thumbsSlider="" class="item-small-slider mt-20"> --}}
                                                    {{-- <div class="swiper-wrapper"> --}}
                                                    {{-- @foreach ($service->optionalImage as $value) --}}
                                                    {{-- <div class="swiper-slide"> --}}
                                                    {{-- <div class="item-small-thumb"> --}}
                                                    {{-- <img src="{{getImage('assets/images/optionalService/'.$value->image, imagePath()['optionalService']['size']) }}" --}}
                                                    {{-- alt="@lang('item-banner')"> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    {{-- @endforeach --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    <div class="row item-details-content">
                                                        <div class="service_subtitle1 mt-20">{{ $pageTitle }}</div>
                                                        <div class="service_subtitle2">
                                                            Description
                                                        </div>
                                                        <div class="sep-solid"></div>
                                                        <div class="product-desc-content">
                                                            {!! $service->description !!}
                                                        </div>

                                                        <div class="service_subtitle2">
                                                            Attributes
                                                        </div>
                                                        <div id="form_attributes">

                                                        </div>

                                                        <div class="sep-solid"></div>
                                                        <div class="service_subtitle2 mt-20">
                                                            Steps
                                                        </div>
                                                        <div class="sep-solid"></div>
                                                        <div class="simpletext">
                                                            @if ($service->serviceSteps->isNotEmpty())
                                                                @foreach ($service->serviceSteps as $serviceKey => $item)
                                                                    <h5> {{ $item->name }} </h5>
                                                                    {{ $item->description }}

                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($service->addOns->isNotEmpty())
                                                    <div class="item-details-thumb-area2">
                                                        <div class="service_subtitle1">Add-Ons</div>
                                                        <div class="service_subtitle3">
                                                            <ul class="service-table-title">
                                                                <li>
                                                                    <p>@lang('Add-On Name & Description')</p>
                                                                    <p>@lang('Per Hour')</p>
                                                                    <p>@lang('Estimated Delivery Time')</p>
                                                                    <p></p>
                                                                    <p></p>
                                                                </li>
                                                            </ul>

                                                            <ul class="service-table">

                                                                @foreach ($service->addOns as $extra)
                                                                    <li>

                                                                        <div style="width: 30%;">{{ __($extra->title) }}</div>
                                                                        <div style="width: 18%;">{{ showAmount($extra->rate_per_hour) }}</div>
                                                                        <div style="width: 18%;">{{ $extra->estimated_delivery_time }}
                                                                            Days
                                                                        </div>
                                                                        <div style="width: 18%;">
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if(getLastLoginRoleId()==App\Models\Role::$Client)
                                                    <div class="item-details-thumb-area2">

                                                        <div class="service_subtitle3">
                                                            About Freelancer
                                                            <span><i class="fa fa-regular fa fa-star"></i> 4.5 ({{ $service->reviewCount->count() }} Reviews)</span>
                                                        </div>

                                                        <div class="profile-widget-header">
                                                            <div class="profile-widget-author pb-20">
                                                                <div class="left">
                                                                    <div class="thumb">
                                                                        <img src="{{ !empty($service->user->basicProfile->profile_picture)? $service->user->basicProfile->profile_picture: getImage('assets/images/default.png') }}"
                                                                             alt="{{ __($service->user->username) }}">
                                                                    </div>
                                                                    <div class="content mt-15">
                                                                        <h4 class="name">
                                                                            {{ __(@$service->user->basicProfile->designation) }}
                                                                        </h4>
                                                                        <span class="designation">
                                                                        {{ __(@$service->user->location) }}
                                                                        - 5:20pm local time</span>
                                                                    </div>
                                                                </div>
                                                                <div class="right btn-area mb-10">
                                                                    <a href="{{ route('seller.profile', $service->user->uuid) }}"
                                                                       class="standard-btn mr-15">@lang('View Profile')</a>

                                                                    <a href="{{  route('profile.portfolio', $service->user->uuid) }}"
                                                                       class="standard-btn">@lang('View Portfolio')</a>
                                                                </div>
                                                            </div>
                                                            <div class="profile-widget-author-meta mb-10-none">

                                                                <div class="location mb-10" id="aboutme">
                                                                    <p class="show-read-more">
                                                                        {{ __(@$service->user->basicProfile->about) }}</p>
                                                                </div>
                                                                {{-- <a href="javascript:void(0)" id="readmore" class="standard-btn-sm">Read more</a>
                                                                <a href="javascript:void(0)" id="readless"
                                                                   class="standard-btn-sm">Read less</a> --}}
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 mb-30">
                                        <div class="sidebar">
                                            <div class="widget custom-widget mb-30">

                                                <ul class="sidebar-title1">
                                                    <li><span>@lang('Price')</span>
                                                        <span>${{ showAmount($service->rate_per_hour) }}/hr</span>
                                                    </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                    <li><span>@lang('Estimated Delivery Time')</span>
                                                        <span>{{ __($service->estimated_delivery_time) }} @lang('Hours')</span>
                                                    </li>
                                                </ul>

                                                <ul class="sidebar-title2">
                                                    <li><span>@lang('Number of Simultaneous Projects')</span>
                                                        <span>{{$service->number_of_simultaneous_projects}}</span>
                                                    </li>
                                                    @if ($service && count($service->deliverable)>0)
                                                        @foreach ($service->deliverable as $delivery)
                                                            <li><span> {{ $delivery->name }}</span>
                                                                <span><i class="fa fa-regular fa fa-check"
                                                                         style="color: #4c9d97;font-size: 18px;"></i></span>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>

                                                <div class="widget-btn- mt-20">
                                                    @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                                        <a href="{{ route('user.service.create', [$service->id])}}"
                                                           class="standard-btn mr-15">@lang('Edit Service')</a>
                                                    @else
                                                        
                                                        @if ($service->isBooked())
                                                            <a href="#" 
                                                                class="standard-btn mr-15">@lang('Booked Service')</a>
                                                            
                                                        @else
                                                            <a href="{{route('buyer.service.book',$service->uuid)}}" name="book_service_btn"  
                                                                class="standard-btn mr-15">@lang('Book Service')</a>
                                                        @endif
                                                    

                                                        <a href="{{route('chat.start.message',[$service->uuid,'Service'])}}"

                                                           class="standard-btn">@lang('Message')</a>

                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($related_services && (getLastLoginRoleId()==App\Models\Role::$Client))

                                    <div class="row justify-content-center">
                                        <!--<div class="col-xl-12">-->
                                        <div class="col-xl-12">

                                            <div class="section-header">
                                                <h2 class="section-title">@lang('Related Services')</h2>
                                            </div>

                                            <div class="item-card-wrapper border-0  grid-view" style="padding: 12px">
                                                @forelse($related_services as $realted_service)
                                                    @include($activeTemplate . 'components.services.tile', ['service' => $realted_service])
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

{{--@dd($service->defaultProposal->toArray())--}}
                                @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                    @if (!empty($service->defaultProposal))
                                    <div class="row">
                                        <div class="item-details-thumb-area2 col-lg-9 col-xl-9 col-md-9">
                                            <div class="service_subtitle1">Proposal</div>
                                            <div class="service_subtitle3">
                                                <ul class="service-table-title">
                                                    <li>
                                                        <p>@lang('Hourly Bid rate')</p>
                                                        <p>@lang('Rate Receive')</p>
                                                        <p>@lang('Delivery Mode')</p>

                                                    </li>
                                                </ul>

                                                <ul class="service-table">
                                                    <li>
                                                        <div style="">{{$service->defaultProposal->hourly_bid_rate }}</div>
                                                        <div style="">{{$service->defaultProposal->amount_receive }}</div>
                                                        <div style="">{{ $service->defaultProposal->delivery_mode->title}}</div>


                                                    </li>
                                                </ul>

                                            </div>

                                            <div class="">
                                                <h4><strong> Cover Letter</strong></h4>
                                                <p>{{ $service->defaultProposal->cover_letter }}</p>
                                            </div>

                                            @if (count($service->defaultProposal->attachments))
                                                <div class="pt-3 profile-border-bottom">
                                                    <b class="">Attachments </b>
                                                    <p>
                                                        @foreach ($service->defaultProposal->attachments as $item)
                                                            <a href="{{$item->url}}" class="btn btn-large pull-right " download><i class="fa fa-paperclip font-style" aria-hidden="true"></i>{{$item->uploaded_name}} </a><br>
                                                        @endforeach

                                                    </p>
                                                </div>
                                            @endif
                                        </div>
</div>
                                    @endif

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
                        <input type="hidden" name="recevier_id" value="{{ $service->user_id }}">

                        <div class="form-group">
                            <label for="subject" class="font-weight-bold">@lang('Subject')</label>
                            <input type="text" class="form-control" name="subject" placeholder="@lang('Enter Subject')"
                                   maxlength="255" required>
                        </div>

                        <div class="form-group">
                            <label for="message" class="font-weight-bold">@lang('Message')</label>
                            <textarea rows="8" class="form-control" name="message" maxlength="500"
                                      placeholder="@lang('Enter Message')"
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
@endsection

@push('script')
    <script>
        $(document).ready(function () {

            
            fetchSkills();

            $("#readless").hide();
            var maxLength = 700;
            $(".show-read-more").each(function () {
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
            $("#readmore").click(function () {
                $(this).siblings(".more-text").contents().unwrap();
                //$("#readless").show();
                $("#readmore").hide();
                //$(this).hide();
                //$(".show-read-more").append('<a href="javascript:void(0)" id="readless" class="standard-btn-sm">Read less</a>');
            });
            $("#readless").click(function () {
                $(".more-text").hide();
                //$("#readmore").show();
                $("#readless").hide();
                $(".show-read-more").append(
                    '<a href="javascript:void(0)" id="readmore" class="standard-btn-sm">Read more</a>');
            });
        });
        const genRand = (len) => {
            return Math.random().toString(36).substring(2, len + 2);
        }
        $(document).on("click","a[name='book_service_btn']", function (e) {
            e.preventDefault();
            BookServiceConfirmation($(this).attr('href'));
        });
        function BookServiceConfirmation(book_service_route){
            const swalWithBootstrapButtons = Swal.mixin(   
            {
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure you want to book service ?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Book Service!',
            cancelButtonText: 'No, Cancel!',
            reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.replace(book_service_route);
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Service Booking has been cancelled :)',
                        'error'
                    )
                }
            })
        }
        function populateSkills(data) {
            var selected_skills = $('#job_skills').val();
            console.log(selected_skills);
            selected_skills = (selected_skills.split(','));
            selected_skills = selected_skills.map(Number);

            for (var main_category in data) { //heading main

                var all_sub_categories = data[main_category];
                var main_category_id = genRand(5);
                var remove = true;
                $('#form_attributes').append('<div class="row custom_cards_s" id="' + main_category_id + '"><h4 class="d-heading"><b>' + main_category + '</b></h4>');
                for (var sub_category_enum in all_sub_categories) { //front end backend

                    var skills = all_sub_categories[sub_category_enum];
                    var sub_category_id = genRand(5);
                    var sub_skills = skills.map(a => a.id);
                    if (selected_skills.some(r => sub_skills.includes(r))) {
                        remove = false
                        $('#' + main_category_id).append('<div class="col-md-6 mt-2 mb-2"><div class="card" ><div class="card-body"><h5 class="card-title"><b>' + sub_category_enum + '</b></h5><div class="form-group admin-row row" id="' + sub_category_id + '" style="display: inline">');

                        for (var skill_index in skills) {

                            var skill_id = skills[skill_index].id;
                            var skill_name = skills[skill_index].name;
                            if (selected_skills.includes(skill_id)) {
                                $('#' + sub_category_id).append('<p class="card-text ad-job-detail" style="display:inline">' + skill_name + '</p>');
                            }
                        }
                    }

                }
                $('#' + main_category_id).append('</div>');
                if (remove)
                    $('#' + main_category_id).remove();
            }
            $('#form_attributes').append('</div>');

        }

        function fetchSkills() {
            var category_id = $('#category_id').val();
            var sub_catgory_id = $('#sub_category_id').val();
            $.ajax({
                type: "GET",
                url: '/job-skills',
                data: {category_id: category_id, sub_category_id: sub_catgory_id},
                success: function (data) {
                    var html = '';
                    if (data.error) {

                    } else {
                        populateSkills(data);
                    }
                }
            });
        }

        var swiper = new Swiper(".item-small-slider", {
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
