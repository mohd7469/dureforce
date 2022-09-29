<div class="setProfile" id="basic-profile">
 
      

@include("templates.basic.profile.modals.client_basic_")







        <div class="container-fluid welcome-body px-5">
           

            <h1 class="mb-4">Welcome Shahzaib</h1>
            <span class="cmnt pb-4">
         Complete your profile to join our global community of freelancers and start
         selling
         your
         service
         to growing network of businesses.</span>

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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit
                        </button>
                       </div>
        
                        <!----== Client Info Section Start ==----->
        
                       <div class="cp-profile_c_main">
                           <img scr="/assets/images/profile.png" alt="Profile" class="cp-prfileimg">
                           <span>Icon</span>
                           <div class="cp-profile-h">{{$basicProfile->designation}}</div>
                       </div>
        
                       <!----============End================--->
        
        
                        <!----== Client Job Title Section Start ==----->
        
                       <div class="cp-row-con">
                           <p class="cp--jbh">Job Title</p>
                           <p class="cp-jt">Marketing Manager</p>
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
                            <p class="cp-jt">{{$basicProfile->location }}</p>
                         </div>
        
                         <div class="cp-info-box">
                            <p class="cp--jbh">Phone</p>
                            <p class="cp-jt">{{$basicProfile->phone}}</p>
                         </div>
        
        
                         <div class="cp-info-box">
                            <p class="cp--jbh">Email</p>
                            <p class="cp-jt">{{$basicProfile->email}}</p>
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


    </style>