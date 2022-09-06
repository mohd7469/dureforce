@extends($activeTemplate.'layouts.frontend')
@section('content')


<section class="all-sections pt-3">
   <div class="container-fluid p-max-sm-0">
      <div class="sections-wrapper d-flex flex-wrap justify-content-center cv-container">
         <article class="main-section">
            <div class="section-inner">
               <div class="item-section item-details-section">
                  <div class="container single-jobc">
                        <div class="allpropsel_container">
                        <h2 class="prosals-h">All Proposals</h2> 
                        <div class="container">
                            <div class="row">
                                <div class="col-12"></div>
                                    <div class="col-md-3">
                                        <div id="custom-search-input">
                                            <div class="input-group">
                                                <input type="text" class="search-query form-control" placeholder="Search" />
                                                <span class="input-group-btn">
                                                    <button type="button" disabled>
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="col-md-9">
                                        <div class="row">
                                            <!--Sorting Section Start-->
                                            <div class="col-md-10">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                    <p class="sort-p"> Sort </p>
                                                        <form>
                                                            <select name="Best match" id="bestmatch">
                                                                <option>Best match</option>
                                                                <option>1</option>
                                                                <option>1</option>
                                                                <option>1</option>
                                                                <option>1</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                         <!--Sorting Section End-->

                                        <div class="col-md-2">
                                        <form>
                                            <select name="Filters" id="Filters">
                                                <option>Filters</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                            </select>
                                        </form>
                                        </div>

                                       </div>
                                    </div>
                                </div>

                                 <!--Bio Profile Section Start-->
                                        <div class="row biorow">
                                           <div class="col-md-4">
                                              <div class="row borderleftc"> 
                                                <div class="col-md-3">
                                                    <img alt="User Pic" src="/assets/images/job/profile-img.png" id="profile-image1" class="img-circle img-responsive"> 
                                                </div>
                                                <div class="col-md-5">
                                                    <h4 class="pname-c"> Dumitru G</h4>
                                                    <p class="pdesination-c">Full Stack Developer</p>
                                                 </div>
                                                    <div class="col-md-4">
                                                        <p class="plocation">London, UK</p>
                                                    </div>
                                              </div>
                                           </div>

                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Rate Per Hour</p>
                                                        <p class="perhourprice">$55 / Per Hour</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Total Earnings</p>
                                                        <p class="perhourprice">$120k + earned</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Job Success Rate</p>
                                                        <p class="perhourprice">90%</p>
                                                    </div>
                                            </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="row btns-s">
                                                    <div class="col-md-4"><a href="#" class="btn-products-s">Shortlist</a></div>
                                                    <div class="col-md-4"><a href="#" class="btn-products-s">Message</a></div>
                                                    <div class="col-md-4"><a href="#" class="btn-products-s phire">Hire</a></div>
                                                </div>
                                            </div>
                            </div>
                        <!--===  Bio Profile Section End ===-->

                        <!--Product Description Start-->
                        <div class="row p_desription">
                            <div class="col-md-12">
                           <p> <strong>Cover Letter -  </strong> Hi have a vision. I solve problems. Over the last 10 years I've delivered and supported Mediawiki based solutions for companies, non-commercial bodies,and enthusiasts. I also guarantee prompt and clear communication.
I can provide you a top-notch logo design that you can without any problem show your main mission,and that will look perfect and clean.</p>

                            </div>
                        </div>

                         <!--Product Description End-->

                         <!--Skills Section Start-->
                            <div class="row skills-c">
                                    <h2>Has 7 relevant skills to your job</h2>
                                    <ul class="skills-listing">
                                        <li>HTML</li>
                                        <li>CSS</li>
                                        <li>Javascript</li>
                                        <li>Bootstrap</li>
                                        <li>jQuery</li>
                                        <li>React</li>
                                    </ul>

                                    <!--Skills Section End-->
                            </div> 
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </article>
      </div>
   </div>
</section>

</div>
@include($activeTemplate . 'partials.end_ad')
@endsection
@push('style')
<link href="{{ asset('assets/templates/basic/frontend/css/custom/all-proposal.css') }}" rel="stylesheet">
@endpush
@push('script')
<script>
   'use strict';
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>


@endpush
