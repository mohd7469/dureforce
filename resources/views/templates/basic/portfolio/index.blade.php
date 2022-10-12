@extends($activeTemplate.'layouts.frontend')
@section('content')
        <section
            class="account-section bg-overlay-white bg_img"
            style="background-image: url('undefined')"
        >
            <div class="container">
                <div id="viewport">
                    <div class="row justify-content-center">
                        <!-- Sidebar -->
                       
                        @include('templates.basic.portfolio.side_nav')
                        <!-- Content -->

                        <div class="col-12 col-md-9 p-0">
                            <div class="tab-content">
                                <div id="addProject" role="tabpanel" class="tab-pane active">
                                    @include('templates.basic.portfolio.add_project')
                                </div>

                                <div id="addDetail" role="tabpanel"class="tab-pane">
                                    @include('templates.basic.portfolio.add_detail')
                                </div>

                                <div id="addPreview" role="tabpanel" class="tab-pane">
                                    @include('templates.basic.portfolio.add_preview')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection

        <!-- Modal -->


        <script src="https://azapp-dureforce-dev.azurewebsites.net/assets/templates/basic/frontend/js/jquery-3.5.1.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      

        @push('style')
        <style>
            /*************/
        .nopadding {
           
        
        }
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
            left: 82px;
            top: 35px;
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
                height: 100%;
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











