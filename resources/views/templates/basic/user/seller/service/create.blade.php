@extends($activeTemplate . 'layouts.master')
@section('content')
    <section class="all-sections">
        <div class="container-fluid">
            <div class="section-wrapper p-4">
                <div class="row justify-content-center mb-30-none">
                    @include($activeTemplate . 'partials.seller_sidebar')
                    <div class="col-xl-10 col-lg-12 px-0 mb-30">
                        <div class="dashboard-sidebar-open"><i class="las la-bars"></i> @lang('Menu')</div>

                        <div class="card custom--card create-service-main mx-0">
                            
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between pb-1">
                                @include($activeTemplate . 'user.seller.service.partials.tab')
                            </div>
                            {{-- overview --}}
                            <div class="panel panel-primary setup-content" id="step-1">
                                @include($activeTemplate . 'user.seller.service.partials.overview_step')
                            </div>
                            {{-- pricing --}}
                            <div class=" panel panel-primary setup-content" id="step-2">
                                @include($activeTemplate . 'user.seller.service.partials.pricing_step')
                            </div>
                            {{-- banner step --}}
                            <div class="panel panel-primary setup-content" id="step-3">
                                @include($activeTemplate . 'user.seller.service.partials.banner_step')
                            </div>
                            {{-- proposal --}}
                            <div class="panel panel-primary setup-content" id="step-4">
                                @include($activeTemplate . 'user.seller.service.partials.proposal_step')
                            </div>
                            {{-- requrirements --}}
                            <div class="panel panel-primary setup-content" id="step-5">
                                @include($activeTemplate . 'user.seller.service.partials.requirement_step')
                            </div>
                            {{-- review step --}}
                            <div class="panel panel-primary setup-content" id="step-6">
                                @include($activeTemplate . 'user.seller.service.partials.review_step')
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
     
     
        .card-header:first-child {
            border-radius: 1px !important;
        }
        
        .custom--card .card-header {
            background-color: #f8fafa !important;
            padding: none !important;
        }
        .card {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
        .error{
            margin-top: -20px !important;
            margin-bottom: 5px !important;
        }
        .create-service-main .service--btns {
            background-color: #f8fafa;
            border-radius: 5px;
            border: 1px solid #7f007f;
            color: #7f007f;
            width: 145px !important;
            margin-right: 16px !important;
        }
        .service-cancel-btn{
            
            height: 18px;
            left: 1009px;
            font-family: 'Mulish';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 18px;
            color: #7F007F;
            background-color: transparent;
            padding: 10px 4px;

        }
        
        .custom--card .card-body .card-form-wrapper input {
            background-color: #f9f9f9;
            border-radius: 3px;
        }

        select[name="features[]"].select-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
            padding: -2px;
            margin-top: 11px;
        }
       
        .custom_input{
            padding: 10px 15px !important;
        }
        .select2Tag input {
            background-color: transparent !important;
            padding: 0 !important;
        }

        .logo-ul {
        list-style-type: none;
        }

        .logo-li {
        display: inline-block;
        }

        input[type="checkbox"][id^="cb"] {
        display: none;
        }

        .logo-label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
        }

        .logo-label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
        }

        .logo-label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
        }

        :checked + .logo-label {
        border-color: #ddd;
        }

        :checked + .logo-label:before {
        content: "✓";
        background-color: grey;
        transform: scale(1);
        }

        :checked + .logo-label img {
        transform: scale(0.9);
        box-shadow: 0 0 5px #333;
        z-index: -1;
        }
        .custom-check-group {
            display: inline-block !important;
            margin-bottom: 12px;
        }
        .select2-container--default .select2-selection--multiple {
            background-color: white;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: text;
            padding-bottom: 0px !important;
            padding-right: 0px !important;
        }
        @media only screen and (max-width:683px){
            .text-right {
                text-align: left !important;
                display: contents !important;
            }
            .overview_back{
                width: 100px !important;
                font-size: 14px;
            }
            .create-service-main .softwar-save-draft--btns {
                background-color: #f8fafa;
                border-radius: 5px;
                border: 1px solid #7f007f;
                color: #7f007f;
                width: 100px !important;
                font-size: 11px;
            }
            .create-service-main .btn-save-continue {
                background-color: #7f007f;
                border-radius: 5px;
                border: 1px solid #7f007f;
                color: #fff;
                padding: 10px 4px;
                font-size: 9px;
                width: 101px !important;
            }

            .create-service-main .service--btns {
                background-color: #f8fafa;
                border-radius: 5px;
                border: 1px solid #7f007f;
                color: #7f007f;
                width: 100px !important;
                font-size: 9px;
                height: 32px;
                margin-right: 5px !important;
            }
            .create-service-main a.btn.btn-circle.btn-default:before {
                top: 19px;
                position: absolute;
                content: " ";
                left: 76%;
                width: 53%;
                border-bottom: 3px solid #8cc2c2;
                z-index: 0;
            }
            .create-service-main label {
                color: #000;
                display: inherit;
            }
            .create-service-main .service-step {
                color: #58a7a7;
                font-size: 10px;
                font-weight: 500;
            }
            
        }
    </style>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'frontend/css/select2.min.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset($activeTemplateTrue . 'frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'frontend/js/nicEdit.js') }}"></script>
