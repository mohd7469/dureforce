@extends($activeTemplate.'layouts.frontend')
@section('content')
    <style>
        .btn-delete {
            width: auto;
            height: fit-content;
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        .completed-span {
            background: green !important;
            color: white !important
        }

        .select2Tag input {
            background-color: transparent !important;
            padding: 0 !important;
        }

        span.select2-selection.select2-selection--multiple {
            width: 25em;
        }

        label {
            display: flex;
        }

        .imp {
            color: #000;
            font-size: 18px;
            margin-left: 3px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

    </style>
    {{-- <script>
          function profileImgStyling() {
            $('form .imgInp').css({"left":"0","top":"0","z-index":"11","width":"127px","margin-top":"5px","height":"130px","border-radius":"50px"});
            $('form .profile-img').css({"background-color": "transparent"})
}</script> --}}
    @php
    $content = getContent('breadcrumbs.content', true);

    @endphp
    <section class="account-section bg-overlay-white bg_img">
        <div class="container">
            <div id="viewport">
                <div class="row justify-content-center">
                    <!-- Sidebar -->
                    <div class="side-nav col-12 col-md-4" id="sidebar">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="tab" class="{{ request()->get('view') === 'step-1' ? 'active' : '' }}">
                                <span
                                    class='{{ auth()->user()->getLanguagesMoreThanOneCount()
                                        ? 'completed-span'
                                        : '' }}'>1</span>
                                <a data-toggle="tab" href="#profile">
                                    Basic
                                </a>
                            </li>
                            <li role="tab" class="underline {{ request()->get('view') === 'step-2' ? 'active' : '' }}">
                                <span
                                    class="{{ auth()->user()->getExperienceMoreThanOneCount()
                                        ? 'completed-span'
                                        : '' }}">2</span>
                                <a data-toggle="tab" href="#profile2" class="">
                                    Experience
                                </a>
                            </li>
                            <li role="tab" class="{{ request()->get('view') === 'step-3' ? 'active' : '' }}">
                                <span
                                    class="{{ auth()->user()->getEduationMoreThanOneCount()? 'completed-span': '' }}">3</span>
                                <a data-toggle="tab" href="#profile3" class="">
                                    Education
                                </a>
                            </li>
                            <li role="tab" class="underline {{ request()->get('view') === 'step-4' ? 'active' : '' }}">
                                <span
                                    class="{{ auth()->user()->getSkillsMoreThanOneCount()? 'completed-span': '' }}">4</span>
                                <a data-toggle="tab" href="#profile4" class="">
                                    Expertise & Skills
                                </a>
                            </li>
                            <li role="tab" class="{{ request()->get('view') === 'step-5' ? 'active' : '' }}">
                                <span
                                    class="{{ auth()->user()->getRateMoreThanOneCount()? 'completed-span': '' }}">5</span>
                                <a data-toggle="tab" href="#profile5" class="">
                                    Rates
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Content -->

                    <div class="col-12 col-md-8 p-0">

                        <div class="tab-content ">
                            @csrf
                            <div id="profile" role="tabpanel"
                                class="tab-pane {{ request()->get('view') === 'step-1' ? 'active' : '' }}">
                                @include($activeTemplate . 'profile.partials.user_profile')
                            </div>

                            <div id="profile2" role="tabpanel"
                                class="tab-pane {{ request()->get('view') === 'step-2' ? 'active' : '' }}">
                                @include($activeTemplate . 'profile.partials.user_exp')
                            </div>
                            <div id="profile3" role="tabpanel"
                                class="tab-pane {{ request()->get('view') === 'step-3' ? 'active' : '' }}">
                                @include($activeTemplate . 'profile.partials.user_education')
                            </div>

                            <div id="profile4" role="tabpanel"
                                class="tab-pane {{ request()->get('view') === 'step-4' ? 'active' : '' }}">
                                @include($activeTemplate . 'profile.partials.user_skills')
                            </div>
                            <div id="profile5" role="tabpanel"
                                class="tab-pane {{ request()->get('view') === 'step-5' ? 'active' : '' }}">
                                @include($activeTemplate . 'profile.partials.user_rates')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('style')
    <style>
        .select2Tag input {
            background-color: transparent !important;
            padding: 0 !important;
        }

    </style>
