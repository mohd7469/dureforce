<style>
    img.rounded-c {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}
    .img-box {
        margin-top: 4px;
        width: 100px;
        height: 100px;
    }
    .h-img{
        position: relative;
        width: 100px;
        border-radius: 50%;
    }
    .upload-c {
    position: absolute;
    position: absolute;
    right: 6px;
    bottom: -85px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    background: url(/assets/images/job/uploads.png) no-repeat;
    font-size: 0;
    background-size: contain;
    cursor: pointer;
}
    .company-c-style select {
       height: 40px !important;
    }
    .company-c-style input, textarea {
    padding: 5px 20px;
}   
.cp1-style .form-group {
    margin-bottom: 0px;
}
.cp1-style .border-bottom {
    border-bottom: 1px solid #CBDFDF!important;
}
.cp1-style .border-top {
    border-top: 1px solid #dee2e6!important;
}
p.cp-basic {
    font-weight: 700;
    font-size: 22px;
    line-height: 28px;
    color: #007F7F;
    font-family: 'Mulish';
}
.cp-profile-h {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 25px;
    color: #000000;
    text-transform: capitalize;
    float: left;
    display: inline-block;
    margin-top: 25px;
}
.cp-profile_c_main {
    width: 100%;
    display: inline-block;
}
.cp-profile_c_main img {
    float: left;
    margin-right: 50px;

}

.p-4 {
    padding: 1rem 0px !important;
}
.border-top1 {
    padding-top: 0px !important;
}
/* .cp-profile_c_main span{
    display: none;
} */
.cp1-style .client-info-section {
    padding-left: 15px;
    padding-right: 15px;
}
.modal-header {
    background: #EDEDED;
    padding: 5px 23px;
 
}
.modal-footer .btn {

background: #7F007F;
border-radius: 5px;
font-size: 14px;
width: 73px;
height: 40px;
}
button.btn.btn-secondary.c-canel {
background: transparent;
color: #7f007f;
}
.setProfile .btn-continue {
margin: 0px 0px 10px 0px;
}
.modal-open .modal {
overflow-x: hidden;
overflow-y: auto;
background: #00000063;
}
.header-section{
z-index: 1;
}
.modal-footer{
    border-top:none;
}

.setProfile .welcome-body {
    padding: 0px 0px;
}
</style>

<div class="setProfile cp1-style " id="">
    
    <!----== Client Info Section Start ==----->
    <div class="client-info-section">
        <p class="cp-basic">Company Details</p>
        <div style="float:right">
            <button type="button" class="btn btn-primary cstm-edit" data-bs-toggle="modal" data-bs-target="#companyModal">
                Edit 
            </button>   
        
        </div>


      <!----== Client Info Section Start ==----->
        
      <div class="cp-profile_c_main">
        <form action="{{route('buyer.profile.update.picture')}}" method="post" enctype="multipart/form-data" id="image_change">
            @csrf
            <div class="profile-img-buyer col-md-12" style="background-color: transparent;">
                <input type="file" name="company_logo" id="img-upload" accept="image/png, image/gif, image/jpeg" class="imgInp imgInp-after " onchange="previewCompanyFile(this)" autocomplete="on">
                <img class="card-img-top image-ui" width="100" height="100" id="preview-img-company" src="{{ !empty($user->company->logo)? $user->company->logo: getImage('assets/images/default.png') }}" alt="">
                
            </div>
        </form>
        
        {{-- <div class="h-img">
            <img class="cp-prfileimg rounded-c" src="{{ !empty($user->company->logo)? $user->company->logo: getImage('assets/images/default.png') }}" alt="">
            
            <span class="upload-c">Icon</span>
        </div>
        <div class="cp-profile-h">{{$basicProfile->designation}}</div> --}}
    </div>

    <!----============End================--->   

   
    <div class="card-body">
        
        <div class="card-form-wrapper">
            
            <div class="justify-content-center">
               

                <div class="row p-4 border-top1 border-bottom" >

                    
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Name</label>
                        {{$user->company->name ?? ''}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Phone</label>
                        {{$user->company->number ?? ''}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Email</label>
                        {{$user->company->email ?? ''}}
                    </div>
                </div>

                <div class="row p-4 border-top border-bottom" >

                    
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Location</label>
                        {{$user_country_->name ?? ''}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>VAT ID</label>
                        {{$user->company->vat ?? ''}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Website</label>
                        {{$user->company->website ?? ''}}
                    </div>
                </div>

                <div class="row p-4 border-top border-bottom" >

                    
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>LinkedIn Profile</label>
                        {{$user->company->linked_url ?? ''}}
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Facebook Profile</label>
                        {{$user->company->facebook_url ?? ''}}
                    </div>

                    {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>Twitter Profile</label>
                        {{$user->company->facebook_url ?? ''}}
                    </div> --}}
                </div>
            
            </div>

        </div>
    </div>
   
    @include("templates.basic.profile.modals.company_")
    
</div>
</div>

@push('script')
    <script>
        "use strict";
        $("#img-upload-company").on('change',function(){
            
            $('#company_profile').submit();

    });

   

        </script>
@endpush