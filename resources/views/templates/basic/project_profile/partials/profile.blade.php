<div class="setProfile" id="basic-profile">
    <form action="{{ route('user.profile.save') }}" method="POST" id="form-basic-save"  enctype="multipart/form-data">
        @csrf
        <div class="container-fluid welcome-body">
            <h1 class="mb-4">Welcome {{ \App\Models\User::getAuthName() }}</h1>
            <span class="cmnt pb-4">
                Complete your profile to join our global community of freelancers and start
                selling
                your
                service
                to growing network of businesses.</span>
            <div>

                <label class="mt-4">Profile Picture <span class="imp">*</span></label>
                <div class="profile-img col-md-12" action="">
                    <input type="file" name="image" id="img-upload" accept="image/png, image/gif, image/jpeg"
                        class="imgInp" onchange="previewFile(this)"
                        title="{{ !empty(auth()->user()->image) ? auth()->user()->image : '' }}" />

                    <img width="100" height="100" id="preview-img"
                        src="{{ getImage('assets/images/default.png') }}" />
                    @if (auth()->user()->image)
                        <img width="100" height="100" id="preview-img-edit"
                            src="{{ asset('assets/images/user/profile') . '/' . auth()->user()->image }}" />
                    @endif

                </div>
                <div class="col-md-12">
                    <p style="font-size: 12px">Drop file here or Browse to add</p>
                </div>
                <div class="col-md-12">
                    <label class="mt-4">Job Title <span class="imp">*</span></label>
                    <input type="text" name="designation" placeholder="E.g. Full Stack Developer"
                        value="{{ auth()->user()->designation ?? '' }}" >
                </div>
                <div class="col-md-12">
                    <label class="mt-4">About You <span class="imp">*</span></label>
                    <textarea  cols="20" rows="5" name="about_me"
                        placeholder="Describe yourself to clients">{{ auth()->user()->about_me ?? '' }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="mt-4">Location <span class="imp">*</span></label>
                    <input type="text" name="location" value="{{ auth()->user()->address->address ?? '' }}"
                        placeholder="City, Country"  />
                </div>
                <div class="col-md-12">
                    <label class="mt-4">Phone</label>
                    <input type="number" step="any" name="mobile" placeholder="" value="{{ auth()->user()->mobile ?? '' }}"
                         />
                </div>
                <div class="language-container row" id="language-row" style="justify-content: space-between !important">
                    @forelse(auth()->user()->languages as $langKey => $language)
                        <div class="row" id="language-row-{{ $langKey }}" style="align-items: center;">

                            <div class="col-md-6 col-sm-10">
                                <label class="mt-4">Language <span class="imp">*</span></label>
                                <select name="languages[]" class="form-control select-lang" id="" >
                                    <option value="" selected>
                                        Spoken Language(s)
                                    </option>
                                    @foreach ($languages as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $language->language_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-5 col-sm-10">
                                <label class="mt-4">Proficiency Level <span
                                        class="imp">*</span></label>
                                <select name="language_level[]" class="form-control selected-level select-lang"
                                    id="langLevel" >
                                    <option value="" selected>
                                        My Level is
                                    </option>
                                    @foreach ($languageLevels as $level)
                                        <option value="{{ $level->id }}"
                                            {{ $language->level_id == $level->id ? 'selected' : '' }}>
                                            {{ $level->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($langKey != 0)
                                <button type="button" class="btn btn-danger btn-delete col-md-1 mt-5"
                                    onclick="removeLanguageRow($('#language-row-{{ $langKey }}'))">
                                    <i class="fa fa-trash"></i></button>
                            @endif
                        </div>
                    @empty
                        <div class="col-md-6 col-sm-12">
                            <label class="mt-4">Language <span class="imp">*</span></label>
                            <select name="languages[]" class="form-control select-lang" id="" >
                                <option value="" selected>
                                    Spoken Language(s)
                                </option>
                                @foreach ($languages as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="mt-4">Profeciency Level<span
                                    class="imp">*</span></label>
                            <select name="language_level[]" class="form-control selected-level select-lang" id=""
                                >
                                <option value="" selected>
                                    My Level is
                                </option>
                                @foreach ($languageLevels as $level)
                                    <option value="{{ $level->id }}">
                                        {{ $level->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforelse
                </div>

                <button type="button" class="my-2" id="add-language" onclick="addMoreLanguages()">Add another
                </button>
            </div>
        </div>

        <div class="setProfile">
            <div class="col-md-12">
                <button type="submit" class="btn btn-continue m-0 btn-secondary ">
                    Continue
                </button>
            </div>
        </div>
    </form>
</div>
