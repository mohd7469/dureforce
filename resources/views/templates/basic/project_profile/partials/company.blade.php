<style>
    .img-box {
        margin-top: 4px;
        width: 100px;
        height: 100px;
    }

</style>
<div class="setProfile" id="">
    <form action="{{ route('user.profile.save.company') }}" method="POST" id="" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid welcome-body" id="">
            <h1 class="mb-4">Company</h1>
            <span class="cmnt pb-4">Complete your profile to search from thousands of skilled freelancers and
                request proposals.</span>
            <div>
                <div id="company-container">

                    <div id="">
                        <div class="col-md-12">
                            <label class="mt-4">Company Name <span class="imp">*</span></label>
                            <input type="text" name="name" id="company-name" value="{{ old('name', @$user->company->name) }}"
                                placeholder="E.g. Microsoft" value="" required>
                        </div>
                        <div class="col-md-12">


                            <label class="mt-4">Company Logo<span class="imp">*</span></label>
                            <div class="profile-img">
                                <input type="file" name="company_logo" id="img-upload"
                                    accept="image/png, image/gif, image/jpeg" class="imgInp"
                                    onchange="previewCompanyFile(this)"/>
                                <img width="100" height="100" id="preview-img-company"
                                    src="{{ getImage('assets/images/default.png') }}" />
                                @if (!empty(@$user->company->logo))
                                    <img class="img-box"
                                        id="preview-img-company-edit"
                                        src="{{ asset('assets/images/user/profile') . '/' . $user->company->logo }}"
                                        alt="">
                                @endif
                            </div>
                            {{-- <label for="company-logo" class="company-logo-label">
                                 Drag or Drop to Upload<br />
                                <span>Browse</span>
                                </label> --}}
                        </div>
                        <div class="col-md-12">
                            <label class="mt-4">Company Phone <span class="imp">*</span></label>
                            <input type="number" name="phone" value="{{ old('name', @$user->company->phone) }}" value=""
                                placeholder="" required />
                        </div>
                        <div class="col-md-12">
                            <label class="mt-4">Company Email Address <span
                                    class="imp">*</span></label>
                            <input type="text" name="email" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b" value="{{ old('name', @$user->company->email) }}"
                                placeholder="" required />
                            <div class="col-md-12">
                                <label class="mt-4">Location <span class="imp">*</span></label>
                                <input type="text" id="company-location" name="location"
                                    value="{{ old('name', @$user->company->location) }}" placeholder="City, Country"
                                    required />
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Company VAT <span class="imp">*</span></label>
                                <input type="text" id="company-vat" value="{{ old('name', @$user->company->vat) }}" name="vat"
                                    placeholder="" required />
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Company Website <span
                                        class="imp">*</span></label>
                                <input type="text" id="company-website" value="{{ old('name', @$user->company->url) }}" name="url"
                                    placeholder="website" required />
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">LinkdIn URL <span class="imp">*</span></label>
                                <input type="text" id="linkedin-website" name="linkedin_url"
                                    value="{{ old('name', @$user->company->linkedin_url) }}" placeholder=""
                                    required />
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Facebook URL <span class="imp">*</span></label>
                                <input type="text" id="facebook-website" name="facebook_url"
                                    value="{{ old('name', @$user->company->facebook_url) }}" placeholder=""
                                    required />
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
