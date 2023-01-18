@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.language.level.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                          
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Title')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Slug')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="slug" value="{{old('slug')}}" >
                                </div>
                            </div>
                            {{-- Module --}}
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg ctsmbtn" style="width: 200px; float: right;">@lang('Save')
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