@endpush


@push('script')
    <script>
        let route = "{{ route('user.category') }}";
    </script>
    <script src="{{ asset('public/js/create-service.js') }}"></script>
    <script>

        function fetchSubCategories(category)
        {
            $.ajax({
                type:"GET",
                url:"{{route('user.category')}}",
                data: {category : category},
                success:function(data){
                    var html = '';
                    if(data.error){
                        $("#subCategorys").empty(); 
                        html += `<option value="" selected disabled>${data.error}</option>`;
                        $(".mySubCatgry").html(html);
                    }
                    else{
                        $("#subCategorys").empty(); 
                        html += `<option value="" selected disabled>@lang('Select Sub Category')</option>`;
                        $.each(data, function(index, item) {
                            html += `<option value="${item.id}">${item.name}</option>`;
                            $(".mySubCatgry").html(html);
                        });
                    }
                }
            });  
        }

        function fetchSkills(category,sub_category='',is_change=false){
            
            $.ajax({
                type:"GET",
                url:"{{route('job.skills')}}",
                data: {category_id : category,sub_category_id:sub_category},
                success:function(data){
                    var html = '';
                    if(data.error){
                    
                    }
                    else{
                        if(is_change)
                            loadSkills(data);
                        else{
                            serviceSelectedSkills(data);
                        }
                    }
                }
            });  

        }


        const genRand = (len) => {
            return Math.random().toString(36).substring(2,len+2);
        }

        function isChecked(skill_id,selected_skills){

            if(selected_skills.includes(skill_id))
                return 'checked';
            else
                return '';
        }

        function serviceSelectedSkills(data)
        {
            var selected_skills=$('#service_skills_id').val();
            selected_skills=(selected_skills.split(','));
            selected_skills=selected_skills.map(Number);
           
            $('#form_attributes').empty();
            $('#form_attributes').append('<div style="display:inline;"<h4 class="pb-3">Job Attributes</h4><small style="display:inline"> (At least one skill is required) </small></div>');
            for (var main_category in data) { //heading main
                
                var all_sub_categories=data[main_category];
                var main_category_id=genRand(5);
            
                $('#form_attributes').append('<div class="row mt-3 mb-3" id="'+main_category_id+'"><h5>'+main_category+'</h5>');
                for (var sub_category_enum in all_sub_categories) { //front end backend 

                    var skills=all_sub_categories[sub_category_enum];
                    var sub_category_id=genRand(5);

                    $('#'+main_category_id).append('<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><div class="card custom-card  pt-3" style="padding-left: 23px;background-color:white"><div class="card-headder"><h5>'+sub_category_enum+'</h5></div><div class="" style="background-color:white"><div class="inline" id="'+sub_category_id+'">')
                    for (var skill_index in skills) {
                        
                        var skill_id=skills[skill_index].id;
                        var skill_name=skills[skill_index].name;
                        $('#'+sub_category_id).append('<div class="form-group custom-check-group px-2"> <input class="attrs-checkbox-back" type="checkbox" name="skills[]" id="'+skill_id+'" value="'+skill_id+'" '+isChecked(skill_id,selected_skills)+'> <label for="'+skill_id+'" class="services-checks value">'+skill_name+'</label> </div>');
                    }
                    
                }
                $('#'+main_category_id).append('<div/></div>');
            }
            $('#form_attributes').append('</div>');

        }

        function loadSkills(data)
        {
            
            $('#skills_heading').show();
            $('#form_attributes').empty();
            for (var main_category in data) { //heading main
                
                var all_sub_categories=data[main_category];
                var main_category_id=genRand(5);
            
                $('#form_attributes').append(' <div class="row pt-1"  id="'+main_category_id+'"><h5>'+main_category+'</h5>');
                for (var sub_category_enum in all_sub_categories) { //front end backend 

                    var skills=all_sub_categories[sub_category_enum];
                    var sub_category_id=genRand(5);

                    $('#'+main_category_id).append('<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-3 ml-2"><div class="card   pt-3" style="padding-left: 23px;background-color:white"><div class="card-headder" ><h5>'+sub_category_enum+'</h5></div><div class="" style="background-color:white"><div class="inline" id="'+sub_category_id+'" >')
                    for (var skill_index in skills) {
                        
                        var skill_id=skills[skill_index].id;
                        var skill_name=skills[skill_index].name;
                        $('#'+sub_category_id).append('<div class="form-group custom-check-group px-2" > <input class="attrs-checkbox-back" type="checkbox" name="skills[]" id="'+skill_id+'" value="'+skill_id+'"> <label for="'+skill_id+'" class="services-checks value">'+skill_name+'</label> </div>');


                    }
                    
                }
                $('#'+main_category_id).append('<div/></div>');
            }
            $('#form_attributes').append('</div>');

        }

        $('#sub-category').on('change', function(){

            var sub_category = $(this).val();
            $('input[name="skills"]').prop('checked', $(this).is(':checked'));
            var category = $('#category').find(":selected").val();
            fetchSkills(category,sub_category,true);

        });

        $('#category').on('change', function(){
            var category = $(this).val();
            fetchSkills(category,'',true);
        });

    </script>
@endpush
