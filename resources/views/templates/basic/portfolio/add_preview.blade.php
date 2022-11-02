<div class="right-p-con">

    <div class="d-flex flex-wrap align-items-center justify-content-between">
        <p class="card-title1">
                Preview
        </p>
    </div>

    <section class="">

        <div class="card-body pt-0 border-bottom" >
            <div class="card-form-wrapper">
                <div class="justify-content-center">
                    
                    <div class="row">
                        
                        <p class="p-title">
                            <span>Title </span>
                            <a href="#" class="editbtn-d add_project">
                                <img src="/assets/images/job/edit-icon.png">
                            </a>
                         </p>

                        {{-- title --}}
                       
                        <span id="portfolio_title" ></span>
                           
                        {{-- images --}}
                        <div class="row card" style="background-color: transparent !important;box-shadow:none;border:none;margin-top: 9px;">
                            
                            <div class="row" id="image_viewer" >
                                
                            </div>
            
                        </div>
                        
                    </div>
                    

                    {{-- skills --}}
                    <div class="row pt-5 pb-5">
                        
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                            
                            <div class="col-md-7">
                                <label>
                                    <span>
                                    Skills
                                    </span>
                                    
                                    <a href="#" class="editbtn-d add_details">
                                        <img src="/assets/images/job/edit-icon.png">
                                    </a>
                                </label>
                                
                                
                                <span>
                                   
                                    <ul class="skills-listing" id="portfolio_skills">
                                
                                    </ul>
                                    
                                </span>
                                
        
                            </div>
                            
                        </div>

                    </div>
                    
                    {{-- description --}}
                    <div class="row">

                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 form-group">
                            <label>Description <a href="#" class="editbtn-d add_details"><img src="/assets/images/job/edit-icon.png"></a></label>
                            <p class="portfolio_description"> </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <div class="container pt-5 pb-5 pl=">
            {{-- completion date --}}
            <div class="row">
                <label><p class="pb-4" id="portfolio_completion_date">
                
                </p>
            </div>
            {{-- Project URL --}}
            <div class="row">

                        
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 form-group">
                    <label>Project URL <a href="#" class="editbtn-d editbtn-d-p add_details"><img src="/assets/images/job/edit-icon.png"></a></label>
                    <p id="portfolio_url"></p>
                </div>

            </div>
            {{-- btns --}}
            <div id="outer" class="text-right">
                <div class="inner">
                    <button type="button" class="pl-4   mt-20 w-70 cancel-job-btn add_details">Back</button>
                </div>
                <div class="inner">
                    <button type="submit" class="pl-4 submit-btn mt-20 w-70 cretae-job-btn" id="submit-all">Publish</button>
                </div>
            </div>
        </div>

    </section>

</div>

<style>

.card .img-wrapper-previw {
    max-width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.card .img-wrapper-previw{
    position: relative;
}
.hover-video {
    width: 100%;
    height: 100%;
    background: rgba(81, 81, 81, 0.35) url(/assets/images/job/video-player.png) no-repeat;
    position: absolute;
    background-position: 52% 40%;
    background-size: 100px;
    opacity: 0;
}
.hover-video img{
    width: 0px;;
}
.card .img-wrapper-previw:hover .hover-video{
    opacity: 1;
}
.right-p-con {
    background: #F8FAFA;
    padding: 17px 25px;
}
a.editbtn-img-p {
    position: absolute;
    width: 30px;
    height: 30px;
    right: 7px;
    top: 5px;
}
.editbtn {
    height: 30px;
    width: 30px;
    position: relative;
    left: 21px;
    top: -23px;
}
.editbtn-d {
    height: 30px;
    width: 30px;
    position: relative;
    left: 43px;
    top: -2px;
}
.card-title1 {
    color: #000 !important;
    font-weight: 600;
    font-size: 20px !important;
    line-height: 25px;
    padding-left: 15px;

}
.p-title {
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #000000;
    margin-bottom: 9px;
    margin-top: 48px;
}
label {
    
    margin-bottom: 10px;
    display: block;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #000000;
}
4.ptitle {
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
    color: #000000;
}
span.short-d {
    font-size: 14px;
    line-height: 18px;
    color: #000000;
}
</style>