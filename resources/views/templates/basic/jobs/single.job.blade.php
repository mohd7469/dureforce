@extends($activeTemplate.'layouts.frontend')
@section('content')
    <div class="categories_type_container">
        @include('templates.basic.partials.category._header', [
            'type_id' => \App\Models\Category::JobType,
        ])</div>

        <section class="all-sections pt-3">
        <div class="container-fluid p-max-sm-0">
            <div class="sections-wrapper d-flex flex-wrap justify-content-center">
                <article class="main-section">
                    <div class="section-inner">
                        <div class="item-section item-details-section">
                            <div class="container">
                                <div class="item-details-content" style="padding-top: 0px;">
                                    <h2 class="title">{{$job->category->name}} > {{ $job->subCategory ? $job->subCategory->name:'' }}</h2>
                                    
                                    <input type="hidden" value="{{$job->category_id}}" id="category_id">
                                    <input type="hidden" {{$job->sub_category_id}} id="sub_category_id">
                                    <input type="hidden" value="{{$data['selected_skills']}}" name="job_skills" id="job_skills" >

                                </div>
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-md-9 col-lg-9 col-xs-9 col-sm-12 col-xs-12 mb-30">
                                        
                                        <div class="item-details-area">
                                            <div class="item-details-box">

                                                <div class="item-details-thumb-area item-details-footer-v mt-0">
                                                 
                                                    <div class="row" >  

                                                        <div class="col-md-7 col-lg-7 col-xs-7 col-sm-12 col-xs-12">   

                                                            <div class="left ">
                                                                <h3 class="title">
                                                                    {{$job->title? $job->title : '' }}
                                                                </h3>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12 float-right" >
                                                            <div class="float-right">
                                                                <p class="job_staus" style="display: inline">Job Status: <span class="status_btn"> {{$job->status->name ? $job->status->name : '' }} </span> Posted on :{{$job->created_at->format('Y-m-d') ? $job->created_at->format('Y-m-d') : '' }}</p>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div >
                                                        
                                                        <div class="sep-solid"></div>
                                                        <div class="product-desc-content" >
                                                            {!!$job->description !!}
                                                        
                                                        <div class="service_subtitle2 mt-20 dod-text">
                                                            <p> Deliverables</p>
                                                                @foreach ($job->deliverable as $deliverable)
                                                                
                                                                <span> {{$deliverable->name}},</span>
                                                                
                                                                @endforeach
                                                        </div>
                                                    

                                                        <div class="service_subtitle2 mt-20 dod-text">
                                                            <p> Definition of Done (DOD)</p>
                                                                @foreach ($job->dod as $dod)
                                                                <span>{{$dod->title ? $dod->title  : ''}},</span>
                                                                @endforeach
                                                        </div>

                                                        <div>
                                                        @if($job->documents->count()>0)
                                                            <div class="service_subtitle2 mt-20" >
                                                                        Attachments
                                                            </div>

                                                            @foreach($job->documents as $decumentUrl)
                                                                <a href="{{$decumentUrl->url}}" class="btn btn-large pull-right atta" download><i class="fa fa-paperclip font-style" aria-hidden="true"></i>{{$decumentUrl->uploaded_name}} </a>
                                                            @endforeach

                                                            @endif
                                                        </div>


                                                        </div>
                                                        
                                                        <div class="sep-solid mt-10 " ></div>
                                                        
                                                    </div>
                                                    
                                                    <div class="service_subtitle2 mt-20"  id="skills_heading">
                                                        Job Attributes
                                                    </div>

                                                    
                                                    <div id="form_attributes">
                                                       
                                                    </div>
                                                    

                                                    
                                                </div>

                                              </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 mb-30">
                                        <div class="sidebar">
                                            <div class="widget custom-widget mb-30 cstm-sidebar">
                                                @if($job->budget_type_id == \App\Models\BudgetType::$hourly)
                                                    <ul class="sidebar-title2">
                                                        <li><span>Per Hour Rate:</span>
                                                            <span>{{ '$'.$job->hourly_start_range." - $".$job->hourly_end_range }}</span>
                                                        </li>
                                                    </ul>
                                                @else
                                                    <ul class="sidebar-title2">
                                                        <li><span>Fixed Amount:</span>
                                                            <span>{{ '$'.$job->fixed_amount}}</span>
                                                        </li>
                                                    </ul>
                                                @endif




                                                <ul class="sidebar-title2">
                                                    <li><span>Resource Location</span>
                                                        <p>{{$job->country ? $job->country->name : '' }}</p>
                                                    </li>
                                                </ul>

                                                <ul class="sidebar-title2">
                                                    <li><span>Budget Type</span>
                                                        <p>{{$job->budgetType->title ? $job->budgetType->title : ''}}</p>
                                                    </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                    <li><span>Est. Project Duration</span>
                                                        <p>{{$job->project_length->name}}</p>
                                                    </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                    <li><span>Project Start Date:</span>
                                                        <p>{{$job->expected_start_date ? $job->expected_start_date  : ''}}</p>
                                                    </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                    <li><span>Project Stage</span>
                                                        <p>{{$job->projectStage->title ? $job->projectStage->title  : ''}}</p>
                                                    </li>
                                                </ul>
                                                <ul class="sidebar-title2">
                                                    <li><span>Experience Level</span>
                                                        <p>{{$job->rank->level ?  $job->rank->level : ''}}</p>
                                                    </li>
                                                </ul>

                                                <div class="widget-btn- mt-20 cstm-btn">
                                                    <a href="javascript:void(0)"   class="standard-btn mr-15">View Proposals</a>
                                                    <a href="{{route('buyer.job.edit',$job->uuid)}}"  class="standard-btn-1">@lang('Edit Job')</a>



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
<script src="{{asset('/assets/resources/templates/basic/frontend/js/job.view.js')}}"></script>
@endpush
<style>
.container {
    max-width: 1390px !important;
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


a.standard-btn {
  padding: 9px 7px!important;
  border: 0px solid #e1e7ec;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  font-size: 15px;
  font-weight: 400;
  background-color: #007f7f !important;
  color: #fff;
}


.cstm-sidebar{
    display: inline-block;
}
h2.title {
    font-weight: 700;
    font-size: 22px;
    line-height: 28px;
    color: #000;
    /* margin-bottom: 20px; */
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
    /* line-height: 15px; */
}
p.job_staus {
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-top: 10px;
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
.cstm-sidebar .sidebar-title2 li span {
font-weight: 600;
font-size: 16px;
line-height: 20px;
}
.cstm-sidebar .sidebar-title2 li p{
    font-weight: 400;
font-size: 14px;
line-height: 18px;
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
.font-style{
    font-size: 13px !important;
color: #58a7a8 !important;
}
.status_btn{
    display: inline-block;
    height: 32px;
    background: #72C1C1;
    border-radius: 4px;
    margin-right: 10px;
    padding-top: 6px;
    width: 68px;
    padding-left: 8px;
}
</style>