@endpush
@push('style-lib')
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'frontend/css/select2.min.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset($activeTemplateTrue . 'frontend/js/select2.min.js') }}"></script>
@endpush
@push('script')
    <script>
        "use strict";
        var languageRow = $('#language-row');
        var skillRow = $("#skill-row");
        var experienceRow = $('#experiance-container');
        var educationRow = $('#education-container');
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;
        let imgInp = $('.imgInp');
        let previewImg = $('#preview-img');
        let date = $('.checkedDate')
        let startDate = $('input[name="start_date_job[]"]');
        let startDateInsti = $('input[name="start_date_institute[]"]');
        let selectedLevels = [];


        $('document').ready(function() {
            if (previewImg.length > 0) {
                previewImg.siblings('p').hide();
                imgInp.addClass('imgInp-after');
                $('form .profile-img').css({
                    "background-color": "transparent"
                })

            } else {
                previewImg.siblings('p').show();
                imgInp.removeClass('imgInp-after');
                $('form .profile-img').css({
                    "background-color": "#fff"
                })
            }
        });

        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });

        })

        function checkDate(parent, element) {
            if (parent.is(':checked')) {
                element.val("DD/MM/YYYY");
                element.attr("disabled", true);
            }
            if (!parent.is(':checked')) {
                element.removeAttr("disabled");
            }

        }

        function setMinDateJob(parent, element) {
            element.attr('min', parent.val());
        }

        function setMinDateInsti(parent, element) {
            element.attr('min', parent.val());
        }

        function checkIfDateGreaterJob(endDate) {
            let startDateInTime = new Date(startDate.val()).getTime();
            let endDateInTime = new Date(endDate.val()).getTime();

            if (startDateInTime > endDateInTime) {
                alert('You cannot select date less than starting date')
                endDate.val("");
            }
        }

        function checkIfDateGreaterInsti(endDate) {

            let startDateInTime = new Date(startDateInsti.val()).getTime();
            let endDateInTime = new Date(endDate.val()).getTime();

            if (startDateInTime > endDateInTime) {
                alert('You cannot select date less than starting date')
                endDate.val("");
            }
        }

        function previewFile(input) {
            let file = $("input[type=file]").get(0).files[0];
            let idxDot = file.name.lastIndexOf(".") + 1;
            let extFile = file.name.substr(idxDot, file.name.length).toLowerCase();
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function() {
                        $("#preview-img").attr("src", reader.result);
                        $("#preview-img-edit").attr("src", reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            } else {
                alert("Only jpg/jpeg, png files are allowed!");
                return false;
            }

        }


        function addMoreExperiance() {
            experienceRow.append(`
             <div id="experiance-row">
               
                                            <button type="button" class="btn btn-danger float-right" onclick="removeExperianceRow($('#experiance-row'))"><i class="fa fa-trash"></i></button>
                                            <div class="col-md-12">
                                                <label class="mt-4">Job Title <span class="imp">*</span></label>
                                                <input type="text" name="job_title[]" placeholder="E.g. Full Stack Developer">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Company <span class="imp">*</span></label>
                                                <input type="text" name="company[]" placeholder="E.g. Microsoft">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Location <span class="imp">*</span></label>
                                                <input type="text" name="job_location[]" placeholder="City, Country" />
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check" type="checkbox"
                                                                        name="isCurrent[]" id="flexCheckDefault"
                                                                        onclick="checkDate($(this), $('.end-date-job'))"
                                                                      />
                                                                    <label class="form-check-label px-2"
                                                                        for="flexCheckDefault">I am
                                                                        Currently Working Here</label>
                                                                </div>
                                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="mt-4">Start Date <span class="imp">*</span></label>
                                                    <input type="date" class="date" name="start_date_job[]" onchange="setMinDateJob($(this), $('.end-date-job'))" min="1900-01-01" max="2099-12-31">
                                                </div> 
                                                <div class="col-md-6">
                                                    <label for="" class="mt-4">End Date <span class="imp">*</span></label>
                                                    <input type="date" onchange="checkIfDateGreaterJob($(this))" class="end-date-job" name="end_date_job[]" min="1900-01-01" max="2099-12-31">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Description <span class="imp">*</span></label>
                                                <textarea cols="10" rows="5" name="job_description[]"
                                                    placeholder="Job Description"></textarea>
                                            </div>
                                            <hr/>
                                        </div>
                                        `);

        }

        function addEducation() {

            educationRow.append(` <div id="education-row">
                                             <hr>
                                            <button type="button" class="btn btn-danger float-right" onclick="removeEducationRow($('#education-row'))"><i class="fa fa-trash"></i></button>
                                            <div class="col-md-12">
                                                <label class="mt-4">School / College / University <span class="imp">*</span></label>
                                                <input type="text" name="institute_name[]" placeholder="E.g. University Of London">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Degree <span class="imp">*</span></label>
                                                <input type="text" name="degree[]" placeholder="E.g. BA Arts">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Field Of Study <span class="imp">*</span></label>
                                                <input type="text" name="field[]" placeholder="Visual Arts" />
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Dates Attended <span class="imp">*</span></label>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="mt-4">From Date <span class="imp">*</span></label>
                                                    <input type="date" name="start_date_institute[]" onchange="setMinDateInsti($(this), $('.end-date-insti'))" min="1900-01-01" max="2099-12-31">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="mt-4">To Date <span class="imp">*</span></label>
                                                    <input type="date" class="end-date-insti" name="end_date_institute[]" onchange="checkIfDateGreaterInsti($(this))" min="1900-01-01" max="2099-12-31">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Description <span class="imp">*</span></label>
                                                <textarea cols="" rows="5" name="institute_description[]"
                                                    placeholder="Describe your responsibilities"></textarea>
                                            </div>
                                        </div>`)
        }


        function removeLanguageRow(row) {
            let is_confirm = confirm('Are you sure you want to remove this record ?');
            if (is_confirm) {
                row.remove();
            }
        }

        function removeExperianceRow(row) {
            let is_confirm = confirm('Are you sure you want to remove this record ?');
            if (is_confirm) {
                row.remove();
            }
        }

        function removeEducationRow(row) {
            let is_confirm = confirm('Are you sure you want to remove this record ?');
            if (is_confirm) {
                row.remove();
            }
        }

        function removeSkillRow(row) {
            let is_confirm = confirm('Are you sure you want to remove this record ?');
            if (is_confirm) {
                row.remove();
            }
        }

        function formBasicSave() {
            $('#form-basic-save').submit();
        }

        /**
         * Checks if value is empty. Deep-checks arrays and objects
         * Note: isEmpty([]) == true, isEmpty({}) == true, isEmpty([{0:false},"",0]) == true, isEmpty({0:1}) == false
         * @param value
         * @returns {boolean}
         */
        function isEmpty(value) {
            var isEmptyObject = function(a) {
                if (typeof a.length === 'undefined') { // it's an Object, not an Array
                    var hasNonempty = Object.keys(a).some(function nonEmpty(element) {
                        return !isEmpty(a[element]);
                    });
                    return hasNonempty ? false : isEmptyObject(Object.keys(a));
                }

                return !a.some(function nonEmpty(element) { // check if array is really not empty as JS thinks
                    return !isEmpty(element); // at least one element should be non-empty
                });
            };
            return (
                value == false ||
                typeof value === 'undefined' ||
                value == null ||
                (typeof value === 'object' && isEmptyObject(value))
            );
        }
    </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        let _languages = {!! json_encode($languages->toArray()) !!};
        let _languages_levels = {!! json_encode($languageLevels->toArray()) !!};
    </script>
    <script src="{{ asset('/assets/resources/js/user/profile.js') }}"></script>
@endpush
