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
                            {{-- @include('templates.basic.jobs.breadcrum',['job_uuid' => $job->uuid]) --}}
                        
                            <!----Tabs Nav Start---->
                            <div class="row">
                                <ul class="offerlisting">
                                    <li><a href="#">Search</a></li>
                                    <li><a href="#">Saved Jobs<span> (3)</span></a></li>   
                                </ul>
                            </div>
                            <!----Tabs Nav End---->

                            <!---Search Filter Container Start--->
                                <div class="row inner-cs">
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
                                  
                                    <div class="sorting-mbl1">
                                        
                                            <select name="Filters" id="Filters">
                                                <option>Filters</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                            </select>
                                       
                                            <!--Sorting Section Start-->
                                                        
                                            <select name="Newest" id="bestmatch">
                                                <option>Newest</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                                <option>1</option>
                                            </select>
                         <!--Sorting Section End-->
                                       
                                    </div>
                                </div>
                        

                         <!---Search Filter Container End--->

                        <!----------- ===== Job Experties Container Start ==== ------------->
                        <p class="jb-found">162,093 jobs found</p>
                        @for ($i = 0; $i <=12; $i++) 
                            <div class="details-scs">
                                <div class="row">
                                <p class="jb-heading">UI/UX Designer for growing tech company</p>
                                <a href="#" class="likeit"><img src="/assets/images/job/like.png" alt="like"></a>
                                <ul class="jb-detail-l">
                                    <li>FixedPrice</li>
                                    <li>Expert</li>
                                    <li>Est . Budget : 1000</li>
                                    <li>Posted 17 hours ago</li>
                                </ul>
                                <p class="offer-d"> Hello, We are integotelecom.com we have several products/brands both web and mobile, we are looking for a UI/UX designer 
                                    to help us with the following projects 1. Design and Re-design of new and existing SaaS products/projects 2. 
                                    Design and Re-design of new and existing mobile/web applications 3. Design of presentations/promo/sales material 4.
                                    <a href="#">More.....</a></p>
                            </div>
                            <!--Skills Section Start-->
                                <div class="row skills-c">
                                    <div class="col-md-12">
                                            <ul class="skills-listing">
                                                <li>UX & UI</li>
                                                <li>Mobile App Design </li>
                                                <li>Figma</li>
                                                <li>Adobe XD</li>
                                                <li>UX Research</li>
                                                <li>Mobile UI Design</li>
                                            </ul>
                                    </div>
                                </div>
                                    <!--Skills Section End-->
                                <p class="proposals-s">Proposals: <strong>50+</strong></p>
                                <ul class="methods-s">
                                    <li><img src="/assets/images/job/tick-c.png" alt="Tick"> Payment Method Verified</li>
                                    <li><img src="/assets/images/job/rating-c.png" alt="Tick"> $100k+ <strong>Spent</strong></li>
                                    <li><img src="/assets/images/job/location-c.png" alt="Tick">Cyprus</li>
                                </ul>    
                            </div> 
                        
                            <hr>

                        <!----------- ===== Job Experties Container  ==== ------------->   
                        
                        

                            @endfor
                          
                                    <!--===  Bio Profile Section End ===-->

                 <!--Skills Section Start-->

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
<link href="{{ asset('assets/templates/basic/frontend/css/custom/all-proposal1.css') }}" rel="stylesheet">
@endpush
<style>
.sorting-mbl1 {
    width: 37% !important;
}    
ul.skills-listing {
    margin-top: 20px !important;
}
a.likeit img {
    position: absolute;
    width: 36px;
    right: 30px;
    top: 0px;
}
ul.skills-listing li {
    float: left;
    display: inline-block;
    background: #007F7F;
    border-radius: 20px;
    padding: 3px 17px;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #FFFFFF;
    margin-right: 1%;
}    
.details-scs{
    margin-top: 0px !important;
    padding: 0px 15px;
}    
p.jb-found {
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #007F7F;
    width: 100%;
    display: inline-block;
    margin-bottom: 22px;
    margin-top:40px;
    padding-left: 15px;
}
p.jb-heading {
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #000000;
    margin-bottom: 0px;
    margin-top: 40px
}
ul.jb-detail-l {
    width: 100%;
    margin-top: 22px;
    display: inline-block;
}
ul.jb-detail-l li {
    float: left;
    /* font-weight: 500; */
    font-size: 14px;
    line-height: 18px;
    color: #898989;
    margin-right: 2%;
}
.offer-d{
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-top:24px !important;
    width:76% !important;
    display:inline-block;
}
p.proposals-s {
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #898989;
}
p.proposals-s strong{
    color:#000;
}
ul.methods-s li {
    float: left;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-right: 3%;
}
ul.methods-s li:nth-child(1) img {
    width: 20px;
    margin-right: 10px;
}
ul.methods-s li:nth-child(2) img {
    width: 66px;
    margin-right: 10px;
}
ul.methods-s li:nth-child(3) img {
    width: 15px;
    margin-right: 10px;
}
ul.methods-s {
    width: 100%;
    display: inline-block;
    margin-top: 10px;
    margin-bottom: 40px;
}
/************/
.inner-cs {
    margin-top: 33px !important;
    padding: 0px 15px;
}

