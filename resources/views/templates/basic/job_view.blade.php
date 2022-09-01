@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="all-sections pt-3">
   <div class="container-fluid p-max-sm-0">
   <div class="sections-wrapper d-flex flex-wrap justify-content-center">
   <article class="main-section">
   <div class="section-inner">
   <div class="item-section item-details-section">
      <div class="container">
         <div class="item-details-content" style="padding-top: 0px;">
            <h2 class="title">job view</h2>
         </div>
         <div class="row justify-content-center mb-30-none">
            <div class="col-xl-9 col-lg-9 mb-30">
               <div class="item-details-thumb-area mt-0">
                <div class="item-details-footer">
                  <div class="left mb20">
                     <h3 class="title">Build multiply Jira cloud service demo</h3>
                     <div class="item-details-tag ">
                        <ul class="tags-wrapper">
                           <!--<li class="caption">@lang('Tags')</li>-->
                           <li><a
                              href="javascript:void(0)">elasticsearch</a>
                           </li>
                           <li><a
                              href="javascript:void(0)">searchengine</a>
                           </li>
                           <li><a
                              href="javascript:void(0)">MySQL Programming</a>
                           </li>
                           <li><a
                              href="javascript:void(0)">Laravel</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="right mb-20">
                     <div class="social-area">
                        <ul class="footer-social">
                           <li>
                              Job Status:
                           </li>
                           <li>
                              <a href="http://twitter.com/share?url={{ Request::url()}}"
                                 target="__blank">Open</a>
                           </li>
                        </ul>
                     </div>
                     <div class="date">
                        posted on: @php echo  date('d-m-y') @endphp    
                     </div>
                  </div>
                  </div>
                  <div class="sep-solid"></div>
                  <div class="content">
                     <p>
                        You will immediately start creating interactive Web3 prototypes, mockups, storyboards, journey maps, user flows, usability metrics informed by competitive analysis, user personas, and real-world users. This position will work closely with our development team to enhance our Web3 products.
                     </p>
                     <ul class="list-group">
                        <li> Design vision, process and team to deliver the best possible experience to our customers.</li>
                        <li> Resolve UX issues picking the best path forward.</li>
                        <li> Build storyboards to conceptualize designs to accurately convey project plans to clients and team members.</li>
                        <li> Design the aesthetics to be implemented within a website or products, from the layout menus and drop-down options to colors and fonts allowing for interface edits as needed</li>
                     </ul>
                     <br/>
                     <h4>
                     Requirements</h4>
                     <ul class="list-group">
                        <li> Demonstrated experience in creating and implementing Web3 UX design.</li>
                        <li>  Proficient with visual design programs such as Adobe Photoshop, Illustrator and Figma.</li>
                        <li> Continued education and research into UX trends and current design strategy and technologies.</li>
                        <li> Communication(Written and interpersonal skills.</li>
                        <span>
                        NOTE: Please attach samples of work done on Web3 projects
                        </span>
                     </ul>
                  </div>
                  <div class="deliverables">
                     <h3>Deliverables</h3>
                     <p>Source code, Code review report, prototypes, </p>
                  </div>
                  <br/>
                  <div class="DoD">
                     <h3>Definition of Done (DOD)</h3>
                     <p>Dev tasks completed UX reviewed QA tasks completed PO reviewed Defects resolved </p>
                  </div>
                    <br/>   
                  <div class="attributes">
                     <h3>Job Attributes</h3>
                  </div>
                    <div class="sep-solid"></div>
                    <h4>Development Type </h4>
                 <div class="row">
                  <div class="col-sm-6">
                    <div class="card attributes-card" >
                      <div class="card-body">
                        <h4 >Backend</h4>
                         <div class="developmenttype ">
                            <ul class="development-table-title">
                                <li>
                                  Aws
                                </li>
                                <li>
                                Azure
                                </li>
                                <li>
                                Attribute 2
                                </li>
                                <li>
                               Attribute 5
                                </li>
                                <li>
                                Attribute 3
                                </li>
                                <li>
                               Attribute 6
                                </li>
                            </ul>
                      </div>
                    </div>
                  </div>
              </div>
              
                  <div class="col-sm-6">
                    <div class="card  attributes-card">
                      <div class="card-body">
                        <h4>Front End</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 mb-30">
               hh
            </div>
         </div>
      </div>
   </div>
   </articxle>
</section>
@include($activeTemplate . 'partials.end_ad')
@endsection