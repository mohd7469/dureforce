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
                            @include('templates.basic.jobs.breadcrum',['job_uuid'=>$job->uuid])

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
                                                    
                                                    <h4 class="pname-c">

                                                        {{$proposal->user->full_name}}

                                                     </h4>

                                                      <p class="pdesination-c"> {{$proposal->user->job_title}} </p>

                                                     <div class="col-md-4">
                                                        <p class="plocation">{{$proposal->user->location }}</p>
                                                    </div>

                                                 </div>


                                              </div>
                                           </div>

                                            <div class="col-md-5">
                                                <div class="row btns-per">
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Rate Per Hour</p>

                                                            <p class="perhourprice">${{$proposal->user->rate_per_hour}} / Per Hour</p>

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
                                                    <a href="{{route('buyer.proposal.show',$proposal->uuid)}}" class="btn-products-s">View Proposal</a>
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
                                <div class="col-md-6 col-lg-6">

                                    <h2>Has {{count($proposal->user->skills)}} relevant skills to your job</h2>

                                    @foreach($proposal->user->skills as $skill)
                                        
                                        <ul class="skills-listing">

                                            <li>{{$skill->name}} </li>

                                        </ul>

                                    @endforeach
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="attachment">
                                        <div class="service_subtitle2 mt-20 heading-text">
                                            @isset($proposal->attachment)
                                                @foreach($proposal->attachment as $document)
                                                <h2> Attachments</h2>
                                            
                                                <ul class="skills-listing">
            
                                                    <a href="{{$document->url}}" class="btn btn-large pull-right atta"><i class="fa fa-paperclip font-style" aria-hidden="true"></i>{{$document->name}} </a>

            
                                                </ul>
                                                    @endforeach
                                            @endisset

                                                {{-- <a href="https://stgdureforcestg.blob.core.windows.net/attachments/6315a685426951662363269.jpeg" class="btn btn-large pull-right atta"><i class="fa fa-paperclip font-style" aria-hidden="true"></i>Golf Bag.jpeg </a>
                                                <a href="https://stgdureforcestg.blob.core.windows.net/attachments/6315a6867b4181662363270.jpeg" class="btn btn-large pull-right atta"><i class="fa fa-paperclip font-style" aria-hidden="true"></i>631239f40174d1662138868.jpeg </a> --}}

                                        </div>
                                  </div>

                                </div>

                                    <!--Skills Section End-->
                            </div>

                          <hr>

                             @endforeach
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
@push('style')
<link href="{{ asset('assets/templates/basic/frontend/css/custom/all-proposal.css') }}" rel="stylesheet">
@endpush
<style>
    .attachment{
        display: inline-block;
    width: 100%;
    margin-top: -50px;
    }
    .heading-text{
        text-align: left;
    }
.row.btns-s {
    position: relative;
    left: 23px;
    /* width: 300px; */
}
a.btn-products-s {
    border: 1px solid #7F007F;
    border-radius: 4px;
    padding: 8px 2% !important;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #7F007F;
    width: auto !important;
    margin: 0px 2.5% !important;
}
 @media only screen and (min-width:768px){
.sorting-mbl .col-md-4:first-child {
  
    width: 30%;
 
}
div#custom-search-input {
    
    position: relative;
    top: -16px;
}
.col-md-10.sorting-mbl {
    text-align: right;
    display: inline-block;
    /* width: 100%; */
}

.sorting-mbl .col-md-4 {
    width: 17%;
    /* float: right; */
    text-align: right;
    display: inline-block;
    clear: right;
}
} 
@media only screen and (max-width:767px){
    .attachment{
        margin-top:-20px;
    }
    ul.skills-listing{
        width: 100%;
    }
    .sorting-mbl .col-md-4{
        float: left !important;
    }
    .p_desription p{
        width: 100%;
        text-align: center;
    }
    a.btn-products-s {
        width: auto !important;
        text-align: CENTER;
        margin: 8px auto;
        display: block;
        padding: 7px 20%;
        display: inline-block;
    
    }
    ul.skills-listing li {
    margin-right: 1% !important;
    margin-bottom: 14px !important;
    font-size: 12px !important;
    padding: 2px 2% !important;
}

select#Filters {
    float: none;
    background: #EFF8F8;
    border: 1px solid #CBDFDF;
    border-radius: 5px;
    padding: 8px 17px 8px 34px;
    width: 100%;
    margin-right: -13px;
}
p.rateperh{
    text-align: center;
}
p.perhourprice {
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    text-align: CENTER;
    margin-bottom: 20px;
}
.row.borderleftc {
    text-align: center;
    margin-top: 30px;
}
.borderleftc:after{
    display: none;
}
.plocation {
    font-weight: 600;
    font-size: 14px;
    position: relative;
    padding-left: 0px;
    margin-top: 2px;
    margin-bottom: 40px !important;
    margin-top: 16px;
    display: inline-block;
}
p.plocation:before{
    left: -24px;
}
.row.btns-s {
    position: relative;
    left: 0px;
    text-align: center;
}
.row.btns-s .col-md-4{
    display: inline-block;
    flex: auto;
    width: 3.33%;
}
.row.btns-per .col-md-4{
    display:inline-block;
    float: left;
    width: 33%;
}

