@extends($activeTemplate.'layouts.master')
@section('content')
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                @include($activeTemplate . 'partials.buyer_sidebar')
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> @lang('Menu')</div>
                    <form class="user-profile-form" action="{{route('user.job.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card custom--card">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <h3 class="card-title mb-0">
                                    {{__($pageTitle)}}
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="card-form-wrapper">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-4 form-group">
                                            <label>@lang('Title')*</label>
                                            <input type="text" name="title" maxlength="255" value="" class="form-control" placeholder="@lang("Enter Title")" required="">
                                        </div>
                                        <div class="col-xl-4 form-group">
                                            <label>@lang('Job Type')*</label>
                                            <select class="form-control bg--gray" name="jobtype" id="jobtype" required="">
                                                   
                                            </select>
                                        </div>

                                        <div class="col-xl-4  form-group">
                                            <label for="subCategorys">@lang('Job Location')</label>
                                                <select name="joblocation" class="form-control joblocation" id="joblocation">
                                                </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label>@lang('Description')*</label>
                                            <textarea class="form-control bg--gray" name="description"></textarea>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label>@lang('Required Documents')</label>
                                            <div class="custom-file-wrapper">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="document" id="customFile">
                                                    <label class="custom-file-label" for="customFile">@lang('Choose file')</label>
                                                </div>
                                            </div>
                                        </div>

                                      <div class="col-xl-4 col-lg-4 form-group">
                                            <label>@lang('Category')*</label>
                                            <select class="form-control bg--gray" name="category" id="category" required="">
                                                    <option selected="" disabled="">@lang('Select Category')</option>
                                                @foreach($categorys as $category)
                                                    <option value="{{__($category->id)}}">{{__($category->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 form-group">
                                            <label for="subCategorys">@lang('Sub Category')</label>
                                                <select name="subcategory" class="form-control mySubCatgry" id="subCategorys">
                                                </select>
                                        </div>
                                        
                                        <div class="col-xl-4 col-lg-4 form-group">
                                            <label for="experience">@lang('Experience Level')</label>
                                                <select name="experience" class="form-control experience" id="experience">
                                                </select>
                                        </div>

                                       
                                        <div class="col-xl-2 col-lg-2 form-group">
                                        <label for="budget">@lang('Budget Type')</label>
                                                <select name="budget" class="form-control budget" id="budget">
                                                </select>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 form-group">
                                            <label>@lang('Weekly Range(Starting)')</label>
                                                  <input type="text" class="form-control" name="startrange" value="" placeholder="" required="">
                                        </div>

                                        <div class="col-xl-4 col-lg-4 form-group">
                                            <label>@lang('Weekly Range(Ending)')</label>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" name="endrange" value="" placeholder="" required="">
                                                </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-2 form-group">
                                            <label>@lang('Rate Per Hour')*</label>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" name="delivery" value="{{old('delivery')}}" placeholder="@lang('E.g $50')" required="">
                                                </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label>@lang('Deliverables')*</label>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" name="delivery" value="" placeholder="@lang('Enter Deliverables')" required="">
                                                </div>
                                        </div>

                                      
                                        <div class="col-xl-6 col-lg-6 form-group select2Tag">
                                            <label>@lang('Skill')*</label>
                                            <select class="form-control select2" name="skill[]" multiple="multiple" required="">
                                            </select>
                                            <small>@lang('Tag and enter press')</small>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 form-group">
                                            <label>@lang('Project Expected start Date')</label>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" name="projectstartdate" value="" placeholder="" required="">
                                                </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-2 form-group">
                                            <label>@lang('Project Length')*</label>
                                                <div class="input-group mb-3">
                                                  <input type="projectlength" class="form-control" name="projectlength" value="{{old('delivery')}}" placeholder="" required="">
                                                </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 form-group">
                                            <label>@lang('Project Stage')*</label>
                                            <select name="projectstage" class="form-control budget" id="projectstage">
                                                </select>
                                        </div>


                                        <div class="col-xl-12 col-lg-12 form-group">
                                            <label>@lang('Defination of Done(DOD)')*</label>
                                                <div class="input-group mb-3">
                                                  <input type="dod" class="form-control" name="dod" value="" placeholder="@lang('E.g Dev task completed, Ux reviewed, QA tasks completed, PO reviewed, Defects resolved')" required="">
                                                </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12">
                                           <h4>Job Attributes</h4>   <br>
                                        </div>
                                <div class="col-xl-12 col-lg-10 col-md-6 col-sm-12">
                                           <h5>Development Type</h5>        <br>
                                        </div>
                                        <div class="row">
                                          <div class="col-xl-6 col-sm-12 col-md-6 col-lg-8">
                                        <h4>Front End</h4>
                                        <br>
                                        <div class="col-xl-10 col-lg-12 col-md-8 form-group mt-2 d-flex flex-wrap back" id="back-0">
                                           <div class="form-group custom-check-group px-2">
                                              <input  type="radio" name="attrs[] 0" id="11" value="11">
                                                <label for="11" class="services-checks value">PHP</label>
                                            </div>
                                        <div class="form-group custom-check-group px-2">
                                                  <input  type="radio" name="attrs[] 0" id="13" value="13">
                                                     <label for="13" class="services-checks value">JAVA</label>
                                        </div>
                                        <div class="form-group custom-check-group px-2">
                                             <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="14" value="44">
                                             <label for="14" class="services-checks value">DOT NET</label>
                                         </div>
                                        <div class="form-group custom-check-group px-2">
                                            <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="15" value="45">
                                             <label for="15" class="services-checks value">PYTHON</label>
                                         </div>
                                     </div>
                                </div>
                               <div class="col-xl-6 col-sm-12 col-md-6 col-lg-8 position-relative">
                                            <h4>Back End</h4>
                                                <br>
                                       <div class="col-xl-10 col-lg-12 col-md-8 form-group mt-2 d-flex flex-wrap back" id="back-0">
                                           <div class="form-group custom-check-group px-2">
                                              <input  type="radio" name="attrs[] 0" id="19" value="19">
                                                <label for="19" class="services-checks value">PHP</label>
                                            </div>
                                        <div class="form-group custom-check-group px-2">
                                                  <input  type="radio" name="attrs[] 0" id="43" value="43">
                                                     <label for="43" class="services-checks value">JAVA</label>
                                        </div>
                                        <div class="form-group custom-check-group px-2">
                                             <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="44" value="44">
                                             <label for="44" class="services-checks value">DOT NET</label>
                                         </div>
                                        <div class="form-group custom-check-group px-2">
                                            <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="45" value="45">
                                             <label for="45" class="services-checks value">PYTHON</label>
                                         </div>
                                </div>
                               </div>
                                <br>

                                        <div class="col-xl-12 col-lg-12">
                                           <h5>Programming Language</h5>   <br>
                                        </div>
                                        <div class="row">
                                        <div class="col-xl-6 col-sm-12 col-md-6 col-lg-8">
                                        <h4>Front End</h4>
                                        <br>
                                        <div class="col-xl-8  col-sm-12 col-md-8 col-lg-8  form-group mt-2 d-flex flex-wrap back">
                                           <div class="form-group custom-check-group px-2">
                                              <input class="attrs-radio-back" type="radio" id="1"  value="1" name="attrs[]">
                                                <label for="1" class="services-checks value">Javascript</label>
                                            </div>
                                        <div class="form-group custom-check-group px-2">
                                                  <input class="attrs-radio-back" type="radio" name="attrs[]" id="88" value="88">
                                                     <label for="88" class="services-checks value">React</label>
                                        </div>
                                        <div class="form-group custom-check-group px-2">
                                             <input class="attrs-radio-back" type="radio" name="attrs[]" id="53" value="53">
                                             <label for="53" class="services-checks value">HTML</label>
                                         </div>
                                        <div class="form-group custom-check-group px-2">
                                            <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="30"  value="30">
                                             <label for="30" class="services-checks value">CSS</label>
                                         </div>
                                     </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-md-6 col-lg-8 position-relative">
                                            <h4>Back End</h4>
                                                <br>
                                       <div class="col-xl-10 col-lg-12 col-md-8 col-sm-12 form-group mt-2 d-flex flex-wrap back" id="back-0">
                                           <div class="form-group custom-check-group px-2">
                                              <input  type="radio" name="attrs[] 0" id="22" value="22">
                                                <label for="22" class="services-checks value">PHP</label>
                                            </div>
                                        <div class="form-group custom-check-group px-2">
                                                  <input  type="radio" name="attrs[] 0" id="23" value="23">
                                                     <label for="23" class="services-checks value">JAVA</label>
                                        </div>
                                        <div class="form-group custom-check-group px-2">
                                             <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="24" value="24">
                                             <label for="24" class="services-checks value">DOT NET</label>
                                         </div>
                                        <div class="form-group custom-check-group px-2">
                                            <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="25" value="25">
                                             <label for="25" class="services-checks value">PYTHON</label>
                                         </div>
                                </div>
                                </div>

                                    <br>
                                    <div class="col-xl-12 col-lg-12">
                                                
                                           <h5>Coding Competence</h5>        <br>
                                        </div>
                                        <div class="row">
                                        <div class="col-xl-6 col-sm-12 col-md-6 col-lg-8">
                                        <h4>Front End</h4>
                                        <br>
                                        <div class="col-xl-8 col-10 sm-12 col-md-8 col-lg-8  form-group mt-2 d-flex flex-wrap back">
                                           <div class="form-group custom-check-group px-2">
                                              <input class="attrs-radio-back" type="radio" name="attrs[]" id="28" value="428">
                                                <label for="28" class="services-checks value">Javascript</label>
                                            </div>
                                        <div class="form-group custom-check-group px-2">
                                                  <input class="attrs-radio-back" type="radio" name="attrs[]"  id="27" value="27">
                                                     <label for="27" class="services-checks value">React</label>
                                        </div>
                                        <div class="form-group custom-check-group px-2">
                                             <input class="attrs-radio-back" type="radio" name="attrs[]"  id="26" value="26">
                                             <label for="26" class="services-checks value">HTML</label>
                                         </div>
                                        <div class="form-group custom-check-group px-2">
                                            <input class="attrs-radio-back" type="radio" name="attrs[]"   id="29" value="29">
                                             <label for="29" class="services-checks value">CSS</label>
                                         </div>
                                     </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-md-6 col-lg-8">
                                            <h4>Back End</h4>
                                                <br>
                                       <div class="col-xl-10 col-lg-12 col-md-8 col-sm-12 form-group mt-2 d-flex flex-wrap back" id="back-0">
                                            <div class="form-group custom-check-group px-2">
                                              <input  type="radio" name="attrs[]" id="66" value="66">
                                                <label for="66" class="services-checks value">PHP</label>
                                            </div>
                                        <div class="form-group custom-check-group px-2">
                                                  <input  type="radio" name="attrs[]" id="67" value="67">
                                                     <label for="67" class="services-checks value">JAVA</label>
                                        </div>
                                        <div class="form-group custom-check-group px-2">
                                             <input class="attrs-radio-back" type="radio" name="attrs[]" id="68" value="68">
                                             <label for="68" class="services-checks value">DOT NET</label>
                                         </div>
                                        <div class="form-group custom-check-group px-2">
                                            <input class="attrs-radio-back" type="radio" name="attrs[]" id="69" value="69">
                                             <label for="69" class="services-checks value">PYTHON</label>
                                         </div>
                                </div>
</div>


<br>
                                    <div class="col-xl-12 col-lg-12 position-relative">
                                               
                                           <h5>Database</h5>        <br> 
                                        </div>
                                        <div class="row">
                                        <div class="col-xl-6 col-sm-12 col-md-6 col-lg-8">
                                        <br>
                                       <div class="col-xl-12 col-lg-12 form-group mt-2 d-flex flex-wrap back">
                                           <div class="form-group custom-check-group px-2">
                                              <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="90" value="90">
                                                <label for="90" class="services-checks value">MYSQL</label>
                                            </div>
                                        <div class="form-group custom-check-group px-2">
                                                  <input class="attrs-radio-back" type="radio" name="attrs[] 0"  id="91" value="91">
                                                     <label for="91" class="services-checks value">ORACLE</label>
                                        </div>
                                        <div class="form-group custom-check-group px-2">
                                             <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="92" value="92">
                                             <label for="92" class="services-checks value">MONGODB</label>
                                         </div>
                                        <div class="form-group custom-check-group px-2">
                                            <input class="attrs-radio-back" type="radio" name="attrs[] 0" id="94" value="94">
                                             <label for="94" class="services-checks value">MSSQYL</label>
                                         </div>
                                         
                                     </div>
                                </div>
                              


                           

                                      

                                        <div class="col-xl-12 form-group">
                                            <button type="submit" class="submit-btn mt-20 w-100">@lang('CREATE JOB')</button>
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

    .card-title{

        color:#007f7f !important;
        padding:10px;

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
@endpush