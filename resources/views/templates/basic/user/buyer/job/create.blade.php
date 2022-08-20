@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections ptb-60">
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
                                                    
                                                </select>
                                            </div>

                                            {{-- Job Location --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12  form-group">
                                                <label for="joblocation">@lang('Job Location')</label>
                                                <select name="joblocation" class="form-control joblocation" id="joblocation">
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
                                                                <img src="{{getImage('assets/images/frontend/job/upload.svg')}}" alt="">
                                                                <img src="{{getImage('assets/images/frontend/job/arrow_up.svg')}}" alt="" class="upload_inner_arrow">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="dz-message needsclick">    
                                                            Drag or Drop to Upload
                                                        <span class="text text-primary">
                                                            Browse
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
                                                    @foreach($categorys as $category)
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
                                                    </select>
                                            </div>

                                        </div>

                                        <div class="row">

                                            {{-- Budget Type --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="budget">@lang('Budget Type')*</label>
                                                <select name="budget" class="form-control budget" id="budget" required>
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
                                                    <input type="text" class="form-control" name="deliverables" value="{{old('deliverables')}}" placeholder="@lang('Enter Deliverables')" required>
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
                                                    </select>
                                            </div>
                                        </div>
                                        

                                        {{-- dod --}}
                                        <div class="row col-xl-12 col-lg-12 form-group">
                                            <label>@lang('Defination of Done(DOD)')*</label>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" name="dod" value="" placeholder="@lang('E.g Dev task completed, Ux reviewed, QA tasks completed, PO reviewed, Defects resolved')" required="">
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

@push('style')
<style>
    .dashboard-sidebar-inner {
        background-color: #1e2746;
        padding: 20px 10px;
        border-radius: 2px !important;
        height: 100%;
    }
    .cretae-job-btn{
        
        background: #7F007F !important;
        border-radius: 5px;
    }
    #outer
    {
        width:100%;
        text-align: right;
        padding-right: 7px;
    }
    .inner
    {
        display: inline-block;
    }
    .cancel-job-btn{
        color: #7F007F;
        background-color: transparent
    }
 .dropzone .dz-preview .dz-details {
    z-index: 20;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    font-size: 11px !important;
    min-width: 100%;
    max-width: 100%;
    padding: 2em 1em;
    text-align: center;
    color: rgba(0,0,0,.9);
    line-height: 150%;
}
.dropzone .dz-preview .dz-image {
    border-radius: 20px;
    overflow: hidden;
    width: 78px;
    height: 78px;
    position: relative;
    display: block;
    z-index: 10;
}
.dropzone .dz-preview .dz-details {
    z-index: 20;
    position: absolute;
    top: -3px;
    left: 0;
    opacity: 0;
    font-size: 11px !important;
    min-width: 100%;
    max-width: 100%;
    padding: 1em 1em;
    text-align: center;
    color: rgba(0,0,0,.9);
    line-height: 135%;
}
.dropzone .dz-preview {
    position: relative;
    display: inline-block;
    vertical-align: top;
    margin: 5px;
    min-height: 100px;
}
.dropzone .dz-preview .dz-success-mark, .dropzone .dz-preview .dz-error-mark {
    pointer-events: none;
    opacity: 0;
    z-index: 391;
    position: absolute;
    display: block;
    top: 50%;
    left: 50%;
    margin-left: -27px;
    margin-top: -41px;
}
    .select2Tag input{
        background-color: transparent !important;
        padding: 0 !important;
    }
    .inline{
        display: inline-flex;
        float:left;
    }
    div. { 
        float:left; 
    }
    .card-title{

        color:#007f7f !important;
        padding:10px;

    }
    .card {
        
        border: 0px !important;
        border-radius: 0;
    }
    .card-body .custom-padding {
        padding: 0rem 0rem !important;
    }
   
    .upload_icon{
            position: absolute;
            left: 13%;
            right: 0%;
            top: 50.78%;
            bottom: 22%;

    }
    .upload_inner_arrow{
        position: absolute;
        left: 3.15%;
        right: 32.52%;
        top: 38.12%;
        bottom: 3.78%;
    }
    .dropzone {
        background: white;
        border-radius: 5px;
        height: 121px;
        border: 2px dashed #CBDFDF;
        border-image: none;
        max-width: 500px;
        min-height: 126px;
        margin-left: auto;
        margin-right: auto;
    }
    .custom--card .card-body .card-form-wrapper input {
        background-color: white !important;
        border-radius: 3px;
        padding: 10px 15px;
        height: 40px;

    }
    .select2-container--default.select2-container--open.select2-container--below .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        height: 40px;
    }
    .select2-container .select2-selection--multiple {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        min-height: 32px;
        user-select: none;
        -webkit-user-select: none;
        height: 40px;
    }
    
    .form-control {
        border: 1px solid #e1e7ec;
        font-size: 14px;
        font-weight: 500;
        height: 45px;
        appearance: auto;
        background-color: white !important;
        height: 40px;
    }
</style>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/select2.min.css')}}">

@endpush

@push('script-lib')
    <script src="{{asset($activeTemplateTrue.'frontend/js/select2.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/nicEdit.js')}}"></script>

@endpush


@push('script')

<script>
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

<script>
    var dropzone = new Dropzone('#demo-upload', {
                    
                    previewTemplate: document.querySelector('#preview-template').innerHTML,
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
  
  
  // Now fake the file upload, since GitHub does not handle file uploads
  // and returns a 404
  
  var minSteps = 6,
      maxSteps = 60,
      timeBetweenSteps = 100,
      bytesPerStep = 100000;
  
  dropzone.uploadFiles = function(files) {
    var self = this;
  
    for (var i = 0; i < files.length; i++) {
  
      var file = files[i];
      totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
  
      for (var step = 0; step < totalSteps; step++) {
        var duration = timeBetweenSteps * (step + 1);
        setTimeout(function(file, totalSteps, step) {
          return function() {
            file.upload = {
              progress: 100 * (step + 1) / totalSteps,
              total: file.size,
              bytesSent: (step + 1) * file.size / totalSteps
            };
  
            self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
            if (file.upload.progress == 100) {
              file.status = Dropzone.SUCCESS;
              self.emit("success", file, 'success', null);
              self.emit("complete", file);
              self.processQueue();
              //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
            }
          };
        }(file, totalSteps, step), duration);
      }
    }
  }
</script>


@endpush