
<div class="container">
    <div
        class="modal fade"
        id="inviteJobModal"
        tabindex="-1"
        aria-labelledby="emailVerifyLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="container">
                        
                   
                    <div class="row"> 
                        <div class="col-md-12 col-sm-12">
                            <p class="c-bannerh">Invite to job</p>
                            <span class="close-c" data-bs-dismiss="modal">X</span>
                           
                        </div>
                        <hr>
             
                            <div class="col-md-6">
                               <div class="row"> 
                                 <div class="col-md-4">
                                     <img alt="User Pic" src="/assets/images/job/profile-img.png" id="profile-image1" class="img-circle img-responsive"> 
                                 </div>
                                 <input type="hidden" class="" id="freelancer_id" value="">
                                 <input type="hidden" class="" id="job_title" value="">
                                 <div class="col-md-8">
                                     <div style="display: inline-flex;">
                                        
                                        <h4 class="pname-c dev-name "id="first_name"> 
                                            
                
                                        </h4>
                                          <p id="space"></p>

                                        <h4 class="pname-c dev-name"id="last_name" style="margin-left: 7px;"> 
                                            
                
                                        </h4>
                                     </div>
                                     
                                     
                                      <p class="pdesination-c" id="designation">Full Stack Developer</p>  
                                     
                                        
                                        <p class="plocation" id="location">Landon,Uk</p>
                                  </div>
                                   
                               </div>
                            </div>

     
                   
                       
                    </div>
                </div>
                    <form class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                            {{-- <div class="form-group col-lg-7">
                                <!-- <label>@lang('Select One')</label> -->
                                <label for="exampleFormControlTextarea1">Reason</label>
                                <select class="form-control form--control" name="type">
                                    <option value="email">@lang('Select reason')</option>
                                    <option value="username">@lang('Offer1')</option>
                                    <option value="username">@lang('Offer2')</option>
                                    <option value="username">@lang('Offer3')</option>
                                    <option value="username">@lang('Offer4')</option>
                                </select>
                            </div> --}}

                            <div class="form-group col-lg-12 pt-2" >
                                <label for="exampleFormControlTextarea1">Message </label>
                                <textarea class="form-control" id="textAreaExample1" rows="4"></textarea>
                            </div>
                            <div class="col-lg-6 form-group text-center">
                                
                            </div>
                            <div class="col-lg-6 form-group text-center">
                                {{-- <button type="submit" class="float-left" data-bs-dismiss="modal">Cancle</button> --}}
                                <button type="submit" class="submit-btn w-80 float-right">Send Invitation</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


@push('style')
<style>
    .dev-name h4{
        margin-bottom: 20px !important;
    }
    .c-bannerh {
    padding: 18px 30px 0px 7px!important;
    }
    .close-c {
    right: 10px!important;
}

    form.account-form textarea {
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    border-radius: 4px;
    height: 114px;
}
    .c-bannerh {
    font-weight: 600;
    font-size: 22px;
    line-height: 28px;
    color: #000000;
    padding: 18px 30px 0px 19px;

}
form.account-form {
    padding: 0px 26px;
}


.account-header {
    margin-bottom: 10px;
}
button.float-left {
    background: transparent;
    text-align: right;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    margin-top: 10px;
    display: inline-block;
    /* margin-right: 7px; */
    position: relative;
    right: 15px;
    color: #7F007F;
}
.modal-dialog {
     max-width: 676px !important;
    margin: 1.75rem auto;
   
}
.modal-body{
    padding:0px !important;
}
.close-c{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    position: absolute;
    right: 30px;
    top:15px;
    z-index: 1;
    background: url(/assets/images/job/close-icon.png) no-repeat;
    background-position: center;
    font-size: 0px;
    cursor: pointer;
}
a.btn-products-s.phire{
    cursor: pointer;
}
.form-control:focus{
    background-color:#fff !important;
}
p.plocation:before{
    top: 3px !important;
}
</style>
@endpush
@push('script')
    <script>
        'use strict';
   $(document).ready(function(){
            $("#withdrawModal").modal('show');
        });
        (function($){
        
        $(document).ready(function(){
            $("#emailVerify").modal('show');
        });
        myVal();
        $('select[name=type]').on('change',function(){
            myVal();
        });
        function myVal(){
            $('.my_value').text($('select[name=type] :selected').text());
        }
    })(jQuery)
        "use strict";
        $(document).ready(function(){
            $("#loginWithGmail").modal('show');
        });
    </script>
@endpush
