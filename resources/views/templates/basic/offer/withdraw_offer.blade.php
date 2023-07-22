@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container">
    <div
        class="modal fade"
        id="withdrawModal"
        tabindex="-1"
        aria-labelledby="emailVerifyLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row"> 
                        <div class="account-header col-md-12 col-sm-12">
                            <p class="c-bannerh">Withdraw Offer</p>
                            <span class="close-c" data-bs-dismiss="modal">X</span>
                            <hr>
                        </div>
                       
                    </div>
                    <form class="account-form" method="POST">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="form-group col-lg-7">
                                <!-- <label>@lang('Select One')</label> -->
                                <label for="exampleFormControlTextarea1">Reason</label>
                                <select class="form-control form--control" name="type">
                                    <option value="email">@lang('Select reason')</option>
                                    <option value="username">@lang('Offer1')</option>
                                    <option value="username">@lang('Offer2')</option>
                                    <option value="username">@lang('Offer3')</option>
                                    <option value="username">@lang('Offer4')</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="exampleFormControlTextarea1">Message to Freelancer(Optional)</label>
                                <textarea class="form-control" id="textAreaExample1" rows="4"></textarea>
                            </div>
                            <div class="col-lg-6 form-group text-center">
                                
                            </div>
                            <div class="col-lg-6 form-group text-center">
                                <button type="submit" class="float-left" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="submit-btn w-80 float-right">Withdraw Offer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@push('style')
<style>
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
