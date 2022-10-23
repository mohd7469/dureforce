<style>
    .img-box {
        margin-top: 4px;
        width: 100px;
        height: 100px;
    }

</style>
<div class="setProfile" id="">
    <form action="{{ route('buyer.profile.save.company') }}" method="POST" id="company_profile" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid welcome-body" id="">
            <h1 class="mb-4">Company</h1>
            <span class="cmnt pb-4">Complete your profile to search from thousands of skilled freelancers and
                request proposals.</span>
            <div>
                <div id="company-container">

                    <div id="">
                        <div class="col-md-12">
                            <label class="mt-4">Company Name  </label>
                            <input type="text" name="name" id="company-name" value="{{ old('name', @$user->company->name) }}"
                                placeholder="E.g. Microsoft" value="">
                        </div>
                        <div class="col-md-12">


                            <label class="mt-4">Company Logo </label>
                            <div class="profile-img">
                                <input type="file" name="company_logo" id="img-upload"
                                    accept="image/png, image/gif, image/jpeg" class="imgInp"
                                    onchange="previewCompanyFile(this)"/>
                                    <img class="card-img-top image-ui" width="100" height="100" id="preview-img-company" src="{{ !empty($user->company->logo)? $user->company->logo: getImage('assets/images/default.png') }}" alt="">
                            </div>
                          
                        </div>
                        <div class="col-md-12">
                            <label class="mt-4">Company Phone*  </label>
                            <input type="number" step="any" name="phone" value="{{ old('name', @$user->company->number) }}" value=""
                                placeholder=""  />
                        </div>
                        <div class="col-md-12">
                            
                            <div class="col-md-12">
                                <label class="mt-4">Company Email Address* </label>
                                <input type="text" name="email"  value="{{ old('name', @$user->company->email) }}"placeholder="" />
                            </div>
                            <div class="col-md-12">
                                
                                <label class="mt-4">Location  </label>
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

                            <div class="col-md-12">
                                <label class="mt-4">Company VAT*  </label>
                                <input type="text" id="company-vat" value="{{ old('name', @$user->company->vat) }}" name="vat"
                                    placeholder=""  />
                            </div>

                            <div class="col-md-12">
                                <label class="mt-4">Company Website </label>
                                <input type="text" id="company-website" value="{{ old('name', @$user->company->website) }}" name="url"
                                    placeholder="website"  />
                            </div>

                            <div class="col-md-12">
                                <label class="mt-4">LinkdIn URL  </label>
                                <input type="text" id="linkedin-website" name="linkedin_url"
                                    value="{{ old('name', @$user->company->linked_url) }}" placeholder=""
                                     />
                            </div>

                            <div class="col-md-12">
                                <label class="mt-4">Facebook URL  </label>
                                <input type="text" id="facebook-website" name="facebook_url"
                                    value="{{ old('name', @$user->company->facebook_url) }}" placeholder=""
                                     />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class=" mt-3 p-0">
                <div class="col-md-6">
                    <button type="submit" class="m-0 my-2 btn btn-continue btn-secondary ">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
