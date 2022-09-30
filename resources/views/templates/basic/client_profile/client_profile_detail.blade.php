@extends($activeTemplate.'layouts.frontend')
@section('content')


<div class="container">

    <div class="client_profile_con">    
        <!----== Sidebar Container Start ==----->
        <div class="sidebar-custom">
            <ul class="sidebar-nav">
                <li><a href="#">Basic Details</a></li>
                <li><a href="#">Company Details</a></li>
                <li><a href="#">Billing & Payments</a></li>
                <li><a href="#">Password & Security</a></li>
                <li><a href="#">edit</a></li>
                
            </ul>
        </div>

        <!----== Sidebar Container End ==----->

        <!----== Client Info Section Start ==----->
        <div class="client-info-section">
               <p class="cp-basic">Basic Details</p>

                <!----== Client Info Section Start ==----->

               <div class="cp-profile_c_main">
                   <img scr="/assets/images/profile.png" alt="Profile" class="cp-prfileimg">
                   <span>Icon</span>
                   <div class="cp-profile-h">Martin Collins</div>
               </div>
               

               <!----============End================--->


                <!----== Client Job Title Section Start ==----->

               <div class="cp-row-con">
                   <p class="cp--jbh">Job Title</p>
                   <p class="cp-jt">Marketing Manager</p>
               </div>

                <!----============End================--->


               <!----== Client About Job Descriprion Section Start ==----->

               <div class="cp-row-con">
                   <p class="cp--jbh">About</p>
                   <p class="cp-jt">Senior Brand Manager with broad experience in all aspects of design, marketing, public relations and advertising. Specialized in building powerful brand narratives to attract customers and establish brand loyalty. Adept at working effectively with marketing and advertising departments to optimize brand identity.</p>
               </div>

               <!----============End================--->

              <!----== Client Job Information Section Start ==----->

              <div class="cp-info-container">
                 <div class="cp-info-box">
                    <p class="cp--jbh">Location</p>
                    <p class="cp-jt">Boston, Massachusetts</p>
                 </div>

                 <div class="cp-info-box">
                    <p class="cp--jbh">Phone</p>
                    <p class="cp-jt">+1 617-353-2000</p>
                 </div>


                 <div class="cp-info-box">
                    <p class="cp--jbh">Email</p>
                    <p class="cp-jt">martincollins12@gmail.com</p>
                 </div>

              </div>

               <!----============End================--->


        </div>    
        <!----== Client Info Section End ==----->


    </div>
</div>





@include($activeTemplate . 'partials.end_ad')
@endsection
@push('style')
<style>
    .container{
        max-width:1390px;
        margin:0px auto;
        display: block;
    }
    .client_profile_con{
        width: 100%;
        display: inline-block;
    }
    .sidebar-custom{
        max-width: 230px; 
        width:20%;
        float: left;
        display: inline-block;
        height: 1059px;
        background: #E6EEEE;
        border-radius: 3px 0px 0px 3px;
        padding: 28px 21px;
    }
    .client-info-section{
        width: 80%;
        float: left;
        display: inline-block;
        background: #F8FAFA;
        border-radius: 0px 3px 3px 0px;
    }
    .sidebar-nav{
        width: 100%;
        display:inline-block;
        padding: 0px;
        margin: 0px;
    }
    .sidebar-nav li{
        width: 100%;
        display: inline-block;
    }
    .sidebar-nav li a {
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #007F7F;
        width: 100%;
        display: inline-block;
        padding: 23px 10px 23px 50px;
        text-decoration: none;
        border-bottom: 1px solid #CBDFDF;
        background-size: 31px;
        display: inline-block;
        background-position: center left !important;
}
ul.sidebar-nav li:nth-child(1) a {
    background: url(/assets/images/job/user-icon.png) no-repeat;  
}
ul.sidebar-nav li:nth-child(2) a {
    background: url(/assets/images/job/company-icon.png) no-repeat;  
}
ul.sidebar-nav li:nth-child(3) a {
    background: url(/assets/images/job/dollars-icon.png) no-repeat;  
}
ul.sidebar-nav li:nth-child(4) a {
    background: url(/assets/images/job/password-icon.png) no-repeat;  
}

</style>
@endpush

@push('script')
<script>
   'use strict';
   $('#defaultSearch').on('change', function() {
       this.form.submit();
   });
</script>


@endpush
