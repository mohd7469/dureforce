@extends('layout_email.main')
@section('content')


<div style="background: #EFF8F8; padding: 24px 21px 24px 21px; margin-top: 20px;">
    <div style="font-style: normal; font-weight: 700; font-size: 16px; line-height: 65px; color: #007F7F; font-family: 'Mulish', sans-serif; width: 100%; display: inline-block;"><img src="{{ isset($email_data['offer']->module->user->user_basic->profile_picture) ? $email_data['offer']->module->user->user_basic->profile_picture : 'https://stgdureforcestg.blob.core.windows.net/attachments/638f83fb2fea31670349819.png' }}" style="float: left; margin-right: 20px; margin-top: -8px;border-radius:50%; width: 65px;height: 65px">{{$email_data['offer']->module->user->fullname}}. has sent you the following offer,</div>
    <p style="font-family: 'Mulish', sans-serif; font-style: normal; font-weight: 500; font-size: 14px; line-height: 20px; color: #000000;  margin-top: 14px; width: 100%;">{{$email_data['offer']->module->description}}</p>
    
</div>
<p style="font-style: normal; font-weight: 700; font-size: 16px; line-height: 20px; color: #007F7F; border-bottom: 1px solid #CBDFDF; padding: 18px 28px; margin-top: 30px; font-family: 'Mulish', sans-serif;">Offer details</p>
<div style="border-bottom: 1px solid #CBDFDF; padding: 16px 28px;">
    <p style="    font-style: normal;  font-weight: 700; font-size: 14px; line-height: 18px; color: #000000; margin-bottom: 8px;width: 100%; font-family: 'Mulish', sans-serif; display: inline-block;">Client<p>
    <p style="    font-style: normal; font-weight: 700; font-size: 14px; line-height: 18px; color: #000000; margin-bottom: 8px; width: 100%; font-family: 'Mulish', sans-serif; display: inline-block;">{{$email_data['offer']->module->user->fullname}}</p>    
</div>

<div style="border-bottom: 1px solid #CBDFDF; padding: 16px 28px;">
    <p style="    font-style: normal; font-weight: 700; font-size: 14px; line-height: 18px; color: #000000; margin-bottom: 8px;  width: 100%; font-family: 'Mulish', sans-serif; display: inline-block;">Freelancer <p>
    <p style="font-family: 'Mulish', sans-serif; font-style: normal; font-weight: 500; font-size: 14px; line-height: 18px; color: #000000;">{{$email_data['offer_send_to']->fullname}}</p>    
</div>

<div style="border-bottom: 1px solid #CBDFDF; padding: 16px 28px;">
    <p style="    font-style: normal; font-weight: 700; font-size: 14px; line-height: 18px; color: #000000;  margin-bottom: 8px;  width: 100%; font-family: 'Mulish', sans-serif;
    display: inline-block;">Job posting <p>
    <p style="font-family: 'Mulish', sans-serif; font-style: normal; font-weight: 500; font-size: 14px; line-height: 18px; color: #000000;">{{$email_data['offer']->module->title}}</p>    
</div>

<div style="border-bottom: 1px solid #CBDFDF; padding: 16px 28px;">
    <p style="    font-style: normal; font-weight: 700;  font-size: 14px; line-height: 18px; color: #000000; margin-bottom: 8px; width: 100%; font-family: 'Mulish', sans-serif; display: inline-block;">Contract Description<p>
    <p style="font-family: 'Mulish', sans-serif; font-style: normal; font-weight: 500; font-size: 14px; line-height: 18px; color: #000000;">{{$email_data['offer']->description_of_work}}</p>    
</div>

<div style="border-bottom: 1px solid #CBDFDF; padding: 16px 28px;">
    <p style="    font-style: normal; font-weight: 700; font-size: 14px; line-height: 18px; color: #000000; margin-bottom: 8px; width: 100%; font-family: 'Mulish', sans-serif; display: inline-block;">Hourly Rate<p>
    <p style="font-family: 'Mulish', sans-serif; font-style: normal; font-weight: 500; font-size: 14px; line-height: 18px; color: #000000;">${{$email_data['offer']->offer_amount}}</p>    
</div>
<!-- <div style="border-bottom: 1px solid #CBDFDF; padding: 16px 28px;">
    <p style="    font-style: normal; font-weight: 700; font-size: 14px; line-height: 18px; color: #000000; margin-bottom: 8px; width: 100%; font-family: 'Mulish', sans-serif;
    display: inline-block;">Weekly Limit<p>
    <p style="font-family: 'Mulish', sans-serif; font-style: normal; font-weight: 500; font-size: 14px; line-height: 18px; color: #000000;">40 hours / week</p>    
</div> -->

<a href="{{ route('seller.offer.view',$email_data['offer']->uuid) }}" style="font-family: 'Mulish', sans-serif; border-radius: 5px;
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
     display: block;">View Offer</a>
<p style="width: 100%; font-style: normal; font-weight: 500; font-size: 14px; line-height: 18px; color: #000000; border-top: 1px solid #CBDFDF; padding-top: 25px;font-family: 'Mulish', sans-serif;  margin-bottom: 27px; padding-left:30px;">This offer will expire on 
<strong>{{ \Carbon\Carbon::parse($email_data['offer']->expire_at)->format('l')}} {{ \Carbon\Carbon::parse($email_data['offer']->expire_at)->toFormattedDateString()}}!</strong>
</p>
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