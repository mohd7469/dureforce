@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="all-sections pt-3">
   <div class="container-fluid p-max-sm-0">
      <div class="sections-wrapper d-flex flex-wrap justify-content-center">
         <article class="main-section">
            <div class="section-inner">
               <div class="item-section item-details-section">
                  <div class="container single-jobc">
                     <div class="item-details-content" style="padding-top: 0px;">
                        <h2 class="title" style="color:#4d9d97">Submit a Proposal</h2>
                     </div>
                     <div  class="jobdetail-c">
                                     Job Details
                                </div>
                     {{-- Job Details --}}
                 <div class="" >
                       
                     <div class="row justify-content-center mb-30-none">
                        <div class="col-xl-9 col-lg-9 mb-30" >
                           <div class="item-details-area">
                              <div class="item-details-box">
                             
                                 <div class="item-details-thumb-area item-details-footer mt-0">
                                
                                    <div class="left mb20">
                                       <p class="jb-title" >{{$proposal->title? $proposal->title : ''}}</p>
                                       <span class="simpletext"> {{$proposal->created_at->format('Y-m-d') ? $proposal->created_at->format('Y-m-d') : '' }}</span> 
                                    </div>
                                    <div class=" col-12 px-0 pt-3">
                                       <p class="simpletext">
                                       
                                       {{str_limit($proposal->description, 500 )}}
                                       </p>
                                       <div>
                                          <button style=""> View job posting</button>
                                       </div>
                                    </div>
                                    <div class="item-details-content">
                                       
                                       <div class="mt-10">
                                        <div class="service_subtitle2">
                                            Skills and Expertise
                                         </div>
                                         <div>
                                         @foreach($proposal->skill as $skil)
                                          <span class="attr">{{$skil->name}}</span>
                                         @endforeach
                                         </div>

                                       </div>
                                      
                                       <div class="sep-solid"></div>
                                       
                                    </div>
                                 </div>
                                 
                                 
                              </div>
                             
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 mb-30">
                           <div class="sidebar">
                              <div class="widget custom-widget text-center mb-30">
                                 <ul class="sidebar-title2">
                                    <li><span>Hourly Range</span>
                                    <span>{{ $proposal->budget_type_id == \App\Models\BudgetType::$hourly ? $proposal->hourly_start_range."$ to " .$proposal->hourly_end_range : $proposal->fixed_amount.'$'}}</span>
                                    
                                    </li>
                                 </ul>
                                 <ul class="sidebar-list">
                                    <li><span>Location</span>
                                       <span>{{$proposal->country->name ? $proposal->country->name : '' }}</span>
                                    </li><li><span>Project Length</span>
                                       <span>{{$proposal->delivery_time}}-Weeks</span>
                                    </li>
                                    <li><span>Job Type</span>
                                       <span>{{$proposal->budgetType->title ? $proposal->budgetType->title : ''}}</span>
                                    </li>
                                    <li><span>Stage</span>
                                       <span>{{$proposal->projectStage->title ? $proposal->projectStage->title  : ''}}</span>
                                    </li>
                                    <li><span>Experience Level</span>
                                       <span>{{$proposal->rank->level ?  $proposal->rank->level : ''}}</span>
                                    </li>
                                    

                                    
                                 </ul>
                                 <div class="widget-btn- mt-20">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#depoModal" class="standard-btn mr-15">Book
                                    Developer</a>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#depoModal" class="standard-btn">Message</a>
                                 </div>

                              </div>
                             
                           </div>
                        </div>
                     </div>



                     {{-- Proposal Terms --}}
                     <div class="pt-4" >
                        <div style="padding: 0.5rem 1rem;
                        margin-bottom: 0;
                        background-color: rgba(0,0,0,.03);" class="pt-3 pb-3">
                                Proposal Terms
                        </div>
                        
                     </div>

                    {{-- Cover letter --}}
                     <div class="pt-4" >
                        <div style="padding: 0.5rem 1rem;
                        margin-bottom: 0;
                        background-color: rgba(0,0,0,.03);" class="pt-3 pb-3">
                                Additional Detail
                        </div>
                        <div class="row justify-content-center mb-30-none ">
                            <div class="col-xl-12 col-lg-12 mb-30" >
                            <div class="item-details-area">
                                <div class="item-details-box">
                                    <div class="item-details-thumb-area item-details-footer mt-0">
                                        <div class="mb20" style="width: 100%">
                                        <h3 class="title" >Cover Letter</h3>
                                        <div>
                                            <textarea> </textarea>
                                        </div>
                                        </div>
                                        <div class=" col-12 px-0 pt-3">
                                       
                                        </div>
                         
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                            </div>
                            
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
@include($activeTemplate . 'partials.end_ad')
@endsection
@push('script')
<script>
   'use strict';
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>
@endpush
<style>
   .container {
   max-width: 1390px !important;
   }
   .btn-view-job {
   color: #007bff;
   background-color: transparent;
   background-image: none;
   border-color: #007bff;
   }
   .row.custom_cards_s {
   margin-bottom: 60px;
   }
   .d-heading{
   font-size: 20px;
   padding: 20px 0px;
   width: 100%;
   display: inline-block;
   }
   .custom_cards_s .card {
   border: none;
   box-shadow: rgb(100 100 111 / 7%) 0px 7px 18px 0px;
   padding: 15px 11px 10px 10px;
   }
   .custom_cards_s h5.card-title {
   font-size: 18px;
   font-weight: bold;
   margin-bottom: 30px;
   }
   .product-desc-content ul {
   margin: 25px 0px 40px 0px;
   list-style-type: "*"!important;
   }
   .product-desc-content ul li{
   margin-bottom: 8px;
   position: relative;
   padding-left: 24px;
   list-style-type: "*"!important;
   }
   .product-desc-content h3{
   font-size: 20px !important;
   font-weight: 400;
   }
   .custom_cards_s .card:first-child {
   margin-left: 0px;
   }
   ul.custom_rating li {
   background: #e3fafa;
   margin-bottom: 25px;
   padding: 10px 17px 10px 24px;
   }
   ul.custom_rating li h4{
   font-size: 16px;
   font-weight: 400;
   margin-bottom: 6px;
   width: 100%;
   display: inline-block;
   color: #000;
   }
   ul.custom_rating li h4 a{
   color: #007F7F
   }
   ul.custom_rating li p{
   font-size: 16px;
   width: 100%;
   display: block;
   line-height: 1.5;
   }
   .date-align{
   text-align: right;
   }
   .comment-banner{
   width: 100%;
   margin-bottom: 20px;
   border-bottom: 1px solid #ccc;
   padding-bottom: 18px;
   }
   .hheading-c{
   font-size: 22px;
   margin-bottom: 50px;
   width: 100%;
   display: inline-block;
   border-bottom: 1px solid #8b8989;
   padding-bottom: 30px;
   }
   p.job_staus a {
   background: #018181;
   display: inline-block;
   padding: 0px 22px;
   border-radius: 4px;
   color: #fff;
   font-size: 16px;
   margin-left: 8px;
   }
   .custom_rating i{
   color: #007F7F;
   }
   .list_desc ul li {
   text-decoration: none!important;
   }
   .cstm-btn {
   text-align: center;
   display: inline-block;
   width: 100%;
   }
   .cstm-btn a.standard-btn {
   padding: 9px 14px;
   float: left;
   display: inline-block;
   }
   .cstm-sidebar{
   display: inline-block;
   }
   h2.title {
   font-weight: 700;
   font-size: 22px;
   line-height: 28px;
   color: #000;
   / margin-bottom: 20px; /
   padding: 10px 10px 18px 10px;
   display: inline-block;
   }
   h3.title {
   font-weight: 600;
   font-size: 22px !important;
   line-height: 28px;
   color: #000000;
   padding-bottom: 15px;
   }
   .item-details-thumb-area{
   background-color: #F8FAFA;
   }
   .item-details-tag ul li a {
   padding: 3px 30px !important;
   font-size: 14px;
   / line-height: 15px; /
   }
   p.job_staus {
   font-weight: 600;
   font-size: 14px;
   line-height: 18px;
   color: #000000;
   }
   p.job_staus a {
   padding: 8px 20px;
   background: #72C1C1;
   border-radius: 4px;
   font-weight: 400;
   }
   p.p-date {
   font-weight: 600;
   font-size: 14px;
   line-height: 16px;
   color: #000000;
   }
   .attachment-icon {
   position: relative;
   padding-left: 20px !important;
   display: inline-block;
   }
   .attachment-icon:before {
   width: 30px;
   height: 30px;
   background: url(/assets/images/job/attachment-icon.png) no-repeat;
   content: '';
   position: absolute;
   left: 0px;
   top: 11px;
   }
   .dod-text p {
   font-weight: 600 !important;
   font-size: 16px !important;
   line-height: 20px !important;
   margin-bottom: 5px;
   }
   .dod-text span {
   font-size: 12px;
   font-style: normal;
   font-weight: 400;
   font-size: 14px;
   line-height: 18px;
   color: #000000;
   text-transform: capitalize !important;
   }
   .jobdetail-c {
    width: 100%;
    font-weight: 600;
    font-size: 20px;
    line-height: 25px;
    background: #F3F6F6;
    padding: 18px 25px;
    margin-top: 30px;
}
   .jb-title{
    font-weight: 600;
    font-size: 18px;
    line-height: 23px;
    color: #000000;
    padding: 20px 0px;
   }
</style>