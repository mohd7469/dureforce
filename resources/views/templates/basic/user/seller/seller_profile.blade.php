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
                                    <img src="{{ asset('assets/images/default.png') }}"  class="thumbnail">
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
                            <div class="tab-pane container fade" id="Exp">
                                <div class="container mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 card-text-tab1 border-left">
                                            
                                            @foreach ($user_experience as $experience)

                                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                                    <h4>{{ $experience->job_title }}</h4>
                                                    <p class="short-text">{{ $experience->company_name }}</p>
                                                    <p class="short-text"><i class="fa fa-map-marker-alt"></i> {{$experience->country->name}}</p><br/>
                                                    <p class="short-text">{{getExperienceSession($experience)}}</p>
                                                    <ul class="timeline">
                                                        {{$experience->description}}
                                                    </ul>
                                                    <br>
                                                </div>
                                                    
                                            @endforeach
                                            
                                        </div>
                                            
                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
                                            <button type="button" class="standard-btn-sm-exp " data-bs-toggle="modal" data-bs-target="#addexperience">
                                                Add Experience
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="set">
                            <div class="row portfolio">
                                 <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 122.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Project Name</h3>
                                            <p class="card-text">This is a short project description..</p>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-xl-4 col-lg-6  col-md-6">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 122.png')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Project Name</h3>
                                                <p class="card-text">This is a short project description..</p>
                                            </div>
                                        </div>
                                    </div>
                                 <div class="col-xl-4 col-lg-6  col-md-6">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 123.png')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Project Name</h3>
                                                <p class="card-text">This is a short project description..</p>
                                            </div>
                                        </div>
                                    </div>
                                 <div class="col-xl-4 col-lg-6  col-md-6 mt-3  ">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 122.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Project Name</h3>
                                            <p class="card-text">This is a short project description..</p>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-xl-4 col-lg-6  col-md-6 mt-3   ">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 123.png')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Project Name</h3>
                                                <p class="card-text">This is a short project description..</p>
                                            </div>
                                        </div>
                                    </div>
                                  <div class="col-xl-4 col-lg-6  col-md-6  mt-3  ">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 122.png')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Project Name</h3>
                                                <p class="card-text">This is a short project description..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="edu">
                                <div class="container mt-5 mb-5">
                                    <div class="row">
                                        {{-- Education --}}
                                        @foreach ($user_education as $education_obj)
                                            <div class="col-xl-12 card-text-tab1 border-left">
                                                <h4>{{getDegreeTitle($education_obj)}}</h4>
                                                <p class="short-text">{{$education_obj->school_name}}</p><br/>
                                                <p class="short-text">{{getDegreeSession($education_obj)}}</p><br/>
                                                <p class="short-text"><i class="fa fa-map-marker-alt" aria-hidden="true"></i>  {{'location'}} </p><br/>
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
{{--      profile modal--}}
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
                                                            <label class="mt-4">Language
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
                                                            <label class="mt-4"> Profeciency Level<span class="imp">*</span></label>
                                                        
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
                                                            <div class="col-md-1" style="margin-top:20px; ">
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
    <div class="modal fade" id="addexperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header editprofileheader">
                    <h5 class="modal-title" id="exampleModalLabel">Experience</h5>
                    <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" id="form-basic-save">
        

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="title">Title *</label>
                                    <input type="text" class="form-control" name="title" placeholder="Freelance DevOps Engineer">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="title">Company *</label>
                                    <input type="text" class="form-control" name="company" placeholder="E.g. Microsoft">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="title">Location  *</label>
                                    <input type="text" class="form-control" name="Location" placeholder="Dublin, Ireland">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"  onclick="checkDate($(this), $('.experience-end-date'))">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        I’m currently working here
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="startdate">Start Date *</label>
                                <input type="date" class="form-control" name="startdate" placeholder="Month, Year">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="Language">End Date  *</label>
                                <input type="date" class="form-control experience-end-date" name="enddate" placeholder="Month, Year">
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="Description ">Description </label>
                                    <textarea type="text" class="form-control" name="Description" style="min-height: 90px !important">Describe your responsibilities</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex flex-row-reverse">

                            <button type="button" class="btn-save">Save</button>
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
let row_index= $('#languages_basics').val();

$(document).ready(function() {

    loadProfileBasicsData();
    user_basic_form.submit(function (e) {
        e.preventDefault();
        e.stopPropagation(); 
        saveUserBasic();
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

function addMoreLanguages() 
{
    languageRow.append(`
                        <div id="moreLanguage-row-`+row_index+`">
                                    
                            <div class="row" >
                                <div class="col-md-6 col-sm-10">
                                    <label class="mt-4">Language <span class="imp">*</span></label>
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
                                    <label class="mt-4">Profeciency Level <span class="imp">*</span></label>
                                    <select name="languages[`+row_index+`][language_level_id]" class="form-control select-lang" id="languages.`+row_index+`.language_level_id" >
                                        <option value=""   selected="">
                                                                My Level is
                                                                </option>
                                        ${_languages_levels?.map((level) => {
                                        return ` <option value="${level.id}"> ${level.name}</option>`;
                                        })}
                                    </select>
                                </div>
                                <div class="col-md-1" style="margin-top:15px">
                                    <button type="button" class="btn btn-danger btn-delete col-md-1 mt-5" onclick="removerow('#moreLanguage-row-`+row_index  +`')"><i class="fa fa-trash"></i></button>

                                </div>
                            </div>
                        </div>`                  
                        );
    row_index=row_index+1;

}

</script>

@endpush
@push('style')
<style>
    @media (min-width: 576px){
    .modal-dialog {
        max-width: 600px;
        margin: 1.75rem auto;
    }
    .modal-body{
    max-height: calc(100vh - 200px);
    overflow-y: auto;
}
    .fa, .fas {
        font-weight: 900;
        margin-left: -6px !important;
    }
    .btn{
        border-radius: 6px !important;
    }
    .add-more-lng-btn {
        color: #7f007f !important;
        
    }   
    .btn-save{
        margin-left: 5px !important;
    }
    
}
</style>
@endpush