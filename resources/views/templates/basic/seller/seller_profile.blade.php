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
                                            <a class="nav-link" data-bs-toggle="tab" href="#pro">Experience</a>
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
                                                       <div class="col-xl-12"><br></div>
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
                                                   </div>
                                                </div>
                                                <div class="tab-pane" id="inpro">
                                                    <p class=" card-text">Elementor Custom Form Action (HTTP Post).</p>
                                                    <p class="card-text">Elementor Custom Form Action (HTTP Post).</p>
                                                </div>
                                           </div>
                                    </div>
                                </div>

                            <div class="tab-pane container fade" id="pro">This is a Experience tab.</div>
                            <div class="tab-pane container fade" id="set">This is a Portfolio tab.</div>
                            <div class="tab-pane container fade" id="edu">This is a Education & Certifications tab.</div>
                            <div class="tab-pane container fade" id="tes">This is a Testimonials tab.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection


