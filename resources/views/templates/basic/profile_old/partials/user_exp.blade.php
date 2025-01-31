<div class="setProfile" id="user-exp">
    <form action="{{ route('user.profile.save.experience') }}" method="POST" id="form-experience-save" class="form-experience-save">
        @csrf
        <div class="container-fluid welcome-body px-5" id="">
            <h1 class="mb-4">Experience</h1>
            <span class="cmnt pb-4">
                Complete your profile to join our global community of freelancers and start
                selling
                your
                service
                to growing network of businesses.</span>
            <div>

                <div id="experiance-container">
                    @forelse(auth()->user()->experiences as $key => $exp)
                        @if (($key + 1) % 2 == 0)
                            <hr>
                        @endif
                        <div id="experiance-row-{{ $key }}">
                            @if ($key != 0)
                                <button type="button" class="btn btn-danger float-right"
                                    onclick="removeExperianceRow($('#experiance-row-{{ $key }}'))">
                                    <i class="fa fa-trash"></i></button>
                            @endif
                            <div class="col-md-12">
                                <label class="mt-4">Job Title <span class="imp">*</span></label>
                                <input type="text" name="job_title[]" id="ex_title" placeholder="E.g. Full Stack Developer"
                                    value="{{ $exp->title ?? '-' }}" >
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Company <span class="imp">*</span></label>
                                <input type="text" name="company[]" id="ex_company" value="{{ $exp->company }}"
                                    placeholder="E.g. Microsoft" >
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Location <span class="imp">*</span></label>
                                <input type="text" name="job_location[]" id="ex_location" value="{{ $exp->location }}"
                                    placeholder="City, Country"  />
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input check" type="checkbox"
                                        onclick="checkDate($(this), $('.end-date-job-{{ $exp->id }}'))"
                                        name="isCurrent[]" id="flexCheckDefault_12"
                                        {{ $exp->isCurrent == 1 ? 'checked' : '' }} />
                                    <label class="form-check-label px-2" for="flexCheckDefault">I’m currently working here</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="mt-4">Start Date
                                        <span class="imp">*</span></label>

                                    <input type="date" id="start_date" name="start_date_job[]" class=""
                                        onchange="setMinDateJob($(this), $('.end-date-job-{{ $exp->id }}'))"
                                        value="{{ Carbon\Carbon::parse($exp->start)->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="mt-4">End Date
                                        <span class="imp">*</span></label>
                                    <input type="date" name="end_date_job[]" id="end_date"
                                        class="checkedDate end-date-job-{{ $exp->id }}"
                                        onchange="checkIfDateGreaterJob($(this))"
                                        min="{{ $exp->isCurrent == 1 ? '' : Carbon\Carbon::parse($exp->end)->format('Y-m-d') }}"
                                        {{ $exp->isCurrent == 1 ? 'disabled' : '' }}
                                        value="{{ $exp->isCurrent == 1 ? '' : Carbon\Carbon::parse($exp->end)->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Description <span class="imp">*</span></label>
                                <textarea cols="10" rows="5" name="job_description[]" id="ex_description" placeholder="Describe your responsibilities "
                                    >{{ $exp->description }}</textarea>
                            </div>
                        </div>
                    @empty
                        <div data-cycle="1" class="experience-container">
                            <div class="col-md-12 ">
                                <label class="mt-4">Job Title <span class="imp">*</span></label>
                                <input type="text" name="job_title[]" id="ex_title" placeholder="E.g. Full Stack Developer" >
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Company <span class="imp">*</span></label>
                                <input type="text" name="company[]" id="ex_company" placeholder="E.g. Microsoft" >
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Location <span class="imp">*</span></label>
                                <input type="text" name="job_location[]" id="ex_location" placeholder="City, Country"  />
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input check current-working-check"
                                        onclick="checkDate($(this), $('.end-date-job-0'))" type="checkbox"
                                        name="isCurrent[]" id="flexCheckDefault" />
                                    <label class="form-check-label " for="flexCheckDefault">I’m currently working here</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="mt-4">Start Date <span
                                            class="imp">*</span></label>
                                    <input type="date" name="start_date_job[]" id="start_date"
                                        onchange="setMinDateJob($(this), $('.end-date-job-0'))">
                                </div>
                                <div class="col-md-6 date-picker-container">
                                    <label for="" class="mt-4">End Date <span
                                            class="imp">*</span></label>
                                    <input class="end-date-job-0" id="end-date-job"
                                        onchange="checkIfDateGreaterJob($(this))" type="date" name="end_date_job[]">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mt-4">Description <span class="imp">*</span></label>
                                <textarea cols="10" rows="5" name="job_description[]" placeholder="Job Description" id="ex_description"></textarea>
                            </div>
                        </div>
                    @endforelse
                    {{-- <hr/> --}}

                </div>
                <button type="button" class="my-2" onclick="addMoreExperiance()">Add
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
