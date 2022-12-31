<div class="setProfile" id="user-education">
    <form action="{{ route('user.profile.save.education') }}" method="POST" class="user-education-form">
        @csrf
        <div class="container-fluid welcome-body px-5">
            <h1 class="mb-4">Education</h1>
            <span class="cmnt pb-4">
                Complete your profile to join our global community of freelancers and start
                selling
                your
                service
                to growing network of businesses.</span>
            <div>
                <div id="education-container">
                    @forelse(auth()->user()->education as $key => $edu)
                        @if (($key + 1) % 2 == 0)
                            <hr>
                        @endif
                        <div id="education-row-{{ $key }}">
                            @if ($key != 0)
                                <button type="button" class="btn btn-danger float-right"
                                    onclick="removeEducationRow($('#education-row-{{ $key }}'))">
                                    <i class="fa fa-trash"></i></button>
                            @endif
                            <div class="col-md-12">
                                <label class="mt-4">School / College / University
                                    <span class="imp">*</span></label>
                                <input type="text" name="institute_name[]" id="institute_name" placeholder="E.g. University Of London"
                                    value="{{ $edu->institute_name ?? '-' }}" >
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Degree <span class="imp">*</span></label>
                                <input type="text" name="degree[]" id="degree" placeholder="E.g. BA Arts"
                                    value="{{ $edu->degree ?? '-' }}" >
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Field Of Study <span
                                        class="imp">*</span></label>
                                <input type="text" name="field[]" id="field" value="{{ $edu->field }}" placeholder="Visual Arts"
                                     />
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Dates Attended <span
                                        class="imp">*</span></label>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="mt-4">From Date
                                        <span class="imp">*</span></label>
                                    <input type="date" name="start_date_institute[]" id="from_date"
                                        onchange="setMinDateInsti($(this), $('.end-date-insti'))"
                                        value="{{ Carbon\Carbon::parse($edu->start)->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="mt-4">To Date <span
                                            class="imp">*</span></label>
                                    <input type="date" name="end_date_institute[]" class="end-date-insti"
                                        onchange="checkIfDateGreaterInsti($(this))" id="to_date"
                                        min="{{ Carbon\Carbon::parse($edu->end)->format('Y-m-d') }}"
                                        value="{{ Carbon\Carbon::parse($edu->end)->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Description <span class="imp">*</span></label>
                                <textarea cols="10" rows="5" name="institute_description[]" id="institute_description" placeholder="Add Description" >{{ $edu->description }}</textarea>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <label class="mt-4">School / College / University
                                <span class="imp">*</span></label>
                            <input type="text" name="institute_name[]" id="institute_name" placeholder="E.g. University Of London" >
                        </div>
                        <div class="col-md-12">
                            <label class="mt-4">Degree <span class="imp">*</span></label>
                            <input type="text" name="degree[]" id="degree" placeholder="E.g. BA Arts" >
                        </div>
                        <div class="col-md-12">
                            <label class="mt-4">Field Of Study <span class="imp">*</span></label>
                            <input type="text" name="field[]" id="field" placeholder="Visual Arts"  />
                        </div>
                        <div class="col-md-12">
                            <label class="mt-4">Dates Attended <span class="imp">*</span></label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="mt-4">From Date <span
                                        class="imp">*</span></label>
                                <input type="date" name="start_date_institute[]" id="from_date"
                                    onchange="setMinDateInsti($(this), $('.end-date-insti'))">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mt-4">To Date <span
                                        class="imp">*</span></label>
                                <input type="date" class="end-date-insti" name="end_date_institute[]" id="to_date"
                                    onchange="checkIfDateGreaterInsti($(this))">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mt-4">Description <span class="imp">*</span></label>
                            <textarea cols="" rows="5" name="institute_description[]" placeholder="Add Description  " id="institute_description"
                                ></textarea>
                        </div>
                    @endforelse
                </div>
                <button type="button" class="my-2" onclick="addEducation()">Add
                    another
                </button>
                {{-- <button type="submit" class="my-3">Continue</button> --}}
            </div>
        </div>
        <div class="setProfile">
            <div class="col-md-12">
                <button type="submit" class="btn btn-continue btn-secondary ">
                    Continue
                </button>
            </div>
        </div>
    </form>
</div>
