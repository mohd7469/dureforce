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
                                    <img class="thumbnail" src="{{ !empty($user->basicProfile->profile_picture)? $user->basicProfile->profile_picture: getImage('assets/images/default.png') }}" alt="">
                                    <h4 class="my-3 text-center">{{$user->full_name}}</h4>
                                    <h5 class="my-3 text-center">{{$user->job_title}}</h5>
                                    <p class="short-text"><i class="fa fa-map-marker-alt"></i> {{$user->location}}</p>
                                    <p class="short-text"><i class="fa fa-clock"></i> 12:37 pm Local time</p>
                                    {{--                                  edit profile modal--}}
                                    <div class="d-flex mt-5">
                                        <button type="button" class="standard-btn-sm-edit text-center " data-bs-toggle="modal" data-bs-target="#editprofile">
                                            Edit Profile
                                        </button>
                                    </div>

                                    <div class="article">
                                    <p>Bacon ipsum dolor amet sirloin jowl turducken pork loin pig pork belly, chuck cupim tongue beef doner tri-tip pancetta spare ribs porchetta.
                                    </p> <a id="clickme">Read more</a>

                                    <p id="book" class="moretext">
                                        Brisket ball tip cow sirloin. Chuck porchetta kielbasa pork chop doner sirloin, bacon beef brisket ball tip short ribs.
                                    </p>
                                    <div class="sep-solid"></div>
                                    </div>
                                   <div class="row profile-data  d-flex align-items-center justify-content-center mb-2">
                                            <div class="col-6 col-xl-6">
                                                <h5>Rate</h5>
                                                <span>${{$user->rate_per_hour}} / hr</span>
                                            </div>
                                            <div class="col-6 border-right col-xl-6"><h5>Experience
                                                </h5>
                                                <span>5 Years</span>
                                            </div>

                                            <!-- Force next columns to break to new line -->
                                            <div class="w-100"></div>
                                            <div class="col-6 col-xl-6">
                                                <h5>Total Jobs</h5>
                                                <span>172</span>
                                            </div>
                                            <div class="col-6 col-xl-6">
                                                <h5>Total Hours</h5>
                                                <span>$729</span>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-6 border-right col-xl-6">
                                                <h5>Success Rate</h5>
                                                <span>97%</span>
                                            </div>
                                            <div class="col-6 border-right col-xl-6">
                                                <h5>Rating
                                                </h5>
                                                <span>4/5</span>
                                            </div>
                                        </div>
                                       <div class="col-xl-12 mb-4">
                                        <div class="tags-container">
                                            @foreach ($user->skills as $item)
                                                <a href="#" class=" grey_badge  custom_badge badge-secondary">{{$item->name}}</a>
                                            @endforeach
                                           
                                        </div>
                                       </div>
                                      <div class="col-xl-12 mt-8">
                                          <h5 class="title">Languages</h5>
                                          @foreach ($user->languages as $item)
                                            <span><b>{{getLanaguageName($item->language_id)}}:{{getProficiencyLevelName($item->language_level_id)}}</b></span> <span></span><br>
                                         @endforeach
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
                                            <a class="nav-link active" data-bs-toggle="tab" href="#msg">Work History</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#Exp">Experience</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#set">Portfolio</a>
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
                            <div class="tab-pane container active" id="msg">
                                    <div class="container col-sm ">
                                            <div class="inner-tab">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="tab-button active" id="home-tab" data-bs-toggle="tab" data-bs-target="#cmplt" type="button" role="tab" aria-controls="home" aria-selected="true">Completed</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="tab-button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#inpro" type="button" role="tab" aria-controls="profile" aria-selected="false">Inprogress</button>
                                                    </li>
                                                </ul>
                                            </div>
                                           <div class="tab-content">
                                                <div class="tab-pane active show" id="cmplt">
                                                   <div class="row">
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
                                                   </div>
                                                </div>
                                                <div class="tab-pane" id="inpro">
                                                    <div class="row">
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
                                                    </div>
                                                </div>
                                           </div>
                                    </div>
                                </div>
                            
                                {{-- experience tab --}}
                            <div class="tab-pane container fade" id="Exp">
                                <div class="container mt-5 mb-5">
                                    <div class="row section-heading-border justify-content-center align-items-center">
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <b>My Experience</b></div>
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-flex flex-row-reverse">
                                            <button type="button" class="btn btn-sm standard-btn-sm-exp " data-bs-toggle="modal" data-bs-target="#addexperience" id="add-exp-btn">
                                                Add Experience
                                            </button>
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
                                                
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
                                                <i class="fa fa-edit" onclick="editExperience({{$experience}})"></i>
                                            </div>
                                            
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane container fade" id="set">
                                
                                <div class="row section-heading-border justify-content-center align-items-center">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <b>My PortFolios</b></div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-flex flex-row-reverse">
                                        <a href="{{route('seller.profile.portfolio')}}">
                                            <button  role="button" class="btn btn-sm standard-btn-sm-exp " data-bs-toggle="modal"  >
                                                Add Portfolio
                                            </button>
                                        </a>
                                        
                                    </div>
                                </div>

                                <div class="row portfolio">
                                    
                                    @foreach ($user_portfolios as $portfolio)

                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-bottom:85px;">

                                            <div class="card" style="width: 18rem;height:220px;">
                                                <img class="card-img-top" src="{{ $portfolio->attachments()->exists() ? $portfolio->attachments()->first()->url: asset('assets/images/seller/Rectangle 122.png')  }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h3 class="card-title">{{$portfolio->name}}</h3>
                                                    <p class="card-text">{{$portfolio->description}}</p>
                                                </div>
                                            </div>

                                        </div>

                                    @endforeach
                                    
                                </div>
                            </div>

                            {{-- Education --}}
                            <div class="tab-pane container fade" id="edu">
                                
                                <div class="container mt-5 mb-5">
                                    
                                    <div class="row section-heading-border justify-content-center align-items-center">
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <b>My Education & Certificates</b></div>
                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-flex flex-row-reverse">
                                            <button type="button" class="btn btn-sm standard-btn-sm-exp " data-bs-toggle="modal" data-bs-target="#addeducation" id="add-edu-btn">
                                                Add Education & Certificates
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                   
                                        {{-- Education --}}
                                        @foreach ($user_education as $education_obj)
                                            
                                            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 card-text-tab1 border-left">
                                                <h4>{{getDegreeTitle($education_obj)}}</h4>
                                                <p class="short-text">{{$education_obj->school_name}}</p><br/>
                                                <p class="short-text">{{getDegreeSession($education_obj)}}</p><br/>
                                                <p class="short-text"><i class="fa fa-map-marker-alt" aria-hidden="true"></i>  {{'location'}} </p><br/>
                                            </div>

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
                                                <i class="fa fa-edit" onclick="editEducation({{$education_obj}})"></i>
                                            </div>
                                        @endforeach
                                                                               
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane container fade" id="tes">
                                <div class="row">
                                <div class="quote">
                                        <blockquote class="blockquote">
                                            Very cooperative and provided us with the revision for our satisfaction. A highly professional attitude and excellent communicator, I will highly recommend her! Very cooperative and provided us with the revision for our satisfaction. A highly professional attitude and excellent communicator, I will highly recommend her!
                                            Very cooperative and provided us with the revision for our satisfaction. A highly professional attitude and excellent communicator, I will highly recommend her! Very cooperative and provided us with the revision for our satisfaction. A highly professional attitude and excellent communicator, I will highly recommend her!
                                        </blockquote>
                                <p class="cite"><b>Simon King</b> <br>
                                    Director Marketing, Global Solutions Ltd</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- profile modal  --}}
        <div class="modal fade " id="editprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            
            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header editprofileheader">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                                    <div class="input-group mb-3 select2_element">
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
                                        <div class="input-group mb-3 select2_element">
                                            <select
                                                class="form-control select2 select2-hidden-accessible"
                                                name="skills[]"
                                                id="skills"
                                                multiple=""
                                                data-select2-id="select2-data-skills"
                                                tabindex="-1"
                                                aria-hidden="true"
                                                style="width:100%">
                                                <option value="">Select Skills</option>
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
        <div class="modal fade" id="addexperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header editprofileheader">
                        <h5 class="modal-title" id="exampleModalLabel">Experience</h5>
                        <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                                        <input class="form-check-input" type="checkbox" value="" name="is_working" id="exp_is_working"  onclick="checkDate($(this), $('.experience-end-date'))">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            I’m currently working here
                                        </label>
                                    </div>

                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label for="startdate">Start Date *</label>
                                    <input type="date" class="form-control" name="start_date" placeholder="Month, Year" id="exp_start_date">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label for="Language">End Date  *</label>
                                    <input type="date" class="form-control experience-end-date" name="end_date" placeholder="Month, Year" id="exp_end_date">
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="Description ">Description </label>
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

        {{-- Education Model --}}
        <div class="modal fade" id="addeducation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header editprofileheader">
                        <h5 class="modal-title" id="exampleModalLabel">Education</h5>
                        <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                                    <div>
                                        <label class="mt-2"
                                        >Education
                                            <span
                                                    class="imp"
                                            >*</span
                                            ></label
                                        >
                                        <input
        
                                                name="education"
                                                id="edu_education"
                                                value=""
                                                type="text"
                                                placeholder="E.g. University Of London"
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
                                                style="min-height: 90px !important"
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
    let row_index= $('#languages_basics').val();
    let exp_btn=$('#exp-btn');
    let add_exp_btn=$('#add-exp-btn');
    let add_edu_btn=$('#add-edu-btn');

    $(document).ready(function() {
        
        readmore();
        loadProfileBasicsData();

        add_exp_btn.click(function(e){
            experience_form.attr('action', "{{route('seller.profile.experience.add')}}");
            experience_form[0].reset();
            $('#exp_end_date').prop('disabled',false);
            $('#exp_description').empty();

        });

        add_edu_btn.click(function(e){
            education_form.attr('action', "{{route('seller.profile.education.add')}}");
            education_form[0].reset();
            $('#edu_end_date').prop('disabled',false);
            $('#edu_description').empty();
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

        $('#skills').select2({
            dropdownParent: $('#editprofile')
        });

    });

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
        message: message,
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

    function removerow(row_id)
    {
        var div_to_remove=row_id;
        let is_confirm = confirm('Are you sure you want to remove this record ?');
        if (is_confirm) {
            $(div_to_remove).remove();
        }
    }

    function saveUserBasic() {
        // var profile_file=$('input[type=file]')[0].files[0];
        let form_data = new FormData(user_basic_form[0]);
        // form_data.append('profile_picture', profile_file);
        // var form_data = user_basic_form.serialize();
        console.log(form_data);
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
                    notify('success', response.success);
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