.sorting-mbl .row {
    text-align: right;
    display: initial;
}
.sorting-mbl .col-md-4 {
    width: 17%;
    /* float: right; */
    text-align: right;
}
ul.skills-listing {
    margin-top: 15px;
}
.skills-c {
    margin-top: 30px;
}
.p_desription p {
    width: 89%;
    font-size: 14px;
    line-height: 20px;
    color: #000000;
    width: 86%;
    display: inline-block;
    padding: 35px 0px 20px 0px;
}
a.btn-products-s {
    border: 1px solid #7F007F;
    border-radius: 4px;
    padding: 8px 18px;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #7F007F;

}
a.btn-products-s.phire {
    background: #7F007F;
    color: #fff;
}
p.rateperh {
    font-size: 15px;
    line-height: 18px;
    color: #007F7F;
    font-weight: 600;
    margin-top:6px;
}
p.perhourprice {
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
}
h4.pname-c {
    font-weight: 600;
    font-size: 18px;
    line-height: 23px;
    color: #7F007F;
    margin-top: 16px;
}


p.plocation:before {
    width: 20px;
    height: 20px;
    background: red;
    position: absolute;
    left: 0px;
    top: 2px !important;
    content: '';
    background: url(/assets/images/job/location-icon.png) no-repeat;
}

.cv-container {
    border: 1px solid #CBDFDF;
    padding: 20px 10px 60px 10px;
}
.prosals-h {
    font-weight: 600;
    font-size: 18px;
    line-height: 18px;
    color: #000000;
    display: inline-block;
    padding: 10px 10px 40px 17px;
}
div#custom-search-input {
    background: #EFF8F8;
    border: 1px solid #CBDFDF;
    border-radius: 6px;
    width: 60%;
    height: 42px;
}

div#custom-search-input input {
    background: transparent;
    border: none;
    padding: 0px;
    height: 40px;
    padding: 10px 15px;
}


div#custom-search-input .input-group {
    margin-bottom: 0px;
}
div#custom-search-input span.input-group-btn {
    position: relative;
    top: 9px;
    right: 10px;
}
select#Filters {
    float: right;
    border-radius: 5px;
    padding: 8px 13px 8px 38px;
    color: #007F7F;
    font-size: 14px;
    width: 100%;
    appearance: none;
    background: #EFF8F8 url(/assets/images/job/lines.png) no-repeat !important;
    background-position: 15% center !important;
    max-width: 98px;
    border: 1px solid #CBDFDF;
}
select#bestmatch {
    float: right;
    background: #EFF8F8;
    border: 1px solid #CBDFDF;
    border-radius: 5px;
    padding: 8px 15px 8px 15px;
    color: #007F7F;
    font-size: 16px;
    position: relative;
    appearance: none;
    background: #EFF8F8 url(/assets/images/job/arrow.png) no-repeat !important;
    background-position: 93% center !important;
    width: 141px;
    max-width: 100%;
    margin-right: 3%;

}
.fa-search:before {
    content: "\f002";
    color: #007F7F;
    position: relative;
    top: 3px;
}

p.sort-p {
    width: 80%;
    display: inline-block;
    float: left;
    text-align: right;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-top: 11px;
}
.row.btns-s {
    position: relative;
    left: 23px;
}





