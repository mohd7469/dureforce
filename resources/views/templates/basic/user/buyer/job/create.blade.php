@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections ptb-60" style="padding-top:0px">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row  mb-30-none">
                @include($activeTemplate . 'partials.buyer_sidebar')
                <div class="col-xl-9 col-lg-12 mb-30" style="background-color: #F8FAFA;padding-left:0px;padding-right:0px">
                    <div class="dashboard-sidebar-open" ><i class="las la-bars"></i> @lang('Menu')</div>
                    <form class="user-profile-form" action="{{route('user.job.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card custom--card" style="background-color: #F8FAFA;">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <h3 class="card-title mb-0">
                                    {{__($pageTitle)}}
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="card-form-wrapper">
                                    <div class="justify-content-center">

                                        <div class="row">

                                            {{-- Job Title --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Title')*</label>
                                                <input type="text" name="title" maxlength="255" value="" class="form-control" placeholder="@lang("Enter Title")" required>
                                            </div>

                                            {{-- Job Type --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Job Type')</label>
                                                <select class="form-control bg--gray" name="jobtype" id="jobtype">
                                                    <option value="" >@lang('Select Job Type')</option>
                                                    @foreach ($data['job_types'] as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Job Location --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12  form-group">
                                                <label for="joblocation">@lang('Job Location')</label>
                                                <select name="joblocation" class="form-control joblocation" id="joblocation">
                                                    <option value="" >@lang('Select Job Type')</option>
                                                    @foreach ($data['job_types'] as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            {{-- Required documents --}}
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                <label>@lang('Description')*</label>
                                                <textarea class="form-control bg--gray" name="description" aria-rowspan="3" required></textarea>
                                            </div>

                                            {{-- Required documents --}}
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                <label>@lang('Required Documents')</label>
                                            
                                                    <div id="dropzone">
                                                        <div class="dropzone needsclick" id="demo-upload" action="#" >
                                                            
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
                                                <select class="form-control bg--gray" name="category" id="category" required>
                                                    <option selected="" disabled="">@lang('Select Category')</option>
                                                    @foreach($data['categories'] as $category)
                                                        <option value="{{__($category->id)}}">{{__($category->name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Sub Category --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="subCategorys">@lang('Sub Category')</label>
                                                    <select name="subcategory" class="form-control mySubCatgry" id="subCategorys">
                                                    </select>
                                            </div>

                                            {{-- Experienced Level --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="experience">@lang('Experience Level')*</label>
                                                    <select name="experience" class="form-control experience" id="experience" required>
                                                        <option selected="" disabled="">@lang('Select Experience Level')</option>
                                                        @foreach($data['experience_levels'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->level)}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                        </div>

                                        <div class="row">

                                            {{-- Budget Type --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="budget">@lang('Budget Type')*</label>
                                                <select name="budget" class="form-control budget" id="budget" required>
                                                    <option selected="" disabled="">@lang('Select Budget Type')</option>
                                                        @foreach($data['budget_types'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->title)}}</option>
                                                        @endforeach
                                                </select>
                                            </div>

                                            {{-- Weekly Range start --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Weekly Range(Starting)')</label>
                                                <input type="number" class="form-control" name="startrange" value="" placeholder="" >
                                            </div>

                                            {{-- Weekly Range end --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12form-group">
                                                <label>@lang('Weekly Range(Ending)')</label>
                                                    <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="endrange" value="" placeholder="" >
                                                    </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            {{-- deliverables --}}
                                            <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Deliverables')*</label>
                                                <div class="input-group mb-3">
                                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Deliverables" style="width: 100%;" tabindex="-1" aria-hidden="true" name="deliverables" id="deliverables">
                                                        @foreach($data['deliverables'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->name)}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            {{-- Project Expected start Date --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Project Expected start Date')</label>
                                                    <div class="input-group mb-3">
                                                    <input type="date" class="form-control" name="projectstartdate" value="" placeholder="" required="">
                                                    </div>
                                            </div>

                                            {{-- project length --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Project Length')*</label>
                                                    <div class="input-group mb-3">
                                                    <input type="integer" class="form-control" name="projectlength" value="{{old('projectlength')}}" placeholder="" required="">
                                                    </div>
                                            </div>

                                            {{-- project stage --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label>@lang('Project Stage')*</label>
                                                <select name="projectstage" class="form-control budget" id="projectstage">
                                                    <option selected="" disabled="">@lang('Select Project Stage')</option>
                                                        @foreach($data['project_stages'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->title)}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        

                                        {{-- dod --}}
                                        <div class="row col-xl-12 col-lg-12 form-group">
                                            <label>@lang('Defination of Done(DOD)')*</label>
                                                <div class="input-group mb-3">
                                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Defination of Done" style="width: 100%;" tabindex="-1" aria-hidden="true" name="dod" id="dod">
                                                        @foreach($data['dods'] as $item)
                                                            <option value="{{__($item->id)}}">{{__($item->title)}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    
                                                </div>
                                        </div>

                                        {{-- job attributes --}}
                                        <div class="row">
                                            
                                            <h4 class="pb-3">Job Attributes</h4>
                                            <h5>Development Type</h5>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="card custom-card  pt-3" style="padding-left: 23px">
                                                    <div class="card-headder"><h5>Front End</h5> </div>
                                                    <div class="card-body custom-padding mt-3">
                                                       
                                                        <div class="inline">

                                                            <div class="form-group custom-check-group px-2">
                                                                <input  type="checkbox" name="attrs[] 0" id="11" value="11">
                                                                    <label for="11" class="services-checks value">PHP</label>
                                                                </div>

                                                            <div class="form-group custom-check-group px-2">
                                                                    <input  type="checkbox" name="attrs[] 0" id="13" value="13">
                                                                        <label for="13" class="services-checks value">JAVA</label>
                                                            </div>

                                                            <div class="form-group custom-check-group px-2">
                                                                <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="14" value="44">
                                                                <label for="14" class="services-checks value">DOT NET</label>
                                                            </div>

                                                            <div class="form-group custom-check-group px-2">
                                                                <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="15" value="45">
                                                                <label for="15" class="services-checks value">PYTHON</label>
                                                            </div>

                                                        </div>
                                                               
                                                    </div>
                
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="card custom-card  pt-3" style="padding-left: 23px">
                                                    <div class="card-headder"><h5>Back End</h5> </div>
                                                    <div class="card-body custom-padding mt-3">
                                                       
                                                        <div class="inline">
                                                            
                                                            <div class="form-group custom-check-group px-2">
                                                                <input  type="checkbox" name="attrs[] 0" id="19" value="19">
                                                                    <label for="19" class="services-checks value">PHP</label>
                                                                </div>
                                                            <div class="form-group custom-check-group px-2">
                                                                    <input  type="checkbox" name="attrs[] 0" id="43" value="43">
                                                                        <label for="43" class="services-checks value">JAVA</label>
                                                            </div>
                                                            <div class="form-group custom-check-group px-2">
                                                                <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="44" value="44">
                                                                <label for="44" class="services-checks value">DOT NET</label>
                                                            </div>
                                                            <div class="form-group custom-check-group px-2">
                                                                <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="45" value="45">
                                                                <label for="45" class="services-checks value">PYTHON</label>
                                                            </div>

                                                        </div>
                                                               
                                                    </div>
                
                                                </div>
                                            </div>

                                        </div>

                                        
                                         {{-- Programming Languages --}}
                                         <div class="row pt-3">
                                            
                                            <h5>Programming Language</h5>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="card custom-card  pt-3" style="padding-left: 23px">
                                                    <div class="card-headder"><h5>Front End</h5> </div>
                                                    <div class="card-body custom-padding mt-3">
                                                       
                                                        <div class="inline">

                                                            <div class="form-group custom-check-group px-2">
                                                                <input class="attrs-checkbox-back" type="checkbox" id="1"  value="1" name="attrs[]">
                                                                  <label for="1" class="services-checks value">Javascript</label>
                                                              </div>
                                                              <div class="form-group custom-check-group px-2">
                                                                  <input class="attrs-checkbox-back" type="checkbox" name="attrs[]" id="88" value="88">
                                                                  <label for="88" class="services-checks value">React</label>
                                                              </div>
                  
                                                              <div class="form-group custom-check-group px-2">
                                                                  <input class="attrs-checkbox-back" type="checkbox" name="attrs[]" id="53" value="53">
                                                                  <label for="53" class="services-checks value">HTML</label>
                                                              </div>
                  
                                                              <div class="form-group custom-check-group px-2">
                                                                  <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="30"  value="30">
                                                                  <label for="30" class="services-checks value">CSS</label>
                                                              </div>

                                                        </div>
                                                               
                                                    </div>
                
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="card custom-card  pt-3" style="padding-left: 23px">
                                                    <div class="card-headder"><h5>Back End</h5> </div>
                                                    <div class="card-body custom-padding mt-3">
                                                       
                                                        <div class="inline">
                                                            
                                                            <div class="form-group custom-check-group px-2">
                                                                <input  type="checkbox" name="attrs[] 0" id="22" value="22">
                                                                <label for="22" class="services-checks value">PHP</label>
                                                            </div>

                                                            <div class="form-group custom-check-group px-2">
                                                                    <input  type="checkbox" name="attrs[] 0" id="23" value="23">
                                                                       <label for="23" class="services-checks value">JAVA</label>
                                                            </div>

                                                            <div class="form-group custom-check-group px-2">
                                                               <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="24" value="24">
                                                               <label for="24" class="services-checks value">DOT NET</label>
                                                            </div>

                                                            <div class="form-group custom-check-group px-2">
                                                              <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="25" value="25">
                                                               <label for="25" class="services-checks value">PYTHON</label>
                                                            </div>

                                                        </div>
                                                               
                                                    </div>
                
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Coding Competence --}}
                                        <div class="row">
                                            
                                            <h5>Coding Competence</h5>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="card custom-card  pt-3" style="padding-left: 23px">
                                                    <div class="card-headder"><h5>Backend </h5> </div>
                                                    <div class="card-body custom-padding mt-3">
                                                       
                                                        <div class="inline">

                                                            <div class="form-group custom-check-group px-2">
                                                                <input class="attrs-checkbox-back" type="checkbox" id="1"  value="1" name="attrs[]">
                                                                  <label for="1" class="services-checks value">Javascript</label>
                                                              </div>
                                                              <div class="form-group custom-check-group px-2">
                                                                  <input class="attrs-checkbox-back" type="checkbox" name="attrs[]" id="88" value="88">
                                                                  <label for="88" class="services-checks value">React</label>
                                                              </div>
                  
                                                              <div class="form-group custom-check-group px-2">
                                                                  <input class="attrs-checkbox-back" type="checkbox" name="attrs[]" id="53" value="53">
                                                                  <label for="53" class="services-checks value">HTML</label>
                                                              </div>
                  
                                                              <div class="form-group custom-check-group px-2">
                                                                  <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="30"  value="30">
                                                                  <label for="30" class="services-checks value">CSS</label>
                                                              </div>

                                                        </div>
                                                               
                                                    </div>
                
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="card custom-card  pt-3" style="padding-left: 23px">
                                                    <div class="card-headder"><h5>Front End</h5> </div>
                                                    <div class="card-body custom-padding mt-3">
                                                       
                                                        <div class="inline">
                                                            
                                                            <div class="form-group custom-check-group px-2">
                                                                <input  type="checkbox" name="attrs[] 0" id="22" value="22">
                                                                <label for="22" class="services-checks value">PHP</label>
                                                            </div>

                                                            <div class="form-group custom-check-group px-2">
                                                                    <input  type="checkbox" name="attrs[] 0" id="23" value="23">
                                                                       <label for="23" class="services-checks value">JAVA</label>
                                                            </div>

                                                            <div class="form-group custom-check-group px-2">
                                                               <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="24" value="24">
                                                               <label for="24" class="services-checks value">DOT NET</label>
                                                            </div>

                                                            <div class="form-group custom-check-group px-2">
                                                              <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="25" value="25">
                                                               <label for="25" class="services-checks value">PYTHON</label>
                                                            </div>

                                                        </div>
                                                               
                                                    </div>
                
                                                </div>
                                            </div>
                                        </div>
                                        
                                
                                        {{-- database competencies --}}
                                        <div class="row">
                                            
                                            <h5>Databases</h5>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="card custom-card  pt-3" style="padding-left: 23px">
                                                    <div class="card-headder"><h5>Relational</h5> </div>
                                                    <div class="card-body custom-padding mt-3">
                                                       
                                                        <div class="inline">

                                                            <div class="form-group custom-check-group px-2">
                                                                <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="90" value="90">
                                                                    <label for="90" class="services-checks value">MYSQL</label>
                                                                </div>

                                                                <div class="form-group custom-check-group px-2">
                                                                        <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0"  id="91" value="91">
                                                                            <label for="91" class="services-checks value">ORACLE</label>
                                                                </div>

                                                                <div class="form-group custom-check-group px-2">
                                                                    <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="92" value="92">
                                                                    <label for="92" class="services-checks value">MONGODB</label>
                                                                </div>

                                                                <div class="form-group custom-check-group px-2">
                                                                    <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="94" value="94">
                                                                    <label for="94" class="services-checks value">MSSQYL</label>
                                                                </div>

                                                        </div>
                                                               
                                                    </div>
                
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="card custom-card  pt-3" style="padding-left: 23px">
                                                    <div class="card-headder"><h5>Non-Relational</h5> </div>
                                                    <div class="card-body custom-padding mt-3">
                                                       
                                                        <div class="inline">

                                                            <div class="form-group custom-check-group px-2">
                                                                <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="90" value="90">
                                                                    <label for="90" class="services-checks value">MYSQL</label>
                                                                </div>

                                                                <div class="form-group custom-check-group px-2">
                                                                        <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0"  id="91" value="91">
                                                                            <label for="91" class="services-checks value">ORACLE</label>
                                                                </div>

                                                                <div class="form-group custom-check-group px-2">
                                                                    <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="92" value="92">
                                                                    <label for="92" class="services-checks value">MONGODB</label>
                                                                </div>

                                                                <div class="form-group custom-check-group px-2">
                                                                    <input class="attrs-checkbox-back" type="checkbox" name="attrs[] 0" id="94" value="94">
                                                                    <label for="94" class="services-checks value">MSSQYL</label>
                                                                </div>

                                                        </div>
                                                               
                                                    </div>
                
                                                </div>
                                            </div>
                                            
                                           
                                        </div>
                                        
                                        {{-- Create Job Button --}}
                                        
                                        <div id="outer" class="text-right">
                                            <div class="inner">
                                                <button type="button" class="pl-4  mt-20 w-70 cancel-job-btn">@lang('Cancel')</button>
                                            </div>
                                            <div class="inner">
                                                <button type="submit" class="pl-4 submit-btn mt-20 w-70 cretae-job-btn">@lang('Create Job')</button>
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


@endpush


@push('script')

<script>
    function LoadDropZone()
    {   
        var dropzone = new Dropzone('#demo-upload', {     
        previewTemplate: document.querySelector('#demo-upload').innerHTML,
        parallelUploads: 2,
        thumbnailHeight: 60,
        thumbnailWidth: 60,
        maxFilesize: 3,
        filesizeBase: 1000,
        thumbnail: function(file, dataUrl) {
      
            if (file.previewElement) {
      
                file.previewElement.classList.remove("dz-file-preview");
                var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                for (var i = 0; i < images.length; i++) {
                var thumbnailElement = images[i];
                thumbnailElement.alt = file.name;
                thumbnailElement.src = dataUrl;
                }
                setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
      
            }
        }
      
      });
}
    "use strict";
    $(document).ready(function() {
        
        $('.select2').select2({
            tags: true
        });
        // LoadDropZone();

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

    $('#category').on('change', function(){
        var category = $(this).val();
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
    });


</script>

@endpush