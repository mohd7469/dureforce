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
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-12"></div>
                                    <div class="col-md-2">
                                        <h2 class="prosals-h">All Proposals</h2> 
                                        
                                    </div>
                                 
                                    <div class="col-md-10 sorting-mbl">
                                        <div class="row">
                                            <!--Sorting Section Start-->
                                                  <div class="col-md-4">
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
                                                    <div class="col-md-4">
                                                    
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
                                               
                                            
                                         <!--Sorting Section End-->

                                        <div class="col-md-4">
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
                            
                            @foreach ($proposals as $proposal)
                                    <div class="" > 
                                        <div class="row biorow">
                                           <div class="col-md-3">
                                              <div class="row borderleftc"> 
                                                <div class="col-md-4">
                                                    <img alt="User Pic" src="/assets/images/job/profile-img.png" id="profile-image1" class="img-circle img-responsive"> 
                                                </div>
                                                <div class="col-md-8">
                                                    @isset($proposal->user->username)
                                                    <h4 class="pname-c"> 
                                                               {{$proposal->user->username}}
                                                     </h4>
                                                     @endisset
                                                     @isset($proposal->user->designation)
                                                      <p class="pdesination-c"> {{$proposal->user->designation}} </p>
                                                     @endisset

                                                     <div class="col-md-4">
                                                        @isset($proposal->user->address->address)
                                                        <p class="plocation"> {{@$proposal->user->address->address }}</p>
                                                        @endisset

                                                       
                                                    </div>
                                                 </div>
                                                   
                                              </div>
                                           </div>

                                            <div class="col-md-5">
                                                <div class="row btns-per">
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Rate Per Hour</p>
                                                        @isset($proposal->module->hourly_start_range)
                                                        <p class="perhourprice">${{ $proposal->module->hourly_start_range}}  / Per Hour</p>
                                                        @endisset
                                                        
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

                                            <div class="col-md-4">
                                                <div class="row btns-s">
                                                    <a href="#" class="btn-products-s">Shortlist</a>
                                                    <a href="#" class="btn-products-s">Message</a>
                                                    <a href="{{route('user.proposal.buyer.show',$proposal->uuid)}}" class="btn-products-s">View Proposal</a>
                                                    <a href="#" class="btn-products-s phire">Hire</a>
                                                </div>
                                            </div>
                                     </div>
                                            <!--===  Bio Profile Section End ===-->

                                        <!--Product Description Start-->
                                            <div class="row p_desription">
                                                <div class="col-md-12">
                                                    @isset($proposal->cover_letter)
                                                    <p> <strong>Cover Letter -  </strong> {{$proposal->cover_letter}}</p>
                                                    @endisset
                                            

                                                </div>
                                            </div>

                                            <!--Product Description End-->

                         <!--Skills Section Start-->

                            <div class="row skills-c">
                                <div class="col-md-7">
                                    {{-- <h2> Has 7 relevant skills to your job</h2> --}}
                                     @isset($proposal->user->skills)
                                    <h2>Has {{$proposal->user->skills->count()}} relevant skills to your job</h2>
                                   
                                    <ul class="skills-listing">
                                     
                                        @foreach ($proposal->user->skills as  $skills)
                                         <li>{{$skills->skill->name}} </li>
                                        @endforeach
                                        
                                        {{-- <li>HTML</li>
                                        <li>CSS</li>
                                        <li>Javascript</li>
                                        <li>Bootstrap</li>
                                        <li>jQuery</li>
                                        <li>React</li> --}}
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    <div class="attachment">
                                        <div class="service_subtitle2 mt-20 heading-text">
                                      <h2> Attachments</h2>
                                          </div>
                            
                                                <a href="https://stgdureforcestg.blob.core.windows.net/attachments/6315a685426951662363269.jpeg" class="btn btn-large pull-right atta"><i class="fa fa-paperclip font-style" aria-hidden="true"></i>Golf Bag.jpeg </a>
                                                <a href="https://stgdureforcestg.blob.core.windows.net/attachments/6315a6867b4181662363270.jpeg" class="btn btn-large pull-right atta"><i class="fa fa-paperclip font-style" aria-hidden="true"></i>631239f40174d1662138868.jpeg </a>
                            
                                        </div>
                                  </div>

                                </div>

                                    <!--Skills Section End-->
                            </div> 
                       
                                    @endisset

                          <hr>
                                   
                          @endforeach
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </article>
        
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
