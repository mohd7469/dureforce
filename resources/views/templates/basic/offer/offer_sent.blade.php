@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="all-sections pt-3">
    <div class="container">
        <div class="row border">
            <div class="col-md-4" style="border-right: 1px solid #CBDFDF;">
                <div class="flex-md-row mb-4 box-shadow h-md-250 text-center" >
                  <div class="pt-4-left mx-auto">
                    <img src="/assets/images/job/f-icon.png" alt="icon">
                 
                      <div class="mt-4">
                        <p class="text-dark-heading">Offer Has Been Sent</p>
                      </div>
                      <div class="mb-2 mt-1">
                        <p class="text-dark">We’ll notify you freelancer will respond
                          respond to your offer. </p>
                      </div>
                    
                     
                  </div>
                  </div>
            </div>
            <div class="col-md-8">
                <div class="flex-md-row mb-4 box-shadow h-md-250">
                    <div class="d-flex flex-column align-items-start pright-spacing ">

                      
                      <h4 class="heading">
                        Are you done Hiring for the job "UX Designer?"
                      </h4>
                      <div class="p-3">
                        <div class="form-check mt-2">
                          {{-- <input class="form-check-input" type="radio"  name="choice" value="" id="flexCheckDefault11" checked> --}}
                          <input type="radio" name="choice" value="choice-1" id="choice-1"  class="form-check-input"checked>
                         
                          <label class="form-check-label" style="padding-left: 10px" for="flexCheckDefault1">
                             <p> I'm done hiring for this job</p>
                            <div class="pl-3 text-muted">When the freelancer accepts, your job post will be closed to new proposals.  Don’t worry - the original job post, 
                              all the freelancers you messaged, shortlisted or archived for this job will be saved......</div>
                          </label>
                        </div>
                       
                      </div>

                      <div class="p-3">
                        <div class="form-check">
                          <input type="radio"  name="choice" class="form-check-input"   value="" id="flexCheckDefault199">

                          <input type="radio" name="choice"  class="form-check-input" value="choice-2" id="choice-2">
                            
                          <label class="form-check-label" style="padding-left: 10px" for="flexCheckDefault199">
                            I plan to hire more freelancer for this job
                            <div class="text-muted" >Your job post will remain open to new proposals</div>
                          </label>
                        </div>
                       
                      </div>
                      <div class="btncntainer">
                          <a href="{{route('buyer.job.index')}}" class="btngojobs">Go to my jobs</a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>

</div>

@endsection
@push('style')
<style>
    section.all-sections.pt-3 {
    margin: 50px 0px 240px 0px;
}
section.all-sections .border {
    border: 1px solid #CBDFDF!important;
    background: #F8FAFA;
  
}
.text-dark-heading{
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
/* identical to box height */
    text-align: center;
    color: #000000;
}
p.text-dark {
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    text-align: center;
    color: #000000;
    width: 60%;
    margin: 15px auto !important;
}
label.form-check-label p {
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    margin-bottom: 12px;
}

.text-muted {
    /* color: #6c757d!important; */
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #808285;
}
h4.heading {
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
}
.pright-spacing {
    padding: 37px 40px 12px 40px!important;
}
.pt-4-left {
    padding-top: 37px!important;
}
.btngojobs{
  background: #7F007F;
border-radius: 5px;
padding: 11px 20px;
font-weight: 600;
font-size: 14px;
line-height: 18px;
text-align: center;
color: #FFFFFF;
float:right;
display:inline-block;
margin-top: 50px;
}
.btngojobs:hover{
  color: #fff;
}
.btncntainer{
  width:inline-block;
  text-align: right;
  width: 100%;
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
