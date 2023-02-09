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
                                    <label class="form-control-label font-weight-normal">@lang('Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ $Skill->name }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Skill Type')<span class="text-danger">*</span></label>
                                <select class="form-control" name="skill_type" >
                                    <option selected="" disabled="">@lang('Select Skill Type')</option>
                                        <option value="Frontend" {{ $Skill->skill_type == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                                        <option value="Backend" {{ $Skill->skill_type == 'Backend' ? 'selected' : '' }}>Backend</option>
                                        <option value="Non Relational" {{ $Skill->skill_type == 'Non Relational' ? 'selected' : '' }}>Non Relational</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                        {{-- Module --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Skill Category')<span class="text-danger">*</span></label>
                                <select class="form-control" name="skill_category" >
                                    <option selected="" disabled="">@lang('Select Skill Category')</option>
                                    @foreach($SkillCategorys as $SkillCategory)
                                        <option value="{{ ($SkillCategory->id) }}" {{ $SkillCategory->id == $Skill->skill_category_id ? 'selected' : '' }}>{{__($SkillCategory->name)}}</option>
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

</script>

@endpush
