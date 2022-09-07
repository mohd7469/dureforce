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
                                 
                                    <div class="col-md-9 sorting-mbl">
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
                                                <div class="row btns-per">
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
<style>

@media only screen and (max-width:767px){
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
    padding: 6px 6px 7px 11px !important;
    color: #007F7F;
    font-size: 16px;
    margin-right: -13px;
}
select#bestmatch {
    float: right;
    background: #EFF8F8;
    border: 1px solid #CBDFDF;
    border-radius: 5px;
    padding: 4px 0px 7px 2px !important;
    color: #007F7F;
    font-size: 16px;
    position: relative;
    right: -27px;
}
.plocation {
    font-weight: 600;
    font-size: 12px !important;
    line-height: 18px;
    color: #000000;
    position: relative;
    padding-left: 2px !important;
    margin-top: 48px !important;
}
p.plocation:before {
    width: 20px;
    height: 20px;
    background: red;
    position: absolute;
    left: -19px !important;
    top: 8px !important; 
    content: '';
    background: url(/assets/images/job/location-icon.png) no-repeat;
}
}
</style>
@push('script')
<script>
   'use strict';
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>


@endpush
