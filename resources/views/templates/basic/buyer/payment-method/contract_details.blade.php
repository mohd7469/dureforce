@extends($activeTemplate.'layouts.master')
@section('content')

<div class="container-fluid">
<div class="main_con_p">
    <div class="prosal-left-con">
    <h3 class="mb-1 p-0">Hire Arslan Ayoub</h3>
    <a href="#" class="mb-4">
            Back to offer details
    </a>
    <br>
    <div class="setProfile" id="payment-index">
    <div class="container-fluid welcome-body">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <h1 class="mb-4 p-0">Select a billing Method</h1>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="btn btn-continue btn-secondary btn-add-method m-0" data-bs-toggle="modal" data-bs-target="#paymentModal">Add a New Billing Method</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <span class="">
            This will be your primary billing method across all contacts, account activity and subscription.
        </span>
        <div class="">
            <div class="mt-3" id="">
                <table class="table">
                    <thead>
                        <tr>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="pay-block">
                            <td class="card-num d-flex align-items-center">
                                <figure class="my-0 m-3">
                                    <svg width="47" height="28" viewBox="0 0 47 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="47" height="28" rx="4" fill="white"></rect>
                                        <path d="M18.1634 19.8307L20.0024 9.25969H22.944L21.1036 19.8307H18.1634ZM31.731 9.48757C31.1484 9.2734 30.2351 9.04358 29.0947 9.04358C26.188 9.04358 24.1407 10.4773 24.1232 12.5322C24.1068 14.0512 25.5849 14.8986 26.7007 15.4042C27.8457 15.9225 28.2306 16.2528 28.2251 16.7155C28.2177 17.4241 27.3107 17.7477 26.4652 17.7477C25.2879 17.7477 24.6624 17.5874 23.6963 17.1929L23.3172 17.0249L22.9044 19.3913C23.5915 19.6865 24.8619 19.9421 26.1811 19.9553C29.2733 19.9553 31.2806 18.538 31.3034 16.3436C31.3144 15.141 30.5308 14.226 28.8336 13.4714C27.8055 12.9824 27.1758 12.6561 27.1825 12.1609C27.1825 11.7215 27.7155 11.2516 28.8672 11.2516C29.829 11.237 30.5259 11.4425 31.0688 11.6566L31.3324 11.7786L31.731 9.48757ZM39.3007 9.25952H37.0277C36.3236 9.25952 35.7966 9.44777 35.4874 10.1362L31.1188 19.8237H34.2077C34.2077 19.8237 34.7126 18.5212 34.8268 18.2352C35.1644 18.2352 38.1651 18.2397 38.5941 18.2397C38.6821 18.6098 38.952 19.8237 38.952 19.8237H41.6815L39.3007 9.2592V9.25952ZM35.6943 16.0857C35.9377 15.4766 36.8664 13.1306 36.8664 13.1306C36.8491 13.1587 37.1079 12.5185 37.2563 12.1216L37.4551 13.033C37.4551 13.033 38.0184 15.5564 38.1361 16.0855H35.6943V16.0857ZM15.6663 9.25952L12.7864 16.4685L12.4796 15.0036C11.9434 13.3148 10.2731 11.4851 8.40576 10.5691L11.0391 19.8139L14.1513 19.8105L18.7823 9.25942L15.6663 9.25936" fill="#0E4595"></path>
                                        <path d="M10.0997 9.25916H5.35645L5.31885 9.4791C9.00907 10.3541 11.4508 12.4687 12.4646 15.0098L11.4332 10.1519C11.2552 9.48255 10.7387 9.28275 10.0998 9.25942" fill="#F2AE14"></path>
                                    </svg>
                                </figure>
                            </td>
                            <td><b>Visa ending in 4563</b>
                            </td>

                            <td>
                            <a class="btn btn-outline-secondary btn-primary " href="#">Primary</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <span>'Any available balance you have will be applied towars your total amount</span>
            </div>
        </div>
         
        
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Add new billing method</h5>
             
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="#" method="POST" id="payment_methods" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="uYLDjfCd7cpXMcXML6xKYy3l65J8vIFInZMRg3jM">                <div class="container-fluid welcome-body" id="">
                   
                    <div>
                        <div id="company-container" class="company-c-style">

                            <div id="">

                                <div class="row">
                                <div class="col-md-12">
                                    <label class="mt-4">Card Number </label>
                                    <input type="text" name="card_number" id="card_number" value="" placeholder="Tidal Wave Inc.">
                                </div>
                                </div>    

                                <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-4">First name </label>
                                    <input type="text" name="first_name" id="first_name" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="mt-4">First name </label>
                                    <input type="text" name="last_name" id="last_name" value="">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-3">
                                    <label class="mt-4">Expires on </label>
                                    <input type="text" name="expire_on" id="expire-on" value="" placeholder="MM">
                                </div>
                                <div class="col-md-3">
                                    <label class="mt-4">- </label>
                                    <input type="text" name="card_number" id="company-name" placeholder="YY" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="mt-4">Security code? </label>
                                    <input type="text" name="security_code" id="company-name" value="">
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-4">Country </label>
                                    <select name="country_id" class="form-control select-lang" id="payment_method_country_id">
                                        <option value="">
                                                Select Country
                                        <option value="92">
                                                Pakistan
                                        </option>
                                        </select>
                                </div>

                                <div class="col-md-12">
                                    <label class="mt-4">Address line 1</label>
                                    <input name="address_line_1" placeholder="" value="" required="">
                                </div>
        
                                <div class="col-md-12">
                                    <label class="mt-4">Address line 2 (Optional)</label>
                                    <input name="address_line_2" placeholder="" value="" required="">
                                </div>

                                <div class="col-md-6">
        
                                    <label class="mt-4">City</span></label>
                                    <select name="city_id" class="form-control select-lang" id="payment_method_cities">
                                        <option value="">Select City</option>
                                            <option value="120526">Abbottabad</option>
                                            <option value="120165">Adilpur</option>
                                            <option value="120525">Ahmadpur East</option>
                                            <option value="120484">Chiniot</option>
                                            <option value="120483">Chishtian</option>
                                            <option value="194905">Chitral</option>
                                            <option value="120429">Gojra</option>
                                            <option value="120428">Gujar Khan</option>
                                            <option value="237">Gujranwala</option>
                                            <option value="120427">Gujrat</option>
                                            <option value="120415">Haveli Lakha</option>
                                            <option value="120411">Hujra Shah Muqim</option>
                                    </select>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-4">Postal code (optional)  </label>
                                    <input type="text" name="postal_code" id="postal_code" placeholder="Tidal Wave Inc." value="">
                                </div>
                                </div>
                               
                                </div>
                                <br>
                      
                                

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary c-canel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-continue btn-secondary">Save</button>
                     </div>
                    
                </div>
            </form>
        </div>
   
     </div>
  </div>
