@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.skill.store')}}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="eg Java">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        {{-- Module --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Attribute')<span class="text-danger">*</span></label>
                                <select class="form-control" name="skill_category" id="category">
                                    <option selected="" disabled="">@lang('Select Attribute')</option>
                                    @foreach($SkillCategorys as $SkillCategory)
                                        <option value="{{__($SkillCategory->id)}}">{{__($SkillCategory->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <!-- <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Sub Attribute')<span class="text-danger">*</span></label>
                                <select class="form-control" name="skill_type" >
                                    <option selected="" disabled="">@lang('Select Sub Attribute')</option>
                                        <option value="Frontend">Frontend</option>
                                        <option value="Backend">Backend</option>
                                        <option value="Non Relational">Non Relational</option>
                                </select>
                            </div>
                        </div> -->
                        
                        <div class="row">
                            {{-- Sub Attribute --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="subAttributes">@lang('Sub Attribute')<span class="text-danger">*</span></label>
                                    <select name="sub_attribute" class="form-control mySubAttr" id="subAttributes" >
                                    </select>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Module --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Module')</label>
                                <select class="form-control" name="module" >
                                    <option selected="" disabled="">@lang('Select Module')</option>
                                    @foreach($modules as $module)
                                        <option value="{{__($module->id)}}">{{__($module->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg ctsmbtn" style="width: 200px;">@lang('Save')
                                    </button>
                                </div>
                               
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('script')

<script>

    function fetchSubCategories(category)
    {
        $.ajax({
            type:"GET",
            url:"{{route('admin.skill.attribute')}}",
            data: {category : category},
            success:function(data){
                console.log(data);
                var html = '';
                if(data.error){
                    $("#subAttributes").empty(); 
                    html += `<option value="" selected disabled>${data.error}</option>`;
                    $(".mySubAttr").html(html);
                }
                else{
                    $("#subAttributes").empty(); 
                    html += `<option value="" selected disabled>@lang('Select Sub Attribute')</option>`;
                    $.each(data, function(index, item) {
                        html += `<option value="${item.title}">${item.title}</option>`;
                        $(".mySubAttr").html(html);
                    });
                }
            }
        });  
    }

    $('#category').on('change', function(){
        var category = $(this).val();

        fetchSubCategories(category);
        // fetchSkills(category);
        
         
    });

</script>

@endpush
