@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections ptb-60" style="padding-top:0px">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row  mb-30-none">
                @include($activeTemplate . 'partials.buyer_sidebar')
                <div class="col-xl-9 col-lg-12 mb-30" style="background-color: #F8FAFA;padding-left:0px;padding-right:0px">
                    <div class="dashboard-sidebar-open" ><i class="las la-bars"></i> @lang('Menu')</div>
                    <form class="user-profile-form" action="{{route('user.job.store')}}" method="POST" enctype="multipart/form-data" id="job_form_data">
                        @csrf
                        <div class="card custom--card" style="background-color: #F8FAFA;">
                            <div class="d-flex flex-wrap align-items-center justify-content-between" style="border-bottom:1px solid #CBDFDF;">
                                <h3 class="card-title mt-1">
                                    {{__($pageTitle)}}
                                </h3>
                                
                            </div>

                            <div class="card-body">
                                <div class="card-form-wrapper">
                                    <div class="justify-content-center" >

                                        <div class="row">

                                            {{-- Job Title --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Title')*</label>
                                                <input type="text" name="title" maxlength="255" value="" class="form-control" placeholder="@lang("Enter Title")" required>
                                            </div>

                                            {{-- Job Type --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Job Type')*</label>
                                                <select class="form-control bg--gray" name="job_type_id" id="jobtype" required>
                                                    <option value="" >@lang('Select Job Type')</option>
                                                    @foreach ($data['job_types'] as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Job Location --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12  form-group">
                                                <label for="joblocation">@lang('Job Location')</label>
                                                <select name="location_id" class="form-control joblocation" id="joblocation">
                                                    <option value="" >@lang('Select Job Location')</option>
                                                    @foreach ($data['countries'] as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            {{-- Description --}}
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                <label>@lang('Description')*</label>
                                                <textarea class="form-control bg--gray" name="description" aria-rowspan="3" required></textarea>
                                            </div>

                                            {{-- Required documents --}}
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                <label>@lang('Required Documents')</label>
                                            
                                                    <div id="dropzone">
                                                        <div class="dropzone needsclick" id="demo-upload" action="#" >
                                                            <div class="fallback">
                                                                <input name="file" type="file" multiple />
                                                            </div>
                                                            <div>
                                                                <div class="upload_icon">
                                                                    <img src="{{url('assets/images/frontend/job/upload.svg')}}" alt="">
                                                                    <img src="{{url('assets/images/frontend/job/arrow_up.svg')}}" alt="" class="upload_inner_arrow">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="dz-message "> 
                                                                @lang('Drag or Drop to Upload')   
                                                                <span class="text text-primary ">
                                                                    @lang('Browse')  
                                                                    
                                                                </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                        
                                            </div>

                                        </div>
                                        
                                        <div class="row">

                                            {{-- Category --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Category')*</label>
                                                <select class="form-control bg--gray" name="category_id" id="category" required>
                                                    <option selected="" disabled="">@lang('Select Category')</option>
                                                    @foreach($data['categories'] as $category)
                                                        <option value="{{__($category->id)}}">{{__($category->name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Sub Category --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="subCategorys">@lang('Sub Category')*</label>
                                                    <select name="sub_category_id" class="form-control mySubCatgry" id="subCategorys" required>
                                                    </select>
                                            </div>

                                            {{-- Experienced Level --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="experience">@lang('Experience Level')*</label>
                                                    <select name="rank_id" class="form-control experience" id="experience" required>
                                                        <option selected="" disabled="">@lang('Select Experience Level')</option>
                                                        @foreach($data['experience_levels'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->level)}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                        </div>

                                        <div class="row">

                                            {{-- Budget Type --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group budget_type" >
                                                <label for="budget">@lang('Budget Type')*</label>
                                                <select name="budget_type_id" class="form-control budget" id="budget_type_id" required>
                                                    <option selected="" disabled="">@lang('Select Budget Type')</option>
                                                        @foreach($data['budget_types'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->title)}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            
                                            {{-- Weekly Range start --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group weekly_range" >
                                                
                                                <label>@lang('Weekly Range(Starting)')*</label>
                                                <input type="number" class="form-control" name="hourly_start_range" value="" placeholder="" required>

                                            </div>

                                            {{-- Weekly Range end --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group weekly_range">
                                                
                                                <label>@lang('Weekly Range(Ending)')*</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="hourly_end_range" value="" placeholder="" required>
                                                </div>

                                            </div>
                                               

                                            {{-- budget amount --}}
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group hide" id="budget_amount">

                                                <label>@lang('Budget Amount')*</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="fixed_amount" value="" placeholder="" >
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            {{-- deliverables --}}
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Deliverables')*</label>
                                                <div class="input-group mb-3">
                                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Deliverables" style="width: 100%;" tabindex="-1" aria-hidden="true" name="deliverables[]" id="deliverables" required>
                                                        @foreach($data['deliverables'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->name)}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                              {{-- dod --}}
                                        <div class=" col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                            <label>@lang('Defination of Done(DOD)')*</label>
                                                <div class="input-group mb-3">
                                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Defination of Done" style="width: 100%;" tabindex="-1" aria-hidden="true" name="dod[]" id="dod" required>
                                                        @foreach($data['dods'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->title)}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    
                                                </div>
                                        </div>

                                        </div>

                                        <div class="row">
                                            {{-- Project Expected Start Date --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Project Expected Start Date')*</label>
                                                    <div class="input-group mb-3">
                                                    <input type="date" class="form-control" name="expected_start_date" value="" placeholder="" required>
                                                    </div>
                                            </div>

                                            {{-- project length --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Project Length')*</label>
                                                    <div class="input-group mb-3">
                                                    <input type="integer" class="form-control" name="delivery_time" value="{{old('projectlength')}}" placeholder="" required>
                                                </div>
                                            </div>

                                            {{-- project stage --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Project Stage')*</label>
                                                <select name="project_stage_id" class="form-control budget" id="project_stage_id">
                                                    <option selected="" disabled="">@lang('Select Project Stage')</option>
                                                        @foreach($data['project_stages'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->title)}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        

                                      
                                        <div id="form_attributes">
                                            
                                        </div>

                                       
                                        {{-- Create Job Button --}}
                                        
                                        <div id="outer" class="text-right">
                                            <div class="inner">
                                                <button type="button" class="pl-4  mt-20 w-70 cancel-job-btn">@lang('Cancel')</button>
                                            </div>
                                            <div class="inner">
                                                <button type="submit" class="pl-4 submit-btn mt-20 w-70 cretae-job-btn" id="submit-all">@lang('Create Job')</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('style-lib')

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/resources/templates/basic/frontend/css/custom/create_job.css')}}">

@endpush

@push('script-lib')

    <script src="{{asset($activeTemplateTrue.'frontend/js/select2.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/nicEdit.js')}}"></script>
    <script src="{{asset('/assets/resources/templates/basic/frontend/js/create_job.js')}}"></script>
    <script src="{{asset('/assets/resources/templates/basic/frontend/js/dropzone.js')}}"></script>


@endpush


@push('script')

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

    function fetchSkills(category,sub_category=''){
        $.ajax({
            type:"GET",
        url:"{{route('user.job.let.skills')}}",
            data: {category_id : category,sub_category_id:sub_category},
            success:function(data){
                var html = '';
                if(data.error){
                
                }
                else{
                    loadSkills(data);
                    console.log(data);
                
                }
            }
        });  

    }

    const genRand = (len) => {
    return Math.random().toString(36).substring(2,len+2);
    }
                                    
    function loadSkills(data)
    {
        if(!jQuery.isEmptyObject(data))
            $('#form_attributes').empty();
        for (var main_category in data) { //heading main
            
            var all_sub_categories=data[main_category];
            var main_category_id=genRand(5);
        
            $('#form_attributes').append('<h4 class="pb-3">Job Attributes</h4> <div class="row" id="'+main_category_id+'"><h5>'+main_category+'</h5>');
            for (var sub_category_enum in all_sub_categories) { //front end backend 

                var skills=all_sub_categories[sub_category_enum];
                var sub_category_id=genRand(5);

                $('#'+main_category_id).append('<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><div class="card custom-card  pt-3" style="padding-left: 23px"><div class="card-headder"><h5>'+sub_category_enum+'</h5></div><div class="card-body custom-padding mt-3"><div class="inline" id="'+sub_category_id+'">')
                for (var skill_index in skills) {
                    
                    var skill_id=skills[skill_index].id;
                    var skill_name=skills[skill_index].name;
                    $('#'+sub_category_id).append('<div class="form-group custom-check-group px-2"> <input class="attrs-checkbox-back" type="checkbox" name="skills[] 0" id="'+skill_id+'" value="'+skill_id+'"> <label for="'+skill_id+'" class="services-checks value">'+skill_name+'</label> </div>');


                }
                
            }
            $('#'+main_category_id).append('<div/></div>');
        }
        $('#form_attributes').append('</div>');


    }
    Dropzone.autoDiscover = false;
    "use strict";
    $(document).ready(function() {
     
        
        $('.select2').select2({
            tags: true
        });

    });


    bkLib.onDomLoaded(function() {
        $( ".nicEdit" ).each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
    });
    
    $(document).on("change",".custom-file-input",function(){
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    
    $('#budget_type_id').on('change', function(){
        var budget_type = $(this).val();
        switchBudgetFileds(budget_type);
    });
  
    
    $('#subCategorys').on('change', function(){
        var sub_category = $(this).val();
        var category = $('#category').find(":selected").val();
        fetchSkills(category,sub_category);

    });

    $('#category').on('change', function(){
        var category = $(this).val();
        fetchSubCategories(category);
        fetchSkills(category);
        
         
    });


</script>

@endpush