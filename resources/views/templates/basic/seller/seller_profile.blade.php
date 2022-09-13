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
                    <div class="col-md-4 col-xl-3 col-lg-2">
                        <div class="ms-4 mt-3  mb-0 d-flex flex-column ">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/images/default.png') }}"  class="thumbnail">
                                    <h5 class="my-3">Amna Kareem</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xl-9 col-lg-10">
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
                                                           <span><i class="fa-solid fa-flag"></i>Bekir C.</span>
                                                       </div>
                                                       <div class="col-xl-2">
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
                                                           <span><i class="fas-solid fa-flag"></i>Bekir C.</span>
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
                                                            <span><i class="fa-solid fa-flag"></i>Bekir C.</span>
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
                                                            <span><i class="fas-solid fa-flag"></i>Bekir C.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                           </div>
                                    </div>
                                </div>
                            <div class="tab-pane container fade" id="Exp">
                                <div class="container mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-xl-12 card-text-tab1 border-left">
                                            <h4>Senior DevOps Engineer</h4>
                                            <p class="short-text">Labelbox</p>
                                            <p class="short-text"><i class="fas-solid fa-flag"></i>Karachi, Pakistan</p><br/>
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
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('assets/images/seller/Rectangle 122.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h3 class="card-title">Project Name</h3>
                                        <p class="card-text">This is a short project description..</p>
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
                                            <p class="short-text"><i class="fa fa-map-marker" aria-hidden="true"></i>Online</p><br/>
                                        </div>

                                        <div class="col-xl-12 card-text-tab1 border-left">
                                            <h4>MS Software Engineering</h4>
                                            <p class="short-text">Hamdard University</p><br/>
                                            <p class="short-text"><?php echo date("Y");?></p><br/>
                                            <p class="short-text"><i class="fa fa-map-marker" aria-hidden="true"></i>Karachi, Pakistan</p><br/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="tes">
                                        <blockquote class="quote blockquote">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget leo nunc, nec tempus mi? Curabitur id nisl mi, ut vulputate urna. Quisque porta facilisis tortor, vitae bibendum velit fringilla vitae! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget leo nunc, nec tempus mi? Curabitur id nisl mi, ut vulputate urna. Quisque porta facilisis tortor, vitae bibendum velit fringilla vitae!
                                            <p class="cite">Simon King <br>
                                                Director Marketing, Global Solutions Ltd</p>
                                        </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection


