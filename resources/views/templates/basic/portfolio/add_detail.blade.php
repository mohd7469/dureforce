<form class="user-profile-form" action="http://127.0.0.1:8000/buyer/job/store" method="POST" enctype="multipart/form-data" id="job_form_data">
    <div class=""  style="background: #F8FAFA">
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