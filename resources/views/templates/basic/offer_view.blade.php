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
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-md-9 col-lg-9 col-xs-9 col-sm-12 col-xs-12 mb-30">
                                        
                                        <div class="item-details-area">
                                            <div class="item-details-box">

                                                <div class="item-details-thumb-area item-details-footer-v mt-0">
                                                 
                                                    <div class="row" >  

                                                        <div class="col-md-7 col-lg-7 col-xs-7 col-sm-12 col-xs-12">   

                                                            <div class="left ">
                                                                <h3 class="title">
                                                                    {{$pageTitle? $pageTitle : '' }}
                                                                </h3>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12 float-right" >
                                                            <div class="float-right">
                                                                <div class="widget-btn- mt-20 cstm-btn" style="display: inline">
                                                                    <a href="#" style="font-size: 12px;"  class="standard-btn mr-15">Accept Offer</a>
                                                              
                                                                    <a href="#" style="font-size: 15px;" class="standard-btn-1">Decline Offer</a>
                                                                   
                                                                    <a href="#"  class="standard-btn-1">Chat</a>
                                                                  
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div >
                                                        
                                                        <div class="sep-solid"></div>
                                                            <div class="product-desc-content" >
                                                                
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p> Offer Date </p>
                                                                        <span>{{$offer->created_at ? $offer->created_at : '' }}</span>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p> Offer Status</p>
                                                                    @if($offer->is_active == 1)
                                                                        <span>Actice</span>
                                                                    @else
                                                                    <span>Pending</span>
                                                                    @endif

                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p> Offer Expires</p>
                                                                        <span> {{$offer->expire_at ? $offer->expire_at : '' }}</span>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p> Total Amount</p>
                                                                        <span>{{$offer->offer_amount ? $offer->offer_amount : '' }}</span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                <div class="service_subtitle2 mt-20 dod-text">
                                                                    <p> Budget Type</p>
                                                                        <span>Fixed</span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                                <div class="sep-solid"></div>
                                                                <div class="service_subtitle2 m-10 dod-text">
                                                                    <p> Offer Description</p>
                                                                </div>
                                                                {{$offer->description_of_work ? $offer->description_of_work : '' }}
                                                            <div>
                                                        </div>
                                                        
                                                    </div>
                                                        
                                                    </div>
                                                </div>

                                              </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 mb-30">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-3 mb-30">
                                                <div class="custom-widget widget mb-30" style="width: 330px; height: 455px">
                                                   <h5 class="hheading-c">About the client</h5>
                                               
                                                <div class="col-12">
                                        <div class="card-block">
                                        <ul class="row">
                                        <div class="col-md-3 col-sm-3 profile-img">
                                        <img class="btn-md " src="{{ !empty($offer->module->user->basicProfile->profile_picture)? $offer->module->user->basicProfile->profile_picture: getImage('assets/images/default.png') }}" alt="" style="border-radius:50%; width: 55px;height: 55px">
                                        
                                        </div>
                                        <div class="col-md-9 col-sm-19 text-center">
                                            <div class="profile_title">
                                                <strong class="card-title ">{{$offer->module->user ? $offer->module->user->first_name.' '.$offer->module->user->last_name.'.'  : ''}}</strong><br>
                                                    <small>Member since {{$offer->module->user ? $offer->module->user->created_at->format('Y-m-d') : '' }} </small>
                                            </div>
                                            </div>
                                            <div class="sep-solid"></div>
                                            <div >
                                            <ul class="location">
                                                <li>
                                                    <i class="fa fa-map-marker" ></i><span class="job_count_label_padding">{{$offer->module->user? $offer->module->user->country->name: ''}} </span>
                                                </li>
                                                
                                            </ul>
                                            </div>
                                            <div class="sep-solid"></div>
                                            <div class="paymentsection">
                                            <ul>
                                               
                                                <li>
                                                    <div>
                                                        <svg style="height:33%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                            <rect width="25" height="25" fill="none"/><path d="M54.5,201.5c-9.2-9.2-3.1-28.5-7.8-39.8S24,140.5,24,128s17.8-22,22.7-33.7-1.4-30.6,7.8-39.8S83,51.4,94.3,46.7,115.5,24,128,24s22,17.8,33.7,22.7,30.6-1.4,39.8,7.8,3.1,28.5,7.8,39.8S232,115.5,232,128s-17.8,22-22.7,33.7,1.4,30.6-7.8,39.8-28.5,3.1-39.8,7.8S140.5,232,128,232s-22-17.8-33.7-22.7S63.7,210.7,54.5,201.5Z" fill="none" stroke="#007F7F" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/><polyline points="172 104 113.3 160 84 132" fill="none" stroke="#007F7F" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
                                                        </svg>
                                                        <span class="text-dark">Payment method verified</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                    <i>4.98 of 32 reviews</i>
                                                </li>
                                            </ul>
                                            </div>
                                            <div class="sep-solid"></div>
                                            
                                            <!-- <ul class="sidebar-title-custom">
                                                <li>
                                                        <span class="job-count-color">{{isset($client_total_jobs) ? $client_total_jobs : null}}</span>
                                                         <span class="job_count_label_padding"> Jobs posted</span>
                                                </li>
                                                <li>
                                                    <span class="job-count-color">{{isset($client_open_jobs) ? $client_open_jobs : null}}</span>
                                                    <span class="job_count_label_padding"> Open jobs</span>
                                                </li>
                                            </ul> -->

                                            <div class="sep-solid"></div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label" style="padding-top:3px">Job Link</label>
                                            <input type="text" class="form-control" id="jobLink" disabled placeholder="{{ Request::url()}}" value="{{ Request::url()}}">
                                            </div>
                                            <button type="button" id="CopyButton" class="copy-link-btn" onclick="copyJobLink()" >Copy Link</button>
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
<script src="{{asset('public/js/job.view.js')}}"></script>
<script>
    function copyJobLink() {
        // Get the text field
        var copyText = document.getElementById("jobLink");
        var copyButton = document.getElementById("CopyButton");


        // Select the text field
        copyButton.style.backgroundColor = '#6c757d';
        copyButton.style.color = 'white';
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

    }
</script>
@endpush
<link rel="stylesheet" href="{{asset('public/css/job_view.css')}}">