</div>    </div>
    
</div>
                </div>
                <div class="prosal-right-con">
                    <!----About client--->
                        <div class="about-client-c">
                            <p class="abt-client">About the Freelancer</p>
                            <ul class="client_listing-c">
                                
                                <li>
                                    <img src="https://stgdureforcestg.blob.core.windows.net/attachments/641ed040c0ed51679740992.png" alt="client">
                                    <div class="about_client">
                                        <p class="client_name">Muhammad arslan</p>
                                        <p class="client_date">Member since Feb 16,2023</p>
                                    </div>
                                </li>

                                <li>
                                    <i class="fa fa-map-marker"></i> <span class="location_c"> Arifwala, Pakistan</span>
                                    &nbsp;<i class="fa fa-clock job_count_label_padding"> </i><span class="time_cs"> 08:36 pm local time</span>
                                </li>

                                <li>
                                    <p class="payment_c">Escrow Deposit</p>
                                </li>
                                <li>
                                    <span>Subtotal</span> <span class="jb_p float-right">$5.600</span>
                                </li>
                                <li>
                                    <span>Marketplace fee</span> <span class="jb_p float-right">$3.600</span>
                                </li>
                                <li>
                                    <span>Estimated Taxes</span> <span class="jb_p float-right">$2.600</span>
                                </li>
                                <li>
                                    <b class="no_jobs">Estimated</b> <span class="jb_p float-right">$5.600</span>
                                </li>
                                <hr>

                            </ul>
                            <center><span class="mb-0"> Lean about <a href=""><b>fees</b></a> and <a href=""><b>estimated taxes</b></a></span></center>
                            <br>
                            <center><a href="#" class="btn navbar-burron">Fund Contract & Hire</a></center>
                            <center><span>Upwork Payment protection</span></center>

                        </div>
                  

                                        
                </div>


            </div>
        </div>
        
