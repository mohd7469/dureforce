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

                                        @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                        
                                            <div class="profile-pic-edit-icon" id="profile-pic-edit-btn">
                                                <i class="fa fa-camera fa-2x icon-size" ></i>
                                            </div>

                                        @endif
                                    </div>
                                    

                                   

                                    <form action="#" class="d-none" method="post" id="profile_picture_form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="profile_pic" id="profile_pic_id" accept="image/png, image/gif, image/jpeg"
                                        onchange="previewFile(this)"
                                        >
                                    </form>

                                    <h4 class="my-3 text-center">{{$user->full_name}}</h4>
                                    <h5 class="my-3 text-center">{{$user->job_title}}</h5>
                                    <div class="text-center">
                                        <p class="short-text"><i class="fa fa-map-marker-alt"></i> {{$user->location}}</p>
                                        <p class="short-text"><i class="fa fa-clock"></i> {{ date('h:i a', strtotime($user->last_activity_at))}} Local time</p>
                                        {{--                                  edit profile modal--}}
                                        @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                        <div class="d-flex mt-5">
                                            
                                            <button type="button" class="standard-btn-sm-edit text-center " data-bs-toggle="modal" data-bs-target="#editprofile" style="margin-top: -27px;margin-bottom: 17px;">
                                                Edit Profile
                                            </button>
                                        </div>
                                        @endif
                                    </div>
                                    

                                    <div class="article">
                                    <p>{{ !empty($user->basicProfile->about) ? $user->basicProfile->about : ""}}</p>
                                        {{--                                        <a id="clickme">Read more</a>--}}

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
                            <div class="card-body">
                                <div class="container upper-tab">
                                    <!-- Nav tabs -->
                                    <ul class="nav ">
                                        <li class="nav-item">
                                            <a class="nav-link {{ \Route::is('seller.profile') || \Route::is('seller.profile.view') ? 'active' : '' }}" data-bs-toggle="tab" href="#msg">Work History</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#Exp">Experience</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ \Route::is('profile.portfolio')  || \Route::is('seller.profile.portfolio') || \Route::is('profile.portfolio.view') ||  \Route::is('seller.profile.portfolio.edit') ? 'active' : '' }}" data-bs-toggle="tab" href="#set">Portfolio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#edu">Education & Certifications</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tes">Testimonials</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Tab panes -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane container {{ \Route::is('seller.profile') || \Route::is('seller.profile.view') ? 'active' : 'fade' }}" id="msg">
                                    <div class="container col-sm ">
                                            <div class="inner-tab">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="tab-button active" id="home-tab" data-bs-toggle="tab" data-bs-target="#cmplt" type="button" role="tab" aria-controls="home" aria-selected="true">Completed</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="tab-button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#inpro" type="button" role="tab" aria-controls="profile" aria-selected="false">in progress</button>
                                                    </li>
                                                </ul>
                                            </div>
                                           <div class="tab-content">
                                                <div class="tab-pane active show" id="cmplt">
                                                   <h3>Coming Soon</h3>
                                                    {{-- <div class="row">
                                                       <div class="col-xl-10 card-text-tab">
                                                           <h4 >Elementor Custom Form Action (HTTP Get).</h4>
                                                           <h5 >Great work!!! Super Fast delivery</h5>
                                                           <ul class="d-flex list-unstyled flex-wrap-wrap mb-0 justify-content-start" >
                                                              <li class="mb-0 pr-5"><span>PHP</span></li>
                                                               <li class="mb-0 pr-5"><span>Website designe</span></li>
                                                               <li class="mb-0 pr-5"><span>WordPress</span></li>
                                                               <li class="mb-0 pr-5"><span>HTML</span></li>

                                                           </ul>
                                                           <span><i class='fas fa-flag-usa'></i> Bekir C.</span>
                                                       </div>
                                                       <div class="col-xl-2 card-text-tab">
                                                           <p>3 days ago</p>
                                                       </div>
                                                       <div class="col-xl-10 card-text-tab">
                                                           <h4 >Elementor Custom Form Action (HTTP Get).</h4>
                                                           <h5 >Great work!!! Super Fast delivery</h5>
                                                           <ul class="d-flex list-unstyled flex-wrap-wrap mb-0 justify-content-start">
                                                               <li class="mb-0 pr-5"><span>PHP</span></li>
                                                               <li class="mb-0 pr-5"><span>Website design</span></li>
                                                               <li class="mb-0 pr-5"><span>WordPress</span></li>
                                                               <li class="mb-0 pr-5"><span>HTML</span></li>
                                                           </ul>
                                                           <span><i class='fas fa-flag-usa'></i> Bekir C.</span>
                                                       </div>
                                                       <div class="col-xl-2 card-text-tab">
                                                           <p>3 days ago</p>
                                                       </div>
                                                       <div class="col-xl-10 card-text-tab">
                                                           <h4 >Elementor Custom Form Action (HTTP Get).</h4>
                                                           <h5 >Great work!!! Super Fast delivery</h5>
                                                           <ul class="d-flex list-unstyled flex-wrap-wrap mb-0 justify-content-start">
                                                               <li class="mb-0 pr-5"><span>PHP</span></li>
                                                               <li class="mb-0 pr-5"><span>Website design</span></li>
                                                               <li class="mb-0 pr-5"><span>WordPress</span></li>
                                                               <li class="mb-0 pr-5"><span>HTML</span></li>
                                                           </ul>
                                                           <span><i class='fas fa-flag-usa'></i> Bekir C.</span>
                                                       </div>
                                                       <div class="col-xl-2 card-text-tab">
                                                           <p>3 days ago</p>
                                                       </div>
                                                   </div> --}}
                                                </div>
                                                <div class="tab-pane" id="inpro">
                                                    <h3>Coming Soon</h3>
                                                    {{-- <div class="row">
                                                        <div class="col-xl-10 card-text-tab">
                                                            <h4 >Elementor Custom Form Action (HTTP Post).</h4>
                                                            <h5 >Great work!!! Super Fast delivery</h5>
                                                            <ul class="d-flex list-unstyled flex-wrap-wrap mb-0 justify-content-start" >
                                                                <li class="mb-0 pr-5"><span>PHP</span></li>
                                                                <li class="mb-0 pr-5"><span>Website designe</span></li>
                                                                <li class="mb-0 pr-5"><span>WordPress</span></li>
                                                                <li class="mb-0 pr-5"><span>HTML</span></li>
                                                            </ul>
                                                            <span><i class='fas fa-flag-usa'></i> Bekir C.</span>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <p>3 days ago</p>
                                                        </div>
                                                        <div class="col-xl-10 card-text-tab">
                                                            <h4 >Elementor Custom Form Action (HTTP Post).</h4>
                                                            <h5 >Great work!!! Super Fast delivery</h5>
                                                            <ul class="d-flex list-unstyled flex-wrap-wrap mb-0 justify-content-start" >
                                                                <li class="mb-0 pr-5"><span>PHP</span></li>
                                                                <li class="mb-0 pr-5"><span>Website designe</span></li>
                                                                <li class="mb-0 pr-5"><span>WordPress</span></li>
                                                                <li class="mb-0 pr-5"><span>HTML</span></li>
                                                            </ul>
                                                            <span><i class='fas fa-flag-usa'></i> Bekir C.</span>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                           </div>
                                    </div>
                                </div>
                            
                                {{-- experience tab --}}
                            <div class="tab-pane container fade " id="Exp">
                                <div class="container mt-5 mb-5">
                                    <div class="row section-heading-border justify-content-center align-items-center">
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <b>My Experience</b></div>
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-flex flex-row-reverse">
                                            @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                                <button type="button" class="btn btn-sm standard-btn-sm-exp " data-bs-toggle="modal" data-bs-target="#addexperience" id="add-exp-btn">
                                                    Add Experience
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-2">

                                        @foreach ($user_experience as $experience)

                                            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 card-text-tab1 border-left">
                                                
                                                <h4>{{ $experience->job_title }}</h4>
                                                <p class="short-text">{{ $experience->company_name }}</p>
                                                <p class="short-text"><i class="fa fa-map-marker-alt"></i> {{$experience->country->name}}</p><br/>
                                                <p class="short-text">{{getExperienceSession($experience)}}</p>
                                                <ul class="timeline">
                                                    {{$experience->description}}
                                                </ul>
                                                <br>
                                                
                                            </div>
                                            @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
                                                    <i class="fa fa-edit" onclick="editExperience({{$experience}})"></i>
                                                </div>
                                            @endif
                                            
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>
                            {{-- portfolio list --}}
                            <div class="tab-pane container  {{ \Route::is('profile.portfolio') ? 'active' : 'fade' }}" id="set">
                                
                                <div class="row section-heading-border justify-content-center align-items-center" style="margin-bottom: 23px;">
                                    
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> 
                                        <b>My Portfolio</b>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-flex flex-row-reverse">
                                        @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                        <a href="{{route('seller.profile.portfolio')}}">
                                            <button  role="button" class="btn btn-sm standard-btn-sm-exp " data-bs-toggle="modal"  >
                                                Add Portfolio
                                            </button>
                                        </a>
                                        @endif
                                        
                                    </div>

                                </div>

                                <div class="row portfolio">
                                    
                                    @foreach ($user_portfolios as $portfolio)

                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-bottom:85px;">

                                            <div class="card" style="width: 18rem;height:220px;">
                                                
                                                @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                                    <span class="text-right"  style="position: absolute;top:0;right:0;">

                                                        <a href="{{route('profile.portfolio.view',$portfolio->uuid)}}"  class="view-portfolio"><i class="fa fa-eye" style="color:#7F007F;margin-right: 10px;"></i></a>
                                                        <a href="{{route('seller.profile.portfolio.edit',$portfolio->uuid)}}"  class="edit-portfolio"><i class="fa fa-edit" style="color:#7F007F;margin-right: 10px;"></i></a>
                                                        <a href="{{route('seller.profile.portfolio.delete',$portfolio->uuid)}}" class="delete-portfolio"><i class="fa fa-trash" style="color: red;margin-right: 8px;"></i></a>

                                                    </span>
                                                @endif

                                                <a href="{{route('profile.portfolio.view',$portfolio->uuid)}}">
                                                    @if ($portfolio->video_url)
                                                        <iframe src="{{portfolioVideoUrl($portfolio->video_url)}}" title="YouTube video player" frameborder="0" id="preview_video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:18rem;height:220px"></iframe>
                                                    @else
                                                        <img class="card-img-top portfolio-img" src="{{ $portfolio->attachments()->exists() ? $portfolio->attachments()->first()->url: asset('assets/images/seller/Rectangle 122.png')  }}" alt="Card image cap">
                                                    @endif
                                                </a>

                                                <div class="card-body">
                                                    <h3 class="card-title">{{ substr($portfolio->name,0,23)}}{{'...'}}</h3>
                                                    <span class="card-text">{{ substr($portfolio->description, 0,  26)}}</span><a href="{{route('profile.portfolio.view',$portfolio->uuid)}}"><strong class="portfolio-desc"> More...</strong></a>
                                                </div>

                                            </div>

                                        </div>

                                    @endforeach
                                    
                                </div>
                            </div>

                            {{-- add New Portfolio --}}
                            <div class="tab-pane container  {{ \Route::is('seller.profile.portfolio') ? 'active' : 'fade' }}" id="set">
                                
                                <div class="row section-heading-border " style="
                                    margin-bottom: 23px;">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <b>My Portfolio > Add New</b></div>
                                    <div class="sep-solid"></div>
                                </div>

                                <div class="row portfolio">
                                    @include( $activeTemplate . 'portfolio.create',['skills' => $skills])
                                </div>
                            </div>

                            {{-- View Portfolio --}}
                            @if (\Route::is('profile.portfolio.view'))
                                {{-- View Portfolio --}}
                                <div class="tab-pane container  {{ \Route::is('profile.portfolio.view') ? 'active' : 'fade' }}" id="set">
                                    @include( $activeTemplate . 'portfolio.view',['user_portfolio' => $user_portfolio])
                                </div>
                            @endif

                            {{-- Edit Portfolio --}}
                            @if (\Route::is('seller.profile.portfolio.edit'))
                                <div class="tab-pane container  {{ \Route::is('seller.profile.portfolio.edit') ? 'active' : 'fade' }}" id="set">                         
                                    @include( $activeTemplate . 'portfolio.edit',['skills' => $skills,'user_portfolio' => $user_portfolio])
                                </div>
                            @endif
                            
                            {{-- Education --}}
                            <div class="tab-pane container fade" id="edu">
                                
                                <div class="container mt-5 mb-5">
                                    
                                    <div class="row section-heading-border justify-content-center align-items-center">
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <b>My Education & Certificates</b></div>
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-flex flex-row-reverse">
                                            @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                            <button type="button" class="btn btn-sm standard-btn-sm-exp " data-bs-toggle="modal" data-bs-target="#addeducation" id="add-edu-btn">
                                                Add Education & Certificates
                                            </button>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                   
                                        {{-- Education --}}
                                        @foreach ($user_education as $education_obj)
                                            
                                            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 card-text-tab1 border-left">
                                                <h4>{{getDegreeTitle($education_obj)}}</h4>
                                                <p class="short-text">{{$education_obj->school_name}}</p><br/>
                                                <p class="short-text">{{getDegreeSession($education_obj)}}</p><br/>
                                            </div>
                                            @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
                                                <i class="fa fa-edit" onclick="editEducation({{$education_obj}})"></i>
                                            </div>
                                            @endif
                                        @endforeach
                                                                               
                                    </div>
                                </div>

                            </div>
                            {{-- testnomials --}}
                            <div class="tab-pane container fade" id="tes">
                                
                                <div class="row section-heading-border justify-content-center align-items-center">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <b>My Testimonials</b></div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-flex flex-row-reverse">
                                        @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)
                                            <button type="button" class="btn btn-sm standard-btn-sm-exp " data-bs-toggle="modal" data-bs-target="#addtestmonial" id="add-testmonial-btn">
                                                Request For Testimonial
                                            </button>
                                        @endif
                                    </div>
                                </div>

                                    @foreach ($testimonials as $testimonial)
                                    <div class="row">

                                        <div class="quote">
                                            <blockquote class="blockquote" >
                                               {{ $testimonial->status_id ==  App\Models\UserTestimonial::STATUSES['Requested'] ? $testimonial->message_to_client :$testimonial->client_response }}
                                            </blockquote>
                                            <hr class="divider">
                                            <div class="row ">
                                                <table class="table table-borderless table-spacing">
                                                    <tbody class="text-center">
                                                        <tr>
                                                            <td ><b>{{trans('Quality')}}</b></td>
                                                            <td>

                                                                @for ($index=0;$index<5;$index++)
                                                                    @if ($index<$testimonial->quality_rating)
                                                                        <i class="fa fa-solid fa-star testmonials-review-star"></i>
                                                                    @else
                                                                        <i class="fa fa-solid fa-star review-star"></i>
                                                                    @endif
                                                                    
                                                                @endfor
                                                            
                                                            </td>
                                                            <td><b>{{trans('Communication')}}</b></td>
                                                            <td>
                                                                @for ($index=0;$index<5;$index++)
                                                                    @if ($index<$testimonial->communication_rating)
                                                                        <i class="fa fa-solid fa-star testmonials-review-star"></i>
                                                                    @else
                                                                        <i class="fa fa-solid fa-star review-star"></i>
                                                                    @endif
                                                                
                                                                @endfor
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td ><b>{{trans('Expertise')}}</b></td>
                                                            <td>
                                                                @for ($index=0;$index<5;$index++)
                                                                    @if ($index<$testimonial->expertise_rating)
                                                                        <i class="fa fa-solid fa-star testmonials-review-star"></i>
                                                                    @else
                                                                        <i class="fa fa-solid fa-star review-star"></i>
                                                                    @endif
                                                                
                                                                @endfor
                                                            </td>
                                                            <td><b>{{trans('Professionalism')}}</b></td>
                                                            <td>
                                                                @for ($index=0;$index<5;$index++)
                                                                    @if ($index<$testimonial->professionalism_rating)
                                                                        <i class="fa fa-solid fa-star testmonials-review-star"></i>
                                                                    @else
                                                                        <i class="fa fa-solid fa-star review-star"></i>
                                                                @endif
                                                                
                                                            @endfor
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <hr class="divider">
                                            <p class="cite">
                                                
                                                <b>{{$testimonial->status_id ==  App\Models\UserTestimonial::STATUSES['Requested'] ? $testimonial->client_name : $testimonial->client_response_full_name}}</b> 
                                                @if ($testimonial->status_id !=  App\Models\UserTestimonial::STATUSES['Requested'])
                                                    <br>
                                                    {{$testimonial->client_response_company}}
                                                @endif
                                                
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                        <a href="{{$testimonial->status_id ==  App\Models\UserTestimonial::STATUSES['Requested'] ? $testimonial->client_linkedin_url :  $testimonial->client_response_linkedin_url}}">
                                                            <i class="fab fa-solid fa-linkedin"></i>
                                                            <span class="see-profile">See LinkedIn Profile </span>
        
                                                        </a>
                                                    </div>
                                                    @if ($testimonial->status)
                                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 float-right mb-3 mr-3">
                                                            <span class="float-right p-2 badge {{$testimonial->status->color }}">
                                                                @if ($testimonial->status_id ==  App\Models\UserTestimonial::STATUSES['Accepted'])
                                                                    <img src="/assets/images/job/tick-c.png" alt="verified icon not found" style="height: 20px;width:20px;">
                                                                @endif
                                                                {{$testimonial->status ? $testimonial->status->name : 'N/A'}}
                                                            </span>

                                                        </div>
                                                    @endif
                                                   
                                                </div>
                                                
                                                
                                                
                                                    
                                            </p>
                                        </div>
                                    </div>
                                    <br>

                                    @endforeach
                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- profile modal  --}}
        <div class="modal fade " id="editprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            
            <div class="modal-dialog modal-dialog-profile">

                <div class="modal-content">

                    <div class="modal-header editprofileheader">
                        @if (getLastLoginRoleId()==App\Models\Role::$Freelancer)

                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>

                        @endif
                        <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body modal-body-profile">
                        <form action="" id="form-basic-save">
                            @csrf
                            <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="title">Job Title *</label>
                                        <input type="text" class="form-control" name="designation" placeholder="Freelance DevOps Engineer" value="{{$user->job_title}}">
                                    </div>
                                </div>
                               

                                <div class="col-xl-12">
                                    <div class=" mb-3 select2_element">
                                        <label for="title">Category *</label>
                                        <select
                                            name="category_id[]"
                                            class=" form-control  select2 select2-hidden-accessible"
                                            multiple="" data-placeholder="Select Categories"  tabindex="-1" aria-hidden="true" style="width: 100% !important"
                                            id="user_category_id"
                                            >
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{$category->id}}"
                                                    {{in_array($category->id,$user->categories->pluck('id')->toArray()) ? 'selected' :''}}
                                                >
                                                    {{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="title">Phone *</label>
                                        <input
                                                type="number"
                                                name="phone_number"
                                                placeholder=""
                                                id="phone"
                                                step="any"
                                                value ="{{$basicProfile->phone_number}}"
                                            />
                                    </div>
                                </div>

                                <div class="col-xl-12">

                                    <div class="form-group">
                                        <label for="title">Location *</label>
                                        <select class="form-control" name="city_id" id="">
                                            <option value="">Select City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{$city->id}}" {{$basicProfile->city_id==$city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label for="title">About  *</label>
                                            <textarea type="text" class="form-control" name="about" cols="4"  style="min-height: 90px !important">{{$basicProfile->about}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label for="title">Rate Per Hour  *</label>
                                            <input type="text" class="form-control" name="rate" placeholder="$40" value="{{$user->rate_per_hour}}">
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12 form-group editpro">
                                        <label>@lang('Core Skills & Expertise')</label>
                                        <div class=" mb-3 select2_element">
                                            <select
                                                class="form-control select2 select2-hidden-accessible"
                                                name="skills[]"
                                                id="skills"
                                                multiple=""
                                                data-select2-id="select2-data-skills"
                                                tabindex="-1"
                                                aria-hidden="true"
                                                style="width:100%">
                                                <option value="" disabled="disabled">Select Skills</option>
                                                @foreach ($skills as $skill)
                                                    <option value="{{$skill->id}}"  {{in_array($skill->id,$userskills->pluck('id')->toArray()) ? 'selected' :''}}>{{$skill->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="language-container row" id="language-row" style="justify-content: space-between !important;">
                                            @foreach ($user_languages as $key=>$user_language)
                                                {{-- language --}}
                                                <div  id="moreLanguage-row-{{$key}}">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="mt-2">Language
                                                            <span class="imp">*</span></label>
                                                            <select
                                                                name="languages[{{$key}}][language_id]"
                                                                class="form-control select-lang "
                                                                id="languages.{{$key}}.language_id"
                                                                >
                                                                <option
                                                                    value=""
                                                                    selected=""
                                                                    >
                                                                    Spoken
                                                                    Language(s)
                                                                </option>
                                                                
                                                                @foreach ($languages as $language)
                                                                    <option
                                                                        value="{{$language->id}}"
                                                                        {{ $language->id== $user_language->language_id ? 'selected' :'' }}
                                                                    >
                                                                    {{ $language->iso_language_name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        {{-- proficiency level --}}
                                                        <div class="{{ $key > 0 ? 'col-md-5' : 'col-md-6'  }} col-sm-12">
                                                            <label class="mt-2"> Profeciency Level<span class="imp">*</span></label>
                                                        
                                                            <select
                                                                name="languages[{{$key}}][language_level_id]"
                                                                class="form-control selected-level select-lang"
                                                                id="languages.{{$key}}.language_level_id"
                                                                >
                                                                <option value="" selected="" >
                                                                    Proficiency Level
                                                                </option>
                                    
                                                                @foreach ($language_levels as $level)
                                                                    <option 
                                                                        value="{{$level->id}}"
                                                                        {{ $level->id== $user_language->language_level_id ? 'selected' :'' }}
                                                                    >
                                                                        {{$level->name}}
                                                                    </option>
                                                                    
                                                                @endforeach
                                                                
                                                                
                                                            </select>
                                
                                                        </div>

                                                        {{-- delete btn --}}
                                                        @if ($key > 0)
                                                            <div class="col-md-1" >
                                                                <button type="button" class="btn btn-danger btn-delete col-md-1 mt-5" onclick="removerow('#moreLanguage-row-{{$key}}')"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        @endif
                                                    </div>   
                                                </div>  
                                                            
                                            @endforeach

                                    
                                        </div>
                                        <input type="hidden" name="languages_basics" id="languages_basics" value="{{$user_languages->count()}}">

                                        {{-- add another language btn --}}
                                        <a type="button" class="my-2 add-more-lng-btn" id="add-language" onclick="addMoreLanguages()">Add another</a>
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="row d-flex flex-row-reverse" >
                                <hr>
                                <button type="submit" class="btn-save">Save</button>
                                <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                    

                </div>

            </div>
        </div>
        
        {{-- Add Experience Model --}}
        <div class="modal fade" id="addexperience" tabindex="-1" aria-labelledby="ExperienceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-profile">
                <div class="modal-content">
                    <div class="modal-header editprofileheader">
                        <h5 class="modal-title" id="exampleModalLabel">Experience</h5>
                        <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-profile">
                        <form action="{{route('seller.profile.experience.add')}}" id="experience_form" method="post">
            
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="title">Title *</label>
                                        <input type="text" class="form-control" name="job_title" placeholder="Freelance DevOps Engineer" id="exp_job_title">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="title">Company *</label>
                                        <input type="text" class="form-control" name="company_name" placeholder="E.g. Microsoft" id="exp_company_name">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    
                                    <div class="form-group">
                                        <label for="title">Location  *</label>
                                        <select
                                                name="country_id"
                                                class="form-control"
                                                id="exp_country_id"
                                                >
                                                
                                                <option
                                                    value=""
                                                    selected=""
                                                >
                                                    Select Country
                                                </option>
                                                @foreach ($countries as $country)
                                                <option
                                                    value="{{$country->id}}"
                                                    
                                                >
                                                    {{$country->name}}
                                                </option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="is_working" id="exp_is_working"  onclick="checkDate($(this), $('.experience-end-date'))">
                                        <label class="form-check-label" >
                                            I’m currently working here
                                        </label>
                                    </div>

                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label for="startdate">Start Date *</label>
                                    <input type="date" class="form-control" name="start_date" placeholder="Month, Year" id="exp_start_date" min="1900-01-01" max="2099-12-31">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label for="Language">End Date  *</label>
                                    <input type="date" class="form-control experience-end-date" name="end_date" placeholder="Month, Year" id="exp_end_date" min="1900-01-01" max="2099-12-31">
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="Description ">Description *</label>
                                        <textarea type="text" class="form-control" name="description" style="min-height: 90px !important" placeholder="Describe your responsibilities" id="exp_description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex flex-row-reverse">

                                <button type="submit" class="btn-save" id="exp-btn">Save</button>
                                <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>

                            </div>

                        </form>
                    </div>
                
                </div>
            </div>
        </div>

        {{-- Add Testimonial Request Model --}}
        <div class="modal fade" id="addtestmonial" tabindex="-1" aria-labelledby="TestimonialModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header editprofileheader">
                        <h5 class="modal-title" id="exampleModalLabel">Testimonial Request</h5>
                        <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-profile">

                        <form action="{{route('seller.profile.testimonial.request')}}" id="testimonial_request_form" method="post">
            
                            @csrf

                            <div class="row">
                                
                                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 row">
                                    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title">Client Name *</label>
                                            <input type="text" class="form-control" name="client_name" placeholder="write client name " id="client_name_id">
                                        </div>
                                    </div>
    
                                    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title">Business Email Address *</label>
                                            <input type="email" class="form-control" name="client_email" placeholder="write client business email" id="client_email_id">
                                        </div>
                                    </div>
    
                                    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title">Client LinkedIn Profile URL *</label>
                                            <input type="text" class="form-control" name="client_linkedin_url" placeholder="write client linkedin profile url" id="client_linkiedin_url_id">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title">Project Type</label>
                                            <input type="text" class="form-control" name="project_type" placeholder="write project type" id="project_type_id">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title">Message To Client <span style="font-weight: initial"> (only max 250 characters are allowed)</span></label>
                                            <textarea  class="form-control text_area" name="message_to_client" placeholder="write message for client" id="message_to_client_id"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 ">
                                    <div class="text-center">
                                        <img src="{{asset('assets\images\seller\testimonial-2.jpg')}}" class="rounded" alt="..." style="height:100px">
                                    </div>
                                    <div class="mt-3 ">
                                        <strong >
                                            Strengthen your profile with client testimonials
                                        </strong>

                                        <ul class="list-group pmd-list pmd-card-list border-0 mt-1 ">
                                            <li class="list-group-item d-flex border-0" >
                                                <i class="fa fa-check green" aria-hidden="true" ></i>
                                                <span class="media-body">Showcase your skills and success from clients outside dureforce</span>
                                            </li>
                                            <li class="list-group-item d-flex border-0">
                                                <i class="fa fa-check green" aria-hidden="true"></i>
                                                <div class="media-body">your clients will get an email within instructions for submitting your success story</div>
                                            </li>
                                            <li class="list-group-item d-flex border-0"> 
                                                <i class="fa fa-check green" aria-hidden="true"></i>
                                                <div class="media-body">The testimonial will display on your profile once it's verified by dureforce</div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="d-flex flex-row-reverse">

                                <button type="submit" class="btn-save" id="testimonial-request-btn">Request</button>
                                <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>

                            </div>

                        </form>
                    </div>
                
                </div>
            </div>
        </div>

        {{-- Education Model --}}
        <div class="modal fade" id="addeducation" tabindex="-1" aria-labelledby="EducationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-profile">
                <div class="modal-content">
                    <div class="modal-header editprofileheader">
                        <h5 class="modal-title" id="exampleModalLabel">Education</h5>
                        <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-profile">
                        <form action="{{route('seller.profile.education.add')}}" id="education_form" method="post">
            
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div>
                                        <label 
                                        >School /
                                            College /
                                            University
                                            <span
                                                    class="imp"
                                            >*</span
                                            ></label
                                        >
        
                                        <input
                                                type="text"
                                                name="school_name"
                                                id="edu_school_name"
                                                placeholder="E.g. University Of Lo sdssdndon"
                                        />
                                    </div>
                                    
                                </div>

                               
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 ">
    
                                            <label class="mt-2">Degree <span class="imp">*</span></label>
        
                                            <select name="degree_id" class="form-control select-lang" id="edu_degree_id">
                                                <option value="" selected=""> Select Degree</option>
                                                @foreach ($degrees as $degree)
                                                    <option value="{{$degree->id}}" > {{ $degree->title }} </option>
                                                @endforeach
                                            </select>
        
                                        </div>
        
                                        <div class="col-md-6">
                                            <label class="mt-2">Field Of Study <span class="imp">*</span>
                                            </label>
                                            <input
                                                    id="edu_field_of_study"
                                                    type="text"
                                                    name="field_of_study"
                                                    id="field_of_study"
                                                    placeholder="Visual Arts"/>
                                        </div>
                                    </div>
                                   
    
                                </div>

                                <div class="col-md-12 mt-2">
                                    
                                    <div
                                            class="form-check"
                                    >
                                        <input
                                                class="form-check-input check current-working-check"
                                                onclick="checkDate($(this), $('.end-date-job-education'))"
                                                type="checkbox"
                                                name="is_enrolled"
                                                id="edu_isCurrent"
    
                                        />
                                        <label
                                                class="form-check-label"
                                                for="flexCheckDefault"
                                        >I’m
                                            currently
                                            enroll
                                            here</label
                                        >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="mt-2"
                                        >Dates Attended
                                            <span
                                                    class="imp"
                                            >*</span
                                            ></label
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div
                                                class="col-md-6"
                                        >
                                            <label
                                                    for=""
                                                    class="mt-2"
                                            >From Date
                                                <span
                                                        class="imp"
                                                >*</span
                                                ></label
                                            >
                                            <input
                                                    type="date"
                                                    id="edu_start_date"
                                                    name="start_date"
                                                    id="start_date"
                                                    onchange="setMinDateJob($(this), $('.end-date-job-education-0'))"
                                                    
                                            />  
                                        </div>
                                        <div
                                                class="col-md-6"
                                        >
                                            <label
                                                    for=""
                                                    class="mt-2 "
                                            >To Date
                                                <span
                                                        class="imp"
                                                >*</span
                                                ></label
                                            >
                                            <input
                                                class="end-date-job-education"
                                                    type="date"
                                                    name="end_date"
                                                    id="edu_end_date"
                                                    onchange="setMinDateJob($(this), $('.end-date-job-education-0'))"
                                                    onchange="checkIfDateGreaterInsti($(this))"
                                                    
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div>
                                            <label class="mt-2"
                                        >Description
                                            <span
                                                    class="imp"
                                            >*</span
                                            ></label
                                        >
                                        <textarea
                                                
                                                name="description"
                                                id="edu_description"
                                                placeholder="Add Description  "
                                                style="min-height: 90px !important;width:100%"
                                        ></textarea>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>

                            <div class="row d-flex flex-row-reverse mt-2">

                                <button type="submit" class="btn-save" id="edu-btn">Save</button>
                                <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>

                            </div>

                        </form>
                    </div>
                
                </div>
            </div>
        </div>

@endsection
@push('style')

<style>
    .text_area{
        min-height: 200px !important
    }
    .table-spacing{
        margin-bottom: -8px !important;
    }
    .bg_color{
        background-color: lightcyan
    }
    .green{
        color:green;
        margin-top:3px;
        margin-right:6px;
    }
    .portfolio-desc{
        margin-left: 4px;
    }
    .sep-solid {
        border-top: 2px solid #c5e0e0;
        margin-top: 18px;
    }
    .portfolio-img{
        
        height: 220px;
        width: 100%;
    }
    .testmonials-review-star{
        padding: 3px;
        color: #F09959;
    }
    .review-star{
        padding: 3px;
        color: rgb(215, 212, 212);
    }
    .quote{
        height:auto;
    }
    .see-profile{
        color:#0077B5;
    }
    .divider{
        color: #DCDCDC
    }
</style>

    
@endpush
@push('script-lib')

    <script src="{{asset($activeTemplateTrue.'frontend/js/select2.min.js')}}"></script>
    <script src="{{asset('/assets/resources/templates/basic/frontend/js/seller_profile.js')}}"></script>

<script>

    "use strict";
    var languageRow = $('#language-row');
    var _languages = [];
    let _languages_levels = [];
    let _countries = [];
    let _degress = [];
    let user_basic_form=$('#form-basic-save');
    let experience_form=$('#experience_form');
    let education_form=$('#education_form');
    let testimonial_request_form=$('#testimonial_request_form');

    let row_index= $('#languages_basics').val();
    let exp_btn=$('#exp-btn');
    let add_exp_btn=$('#add-exp-btn');
    let add_edu_btn=$('#add-edu-btn');
    let testimonial_req_btn=$('#testimonial-request-btn');

    let edit_profile_picture_btn=$('#profile-pic-edit-btn');
    var token= $('input[name=_token]').val();
    var profile_picture_form = $('#profile_picture_form');
    var delete_portfolio=$('.delete-portfolio');
    
    $(document).ready(function() {
        
        readmore();
        loadProfileBasicsData();

        add_exp_btn.click(function(e){
            experience_form.attr('action', "{{route('seller.profile.experience.add')}}");
            experience_form[0].reset();
            $('#exp_end_date').prop('disabled',false);
            $('#exp_description').empty();

        });

        delete_portfolio.click(function(e){
            e.preventDefault();
            deletePortfolioConfirmation($(this).attr('href'));       
        });
        edit_profile_picture_btn.click(function(e){
            $('#profile_pic_id').click();
        });

        add_edu_btn.click(function(e){
            education_form.attr('action', "{{route('seller.profile.education.add')}}");
            education_form[0].reset();
            $('#edu_end_date').prop('disabled',false);
            $('#edu_description').empty();
        });

    

        testimonial_request_form.submit(function (e) {

            e.preventDefault();
            e.stopPropagation(); 
            RequestForTestimonial();

        });
        
        user_basic_form.submit(function (e) {
            e.preventDefault();
            e.stopPropagation(); 
            saveUserBasic();
        });
       
        experience_form.submit(function (e) {
            e.preventDefault();
            e.stopPropagation(); 
            addExperience();
        });

        education_form.submit(function (e) {
            e.preventDefault();
            e.stopPropagation(); 
            addEducation();
        });

        $("#skills").select2({
            closeOnSelect: false
        });

        $("#user_category_id").select2({
            closeOnSelect: false
        });

        $('#user_category_id').select2({
            tags: true
        });

        $('#user_category_id').select2({
            dropdownParent: $('#editprofile')
        });

        $('#skills').select2({
            tags: true
        });

        $('#portfolio_skills').select2({
            tags: true,
            maximumSelectionLength: 15
        });

        $('#edit_portfolio_skills').select2({
            tags: true,
            maximumSelectionLength: 15
        });

        $('#skills').select2({
            dropdownParent: $('#editprofile')
        });

    });
    function deletePortfolioConfirmation(delete_portfolio_route){
            const swalWithBootstrapButtons = Swal.mixin(   
            {
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure you want to delete portfolio ?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete Portfolio!',
            cancelButtonText: 'No, Cancel!',
            reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.replace(delete_portfolio_route);
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Portfolio delete  has been cancelled :)',
                        'error'
                    )
                }
            })
        }
    function updateProfilePicture(){
        
        // var profile_file=$('input[type=file]')[0].files[0];
        let form_data = new FormData(profile_picture_form[0]);
        // form_data.append('profile_picture', profile_file);
        
        $.ajax({
            type:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{route('seller.profile.picture.update')}}",
            data: form_data,
            processData: false,
            contentType: false,
            success:function(response){
                console.log(response);
                if(response.success){
                    
                    notify('success', response.success);
                }
                else{
                    notify('error', response.errors);
                }
                $(".preloader").css("display", "none");

            }
        });
    }

    function previewFile(input) {

        let file = $("input[type=file]").get(0).files[0];
        let idxDot = file.name.lastIndexOf(".") + 1;
        let extFile = file.name.substr(idxDot, file.name.length).toLowerCase();
        if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
            if (file) {
                let reader = new FileReader();
                reader.onload = function() {
                    $("#preview-img").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
                updateProfilePicture();
            }
        } else {
            alert("Only jpg/jpeg, png files are allowed!");
            return false;
        }

    }
    function checkDate(parent, element) {

        if (parent.is(':checked')) {
            element.val("DD/MM/YYYY");
            element.attr("disabled", true);
        }
        if (!parent.is(':checked')) {
            element.removeAttr("disabled");
        }

    }

    function displayErrorMessage(validation_errors)
    {
        $('input,select,textarea').removeClass('error-field');
        $('.select2').next().removeClass("error-field");
        for (var error in validation_errors) { 
            var error_message=validation_errors[error];

            $('[name="'+error+'"]').addClass('error-field');
            $('[id="'+error+'"]').addClass('error-field');
            $('#'+error).next().addClass('error-field');

            displayAlertMessage(error_message);

        
        }
    }
    function displayAlertMessage(message)
    {
        iziToast.error({
            message: message.toString().replace(',',' and '),
            position: "topRight",
        });
    }
    function loadProfileBasicsData()
    {
            $.ajax({
                type:"GET",
                url:"{{route('profile.basics.data')}}",
                success:function(data){
                    
                    _languages=data.languages;
                    _languages_levels=data.language_levels;
                    _countries=data.countries;
                    _degress=data.degrees;

                }
            });  
    }
    function setMinDateJob(parent, element) {
        element.attr('min', parent.val());
    }
    function removerow(row_id)
    {
        var div_to_remove=row_id;
        let is_confirm = confirm('Are you sure you want to remove this record ?');
        if (is_confirm) {
            $(div_to_remove).remove();
        }
    }
    function RequestForTestimonial(){
        let form_data = new FormData(testimonial_request_form[0]);
       
        $.ajax({
            type:"POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url:"{{route('seller.profile.testimonial.request')}}",
            data: form_data,
            processData: false,
            contentType: false,
            success:function(response){

                if(response.success){
                    notify('success', response.success);
                    testimonial_request_form[0].reset();
                    $('#addtestmonial').modal('hide');
                }
                else if(response.error){
                    notify('error', response.error);
                    displayErrorMessage(response.errors);
                }
                else{
                    displayErrorMessage(response.errors);
                }

            }
        });
    }
    function saveUserBasic() {
        // var profile_file=$('input[type=file]')[0].files[0];
        let form_data = new FormData(user_basic_form[0]);
        // form_data.append('profile_picture', profile_file);
        // var form_data = user_basic_form.serialize();
        $.ajax({
            type:"POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url:"{{route('user.profile.basics.edit')}}",
            data: form_data,
            processData: false,
            contentType: false,
            success:function(response){

                if(response.success){
                    // notify('success', response.success);
                    $('#editprofile').modal('hide');
                    location.reload();
                
                }
                else if(response.validation_errors){
                    displayErrorMessage(response.validation_errors);
                }
                else{
                    errorMessages(response.errors);
                }

            }
        });
        
    }

    function addEducation()
    {
        
        let form_data = new FormData(education_form[0]);
        let route=education_form.attr('action');
        $.ajax({
            type:"POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url:route,
            data: form_data,
            processData: false,
            contentType: false,
            success:function(response){

                if(response.success){
                    notify('success', response.success);
                    $('#addeducation').modal('hide');
                    location.reload();
                
                }
                else if(response.validation_errors){
                    displayErrorMessage(response.validation_errors);
                }
                else{
                    errorMessages(response.errors);
                }

            }
        });
    }

    function addExperience()
    {
        
        let form_data = new FormData(experience_form[0]);
        console.log(form_data);
        let route=experience_form.attr('action');
        $.ajax({
            type:"POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url:route,
            data: form_data,
            processData: false,
            contentType: false,
            success:function(response){

                if(response.success){
                    notify('success', response.success);
                    $('#addexperience').modal('hide');
                    location.reload();
                
                }
                else if(response.validation_errors){
                    displayErrorMessage(response.validation_errors);
                }
                else{
                    errorMessages(response.errors);
                }

            }
        });
    }

    function addMoreLanguages() 
    {
        languageRow.append(`
                            <div id="moreLanguage-row-`+row_index+`">
                                        
                                <div class="row" >
                                    <div class="col-md-6 col-sm-10">
                                        <label class="mt-2">Language <span class="imp">*</span></label>
                                        <select name="languages[`+row_index+`][language_id]" class="form-control select-lang py-2" id="languages.`+row_index+`.language_id">
                                            <option value=""  selected="">
                                            Spoken Language(s)
                                            </option>
                                        ${_languages?.map((language) => {
                                            return ` <option value="${language.id}"> ${language.iso_language_name}</option>`;
                                        })}
                                        </select>
                                    </div>
                                    <div class="col-md-5 col-sm-10">
                                        <label class="mt-2">Profeciency Level <span class="imp">*</span></label>
                                        <select name="languages[`+row_index+`][language_level_id]" class="form-control select-lang" id="languages.`+row_index+`.language_level_id" >
                                            <option value=""   selected="">
                                                                    My Level is
                                                                    </option>
                                            ${_languages_levels?.map((level) => {
                                            return ` <option value="${level.id}"> ${level.name}</option>`;
                                            })}
                                        </select>
                                    </div>
                                    <div class="col-md-1" >
                                        <button type="button" class="btn btn-danger btn-delete col-md-1 mt-5" onclick="removerow('#moreLanguage-row-`+row_index  +`')"><i class="fa fa-trash"></i></button>

                                    </div>
                                </div>
                            </div>`                  
                            );
        row_index=row_index+1;

    }

    function editExperience(experience_obj)
    {
        experience_form[0].reset();
        var route="{{route('seller.profile.experience.edit',':id')}}";
        route=route.replace(':id',experience_obj.id);
        experience_form.attr('action', route);
        $('#addexperience').modal('show');
        $("#exp_job_title").val( experience_obj.job_title );
        $('#exp_company_name').val(experience_obj.company_name);
        $('#exp_start_date').val(experience_obj.start_date);

        if(experience_obj.is_working ){

            $('#exp_is_working').prop('checked',true);
            $('#exp_end_date').prop('disabled',true);
        }
        else
        {

            $('#exp_end_date').val(experience_obj.end_date);
            
        }

        $('#exp_description').html(experience_obj.description);
        $('#exp_country_id option[value='+experience_obj.country_id+']').prop('selected',true);
    }

    function editEducation(education_obj)
    {
        education_form[0].reset();
        var route="{{route('seller.profile.education.edit',':id')}}";
        route=route.replace(':id',education_obj.id);
        education_form.attr('action', route);
        $('#addeducation').modal('show');
        $("#edu_school_name").val( education_obj.school_name );
        $('#edu_education').val(education_obj.education);
        $('#edu_field_of_study').val(education_obj.field_of_study);
        $('#edu_start_date').val(education_obj.start_date);

        if(education_obj.is_enrolled ){

            $('#edu_isCurrent').prop('checked',true);
            $('#edu_end_date').prop('disabled',true);
        }
        else
        {

            $('#edu_end_date').val(education_obj.end_date);
            
        }

        $('#edu_description').html(education_obj.description);

        $('#edu_degree_id option[value='+education_obj.degree_id+']').prop('selected',true);
    }

</script>

@endpush
