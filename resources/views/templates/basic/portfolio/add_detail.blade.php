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
                                        Drag or Drop to Upload <a href="#">
                                            <span class="text text-primary ">Browse</span></a>  
                                        </span>
                                    </div>
                                </div>
                            </div>
                
                    </div>

                    <div class="col-xl-6 col-lg-6 form-group"> 
                       
                        <p class="h-cs">Or embed a video from Youtube or Vimeo</p>
                      
                            <a href="#" class="upload-video"  onclick="toggle_div_fun('video_url_id');"> 
                                Add Video Link  
                            </a>
                            
                            <input class="video-url" id="video_url_id" type="text" placeholder="Add Video Link" style="display: none" name="video_url">
                        
                       
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

                    
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                        <p class="skills-s">Skills and Deliverables (Optional)</p>
                        
                        <div class="input-group mb-1 select2_element">

                            <select
                                class="form-control select2 select2-hidden-accessible"
                                name="skills[]"
                                id="skills"
                                multiple=""
                                data-select2-id="select2-data-skills"
                                tabindex="-1"
                                aria-hidden="true"
                                style="width:100%">
                                <option value="">Select Skills</option>
                                @foreach ($skills as $skill)
                                <option value="{{$skill->id}}"  >{{$skill->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div>
                            <p class="maxi-skills">Max 15 skills</p>
    
                        </div>
                    </div>
                    

                </div>

                {{-- <div class="row pb-5">
                    
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

                </div> --}}
                


                <div class="row pb-3">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Project URL (Optional)</label>
                        <input type="text" name="project_url" id="detail_project_url">
                    </div>
                </div>

                <div class="row">

                    
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 form-group">
                        <label>Description</label>
                        <textarea class="form-control bg--gray" name="description" id="detail_description" aria-rowspan="3" spellcheck="false"></textarea>
                        <p class="d-s">Make sure you have approval from your clients to display the work you've done for them publicly.</p>
                    </div>

                </div>


                <div id="outer" class="text-right">
                    <div class="inner">
                        <button type="button" class="pl-4   mt-20 w-70 cancel-job-btn back-to-add-project-btn">Back</button>
                    </div>
                    <div class="inner">
                        <button type="button" class="pl-4 submit-btn mt-20 w-70 cretae-job-btn preview_portfolio" id="preview_btn">Go to preview</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
  </div>
<style>
    .video-url{
        margin-top: 10px;
    }
    p.maxi-skills {
    text-align: left;
    font-weight: 400;
    font-size: 13px;
    line-height: 14px;
    color: #808285;
    width: 100%;
    padding-top: 9px;
}
    .input-group>.form-control, .input-group>.form-select {
    position: initial !important;
    flex: 1 1 auto;
    width: 1%;
    min-width: 0;
}
</style>
<script>
  function toggle_div_fun(id) {
  var divelement = document.getElementById(id);
  if(divelement.style.display == 'none')
    divelement.style.display = 'block';
  else
    divelement.style.display = 'none';
}

</script>
