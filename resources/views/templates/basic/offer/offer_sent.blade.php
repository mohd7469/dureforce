@extends($activeTemplate.'layouts.frontend')
@section('content')
<section class="all-sections pt-3">
    <div class="container">
        <div class="row border">
            <div class="col-md-4" style="border-right: 1px solid #ccc;">
                <div class="flex-md-row mb-4 box-shadow h-md-250 text-center" >
                  <div class="pt-4 mx-auto">
                    <i class="fas fa-file" style="font-size: 150px"></i>
                 
                      <div class="mt-4">
                        <p class="text-dark-heading">Offer Sent to Dumitru Gi</p>
                      </div>
                      <div class="mb-2 mt-1">
                        <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                      </div>
                    
                     
                  </div>
                  </div>
            </div>
            <div class="col-md-8">
                <div class="flex-md-row mb-4 box-shadow h-md-250">
                    <div class="d-flex flex-column align-items-start p-5">
                      <h4 class="heading">
                        Are you done Hiring for the job "UX Designer?"
                      </h4>
                      <div class="p-3">
                        <div class="form-check mt-2">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label" style="padding-left: 10px" for="flexCheckDefault">
                            I'm done hiring for this job
                          </label>
                        </div>
                        <div class="pl-3 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod quis vero eligendi quae mollitia quia debitis iste soluta reiciendis? Repellendus dolores ullam qui esse suscipit praesentium vel est ex quidem!</div>
                      </div>

                      <div class="p-3">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label" style="padding-left: 10px" for="flexCheckDefault">
                            I plan to hire more freelancer for this job
                          </label>
                        </div>
                        <div class="text-muted" >Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod quis vero eligendi quae mollitia quia debitis iste soluta reiciendis? Repellendus dolores ullam qui esse suscipit praesentium vel est ex quidem!</div>
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
    border: 1px solid #dee2e6!important;
    background: #F8FAFA;
    border: 1px solid #CBDFDF;
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
