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
                       
                        <div class="col-md-2 nopadding"> 
                            <div class="sidebar-custom" id="tab">
                                <ul class="sidebar-nav nav nav-tabs" role="tablist">
                                    <li role="tab" class="active">
                                        <a  data-toggle="tab" href="#addProject">Add Project 
                                        </a>
                                    </li>
                                    <li role="tab" ><a data-toggle="tab" href="#addDetail" id="portfolio_detail">Add Details</a></li>
                                    <li role="tab" class="preview_portfolio"><a   data-toggle="tab" href="#addPreview" id="portfolio_preview">Preview</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Content -->

                        <div class="col-12 col-md-10 p-0">
                            <form action="#" id="portfolio_information_form">
                                @csrf
                                <div class="tab-content">
                                    <div id="addProject" role="tabpanel" class="tab-pane active">
                                        @include('templates.basic.portfolio.add_project')
                                    </div>

                                    <div id="addDetail" role="tabpanel"class="tab-pane">
                                        @include('templates.basic.portfolio.add_detail')
                                    </div>

                                    <div id="addPreview" role="tabpanel" class="tab-pane ">
                                        @include('templates.basic.portfolio.add_preview')
                                    </div>

                                </div>
                            </form>
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
        <link rel="stylesheet" href="{{asset('/assets/resources/templates/basic/frontend/css/dropzone.css')}}" type="text/css" />

        <style>
            /*************/
                .tick-icon-color{
                    color: #007F7F;
                }
                .dropzone .dz-message {
                    text-align: center;
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
                .card img {
                    max-height: 100%;
                    height: 200px;
                    width: 664px;
                    margin-right: 10px
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
                        display: block;
                    
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
                    margin-top: 9px;
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
                        height: 100% !important;
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
                .nav-tabs{
                    border-bottom: none;
                }
                
                .sidebar-nav li a {
                    font-weight: 600;
                    font-size: 14px;
                    line-height: 18px;
                    color: #808285;
                    width: 100%;
                    display: inline-block;
                    padding: 23px 10px 23px 40px;
                    text-decoration: none;
                    
                    background-size: 31px;
                    display: inline-block;
                    background-position: center left !important;
                }
                ul.sidebar-nav li:nth-child(1) a {
                    background: url(/assets/images/job/edit-1.png) no-repeat;  
                    background-size: 26px;
                }
                ul.sidebar-nav li.active a{
                    color: black;
                }
                ul.sidebar-nav li.active:after{
                    background: url(/assets/images/job/Vector.png) no-repeat !important;
                    
                    
                }

                ul.sidebar-nav li.active:nth-child(1) a {
                    background: url(/assets/images/job/edit.png) no-repeat !important;
                    background-size: 25px !important;
                    background-position: left center !important;  
                }

                ul.sidebar-nav li.active:nth-child(2) a {
                    background: url(/assets/images/job/book.png) no-repeat !important;
                    background-size: 25px !important;
                    background-position: left center !important;  
                }

                ul.sidebar-nav li.active:nth-child(3) a {
                    background: url(/assets/images/job/left-tick.png) no-repeat !important;
                    background-size: 25px !important;
                    background-position: left center !important;  
                }
                ul.sidebar-nav li:nth-child(2) a {
                    background: url(/assets/images/job/details.png) no-repeat !important;
                    background-size: 25px !important;
                    background-position: left center !important;  
                }
                ul.sidebar-nav li:nth-child(3) a {
                    background: url(/assets/images/job/tick.png) no-repeat;  
                    background-size: 24px !important;
                    background-position: left center !important;  
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
                #viewport{
                    padding: 0px;
                }
                .col-md-2.nopadding {
                    padding-right: 0px;
                }
                .account-section {
                    background: #F8FAFA;
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
                
            
                .img_div{
                    border: 1px solid #dee2e6!important;
                    padding-left: 0px;
                    padding-right: 0px;
                }
                
                .hide{
                    display: none;
                }
            
                .dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg {
                    display: contents;
                    width: 54px;
                    height: 54px;
                }
                .dropzone .dz-preview {
                    position: relative;
                    display: inline-block;
                    vertical-align: top;
                    margin: 0px !important;
                    margin-left: 5px !important;
                    margin-bottom: 5px !important   ;
                    min-height: 85px;
                }
                .dropzone .dz-preview .dz-remove {
                    font-size: 14px;
                    text-align: center;
                    display: block;
                    cursor: pointer;
                    border: none;
                    margin-top: 10px !important;
                }
                /************/
                @media only screen and (max-width:767px){
                    .sidebar-custom{
                        width: 100% !important;
                    }
                }
        
        </style>
        @endpush
    @push('script-lib')
   
    <script src="{{asset('/assets/resources/templates/basic/frontend/js/dropzone.js')}}"></script>
        
        <script>
            var token= $('input[name=_token]').val();
            Dropzone.autoDiscover = false;
            let portfolio_basic_form=$('#portfolio_information_form');
            var add_project=$('#addProject');
            var detail_tab=$('#addDetail');
            var preview_tab=$('#addPreview');
            var go_to_detail=$('#go_to_detail_btn');

            $(document).ready(function(){
                $('.select2').select2({
                    tags: true,
                    maximumSelectionLength: 15
                });

                $('#completion_date').on('focusout',function(){
                    
                    date=($('#completion_date').val());
                    
                    if(date == '')
                        displayAlertMessage("Wrong completion date");
                });

                $('select').on('select2:close', function (evt) {
                    var uldiv = $(this).siblings('span.select2').find('ul')
                    
                    var count = $(this).select2('data').length;

                        if(count>15){
                            displayAlertMessage("Max 15 skills can be selected");
                        }
                          
                });        
                var form_data='';
                var action_url="{{route('seller.profile.portfolio.store')}}";
                var dropzone = new Dropzone('#demo-upload', {
                    url:action_url,
                    autoProcessQueue: false,
                    parallelUploads: 4,
                    dictDefaultMessage: "your custom message",
                    thumbnailHeight: 60,
                    thumbnailWidth: 60,
                    maxFiles: 4,
                    uploadMultiple:true,
                    maxFilesize: 3,
                    acceptedFiles: ".jpg,.png,.jpeg",
                    filesizeBase: 1000,
                    addRemoveLinks: true,
                    init: function() {

                        this.on("removedfile", function (file) {
                            var file_id=('#'+file.upload.uuid+'img_div');
                            $(file_id).remove();
                        });

                        this.on("addedfile", function (file) {
                           
                            var temp = file.previewTemplate;
                            var img_div_id=file.upload.uuid+'img_div';
                            var FR= new FileReader();
                            var image_div='<div class="col-md-4 col-lg-4 col-sm-4 img_div " id="'+img_div_id+'"></div>';
                            $('#image_viewer').append(image_div); 
                            FR.onload = function(e) {
                               
                               var img=$("<img />", {
                                    "src": e.target.result,
                                    "class" : 'img_file ',
                                    "id"  :file.upload.uuid
                                }).appendTo('#'+img_div_id);
                                
                            };
                            FR.readAsDataURL( file );
                            $('#'+img_div_id).html('<a href="#" class="editbtn-img-p add_details"><img src="/assets/images/job/edit-icon.png"></a>');
                        });

                        this.on("sendingmultiple", function(file, xhr, formData) {
                            formData.append("_token",token);
                            formData.append("data", form_data);
                        });
                        
                        this.on("successmultiple", function(files, response) {

                            if(response.error)
                            {
                                displayErrorMessage(response.error);
                            }
                            if(response.redirect)
                                window.location.replace(response.redirect);
                            
                        });

                        myDropzone = this;

                        portfolio_basic_form.submit(function (event) {
                        form_data= $(this).serialize();
                            event.preventDefault();
                            event.stopPropagation(); 
                            var validate_url="{{route('seller.profile.portfolio.validate')}}";
                            $.ajax({
                                type:"POST",
                                url:validate_url,
                                data: {data : form_data,_token:token},
                                success:function(data){

                                    if(data.validated){

                                        if(myDropzone.getQueuedFiles().length>0){
                                            myDropzone.processQueue();
                                        }
                                        else
                                        {
                                            submitProposal(form_data);
                                        }

                                    }
                                    else{
                                        formPostProcess(add_project,preview_tab);
                                        displayErrorMessage(data.error);
                                    }
                                }
                            });
                        }); 
                    },
                    thumbnail: function(file, dataUrl) {
                    

                        if (file.previewElement) {
                    

                        file.previewElement.classList.remove("dz-file-preview");
                        var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                        for (var i = 0; i < images.length; i++) {
                            var thumbnailElement = images[i];
                            thumbnailElement.alt = file.name;
                            thumbnailElement.src = dataUrl;
                        }
                        setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
                        }
                    }
                    
                });
             
                $('.preview_portfolio').click(function(){

                    $('#portfolio_title').html($('#project_name').val());
                    $('#portfolio_completion_date').html($('#project_completion_date').val());
                    $('#video_url_id').val();
                    var skills=$('#skills').select2('data');
                   
                    var skills_list='';
                    skills.forEach((item, index)=>{
                        skills_list+="<li>"+item.text+"</li>";
                    });
                    $('#portfolio_skills').html(skills_list);
                    $('#portfolio_url').html($('#detail_project_url').val());
                    $('.portfolio_description').html($('#detail_description').val());

                    formPostProcess(preview_tab,detail_tab);
                });

                go_to_detail.click(function(){

                    formPostProcess(detail_tab,add_project);

                });
               
                $('.add_project').click(function(){
                    formPostProcess(add_project,preview_tab);

                });

                $('.back-to-add-project-btn').click(function(){
                    formPostProcess(add_project,detail_tab);

                });

                $(document).on('click', '.add_details', function() {
                    formPostProcess(detail_tab,preview_tab);

                });
                
            });
           
            function isValidDate(d) {
                return d instanceof Date && !isNaN(d);
            }
            function submitProposal(data)
            {
                var action_url="{{route('seller.profile.portfolio.store')}}";
                $.ajax({
                    type:"POST",
                    url:action_url,
                    data: {data : data,_token:token},
                    success:function(data){
                        var html = '';
                        console.log(data);
                        if(data.error){
                            
                            displayErrorMessage(data.error);

                        }
                        else{
                            window.location.replace(data.redirect);              
                        }
                    }
                });  
            }
            
            function displayAlertMessage(message)
            {
                iziToast.error({
                message: message,
                position: "topRight",
                });
            }

            function displayErrorMessage(validation_errors)
            {
                $('input,select,textarea').removeClass('error-field');
                $('.select2').next().removeClass("error-field");
                for (var error in validation_errors) { 
                    var error_message=validation_errors[error];

                    $('[name="'+error+'"]').addClass('error-field');
                    $('[id="'+error+'"]').addClass('error-field');
                    $('#'+error).next().addClass('error-field');

                    displayAlertMessage(error_message);

                
                }
            }

            function formPostProcess(nextTab,preTab)
            {

                $('input,select,textarea').removeClass('error-field');
                $('.select2').next().removeClass("error-field");   
                preTab.removeClass('active');
                nextTab.addClass('active');

                scrollTop();
            }

            function scrollTop()
            {
                $("html, body").animate({
                    scrollTop: 0
                }, 500);
            }

        </script>
        
    @endpush
 