@endsection


<style>
    .navbar-burron{
        width: 96%;
        font-size: 12px;
        background-color: #007f7f !important;
        color: #fff !important;
        border-radius: 5px !important;
    }
    .right-navbar-li{
        border: none !important;
    }
    .file-text{
        margin: -5px 0 0 0px;
        font-size: 13px;
    }
    .file_heading_proposal {
        width: 40%;
        background: #F3F6F6;
        border-radius: 4px 4px 0px 0px;
        padding: 17px 25px 17px 20px;
        font-weight: 600;
        font-size: 18px !important;
        line-height: 25px;
        color: #000000;
    }
    .file-size{
        margin-top: -15px;
        font-size: 12px;
        font-weight: initial;
    }
    .view_origin{
        /* View Original Job Post */
    width: 166px;
    height: 18px;
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    /* identical to box height */
    color: #007F7F;
    }
    p.propsal-h {
        font-weight: 400;
        font-size: 20px;
        line-height: 25px;
        color: #000000;
        margin-top: 26px;
        font-family: "Mulish", sans-serif;
    }

    .heading_proposal {
        background: #F3F6F6;
        border-radius: 4px 4px 0px 0px;
        padding: 17px 25px 17px 20px;
        font-weight: 600;
        font-size: 18px !important;
        line-height: 25px;
        color: #000000;
    }

    .prosal-left-con {
        max-width: 1060px;
        display: inline-block;
        float: left;
        padding: 20px 51px;
        margin-left: 125px;
    }

    .main_con_p {
        width: 100%;
        display: inline-block;
    }

    .prosal-right-con {
        width: 28%;
        float: right;
    }

    .btm-c {
        background: #F8FAFA;
        border-radius: 0px 0px 0px 0px;
        padding: 18px 25px;
        margin-top: -8px;
    }

    p.heading_cover_l {
        font-weight: 600;
        font-size: 16px;
        line-height: 24px;
        color: #000000;
        font-family: "Mulish", sans-serif;
    }

    p.prop_description {
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        color: #000000;
        width: 81%;
    }

    p.heading-att {
        font-weight: 600;
        font-size: 16px;
        line-height: 24px;
        color: #000000;
        margin-top: 56px;
    }

    span.attacment_file {
        font-size: 14px;
        line-height: 24px;
        color: #000000;
        width: 100%;
        margin-bottom: 12px;
        position: relative;
        padding-left: 30px;
    }

    span.attacment_file:before {
        position: absolute;
        width: 20px;
        height: 20px;
        content: '';
        left: 0px;
        top: 5px;
        background: url(/assets/images/job/attachment.svg);
        background-repeat: no-repeat;
    }

    .jdc {
        margin-top: 25px;
    }

    p.posted_date_c {
        font-weight: 600;
        font-size: 13px;
        line-height: 16px;
        color: #000000;
        margin-top: 15px;
    }

    a.btn_viewjob {
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        text-align: center;
        color: #007F7F;
        background: #FFFFFF;
        border: 1px solid #007F7F;
        border-radius: 5px;
        padding: 11px 25px;
        margin-top: 30px;
    }

    .p_amount_con {
        background: #EEF7F7;
        border-radius: 4px;
        padding: 17px 20px;
    }

    span.p_fcs {
        font-size: 16px;
        line-height: 20px;
        color: #000000;
        float: left;
        width: 50%;
        display: inline-block;
    }

    span.p_price {
        float: right;
        text-align: right;
        display: inline-block;
        width: 40%;
        font-size: 16px;
        line-height: 20px;
        color: #000000;
    }

    ul.listing_ps li {
        padding: 9px 0px;

        width: 100%;
        display: inline-block;
    }

    ul.listing_ps li:first-child, ul.listing_ps li:nth-child(2) {
        border-bottom: 1px solid #CBDFDF;
        padding: 13px 0px;
    }

    span.badge_color {
        border-radius: 20px;
        padding: 4px 19px;
        font-size: 14px;
        float: right;
    }

    span.btn_sbmitd {
        background: #219A21;
        border-radius: 20px;
        padding: 4px 19px;
        color: #fff;
        font-size: 14px;
        float: right;
    }

    span.p_pricess {
        background: #58A7A7;
        border-radius: 20px;
        padding: 2px 18px;
        font-size: 14px;
        float: right;
        color: #fff;
    }

    span.p_days {
        float: right;
        font-size: 14px;
        line-height: 18px;
        text-align: right;
        color: #000000;
    }

    .about-client-c {
        background: #EEF7F7;
        border-radius: 4px;
        margin-top: 100px;
        padding: 18px 30px;
        margin-right: 115px;
        margin-left: -105px;
    }

    p.abt-client {
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        text-align: left;
        color: #000000;
    }

    .about_client {
        float: left;
        width: 69%;
    }

    .client_listing-c li {
        width: 100%;
        display: inline-block;
        border-top: 1px solid #CBDFDF;
        padding: 12px 0px;
    }

    ul.client_listing-c li:nth-child(1) img {
        width: 55px;
        /* width: 14%; */
        float: left;
        height: 55px;
        border-radius: 50%;
        margin-right: 5%;
    }

    p.client_name {
        font-size: 16px;
        line-height: 20px;
        color: #000000;
        font-weight: 700;
        margin-bottom: 0px;
    }

    p.client_date {
        font-size: 14px;
        line-height: 15px;
        color: #515151;
        margin-top: 8px;
    }

    .client_listing-c li:first-child {
        margin-bottom: 5px;
        margin-top: 0px;
        padding-top: 13px;
    }

    p.rating-c img {
        width: 60px;
        margin-right: 2%;
    }

    p.rating-c {
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        color: #007F7F;
    }

    p.payment_c {
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #000000;
        padding-left: 30px;
        position: relative;
    }

    p.payment_c:before {
        width: 30px;
        height: 30px;
        position: absolute;
        content: '';
        left: 0px;
        background: url(/assets/images/job/tick-c.png);
        background-repeat: no-repeat;
        background-size: 20px;
    }

    span.no_jobs {
        font-weight: 700;
        font-size: 14px;
        line-height: 18px;
        color: #007F7F;
        margin-right: 2%;
        float: left;
        display: inline-block;
    }

    span.jb_p {
        font-weight: 500;
        font-size: 14px;
        line-height: 18px;
        color: #000000;
    }

    .pt_con {
        display: inline-block;
        width: 100%;
    }

    span.fm-c {
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        color: #000000;
        margin-right: 10%;
        float: left;
        display: inline-block;
    }

    span.am_price {
        font-weight: 700;
        font-size: 16px;
        line-height: 20px;
        color: #007F7F;
    }

    .pt_con {
        display: inline-block;
        width: 100%;
        padding: 18px 0px;
    }

    /*************/


    .mainTabs {
        border-top: 1px solid #D0E2E2;
        padding-top: 40px;
        margin-top: 25px;
    }

    .tab {
        overflow: hidden;
        /*   border: 1px solid #dddddd40; */

    }

    /* Style the buttons inside the tab */
    .tab button {
        width: 200px;

        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        color: #fff;
        padding: 21px 22px;
        transition: 0.3s;
        font-size: 17px;
        background: #007F7F;
        /* border-radius: 8px 0px 0px 0px;    */
        font-weight: 700;
        font-size: 14px;
        line-height: 18px;

        /* identical to box height */
        text-align: left;
        padding-left: 58px;

        color: #90BCBC;

    }

    /* Change background color of buttons on hover */
    /*.tab button:hover {
    /*   background-color: #f9f9f920; */
    /* color:#fff;
     background-color: #007F7F;
     /* border-radius: 8px 0px 0px 0px; */


    /*
    }
    */
    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #007F7F;
        color: #ffffff;
        /* border-radius: 0px 8px 0px 0px; */
        font-weight: 700;
    }

    /* Style the tab content */
    .tabcontent {
        color: #273342;
        padding: 6px 12px;
        border: 1px solid #dddddd40;
        margin-top: 10px;
        background: #fff;
        border-radius: 10px;
    }

    ul.method_l {
        display: inline-block;
        width: 100%;
    }

    ul.method_l li {
        width: 28%;
        float: left;
        margin-right: 4%;
        display: inline-block;
    }

    p.lable-c {
        font-weight: 400;
        font-size: 15px;
        line-height: 20px;
        color: #000000;
        margin-bottom: 9px;
    }

    .tabcontent {
        color: #273342;
        padding: 33px 12px 35px 24px;
        border: 1px solid #dddddd40;
        margin-top: 0px;
        background: #EFF5F5;
        border-radius: 0px;
    }

    ul.method_l li input {
        background: #F5F5F5;
        border: 1px solid #CBDFDF;
        border-radius: 4px;
        height: 37px;
        font-size: 14px;
    }

    input.btn_sbmtrm {
        width: 137px;
        height: 35px;
        background: #7F007F;
        border-radius: 5px;
        color: #fff;
        padding: 4px 0px;
        font-size: 14px;
        font-weight: 600;
        margin-right: 1.5%;
    }

    input.btn_withdrw-c {
        width: 155px;
        height: 34.85px;
        left: 214px;
        top: 1518px;
        border: 2px solid #7F007F !important;
        border-radius: 5px;
        font-size: 14px;
        line-height: 18px;
        text-align: center;
        color: #7F007F;
        padding: 0px;
    }

    ul.method_l {
        display: inline-block;
        width: 100%;
        margin-bottom: 26px;
    }

    .btns_container-div {
        margin-top: 26px;
        width: 100%;
        display: inline-block;
        margin-bottom: 60px;
    }

    ul.method_2 li {
        width: 23%;
        float: left;
        margin-right: 2%;
        display: inline-block;
        margin-bottom: 31px;
    }

    button.tablinks {
        position: relative;
    }

    button.tablinks:before {
        width: 30px;
        height: 30px;
        content: '';
        position: absolute;
        left: 28px;
        top: 21px;
        background: url(/assets/images/job/not-selectedc.svg) !important;
        background-repeat: no-repeat !important;
        background-position: center center;
    }

    .tab button.active:before {
        background: url(/assets/images/job/selected-c.svg) !important;
        background-repeat: no-repeat !important;
        background-position: center center;
    }


    /************Respossive**********/
    @media only screen and (max-width: 1100px) {
        span.p_fcs {
            font-size: 13px;
        }

        span.btn_sbmitd {
            padding: 2px 13px;
            font-size: 13px;
        }

        p.payment_c {
            font-size: 13px;
        }

        p.lable-c {
            font-size: 13px;
        }
    }

    @media only screen and (max-width: 767px) {
        .prosal-left-con {
            max-width: 100%;
            width: 100%;
            display: inline-block;
            float: none;
        }

        p.prop_description {
            width: 100%;
        }

        ul.method_2 li {
            width: 100%;
            float: left;
            margin-right: 0%;
            display: inline-block;
            margin-bottom: 17px;
        }

        .tabcontent {
            color: #273342;
            padding: 33px 12px 35px 11px;
        }

        ul.method_l li {
            width: 100%;
            float: left;
            margin-right: 4%;
            display: inline-block;
            margin-bottom: 20px;
        }

        input.btn_sbmtrm {
            width: 130px;
        }

        .prosal-right-con {
            width: 100%;
            float: right;
            margin-top: 32px;
        }

        .tabcontent {
            padding-bottom: 0px !important;
        }

        .heading_proposal {
            background: #F3F6F6;
            border-radius: 4px 4px 0px 0px;
            padding: 13px 25px 12px 20px;
            font-weight: 600;
            font-size: 15px !important;
            line-height: 25px;
            color: #000000;
        }

        p.propsal-h {
            font-size: 16px;
        }
    }

    @media only screen and (max-width: 375px) {
        .tab button {
            width: 100%;
        }
    }

    @media only screen and (max-width: 320px) {
        input.btn_withdrw-c {
            width: 100%;
        }

        input.btn_sbmtrm {
            width: 100%;
            margin-bottom: 11px;
        }
    }
</style>

@push('script')

    <script>
        'use strict';
        $('#defaultSearch').on('change', function () {
            this.form.submit();
        });


        openCity('evt', 'tab1');

        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }


    </script>

@endpush
