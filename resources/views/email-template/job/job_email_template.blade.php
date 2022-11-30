@extends('layout_email.main')
@section('content')


<div class="user_email_container">
    <div class="userimg"><img src="/assets/images/emailtemplate/user-c.svg"> C.  has sent you the following offer, </div>
    <p class="user_dcri">Looking for a UX Designer to build a brochure site that will be built on wordpress...</p>
    
</div>
<p class="offer_heading">Offer details</p>
<div class="user_infoc">
    <p class="uheading">Client<p>
    <p class="udesri">Martin Collins</p>    
</div>

<div class="user_infoc">
    <p class="uheading">Freelancer <p>
    <p class="udesri">Amna Kareem</p>    
</div>

<div class="user_infoc">
    <p class="uheading">Job posting <p>
    <p class="udesri">Ux Designer</p>    
</div>

<div class="user_infoc">
    <p class="uheading">Contract Title<p>
    <p class="udesri">UX Designer</p>    
</div>

<div class="user_infoc">
    <p class="uheading">Hourly Rate<p>
    <p class="udesri">$20.00/hr</p>    
</div>
<div class="user_infoc">
    <p class="uheading">Weekly Limit<p>
    <p class="udesri">40 hours / week</p>    
</div>

<a href="#" class="btnsc">View Offer</a>
<p class="thsoffer">This offer will expire on <strong> Thursday, Sep 8 2022!</strong></p>
<p style="box-sizing: border-box; font-family: 'Mulish', sans-serif;  font-size: 14px; line-height: 21px;
color: #000000; margin-bottom: 2px; width: 88%; padding-left:30px;">Thanks for your time,</p>
<p style="box-sizing: border-box; font-family: 'Mulish', sans-serif;  font-size: 14px; line-height: 21px;
color: #007F7F; margin-bottom: 27px; width: 88%; margin-top: 8px; padding-left:30px;">The DF Team</p>
@endsection

<style>
@import url('https://fonts.googleapis.com/css2?family=Mulish&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Mulish:wght@800&display=swap');

*{ padding:0px; margin:0px;box-sizing: border-box;}
img{ max-width: 100%;}

/*******************/
.user_email_container {
    background: #EFF8F8;
    padding: 24px 21px 24px 21px;
    margin-top: 20px;
}
.userimg {
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
    color: #007F7F;
    font-family: 'Mulish', sans-serif;
    width: 100%;
    display: inline-block;
    }
.userimg img {
    float: left;
    margin-right: 20px;
    margin-top: -8px;
}
p.user_dcri {
    font-family: 'Mulish', sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    color: #000000;
    margin-top: 14px;
    width: 80%;
}
p.offer_heading {
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
    color: #007F7F;
    border-bottom: 1px solid #CBDFDF;
    padding: 18px 28px;
    margin-top: 30px;
    font-family: 'Mulish', sans-serif;
}
.user_infoc {
    border-bottom: 1px solid #CBDFDF;
    padding: 16px 28px;
}
p.uheading {
    font-style: normal;
    font-weight: 700;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-bottom: 8px;
    width: 100%;
    font-family: 'Mulish', sans-serif;
    display: inline-block;
}
p.udesri {
    font-family: 'Mulish', sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
}
.btnsc{
    font-family: 'Mulish', sans-serif; 
    border-radius: 5px;
        background: #7F007F;  
        border-radius: 5px; 
         color: #fff; 
        font-weight: 600;  
        font-size: 14px;
         width: 150.58px;
        height: 40px; 
        display: inline-block; 
        text-align: center;
         text-decoration: none; 
         padding-top: 12px; 
         display: inline-block; 
         margin-right: 7px;
         margin: 36px auto 36px;
         display: block;
}
p.thsoffer {
    width: 100%;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    border-top: 1px solid #CBDFDF;
    padding-top: 25px;
    font-family: 'Mulish', sans-serif; 
    margin-bottom: 27px;
    padding-left:30px;
}
/*******************************=====================********/



@media only screen and (max-width:599px){
.logo-container{
padding-left: 2% !important;
}
.body_container{
width: 100% !important;
}
ul.nav_listing li {
margin: 0px 0px 0px 0px !important;
}
ul.nav_listing li a {
font-size: 14px !important;
margin: 0px 8px !important;
}
.logo-m-container{
padding-left: 2%;
}
}
@media only screen and (max-width:480px){
ul.nav_listing li a {
font-size: 11px !important;
margin: 0px 4px !important;
}
.nav_listing{
margin-top: 3px !important;
display: flex;
 justify-content: center;
 align-items: center;
}
h1.heading-s {
font-size: 20px !important;
line-height: 26px !important;
}
span.logo-con_mbl img {
width: 57% !important;
margin: 0px auto;
display: block;
}
.footer_cs1 {
text-align: center;
display: inline-block !important;
}
.footer_cs1 p {
width: 100% !important;
}
.tp-bg {
padding: 0px 10px 60px 10px !important;
}

}
@media only screen and (max-width:375px){
.d-cs {
display: inline-block !important;
text-align: center;
}
.nav_listing {
margin-top: -3px !important;
width: 100% !important;
/* display: inline-block !important; */
text-align: center !important;
}
.btns-cont a {
margin: 0px 0px 8px 0px !important;
}
}
</style>

  