ul.skills-listing {
    margin-top: 15px;
    text-align: center;
    display: inline-block;
}
ul.skills-listing li{
    float: none;
    display: inline-block;
}
.skills-c h2{
    text-align: center;
}
.col-md-9.sorting-mbl .col-md-2 {
    width: 40%;
    float: left;
    display: inline-block;
}
.col-md-9.sorting-mbl .col-md-10 {
    width: 60%;
    float: left;
    display: inline-block;
}
select#bestmatch {
    
    float: right !important;
    width: 84% !important;
    margin-bottom: 15px;
    right: 0px;

}
p.sort-p {
    width: auto !important;
}
.col-md-9.sorting-mbl {
    margin-top: 20px;
}
}
@media only screen and (max-width:767px) and (min-width:481px){
    .row.btns-s{
        left: 7px !important;
    }
    a.btn-products-s{
        padding: 7px 13px !important;
    }

}
@media only screen and (max-width:414px){
    select#bestmatch{
        right: -15px !important;
    }
    select#bestmatch {
    padding: 8px 5px 8px 5px !important;
    color: #007F7F;
    font-size: 13px !important;
    width: 77% !important;

}
select#Filters {
    padding: 8px 17px 8px 13px !important;
    font-size: 13px !important;
}
ul.skills-listing li {
    margin-right: 1% !important;
    margin-bottom: 14px !important;
    font-size: 12px !important;
    padding: 1px 3% !important;
    }
    .row.btns-s{
        width: 100% !important;
    }  
    .container.single-jobc {
    padding-left: 0px;
    padding-right: 0px;
}

}
@media only screen and (max-width:480px){
    .row.btns-s{
        left: 7px !important;
    }
    a.btn-products-s{
        padding: 7px 12px !important;
    }
    a.btn-products-s {
    border: 1px solid #7F007F;
    border-radius: 4px;
    padding: 6px 8px;
    font-weight: 600;
    font-size: 13px;
    width: 45% !important;
    margin: 6px 2.5% !important;
}
}
@media only screen and (min-width:767px) and (max-width:992px){
    a.btn-products-s {
    border: 1px solid #7F007F;
    border-radius: 4px;
    padding: 6px 5px !important;
    font-weight: 600;
    font-size: 10px !important;
}
p.rateperh {
    font-size: 12px !important;
    line-height: 18px;
    color: #007F7F;
    font-weight: 600;
    margin-top: 6px;
}
h4.pname-c {
    font-weight: 600;
    font-size: 12px !important;
    line-height: 23px;
    color: #7F007F;
    margin-top: 16px;
}
p.pdesination-c {
    font-weight: 600;
    font-size: 12px !important;
    line-height: 18px;
    color: #000000;
}
p.perhourprice {
    font-weight: 600;
    font-size: 12px !important;
    line-height: 12px !important;
    color: #000000;
}
select#Filters {
    float: right;
    background: #EFF8F8;
    border: 1px solid #CBDFDF;
    border-radius: 5px;
    padding: 8px 17px 8px 11px;
    color: #007F7F;
    font-size: 16px;
    width: 123px !important;
}
select#bestmatch {
    float: right;
    background: #EFF8F8;
    border: 1px solid #CBDFDF;
    border-radius: 5px;
    padding: 10px 15px 8px 10px;
    color: #007F7F;
    font-size: 14px;
    position: relative;
    width: 120px;
    top: 0px;
}

.plocation {
    font-weight: 600;
    font-size: 12px !important;
    line-height: 18px;
    color: #000000;
    position: relative;
    padding-left: 20px !important;
    margin-top: 12px !important;
}
p.plocation:before {
    width: 20px;
    height: 20px;
    background: red;
    position: absolute;
    left: 0px !important;
    top: 4px !important; 
    content: '';
    background: url(/assets/images/job/location-icon.png) no-repeat;
}
}
@media only screen and (max-width:320px){
a.btn-products-s {
    padding: 7px 10px !important;
}
}
</style>
<link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/breadcrum.css')}}">

@push('script')
<script>
   'use strict';
   
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>


@endpush
