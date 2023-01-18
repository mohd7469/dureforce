@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                @include($activeTemplate . 'partials.buyer_sidebar')
                <div class="col-xl-9 col-lg-12 mb-30 page_div">
                    <div class="dashboard-sidebar-open" ><i class="las la-bars"></i> @lang('Menu')</div>
                    <form class="user-profile-form" action="{{route('buyer.job.update',$job->uuid)}}" method="POST" enctype="multipart/form-data" id="job_form_data">
                        @csrf
                        <div class="card custom--card" style="background-color: #F8FAFA;">
                            <div class="d-flex flex-wrap align-items-center justify-content-between bottom_border_light" >
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
                                                <input type="text" name="title" maxlength="255" value="{{$job->title}}" class="form-control" placeholder="@lang("Enter Title")" ="">
                                            </div>

                                            {{-- Job Type --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Job Type')*</label>
                                                <select class="form-control bg--gray" name="job_type_id" id="jobtype" >
                                                    <option value="" >@lang('Select Job Type')</option>
                                                    @foreach ($data['job_types'] as $item)
                                                        <option value="{{$item->id}}" {{$job->job_type_id==$item->id ? 'selected' :''}}>{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Job Location --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12  form-group">
                                                <label for="joblocation">@lang('Job Location')*</label>
                                                <select name="country_id" class="form-control joblocation" id="joblocation">
                                                    <option value="" >@lang('Select Job Location')</option>
                                                    @foreach ($data['countries'] as $item)
                                                        <option value="{{$item->id}}" {{$job->country_id   ==$item->id ? 'selected' :''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            {{-- Description --}}
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                <label>@lang('Description')*</label>
                                                <textarea class="form-control bg--gray" name="description" aria-rowspan="3" >{{$job->description}}</textarea>
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
                                                <select class="form-control bg--gray" name="category_id" id="category" >
                                                    <option selected="" disabled="">@lang('Select Category')</option>
                                                    @foreach($data['categories'] as $category)
                                                        <option value="{{__($category->id)}}" {{$job->category_id==$category->id ? 'selected' :''}}>{{__($category->name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Sub Category --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="subCategorys">@lang('Sub Category')*</label>
                                                    <select name="sub_category_id" class="form-control mySubCatgry" id="subCategorys" >
                                                        @foreach($data['sub_categories'] as $sub_category)
                                                        <option value="{{__($sub_category->id)}}" {{$job->sub_category_id==$sub_category->id ? 'selected' :''}}>{{__($sub_category->name)}}</option>
                                                    @endforeach
                                                    </select>
                                            </div>

                                            {{-- Experienced Level --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="experience">@lang('Experience Level')*</label>
                                                    <select name="rank_id" class="form-control experience" id="experience" >
                                                        <option selected="" disabled="">@lang('Select Experience Level')</option>
                                                        @foreach($data['experience_levels'] as $item)
                                                            <option value="{{__($item->id)}}" {{$job->rank_id==$item->id ? 'selected' :''}}>{{__($item->level)}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                        </div>

                                        <div class="row">

                                            {{-- Budget Type --}}
                                            <div class=" {{$job->budget_type_id == \App\Models\BudgetType::$fixed ? 'col-xl-6 col-lg-6 col-md-6 ':'col-xl-4 col-lg-4 col-md-4 '}} col-sm-12 col-xs-12 form-group budget_type" >
                                                <label for="budget">@lang('Budget Type')*</label>
                                                <select name="budget_type_id" class="form-control budget" id="budget_type_id" >
                                                    <option selected="" disabled="">@lang('Select Budget Type')</option>
                                                        @foreach($data['budget_types'] as $item)
                                                            <option value="{{__($item->id)}}" {{$job->budget_type_id==$item->id ? 'selected' :''}}>{{__($item->title)}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            
                                            {{-- Weekly Range start --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group weekly_range {{$job->budget_type_id == \App\Models\BudgetType::$hourly ? '' : 'hide'}}"  >
                                                
                                                <label>@lang('Hourly rate(Starting)')*</label>
                                                <input type="number" class="form-control" name="hourly_start_range" value="{{$job->hourly_start_range}}" step="any" placeholder="" >

                                            </div>

                                            {{-- Weekly Range end --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group weekly_range {{$job->budget_type_id == \App\Models\BudgetType::$hourly ? '' : 'hide'}}">
                                                
                                                <label>@lang('Hourly rate(Ending)')*</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" step="any" class="form-control" name="hourly_end_range" value="{{$job->hourly_end_range}}" placeholder="" >
                                                </div>

                                            </div>
                                               

                                            {{-- budget amount --}}
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group {{$job->budget_type_id == \App\Models\BudgetType::$fixed ? '' : 'hide'}}" id="budget_amount">

                                                <label>@lang('Budget Amount')*</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="fixed_amount" value="{{$job->fixed_amount}}" step="any" placeholder="" >
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            {{-- deliverables --}}
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Deliverables')*</label>
                                                <div class="input-group mb-3">
                                                    <select class="form-control select2 select2-hidden-accessible " multiple="" data-placeholder="Select Deliverables" style="width: 100%;" tabindex="-1" aria-hidden="true" name="deliverables[]" id="deliverables" >
                                                        @foreach($data['deliverables'] as $item)
                                                            <option value="{{__($item->id)}}" {{in_array($item->id,$job->deliverable->pluck('id')->toArray()) ? 'selected' :''}} >{{__($item->name)}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                              {{-- dod --}}
                                        <div class=" col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                            <label>@lang('Definition of Done(DOD)')*</label>
                                                <div class="input-group mb-3">
                                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Definition of Done" style="width: 100%;" tabindex="-1" aria-hidden="true" name="dod[]" id="dod" >
                                                        @foreach($data['dods'] as $item)
                                                            <option value="{{__($item->id)}}" {{in_array($item->id,$job->dod->pluck('id')->toArray()) ? 'selected' :''}}>{{__($item->title)}}</option>
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
                                                    <input type="date" class="form-control" name="expected_start_date" value="{{$job->expected_start_date}}" placeholder="" >
                                                    </div>
                                            </div>

                                            
                                            {{-- project length --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Project Length')*</label>
                                                    <select name="project_length_id" class="form-control budget" id="project_length_id">
                                                        <option selected="" disabled="">@lang('Select Project Length')</option>
                                                            @foreach($data['project_length'] as $item)
                                                                <option value="{{__($item->id)}}" {{$job->project_length_id == $item->id ? 'selected':''}}>{{__($item->name)}}</option>
                                                            @endforeach
                                                    </select>

                                            </div>

                                            {{-- project stage --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Project Stage')*</label>
                                                <select name="project_stage_id" class="form-control budget" id="project_stage_id">
                                                    <option selected="" disabled="">@lang('Select Project Stage')</option>
                                                        @foreach($data['project_stages'] as $item)
                                                            <option value="{{__($item->id)}}" {{$job->projectStage->id==$item->id ? 'selected' : ''}}>{{__($item->title)}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{route('buyer.job.validate')}}" id="job_validate_url">
                                        <input type="hidden" value="{{$data['documents']}}" name="job_documents" id="job_documents" >
                                        <input type="hidden" value="{{$data['selected_skills']}}" name="job_skills" id="job_skills" >
                                        
                                        <input type="checkbox" name="skills[]" style="display: none">
                                        
                                        <div style="display:inline;display:none" id="skills_heading">
                                            <h4 class="" style="display:inline">Job Attributes* </h4>
                                            <small>(At least one skill is required)</small>
                                        </div>
                                        
                                        <div id="form_attributes">
                                            
                                        </div>

                                       
                                        {{-- Create Job Button --}}
                                        
                                        <div id="outer" class="text-right">
                                            <div class="inner">
                                                <a href="{{route('buyer.job.index')}}"><button type="button" class="pl-4  mt-20 w-70 cancel-job-btn">@lang('Cancel')</button></a>
                                            </div>
                                            <div class="inner">
                                                <button type="submit" class="pl-4 submit-btn mt-20 w-70 cretae-job-btn" id="submit-all">@lang('Update Job')</button>
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


@push('style')
<style>
    .select2Tag input{
        background-color: transparent !important;
        padding: 0 !important;
    }
</style>
@endpush

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
    function loadFiles()
    {
        var documents=JSON.parse($('#job_documents').val());
        for (const item of documents) {
            var mockFile = { name: item.uploaded_name, size: 12345 };
            myDropzone.options.addedfile.call(myDropzone, mockFile);
            // myDropzone.options.thumbnail.call(myDropzone, mockFile, item.url);
        }
       
        
    }
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
    function loadSkills(data)
    {

        var selected_skills=$('#job_skills').val();
        selected_skills=(selected_skills.split(','));
        selected_skills=selected_skills.map(Number);

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
                    $('#'+sub_category_id).append('<div class="form-group custom-check-group px-2"> <input class="attrs-checkbox-back" type="checkbox" name="skills[]" id="'+skill_id+'" value="'+skill_id+'" '+isChecked(skill_id,selected_skills)+'> <label for="'+skill_id+'" class="services-checks value">'+skill_name+'</label> </div>');


                }
                
            }
            $('#'+main_category_id).append('<div/></div>');
        }
        $('#form_attributes').append('</div>');


    }
    function fetchSkills(category,sub_category=''){
        $.ajax({
            type:"GET",
            url:"{{route('job.skills')}}",
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
           
    function isChecked(skill_id,selected_skills){

        if(selected_skills.includes(skill_id))
            return 'checked';
        else
            return '';
    }
    
   
    Dropzone.autoDiscover = false;
    "use strict";
    
    $(document).ready(function() {
        $('.select2').select2({
            tags: true
        });
        loadFiles();
    });

    bkLib.onDomLoaded(function() {
        $( ".nicEdit" ).each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
        var category = $('#category').find(":selected").val();
        var sub_category = $('#subCategorys').find(":selected").val();
        fetchSkills(category,sub_category);

    });

    (function($){
        $( document ).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
            $('.nicEdit-main').focus();
        });
    })(jQuery);


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