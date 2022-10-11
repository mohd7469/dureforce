@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container">

    <div class="client_profile_con">    
        <!----== Sidebar Container Start ==----->
        <div class="sidebar-custom">
            <ul class="sidebar-nav">
                <li><a href="#">Add Project</a></li>
                <li><a href="#">Add Details</a></li>
                <li><a href="#">Preview</a></li>
            </ul>
        </div>

        <!----== Sidebar Container End ==----->




        </div>    
        <!----== Client Info Section End ==----->


    </div>



   

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
        "use strict";
        $(document).ready(function(){
            $("#loginWithGmail").modal('show');
        });
    </script>
@endpush
