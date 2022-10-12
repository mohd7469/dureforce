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
    
 /*******Sidebar start********/

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
    .sidebar-custom{
        max-width: 230px;
        width: 20%;
        float: left;
        display: inline-block;
        height: 1132px;
        background: #fff;
        border-radius: 3px 0px 0px 3px;
        padding: 28px 21px;
        box-shadow: 1px 1px 10px 4px rgb(0 0 0 / 5%);
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
        position: relative;
    }
    .sidebar-nav li:after {
    width: 30px;
    height: 30px;
    position: absolute;
    background: url(/assets/images/job/tickicon.png) no-repeat;
    content: '';
    right: 0px;
    top: 21px;
    background-size: 20px;
}

    .sidebar-nav li a {
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #808285;
        width: 100%;
        display: inline-block;
        padding: 23px 10px 23px 50px;
        text-decoration: none;
        border-bottom: 1px solid #808285;
        background-size: 31px;
        display: inline-block;
        background-position: center left !important;
}
ul.sidebar-nav li:nth-child(1) a {
    background: url(/assets/images/job/edit-1.png) no-repeat;  
    background-size: 26px;
}
ul.sidebar-nav li:nth-child(2) a {
    background: url(/assets/images/job/edit-1.png) no-repeat;  
    background-size: 26px;  
}
ul.sidebar-nav li:nth-child(3) a {
    background: url(/assets/images/job/edit-1.png) no-repeat;  
    background-size: 26px;
}
ul.sidebar-nav li:nth-child(4) a {
    background: url(/assets/images/job/password-icon.png) no-repeat;  
}
.dashboard-sidebar-inner {
    background-color: #1e2746;
    padding: 20px 0px;
    border-radius: 2px !important;
    height: 100%;
}
.cretae-job-btn{
    
    background: #7F007F !important;
    border-radius: 5px;
}
#outer
{
    width:100%;
    text-align: right;
    padding-right: 7px;
}
.inner
{
    display: inline-block;
}
.cancel-job-btn{
    color: #7F007F;
    background-color: transparent
}
.dropzone .dz-preview .dz-details {
    z-index: 20;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    font-size: 11px !important;
    min-width: 100%;
    max-width: 100%;
    padding: 2em 1em;
    text-align: center;
    color: rgba(0,0,0,.9);
    line-height: 150%;
}
.dropzone .dz-preview .dz-image {
    border-radius: -51px;
    overflow: hidden;
    width: 64px;
    height: 63px;
    position: relative;
    display: list-item;
    z-index: 10;
    margin-left: 5px;
}
.dropzone .dz-preview .dz-details {
    z-index: 20;
    position: absolute;
    top: -3px;
    left: 0;
    opacity: 0;
    font-size: 11px !important;
    min-width: 100%;
    max-width: 100%;
    padding: 1em 1em;
    text-align: center;
    color: rgba(0,0,0,.9);
    line-height: 135%;
}
.dropzone .dz-preview {
    position: relative;
    display: inline-block;
    vertical-align: top;
    margin: 5px;
    min-height: 100px;
}
.dropzone .dz-preview .dz-success-mark, .dropzone .dz-preview .dz-error-mark {
    pointer-events: none;
    opacity: 0;
    z-index: 391;
    position: absolute;
    display: block;
    top: 50%;
    left: 50%;
    margin-left: -27px;
    margin-top: -41px;
}
.select2Tag input{
    background-color: transparent !important;
    padding: 0 !important;
}
.inline{
    display: inline-flex;
    float:left;
}

.card-title{

    color:#000 !important;
    padding:10px;

}
.card {
    
    border: 0px !important;
    border-radius: 0;
}
.card-body .custom-padding {
    padding: 0rem 0rem !important;
}

.upload_icon{
    position: absolute;
    left: 13%;
    right: 0%;
    top: 50.78%;
    bottom: 22%;

}
.upload_inner_arrow{
    
    position: absolute;
    left: 3.15%;
    right: 32.52%;
    top: 38.12%;
    bottom: 3.78%;
}
.dropzone {
    
    background: white;
    border-radius: 5px;
    height: 121px;
    border: 2px dashed #CBDFDF;
    border-image: none;
    max-width: 500px;
    min-height: 126px;
    margin-left: auto;
    margin-right: auto;
}
.custom--card .card-body .card-form-wrapper input {
    
    background-color: white !important;
    border-radius: 3px;
    padding: 10px 15px;
    
}


.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: 1px solid #e1e7ec !important;
    
}
.select2-container--default .select2-selection--multiple {
    
    background-color: white;
    border: 1px solid #e1e7ec;
   

}

.form-control {
    border: 1px solid #e1e7ec;
    font-size: 14px;
    font-weight: 500;
    height: 45px;
    appearance: auto;
    background-color: white !important;
    
}


.hide{
    display: none;
}
.dropzone .dz-preview .dz-details .dz-size {
    margin-bottom: 1em;
    font-size: 11px;
}

.dropzone .dz-preview .dz-progress {
    opacity: 0;
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
