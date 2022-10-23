<div class="setProfile" id="user-rate">
    <form action="{{ route('user.profile.save.rates') }}" method="POST" class="user-rate-form">
        @csrf
        <div class="container-fluid welcome-body px-5">
            <h1 class="mb-4">Rates</h1>
            <div>
                <div class="row mt-3" id="rate-row">

                    <div class="col-xl-12 col-md-12 col-lg-12 form-group select2Tag">
                        <p class="mb-3">Client will see this rate on your profile and in search results
                            once you publish your profile. You can adjust your rate every
                            time you submit a proposal.</p>
                        <hr>
                        <label class="mt-4">Hourly Rate <span class="imp">*</span></label>
                        <input type="number" name="rates" class="field-rate col-md-6" step="any" placeholder="$" min="0" id="rate"
                            value="{{ old('rates', @$user->rate->rates) }}" id="">
                        <div class="mt-4">
                            <h4>DureForce Service Fee</h4>
                            <p>The DureForce Service Fee is {{ floatval(@$general->charge) }}% when you begin a
                                contract with a
                                new
                                client.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="setProfile p-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-continue m-0 btn-secondary ">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
