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
            </div>
            <div class="container">
                <div class="row wrapper">
                    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-4">
                        <div class="ms-4 mt-3  mb-0 d-flex flex-column ">
                            <div class="card mb-4">
                                <div class="card-body  profile">
                                    <img src="{{ asset('assets/images/default.png') }}"  class="thumbnail">
                                    <h4 class="my-3 text-center">Amna Kareem</h4>
                                    <h5 class="my-3 text-center">Freelance DevOps Engineer</h5>
                                    <p class="short-text"><i class="fa fa-map-marker-alt"></i> Karachi, Pakistan</p>

                                    <p class="short-text"><i class="fa fa-clock"></i> 12:37 pm Local time</p>
{{--                                  edit profile modal--}}
                                    <div class="d-flex mt-5">
                                        <button type="button" class="standard-btn-sm-edit text-center " data-bs-toggle="modal" data-bs-target="#editprofile">
                                            Edit Profile
                                        </button>
                                    </div>

                                    <div class="article">
                                    <p>Bacon ipsum dolor amet sirloin jowl turducken pork loin pig pork belly, chuck cupim tongue beef doner tri-tip pancetta spare ribs porchetta.
                                    </p>
                                    <a id="clickme">Read more</a>
                                    <p id="book" class="moretext">
                                        Brisket ball tip cow sirloin. Chuck porchetta kielbasa pork chop doner sirloin, bacon beef brisket ball tip short ribs.
                                    </p>
                                    <div class="sep-solid"></div>
                                    </div>
                                   <div class="row profile-data  d-flex align-items-center justify-content-center mb-2">
                                            <div class="col-6 col-xl-6">
                                                <h5>Rate</h5>
                                                <span>$40 / hr</span>
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
                                            <a href="tags/55" class=" grey_badge  custom_badge badge-secondary">Angular</a>
                                            <a href="tags/56" class=" grey_badge  custom_badge badge-secondary">React</a>
                                            <a href="tags/57" class=" grey_badge  custom_badge badge-secondary">PHP</a>
                                            <a href="tags/349" class=" grey_badge  custom_badge badge-secondary">Flutter</a>
                                            <a href="tags/350" class=" grey_badge  custom_badge badge-secondary">Python</a>
                                            <a href="tags/351" class=" grey_badge  custom_badge badge-secondary">html</a>
                                        </div>
                                       </div>
                                      <div class="col-xl-12 mt-8">
                                          <h5 class="title">Languages</h5>
                                          <span><b>English:</b></span> <span>Fluent</span><br>
                                          <span><b>Urdu:</b></span><span>Native or Bilingual</span>
                                      </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xl-8 col-lg-8 col-sm-8 ">
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
                                                <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                                                    <li class="nav-item">
                                                        <a class="active standard-btn" aria-current="true" data-bs-toggle="tab" href="#cmplt">Completed</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="standard-btn " data-bs-toggle="tab" href="#inpro">In-progress</a>
                                                    </li>
                                                </ul>
                                            </div>
                                           <div class="tab-content">
                                                <div class="tab-pane active" id="cmplt">
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
                                        <div class="col-xl-8 card-text-tab1 border-left">
                                            <h4>Senior DevOps Engineer</h4>
                                            <p class="short-text">Labelbox</p>
                                            <p class="short-text"><i class="fa fa-map-marker-alt"></i> Karachi, Pakistan</p><br/>
                                            <p class="short-text"><?php echo date("Y");?> - PRESENT</p>
                                            <ul class="timeline">
                                                <li>
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                                                </li>
                                                <li>
                                                    <p> Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                                                </li>
                                                <li>
                                                    <p> Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                                                </li>
                                            </ul>
                                            <ul class="technologies">
                                                <l><b>Technologies:</b></l>
                                                <li class="techno on">
                                                    Ansible
                                                </li>
                                                <li class="techno on">
                                                    Google Cloud Platform (GCP)
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-2">
                                            <button type="button" class="standard-btn-sm-exp " data-bs-toggle="modal" data-bs-target="#addexperience">
                                                Add Experience
                                            </button>
                                        </div>
                                        <div class="col-xl-12 card-text-tab1 border-left">
                                            <h4>Lead DevOps Engineer</h4>
                                            <p class="short-text">Labelbox</p>
                                            <p class="short-text"><i class="fa fa-map-marker-alt"></i> karachi, Pakistan</p><br/>
                                            <p class="short-text"><?php echo date("Y");?> - PRESENT</p>
                                            <ul class="timeline">
                                                <li>
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                                                </li>
                                                <li>
                                                    <p> Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                                                </li>
                                                <li>
                                                    <p> Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                                                </li>
                                            </ul>
                                            <ul class="technologies">
                                                <l><b>Technologies:</b></l>
                                                <li class="techno on">
                                                    Ansible
                                                </li>
                                                <li class="techno on">
                                                    Google Cloud Platform (GCP)
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-12 card-text-tab1 border-left">
                                            <h4>Lead DevOps Engineer</h4>
                                            <p class="short-text">Labelbox</p>
                                            <p class="short-text"><i class="fa fa-map-marker-alt"></i> Karachi, Pakistan</p><br/>
                                            <p class="short-text"><?php echo date("Y");?> - PRESENT</p>
                                            <ul class="timeline">
                                                <li>
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                                                </li>
                                                <li>
                                                    <p> Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                                                </li>
                                                <li>
                                                    <p> Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                                                </li>
                                            </ul>
                                            <ul class="technologies">
                                                <l><b>Technologies:</b></l>
                                                <li class="techno on">
                                                    Ansible
                                                </li>
                                                <li class="techno on">
                                                    Google Cloud Platform (GCP)
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="set">
                                <div class="row">
                                <div class="col-xl-4">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 122.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Project Name</h3>
                                            <p class="card-text">This is a short project description..</p>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-xl-4">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 122.png')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Project Name</h3>
                                                <p class="card-text">This is a short project description..</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 123.png')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Project Name</h3>
                                                <p class="card-text">This is a short project description..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-xl-4">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 122.png')}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Project Name</h3>
                                            <p class="card-text">This is a short project description..</p>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-xl-4">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 123.png')}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Project Name</h3>
                                                <p class="card-text">This is a short project description..</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
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
                                        <div class="col-xl-12 card-text-tab1 border-left">
                                            <h4>Microsoft Certified: DevOps Engineer Expert</h4>
                                            <p class="short-text">Microsoft</p><br/>
                                            <p class="short-text"><?php echo date("Y");?></p><br/>
                                            <p class="short-text"><i class="fa fa-map-marker-alt" aria-hidden="true"></i> Online</p><br/>
                                        </div>

                                        <div class="col-xl-12 card-text-tab1 border-left">
                                            <h4>MS Software Engineering</h4>
                                            <p class="short-text">Hamdard University</p><br/>
                                            <p class="short-text"><?php echo date("Y");?></p><br/>
                                            <p class="short-text"><i class="fa fa-map-marker-alt" aria-hidden="true"></i> Karachi, Pakistan</p><br/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="tes">
                                        <blockquote class="quote blockquote">
                                            Very cooperative and provided us with the revision for our satisfaction. A highly professional attitude and excellent communicator, I will highly recommend her! Very cooperative and provided us with the revision for our satisfaction. A highly professional attitude and excellent communicator, I will highly recommend her!
                                            <p class="cite"><b>Simon King</b> <br>
                                                Director Marketing, Global Solutions Ltd</p>
                                        </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--      profile modal--}}
    <div class="modal fade " id="editprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header editprofileheader">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="row">
                            <div class="col-xl-12">
                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form--control" name="title" placeholder="Freelance DevOps Engineer">
                            </div>
                            </div>
                            <div class="col-xl-12">
                            <div class="form-group">
                                <label for="title">Location *</label>
                                <input type="text" class="form--control" name="Location" placeholder="Karachi, Pakistan">
                            </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="title">About  *</label>
                                    <textarea type="text" class="form--control" name="about" >Amna is an experienced technical leader with over ten years of experience overseeing and managing fully remote teams. Amna is an experienced technical leader with over ten yearsof experience overseeing and managing fully remote teams.
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="title">Rate Per Hour  *</label>
                                    <input type="text" class="form--control" name="rate" placeholder="$40">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12 form-group editpro">
                                <label>@lang('Core Skills & Expertise')</label>
                                <div class="input-group mb-3">
                                    <select class="skills form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Start typing to search for skills" style="width: 100%; overflow:hidden"  aria-hidden="true" name="skills[]" id="skills" >
                                        @foreach($skills as $item)
                                            <option value="{{__($item->id)}}">{{__($item->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label for="Language">Language *</label>
                                    <input type="text" class="form--control" name="language" placeholder="Spoken Language(s)">
                                </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                    <label for="Language">Proficiency Level *</label>
                                    <input type="text" class="form--control" name="profeciencylevel" placeholder="My Level is">
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn-save">Save</button>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="addexperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header editprofileheader">
                    <h5 class="modal-title" id="exampleModalLabel">Experience</h5>
                    <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="title">Title *</label>
                                    <input type="text" class="form--control" name="title" placeholder="Freelance DevOps Engineer">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="title">Company *</label>
                                    <input type="text" class="form--control" name="company" placeholder="E.g. Microsoft">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="title">Location  *</label>
                                    <input type="text" class="form--control" name="Location" placeholder="Dublin, Ireland">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="startdate">Start Date *</label>
                                <input type="date" class="form--control" name="startdate" placeholder="Month, Year">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="Language">End Date  *</label>
                                <input type="date" class="form--control" name="enddate" placeholder="Month, Year">
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="Description ">Description </label>
                                    <textarea type="text" class="form--control" name="Description" >Describe your responsibilities</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn-save">Save</button>
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
$(document).ready(function() {


$('.select2').select2({
tags: true
});
    $('#skills').select2({
        dropdownParent: $('#editprofile')
    });
});


</script>

@endpush