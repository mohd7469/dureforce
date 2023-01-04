@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.language.level.update',$languageLavel->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" value="{{$languageLavel->name}}" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Slug')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="slug" value="{{$languageLavel->slug}}" >
                                </div>
                            </div>
                            {{-- Module --}}
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                <label>@lang('Module')*</label>
                                <select class="form-control" name="module" >
                                    <option selected="" disabled="">@lang('Select Module')</option>
                                    @foreach($modules as $module)
                                        <option value="{{ ($module->id) }}" {{ $module->id == $languageLavel->module_id ? 'selected' : '' }}>{{__($module->name)}}</option>
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
