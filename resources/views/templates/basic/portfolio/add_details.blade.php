@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container">

    <div class="client_profile_con">    
        <!----== Sidebar Container Start ==----->
        <div class="sidebar-custom">
            <ul class="sidebar-nav">
                <li><a href="#">Add Project <i class="fa-thin fa-octagon-check"></i></a></li>
                <li><a href="#">Add Details</a></li>
                <li><a href="#">Preview</a></li>
            </ul>
        </div>

        <!----== Sidebar Container End ==----->

        
        <form class="user-profile-form" action="http://127.0.0.1:8000/buyer/job/store" method="POST" enctype="multipart/form-data" id="job_form_data">
              <div class="card custom--card"  style="background: #F8FAFA">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h3 class="card-title mt-2 ml-2">
                        Add Details
                    </h3>
                    
                </div>

                <div class="card-body pt-0">
                    <div class="card-form-wrapper">
                        <div class="justify-content-center">
                            <div class="row">
                                
                                <div class="col-xl-6 col-lg-6 form-group mt-4">
                                
                                        <div id="dropzone">
                                            <div class="dropzone needsclick dz-clickable" id="demo-upload" action="#">
                                                <div class="dz-message "> 
                                                    Drag or Drop to Upload <a href="#">Browse</a>  
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                            
                                </div>

                                <div class="col-xl-6 col-lg-6 form-group">
                                    <p class="h-cs">Or embed a video from Youtube or Vimeo</p>
                                        <a  href="#" class="upload-video "> 
                                            Add Video Link  
                                        </a>
                                </div>

                            </div>
                            
                            <div class="row">
                            
                                
                                <div class="col-md-8 pb-5">
                                    <ul class="list-style">
                                        <li> Images (.jpg, .gif, .png, up to 10 MB, no more than 4000 px in any dimension)</li>
                                        <li>Videos (.mp4, .mov, .webm, .ogm, ogv, up to 100 MB, 2 maximum, < 60 seconds)</li>
                                        <li> Audio (.mp3, .wav, up to 10 MB, 20 maximum)</li>
                                        <li>Document (.pdf, up to 10 MB)</li>
                                    </ul>
                                </div>    
                            </div>


                            <div class="row">

                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                    <p class="skills-s">Skills and Deliverables (Optional)</p>
                                    <div class="input-group mb-3">
                                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="kills and Deliverables" style="width: 100%;" tabindex="-1" aria-hidden="true" name="deliverables[]" id="deliverables" data-select2-id="select2-data-deliverables">
                                                                                                        <option value="1">code</option>
                                                                                                        <option value="2">figma</option>
                                                                                                        <option value="3">ui/ux</option>
                                                                                                        <option value="6">dev credentials</option>
                                                                                                        <option value="7">qa credentials</option>
                                                                                                    
                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-7-ptg5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered" id="select2-deliverables-container"></ul><span class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-deliverables-container" placeholder="Select Deliverables" style="width: 100%;"></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                    <p class="maxi-skills">Max 15 skills</p>
                                </div>

                            </div>

                            <div class="row pb-5">
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                   
                                    <div class="col-md-7">
                                        <label>Suggested Skills</label>
                                        <ul class="skills-listing">
                                        <li>ui design +</li>
                                        <li>research +</li>
                                        <li>data analytics +</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            


                            <div class="row pb-3">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                    <label>Project URL (Optional)</label>
                                    <input type="text">
                                </div>
                            </div>

                            <div class="row">

                                
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 form-group">
                                    <label>Description</label>
                                    <textarea class="form-control bg--gray" name="description" aria-rowspan="3" spellcheck="false"></textarea>
                                    <p class="d-s">Make sure you have approval from your clients to display the work you've done for them publicly.</p>
                                </div>

                            </div>


                            <input type="hidden" value="http://127.0.0.1:8000/buyer/job/job_data_validate" id="job_validate_url">
                            <input type="checkbox" name="skills[]" style="display: none">
                            <div style="display:inline;display:none" id="skills_heading">
                                <h4 class="" style="display:inline">Job Attributes* </h4>
                                <small>(Atlease one skill is required)</small>
                            </div>
                            <div id="form_attributes" class="pt-1">
                                
                            </div>

                           
                            
                            
                            <div id="outer" class="text-right">
                                <div class="inner">
                                    <button type="button" class="pl-4   mt-20 w-70 cancel-job-btn">Back</button>
                                </div>
                                <div class="inner">
                                    <button type="submit" class="pl-4 submit-btn mt-20 w-70 cretae-job-btn" id="submit-all">Go to preview</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>



        </div>    
       


    </div>



   

@endsection
@push('style')
<style>
    /*************/
.dz-message {
    text-align: CENTER;
    width: 100%;
    padding-top: 45px;
    padding-left: 30px;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #808285;
}
.dz-message:before {
    width: 50px;
    height: 50px;
    background: url(/assets/images/job/upload.png);
    content: '';
    position: absolute;
    background-repeat: no-repeat;
    background-size: 43px;
    left: 110px;
    top: 37px;
}
.dz-message a{
    margin-left: 5px;
    color: #007F7F;
}
.upload-video {
    width: 215px;
    height: 42px;
    border: 1px solid #CBDFDF;
    border-radius: 53px;
    text-align: center;
    background: url(/assets/images/job/video.png) no-repeat;
    background-size: 25px;
    background-position: 33px center;
    font-size: 14px;
    line-height: 18px;
    text-align: center;
    color: #808285;
    padding-top: 10px;
    padding-left: 30px;
    margin-top: 13px;

}
p.h-cs {
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    padding-top: 20px;
}
.card.custom--card {
    padding: 21px 27px;
}
.custom--card .card-body {
    padding: 0px;
}
ul.list-style li {
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #808285;
    margin-bottom: 16px;
}
.pb-5 {
    padding-bottom: 34px!important;
}
p.skills-s {
    width: 100%;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
}
.input-group.mb-3 {
    background: #FFFFFF;
    border: 1px solid #CBDFDF !important;
    border-radius: 4px;
    width: 351px;
    height: 37px;
    margin: 0px;
}
    
p.maxi-skills {
    text-align: right;
    font-weight: 400;
    font-size: 13px;
    line-height: 14px;
    color: #808285;
    width: 100%;
    padding-top: 9px;
}   
p.d-s {
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #808285;
    padding-top: 14px;
}
    /************/
    .list-style {
        line-height: 40px;
        list-style-type: disc;
        font-size: 14px;
        color: #808285;
        margin-left: 30px;
        margin-top:40px;
    }
    ul.skills-listing {
        display: -webkit-inline-box;
     
    }
    .list-style li::marker {
        color: #58A7A7;
        font-size: 1.7em;
    }
   
    ul.skills-listing li {
    float: left;
    display: inline-block;
    background: #58A7A7;
    border-radius: 20px;
    padding: 6px 22px;
    margin-left: 10px;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #FFFFFF;
    margin-right: 1%;
    }
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