/* for resolving ui issue on large screen */
@media only screen and (max-width:879px){
select#bestmatch{
    width: 114px;
    font-size: 14px;
}
}
@media only screen and (max-width:800px){
select#bestmatch{
    width: 95px;
    font-size: 14px;
}
select#Filters{
    max-width: 97px;
}
}
@media only screen and (min-width:768px){

 

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

ul.skills-listing li {
margin-right: 1% !important;
margin-bottom: 14px !important;
font-size: 12px !important;
padding: 2px 2% !important;
}

/* select#Filters {
float: none;
background: #EFF8F8;
border: 1px solid #CBDFDF;
border-radius: 5px;
padding: 8px 17px 8px 34px;
width: 100%;
margin-right: -13px;
} */


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


p.sort-p {
width: auto !important;
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

}


@media only screen and (max-width:767px){
    .p_desription p{
        width: 100%;
        text-align: center;
    }
    a.btn-products-s {
   
    width: 200px;
    text-align: CENTER;
    margin: 8px auto;
    display: block;
}
ul.skills-listing li{
    margin-right: 2%;
    margin-bottom: 14px;
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
div#custom-search-input{
    width:56%;
}
.sorting-mbl1 {
    width: 44% !important;
}
.row.btns-s {
    position: relative;
    left: 0px;
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
.sorting-mbl .col-md-4{
    width:33% !important;
    padding: 5px !important;
}
a.likeit img{
    top: -30px;
}
ul.methods-s li{
    font-size: 12px;
}
ul.methods-s li:nth-child(1) img {
    width: 15px;
    margin-right: 5px;
}
ul.methods-s li:nth-child(2) img {
    width: 40px;
    margin-right: 5px;
}
ul.methods-s li:nth-child(3) img {
    width: 10px;
    margin-right: 5px;
}
.offer-d{
    width: 100% !important;
}
}
@media only screen and (max-width:535px){
    .sorting-mbl1 {
    width: 50% !important;
}
div#custom-search-input {
    width: 50%;
}
div#custom-search-input input {
    padding: 10px 0px;
}
}
@media only screen and (max-width:454px){
    div#custom-search-input, .sorting-mbl1 {
        width: 100%;
    }
    select#Filters, select#bestmatch{
        max-width: 100%;
        width: 50% !important;
    }
    .sorting-mbl1 {
    width: 100% !important;
    padding: 0px !important;
}
}
@media only screen and (max-width:414px){
    .sorting-mbl .col-md-4:first-child {
        display: block !important;
        width: 100% !important;
        float: none;
    }
    .sorting-mbl .col-md-4 {
        width: 50% !important;
        padding: 5px !important;
    }
    select#Filters{
        margin-right: 0px !important;
    }
    select#bestmatch{
        width: 100% !important;
        right: 0px !important;
    }
    
}
    /*******/
    .cv-container{
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .container-c{
        padding-left:24px !important;
        padding-right:24px !important;
    }
    ul.offerlisting {
      padding: 0px 0px 15px 36px;
      border-bottom: 1px solid #CBDFDF;
    }
    
    .skills-c{
       padding-bottom: 24px !important;
    }
    ul.offerlisting li {
        float: left;
        display: inline-block;
    }
    ul.offerlisting li a {
        margin-right: 60px;
        font-size: 14px;
        line-height: 18px;
        text-align: center;
        color: #898989;
    }
    a.btn-products-2s {
    border: 1px solid #7F007F;
    border-radius: 4px;
    padding: 11px 7% !important;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #7F007F;
    width: auto !important;
    margin:0px 2%;
}
h4.pname-c{
    margin-top: 6px !important;
}


    /*****/
    .attachment{
        display: inline-block;
    width: 100%;
    margin: top;
    margin-top: -50px;
    }
    .heading-text{
        text-align: left;
    }

ul.skills-listing {
       margin-top: 20px !important;
    }
 @media only screen and (min-width:768px){
.sorting-mbl .col-md-4:first-child {
  
    width: 30%;
 
}
/* div#custom-search-input {
    
    position: relative;
    top: -16px;
} */


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
    ul.skills-listing li {
    margin-right: 1% !important;
    margin-bottom: 14px !important;
    font-size: 12px !important;
    padding: 2px 2% !important;
}

select#Filters {
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


p.sort-p {
    width: auto !important;
}
.col-md-9.sorting-mbl {
    margin-top: 20px !important;
}
select#bestmatch, select#Filters{
    font-size: 12px !important;
}
}
.col-md-9.sorting-mbl {
    margin-top: 20px !important;
}

@media only screen and (max-width:414px){
    /* select#bestmatch{
        right: -15px !important;
    }
    select#bestmatch {
    padding: 8px 5px 8px 5px !important;
    color: #007F7F;
    font-size: 13px !important;
    width: 77% !important;

} */
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


@media only screen and (max-width:320px){
   
    a.btn-products-2s{
        padding: 7px 7px !important;
    }
.container.single-jobc {
    padding-left: 0px;
    padding-right: 0px;
}
}

@media (min-width: 576px){
.container {
    max-width: 100% !important;
}
}
</style>
<link rel="stylesheet" href="{{asset('public/css/breadcrum.css')}}">

@push('script')

<script>
   'use strict';
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>


@endpush
