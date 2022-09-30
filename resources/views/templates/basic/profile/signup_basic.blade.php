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
                                    class=''>1</span>
                                <a data-toggle="tab" href="#profile">
                                    Basic
                                </a>
                            </li>
                            @if (in_array('Freelancer',auth()->user()->getRoleNames()->toArray()))
                                <li role="tab" class=" {{ request()->get('view') === 'step-2' ? 'active' : '' }}">
                                    <span
                                        class="">2</span>
                                    <a data-toggle="tab" href="#profile2" class="" id="basics_nex_tab">
                                        Experience
                                    </a>
                                </li>
                                <li role="tab" class="{{ request()->get('view') === 'step-3' ? 'active' : '' }}">
                                    <span
                                        class="">3</span>
                                    <a data-toggle="tab" href="#profile3" class="" id="education_tab">
                                        Education
                                    </a>
                                </li>
                                <li role="tab" class="{{ request()->get('view') === 'step-4' ? 'active' : '' }}">
                                    <span
                                        class="">4</span>
                                    <a data-toggle="tab" href="#profile4" class="" id="skills_tab" >
                                        Skills & Rate
                                    </a>
                                </li>
                            @else

                                <li role="tab" class=" {{ request()->get('view') === 'step-2' ? 'active' : '' }}">
                                    <span
                                        class="">2</span>
                                    <a data-toggle="tab" href="#profile2" class="" id="basics_nex_tab">
                                        Company
                                    </a>
                                </li>
                                <li role="tab" class="{{ request()->get('view') === 'step-3' ? 'active' : '' }}">
                                    <span
                                        class="">3</span>
                                    <a data-toggle="tab" href="#profile3" class="" id="payment_tab">
                                        Payment Methods 
                                    </a>
                                </li>


                                <li role="tab" class="{{ request()->get('view') === 'step-5' ? 'active' : '' }}">
                                    <span
                                        class="">3</span>
                                    <a data-toggle="tab" href="#profile5" class="" id="payment_tab_1">
                                        Payment test 
                                    </a>
                                </li>
                               
                                

                            @endif
                            
                           
                        </ul>
                    </div>
                    <!-- Content -->

                    <div class="col-12 col-md-8 p-0">

                        <div class="tab-content " id="content-div">
                            @csrf
                            
                            <div id="profile" role="tabpanel"
                                class="tab-pane {{ request()->get('view') === 'step-1' ? 'active' : '' }}">
                                @if (in_array(\App\Models\Role::$FreelancerName,auth()->user()->getRoleNames()->toArray()))

                                   @include($activeTemplate . 'profile.partials.user_profile')
                                @else
                                    @include($activeTemplate . 'profile.partials.client_basic')
                                @endif
                            </div>
                           
                            @if (in_array(\App\Models\Role::$FreelancerName,auth()->user()->getRoleNames()->toArray()))
                        
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

                               
                            @else
                      
                            
                                <div id="profile2" role="tabpanel"
                                    class="tab-pane {{ request()->get('view') === 'step-2' ? 'active' : '' }}">
                                    @include($activeTemplate . 'project_profile.partials.company')
                                </div>
                                <div id="profile3" role="tabpanel"

                                    class="tab-pane {{ request()->get('view') === 'step-3' ? 'active' : '' }}">
                                    @include($activeTemplate . 'project_profile.partials.payment_methods_index')

                                </div>

                                <div id="profile4" role="tabpanel"

                                    class="tab-pane {{ request()->get('view') === 'step-4' ? 'active' : '' }}">
                                    @include($activeTemplate . 'project_profile.partials.payment_methods_store')

                                </div>
                                <div id="profile5" role="tabpanel"
                                class="tab-pane {{ request()->get('view') === 'step-5' ? 'active' : '' }}">
                                @include($activeTemplate . 'profile.partials.user_test')
                            </div>

                            @endif
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('style')
    <style>
        span.select2-selection.select2-selection--multiple {
            width: 100% !important;
            padding: 10px !important;
            border: 1px solid #CBDFDF;
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
        var experienceTab=$('#basics_nex_tab');
        var educationTab=$('#education_tab');
        var skillsTab=$('#skills_tab');
        var paymentTab=$('#payment_tab');
        var paymentTab1=$('#payment_tab_1');

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
        let row_index= $('#languages_basics').val();
        let exp_row_index=$('#experience_count').val();
        let edu_row_index=$('#education_count').val();
        var user_basic_form=$('#form-basic-save');
        var user_experience_form=$('#freelancer-experience-save');
        var user_education_form=$('#freelancer-education-save');
        var user_skills_form=$('#skills_save_form');
        var user_company_form=$('#company_profile');
        var user_payment_methods_form=$('#payment_methods');
        var token= $('input[name=_token]').val();
        
        let selectedLevels = [];
        var _languages = [];
        let _languages_levels = [];
        let _countries = [];
        let _degress = [];




        $('document').ready(function() {
            
            loadProfileBasicsData();

            $('.select2').select2({
                tags: true
            });
            
            user_basic_form.submit(function (e) {
                e.preventDefault();
                e.stopPropagation(); 
                saveUserBasic();
            });

            user_experience_form.submit(function (e) {
                e.preventDefault();
                e.stopPropagation(); 
                saveUserExperience();
            });

            user_education_form.submit(function (e) {
                e.preventDefault();
                e.stopPropagation(); 
                saveUserEducation();
            });

            user_skills_form.submit(function (e) {
                e.preventDefault();
                e.stopPropagation(); 
                saveUserSkills();
            });

            user_company_form.submit(function (e) {

                e.preventDefault();
                e.stopPropagation(); 
                saveUserCompany();

            });
        

            user_payment_methods_form.submit(function (e) {

                e.preventDefault();
                e.stopPropagation(); 
                saveUserPaymentMethod();

            });

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

            $('#payment_method_country_id').on('change', function(){
                var country_id = $(this).val();
                getCountryCities(country_id);
            });
        });

        function getCountryCities(country_id)
        {
            $.ajax({
                type:"GET",
                url:"{{route('get-cities')}}",
                data: {country_id : country_id},
                success:function(data){
                    if(data.cities)
                    {    
                       
                        $('#payment_method_cities').empty();
                        $('#payment_method_cities').append(
                            `<option>Select City</option>
                            ${data.cities?.map((city) => {
                                return ` <option value="${city.id}"> ${city.name}</option>`;
                        })}`);
                    }
                    else{
                        alert("Wrong Country Id");            
                    }
                }
            }); 

        }
        function previewCompanyFile(input) {

            let file = input.files[0];
            let idxDot = file.name.lastIndexOf(".") + 1;
            let extFile = file.name.substr(idxDot, file.name.length).toLowerCase();
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function() {
                        $("#preview-img-company").attr("src", reader.result);
                        $("#preview-img-company-edit").attr("src", reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            } else {
                alert("Only jpg/jpeg, png files are allowed!");
                return false;
            }

        }

        function loadProfileBasicsData()
        {
                $.ajax({
                    type:"GET",
                    url:"{{route('profile.basics.data')}}",
                    success:function(data){
                      
                        _languages=data.languages;
                        _languages_levels=data.language_levels;
                        _countries=data.countries;
                        _degress=data.degrees;

                    }
                });  
        }

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

        function removerow(row_id)
        {
            var div_to_remove=row_id;
            $(div_to_remove).remove();
        }

        function addMoreExperiance() {
            experienceRow.append(`<hr/>
             <div id="experiance-row-`+exp_row_index+`">
               
                                            <button type="button" class="btn btn-danger float-right" onclick="removerow('#experiance-row-`+exp_row_index+`')"><i class="fa fa-trash"></i></button>
                                            <div class="col-md-12">
                                                <label class="mt-4">Job Title <span class="imp">*</span></label>
                                                <input type="text" name="experiences[`+exp_row_index+`][job_title]" placeholder="E.g. Full Stack Developer" id="experiences.`+exp_row_index+`.job_title">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Company <span class="imp">*</span></label>
                                                <input type="text" name="experiences[`+exp_row_index+`][company_name]" placeholder="E.g. Microsoft" id="experiences.`+exp_row_index+`.company_name">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Location <span class="imp">*</span></label>
                                                <select type="text" class="form-control" name="experiences[`+exp_row_index+`][country_id]" placeholder="City, Country" id="experiences.`+exp_row_index+`.country_id"/>
                                                 <option value=""  selected="">
                                                   Select Location
                                                    </option>
                                                        ${_countries?.map((country) => {
                                                            return ` <option value="${country.id}"> ${country.name}</option>`;
                                                        })}
                                                </select>
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input check" type="checkbox"
                                                                        name="experiences[`+exp_row_index+`][is_working]" id="experiences.`+exp_row_index+`.is_working"
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
                                                    <input type="date" class="date" name="experiences[`+exp_row_index+`][start_date]" onchange="setMinDateJob($(this), $('.end-date-job'))" id="experiences.`+exp_row_index+`.start_date">
                                                </div> 
                                                <div class="col-md-6">
                                                    <label for="" class="mt-4">End Date <span class="imp">*</span></label>
                                                    <input type="date" onchange="checkIfDateGreaterJob($(this))" class="end-date-job" name="experiences[`+exp_row_index+`][end_date]" id="experiences.`+exp_row_index+`.end_date">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Description <span class="imp">*</span></label>
                                                <textarea cols="10" rows="5" name="experiences[`+exp_row_index+`][description]"
                                                    placeholder="Job Description"
                                                    id="experiences.`+exp_row_index+`.description"
                                                    ></textarea>
                                            </div>
                                            
                                        </div>
                                        `);
                exp_row_index=exp_row_index+1;
            

        }

        function addEducation() {
            educationRow.append(` <div id="education-row">
                <div id="experiance-row-`+edu_row_index+`">
                                             <hr>
                                            <button type="button" class="btn btn-danger float-right" onclick="removeEducationRow($('#education-row'))"><i class="fa fa-trash"></i></button>
                                            <div class="col-md-12">
                                                <label class="mt-4">School / College / University <span class="imp">*</span></label>
                                                <input type="text" name="educations[`+edu_row_index+`][school_name]" placeholder="E.g. University Of London">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Education <span class="imp">*</span></label>
                                                <input type="text" name="educations[`+edu_row_index+`][education]" placeholder="E.g. University Of London">
                                            </div>
                                            <div class="col-md-12">

                                                <label class="mt-4">Degree <span class="imp">*</span></label>
                                                <select type="text" class="form-control" name="educations[`+edu_row_index+`][degree_id]" placeholder="City, Country" id="experiences.`+exp_row_index+`.country_id"/>
                                                 <option value=""  selected="">
                                                   Select Degree
                                                    </option>
                                                        ${_degress?.map((degree) => {
                                                         return ` <option value="${degree.id}"> ${degree.title}</option>`
                                                        })}
                                                </select>
                                            </div>
                                            <div class="col-md-12">

                                                <label class="mt-4">Field Of Study <span class="imp">*</span></label>
                                                <input type="text" name="educations[`+edu_row_index+`][field_of_study]" placeholder="Visual Arts" />
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-check-input check current-working-check" onclick="checkDate($(this), $('.end-date-job-0'))"
                        type="checkbox" name="educations[`+edu_row_index+`][is_enrolled]" /> I’m currently enroll here

                                                
                                            </div>

                                            <div class="row">
                                                <label class="mt-4">Dates Attended <span class="imp">*</span></label>

                                                <div class="col-md-6">

                                                    <label for="" class="mt-4">From Date <span class="imp">*</span></label>
                                                    <input type="date" name="educations[`+edu_row_index+`][start_date]" onchange="setMinDateInsti($(this), $('.end-date-insti'))" >
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="mt-4">To Date <span class="imp">*</span></label>
                                                    <input type="date" class="end-date-insti" name="educations[`+edu_row_index+`][start_date_job]" onchange="checkIfDateGreaterInsti($(this))" >
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mt-4">Description <span class="imp">*</span></label>
                                                <textarea cols="" rows="5" name="educations[`+edu_row_index+`][description]"
                                                    placeholder="Describe your responsibilities"></textarea>
                                            </div>
                                          
                                        </div>`)
            edu_row_index=edu_row_index+1;
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

        function displayErrorMessage(validation_errors)
        {
            $('input,select,textarea').removeClass('error-field');
            $('.select2').next().removeClass("error-field");
            for (var error in validation_errors) { 
                var error_message=validation_errors[error];

                $('[name="'+error+'"]').addClass('error-field');
                $('[id="'+error+'"]').addClass('error-field');
                $('#'+error).next().addClass('error-field');

                displayAlertMessage(error_message);

            
            }
        }
        
        function formPostProcess(nextTab)
        {

            $('input,select,textarea').removeClass('error-field');
            $('.select2').next().removeClass("error-field");
            // $('#profile','profile2','#profile3','#profile4').removeClass('active');
            nextTab.click();
            scrollTop();

        }

        function scrollTop()
        {
            $("html, body").animate({
                scrollTop: 0
            }, 500);
        }
        
        function errorMessages(errors)
        {
            $.each(errors, function(i, val) {
                notify('error', val);
            });
        }

        function saveUserSkills(){
            $.ajax({
                headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('skills.save') }}",
                method: "POST",
                data:user_skills_form.serialize(),
                type:'json',

                success: function(response) {
                
                    if (response.success) {
                        notify('success', response.success);
                        if(response.redirect_url)
                        {
                            window.location.replace(response.redirect_url);              
                        }

                    }
                    else if(response.validation_errors){
                        displayErrorMessage(response.validation_errors);
                      }
                     else {
                        
                        console.log(response.errors);
                        errorMessages(response.errors);
                    }
                }
            });
        }

        function saveUserBasic() {
            var profile_file=$('input[type=file]')[0].files[0];
            let form_data = new FormData(user_basic_form[0]);
            form_data.append('profile_picture', profile_file);
            // var form_data = user_basic_form.serialize();
            console.log(form_data);
            $.ajax({
                  type:"POST",
                  url:"{{route('profile.basics.save')}}",
                  data: form_data,
                  processData: false,
                contentType: false,
                  success:function(response){

                      if(response.success){
                        notify('success', response.success);
                        formPostProcess(experienceTab);
                      }
                      else if(response.validation_errors){
                        displayErrorMessage(response.validation_errors);
                      }
                      else{
                        errorMessages(response.errors);
                      }

                  }
              });
             
        }

        function saveUserPaymentMethod()
        {
            let form_data = new FormData(user_payment_methods_form[0]);
           
            $.ajax({
                  type:"POST",
                  url:"{{route('profile.save.payment.methods')}}",
                  data: form_data,
                  processData: false,
                  contentType: false,
                  success:function(response){

                      if(response.success){
                        notify('success', response.success);
                        formPostProcess(paymentTab);
                          if(response.redirect_url)
                          {
                              window.location.replace(response.redirect_url);
                          }
                      }
                      else if(response.validation_errors){
                        displayErrorMessage(response.validation_errors);
                      }
                      else{
                        errorMessages(response.errors);
                      }

                  }
              });
        }

        function saveUserCompany()
        {
            var profile_file=$('input[type=file]')[0].files[0];
            let form_data = new FormData(user_company_form[0]);
            form_data.append('company_logo', profile_file);
           
            $.ajax({
                  type:"POST",
                  url:"{{route('profile.save.company')}}",
                  data: form_data,
                  processData: false,
                contentType: false,
                  success:function(response){

                      if(response.success){
                        notify('success', response.success);
                        formPostProcess(paymentTab);
                      }
                      else if(response.validation_errors){
                        displayErrorMessage(response.validation_errors);
                      }
                      else{
                        errorMessages(response.errors);
                      }

                  }
              });
        }

        function saveUserExperience()
        {
            
            $.ajax({
                headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('profile.experience.save') }}",
                method: "POST",
                data:user_experience_form.serialize(),
                type:'json',

                success: function(response) {
                
                    if (response.success) {
                        notify('success', response.success);
                        formPostProcess(educationTab);

                    }
                    else if(response.validation_errors){
                        displayErrorMessage(response.validation_errors);
                      }
                     else {
                        
                        console.log(response.errors);
                        errorMessages(response.errors);
                    }
                }
            });

        }

        function saveUserEducation()
        {
         
            $.ajax({
                headers: {
                    
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('education.save') }}",
                method: "POST",
                data:user_education_form.serialize(),
                type:'json',

                success: function(response) {
                    
             
                    if (response.success) {
                        
                        notify('success', response.success);
                        formPostProcess(skillsTab);

                    }
                    
                    else if(response.validation_errors){
                        displayErrorMessage(response.validation_errors);
                      }
                     else {
                        
                        console.log(response.errors);
                        errorMessages(response.errors);
                    }
                   
                }
            });

        }

        function displayAlertMessage(message)
        {
            iziToast.error({
            message: message,
            position: "topRight",
            });
        }

        function displayAlertSuccessMessage(message)
        {
            iziToast.success({
            message: message,
            position: "topRight",
            });
        }
       
        function addMoreLanguages() 
        {
                languageRow.append(`
                                    <div id="moreLanguage-row-`+row_index+`">
                                                
                                        <div class="row" >
                                            <div class="col-md-6 col-sm-10">
                                                <label class="mt-4">Language <span class="imp">*</span></label>
                                                <select name="languages[`+row_index+`][language_id]" class="form-control select-lang py-2" id="languages.`+row_index+`.language_id">
                                                    <option value=""  selected="">
                                                    Spoken Language(s)
                                                    </option>
                                                ${_languages?.map((language) => {
                                                    return ` <option value="${language.id}"> ${language.iso_language_name}</option>`;
                                                })}
                                                </select>
                                            </div>
                                            <div class="col-md-5 col-sm-10">
                                                <label class="mt-4">Profeciency Level <span class="imp">*</span></label>
                                                <select name="languages[`+row_index+`][language_level_id]" class="form-control select-lang" id="languages.`+row_index+`.language_level_id" >
                                                    <option value=""   selected="">
                                                                            My Level is
                                                                            </option>
                                                    ${_languages_levels?.map((level) => {
                                                    return ` <option value="${level.id}"> ${level.name}</option>`;
                                                    })}
                                                </select>
                                            </div>
                                            <div class="col-md-1" style="margin-top:20px">
                                                <button type="button" class="btn btn-danger btn-delete col-md-1 mt-5" onclick="removerow('#moreLanguage-row-`+row_index  +`')"><i class="fa fa-trash"></i></button>

                                            </div>
                                        </div>
                                    </div>`                  
                                 );
            row_index=row_index+1;

        }
       
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
    <script src="{{ asset('/assets/resources/js/user/profile.js') }}"></script>
@endpush

