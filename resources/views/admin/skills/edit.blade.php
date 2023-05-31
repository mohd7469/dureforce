@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.skill.update',$Skill->id)}}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ $Skill->name }}">
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
                                        <option value="{{ ($SkillCategory->id) }}" {{ $SkillCategory->id == $Skill->skill_category_id ? 'selected' : '' }}>{{__($SkillCategory->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Sub Attribute')<span class="text-danger">*</span></label>
                                <select class="form-control" name="skill_type" >
                                    <option selected="" disabled="">@lang('Select Sub Attribute')</option>
                                        <option value="Frontend" {{ $Skill->skill_type == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                                        <option value="Backend" {{ $Skill->skill_type == 'Backend' ? 'selected' : '' }}>Backend</option>
                                        <option value="Non Relational" {{ $Skill->skill_type == 'Non Relational' ? 'selected' : '' }}>Non Relational</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="row">
                            {{-- Sub Attribute --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="subAttributes">@lang('Sub Attribute')<span class="text-danger">*</span></label>
                                    <select name="sub_attribute" class="form-control mySubAttr" id="subAttributes" >
                                    @foreach($subAttributes as $subAttribute)
                                        <option value="{{ ($subAttribute->title) }}" {{ $subAttribute->id == $Skill->skill_category_id ? 'selected' : '' }}>{{__($subAttribute->title)}}</option>
                                    @endforeach
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
                                        <option value="{{ ($module->id) }}" {{ $module->id == $Skill->module_id ? 'selected' : '' }}>{{__($module->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg ctsmbtn" style="width: 200px; float: right;">@lang('Update')
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
