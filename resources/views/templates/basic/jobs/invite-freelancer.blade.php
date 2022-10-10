@extends($activeTemplate.'layouts.frontend')
@section('content')
@include('templates.basic.jobs.modal.invite_job')

<section class="all-sections pt-3">
   <div class="container-fluid p-max-sm-0">
      <div class="sections-wrapper d-flex flex-wrap justify-content-center cv-container">
         <article class="main-section">
            <div class="section-inner">
               <div class="item-section item-details-section">
                  <div class="container single-jobc">
                        <div class="allpropsel_container">
                            @include('templates.basic.jobs.breadcrum',['job_uuid' => $job->uuid])
                        <div class="container">
                            <div class="row">
                                <div class="col-12"></div>
                                    <div class="col-md-3">
                                        <h2 class="prosals-h">Invited Freelancers</h2> 
                                        
                                    </div>
                                 
                                    <div class="col-md-9 sorting-mbl">
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
                            
                            
                                   @foreach ($freelancers as $freelancer )
                                       
                                   
                                    
                                    <div class=""> 
                                        <div class="row biorow">
                                           <div class="col-md-3">
                                              <div class="row borderleftc"> 
                                                <div class="col-md-4">
                                                    <img alt="User Pic" src="/assets/images/job/profile-img.png" id="profile-image1" class="img-circle img-responsive"> 
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="pname-c"> 
                                                      {{$freelancer->first_name}} {{ $freelancer->last_name }}
                                                     </h4>
 
                                                     <p class="pdesination-c">{{isset($freelancer->user_basic) ?$freelancer->user_basic->designation:null}}</p>  
                                                    
                                                       
                                                       <p class="plocation"> {{$freelancer->country->name}}</p>
                                                 </div>
                                                  
                                              </div>
                                           </div>

                                            <div class="col-md-5">
                                                <div class="row btns-per">
                                                    <div class="col-md-4">
                                                        <p class="rateperh">Rate Per Hour</p>
                                                        <p class="rateperh">${{$freelancer->rate_per_hour}}</p>
                                                        
                                                        
                                                        
                                                        
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
                                                    {{-- <div class="col-md-4"><a href="#" class="btn-products-s">Shortlist</a></div> --}}
                                                    <a href="{{route('seller.profile')}}" class="btn-products-s">View Profile</a>
                                                    <a href="#" class="btn-products-s">Hire</a>
                                                    <a class="btn-products-s phire inviteJobModal" data-bs-toggle="modal" data-bs-target="#inviteJobModal" data-id="{{ $freelancer->id }}" data-first_name="{{ $freelancer->first_name }}" data-last_name="{{ $freelancer->last_name }}" data-designation="{{ $freelancer->user_basic->designation  ?? ''}}" data-location="{{ $freelancer->country->name}}"  data-job="{{$job->title}}" data-id="{{$job->id}}">Invite to job</a>
                                                  
                                                </div>
                                            </div>
                                     </div>
                                            <!--===  Bio Profile Section End ===-->

                         <!--Skills Section Start-->

                            <div class="row skills-c">
                                <div class="col-md-7">
                                     
                                    <h2>Has relevant skills to your job</h2>
                                    <ul class="skills-listing">
                                        @foreach ($freelancer->skills as $skill )
                                        <li>{{$skill->name}}</li>
                                        @endforeach
                                        
                                        
                                    </ul>
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
         </article>
        
   </div>
</section>

</div>
@include($activeTemplate . 'partials.end_ad')
@endsection
@push('style')
<link href="{{ asset('assets/templates/basic/frontend/css/custom/all-proposal.css') }}" rel="stylesheet">
@endpush
<style>
    .attachment{
        display: inline-block;
    width: 100%;
    
    margin: top;
    margin-top: -50px;
    }
    .heading-text{
        text-align: left;
    }
    a.btn-products-s {
    border: 1px solid #7F007F;
    border-radius: 4px;
    padding: 8px 18px;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #7F007F;
    width: auto !important;
    margin:0px 1%;

}
.row.btns-s{
    width: 330px;
    left: 68px !important;
}

 @media only screen and (min-width:768px){
.sorting-mbl .col-md-4:first-child {
  
    width: 30%;
 
}
div#custom-search-input {
    
    position: relative;
    top: -16px;
}
.col-md-9.sorting-mbl {
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
    .row.btns-s{
    width: 100%;
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
select#bestmatch, select#Filters{
    font-size: 12px !important;
}
}
@media only screen and (max-width:767px) and (min-width:481px){
    .row.btns-s{
        left: 7px !important;
    }
    a.btn-products-s{
        padding: 7px 30px !important;
    }

}
@media only screen and (max-width:480px){
    .row.btns-s{
        left: 7px !important;
    }
    a.btn-products-s{
        padding: 7px 12px !important;
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
    top: 8px !important; 
    content: '';
    background: url(/assets/images/job/location-icon.png) no-repeat;
}

@media only screen and (max-width:320px){
   
    a.btn-products-s{
        padding: 7px 7px !important;
    }
.container.single-jobc {
    padding-left: 0px;
    padding-right: 0px;
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

    $(function () {
      

        $(".inviteJobModal").click(function () {


            var freelancer_id = $(this).data('id');
            var first_name = $(this).data('first_name');
            var last_name = $(this).data('last_name');
            var designation = $(this).data('designation');
            var location = $(this).data('location');
            var job = $(this).data('job');
            var id = $(this).data('id');
            

            $(".modal-body #freelancer_id").val(freelancer_id);
            $(".modal-body #first_name").html(first_name);
            $(".modal-body #last_name").html(last_name);
            $(".modal-body #designation").html(designation);
            $(".modal-body #location").html(location);
            $(".modal-body #job_title").val(job);
            $(".modal-body #id").val(id);
            $(".modal-body #space").append(' ');

            
           
           
        })
    });
</script>
@endpush