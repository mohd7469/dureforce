@extends($activeTemplate.'layouts.master')
@section('content')

        <div class="container-fluid">
            <form id="form_feedback" method="POST" >
                @csrf
            <h3 class="propsal-h" style="margin-left: 40px; margin: 20px">End Contract </h3>
            <div class="main_con_p">
                <div class="prosal-left-con" style="margin-left: 30px">
                    <!---Cover Letter Section Start--->
                    <input type="hidden" name="contract_id" value="{{$contract->id}}">
                    <input type="hidden" name="contract_send_by" value="{{$contract->offer->offer_send_to_id}}">
                    <input type="hidden" name="contract_send_to" value="{{$contract->offer->offer_send_by_id}}">
                    <div class="btm-c">
                        <p class="prop_description">
                            <b>Freelancer</b></p>
                        <p>{{$userName}}</p>
                        <p class="prop_description">
                            <b>Contract Title</b></p>
                        <p>{{$contract->offer->module->title}}</p>
                    </div>
                    <div class="btm-c jdc">
                        <h3 >Public Feedback</h3>
                        <div>
                            <p>This feedback will be share on Freelancer profile after they have feedback left for you</p>
                            <div style="margin-top: 10px">
                                <div class="row">
                                <div class="col-md-6">

                                    <div class="rating">
                                        <label>
                                            <input type="radio" name="rating" id="skillone" onclick="valueChange();" value="1.0" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rating" id="skilltwo" onclick="valueChange();" value="2.0" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                        <label>
                                            <input type="radio" nname="rating" id="skillthree" onclick="valueChange();" value="3.0" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rating" id="skillfour"  onclick="valueChange();" value="4.0" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rating" id="skillfive" onclick="valueChange();" value="5.0" />
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                            <span class="fa fa-solid fa-star icon "></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                <h4>Total Score: </h4></div>
                                <div class="col-md-9">
                                <h4 class="val" id="val">0.00</h4></div>
                            </div>
                            <div>
                                <p>Share this experience with this Freelancer on Dureforce Community</p>
                                <textarea rows="3" id="feeback" name="feedback"></textarea>
                            </div>
                            <p><a href="#" > See an Example of appropriate Feedback</a></p>
                        </div>

                    </div>
                    
                    <div class="btm-c jdc">

                        <button class="btn btn-secondary" id="endCont" >End Contract</button>
                        <button class="btn ">Cancel</button>

                       

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
        let feedback_form=$('#form_feedback');
        $(document).ready(function() {
            feedback_form.submit(function (e) {
                e.preventDefault();
                e.stopPropagation();

                savefeedback();
            });
        });

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



        function valueChange(){
            var total=0;
            var skill=0;
            if($('#skillone').is(':checked') || $('#skilltwo').is(':checked') || $('#skillthree').is(':checked') || $('#skillfour').is(':checked')  || $('#skillfive').is(':checked')) {

                if ($('#skillone').is(':checked')) {
                    skill = $('input[id="skillone"]:checked').val();
                }
                if ($('#skilltwo').is(':checked')) {
                    skill = $('input[id="skilltwo"]:checked').val();
                }
                if ($('#skillthree').is(':checked')) {
                    skill = $('input[id="skillthree"]:checked').val();

                }
                if ($('#skillfour').is(':checked')) {
                    skill = $('input[id="skillfour"]:checked').val();
                }
                if ($('#skillfive').is(':checked')) {
                    skill = $('input[id="skillfive"]:checked').val();
                }
            }
            //Skill Calculation end


            //communication Calculation end
            total=(parseFloat(skill)).toFixed(2);
            document.getElementById('val').innerHTML=total;

        }



        function savefeedback(){

            let form_data = new FormData(feedback_form[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:"POST",
              url:"{{URL::route('feedback.storenew')}}",
              data:  form_data,
              processData: false,
              contentType: false,
              success:function(data){
                if(data.code === 200){
                    notify('success', 'Contract Feedback sent Successfully');
                    window.location.href = "{{URL::route('user.home')}}";
                 }
                else{
                    notify('error', 'An error Occured during Saving');
                }
              }
          });

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
            margin-left: 50px;
        }

        .rating label:last-child .icon {
            color: white;
            text-shadow: 0 0 2px black;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
            color: #007F7F;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
            color: white;
            text-shadow: 0 0 2px black;
        }
    </style>

@endpush
