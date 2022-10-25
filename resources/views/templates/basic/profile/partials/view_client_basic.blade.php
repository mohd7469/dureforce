<div class="setProfile" id="basic-profile">
    <form action="{{ route('user.profile.basics.save') }}" method="POST" id="form-basic-save" class="form-basic-save"
          enctype="multipart/form-data">
        @csrf

@include("templates.basic.profile.modals.client_basic_")

        <div class="container-fluid welcome-body">
           
         <div class="container">

            <div class="client_profile_con">    
                {{-- <!----== Sidebar Container Start ==----->
                <div class="sidebar-custom">
                    <ul class="sidebar-nav">
                        <li><a href="#">Basic Details</a></li>
                        <li><a href="#">Company Details</a></li>
                        <li><a href="#">Billing & Payments</a></li>
                        <li><a href="#">Password & Security</a></li>
                    </ul>
                </div>
        
                <!----== Sidebar Container End ==-----> --}}
        
                <!----== Client Info Section Start ==----->
                <div class="client-info-section">
                       <p class="cp-basic">Basic Details</p>
                       <div style="float:right">
                        <button type="button" class="btn btn-primary cstm-edit" data-bs-toggle="modal" data-bs-target="#clientBasicModal">
                            Edit
                        </button>
                       </div>
        
                        <!----== Client Info Section Start ==----->
        
                       <div class="cp-profile_c_main">
                           <div class="h-img">
                               <img class="card-img-top image-ui rounded-c" src="{{ !empty($basicProfile->profile_picture)? $basicProfile->profile_picture: getImage('assets/images/default.png') }}" alt="">
                               <span type="file" name="profile_picture" class="upload-c">Icon</span>
                           </div>
                           <div class="cp-profile-h">{{$basicProfile->designation}}</div>
                       </div>
        
                       <!----============End================--->
        
        
                        <!----== Client Job Title Section Start ==----->
        
                       <div class="cp-row-con">
                           <p class="cp--jbh">Job Title</p>
                           <p class="cp-jt">{{$basicProfile->designation}}</p>
                       </div>
        
                        <!----============End================--->
        
        
                       <!----== Client About Job Descriprion Section Start ==----->
        
                       <div class="cp-row-con">
                           <p class="cp--jbh">About</p>
                           <p class="cp-jt">{{$basicProfile->about }}</p>
                       </div>
        
                       <!----============End================--->
        
                      <!----== Client Job Information Section Start ==----->
        
                      <div class="cp-info-container">
                         <div class="cp-info-box">
                            <p class="cp--jbh">Location</p>
                            <p class="cp-jt">

                                @foreach ($countries as $country)
                                @if($country->id == auth()->user()->country_id)
                                    {{$country->name}}
                                @endif
                                @endforeach

                                
                              
                            </p>
                         </div>
                         <div class="cp-info-box">
                            <p class="cp--jbh">City</p>
                            <p class="cp-jt">
                                @foreach ($cities as $city)
                                @if($city->id == $basicProfile->city_id)
                                    {{$city->name}}
                                @endif
                                @endforeach
                            </p>
                         </div>
        
                         <div class="cp-info-box">
                            <p class="cp--jbh">Phone</p>
                            <p class="cp-jt">{{$basicProfile->phone_number}}</p>
                         </div>
        
        
                        
        
                      </div>


                      <div class="cp-info-container">
                        <div class="cp-info-box">
                            <p class="cp--jbh">Email</p>
                            <p class="cp-jt">{{ auth()->user()->email }}</p>
                         </div>

                        <div class="cp-info-box">
                           <p class="cp--jbh">Language</p>
                           @foreach ($user_languages_ as $language )
                              <p class="cp-jt">{{$language->iso_language_name }}</p>
                           @endforeach
                           
                        </div>
       
                        <div class="cp-info-box">
                           <p class="cp--jbh">Proficiency Level</p>
                           @foreach ($user_languages_level_ as $level )
                           <p class="cp-jt">{{$level->name }}</p>
                            @endforeach
                        </div>
       
       

       
                     </div>
        
                       <!----============End================--->
        
        
                </div>    
                <!----== Client Info Section End ==----->
        
        
                </div>
            </div>


        </div>
       

</div>

@push('script')
    <script>
        "use strict";
        

        </script>
@endpush
<style>
    
    .h-img{
        position: relative;
        width: 100px;
        border-radius: 50%;
    }
    img.rounded-c {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}
    .modal-header button.btn-close {
    background: url(/assets/images/job/x.png) !important;
    height: 40px !important;
    width: 32px !important;
    background-repeat: no-repeat !important;
    background-size: 27px !important;
    position: relative;
    background: red;
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
    .modal-backdrop {
    position: inherit;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100vw;
    height: 100vh;
    background-color: #000;
}
.modal-backdrop.show {
    opacity: .0;
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
/* .cp-profile_c_main span{
    display: none;
} */
.cp-profile_c_main {
    width: 100%;
    display: inline-block;
    border-bottom: 1px solid #CBDFDF;
    padding-bottom: 20px;
}
p.cp--jbh {
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #000000;
    margin-bottom: 10px;
}
.cp-row-con {
    width: 100%;
    display: inline-block;
    padding: 18px 0px;
    border-bottom: 1px solid #CBDFDF;
}

p.cp-jt {
    font-family: 'Mulish';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    color: #444444;
}
button.btn.btn-primary.cstm-edit {
    background: #7F007F;
    border-radius: 5px;
    width: 103px;
    height: 40px;
    position: relative;
    top: 50px;
    font-size: 14px;
}
.cp-info-box {
    width: 33%;
    float: left;
    display: inline-block;
}
.cp-info-container {
    width: 100%;
    display: inline-block;
    padding: 22px 0px;
    border-bottom: 1px solid #CBDFDF;
}
/*====Model====*/
.modal-dialog {
    max-width: 676px;
    margin: 1.75rem auto;
}
.setProfile form {
    width: 100%;
}

.modal-header h5 {
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 25px;
    color: #007F7F;
}
.modal-header {
    background: #EDEDED;
    padding: 13px 23px;
}
/* .profile-img.col-md-12, .hidepc {
    display: none;
} */
.modal-body input[type="text"] {
    background: #FFFFFF;
    border: 1px solid #CBDFDF;
    border-radius: 4px;
    height: 37px;
    font-size: 14px;
}
.modal-body {
    position: relative;
    flex: 1 1 auto;
    padding: 0px 23px;
}
.modal-body  textarea{
    height: 114px;
    font-size: 14px;
}
.modal {
    position: fixed;
    top: 2%;
}
button.btn-close {
    background: url(/assets/images/job/x.png);
    height: 40px !important;
    width: 32px;
    background-repeat: no-repeat;
    background-size: 27px !important;
    position: relative;
}
.modal-header .btn-close {
    margin-bottom: 30px;
    height: 11px !important;
    position: relative;
    top:20px;
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
    </style>