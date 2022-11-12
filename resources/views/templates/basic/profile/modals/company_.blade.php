<div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Edit Company Details</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <form action="{{ route('buyer.basic.profile.save.company') }}" method="POST" id="company_profile" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid welcome-body" id="">
                   
                    <span class="cmnt pb-4" style="display:none">Complete your profile to search from thousands of skilled freelancers and
                        request proposals.</span>
                    <div>
                        <div id="company-container" class="company-c-style">

                            <div id="">
                                {{-- <div class="col-md-12">
                                    <label class="mt-4">Company Logo </label>
                                    <div class="profile-img">
                                        <input type="file" name="company_logo" id="img-upload"p
                                            accept="image/png, image/gif, image/jpeg" class="imgInp"
                                            onchange="previewCompanyFile(this)"/>
                                            <img class="card-img-top image-ui" width="100" height="100" id="preview-img-company" src="{{ !empty($user->company->logo)? $user->company->logo: getImage('assets/images/default.png') }}" alt="">
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <label class="mt-4">Name *  </label>
                                    <input type="text" name="name" id="company-name" value="{{ old('name', @$user->company->name) }}"
                                        placeholder="Tidal Wave Inc." value="">
                                </div>
                                <div class="row">
                                    
                                <div class="col-md-6">
                                    <label class="mt-4">Phone</label>
                                    <input type="number" name="phone" value="{{ old('number', @$user->company->number) }}"
                                        placeholder="3948203"  />
                                </div>

                                <div class="col-md-6">
                                    <label class="mt-4">Email * </label>
                                    <input type="text" name="email" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b" value="{{ old('name', @$user->company->email) }}"placeholder="martincollins12@gmail.com" />
                                </div>
                                </div>
                                 <div class="row">
                                <div class="col-md-6">
                                        
                                    <label class="mt-4">Location *  </label>
                                    <select
                                        name="country_id"
                                        class="form-control select-lang"
                                        id="country_id"
                                        >
                                        <option
                                            value=""
                                        >
                                            Select Country

                                        </option>

                                        @foreach ($countries as $country)
                                            <option
                                            value="{{$country->id}}"
                                            {{ $country->id == @$user->company->country_id ? 'selected' : '' }}
                                            >
                                            {{$country->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                    
                                </div>
                               
                                <div class="col-md-6">
                                    <label class="mt-4">VAT ID </label>
                                    <input type="text" id="company-vat" value="{{ old('name', @$user->company->vat) }}" name="vat"
                                        placeholder="3948203"  />
                                </div>

                                 </div>
                                <div class="row">
                               

                                    <div class="col-md-6">
                                        <label class="mt-4">Website </label>
                                        <input type="text" id="company-website" value="{{ old('name', @$user->company->website) }}" name="url"
                                            placeholder="www.google.com"  />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mt-4">LinkdIn URL  </label>
                                        <input type="text" id="linkedin-website" name="linkedin_url"
                                            value="{{ old('name', @$user->company->linked_url) }}" placeholder=""
                                            />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mt-4">Facebook URL  </label>
                                        <input type="text" id="facebook-website" name="facebook_url"
                                            value="{{ old('name', @$user->company->facebook_url) }}" placeholder=""
                                            />
                                    </div>
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class=" mt-3 p-0" style="display:none;">
                        <div class="col-md-6">
                            <button type="submit" class="m-0 my-2 btn btn-continue btn-secondary ">
                                Continue
                            </button>
                        </div>
                    </div> --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary c-canel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-continue btn-secondary">Save</button>
                     </div>
                </div>
            </form>
        </div>

     </div>
  </div>
</div>
<style>
     .modal-header .btn-close {
        margin-bottom: 0px !important;
    }
    .modal-dialog{
       max-width:600px !important;
    }
    .setProfile .profile-img img{
       width:100px;
       height:100px;
       margin:0px !important;
    }
    .mt-4 {
    margin-top: 1rem!important;
    float:left;
}
.modal-body {
    max-height:100% !important;
    }
    .setProfile .profile-img{
       height:105px;
    }
    .setProfile .profile-img {
    height: 105px;
    position: relative;
    left: 120px;
}
</style>