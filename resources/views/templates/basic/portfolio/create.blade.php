<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
    
    @php
        $files=old('uploaded_files',json_encode([],true));
        if(is_string($files)){
            $files=json_decode($files);
        }
    @endphp

    <form action="{{route('seller.profile.portfolio.store')}}" id="portfolio_information_form" method="post">
        @csrf
        {{-- Name --}}
        <div class="col-md-12 col-lg-12 form-group">
            <label for="exampleInputEmail1">Project Name *</label>
            <input type="text" class="form-control" id="project_name" aria-describedby="emailHelp" placeholder="Enter Project Name" name="name" value="{{old('name')}}">
        </div>
        {{-- description --}}
        <div class="col-md-12 col-lg-12 form-group">
            <label>Description</label>
            <textarea class="" name="description"  rows="4"  placeholder="Enter Project Description">{{old('description')}}</textarea>
        </div>

        {{-- Role --}}
        <div class="col-md-12 col-lg-12 form-group">
            <label>What was your Role in the Project?</label>
            <textarea class="" name="role"  rows="4"  placeholder="Write about your role in this project.">{{old('role')}}</textarea>
        </div>

        {{-- dropzone --}}
        <div class="col-md-12 col-lg-12 form-group">
            <div class="row">
                
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <label>Project Images</label>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 text-right">
                    <label class="guide-lines-lbl" data-bs-toggle="modal" data-bs-target="#project_images_guide_lines">View File Upload Guidelines</label>
                </div>

            </div>

            <div id="dropzone">
                <div class="dropzone needsclick dz-clickable" id="demo-upload" >
                    <div class="dz-message "> 
                        Drag or Drop to Upload <a href="#">Browse</a>  
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @include( $activeTemplate . 'portfolio.uploaded_files_preview',['files' => $files])
        {{-- skills --}}
        <div class="col-md-12 col-lg-12 form-group">
            <label class="skills-s">Skills</label>
            <div class="input-group mb-1 select2_element">
                    <select

                    class="form-control select2 select2-hidden-accessible"
                    name="skills[]"
                    id="portfolio_skills"
                    multiple=""
                    data-select2-id="select2-data-skills"
                    tabindex="-1"
                    aria-hidden="true"
                    style="width:100%">
                    <option value="">Select Skills</option>
                    @foreach($skills as $skill)
                        <option value="{{$skill->id}}"  {{ in_array($skill->id,old('skills',[])) ? 'selected' : ''}}>{{$skill->name}}</option>
                    @endforeach

                </select>

            </div>
        </div>

        {{-- Completion Date --}}
        <div class="col-md-12 col-sm-12 col-lg-12"> 
            <label >Completion Date *</label>
            <input type="date" class="form-control" id="completion_date" aria-describedby="emailHelp" placeholder="mm/dd/yy" name="completion_date"  value="{{old('completion_date')}}"  >
        </div>

        {{-- urls --}}
        <div class="row mt-2">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <label>Public URL</label>
                <input type="text" name="project_url" id="detail_project_url" class="form-control" value="{{old('project_url')}}">
            </div>
            
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group"> 
                <label>Youtube URL</label>     
                <input class="form-control video-url" id="video_url_id" type="text" placeholder="Add Video Link"  name="video_url" value="{{old('video_url')}}">
            </div>
        </div>

        <input type="hidden" value="{{old('uploaded_files')}}" name="uploaded_files" id="uploaded_files_input_id">

         {{-- btns --}}
         <div  class="row float-right">
            <div class="inner">
                <button type="button" class="pl-4 submit-btn  mt-20 w-70 cancel-job-btn add_details">Preview</button>
                <button type="submit" class="pl-4 submit-btn mt-20 w-70 cretae-job-btn" id="submit-all">Save Project</button>

            </div>
            
        </div>

    </form>

    <div class="modal fade" id="project_images_guide_lines" tabindex="-1" aria-labelledby="GuideLines" aria-hidden="true">
        <div class="modal-dialog modal-dialog-profile">
            <div class="modal-content">
                <div class="modal-header editprofileheader">
                    <h5 class="modal-title" id="exampleModalLabel">View File Upload GuideLines</h5>
                    <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-profile">
                    <ul class="list-style">
                        <li> Images (.jpg, .gif, .png, up to 10 MB, no more than 4000 px in any dimension)</li>
                        <li> Videos (.mp4, .mov, .webm, .ogm, ogv, up to 100 MB, 2 maximum, < 60 seconds)</li>
                        <li> Audio (.mp3, .wav, up to 10 MB, 20 maximum)</li>
                        <li> Document (.pdf, up to 10 MB)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('style')
    
    <link rel="stylesheet" href="{{asset('/assets/resources/templates/basic/frontend/css/dropzone.css')}}" type="text/css" />

    <style>
        /*************/
            .guide-lines-lbl{
                color: #007F7F;
            }
        
            .dropzone .dz-message {
                text-align: center;
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
            
           
            .skills.list-style li {
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
            .cancel-job-btn{
                color: #7F007F;
                border: 1px solid #7F007F !important;
                background-color: transparent !important;
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
            
            
            .dropzone {
                
                background: white;
                border-radius: 5px;
                height: 121px;
                border: 2px dashed #CBDFDF;
                border-image: none;
                min-height: 126px;
                margin-left: auto;
                margin-right: auto;
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
        
    </style>
    
@endpush

@push('script-lib')

    <script src="{{asset('/assets/resources/templates/basic/frontend/js/dropzone.js')}}"></script>
    <script>
        
        var uploaded_files=Array();
        // uploaded_files= JSON.parse($('#uploaded_files_input_id').val());
        var action_url="{{route('file.upload') }}";
        var token= $('input[name=_token]').val();
        Dropzone.autoDiscover = false;
       
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

            $("#uploaded_file_table_id").on("click", "#DeleteButton", function() {
      
                let file_index=$(this).closest("tr").index();
                uploaded_files.splice(file_index, 1);
                $(this).closest("tr").remove();
                $('#uploaded_files_input_id').val(JSON.stringify(uploaded_files));
            });

            var dropzone = new Dropzone('#demo-upload', {
                            url:action_url,
                            autoProcessQueue: true,
                            parallelUploads: 1,
                            dictDefaultMessage: "your custom message",
                            thumbnailHeight: 120,
                            thumbnailWidth: 120,
                            maxFiles: 6,
                            uploadMultiple:false,
                            acceptedFiles: ".jpg,.png,.jpeg,.docx,.pdf",
                            filesizeBase: 1000,
                            addRemoveLinks: false,
                            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            init: function() {
                                
                                this.on("addedfile", function (file) {
                                    var _this = this;
                                    
                                });
            
                                this.on("sending", function(file, xhr, formData) {
                                    formData.append("_token",token);
                                });

                                this.on("error", function (file, response) {
                                    
                                    var _this = this;
                                    _this.removeFile(file);
                                    let errors=response.errors;
                                    
                                    Object.entries(errors).forEach(([key, value]) => {
                                        displayAlertMessage(value);
                                    });
                                });

                                this.on("success", function (file, response) {
                                    var _this = this;
                                    _this.removeFile(file);
                                    uploaded_files.push(response.uploaded_file);
                                    addFile(response.uploaded_file);
                                });
            
                                this.on("complete", function(file, xhr, formData) {
                                    if(response.error)
                                    {
                                        displayErrorMessage(response.error);
                                    }
                                    if(response.redirect)
                                        window.location.replace(response.redirect);
                                });
                    
                                myDropzone = this;
  
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
        });

        function addFile(file){

            $('#file_name_div').append('<tr><td>'+file.uploaded_name+'</td><td class="text-center">'+file.type+'</td><td class="text-center" id="DeleteButton"><span class="badge badge-primary badge-pill delete-btn"  ><i class="fa fa-trash" style="color:red" ></i></span></td><td class="text-center">'+
            '<a href="'+file.url+'" download><span class="badge badge-primary badge-pill guide-lines-lbl"><i class="fa fa-download "></i></span></a></td></tr>');
            $('#uploaded_files_input_id').val(JSON.stringify(uploaded_files));
        }
        function isValidDate(d) {
            return d instanceof Date && !isNaN(d);
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

    </script>
    
@endpush