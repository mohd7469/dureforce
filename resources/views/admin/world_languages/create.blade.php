@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-7 col-md-7">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.world.language.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           
                          
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Language Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="iso_language_name" value="{{old('iso_language_name')}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Native Name')<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="native_name" value="{{old('native_name')}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Language Name Code2')</label>
                                    <input class="form-control" type="text" name="iso2" value="{{old('iso2')}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-normal">@lang('Language Name Code3')</label>
                                    <input class="form-control" type="text" name="iso3" value="{{old('iso3')}}" >
                                </div>
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
