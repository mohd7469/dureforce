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
        <div class="right-container-c">
        <div class="row">
          
            <div class="col-md-6">
                <p class="title-c">Add portfolio project</p>
                <label for="exampleInputEmail1">Project Title</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a brief  but description">
            </div>
            
          </div>
          <div class="row">
          
            <div class="col-md-6">
                <p class="rl-d">Related DF Job (optional) <br />
                    Once you've completed contracts on DF, you'll be able to link your work.</p>
            </div>
            <div class="col-md-6"></div>
          </div>
          <div class="row">
          
            <div class="col-md-6">
             
                <label for="exampleInputEmail1">Completion Date (optional)</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="mm/dd/yy">
            </div>
            
          </div>

          <div class="btns-addp">
            <button type="submit" class="float-left cncl-btn" data-bs-dismiss="modal">Cancle</button>
            <button type="submit" class="submit-btn w-80 float-right">Go to Add Details</button>
        </div>
        </div> 
    </div>   
        <!----== Client Info Section End ==----->
       


    </div>



   

@endsection
@push('style')
<style>

    /*********/
    .form-control {
    border: 1px solid #e1e7ec;
    font-size: 14px;
    font-weight: 500;
    height: 45px;
    appearance: auto;
    background-color: #f9f9f9;
    width: 351px;
    height: 37px;
    left: 219px;
    top: 219px;
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    border-radius: 4px;
}
p.rl-d {
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    padding: 21px 0px 40px 0px;
}
.right-container-c {
        background: #F8FAFA;
        padding: 27px 21px;
        display: inline-block;
        width: 80%;
        height: 551px;
        position: relative;
    }
    .btns-addp {
        width: 276px;
        float: right;
        position: absolute;
        bottom: 48px;
        right: 48px;
    }
    button.float-left.cncl-btn {
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #7F007F;
    background: transparent;
    margin-top: 10px;
    margin-right: 21px;
}
.title-c {
    font-weight: 600;
    font-size: 20px;
    line-height: 25px;
    color: #000000;
    margin-bottom: 40px;
}



    /********/
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
        max-width: 20%; 
        width:20%;
        float: left;
        display: inline-block;
        height: 551px;
        background: #FFFFFF;
        box-shadow: 1px 1px 10px 4px rgba(0, 0, 0, 0.05);
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
