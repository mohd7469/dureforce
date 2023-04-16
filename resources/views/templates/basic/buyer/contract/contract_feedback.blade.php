@extends($activeTemplate.'layouts.master')
@section('content')

        <div class="container-fluid">
            <form>
            <p class="propsal-h" style="margin-left: 50px">End Contract </p>
            <div class="main_con_p">
                <div class="prosal-left-con" style="margin-left: 50px">
                    <!---Cover Letter Section Start--->

                    <div class="btm-c">
                        <p class="prop_description">
                            <b>Freelancer</b></p>
                        <p>Name Here</p>
                        <p class="prop_description">
                            <b>Contract Title</b></p>
                        <p>{{$contract->offer->module->title}}</p>
                    </div>

                    <div class="btm-c jdc">
                        <h3 >Private Feedback</h3>
                        <p>This feedback will be kept anonymous and never shared directlt with freelancer</p>
                        <div>
                        <p>Reason for Ending Contract</p>
                                <select name="reason" class="col-md-5" style="height: 40px"> <option value=""> Select a Reason</option>
                                    @foreach($reasons as $reason)
                                    <option value="{{$reason->id}}"> {{$reason->name}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <p>How likely are you recommend this freelancer to a friend or colleague.</p>
                                        <div class="row" style="margin-left: 10px">
                                        @for ($i = 1; $i <=10; $i++)
                                            <div class="col-md-1 row" >
                                                    <input class="form-check-input" type="radio" id="rating_num" name="rating_num" value = "{{$i}}" onclick="checkedOnClick(this);">
                                                </div>
                                        @endfor
                                        </div>
                                    <div class="row" style="margin-left: 10px; margin-top: 10px ">
                                        @for ($i = 1; $i <=10; $i++)
                                            <div class="col-md-1 row">
                                                    {{$i}}
                                                </div>
                                        @endfor
                                    </div>
                            <div style="margin-top: 10px">
                                <p>Tell us more. What did the Freelancer do well. What could have been Better<span>(Optional)</span></p>
                                <textarea rows="6"></textarea>
                            </div>
                            <div>
                                <p>Rate their English Proficiency. (Speaking and Comprehension) </p>
                                <div>
                                    @foreach($langLevels as $level)
                                    <div class="form-check">

                                    <input class="form-check-input" type="radio" value="{{$level->id}}}" id="engProf" name="engProf" onclick="engProfCheck(this);">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$level->name}}
                                    </label>
                                    </div>
                                    @endforeach
                                  </div>

                            </div>

                        </div>


                    <div class="btm-c jdc">
                        <h3 >Public Feedback</h3>
                        <div>
                            <p>This feedback will be share on Freelancer profile after they have feedback left for you</p>
                            <div style="margin-top: 10px">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <label for="">Skills</label>
                                    <div class="rating">
                                        <label>
                                            <input type="radio" name="Skills_rating" value="1" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="Skills_rating" value="2" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" nname="Skills_rating" value="3" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="Skills_rating" value="4" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="Skills_rating" value="5" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <label for="">Quality of work </label>
                                    <div class="rating">
                                        <label>
                                            <input type="radio" name="quality_rating" value="1" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="quality_rating" value="2" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="quality_rating" value="3" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="quality_rating" value="4" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="quality_rating" value="5" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <label for="">Availabilty </label>
                                    <div class="rating">
                                        <label>
                                            <input type="radio" name="availabilty_rating" value="1" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="availabilty_rating" value="2" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="availabilty_rating" value="3" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="availabilty_rating" value="4" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>

                                        </label>

                                        <label>
                                            <input type="radio" name="availabilty_rating" value="5" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <label for="">Adherence of Schedule </label>
                                    <div class="rating">
                                        <label>
                                            <input type="radio" name="schedule_rating" value="1" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="schedule_rating" value="2" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="schedule_rating" value="3" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="schedule_rating" value="4" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="schedule_rating" value="5" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <label for="">Communication </label>
                                    <div class="rating">
                                        <label>
                                            <input type="radio" name="communication_rating" value="1" />

                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="communication_rating" value="2" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="communication_rating" value="3" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="communication_rating" value="4" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="communication_rating" value="5" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <label for="">Cooperation </label>
                                    <div class="rating">
                                        <label>
                                            <input type="radio" name="cooperation_rating" value="1" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="cooperation_rating" value="2" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="cooperation_rating" value="3" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="cooperation_rating" value="4" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="cooperation_rating" value="5" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <h4>Total Score: 1.00</h4>
                            </div>
                            <div>
                                <p>Share this experience with this Freelancer on Upwork Community</p>
                                <textarea rows="3"></textarea>
                            </div>
                            <p><a href="#" > See an Example of appropriate Feedback</a></p>
                        </div>

                    </div>

                    <div class="btm-c jdc">

                        <button class="btn btn-secondary">End Contract</button>
                        <button class="btn ">Cancel</button>

                    </div>

                </div>

                <div class="prosal-right-con" style="margin-right: 50px">

                    <div class="p_amount_con">
                        <ul class="listing_ps">
                            <li><span class="p_fcs" style="font-weight: 500;"><h3>Pay Freelancer</h3></span></li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="" id="Don'tSpeak" name="payFree" onclick="checkPayFreelancer(this);">
                                <label class="form-check-label" for="defaultCheck1">
                                    Pay $6.00
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="" id="Don'tSpeak" name="payFree" onclick="checkPayFreelancer(this);">
                                <label class="form-check-label" for="defaultCheck1">
                                    Pay another amount
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="" id="Don'tSpeak" name="payFree" onclick="checkPayFreelancer(this);">
                                <label class="form-check-label" for="defaultCheck1">
                                    Pay nothing and request refund
                                </label>
                            </div>
                        </ul>
                    </div>
                </div>
        </div>
            </form>
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
        max-width: 868px;
        width: 70%;
        display: inline-block;
        float: left;
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
        margin-top: 23px;
        padding: 18px 17px;
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

        function checkedOnClick(el){
            // Select all checkboxes by class
            var checkboxesList = document.getElementsByName("rating_num");
            for (var i = 0; i < checkboxesList.length; i++) {
                checkboxesList.item(i).checked = false; // Uncheck all checkboxes
            }

            el.checked = true; // Checked clicked checkbox
        }

        function engProfCheck(el){
            // Select all checkboxes by class
            var checkboxesList = document.getElementsByName("engProf");
            for (var i = 0; i < checkboxesList.length; i++) {
                checkboxesList.item(i).checked = false; // Uncheck all checkboxes
            }

            el.checked = true; // Checked clicked checkbox
        }

        function checkPayFreelancer(el){
            // Select all checkboxes by class
            var checkboxesList = document.getElementsByName("payFree");
            for (var i = 0; i < checkboxesList.length; i++) {
                checkboxesList.item(i).checked = false; // Uncheck all checkboxes
            }

            el.checked = true; // Checked clicked checkbox
        }


    </script>

    <style>
        .rating {
            display: inline-block;
            position: relative;
            height: 80px;
            line-height: 70px;
            font-size: 50px;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
            margin-left: 3px;
        }

        .rating label:last-child .icon {
            color: #000;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
            color: yellow;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
            color: #000;
            text-shadow: 0 0 5px yellow;
        }
    </style>

@endpush
