@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.projectLength.store')}}" method="POST">
                        @csrf
                        
                        <div class="row">
                            {{-- Name --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="project_name">@lang('Name')<span class="text-danger">*</span></label>
                                    <input type="text" name="project_name" class="form-control">
                            </div>
                            {{-- Description --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="project_descr">@lang('Description')<span class="text-danger">*</span></label>
                                    <input type="text" name="project_descr" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            {{-- Start Range --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="start_range">@lang('Start Range')<span class="text-danger">*</span></label>
                                <input type="number" name="start_range" class="form-control">
                            </div>
                            {{-- End Range --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="end_range">@lang('End Range')<span class="text-danger">*</span></label>
                                <input type="number" name="end_range" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            {{-- Type --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Project Type')<span class="text-danger">*</span></label>
                                <select class="form-control" name="project_type" >
                                    <option selected="" disabled="">@lang('Select Project Type')</option>
                                        <option value="Weeks">Weeks</option>
                                        <option value="Months">Months</option>
                                        <option value="Days">Days</option>
                                        <option value="Years">Years</option>
                                </select>
                            </div>
                            {{-- Module --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Module')<span class="text-danger">*</span></label>
                                <select class="form-control" name="module" >
                                    <option selected="" disabled="">@lang('Select Module')</option>
                                    @foreach($modules as $module)
                                        <option value="{{__($module->id)}}">{{__($module->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save')
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