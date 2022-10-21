<div class="setProfile" id="user-skills">
    <form action="{{ route('user.profile.save.skills') }}" method="POST" class="user-skills-form">
        @csrf
        <div class="container-fluid welcome-body px-5">
            <h1 class="mb-4">Expertise & Skills</h1>
            <span class="cmnt pb-4">
                Complete your profile to join our global community of freelancers and start
                selling
                your
                service
                to growing network of businesses.</span>
            <div>
                <div class="row mt-3" id="skill-row">

                    <div class="col-xl-6 col-md-12 col-lg-6 form-group select2Tag mb-4">
                        <label>@lang('Your Skills ')<span class="imp">*</span></label>
                        <select class="form-control select2" name="skills[]" id="skills" multiple="multiple">
                            {{-- preventing n+1 query --}}
                            @forelse ($user->skills as $s)
                                <option value="{{ $s->skill->name }}" selected="true">
                                    {{ __($s->skill->name) }}</option>
                            @empty
                            @endforelse
                        </select>
                       
                        <small>@lang('Type Skills and Enter press')</small>
                        <p id="skills_error"></p>
                    </div>
                    <div class="col-xl-12 col-md-12 col-lg-12 form-group add-skills">
                        <br />
                        <h5>Suggested Skills</h5>

                        <ul class="" id="">
                            <li class="suggest-skill" title="">ui design <button type="button" @forelse($user->skills as $s) {{ $s->skill->name == 'ui design' ? 'disabled' : '' }} @empty @endforelse id="btn-skill" onclick="addSkills('ui design', $('#btn-skill'))"> + </button></li>
                            <li class="suggest-skill" title="">research <button type="button" @forelse($user->skills as $s) {{ $s->skill->name == 'research' || $s->skill->name == 'Research' ? 'disabled' : '' }} @empty @endforelse id="btn-skill-research" onclick="addSkills('research', $('#btn-skill-research'))"> + </button></li>
                        </ul>
                        <br />
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
