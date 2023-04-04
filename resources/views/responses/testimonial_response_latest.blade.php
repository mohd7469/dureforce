@extends($activeTemplate.'layouts.frontend')
@section('content')

<div class="container">
    <div class="row">
        
        <div class="col-xl-12 col-lg-12 col-md-12">

            <div class="fb-profile-block">
                <div class="fb-profile-block-thumb cover-container">
                    <img src="{{ asset('assets/images/seller/seller_cover.png') }}" alt="@lang('image')">
                </div>
            </div>

        </div>

        <div class="container">

            <div class="row wrapper">
                
                <div class="col-md-4 col-xl-3 col-lg-4 col-sm-4">
                    <div class="mt-3  mb-0 d-flex flex-column ">
                        <div class="card mb-4">
                            <div class="card-body  profile">
                                <div style="position:relative">
                                    
                                    <img class="thumbnail" 
                                        src="{{ !empty($user->basicProfile->profile_picture)? $user->basicProfile->profile_picture: getImage('assets/images/default.png') }}" 
                                        id="preview-img"
                                        alt=""
                                    >

                                   
                                </div>
                                

                                <h4 class="my-3 text-center">{{$user->full_name}}</h4>
                                <h5 class="my-3 text-center">{{$user->job_title}}</h5>
                                <div class="text-center">
                                    <p class="short-text"><i class="fa fa-map-marker-alt"></i> {{$user->location}}</p>
                                    <p class="short-text"><i class="fa fa-clock"></i> {{ date('h:i a', strtotime($user->last_activity_at))}} Local time</p>
                                   
                                </div>
                                

                                <div class="article">
                                <p>{{ !empty($user->basicProfile->about) ? $user->basicProfile->about : ""}}</p>

                                </div>
                            <div class="row profile-data  d-flex align-items-center justify-content-center mb-2">
                                        <div class="col-6 col-xl-6" style="border-right: 1px solid #c5e0e0;">
                                            <h5>Rate</h5>
                                            <span class="profile-span-date">${{$user->rate_per_hour}} / hr</span>
                                        </div>
                                        <div class="col-6 border-right col-xl-6"><h5>Experience
                                            </h5>
                                            <span class="profile-span-date">5 Years</span>
                                        </div>
                                        <div class="sep-solid"></div>
                                        <!-- Force next columns to break to new line -->
                                        <div class="w-100"></div>
                                        <div class="col-6 col-xl-6" style="border-right: 1px solid #c5e0e0;">
                                            <h5>Total Jobs</h5>
                                            <span class="profile-span-date">172</span>
                                        </div>
                                        <div class="col-6 col-xl-6">
                                            <h5>Total Hours</h5>
                                            <span class="profile-span-date">$729</span>
                                        </div>
                                        <div class="sep-solid"></div>
                                        <div class="w-100"></div>
                                        <div class="col-6 border-right col-xl-6" style="border-right: 1px solid #c5e0e0;">
                                            <h5>Success Rate</h5>
                                            <span class="profile-span-date">97%</span>
                                        </div>
                                        <div class="col-6 border-right col-xl-6">
                                            <h5>Rating
                                            </h5>
                                            <span class="profile-span-date">4/5</span>
                                        </div>
                                    </div>
                                <div class="col-xl-12 mb-4">
                                    <strong>Core Skills & Expertise</strong>
                                    <div class="tags-container">
                                        @foreach ($user->skills as $item)
                                            <a href="#" class=" grey_badge  custom_badge badge-secondary">{{$item->name}}</a>
                                        @endforeach
                                    
                                    </div>
                                </div>
                                <div class="col-xl-12 mt-8">
                                    <strong class="title">{{$user->languages->count() >1 ?'Languages' : 'Language'}}</strong>
                                    <div class="pt-1">
                                        @foreach ($user->languages as $item)
                                        <b>{{getLanaguageName($item->language_id)}}</b>:{{getProficiencyLevelName($item->language_level_id)}}<br>
                                        @endforeach
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-xl-9 col-lg-8 col-sm-8 ">
                    <div class="card mb-4">
                        <div class="card-body mt-2">
                                <strong>Submit Feedback for {{$user->full_name}}</strong>
                                <form action="{{route('save.response.testimonial')}}" method="post" >
                                    @csrf
                                    <input type="hidden" name="user_testimonial_id" value="{{$user_testimonial->id}}">
                                    <div class="row mt-2">
                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                            <label for="">Full Name *</label>
                                            <input type="text" name="client_response_full_name" id=""  value="{{old('client_response_full_name')}}" placeholder="write your name  ">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                            <label for="">Role / Designation *</label>
                                            <input type="text" name="client_response_role" id=""  value="{{old('client_response_role')}}" placeholder="write your role  ">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6 mt-2">
                                            <label for="">Company *</label>
                                            <input type="text" name="client_response_company" id=""  value="{{old('client_response_company')}}" placeholder="write your company name  ">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6 mt-2">
                                            <label for="">LinkedIn Profile URL *</label>
                                            <input type="text" name="client_response_linkedin_profile_url" id=""  value="{{old('client_response_linkedin_profile_url')}}" placeholder="write your linkedin profile url ">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6 mt-2">
                                            <label for="">Quality *</label>
                                            <div class="rating" >
                                                <label>
                                                    <input type="radio" name="quality_rating" value="1" />
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="quality_rating" value="2" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="quality_rating" value="3" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>   
                                                </label>

                                                <label>
                                                    <input type="radio" name="quality_rating" value="4" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="quality_rating" value="5" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6 mt-2">
                                            <label for="">Communication *</label>
                                            <div class="rating ">
                                                <label >
                                                    <input type="radio" name="communication_rating" value="1" />
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="communication_rating" value="2" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="communication_rating" value="3" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>   
                                                </label>

                                                <label>
                                                    <input type="radio" name="communication_rating" value="4" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="communication_rating" value="5" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                            <label for="">Expertise *</label>
                                            <div class="rating">
                                                <label>
                                                    <input type="radio" name="expertise_rating" value="1" />
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="expertise_rating" value="2" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="expertise_rating" value="3" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>   
                                                </label>

                                                <label>
                                                    <input type="radio" name="expertise_rating" value="4" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="expertise_rating" value="5" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6 ">
                                            <label for="">Professionalism *</label>
                                            <div class="rating">
                                                <label>
                                                    <input type="radio" name="professionalism_rating" value="1" />
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="professionalism_rating" value="2" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="professionalism_rating" value="3" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>   
                                                </label>

                                                <label>
                                                    <input type="radio" name="professionalism_rating" value="4" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="professionalism_rating" value="5" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6 mt-2">
                                            <label for="">Comment * (Maximum {{config('settings.testimonial_max_text_length')}} words - This will be public)</label>
                                        </div>
                                        <br>
                                        <div class="col-md-12 col-sm-12 col-lg-12 mt-2">
                                            <label for="">{{$user_testimonial->message_to_client}}</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <textarea class="text_area " name="client_response" id="" placeholder="write testimonial here">{{old('client_response')}}</textarea>
                                        </div>
                                        <div class="float-right mt-4 mb-2">
                                            <button class="submit-btn" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection

@push('style-lib')

    <link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/testimonial_response.css')}}">

@endpush


